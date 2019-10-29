---
id: 743EW7O6qW84osGkC4Qsum
title: 'HL7 201 - The Admission, Discharge, Transfer (ADT) Message'
slug: hl7-201-the-admission-discharge-transfer-adt-message
pub_date: '2018-02-21'
author: 3VJKuWDfPak8w26k0g0Kw0
tags:
  - tags/hl7
discovery_topic: discovery_topic/ehr-integrations
summary: >-
  HL7 ADT message types are the most common HL7 messages. We explain ADT message
  structure, segments, and event types, including HL7 ADT message examples.
lead: >-
  The ADT message is one of the most common messages in HL7. It covers a lot of
  use cases such as admissions, cancellation of admits, merging of patient data,
  etc. This is the reason why there is such a long list of possible events and
  message types that could be sent. 
featured_image: /assets/academy/HL7_Series.jpg
related_guide: wSUz5LDXA4Uu42OqwQ8AM
related_entries:
  - AvBgV9bjDEiuCC4o4EsuW
  - 6NFTXJHWo0w860EGKA2EQC
  - iUK3rg26hqUEIsiuAIQou
  - 6YbhOC0rdEBk4PsEUY0gxQ
  - 3JBb8WQfo79fdyBDmtwLE5
cta_ref: 2yAtuZDAYlL96AiVw6mnBp
---
The full list for the HL7 v2.3.1 is shown below.

|Segment ID | Description|
|-----------|------------|
|A01  | Admit/visit notification|
|A02  | Transfer a patient|
|A03  | Discharge/end visit|
|A04  | Register a patient|
|A05  | Pre-admit a patient|
|A06  | Change an outpatient to an inpatient|
|A07  | Change an inpatient to an outpatient|
|A08  | Update patient information|
|A09  | Patient departing - tracking|
|A10  | Patient arriving - tracking|
|A11  | Cancel admit/visit notification|
|A12  | Cancel transfer|
|A13  | Cancel discharge/end visit|
|A14  | Pending admit|
|A15  | Pending transfer|
|A16  | Pending discharge|
|A17  | Swap patients|
|A18  | Merge patient information|
|A19  | QRY/ADR - Patient query|
|A20  | Bed status update|
|A21  | Patient goes on a "leave of absence"|
|A22  | Patient returns from a "leave of absence"|
|A23  | Delete a patient record|
|A24  | Link patient information|
|A25  | Cancel pending discharge|
|A26  | Cancel pending transfer|
|A27  | Cancel pending admit|
|A28  | Add person information|
|A29  | Delete person information|
|A30  | Merge person information|
|A31  | Update person information|
|A32  | Cancel patient arriving - tracking|
|A33  | Cancel patient departing - tracking|
|A34  | Merge patient information - patient I|
|A35  | Merge patient information - account only|
|A36  | Merge patient information - patient ID and account number|
|A37  | Unlink patient information|
|A38  | Cancel pre-admit|
|A39  | Merge person - patient ID|
|A40  | Merge patient - patient identifier list|
|A41  | Merge account - patient account num|
|A42  | Merge visit - visit number|
|A43  | Move patient information - patient identifier list|
|A44  | Move account information - patient account number|
|A45  | Move visit information - visit number|
|A46  | Change patient ID|
|A47  | Change patient identifier list|
|A48  | Change alternate patient ID|
|A49  | Change patient account number|
|A50  | Change visit number|
|A51  | Change alternate visit ID|

In case you're wondering why we always use the v2.3 or v2.3.1 for examples - it's just that the 2.3 and 2.3.1 standards are the most widely implemented standard accounting for well over 80% of deployments. So if you know these two well, you're in pretty good shape. Additionally, except for v3.0, all subsequent HL7 versions are backwards compatible. What you can expect from later versions is more message types, more segments and more codes - and some being retired, of course.

I've always felt that the best way to learn is by doing. So, we'll start with a message that we want to send and see how we can encode and construct that message in HL7.

### The message to be sent
As another side note, the examples we'll use throughout will be inpatient oriented as outpatient HL7 messages are identical in nature and simpler to boot. Let's take the simple case of an admission into a hospital. In the case of an admit - you would need to know the name of the patient and some demographics like date or birth, gender, any next of kin and their info in case there are any significant problems, an identifier like an MRN, where they were admitted into (room, bed), who was the attending physician who signed off on the admit, and the reason for the admit. So the message you would want to perhaps send from an ADT system to say a Lab system could be (in plain English) - "Patient (John A Appleseed) was admitted on Jan 1, 2013 at 12:23 a.m. by Dr Sidney J. Good (#004777) for surgery. He has been assigned to room 2012, bed 01 on nursing unit 2000."

One thing, we can know immediately looking at the table above that this would be an ADT-A01 message.

### The mandated structure of the ADT-A01 message

As we discussed in [the earlier HL7 102: Anatomy of an HL7 message post](https://datica.com/academy/hl7-102-anatomy-of-an-hl7-message/), HL7 recommends / mandates that messages follow a specific structure. For the ADT-A01 message type, the structure is as shown in the image below. 

<img data-src="/assets/academy/academy-sample-hl7-message-sequence.png?w=760" class="lozad img-crisp" alt="academy-sample-hl7-message-sequence" />

(*source - HL7 v2.3 implementation guide*). Looking at the structure, we can guess that the segments we will need are:

- MSH: the message header (required everywhere)
- EVN: indicating the event that happened (in this case the admission of the patient)
- PID: the patient identification segment. Note that demographics can be included within the PID segment itself
- NK1: next of kin (which is always good to know in a hospital context in case something goes wrong)
- PV1: information about the patient "visit" - this is where you would include the physician info and the current location of the patient.
- Since an image is worth a thousand words, I'll try and illustrate the process using images rather than a lot of words. I'm not going to give you the mapping tables etc. as I'm pretty sure the HL7 licensing agreements might prohibit sharing outside our org.

It's easily downloadable from the [HL7](http://www.hl7.org) website. One quick tip before we begin - in most HL7 messages the pipe character `|` is called the BAR and it is the field separator and in the case of this message, we're going to use the `^` as a space. So if you see a bunch of pipes together like this `||||||||||` - all that means is that the fields at that point in the sequence were optional or not available. Also remember that segments are separated by a carriage return - which cannot be displayed as any and all viewers will interpret that for display.

#### The MSH segment
If you wanted to mail someone an important letter, you need to specify the from and to addresses and you may sign up for delivery confirmation. That corresponds almost exactly to the first and common segment across all HL7 messages - the MSH (message header) segment. The figure below shows the needed fields that need to be populated in an MSH segment and the values filled in for those fields. We've also assumed here that the system sending the update is an Epic ADT system and it's being sent to a Lab system.

<img data-src="/assets/academy/academy-msh-segment.png?w=760" class="lozad img-crisp" alt="academy-msh-segment" />

Now, if we lookup the mapping tables, we can easily fill in the MSH segment with information (after coding it appropriately) to get the following HL7 encoded MSH message segment.

```
MSH|^~\&|EPICADT|DH|LABADT|DH|201301011226||ADT^A01|HL7MSG00001|P|2.3|
```

#### The EVN segment
Similarly in the case of the EVN segment, the figure below shows the data needed and the data we have.

<img data-src="/assets/academy/academy-evn-message-segment.png?w=760" class="lozad img-crisp" alt="academy-evn-message-segment" />

Following the same process of looking up the mapping tables and encoding, gives us this HL7 encoded EVN message segment

```
EVN|A01|201301011223||
```

#### The PID segment
The PID segment contains more info such as the full name of the patient etc. Which requires the use of a space and newlines. This is where the other control characters come into play, namely the "^" symbol. What we need to send, and the data we have, are as follows:

<img data-src="/assets/academy/academy-pid-message-segment.png?w=760" class="lozad img-crisp" alt="academy-pid-message-segment" />

And following the process above and encoding the data (in this case for example, "male" becomes "M"), we get the following encoded segment.

```
PID|||MRN12345^5^M11||APPLESEED^JOHN^A^III||19710101|M||C|1^DATICA STREET^^MADISON^WI^53005-1020|GL|(414)379-1212|(414)271-3434||S||MRN12345001^2^M10|123456789|987654^NC|
```

#### The NK1 segment
What we need to send and what we have is this:

<img data-src="/assets/academy/academy-nk1-message-segment.png?w=760" class="lozad img-crisp" alt="academy-nk1-message-segment" />

And we get this:

```
NK1|1|APPLESEED^BARBARA^J|WIFE||||||NK^NEXT OF KIN
```

#### The PV1 segment

This:

<img data-src="/assets/academy/academy-pv1-message-segment.png?w=760" class="lozad img-crisp" alt="academy-pv1-message-segment" />

And we get this:

```
PV1|1|I|2000^2012^01||||004777^GOOD^SIDNEY^J.|||SUR||||ADM|A0|
```

### Putting it all together
Now that we've generated the individual segments, we need to put them together. In the earlier section on message structure, you'd have seen the required sequence to be followed. So - we do that and voila! - the full HL7 ADT-A01 message (without the carriage returns)


```shell
MSH|^~\&|EPICADT|DH|LABADT|DH|201301011226||ADT^A01|HL7MSG00001|P|2.3|
EVN|A01|201301011223||
PID|||MRN12345^5^M11||APPLESEED^JOHN^A^III||19710101|M||C|1 DATICA STREET^^MADISON^WI^53005-1020|GL|(414)379-1212|(414)271-3434||S||MRN12345001^2^M10|123456789|987654^NC|
NK1|1|APPLESEED^BARBARA^J|WIFE||||||NK^NEXT OF KIN
PV1|1|I|2000^2012^01||||004777^GOOD^SIDNEY^J.|||SUR||||ADM|A0|
```
{ .prettyprint .lang-shell}


Painful, isn't it? Well, the good thing is that there are open source parsers that can do this for you. We'll delve into those and I'll give you as comprehensive a listing of those as I can find with some pro / cons as well. We're also building out hosted versions of HL7 parsers with what we see as key enhancements over what is currently available. Stay tuned for announcements about those.

If you’re looking to integrate EHR data with your application without becoming an HL7 expert, Datica can help. Learn more about Datica Managed Integration Services for HL7 [here](https://datica.com/services/#integration).

Looking for further help on integrating an ADT Registration feed with an EHR? Check out this article on [ADT Integration Help.](http://content.datica.com/adt-registration-integration-help)
  