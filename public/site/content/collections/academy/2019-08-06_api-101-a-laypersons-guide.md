---
id: 68tUMiYIOfDjI9jNOQz0jA
title: 'API 101: A Layperson''s Guide'
slug: api-101-a-laypersons-guide
pub_date: '2019-02-10'
author: 1iL3zeL6PWrbLRgZE9x5Mf
tags:
  - tags/api
  - tags/healthcare-cloud
  - tags/ehr
discovery_topic: discovery_topic/ehr-integrations
summary: >-
  Learning from the rest of the digital economy, how can application program
  interfaces (APIs) have the same impact in health IT.
lead: >-
  Application program interface (API) technology has transformed the digital
  economy and are now poised to do the same in health IT. But what’s all this
  APIs stuff really about? How do they work? Why are they better than
  traditional health care interfaces?
related_guide: wSUz5LDXA4Uu42OqwQ8AM
cta_ref: 2ptDXKeXwZ1AAVrghZtJJs
---
API technology allows two software applications to connect, communicate and collaborate. At its core is a combination of technologies that do two things. First, web services harness the power of internet “backbone” communication protocols to provide a robust, secure channel for connecting two applications and transmitting data. Second, standards like JSON and XML provide data-interchange formats (“objects”) that are easy for humans to read and write and for machines to generate and parse.

Imagine if instead of two applications communicating using internet protocols and JSON objects, Mary and Sue are texting each other using a secure messaging service. The unique thing about this conversation is that Mary and Sue have agreed to only use a pre-arranged set of questions that are always asked and answered in a highly structured way.

So a conversation that starts like this:

__Mary: How are you today?__
__Sue: I am fine__


becomes a structured exchange like this:

__“Application” Mary “asks”:__

`>Get /Service/HowAreYou/now`
 
__“Application” Sue “responds”:__

`>{“myStatus” : “fine”}`


Mary and Sue can also have more complicated exchanges. Mary can ask questions that include more “parameters” and Sue can respond with more detail and options.


__Mary: How’s the weather there?__

__Sue: We are having a storm! Rain, lighting, rough surf and high winds from the east.__


Becomes:

__“Application” Mary:__

`> Get/Service/TheWeather/now`
    
__“Application” Sue:__ 

~~~javascript
>{
  “weatherCondition” : “stormy”,
  “rain” : “yes”,
  “lightning” : “yes”,
  “surfConditions : “rough”,
  “windSpeed” : ”25”,
  “windDirection” : “east”
 }
~~~
{: .prettyprint .lang-js}
 
There are some obvious advantages to this approach.

- Neither application knows or cares about the internal workings or data structures of the other. They have agreed upon a standard format for asking and answering questions that reliably lets them connect and share. As long as they can speak “API”, what they do internally “on their own” time is their own business.
-  The format is flexible and extensible. It’s pretty easy to update or change the objects or the options for each member of an object. This flexibility is a major advantage since it provides a path for future improvement while preserving the past for compatibility. If “Application Sue” wants to start reporting the pollen count as part of the “weather” service, we can just add that as a new member of the weather JSON object:

~~~javascript
  >{
    “weatherCondition” : “stormy”, 
    “rain” : “yes”,
    “lightning” : “yes”,
    “surfConditions : “rough”,
    “windSpeed” : ”25”,
    “windDirection” : “east”,
    “pollenCount” : “low”
   }
~~~
{: .prettyprint .lang-js}
  
Applications that want to use this new information about pollen counts can do so; those that don’t simply ignore it.

__The format can be read by humans and machines.__ You just proved that by reading this far! This can increase clarity while minimizing errors and the need for special codes, hardware, etc.

There’s more to it of course. In addition to using “Get” services to “ask” questions, Mary can use “Put” services to tell things to Sue. “Put” is very powerful and Mary can use it to actually change Sue’s status or the weather! And there is security checking, error handling and the like. But, basically this is how it all works.
  