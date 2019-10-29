---
id: 5kwY6YTmKIuwCU482esGAQ
title: HIPAA Compliance at the Application Level
slug: hipaa-compliance-application-level
pub_date: '2017-05-24'
author: 3azwOe9v3O4YSuyU0gsuo6
tags:
  - tags/hipaa
  - tags/healthcare-cloud
discovery_topic: discovery_topic/healthcare-cloud
summary: >-
  While HIPAA Compliance at the infrastructure level is heavy on technology,
  HIPAA Compliance at the application level is more of a blend of technology and
  policy.
lead: >-
  HIPAA Compliance at the infrastructure level is very heavy on technology.
  Encryption of PHI while in transit, disaster recovery—these are intense
  technical considerations.


  Compliance at the application level is more of a blend of technology and
  policy. While it's true major technological considerations exist—for example,
  don't store plaintext passwords!–components like Access Control Lists (ACLs)
  and credentialing are just as important as far as HIPAA goes.
related_guide: 1L20oQXl3G2cKSm4gg2wuc
related_entries:
  - 7BC902tFlKQwC6YygGECKY
  - 7HB7ygGh7aG8Ys2OMkqqK2
  - BVDSUKb8bI44Cgeq44MMU
cta_ref: 6fm8uDgwG4eaQ2mQUUuSMQ
---
Here are a few domains to consider related to HIPAA compliance within a digital health application.

## Credentials and provisioning
The value of a digital health product is the personal experience bestowed upon each user. That can't happen without authentication and authorization.

Authentication is one of the primary threat vectors from malicious network actors, so getting it right is a major part of compliance. Often an existing enterprise already has an LDAP or Single Sign-on (SSO) mechanism in place, so a digital health application will need to integrate with those on a customer-by-customer basis.

Don't forget with onboarding new users that all communication here must be compliant and secure. For example, don't share passwords or PHI via email, and understand how email is one of the most exploitable threat vectors that exist in today's enterprise technology climate.

Rotating passwords is a compliance requirement, so implementing a plan which helps users reset their password regularly and securely is a requirement.

## Access Control Lists (ACLs)
Access Control Lists, or ACLs, are a concept that manages what data can be seen by which users. ACLs are enormously complicated because there are many variables: People, roles, geography, employment, BAAs, plus many more factors. Being uncalibrated either way can be disastrous: On one side, you might get angry users who are upset they are blocked from seeing some data they should see. On the other side, if too much data is exposed, you violate HIPAA compliance and those people are even angrier. The former results in users not wanting to use your product and giving bad word-of-mouth recommendations, while the latter results in bad press and potentially lawsuits.

Administration of ACLs has many dimensions. For example, an ACL could change situationally by user role and location.

ACLs are managed at the application level and are a major part of HIPAA compliance.

## Usage audits
Continuous auditing at the infrastructure and application levels is a requirement for compliance. At the infrastructure level, it’s things like process logging. At the application level, it's things like tracking which authenticated user saw what data when.

Proper app audits track who saw what and when. Keep in mind these [audit logs need to be stored](https://datica.com/academy/hipaa-auditing-and-logging/) in a compliant way as well since it's probable the logs have PHI in them.

## Technical considerations
The good news about compliance at the application level is there are few "gotcha's" with regards to technology and security. Simply put, if the product is secure, then it will be compliant. The basics you would do whether you are in healthcare or not will cover HIPAA.

For example, don't store plain text passwords. Ensure you don't leave open any form vulnerabilities which expose your database (good old [Bobby O'DROP_TABLE](http://bobby-tables.com/) will never die). Elements of that nature.

If you do the basics all application developers should do anyways, you'll be compliant.

## Proving compliance at the application level
Which leads to how to prove compliance.

At the infrastructure level, it's easy—and common—to find a partner who does most the work. Maybe you are deployed directly on AWS and handle most of the compliance obligations yourself. Maybe you utilize [Datica's platform](https://datica.com/compliant-cloud/) to satisfy the entirety of HIPAA compliance at the infrastructure level. The point is it's possible and common to let someone else take care of compliance at that level for you. The end result is _they_ will prove compliance on your behalf. For example, Datica is HITRUST CSF Certified and had 3 independent audits. Leveraging that is how you prove compliance at the infrastructure level.

But the fact of being a digital health company, and the very nature of building an application, means _you_ own this level. You can't hand off the risks and compliance obligations to someone else. Consequently, it's on _you_ to prove compliance.

The good news is it's possible. The bad news is it's not free.

In short, the best way to prove compliance at this level is to get your company audited by an independent auditor, who will examine your company in totality, or the app specifically. For more information, check out our blog article discussing [the cost of a HIPAA audit](/blog/what-is-the-cost-of-a-hipaa-audit/).


  