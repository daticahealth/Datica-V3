---
id: 4wVqYkwjzaogEAuecsSsky
title: 'HIPAA, Subcontractors, and BAAs'
slug: hipaa-subcontractors-and-baas
pub_date: '2018-08-16'
author: 1gpUmvd6yuOKUIUIY620i0
tags:
  - tags/hipaa
discovery_topic: discovery_topic/hipaa-compliance
summary: >-
  The major part of security in healthcare is HIPAA, and the HIPAA rules changed
  in late 2013 with the new HIPAA Omnibus that adds subcontractors entities.
related_guide: 6evss0t4I0IC2cQasg0K2O
related_entries:
  - 4Tq4oXCp9miK2SeuIAi8yg
  - 5Eape5yb0k0SGOu2Asw0ss
  - 3bwNayxEnYkukwYQ6Qqee0
  - 4Rg9WxKcCIyeySMoUu0o8A
cta_ref: 4OCkYKXr2EEQSIcse0GQOq
---
Our mission is to help developers build health apps and technology. Specifically we want to offer tools and services to deal with the security and data challenges in healthcare. The major part of security in healthcare is HIPAA, and the HIPAA rules changed in late 2013 in ways that we've been planning for at Datica. The new HIPAA Omnibus ("omnibus" means something with several volumes or chapters, I didn't know that so I looked it up and thought I'd share) rules that went into effect on 9/23, amongst other changes, created a category of entities called subcontractors.

Previously HIPAA rules only defined two categories of entities - covered entities and business associates. Covered entities are basically providers, payers, and clearinghouses. Business associates are basically entities that work with covered entities to perform a service or services to store, transmit, and/or process PHI. The new HIPAA rules expanded the number of categories of entities by 50% with the addition of subcontractors; for those of us in health tech, we think this is a pretty big deal.

Subcontractors are entities that business associates use to process, create, or store PHI. Subcontractors don't have business associate agreements, or really any direct relationships, with covered entities; but, starting 9/23/2013, theses subcontractors need to have business associate agreements (BAAs) with business associates. It's all very obvious and confusing at the same time. Essentially you can think of subcontractors as a business associate of a business associate.

The best examples of subcontractors we can think of are hosted services providers like Amazon Web Services, Datica, and Rackspace. Datica is a subcontractor for some of our customers and, as such, we do sign BAAs. We also act as a business associate directly for covered entities like enterprises, and sign BAAs in this capacity as well. We offer the same API-based services for developers in both circumstances, but the relationship is slightly different in the eyes of HIPAA.

At Datica we know that subcontractors, as defined by HIPAA, have existed for a long time. As more health apps and services have shifted to hosted, or cloud based, and more infrastructure tools (app dev, logging, analytics, data collections, etc) have become mainstream, covered entities and business associates have begun to rely on "subcontractors". The new HIPAA rules now mean those subcontractors need to work with business associates to assure all parties are covered in terms of liability.

This is a very exciting and major shift for health tech. HIPAA has finally acknowledged subcontractors and the role they play in creating, processing, and transmitting PHI. That's important for health tech to build smart, scalable, and interoperable tools. As a developer in healthcare, if you're considering acting as a business associate, or selling services to a covered entity, you need to understand if you fit into a certain entity category as defined by HIPAA.

We encourage you to read the rest of the new [rules](http://www.hhs.gov/news/press/2013pres/01/20130117b.html), or at least one of the commentaries that covers them in more detail, to see about the other changes that are a part of the Omnibus rule. If you have any questions related to the new rules, where you potentially fit, and how we can help you mitigate your risk, shoot us an [email](mailto:hello@datica.io).
  