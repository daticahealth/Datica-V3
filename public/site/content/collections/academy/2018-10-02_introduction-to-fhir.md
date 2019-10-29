---
id: 3lJNN0q4FWgqoYWGGWKGUg
title: Introduction to FHIR
slug: introduction-to-fhir
pub_date: '2018-05-16'
author: 5dsPZqJr4Qu2uww6KgYO0G
tags:
  - tags/fhir
discovery_topic: discovery_topic/ehr-integrations
summary: >-
  The FHIR acronym stands for Fast Healthcare Interoperability Resources. FHIR
  is a new open sourced interoperability standard of the HL7 organization. 
lead: >-
  FHIR (Fast Healthcare Interoperability Resources) is a new and emerging
  standard being developed under the auspices of the [Health Language
  7](https://hl7.org) (HL7) organization. [(View a primer on
  HL7.)](https://catalyze.io/learn/hl7-101-a-primer) Pronounced as 'Fire', it
  was initially developed by [Graham
  Grieve](http://www.healthintersections.com.au/), who insisted FHIR be open
  sourced. At its core, FHIR is intended to be **the** next generation of
  healthcare interoperability. It tries to combine the best features of HL7
  Version 2 and Version 3, in which Grieve was significantly involved.
related_guide: wSUz5LDXA4Uu42OqwQ8AM
related_entries:
  - 1t2mQms18kgiecSMeSeCCW
  - 1wWbjWNWOQygO2EaESEOeq
cta_ref: 4OCkYKXr2EEQSIcse0GQOq
---

### Why FHIR?

The current state-of-the-art in healthcare integration and interoperability is based on HL7, and is a serious mess. Organizations today spend upwards of $5000 to $10,000 per HL7 interface, not to mention serious licensing fees to implement and use integration engines. All of which raise the interesting question of, "Wait, if they are all based on a standard, why do I need an integration engine?" For two reasons:

1. HL7 is a standard but it is not an **open** standard. You need to be a member of the HL7 organization and pay  fees before using the content in any commercial fashion.
2. HL7 is an ancient standard: [Wikipedia](http://en.wikipedia.org/wiki/Health_Level_7) notes that it was developed in the late 80s when a lot of things we take for granted now didn't exist - mobile numbers, emails, NPI (national provider identifiers), APIs...

What resulted was a lot of "I'll just do it **this** way", causing an explosion of HL7 variants. This, in turn, led to the need for interface engines where additional logic needs to be coded to accommodate those *"this-way"* variants and other healthcare specific use cases. That led to the bigger problem that integration and logic is now embedded into the data transformation process. Change your source system (upgrade, replace, etc.) and your integration falls apart. Need more data than you're currently getting, well, it's back to the integration engine again. Oh, by the way, there is no concept of CI / CD (continuous integration, continuous deployment) in the context of integration engines. Often developers make changes in production directly, which is also why healthcare institutions are very cautious about providing access to systems sending data to any external system, no matter the value. And for good reason, as you can imagine.

#### A better, more modern approach to integration and interoperability

FHIR has an ambitious goal. Integration capabilities should be built into the EHR itself along with the other aspects of authentication and security. Over time, this will eliminate the need for expensive integration projects and licenses. Additionally, the use of modern concepts such as [RESTful APIs](http://en.wikipedia.org/wiki/Representational_state_transfer) and accompanying documentation will make it much easier for developers and applications to quickly connect and get the data needed. From a design perspective, the general principle is that since healthcare is complicated, creating a standard set of models which are transactional in nature (like HL7) has been shown to be problematic. Therefore, creating core models (like patients, for example), having standardized data models around those core elements, and ensuring that most, if not all, use cases can be addressed by allowing requests to be **composed** as needed.

Given the above, FHIR does offer many improvements over existing standards:

- **It's open source**: This is a big deal and the first effort in making healthcare integration more transparent and accessible. Putting it out in the open has created a significant community including developers, vendors and enterprises.
- **RESTful**: REST-based design brings a significant amount of benefit, namely that an API that adheres to the principles of REST does not require the client to know anything about the structure of the API. Rather, the server needs to provide whatever information the client needs to interact with the service.
- **Extensible**: Extensibility under the RESTful context ensures that additions can be easily tacked on to cover specific use cases without impacting the core models.
- **Composable**: Composability ensures that almost any request can be cobbled together using core models or resources and associated extensions.
- **Good documentation**: Uniquely driven by the RESTful API approach, which enforces good documentation as a byproduct. A playable version of the FHIR APIs would be a nice to have and is something that we, at Datica, intend to provide as part of this documentation.
- **Support for modern web standards**: XML, JSON, HTTP, Atom, OAuth, REST - these are the underlying technologies that FHIR leverages. These are battle tested and have been proven at scale and under significant security requirements.

#### Flexibility without modifying underlying systems or integration engines

As described earlier, various healthcare workflows (e.g. z-segments in HL7) that forced extensions of standards is one of the biggest challenges with older integrations. Underlying systems required code changes to generate specific datasets and additional work on the integration engine to support the data processing. All this made it very cumbersome to create and manage integrations with any changes in the underlying source systems (e.g. upgrades etc.), causing a significant amount of rework.

FHIR addresses this by:

- **Focusing on ease of implementation**: Implementation is very different from most standards where the focus is typically more on coverage and data models. FHIR is interesting because the focus has been on ease of implementation from the beginning, including backwards compatibility. Multiple implementation libraries have also been provided in Java and .NET, among others, along with many examples to kick-start development. The website claims "multiple developers had simple interfaces working in a single day", which is unheard of in healthcare.
- **Easy extensibility**: FHIR solves extensibility challenges by defining a simple framework for extending and adapting the existing resources. All systems, no matter how they are developed, can easily read these extensions and extension definitions can be retrieved using the same framework as retrieving other resources.
- **Human readability**: HL7 3.0 had a concept of a human readable version of the document / data being shared to ensure that developers or clinicians could still read the source data to eliminate any potential of misconfiguration or coding errors. FHIR borrows this concept as well. Every resource carries a human-readable text representation using html as a fallback display option. This is particularly important for complex clinical information where many systems take a simple textual/document based approach.

### Advantages over existing standards, e.g. HL7

- **Pipe delimited vs. JSON, XML...**: No further discussion is required. This approach makes it more easily usable, understandable and testable.
- **Security**: HL7 as a protocol doesn't have security and authentication built into it. To be fair, HL7 was always meant to enable intra-system communication, like between lab systems and an EHR. All of which were within a health system's firewalls. Therefore authentication wasn't really needed. The evolution of healthcare has made care delivery more dispersed, which is why HL7 is beginning to show it's gaps. FHIR leverages (or is in the process of defining) modern https based authentication and authorization capabilities such as OAuth, which are prevalent in the modern web and have been battle tested over the years.
- **Flexible and composable**: The FHIR design allows developers to combine requests to create any interface or extend resources (with associated definition) and "tack" them onto pre-defined resource models. [(More on the Resource Object here.)](https://catalyze.io/learn/the-fhir-resource-object-the-core-building-block) No coding up the underlying systems or touching interface engines required.

### Status and challenges

FHIR is still a work in progress. It does have a few advantages.

#### Significant industry support

Individual developers and other organizations have contributed sample implementations, like [HAPI-FHIR](http://jamesagnew.github.io/hapi-fhir/) and many more. Plus a significant group of enterprises have come together under the auspices of HL7 with the moniker of "Argonaut Project". This group includes EHR vendors and health systems such as
- athenahealth
- Beth Israel Deaconess Medical Center
- Cerner
- Epic
- Intermountain Healthcare
- Mayo Clinic
- Meditech
- McKesson
- Partners HealthCare System
- SMART at the Boston Children’s Hospital Informatics Program
- The Advisory Board Company

#### It's a work in progress

Despite significant industry support, it is unlikely widespread implementations of FHIR will be seen until the 2016-2017 timeframe because definitions and specifications are still in progress, implementations are still underway and more EHR software changes are likely required.

#### Security is still an open item

Security with FHIR is incomplete. Authentication before Authorization or vice versa? Conformance and associated profiles per link? Is there to be an API route to call to verify that? Is that route open to everyone?

#### Not real-time

Currently the biggest gap, FHIR is not a real-time protocol. In contrast, HL7 was always a real-time protocol. If someone was admitted to the hospital, all relevant parties were notified immediately via ADT.

FHIR is currently still a request based protocol. You ask if you need to know something such as _"Was this person admitted to the hospital?"_, which makes sense from a patient app perspective, but not so much from a workflow perspective. Webhooks are optional additions, but begs the question _"Why can't we just FHIR enable HL7?"_ The Datica answer is, _"Yes, indeed. It should."_

#### Granular resource model can become request intensive

ADT (and other HL7) messages were crafted with care to support hospital and ancillary system workflows. The flexibility and composability (described in the advantages section above) come at a cost. To get all the data that one normally expects from an ADT message would require a "bundle" of FHIR resources. This could get complicated and request-intensive quickly.

### Summary

Overall, FHIR has a lot going for it. There are gaps but they are neither unexpected nor insurmountable. Stay tuned for updates as the FHIR standard evolves.
  