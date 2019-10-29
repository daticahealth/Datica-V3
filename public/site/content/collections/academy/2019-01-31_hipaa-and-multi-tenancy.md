---
id: 2uVitrbH7qy2OyeGwcGEO2
title: HIPAA and Multi Tenancy
slug: hipaa-and-multi-tenancy
pub_date: '2018-01-12'
author: 2B98PdoITGQAYwcWk2muY4
tags:
  - tags/hipaa
discovery_topic: discovery_topic/healthcare-cloud
summary: >-
  What exactly is multi tenant cloud and does Datica Compliant Cloud offer a
  multi tenant environment?
lead: >-
  Datica provides HIPAA compliant and HITRUST CSF Certified hosting and
  integration solutions for a variety of customers. These HIPAA and HITRUST
  audits have been performed by a national third party
  [(*Coalfire*)](https://coalfire.com). In the case of HITRUST, we have been
  through additional scrutiny in the context by the certifying authority, namely
  [HITRUST](https://hitrustalliance.net).
related_guide: 1L20oQXl3G2cKSm4gg2wuc
related_entries:
  - SMDqjNdTaKCGU60Ow6eYu
  - 4yuVlN4hWw0wgM6SOaae0G
  - 6hcZMUL5qoc0SyssOiUMCi
cta_ref: 3VsDfgWFYcksgkUq2iyMAQ
---

As we continue to grow our customer base, we get asked about Datica being a multi-tenant solution and the supposed security challenges that could perhaps arise because of that. We felt that it made sense for us to write up this "position paper" on multi-tenancy and security. Our hope is that this post will clarify our security posture and provide others with a few pointers on better security practices.

## The cloud by definition is multi-tenant

One of the first things to note is that in the modern cloud computing world, **everything** is multi-tenant. All the IaaS providers you use such as Google, MSFT, AWS and Rackspace are multi-tenant. All the SaaS companies that you know and use, such as Salesforce, Intuit and Stripe are multi-tenant. But before we discuss how multi-tenancy and security are not orthogonal, it would be worthwhile to explain tenancy in the cloud context so that we are all on the same page.

In cloud computing, tenancy generally refers to how the platform (PaaS or Platform as a Service) and underlying infrastructure (IaaS) are shared among different customers. Before we explore this further, let's setup an analogy. Let's setup an apartment building with multiple rental units (tenants). The building itself can be compared to an IaaS (bricks, mortar etc.). The building comes with property management i.e. shared water pump, utilities management (electricity, sewage, garbage collection and so on) and maintenance. Property management can be considered equivalent to a Platform as a Service (Datica Compliant Cloud) i.e. a service that takes care of the details so that the renter (tenant) doesn't have to. Given that analogy, let's dig a bit deeper.

### A multi-tenant cloud is where all customers share the same cloud infrastructure. This does not mean that customers can see each other’s data.

Going back to the analogy, it is the property management organization's responsibility to ensure that Jane Appleseed's key for apartment 101 does not allow her access to apartment 102. She only has access to her occupancy. But she only has one garage door opener with a code specific to her but managed centrally. Similarly, it is the Platform's (Datica Compliant Cloud's) role to ensure that a tenant only has access to their environment (apartment) and associated services (rooms and garage).


### Shared infrastructure automatically places a greater emphasis on security. Access to the multi-tenant environment is strictly controlled and customers get a view of **only** their data.

In the analogy, this requirement forces the property management group (PaaS provider) to plan for separate mailbox keys, tracking users of those keys, correlating keys with the occupants of the apartment, having a doorman to prevent the random pizza guy from entering the building and so on. Living in a building with a doorman is much more secure than an automated buzz-someone-in system. This is what Datica Compliant Cloud manages and maintains on an ongoing basis. We also hire external penetration testers on an annual basis, scan our networks weekly, perform penetration tests internally on a quarterly basis and track possible security breaches as part of our service.

### The benefit of a multi-tenant model is that the provider can **maintain** a shared infrastructure for all customers.

Customers benefit from always being on the latest version of all underlying software - the OS (operating system), the databases, webservers, etc. In the unlikely event that one of our customers learns about a problem before we do, we can immediately take action and ensure that the appropriate fixes get put into place quickly for all our customers. When it’s time to upgrade Datica Compliant Cloud, all of our customers are upgraded at the same time and share the same experience. In the analogy, if property management decides to replace the aging solar panels with more performant ones, all of your tenants get the benefits at the same time. Maintenance is a significant cost not only to the service provider but also to the customer so the easier and cheaper it is, the better off all parties will be. Or in other words...

> The key to performance is elegance, not battalions of special cases. — Jon Bentley and Doug McIlroy

For example, Salesforce.com, at the relatively high end of the multi-tenancy spectrum, has 72,500 customers who are supported by 8 to 12 multi-tenant instances (meaning IaaS/PaaS instances) in a 1:5000 ratio. Said differently, each multi-tenant instance supports 5,000 tenants who share the same database schema. Intacct, a financial systems SaaS provider in the middle of the spectrum, has more than 2,500 customers who share 10 instances in a 1:250 ratio. [Source](http://www.computerworld.com/article/2517005/data-center/multi-tenancy-in-the-cloud--why-it-matters.html)

At Datica, we go several steps more to ensure our customers security and isolation.

- AppArmor profiles: ensure that containers are isolated as much as the underlying operating system allows.
- Encryption in-transit: ensures that even **within** your environment, all network traffic is encrypted with customer specific keys
- Encryption at-rest: enforces all volumes are encrypted
- Customer specific app, database (and cache): are specific to each customer and never shared.
- Dedicated logging  and monitoring for each customer: to reduce your costs while ensuring your environment remains compliant.
- Dedicated networking: to assure isolation of all traffic on a per customer basis.

This is essentially no different from you managing your own set of containers on a IaaS provider. At Datica, our goal is to simplify infrastructure and compliance so that you can focus on your application features and your customers.


  