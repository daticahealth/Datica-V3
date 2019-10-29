---
id: AvBgV9bjDEiuCC4o4EsuW
title: HL7 102 - Anatomy of an HL7 message
slug: hl7-102-anatomy-of-an-hl7-message
pub_date: '2018-03-14'
author: 3VJKuWDfPak8w26k0g0Kw0
tags:
  - tags/hl7
discovery_topic: discovery_topic/ehr-integrations
summary: >-
  This deep dive explains HL7 message types, message structure, message
  segments, codes, fields and the complete anatomy of an HL7 message.
lead: >-
  In the [previous entry](/academy/hl7-101-a-primer/), we gave you a quick
  introduction to HL7 and its design - message types, segments and code sets.
  What I've come to also appreciate as I delved deeper into HL7 is that for all
  its perceived faults, it has more than served its purpose of standardization
  of communication of clinical and administrative data amongst disparate
  applications.
featured_image: /assets/academy/HL7_Series.jpg
related_guide: wSUz5LDXA4Uu42OqwQ8AM
related_entries:
  - 52med8hyLYW8ewGyymYqUS
  - 743EW7O6qW84osGkC4Qsum
  - 6NFTXJHWo0w860EGKA2EQC
  - iUK3rg26hqUEIsiuAIQou
  - 4T8HPfQfS8gO8qGwS6GSmu
cta_ref: 6kYqOBsQfeymIg08euYOqw
---
One can argue about problems arising because of the lack of standardization of code sets and cross-enterprise communication, but one also has to appreciate that this standard is a couple of decades old when inter-enterprise communication was not something at the top of anyone's mind. Heck, EHR implementations were rare too. Expecting HL7, which was designed and developed by consensus to address something far more tactical, to also  address the challenges of comprehensive interoperability, is asking a lot of HL7.

With that said, in this post, we'll delve deeper into HL7 so that you can better understand how an HL7 message is constructed.

### The overall structure of an HL7 message

Think of an HL7 message as an envelope. It contains various segments (pieces of data) which are (usually) patient oriented and triggered based on specific events (admits, lab results, procedures, discharge etc.) and communicate relevant information about that triggered event.

There are a lot of message types - 76 in v2.3 and 85 in v2.3.1 and even more now. The key ones to remember were also listed in my [previous entry](/academy/hl7-101-a-primer/). An HL7 message is constructed with:

- **One or more segments**: Segments are re-usable sub-parts of a message which contain the pertinent information related to that message type. So for example, an Admit message would contain information on the patient and her demographics, the reason for admission, the attending physician who signed off on the admit etc. And as you can imagine, patient demographics is reused in a lot of places and is a segment. There are a lot of segments (101 in v2.3 and 111 in v2.3.1) to cover almost any use case you can think of - from financial transactions (DFT) to Bed Status Updates (NPU).

- **Fields & Code sets**: Each segment consists of one or more fields of data. Since the message needs to be as short as possible, the fields are encoded using standardized codes (provided by HL7 or other bodies) or user defined (ideally only if HL7 doesn't recommend any or you need to communicate more than permitted). Message Header becomes MSH, patient demographics becomes PD1 and Male becomes M. There are lot of additional codes to cover all the various kinds of information that need to be communicated - 1691 codes in v2.3 not including any user defined codes.

- and **Control characters**: These are the ASCII characters used to separate data elements (|), indicate spaces or new lines (^) and the beginning of the next segment (the CR or carriage return). These are a subset of the control characters but some of the more important ones.

In order to ensure that the receiving system knows how to parse the incoming message, some rules are laid down in that define

- **For each message**, the required or optional segments and the number of times a segment could be repeated within. An example from the HL7 v2.3 standard is shown below. (image: samplehl7.png) (*source - HL7 v2.3 implementation guide*)

- **For each segment**, the sequence (SEQ) in which fields are expected, their length (LEN), the data types (DT), if the fields are required or optional (R/O), if they are repeatable or not and how many times can they be repeated (RP/#) and the table in which the code sets are defined. This is a "mapping table." An example of which is shown below. (image: hl7chart.png) (*source - HL7 v2.3 implementation guide*).

Both of these rules are used for validation of any inbound message but the code sets are not. You can now see how the HL7 standard could be bastardized:

- Code set doesn't cover all my needs: So you add one more to the list that HL7 provides. Now your HL7 standard is not quite a standard and cannot be shared with another entity unless they implement your code set as well

- Field repetitions allowed is insufficient: I want to send an EKG reading but the standard only allows for 50 repetitions of key value pairs. So I dump the rest into the Z segment and shoot it over that way. Now your HL7 message can be processed by any engine **but** the content inside the Z segment now has to be parsed and managed separately.

A quick note on reading HL7 message examples which seem to contain a bunch of [],{} etc. The general rule is as follows:

- No brackets around it - **Required**
- `[]` - **Optional**
- `{ }` - **Repeating**
- `[{ }]` - **Optional Repeating**

The ORM message structure is as follows.

<pre class="prettyprint lang-shell"><code>
ORM     General Order Message
MSH     Message Header
 [{NTE}]    Notes and Comments (for Header)
[
   PID     Patient Identification
   [PD1]    Additional Patient Identification
      [{NTE}]  Notes and Comments (for Patient ID)
   [PV1    Patient Visit
    [PV2|]   Patient Visit Additional Information
    [{IN1   Insurance
      [IN2]   Insurance Additional Info
   [IN3]   Insurance Additional Info
    }]
    [GT1]   Guarantor
    [{AL1}]   Allergy
  ]
]
 {
   ORC    Common Order
  [
   Order Detail Segment OBR, etc.
       [{NTE}]  Notes and Comments (for Detail)
       [{DG1}]  Diagnosis
       [
        {
         OBX   Observation/Result
              [{NTE}] Notes and Comments (for Results)
         }
       ]
  ]
  {[CTI]}   Clinical Trial Identification
 [BLG]    Billing segment
 }
</code></pre>


Hope that gave you a deeper insight into HL7. In the next post, we'll take an actual HL7 message - the ADT - and break it down to help you understand how it's constructed exactly.

If you’re looking to integrate EHR data with your application without becoming an HL7 expert, Datica can help. Learn more about Datica Compliant Managed Integration Services for HL7 [here](https://datica.com/ehr-integration).

  