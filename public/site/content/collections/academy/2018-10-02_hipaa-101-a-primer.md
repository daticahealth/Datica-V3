---
id: f7teOq2J7acGGGyS8CQWA
title: HIPAA 101 A primer
slug: hipaa-101-a-primer
pub_date: '2018-03-21'
author: 1gpUmvd6yuOKUIUIY620i0
tags:
  - tags/hipaa
discovery_topic: discovery_topic/hipaa-compliance
summary: >-
  The HIPAA acronym stands for the Health Insurance Portability and
  Accountability Act. This HIPAA primer covers HIPAA 101 basics, meaning,
  entitities, etc. 
related_guide: 6evss0t4I0IC2cQasg0K2O
related_entries:
  - 17s5iFERjsQOOQeSci2kES
  - 3xrZxi1Z8caYQOG0EagsGo
  - 3lJNN0q4FWgqoYWGGWKGUg
cta_ref: 6fm8uDgwG4eaQ2mQUUuSMQ
---
This article assumes no prior knowledge of HIPAA and is meant to present a very high level snapshot of what HIPAA is and who it impacts.

HIPAA stands for the **H**ealth **I**nsurance **P**ortability and **A**ccountability **A**ct. If you're not familiar with HIPAA, or you haven't spent a lot of time in the healthcare industry, you may not realize that spelling "HIPAA" wrong is a running joke.

Most people, especially in IT, will have some story about a consultant or vendor delivering a report or sending emails with HIPAA spelled wrong. I can remember doing my first HIPAA audit at HCA as a consultant, way back before I went to medical school or knew what an EHR was, and having to do a find-and-replace to assure we caught any misspellings of "HIPAA" before submitted the report to HCA. Just remember it's **not** like "hippo", there's only one "P".

What's interesting about the acronym "HIPAA" is that the "P" in HIPAA does not stand for "privacy" and the "I" does not stand for "information". It's interesting because the general perception of HIPAA, which is accurate, is that it's main purpose to to "protect" health "information". The reason for this perception is that the protection of health information is essential to avoid financial penalties for breaches and non-compliance. While much of HIPAA, especially as it is enforced by compliance officers to avoid financial risk, is about securing data, HIPAA also sets rules around how data is exchanged between systems and how authorizations are done to allow for access to individual medical records.

The one other essential acronym with HIPAA is "PHI". [PHI stands for **P**rotected **H**ealth **I**nformation](https://catalyze.io/learn/what-is-protected-health-information-or-phi). PHI is often referred to as "personal health information", which is a pretty accurate description of PHI. PHI is pretty simple - it's the combination of a personal identifier (name, DOB, SSN, IP address, email, etc) with some health-related data (condition, medication, lab, encounter, health payment, etc). PHI warrants a larger discussion but for now it's important to know the term so we can start using it. See [this blog post](https://catalyze.io/blog/what-is-protected-health-information-or-phi/) for a deeper insight.

Getting back to HIPAA - the spirit of HIPAA is pretty simple - 1) to secure and protect personal health information and 2) to enforce standards for electronic transactions in healthcare. Specifically, HIPAA has three main parts, summarized below:

1. **HIPAA Privacy Rule**. This portion of HIPAA deals with protection, access, and authorization related to PHI. It sets rules for when and how PHI is disclosed. It also gives individuals ownership of their health records, as well as the right to access them and request corrections to them.

2. **HIPAA Security Rule**. The Security Rule sets standards for the security of technology used to access, store, transmit, or process PHI. It is concerned with electronic PHI, or ePHI. It operationalizes much of the Privacy Rule. It's not always prescriptive in how to secure technology, and some aspects are left to interpretation. This section of HIPAA is the most relevant to app developers from a practical standpoint. One additional thing to know is that certain implementation specifications laid out in the security rule are either required, meaning you have to do them, or addressable. Addressable specifications are ones in which an entity needs to either 1) implement the specific implementation as written, 2) implement an alternative specification, or 3) not implement anything for that specific requirements because it is not reasonable or necessary to do so. As with most things in HIPAA, the important thing is that decisions related to addressable specifications are documented.

A quick side note on documentation - as we alluded to earlier, HIPAA is not prescriptive. Therefore, the general approach has been one of being able to show that the risk of data leakage / breach has been mitigated to the extent possible and the steps taken to do so documented (and updated when changed). These reams of documentation are in place so that in case of a breach, companies can show the extent to which safeguards were implemented.

3. **Administrative Simplification**. This area of HIPAA relates to the accepted coding for data exchanged in healthcare. The transactions this applies to are financial related (claims, eligibility, enrollment, etc). As the name implies, the intent is to make it administratively easier to exchange data by not having to keep track of an endless number of code sets. The common code sets range from X12 or NCPDP (pharmacy-related) and include DRG, ICD, CPT, NDC, SNOMED-CT, and LOINC amongst others.

The other aspects of HIPAA that are relevant as a starting point are the types of entities that HIPAA recognizes. Basically, entities fall into two broad buckets:

1. **Covered Entities**. Health systems, payers, and clearinghouses (process claims) fall into this category.

2. **Business Associates**. These, most likely you if you're reading this, are entities that provide services to covered entities and through those services access, transmit, process, or store PHI. Changes to HIPAA that went into effect in the fall of 2013 expanded the definition of business associate to include "subcontractors", or entities that provide services to business associates. A simple use case - a developer that builds a PHR for a hospital is a business associate, and the hosting provider that developer uses (ideally Datica) is a subcontractor. The developer signs a BAA with the hospital and as well as with the hosting provider, again ideally Datica.

So that's our intro. You now know more about HIPAA that 99.9% of the population. The rest of our articles go into much more depth on these topics but this is a great place to start.
  