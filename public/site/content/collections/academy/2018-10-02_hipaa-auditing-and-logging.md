---
id: BVDSUKb8bI44Cgeq44MMU
title: HIPAA Auditing and Logging
slug: hipaa-auditing-and-logging
pub_date: '2018-06-28'
author: 2B98PdoITGQAYwcWk2muY4
tags:
  - tags/hipaa
discovery_topic: discovery_topic/healthcare-cloud
summary: >-
  If you're going through a HIPAA security audit by a hospital or payer
  compliance office, auditing and logging will show that your application is
  secure.
related_guide: 2niXNAQR924CwM0YcOeo0C
related_entries:
  - 17s5iFERjsQOOQeSci2kES
  - 7rqrnw1soEOS4QEeAC0c8q
  - 20YHiTYApqcUS4sEqGSIyS
  - 7HB7ygGh7aG8Ys2OMkqqK2
cta_ref: 6fm8uDgwG4eaQ2mQUUuSMQ
---
Auditing and logging are an important part of the HIPAA Security Rule, but there not prescriptive controls defined. According to HIPAA Security Rule - 164.312(b):

> Implement hardware, software, and/or procedural mechanisms that record and examine activity in information systems that contain or use electronic protected health information.

HIPAA goes on to say, in slightly more specific terms, that covered entities and business associates implement:

> Procedures for monitoring log-in attempts and reporting discrepancies.

Put simply, what HIPAA boils down to is that all access, both success and failures, to electronic protected health information (ePHI) should be monitored and logged and be accessible in the case of a breach. You should be able to go back to your HIPAA log and investigate what data was accessed, conduct forensics to try to figure out how that data was accessed in an unauthorized way and who may have been the person or entity that accessed it, and determine if/how data was altered. It's the who, what, when, and how of access that needs to be audited and logged.

Auditing is so important because the integrity and availability of data is crucial in healthcare and in HIPAA. When ePHI data changes, is deleted, or is accessed in some unauthorized way, that represents a breach to HIPAA and is something that needs to be tracked both proactivel – using alerting and monitoring – as well as reactively, or retroactively, to investigate when an unauthorized breach might have taken place.

The types of logs should include system and network logs. This is basically what goes into syslog on a *nix box and, ideally, the server has detailed logging turned on. Next, any application access and database access should be logged. The metadata (when, what, where, etc) associated with log data is extremely valuable.

If you log enough data, you can proactively identify when a breach may have occurred with intelligent alerting. Once logging is properly configured, alerts are relatively easy to add. You can go back and investigate and dive deeper into what that the breach might be and ideally not just say "we store 100,000 patient records and our database was breached, so 100,000 patient records were disclosed improperly." With good logging, you should be able to point to the one, individual record that was breached and additionally maybe even the one specific piece of the record was breached (and how it might have or might not have been altered). That's some of the power of good logging.

The approach that we take at Datica is to log every interaction with our systems - all API traffic - application logs, database logs, and system logs. For companies that use us as Datica Compliant Cloud, we give them one endpoint so that whatever application logs they are generating, we can store those for them; we'll also help them determine what data they should be capturing in application logs. We store the application logs, along with system logs that we generate, in an encrypted, dedicated store for each customer, and we provide customers with views and API access into that data.

It's a very powerful unified logging service, one that's HIPAA grade and meant for ePHI. The service sits within our environment right next to your application and we combine your log data that we're already collecting on the servers and network traffic. We pull all that in into one place and give you a managed console for logging. Soon we'll be enabling customers to set alerts as well. If you're going through a HIPAA audit or assessment by a compliance office at a hospital or payer, this is a very powerful tool to assure them of the security and integrity of your application.

  