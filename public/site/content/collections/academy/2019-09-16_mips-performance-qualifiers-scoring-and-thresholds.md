---
id: 3Iee6Vz2d2mK2KgkaMOgQw
title: 'MIPS Performance Qualifiers, Scoring, and Thresholds'
slug: mips-performance-qualifiers-scoring-and-thresholds
pub_date: '2018-07-18'
author: 3azwOe9v3O4YSuyU0gsuo6
tags:
  - tags/company
discovery_topic: discovery_topic/hitrust
summary: >-
  High performance scores and ratings can be a strategic advantage over
  competitors. Understand MIPS, including qualifiers, scoring, and threshholds.
related_entries:
  - 4GI60TmT6wq08eAskWGSUo
  - E1VA55CiNq2Ioa4wm2y4Q
  - 5Eape5yb0k0SGOu2Asw0ss
cta_ref: 4OCkYKXr2EEQSIcse0GQOq
---
The scoring in MIPS is based on a composite score across four dimensions, summarized as:

- Quality: based on Physician Quality Reporting System (PQRS)
- Resource Use: based on Value-Based Modifier (VBM)
- ACI (Advancing Clinical Information): based on Meaningful Use (MU) and 
- Clinical Practice Improvement Activities (CPIA): a new fourth category. 

The scoring is out of maximum of a 100, but the formulas are not initially intuitive.

Each performance category (PQRS/VMB, ACI, RU and CPIA) is scored separately as a percentage of maximum possible performance within that category. The category-level scores are then weighted by the appropriate category weight and then summed up, i.e

> 50% x PQRS + 25% x ACI + 15% x CPIA + 10% x RU = CPS. 

It is interesting to note that given this weightage and the way the scoring works within each category, physicians who have historically performed well under MU and avoided PQRS and VBM penalties may not have high enough ACI or MIPS Quality scores to avoid MIPS penalties. MIPS forces historically high performers to re-evaluate their performance status under MIPS, given how the MIPS scoring system differs from those of MU, PQRS and VBM. As a quick example, if eight measures were to be used in the quality category (and they are and all drawn from PQRS and VBM) and each earned eight points each, then the total points would be 8 x 8 = 64 out of a possible 80 points, or a 64/80 = 80%. But as the Quality category for the CY2017 performance year has a weight of 50%, then a quality score of 80% would result in the Quality category contributing 80% x 50% x 100 = 40 points to the clinician’s overall CPS.

Now let's consider the fact that the score obtained will be compared against *all other qualified*—i.e. MIPS eligible physicians—for a previous performance period. Based on a sample comparative chart published [here](https://www.federalregister.gov/documents/2016/05/09/2016-10032/medicare-program-merit-based-incentive-payment-system-mips-and-alternative-payment-model-apm#h-78), if each of those above PQRS measure is only better than 60% of peers reflected in the benchmark, then that measure would earn only earn 7 out of 10 possible points, i.e. the overall score calculated above would now drop to 70% x 50% x 100 = 35 points.

### Scoring in the Quality Category

MIPS essentially adopts the quality measures and reporting methods from the PQRS and VBM programs. Although there are some changes to the PQRS reporting methods, for the most part the quality reporting methods remain the same.

The process works as follows:

1. **Select a minimum of six PQRS measures, across any combination of quality domains**: Constraints are that one measure is a cross-domain measure if the clinician is patient-facing, and one measure is an outcome measure (or a high priority measure, if an outcome measure is unavailable). These measures can be drawn from the EHR, Qualified Clinical Data Registry (QCDR) and registry reporting methods. 
2. **CMS will calculate 2 or 3 cohort based claims quality measures**: Two for individual clinicians and groups with less than 10 clinicians and three for groups with 10+ clinicians. This compares peer groups with each other and can have an additional impact on scoring.
3. **Bonus points**: MIPS also provides additional paths to achieve a quality score of 100% by granting bonus points for certain quality reporting activities. So if two bonus points were earned in the earlier example, then the quality score would increase to (64+2)/80 = 82.5%, resulting in 82.5% x 50% x 100 = 41.25 CPS points. 

### Scoring in the Advancing Care Information (ACI) Category

MIPS changes MU (renamed to ACI) from an all-or-nothing compliance program to a continuous scoring system where MU measure rates are compared to benchmarks in much the same way as described for the MIPS Quality category described above.

For example, currently, if a clinician in the existing MU program achieves a performance rate of 15% on an MU measure with a compliance threshold of 10%, then that clinician is just as compliant with MU as another who achieves a 90% rate on the same measure. However, under the ACI scoring system, the former will only earn two out of 10 performance points, whereas the latter will earn 10 out of 10 points, according to the decile measure scoring scale. This explains why a historically high MU achiever may end up having a low ACI score if MU performance rates do not improve.

The process works as follows:

> 1. **Base score**:  The ACI category defines 131 ACI performance points that can be earned. 50 points are earned for reporting either a non-zero numerator or a “yes,” as applicable for measures selected. The ACI percentage score is calculated by dividing the number of ACI points by 100 and capping the percentage at 100%, should more than 100 ACI points be earned. For example, 80 ACI points equates to 80% ACI performance, resulting in 80% (ACI performance) x 25% (ACI category weight) x 100 = 20 CPS points contributed by ACI.
> 2. **Performance Score**: Up to 80 points for performance on eight measures per the decile scoring scale described above.
> 3. **Bonus Points**: Up to 1 bonus point for reporting to an additional public health registry

### Scoring in the Clinical Practice Improvement Activities (CPIA) Category

Under MIPS, a clinician can earn up to 60 points within the CPIA category. 

The process works as follows:

> **Base score**: Based on various rules (size, location, APM or medical home participation), physicians can earn either the full 60 points or some fraction thereof. 

The CPIA percentage score is calculated by dividing the total CPIA points by 60. For example, 30 points would yield a 30/60 = 50% CPIA performance score, which in turn would deliver 50% x (15% CPIA category weighting) x 100 = 7.5 CPS points.

### Scoring in the Resource Use Category

MIPS rates clinicians for Resource Use (Medicare costs of attributed patients) based on 40+ cost measures to account for differences among specialties. 40+ cost measures are to be used. The hope is that this variety of cost measures will be able to account for differences among specialties.

The process works as follows:

> **CMS collects and scores based on historical claims data**: There are no separate reporting requirements for clinicians, as the measures are calculated based on claims collected by CMS.

Similar to the Quality category, measures can earn up to 10 points each on a percentile benchmark scale, and a resource use percentage score is earned by dividing the total points across included measures by the total possible points. The percentage score is then multiplied by the Resource Use category weight (10% for the CY2017 performance year) to deliver the CPS points contributed. 

For instance, say a clinician earns 8 and 8 points respectively on two included cost measures. Then the category contributes (8+8)/20 x 10% x 100 = 8 CPS points. 

### Calculating the overall CPS score

Assuming that the numerical examples used for the four categories as described above all apply to the same clinician, we can calculate a total CPS from the components as follows:

> - Quality = (56 of 80 points) x 50% weight x 100 = 35 CPS points
> - ACI = (50 of 100 points) x 25% weight x 100 = 12.5 CPS points
> - CPIA = (40 of 60 points) x 15% weight x 100 = 10 CPS points
> - Resource Use = (14 of 20 points) x 10% weight x 100 = 7 CPS points
> - Total CPS points = 35 + 12.5 + 10 + 7 = 64.5

### Reputation and reporting

CMS publishes provider specific performance measures through its [Physician Compare website](https://www.medicare.gov/physiciancompare/search.html) for consumers to browse and commercial or any other third party physician rating websites to use. As out-of-pocket costs grow, patients are looking for more transparency into clinician quality and the cost-value trade-off. A recent [JAMA study](http://jama.jamanetwork.com/article.aspx?articleid=1829975) found that 65% of consumers are aware of online physician rating sites and that 36% of consumers had used a ratings site at least once. MACRA provisions address this consumer demand. MIPS will publish each eligible clinician’s annual Composite Performance Score (CPS) and scores for each MIPS performance category about 12 months after the end of the relevant performance year. In addition, all statistically significant measure values in the Quality, Resource Use and Advancing Care Information (ACI) categories for each clinician will be available for free download. Activities reported for the Clinical Practice Improvement Activities (CPIA) category will be listed for every clinician. Physician Compare will continue to publish cost utilization data for all Medicare Part B clinicians.

Unlike direct Medicare reimbursement impacts which can change year-to-year based on clinician performance, damage to a clinician’s online public reputation may take years to reverse. Conversely, consistently high performance scores and ratings can become a strategic advantage over competitors. So, while there are advantages to being on the high end of the range, short term scoring changes can possibly cause significant business impact on organizations. From a risk perspective, it does make sense to report at the cohort / TIN level rather than at the individual physician level as a way to aggregate and minimize variation. This also puts larger physician groups at an advantage for MIPS.
  