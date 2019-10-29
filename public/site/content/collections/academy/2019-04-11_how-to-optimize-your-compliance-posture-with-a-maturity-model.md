---
id: 4wjw4vEf6gCkgCA0mIQgO0
title: How to Optimize your Compliance Posture with a Maturity Model
slug: how-to-optimize-your-compliance-posture-with-a-maturity-model
pub_date: '2018-10-09'
author: 1gpUmvd6yuOKUIUIY620i0
tags:
  - tags/hitrust
discovery_topic: discovery_topic/hitrust
summary: >-
  In this guide, we will walk you through the reasoning, structure, and ways to
  leverage a maturity model, such as the HITRUST maturity model, to optimize
  your compliance posture.
lead: >-
  Many people view compliance as a checkbox or something you just have to do in
  order to operate within a certain geographic or vertical market. While
  privacy, compliance, and security are not the same things, none of them are
  simple bolt-ons or checkboxes. Another common misconception is that doing
  security right means you are compliant. This is simply untrue and represents a
  historic view of compliance as a liability instead of as an asset to be used
  for competitive advantage.
related_entries:
  - 3xrZxi1Z8caYQOG0EagsGo
  - 43dQoBKc9OuQuyw8k2SmKO
  - 1s1UlhAhkAwwewk20ugYsW
  - 4STmWUVa5WwkaWyi2UYG8U
  - UTYZcJYtm86gqicwYkgOc
cta_ref: 2M0gHKQ8qsmq4WWaw8GG8M
---

Compliance is not binary but when you think about it as a checkbox or afterthought you end up framing it in that way. The nuance of compliance is represented well in the maturity model now commonly used in practice for evaluating compliance programs and requirements. Maturity models take different forms. At Datica, we leverage HITRUST for our compliance program so use the HITRUST-specific flavor of maturity model, which in turn is based on the [NIST Program Review for Information Security Management Assistance (PRISMA)](https://nvlpubs.nist.gov/nistpubs/Legacy/IR/nistir7358.pdf) methodology. In this guide, we will walk you through the reasoning, structure, and ways to leverage a maturity model to optimize your compliance posture.

## The Purpose of the Maturity Model

The PRISMA framework was created by NIST to support the vast array of information technology and information security requirements of federal agencies. In this mandate, it has flexibility and extensibility built into the maturity model. This flexible structure is highly aligned with the needs of a compliance maturity model for the cloud as the cloud has a huge array of different technology implementations and use cases. Additionally, as we will see with the actual scoring of maturity models, the thresholds can be set differently based on the risk to specific organizations and information system environments.

## Structure of the Maturity Model

The PRISMA model, and similarly the HITRUST maturity model, have five distinct maturity levels. For the purposes of this guide, we will focus on the [HITRUST maturity model](https://hitrustalliance.net/documents/csf_rmf_related/RiskAnalysisGuide.pdf) from this point on, which again is a modified version of the PRISMA with the first three maturity levels being the same. HITRUST, in its own words, buckets levels one through three as “design effectiveness” and levels four and five our as “operational effectiveness”.

The HITRUST maturity levels are outlined below with summary points.

1. __Policy.__ These are the high-level policy and standard documents that outline the goals and define the overarching compliance program within an organization. HITRUST clearly states that these include “shall” and “will” statements, clearly articulating, in writing, the formal goals of an organization. The starting point for policies is often a mix of internal data privacy needs and external compliance regimes to which the organizations must attest and ultimately comply.  These should be made easily accessible to all employees and contractors.
2. __Procedures.__ Procedures define the ways in which policies are to be carried out or implemented as well as the specific teams and individuals that are responsible for them. In the simplest form, procedures outline how an organization follows its own policies. This can be an extremely detailed and difficult step but is essential to tying policies, above, to implementation, below, in a consistent and defensible way.
3. __Implementation.__ This is the actual implementation of the controls (settings, configurations, etc) that are defined by procedures and mandated by policies. Once implemented, and ideally required by procedures, these implementations should have some initial testing performed to ensure baselines have been achieved.
4. __Measurement.__ Ongoing, not one and done, testing of all three of the above maturity levels is required to successfully achieve this level. These are self-assessments performed internally within an organization. Baseline metrics or KPIs for policies, procedures, and implementations should be defined and tracked over time. Threats are dynamic, more now than ever with the pace of technology and the cloud, so those need to be continually assessed as well. In some respects, this maturity level is an ongoing risk assessment or a set of mini risk assessments.
5. __Management.__ From our experience, “Managed”, as a maturity level, is the least well understood; it’s also rarely achieved or fully achieved, by organizations going through a HITRUST assessment. Managed is tied to Measured above in that it is assessing how an organization responds to the outcomes, or measures, of control testing. An example is when testing detects anomalies. In those cases, do organizations have processes and procedures that are followed to assess the root cause of the anomalies and then address or make changes as to ensure alignment with policies and procedures. One key activity in this level is setting metric goals and then assessing and responding to those over time.

## Privacy, Security, and Compliance

There is a tight interplay between privacy, security, and compliance. Oftentimes there is confusion on the boundaries of each. Leveraging the maturity model is an easy way to differentiate, albeit with some gray area remaining, between these increasingly important functions. At Datica, we take this approach and leverage it to break down the maturity model to assess our privacy, compliance, and security independently.

We view Privacy as largely residing at the Policy level, with some input from Compliance in terms of external frameworks and requirements (like GDPR in Europe). Procedures are coupled tightly with Implementation and both align with the functions of Security. The last two levels, Measurement and Management, fit with the functions of Compliance to continually assess, certify, and document necessary compliance artifacts and corrective action plans.


<div class="row bg-white collapse pad group align-middle align-justify">
  <div class="columns small-12 medium-6">
    <figure>
      <img class="" alt="maturity model diagram w. continuum" src="//images.ctfassets.net/189dvqdsjh46/4d7HgAMBriyoAOCYm0MGKg/538c5a18f98fa79bfe61a95265d451d4/maturity_model_diagram_w._continuum.png?w=640" />
      <figcaption>Fig. 1: Capability Maturity Model. The first stage, Privacy, is the most basic, with last stage achieving more complete compliance.</figcaption>
    </figure>
  </div>
  <div class="columns small-12 medium-5">
    <h4>What is a Control?</h4>
    <p>Example: <code>"Users shall only be provided with access to
    internal and external network services that
    they have been specifically authorized to use.
    Authentication and authorization mechanisms
    shall be applied for users and equipment."</code></p>
    <p>Each piece of technology needs to go through a similar process.</p>
    <p>This is an example <strong>Capability Maturity Model</strong> that some frameworks use to understand the maturity of controls.</p>
  </div>
</div>

## How HITRUST Scores the Model

Scoring of the maturity model is complex and beyond the scope of this article. At a high level, each control, of which there can be hundreds, is assessed against the maturity model. The maturity model is not applied to an organization as a whole, but to each specific HITRUST control. For each control, each maturity level is rated as: 

* Non-Compliant (0%),
* Somewhat Compliant (25%),
* Partially Compliant (50%),
* Mostly Compliant (75%), or 
* Fully Compliant (100%). 

The percentage is supposed to coincide with a rough numerical equivalent. When completing a HITRUST assessment, there is a rating for each maturity level for each control. If you have 50 relevant HITRUST controls, you have 250 maturity ratings (50 x 5). These ratings are verified by 3rd party assessors and ultimately certified by HITRUST. These ratings are then used to calculate an overall rating, which determines if you pass or fail the assessment.

## How to use the Maturity Model

The maturity model is an excellent framework to build, maintain, and optimize a full stack compliance program; in HITRUST terms, it can be used to both “design” and “operationalize” your compliance program. _Full stack_ in this context means _full stack maturity_, or successfully demonstrating compliance across all levels of the maturity model. In practical terms, even using the maturity model as a guide, there is not a time when you are “fully compliant” and can sit back and relax. Compliance needs to be ongoing and proactive, and the maturity model is a framework that can be leveraged to do that over time and to meet the myriad of new technologies, partnerships, data, and compliance tools.

At Datica, we leverage the [HITRUST maturity model](https://datica.com/compliance/). We used it to ensure consistency from policies, or privacy, through implementation, or security, to management, or compliance. We even classify the technology tools we use into the levels of the maturity model they help to address. An example of this would is the logging mechanism we use fits into implementation, the events we log into procedures and policies, and the documentation of log review into measurement and management. We have had successful outcomes, and eased our external audit burden, by aligning and mapping our privacy, security, and compliance posture to a maturity model.





  