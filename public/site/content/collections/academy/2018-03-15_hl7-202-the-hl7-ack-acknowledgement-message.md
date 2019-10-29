---
title: 'HL7 202 - The HL7 ACK (Acknowledgement message)'
summary: 'The HL7 acknowledgement message, HL7 ACK, is critical for smooth, ongoing HL7 communication. Learn the nuances of HL7 ACK messages, segments, and codes.'
featured_image: /assets/articles/HL7_Series.jpg
lead: 'The HL7 acknowledgement message, or ACK, is critical to ensure that ongoing HL7 communication proceeds smoothly. The concept of an [ACK](http://en.wikipedia.org/wiki/Acknowledgement_(data_networks)) is commonly used in many data networks protocols, including TCP, so you are likely familiar with it. Although conceptually simple (receiving system acknowledges receipt for specific message sent from sending system), there are a couple of nuances (enhanced mode, rate limiting) with HL7 ACK that make covering this topic worthwhile.'
pub_date: '2018-03-15'
discovery_topic: topics/ehr-integrations
author:
  - 1gpUmvd6yuOKUIUIY620i0
related_entries:
  - 6kJ8z6pgQIHlWx2TOQ0hjl
page_no_index: false
no_follow_links: false
sitemap_priority: '0.5'
sitemap_changefreq: daily
twitter_share_setting: inherit
id: 6NFTXJHWo0w860EGKA2EQC
category: integration
tags:
  - hl7
  - protocols
  - data
  - networking
---
## The structure of an ACK message

Let's take a quick look at how an ACK message is created.

Let's say an inbound HL7 ADT (Admit, Discharge, Transfer) message came in with the following MSH (message header).

~~~shell
MSH|^~\&|EPICADT|DH|LABADT|DH|201301011226||ADT^A01|HL7MSG00001|P|2.3|
~~~
{: .prettyprint .lang-shell}

If the message was accepted and acknowledged, then the response ACK message (following original mode) will look like this:

~~~shell
MSH|^~\&|LABADT|DH|EPICADT|DH|201301011228||ACK^A01^ACK |HL7ACK00001|P|2.3
MSA|AA|HL7MSG00001
~~~
{: .prettyprint .lang-shell}

Note the following:

1. The source and destination systems have been switched;
2. MSA segment contains the "AA" value which indicates acceptance; and
3. MSA segment also contains the ID of the original message.

Seems pretty straightforward but as you will see, the rules utilized to come up with this simple message can be pretty complicated.

## The need for the ACK message

The need for acknowledgements is best understood when we know that:

1. HL7 is designed around the concept of trigger events - i.e. someone got admitted, a lab test has to be ordered, lab test results have been received, patient has to be rescheduled etc.
2. Healthcare IT systems are very "specialized" - there are systems (often from different vendors) that focus just on ADT (admission, discharges and transfers), practice management (patient scheduling and billing), labs (lab orders, results capture and communication) etc.

So, if an event happens in one system (patient is admitted), then that event has to be sent to another system (e.g. labs) to communicate information such as internal patient identifiers (otherwise how will the lab know if the incoming order is for a valid patient or not, what identifier to use etc.). Note that these messages are usually unsolicited - i.e. ADT message is sent to all interested systems as soon as it happens without being asked for it. Additionally, as you can imagine, the volumes of messages being received by these systems could get large, hence there is a possibility the message could get dropped. The ACK serves as a confirmation that:

1. the message (specified by an identifier) was received;
2. the message is valid based on HL7 processing rules (more on this in a minute); and optionally
3. the message data has been taken into a transient store like a processing queue or permanent store like a database (more on this in a minute as well).

## Types of ACK messages and associated processing rules

As you can see, the ACK message is **not** like the delivery acknowledgement you get when you send an email or text message - it's not a "I got it" message. One can specify whether original or enhanced processing rules are to be applied to the message. Based on this specification, the inbound message is processed differently and a different kind of ACK message is sent back. The ACK message and the associated processing rules are defined based on the MSH (message header) segment content (more details on the MSH segment was discussed in an [earlier post](/academy/hl7-201-the-admission-discharge-transfer-adt-message/)).

### Original mode

Original mode processing is indicated if both the 15th and 16th fields of the MSH segment of the inbound message is null or empty.

Any inbound message with an MSH segment indicating original mode processing will be validated for correct syntax and goes through a two step process:

### Step 1 - Protocol validation

This is used to to assure that:

1. the value in message type field (MSH - field #9) is one that is acceptable to the receiver i.e. an ADT^A20 message may be rejected by a billing system;
2. the value in version ID field (MSH-12) is acceptable to the receiver i.e. if the systems expects HL7 v2.3.1 and the field says v2.6, then, in the immortal words from a famous film "what we've got here is (a) failure to communicate";
3. the value in processing ID (MSH-11) is appropriate for the application process handling the message.

If any of these checks fail, the protocol software will reject the message with an ACK message containing "AR" in the acknowledgment code field (MSA-1). If it doesn't fail, it passes the message to the application.

### Step 2 - Application validation

The application validation checks are:

1. if the application processes the message successfully, it will generate the functional response message with a value of AA in acknowledgment code (MSA-1);
2. or the application will send an error response, with a value of AE in acknowledgment code (MSA-1);
3. if the application fails to process (reject) the message because of system uptime or other reasons and not for format or validation errors. The response message contains a value of AR in acknowledgment code (MSA-1). The message can sometimes be re-sent later but that is up to the sending system and the implementation to figure out.

## Enhanced mode

Enhanced mode processing is indicated if at least one of the 15th and 16th fields of the MSH segment of the inbound message is not null. Enhanced mode requires that the receiving application take on additional responsibility namely that:

1. the inbound message is received and stored;
2. message passes syntax validation;
3. the message type (ADT-A19 can be processed), version is correct (HL7 v2.3.1 and not v2.6 for example) and processing ID is correct - if not a commit reject (CR) message will be sent.

Based on these rules, the receiving system will send

1. a commit accept (CA) if all OK;
2. a commit reject (CR) as above; or
3. a commit error (CE) for any other error.

### Custom ACK

What is health IT without some customization? Not surprisingly, it is possible to send a Non-HL7/Static String ACK. This is a custom acknowledgement and is simply a text string (rather than an HL7-formatted ACK). These types of ACKs are used when an inbound system is incapable of receiving HL7 formatted messages or creating them.

## Rate limiting with ACK messages

The HL7 standard defines that the sending systems cannot send another message to a system until it has received an ACK in response. Actually, that is not quite correct (thanks for a reader for pointing this out to us). It is not part of the HL7 specification. It is usually the way the HL7 systems are implemented in *practice* to ensure messages are handled appropriatelt.  This was done, one presumes, to ensure that if messages are rejected due to errors in content, message formats, system downtime etc., they can be corrected either at the source or queued until the destination system comes back up. But as you can immediately see, if the next message won't be sent until an ACK is received, it is possible to slow down the rate of inbound messages by delaying the sending of the ACK message. Since processing of HL7 messages using open source tools have challenges when inbound message rates become high, this is one of the levers that is available to implementers to ensure messages are received and processed appropriately.

Our resident expert on HL7, [Mark Olschesky](/about/mark/) explains this more as follows. Previous to v2.7, the only ACKs that were "official" were your classic Original Mode and Enhanced Mode ACKs. There was no way that an upstream system to really know within the standard what you were going to do with the message. As such, the only valid assumption was that 

- the message was processed without error upon receiving the ACK or 
- was not processed correctly with a NACK or no ACK. 

This also makes sense logistically as well, i.e. it would be dangerous to send/process an update to a patient record if you weren't able to process the initial event which would seed that patient into your system (or receive an update to a note you didn't have, etc.). Most of HL7's design is linear, and doesn't have much of a concept of eventual consistency. Note that there were always exceptions around this (notably systems which had no capability to respond with an ACK).

In 2.7, a new field was added to the 15th segment of the MSH segment of the ACK which allows the receiving system to indicate to the sending what it was going to do with the message after it received it. While folks had been doing this tacitly for years beforehand, the intent in design was to accommodate for interface engines which receive a message and then fan it out to a multitude of systems, providing some closure to the sending system as the receiving system cranked along and did its work. This was usually a tacit admonishment in design that the interface engine (and team working on it) was now responsible for troubleshooting vs. the ADT or EHR system which generated the original message type.

Now you know as much as I do about ACKs. Go forth and prosper.

If you’re looking to integrate EHR data with your application without becoming an HL7 expert, Datica can help. Learn more about Datica Compliant Managed Integration Services for HL7 [here](https://datica.com/ehr-integration).