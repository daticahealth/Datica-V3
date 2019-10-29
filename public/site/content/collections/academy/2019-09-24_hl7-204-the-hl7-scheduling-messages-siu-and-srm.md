---
id: 4T8HPfQfS8gO8qGwS6GSmu
title: 'HL7 204 - The HL7 Scheduling messages, SIU and SRM'
slug: hl7-204-the-hl7-scheduling-messages-siu-and-srm
pub_date: '2016-05-04'
author: 3VJKuWDfPak8w26k0g0Kw0
tags:
  - tags/hl7
discovery_topic: discovery_topic/ehr-integrations
summary: >-
  The HL7 SIU and HL7 SRM message types are HL7 appointment scheduling messages
  with date and time, resources, services, location, and more appoint info. 
featured_image: /assets/academy/HL7_Series.jpg
related_guide: wSUz5LDXA4Uu42OqwQ8AM
related_entries:
  - 743EW7O6qW84osGkC4Qsum
  - 6NFTXJHWo0w860EGKA2EQC
  - iUK3rg26hqUEIsiuAIQou
  - lNtxCYbqtaM41OnlE8qAl
  - 6YbhOC0rdEBk4PsEUY0gxQ
cta_ref: 5eA1ToAIEw4Qy20mkUmmcm
---
The SIU (Schedule Information Unsolicited) and SRM (Schedule Request Message) messages contain information related to appointment scheduling. SRM messages are used for requesting changes to a health system's schedule, such as a request for a new appointment booking, appointment rescheduling, modification, cancellation, etc. SIU messages are used to notify auxiliary applications of a change made to the health system's schedule, such as a notification for the booking of a new appointment, appointment rescheduling, modification, cancellation, etc. Scheduling messages contain information about the appointment date and time, resources, services, location, and any other pertinent information regarding the appointment. The purpose or action prescribed by any scheduling message will depend entirely on the trigger event (See the List of Trigger Events below). 

Following the standard HL7 message structure, an SIU or SRM message is made up of segments and groups of segments, each of which may be required, optional, repeatable, or some combination thereof. A quick note on reading HL7 message examples which seem to contain a bunch of `[],{}` etc. The general rule is as follows:

- No brackets around it - Required
- `[]` - **Optional**
- `{ }` - **Repeating**
- `[{ }]` - **Optional Repeating**

Below are the message structures of both the SIU and the SRM:

## SIU Message Structure

<pre class="prettyprint lang-shell"><code>
SIU     Schedule Information Unsolicited

MSH     Message Header
SCH     Schedule Activity Information
 [{NTE}]     Notes and Comments (for Schedule Activity)
PID     Patient Identification
 [PD1]     Patient Additional Demographics
 [ROL]     Role (for Patient)
 [PV1]     Patient Visit Information
 [PV2]     Patient Visit Info Continued
 [{OBX}]     Notes and Comments (for Patient)
 [{DG1}]     Diagnosis (for Patient)
{
	RGS     Resource Group Segment
	{
		AIS     Appointment Info. - Service
		 [{NTE}]     Notes and Comments (for Service)
	}
	[{
		AIG     Appointment Info. - General Resource
		 [{NTE}]     Notes and Comments (for Resource)
	}]
	[{
		AIP     Appointment Info. - Personnel
		 [{NTE}]     Notes and Comments (for Personnel)
	}]
}
</code></pre>

## The SRM Message Structure

<pre class="prettyprint lang-shell"><code>
SRM     Schedule Request Message

MSH     Message Header
ARQ     Appointment Request Information
 [{NTE}]     Notes and Comments (for Schedule Activity)
PID     Patient Identification
 [PD1]     Patient Additional Demographics
 [ROL]     Role (for Patient)
 [PV1]     Patient Visit Information
 [PV2]     Patient Visit Info Continued
 [{OBX}]     Notes and Comments (for Patient)
 [{DG1}]     Diagnosis (for Patient)
{
	RGS     Resource Group Segment
	{
		AIS     Appointment Info. - Service
		 [{NTE}]     Notes and Comments (for Service)
	}
	[{
		AIG     Appointment Info. - General Resource
		 [{NTE}]     Notes and Comments (for Resource)
	}]
	[{
		AIP     Appointment Info. - Personnel
		 [{NTE}]     Notes and Comments (for Personnel)
	}]
}
</code></pre>

There are a few things to note about the message structures. As you may have already noticed, the structure of the two message types are virtually identical. We'll discuss that more later. For now, we will explore the shared features of both the SIU and SRM:

- The Resource Group segment (RGS) is always required, and may contain more than one resource group. This segment acts as a header for the collection of resource segments that follow it.
- Within a Resource Group, the Appointment Service Information (AIS) is the only required resource segment. This suggests that any new/requested appointment must have a scheduled service attached to it.
- Note the presence of multiple (optional, repeatable) Diagnosis (DG1) segments. If repeated, the first will be the primary diagnosis.
- Note the presence of the OBX (Observation) segment as an optional, repeatable segment. The use here is different from its use in the ORU (Observational Report - Unsolicited) message. When used, it contains notes and comments pertaining to the patient in much the same way an NTE segment would, rather than information about observations and results. For instance, the OBX segments may contain a Transcribed Report (TX) with patient information that may be relevant to the appointment. 

As mentioned before, the only apparent difference between the structure of an SIU message and an SRM message is the second segment. The SIU message contains an **SCH** segment whereas the SRM message contains an **ARQ** segment. Even these two segments share most of the same fields. However, there are some key differences, notably:

- **Date/Time Range**
	In the SIU message, the SCH segment contains one field with all of the appointment timing/quantity information in one place (SCH.11). In the SRM message, the ARQ segment has four separate fields for appointment timing quantity. They consist of one required field for the requested start date/time range (ARQ.11) and the optional fields for appointment priority (ARQ.12), repeating interval (ARQ.13), and the interval duration (ARQ.14).
- **Audit Trail Contacts**
	The SIU message can contain the name, phone number, address, and location information for the person who "placed" the appointment (SCH.12 - SCH.15), the person who "filled" the appointment (SCH.16 - SCH.19), and the person who "entered" the appointment (SCH.20 - SCH.22). As an SRM message is sent only when an appointment has not yet been filled, the ARQ segment only contains fields for the placer (ARQ.15 - ARQ.18) and enterer (ARQ.19 - ARQ.21) of the appointment.	
- **Filler Status Code**
	The status of the appointment is only present in SIU messages (SCH.25). This is, again, due to the fact that a scheduling request must be filled before it can have any status other than "requested".

Apart from the few differences between the SCH segment and the ARQ segment, there is no structural difference between an SIU message and an SRM message. However, the main difference between any two message types comes not from the structure of the message, but from the action prescribed by the different trigger events.

### List of Trigger Events

Trigger events for SRM:

| Segment ID | Description |
|------------|-------------|
| S01 | Request New Appointment Booking |
| S02 | Request Appointment Rescheduling |
| S03 | Request Appointment Modification |
| S04 | Request Appointment Cancellation |

Trigger Events for SIU:

|Segment ID | Description |
|-----------|-------------|
| S12 | Notification of New Appointment Booking |
| S13 | Notification of Appointment Rescheduling |
| S14 | Notification of Appointment Modification |
| S15 | Notification of Appointment Cancellation |
| S26 | Notification that Patient did not show up for Scheduled Appointment |

### Message Construction

The message I want to send is: A female, Caucasian patient, Jane Fredericks, MRN:30745109, SSN:321-87-6543 born on May 1, 1973 and account number of 11396810 wants to schedule a new appointment to have an X-Ray taken of her ankle. The appointment request is being placed by Dr. James Matthews. The exact service to be performed is X-RAY ANKLE 3+ VW with the associated CPT code of 73610. This is based upon a diagnosis of Broken Ankle. Additional information that will need to be sent will include the appointment date and time, duration, sending and receiving systems, the version of HL7 being used etc. The request is approved and the hospital sends a notification for the new appointment booking.

Based on this information, the segments would be created as follows:

#### MSH - Message Header
Assuming an all Epic environment i.e. sending and receiving systems are all Epic and request is created at 2016/05/02 at 16:20:33. Version of HL7 being used is v2.3. Since this message is a notification for a new appointment booking, the message type is SIU and the trigger event is S12. This would result in a segment that looks like this.

```
MSH|^~\&|EPIC|EPIC|||20160502162033||SIU^S12|538|D|2.3||
```

#### SCH
This contains all of the scheduling information - the placer and filler application's appointment identifiers, duration, start time, the person who requested the appointment, and the appointment status. To keep things simple, we'll only include the identifiers and required information.

```
SCH|01928374|57483920|||||||1|hr|1^^^20160515133000|||||||||1173^MATTHEWS^JAMES^A|||||BOOKED
```

#### PID - Patient Identification
Since this message is a patient specific request, it needs all the associated patient info to prevent any confusion. This would include the patient's identifier, full name, DOB, sex, race, address, phone number(s), account number, SSN and place of birth.

```
PID|1||30745109^^^^EPI||FREDERICKS^JANE^I^^MRS.^||19730501|F||Cauc|421 N. BAKER ST^^MADISON^WI^53513^US^^^DN|DN|(608)555-6789|(608)555-4321||S||11396810|321-87-6543||||^^^WI^^
```

#### PV1 - Patient Visit
This usually contains information on the admission information, attending, referring and consulting, admitting physician IDs and names and so on. I'll just keep it simple and just have the attending physician's info in the sample giving us

```
PV1|||^^^CARE HEALTH SYSTEMS^^^^^||| |1173^MATTHEWS^JAMES^A^^^||||||||||||610613||||||||||||||||||||||||||||||||V
```

#### DG1 - Diagnosis
Some basic context needs to be provided so that the billing systems can do their work so diagnosis information is also provided. So in ICD10 (I10), ankle fracture is coded as S82.

```
DG1||I10|S82^ANKLE FRACTURE^I10|ANKLE FRACTURE||
```

#### RGS - Resource Group
This is brief header for the group of resource segments that follow it. Included is the number of the resource group, the action prescribed (here it's "add", or 'A'), and the group ID. This group ID may be used for modifying or rescheduling the resource group at a later date.

```
RGS|1|A|094
```

#### AIS - Appointment Info. - Service
This contains information related to the scheduled service. In this case, it will be an X-Ray for the patient's ankle. Along with the CPT code for the scheduled service, the segment also contains the time the service is expected to start (may be different from the appointment start time) and the length of time the service will be needed.

```
AIS|1||73610^X-RAY ANKLE 3+ VW^CPT|20160515134500|15|min|45|min||
```

#### AIP - Appointment Info. - Personnel
This optional repeating segment identifies personnel needed for the appointment that are not explicitly mentioned anywhere else in the message. For the scheduled appointment, a radiologist (Allan Good) will be needed to perform the X-Ray. Just like the AIS segment, this segment contains the time the radiologist will be needed and for how long, which gives us

```
AIP|1||1069^GOOD^ALLAN^B|RADIOLOGIST||20160515134500|15|min|45|min||
```

### Putting it all together
To assemble the SIU message, we string together the message segments following the message structure outlined above:

<pre class="prettyprint lang-shell"><code>
MSH|^~\&|EPIC|EPIC|||20160502162033||SIU^S12|538|D|2.3||
SCH|01928374|57483920|||||||1|hr|1^^^20160515133000|||||||||1173^MATTHEWS^JAMES^A|||||BOOKED
PID|1||30745109^^^^EPI||FREDERICKS^JANE^I^^MRS.^||19730501|F||Cauc|421 N. BAKER ST^^MADISON^WI^53513^US^^^DN|DN|(608)555-6789|(608)555-4321||S||11396810|321-87-6543||||^^^WI^^
PV1|||^^^CARE HEALTH SYSTEMS^^^^^||||1173^MATTHEWS^JAMES^A^^^||||||||||||610613||||||||||||||||||||||||||||||||V
DG1||I10|S82^ANKLE FRACTURE^I10|ANKLE FRACTURE||
RGS|1|A|094
AIS|1||73610^X-RAY ANKLE 3+ VW^CPT|20160515134500|15|min|45|min||
AIP|1||1069^GOOD^ALLAN^B|RADIOLOGIST||20160515134500|15|min|45|min||
</code></pre>

If you're looking to integrate EHR data with your application without becoming an HL7 expert, Datica can help. Learn more about Datica Managed Integration Services for HL7 or for further help on integrating an SIU or SRM feed with an EHR [here](https://datica.com/ehr-integration).
  