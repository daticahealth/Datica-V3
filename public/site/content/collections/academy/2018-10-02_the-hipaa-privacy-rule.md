---
id: 17s5iFERjsQOOQeSci2kES
title: The HIPAA Privacy Rule
slug: the-hipaa-privacy-rule
pub_date: '2018-02-06'
author: 1gpUmvd6yuOKUIUIY620i0
tags:
  - tags/hipaa
discovery_topic: discovery_topic/hipaa-compliance
summary: >-
  The HIPAA Privacy Rule is important to understand because it explains the
  types of data, covered entities, and uses of data HIPAA is concerned about.
related_guide: 6evss0t4I0IC2cQasg0K2O
related_entries:
  - 7rqrnw1soEOS4QEeAC0c8q
  - 1eK0941hX4icwGkikGCKQg
  - 5kwY6YTmKIuwCU482esGAQ
  - 6hcZMUL5qoc0SyssOiUMCi
  - 5Eape5yb0k0SGOu2Asw0ss
cta_ref: 6fm8uDgwG4eaQ2mQUUuSMQ
---
## Overview
The HIPAA [Privacy Rule](https://www.hhs.gov/sites/default/files/privacysummary.pdf) sets many of the terms used for HIPAA, outlines the types of entities that need to comply with HIPAA, defines appropriate uses or disclosures of health information, and also covers penalties for HIPAA violations. The Privacy Rule is important to understand, despite the fact that it doesn't include specific technical requirements or polices, as the Privacy Rule gives an understanding of the types of data, entities, and uses of data that HIPAA is concerned about.

## Entities
The Privacy Rule defines two main categories of entities:

1. *Covered Entities (CEs)*. These are the traditional players in healthcare - providers, hospitals, health systems, insurers. For some reason clearinghouses are called out as they transform and process health information for payers and providers; the clearinghouse that I always think of is Emdeon.

2. *Business Associates (BAs)*. These are individuals and organizations that provide services and/or technology to covered entities. In the process of providing those services and technology, the business associate in some way process, transmit, or store protected health information (PHI). All software vendors in healthcare, if they somehow touch PHI, are business associates.

A third category of entity or, maybe more accurately, a subcategory of business associates was added in 2013 as part of the HIPAA Omnibus rules in the HITECH Act. The HITECH Act defined a subcontractor as an entity that "creates, receives, maintains, or transmits protected health information on behalf of the business associate." A subcontractor is a business associate of a business associate. It can be a hosting provider, an email delivery service (email address), or even an analytics platform (IP address), if it in some way touches PHI. At Datica, many of our customers are business associates and we are subcontractors for them so we meet the new definition of subcontractor.

The Omnibus Rule also defined a PHR vendor, offering a PHR through a covered entity as a business associate.

## PHI + De-identifying
We devoted an entire post to "[What is PHI?](https://catalyze.io/learn/what-is-protected-health-information-or-phi)" because it's an incredibly important topic in HIPAA. It's basically personally identifiable data (name, email, phone, etc) combined with some type of health-related data (medication, diagnosis, provider name).

PHI can be de-identified by removing certain elements from the data, in a process called the [Safe Harbor](http://www.hhs.gov/ocr/privacy/hipaa/understanding/coveredentities/De-identification/guidance.html#safeharborguidance) method, or through "[expert determination](http://www.hhs.gov/ocr/privacy/hipaa/understanding/coveredentities/De-identification/guidance.html#guidancedetermination)", which seems a bit fuzzy to us as it is ripe for interpretation. The idea with both methods for de-identification is to make it so you can't identify an individual from a data set (duh!).

## Use or disclosing of PHI
PHI can only be disclosed for reasons defined by the HIPAA Privacy Rule, or with written permission by an individual about their own health information. Other than providing access to the individual to his/her medical record, the Privacy Rule allows for disclosing PHI for three main reasons:

1. *Treatment.* Probably the most obvious reason for disclosure, exchanging PHI between providers for treatment, management, and consultation happens all the time.
2. *Payment.* In order to collect payments from insurers, disclosure of PHI is essential.
3. *Operations.* We think of this as the catch-all bucket. It encompasses many administrative functions such as quality reporting and different types of operational analytics. This is also where disclosures for medical education fall in.

There are some other, more obscure, reasons for disclosures. The most relevant reasons left are for legal reasons ("required by law"), worker compensation, and for restricted research purposes, amongst others.

In some select cases – in particular, marketing – covered entities may disclose PHI but only with authorization from the individual.

## Minimum necessary
One of the central tenants of HIPAA, as stated in the Privacy Rule, is minimum necessary use of PHI. The idea is relatively simple, don't disclose any information that is not necessary for the reason for which the information is to be used. For example, if you're trying to find out how much a patient owes for a particular procedure, you probably don't need to disclose that patient's allergies. In healthcare today, minimum necessary is usually observed by either specific HL7 or EDI X12 message types which confine the amount and type of data in a data exchange.

## Notice of HIPAA Privacy Policies
Covered entities must provide individuals with a notice informing those individuals of their rights, as well as detailing other factors such as the protections the covered entity use to secure PHI. You probably remember getting and signing these every time you go to the doctor.

## Penalties
The Office of Civil Rights (OCR), within HHS, is responsible for enforcing the HIPAA rules. In addition to civil (financial) penalties, there are criminal penalties for knowingly disclosing PHI or obtain PHI in violation of the HIPAA Privacy Rule.

  