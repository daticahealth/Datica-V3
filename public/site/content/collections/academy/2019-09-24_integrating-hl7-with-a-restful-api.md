---
id: 5RqQEl5hpSq2KuyQoYMsIy
title: Integrating HL7 with a RESTful API
slug: integrating-hl7-with-a-restful-api
pub_date: '2018-08-10'
author: 3VJKuWDfPak8w26k0g0Kw0
tags:
  - tags/hl7
  - tags/mirth
discovery_topic: discovery_topic/ehr-integrations
summary: >-
  RESTful APIs are the backbone of many webservices today. Having the tools to
  integrate an not-natively-RESTful interface engine with this common standard
  opens a lot of possibilities. In the healthcare space, queuing the HL7
  properly is critical. In this article, we explore ways to do this properly.
lead: >-
  ## Why does this matter?


  RESTful APIs are the backbone of many webservices today. Having the tools to
  integrate an not-natively-RESTful interface engine with this common standard
  opens a lot of possibilities. 


  There will be hurdles for implementing tools like these, especially since some
  of core RESTful requirements are lost, namely: statelessness, cacheability,
  and code on demand.
related_guide: wSUz5LDXA4Uu42OqwQ8AM
related_entries:
  - 5hxMqchtYWC2qU0uMWy4gW
  - 52med8hyLYW8ewGyymYqUS
  - AvBgV9bjDEiuCC4o4EsuW
  - 79e4rnBGHC2YgmKqu8QuwA
  - 4AznnGBn9SEs6kAyyuCmIW
cta_ref: 5eA1ToAIEw4Qy20mkUmmcm
---
## What is a RESTful API?

Representational State Transfer (REST) web services are a popular method of providing interoperability between systems.

From the [REST API Tutorial](http://www.restapitutorial.com/) guide, there are six constraints:

1. **Uniform interface:**  Resources are uniquely identified in requests by URIs, and the communication is HTLM, XML, or JSON representation of content from the database. When the server returns the representation of the resource to the client, the client holds enough information to modify or delete the resource on the server (security permitting). 
2. **Stateless:**  The state for handling a request is contained within the request itself. This helps with modularity because each request will have all of the information needed by the server to complete the request without relying on information from the server-client session.
3. **Cacheable:**  Server responses must define themselves as cacheable when appropriate so that clients can reuse information rather than make subsequent requests.
4. **Client-Server:**  There needs to be a separation between client and server, bridged by the RESTful API. This allows the client and server to be developed independently as long as the API interface remains the same. User interface and user state stays on the client, and data storage stays on the server.
5. **Layered System:**  Because of the stateless requirements, a client will not be able to tell whether communication is directly with the server or with an intermediate resource. Since a request itself contains all of the necessary information to complete that request, an intermediate resource (e.g. a load balancer) can pass along the request while obfuscating the server-side process from the client.
6. **Code on demand (optional):**  Servers can pass along some extra tools to the client in the form of applets and client-side scripts. This is not a requirement, but it is a good way to extend the utility of a client application.

## What makes this special?

Long story short, a customer of ours uses the [PubNub](https://www.pubnub.com/) API for their messaging infrastructure. We at Datica use the open-source [Mirth Connect](https://www.mirth.com) interface engine.

Most interface engines do not natively treat messages the same way that RESTful APIs do. Typically, the message content alone is sent to an interface endpoint, which means that the communication is not stateless and depends on the context of the destination knowing where the message is coming from. For the healthcare space, HL7 messages often need to be queued in a particular order, so each message itself cannot be independent or out of order.

### HL7 

HL7 is not inherently designed to mesh well with a RESTful API. PubNub does not preserve message order, since it anticipates each message is stateless. So, the consuming application is responsible for ordering messages based on the control ID or an included datetime. Also, message receipt is not guaranteed, so we rely on the consuming application to respond with a notification of any problems. 

### Mirth Connect

With a typical RESTful integration, you would subscribe and use that side of the response to confirm receipt of the message -- that asynchronous communication doesn't work natively with most interface engines. Mirth Connect operates with the premise that messages will be communicated point to point. Serializing and persisting Java objects for multiple messages is difficult. This means that we end up initializing and destroying a PubNub configuration for each message.

Datica's Mirth Connect interfaces work in a FIFO manner, and the communication is synchronous. For example, posting a message to an HTTPS endpoint relies on a response code before continuing. Because of this, you lose some of the benefit of having a layered system for receiving and sending stateless messages, since everything gets queued up in one line.

## Nuts and bolts

### PubNub Java SDK

PubNub has a variety of SDKs available on their website. We ended up using the [Java SDK v4](https://www.pubnub.com/docs/java-se-java/pubnub-java-sdk). 

We could have written our own code to invoke PubNub endpoints directly, but Mirth Connect has the ability to invoke external Java SDKs! We were able to save a lot of time by leveraging the PubNub-provided SDK.

### Mirth Connect destination

We built a Java method to import PubNub java libraries and synchronously post to a PubNub URI. This was exported as an executable JAR and then transferred to the container hosting the Mirth Connect instance to be imported as a Mirth code resource.

This Java class was called from a Mirth Connect JavaScript writer destination, where the API specifics were declared, including:

* Subscriber key
* Publisher key
* Cipher key
* A unique message UUID
* Message content
* Channel names
* And, an error file name for capturing API responses

These parameters for the PubNub post were combined into the RESTful resource identifier.

<pre>

package datica.pubnub;

import java.io.IOException;
import java.io.PrintWriter;
import java.io.StringWriter;
import java.util.Calendar;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;
import org.json.simple.parser.ParseException;

import com.pubnub.api.PNConfiguration;
import com.pubnub.api.PubNub;
import com.pubnub.api.PubNubException;
import com.pubnub.api.callbacks.PNCallback;
import com.pubnub.api.enums.PNLogVerbosity;
import com.pubnub.api.models.consumer.PNPublishResult;
import com.pubnub.api.models.consumer.PNStatus;

public class PubnubPublisherSync {
	public static String main(String subscribeKey, String publishKey, String cipherKey, String uuId,
		String json, String channelName, String messageFile) throws PubNubException, ParseException {
		String output = null;
		System.gc();
		
		//read in the file name
		JSONParser parser = new JSONParser();
		JSONObject jsonBody = (JSONObject) parser.parse(json);
		final String filename = messageFile;
		
		//create pubnub configuration
		PNConfiguration pnConfiguration = new PNConfiguration(); 
		pnConfiguration.setSubscribeKey(subscribeKey);
		pnConfiguration.setPublishKey(publishKey);
		pnConfiguration.setCipherKey(cipherKey);
		pnConfiguration.setUuid(uuId);
		pnConfiguration.setSecure(true);
		
		PubNub pubnub = new PubNub(pnConfiguration); // initialize pubnub
		
		try{
		PNPublishResult result = pubnub.publish().message(jsonBody).channel(channelName).usePOST(true).sync();
		output = result.getTimetoken().toString();
		return "SUCCESS:"+output;
		//System.out.println(result.toString());
		}catch(PubNubException e){
			output = e.getErrormsg();
			return "ERROR:"+output;
		}finally{pubnub.destroy();}
	}
}

</pre>

### Getting to the JAR

Within Mirth Connect, you can import code resources here:  **Mirth Connect >> Settings >> Directory Settings**. You will first need to make sure that you migrate your executable JAR to the container that the Mirth Connect service lives on.

Once that code resource is imported, you can call it from your message channel destinations.

<pre>

importPackage(Packages.datica.pubnub);

// PubNub vars
var subscribeKey= new java.lang.String("sub-c-123-ABC-456-DEF");
var publishKey=new java.lang.String("pub-c-789-GHI-123-JKL");
var cipherKey=new java.lang.String("456-MNO-789-PQR");
var uuId = new java.lang.String("123-STU-456-VWX");
var pubnubChannel = new java.lang.String("789-YZA-123-BCD");

// Mirth vars
//var jsonBody= new java.lang.String($('jObj'));
//var filename = new java.lang.String("/foo/"+$('filename'));

// convert to string and estimate size
var jsonString = $('jObj');
var jsonLength = jsonString.length();
channelMap.put("json string length",jsonLength);

// prep vars for array build
var pnUuid = UUIDGenerator.getUUID();
var filename = new java.lang.String("/foo/"+pnUuid);
var indexCt = 0;
// split JSON obj into 25K char sections
var jsonStringSplit = [];
jsonStringSplit = jsonString.match(/.{1,12500}/g); //12.5k splits

//for error handling
var error=true;

for each (split in jsonStringSplit) {
	var pubNubJson = {};
	pubNubJson.id = pnUuid;
	pubNubJson.index = indexCt;
	pubNubJson.length = jsonStringSplit.length;
	pubNubJson.data = split;
	channelMap.put("split"+indexCt,split);
	var jsonBody= new java.lang.String(JSON.stringify(pubNubJson));
	indexCt ++;
	// publish to PubNub
	var resp = PubnubPublisherSync.main(subscribeKey, publishKey, cipherKey, uuId, jsonBody, pubnubChannel, filename);
	var respString = new java.lang.String(resp);
	if (respString.indexOf("ERROR") > -1){throw resp;}
}

</pre>

## Issues

### Chunkin'

PubNub as a webservice API was designed with some message size limits. HL7 messages, and Datica's JSON message translation of the HL7, can regularly exceed the allowable per-message size limit.

So, we ended up segmenting our messages into smaller pieces and then wrapping each piece in a JSON wrapper. The wrapper included:

* UUID to identify the source message
* Number of segments the source message was split into
* Index of which segment of total number was contained 
* Segmented message content

This message segmentation can be seen in the above JavaScript Mirth Connect destination code.

### Sync vs Async

With the Java SDK v4 from PubNub, the `pubnub.publish()` method had both `async()` and `sync()` submethods. We ended up using the sync method, as you can see from the above line in our JAR: `PNPublishResult result = pubnub.publish().message(jsonBody).channel(channelName).usePOST(true).sync()`

This all comes back to interface engines not functioning like a typical RESTful API. For each concurrent process pushing messages to the API endpoint, we need to wait for a response.

### Destroy

We ran into a memory leak with our PubNub destination in MirthConnect. The Rhino version of JavaScript calling the Java SDK JAR for PubNub initialized a new PubNub configuration with each message. That, in turn, was not explicitly cleaned up by the JavaScript layer's garbage collector.

So, our solution was to use the `pubnub.destroy()` method from within the JAR. This explicitly clears the cache of PubNub configuration (another way this deviates from normal RESTful practice).
  