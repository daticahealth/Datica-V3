---
id: RT8nZZqxeSOmKQu4Ukys2
title: HIPAA Contingency Planning + Disaster Recovery
slug: hipaa-contingency-planning-disaster-recovery
pub_date: '2018-06-14'
author: 1gpUmvd6yuOKUIUIY620i0
tags:
  - tags/hipaa
discovery_topic: discovery_topic/aws-hipaa
summary: >-
  Business associates and subcontractors need a HIPAA disaster recovery
  contingency plan in place to maintain the integrity of ePHI in case of a
  disaster.
related_guide: 1L20oQXl3G2cKSm4gg2wuc
related_entries:
  - 1eK0941hX4icwGkikGCKQg
  - SMDqjNdTaKCGU60Ow6eYu
  - 4Tq4oXCp9miK2SeuIAi8yg
cta_ref: O1KP7bmXwOqCu0C4AMwkO
---
The HIPAA rules place great weight on the integrity of protected-health information. The reason is that protected-health information is something that's important for somebody's health - if they were to be in an accident or they were to need health services, the ability to look back at their health information, an informed clinical decision-making, management treatment, all of those things. Protected-health information is very, very important. As such, one of the required elements within the HIPAA security rule is around contingency planning.

Section 164.308(a)(7)(i) of the HIPAA Security Rule states:

>*Establish (and implement as needed) policies and procedures for responding to an emergency or other occurrence (for example, fire, vandalism, system failure, and natural disaster) that damages systems that contain electronic protected health information.*

What that means is planning for an outage, a disaster, or for some condition where systems' infrastructure databases are not accessible or damaged or in some other way not usable. It's crucial that business associates and subcontractors have policies and a HIPAA disaster contingency plan in place to assure that, in the case of a HIPAA disaster, so they can maintain the integrity of ePHI.

A good example would be Hurricane Katrina. After the hurricane, locally stored health data was not redundant and available in other regions, and that data was not accessible immediately following the outages caused by Katrina. The VA, however, had data accessible from other regions so it was able to access data.

The first step is developing a HIPAA disaster recovery (DR) plan. A DR plan outlines the process and plan in case there's a disaster - like a a fire, an explosion, or massive power outage (with failed power backup) – at the data center where your servers are stored. It could be a closet in your house; though, I certainly hope not for physical security reasons. Most likely, which is the case with Datica, your contingency plan for disaster involves a rack at a data center somewhere. DR is about planning for what might happen if that data center, for whatever reason, is inaccessible or unusable.

The first step is in actually assuring that you have thorough backups; so backing up your data, settings, and configurations on a very regular basis is very important for DR. We replicate data to another geographic region and automate the provisioning and "stand-up" scripts using tools like [Salt](http://www.saltstack.com/) across providers to assure availability in the case of a disaster. Note that the DR environment doesn't need to be an exact copy of your production environment (although you could choose it to be so). DR doesn't require you to have a "hot" standby either, i.e. an exact copy of your environment (load balancers for high availability, multiple application, and database nodes, etc.) as having this "hot" environment always available is expensive. Ultimately, your HIPAA disaster recover requirements are driven by trade-offs that you are willing to make between cost and possible down time. The key inputs into that decision are:

- How mission critical is your application? Directly impacts patient care for example.

- What could your revenue impact be for downtime? And what have you committed to in your SLAs to your customer - the business (within enterprises) or to enterprises (if you are a vendor)

Once you have a good backup strategy and plan in place that you've implemented and tested to assure that they're accessible, the next step is assuring you have a process and plan in place for how you would initiate using those backups. Typically, a DR policy defines the roles of the people that are going to be involved in recovering from a disaster and the key steps in communication that need to take place. Usually there is, as a part of a HIPAA disaster recovery plan, a plan for an emergency setup. How do you reconfigure and redeploy your infrastructure in a new data center or into a new environment that might not be optimal (maybe no high availability, for example)? The next step is how you actually migrate back to the environment that your infrastructure was in originally, if that infrastructure can be reinstated or reused.

Disaster recovery and actual backups are very important, and both are things that are not that fun to do. They take time, and there are resources that need to be dedicated to actual backups. With Datica, we work with you to solve that section of HIPAA. We have a backup process that we can quickly implement unless you already have one in place or would like to incorporate what you've already set up in to the process we have.  We have a very detailed disaster recovery contingency plan that covers all the elements outlined above. We ensure that if something happens to your infrastructure, which we are managing for you, we can stand it back up.

When it comes to the disaster contingency plan requirement, not only do we meet the technical safeguards and provide you with the technical infrastructure and the tools pre-built to do it, we also have the policy in place for it; and our policy has been assessed by a third party auditor. As an organization and Datica customer, if you're developing your own HIPAA policies, you can inherit or use our HIPAA disaster recovery policy in its entirety. It is essentially your DR policy.

  