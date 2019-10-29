---
id: 61Jeq2MiSQKeW8Qyuek0Ua
title: What is Protected Health Information (PHI)?
slug: what-is-protected-health-information-or-phi
pub_date: '2018-04-19'
author: 1gpUmvd6yuOKUIUIY620i0
tags:
  - tags/hipaa
discovery_topic: discovery_topic/hipaa-compliance
summary: >-
  The acronym PHI stands for Protected Health Information. An individual's PHI
  is data on health status, provision of health care, or payment for health.
related_guide: 6evss0t4I0IC2cQasg0K2O
related_entries:
  - 17s5iFERjsQOOQeSci2kES
  - 3bwNayxEnYkukwYQ6Qqee0
  - 6YbhOC0rdEBk4PsEUY0gxQ
  - 5apPBY3GdFBA9rvIa1ZXma
cta_ref: 3VsDfgWFYcksgkUq2iyMAQ
---
**The acronym**: PHI stands for **P**rotected **H**ealth **I**nformation - not personal health information (although that's in essense what it implies), not personally identifiable health information (I've seen it used although that would technically be PIHI) and I'm sure there are variants of this that you've heard as well.


**The definition**: Here's the wikipedia [definition](http://en.wikipedia.org/wiki/Protected_health_information). Protected health information (PHI) is any information about health status, provision of health care, or payment for health care that can be linked to a specific individual. HHS provides an even simpler  of PHI - individually identifiable health information transmitted or maintained in any form or medium by a Covered Entity or its Business Associate; the definition of a "business associate" has been extended with the HIPAA Omnibus rule that went into effect in 2013. This term "information" is interpreted rather broadly and includes any part of a patient's medical record or payment history. The key here is this phrase "that can be linked to a specific individual". Which is where the other acronym, PII (Personally Identifiable Information) - here's the [link](http://en.wikipedia.org/wiki/Personally_identifiable_information) to the wikipedia article on that - becomes relevant. The major difference between PHI and PII is that PII is a legal definition - i.e. PII is anything that **could** be used to uniquely identify an individual. PHI is a subset of PII in that a medical record could be used to identify a person - especially if the disease or condition is rare enough.

## Protection

The core of the HIPAA regulations is to ensure that ownership of any and all medical data is retained solely by the individual. The individual can then decide to parcel out access to others - providers, family members, employers if needed or necessary or simply by preference of the record owner. Only an individual has the right to grant access to their medical data. This was mainly done for the following reasons:

1. **Privacy**: Obviously we would prefer that our neighbor (or in some cases, family members) not know about whatever condition we might be suffering from or medication we are taking.

2. **Bias and discrimination**: AIDS, mental health and other conditions have some (albeit declining) social stigma associated with it. The HIPAA PHI provisions ensure that employers and others do not have access to one's medical record and use the information contained within to discriminate against the individual based on their health information.

## Uniqueness

Obviously protection and privacy come into play once the individual can / has been uniquely identified. [There are after all 25.8 million Americans have diabetes](http://ndep.nih.gov/diabetes-facts/). Which leads to the question of what data can be used to uniquely identify an individual. The generally accepted set of individually unique data elements include the following:

|#|Identifier|Description|
|-|----------|-----------|
|1|Name|Well, of course i.e. first name, last name, maiden name combinations. One could argue that just any **one** of the above doesn't uniquely identify an individual after all "James" is a pretty common name. But it could be possible to identify an individual using a combination of data i.e. first name, zipcode, street address etc.|
|2|Geographic locators|Everything (street address, city, precinct, zipcode, lat long coordinates etc.) are considered PII. The first three digits of the zipcode are usually considered ok for use except in the case of certain zipcodes which cover a small population (less than 20,000). There are currently 17 zipcodes that fit that profile - 036, 692, 878, 059, 790, 879, 063, 821, 884, 102, 823, 890, 203, 830, 893, 556, 831. So three digit zipcodes are ok to be used except for the above listed ones.|
|3|Dates|Pertaining to significant events in an individual's life - birth, death, marriage, admission, discharge etc. Just the year is generally considered fine for use except in the case of the very elderly (>89 years of age; in which case they would be represented by an aggregate category, e.g. <90)|
|4|Phone numbers|Well, of course.|
|5|Fax numbers|This is, IMHO, a carryover from the old days. Do you know a lot of people with a personal fax number? But, it does make sense.|
|6|Electronic mail addresses (email)|Check|
|7|Social Security numbers|Check|
|8|Medical record numbers|This is usually a "random" number and could be used if one also knew the institution that assigned it.|
|9|Health plan beneficiary numbers|This is your insurance card / member ID.|
|10|Account numbers|Bank numbers etc.|
|11|Certificate/license numbers|Drivers license, birth certificate number etc.|
|12|Vehicle identifiers and serial numbers, including license plate numbers|If it's good enough for the police to track someone down...|
|13|Device identifiers and serial numbers|Medical devices have unique serial numbers. Your computer's MAC id is unique as well.|
|14|Web Universal Resource Locators (URLs)|This is a bit murky but is in here to cover all possibilities. http://www.facebook.com isn't very unique. But if logged within a specific application, could indeed be very unique to an individual.|
|15|Internet Protocol (IP) address numbers|Your IP address can be used to easily identify your address. There are several free services that offer this (do a quick google search for [address from ip](https://www.google.com/search?q=address+from+ip&oq=address_) and try this as an [example](http://www.geobytes.com/IpLocator.htm)|
|16|Biometric identifiers, including finger and voice prints|Don't forget retinal images.|
|17|Full face photographic images and any comparable images|Check|
|18|Any other unique identifying number, characteristic, or code|Re code - note this does not mean the unique code assigned by the system to code the data.|

These 18 elements are the core set of data elements that individually or in combination can be used to uniquely identify an individual. And, considering the fact that the above list of identifiers has **fax numbers** and not Twitter @usernames, Facebook IDs, or a host of other modern, more common identifiers, it's clear that the PII list is not the most up to date and some more thought should go into recognizing and protecting identifiable information. However, since patient data is valuable in clinical trials, medical case studies etc., the above list is used as a guideline to ensure privacy. Which leads to...

## Anonymization & De-identification

**Anonymization** is a process by which PHI elements are removed or changed with the purpose of minimizing / removing the possibility of going back to the original data set. This involves removing all identifying data to create unlinkable data.

**De-identification** under HIPAA occurs when data has been stripped of common identifiers by two methods:

1. Remove the 18 elements listed above;

2. If another approach is used, ensure a statistically small / negligible risk of re-identification which is validated by a statistics expert (you have to love the interpretability of that rule).

## Designing HIPAA compliant solutions

Given the above constraints, it is essential that any application that you design takes these anonymization and/or de-identification requirements into account before any data is shared with any external entity. PHI data can be "shared" with an external entity provided you have BAA ([business associate agreement](http://healthcare.partners.org/phsirb/hipaaglos.htm#g7)) in place and the individual has signed the appropriate consent documents. How PHI needs to be managed under HIPAA is a whole topic in itself. Look for a blog post from us shortly describing how we enable HIPAA compliance and simplify adherence to the letter and spirit of the law at [Datica](https://datica.com/).
  