---
id: 2qIYZSmGpOK2cSoMSomSOK
title: GDPR for Cloud Service Providers (That's You!)
slug: gdpr-for-cloud-service-providers
pub_date: '2018-01-05'
author: 3azwOe9v3O4YSuyU0gsuo6
tags:
  - tags/gdpr
discovery_topic: discovery_topic/gdpr
summary: >-
  Cloud Service Providers doing business in the EU are Processors under
  GDPR—it's kind of like being a HIPAA Covered Entity in the U.S. Read more on
  GDPR Service Providers.
lead: >
  General Data Protection Regulation (GDPR) starts and ends with the different
  definitions of "Controller" and "Processor" and the relationship between the
  two. Using HIPAA as an analogy to explain: a Controller is like a Covered
  Entity, a Processor is like a Business Associate, and a Sub-processor is like
  a Subcontractor.
related_guide: 6ZjDEiocKI20ssIM4Eu4UO
related_entries:
  - 5Eape5yb0k0SGOu2Asw0ss
  - 3WgGJvG40EGu0sAOA4SQe2
  - 6iyNBVdpAIgewyYekqISUG
  - 1cDUJOfihS6CamYeuSG2KW
  - 6Ft7DZOasgag8AgW0qsCQo
cta_ref: 6fm8uDgwG4eaQ2mQUUuSMQ
---
If you are reading this, within GDPR, you are most likely a Processor of some sort. Welcome to the club! This is what Datica is as well because any piece of health IT technology that handles identifiable EU citizen data in a cloud-based modality can be considered a "cloud service provider" which means a Processor, which means this article is for you. Let's understand together the obligations Processors (and cloud service providers) have within GDPR.

## GDPR Risk Allocation

Much like [HIPAA, GDPR](https://datica.com/blog/how-does-gdpr-compare-to-hipaa/) is meant to outline risk allocation between business partners. It's a legal framework for risk, nothing more; as a framework GDPR does have more teeth than HIPAA in regards to potential financial penalties. The dirty secret about HIPAA is that it's nothing more than a set of recommendations, which is why a world of consultants, compliance experts, and legal frameworks exists to try to interpret and define the recommendations. GDPR is no different.

In terms of risk allocated to the relationship, Controllers assume primary risk, as defined in [Article 24.1](https://www.eugdpr.org/the-regulation.html):

> Taking into account the nature, scope, context and purposes of processing as well as the risks of varying likelihood and severity for the rights and freedoms of natural persons, the controller shall implement appropriate technical and organisational measures to ensure and to be able to demonstrate that processing is performed in accordance with this Regulation. Those measures shall be reviewed and updated where necessary.” 

Processors then assume risk when engaging with the Controller, as defined in Article 28.1:

> [W]here processing is to be carried out on behalf of a controller, the controller shall only use processors providing sufficient guarantees to implement appropriate technical and organisational measures in such a manner that processing will meet the requirements of [GDPR] and ensure the protection of the rights of the data subjects.”

But most importantly, Article 28 continues to underline the obligations of Processors in section 28.3(f):

> [The Processor is required to] assist the controller in ensuring compliance with the obligations pursuant to Article 32 – 36 taking into account the nature of the processing and the information available to the processor.”

When outlining risk, Processors have a lot of obligations. One way to interpret GDPR is that risk automatically flows down the supply chain, Controller to Processor to Sub-processor and so on. You will, by default, gain the obligations to abide by GDPR unless otherwise defined.

This is an important point: It's up to the Processor to tell the Controller where the line is drawn in the relationship, and not the other way around.

Many of the major potential [GDPR hosting providers](https://hackernoon.com/why-gdpr-compliance-is-difficult-in-the-cloud-9755867a3662) are managing it this way already. AWS famously created their "Shared Responsibility" model, in which they outline AWS will own risk associated to compliance _of_ the cloud, like physical data centers, while its customers are responsible for compliance _in_ the cloud, like encryption, disaster recovery, and many more responsibilities.

The takeaway: If you are handling PHI in the cloud, within GDPR, you as a processor will assume the flow of risk unless you collaborate with your Controller partner to outline what risks you will not take on.

## Data protection by design and by default

Processors must demonstrate "data protection by design and by default" which are terms from GDPR.

**Data protection by design** is explained in Article 25.1 as 

> taking into account the state of the art, the cost of implementation and the nature, scope, context and purposes of processing as well as the risk of varying likelihood and severity for rights of freedoms of natural persons posed by the processing shall, both at the time of determination of the processing and at the time of processing, implement appropriate technical and organisational measures, such as pseudonymisation which are designed to implement the data protection principles in an effective manner in order to meet the requirements of the GDPR and protect the rights of data subjects.”

To paraphrase, _data protection by design_ means that the product or service is built on top of an existing compliance and security framework. This is loosely similar to the [HIPAA Security Rule](https://datica.com/academy/the-hipaa-security-rule/).

**Data protection by default** is explained in Article 25.1 as

> The controller shall implement appropriate technical and organisational measures for ensuring that, by default, only personal data which are necessary for each specific purpose of the processing are processed. That obligation applies to the amount of personal data collected, the extent of their processing, the period of their storage and their accessibility. In particular, such measures shall ensure that by default personal data are not made accessible without the individual’s intervention to an indefinite number of natural persons."

To paraphrase, _data protection by default_ means that the product or service has operational controls on top of data access. In HIPAA terms, this is loosely similar to the Privacy Rule.

## The role of HITRUST in GDPR Compliance

The reason to call out _data protection by design and by default_ for GDPR cloud hosting providers is to highlight the ultimate plan of action. In short, cloud providers need to use existing compliance and security frameworks to demonstrate operational control as it relates to both the technical construction of the product or service and the business processes surrounding the product or service.

This is very similar to HIPAA, which is where existing frameworks like HITRUST, ISO, SOC 2, etc. can come into play. Demonstrating GDPR compliance as a cloud service provider is important, but there aren't prescriptive ways to do so yet. [HITRUST or ISO certifications](https://datica.com/blog/5-steps-to-hitrust-csf-certification/) can work as a proxy for GDPR compliance for the time being.

*Learn more about GDPR — Discover what you need to know about [GDPR Data Breach Requirements](https://datica.com/academy/gdpr-data-breach-requirements/)*
  