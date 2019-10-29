---
id: 4STmWUVa5WwkaWyi2UYG8U
title: >-
  Google Cloud SQL Guide - How to configure GCP Cloud SQL to comply with HIPAA
  and HITRUST
slug: google-cloud-sql-guide-how-to-configure-gcp-cloud-sql-to-comply-with-hipaa
pub_date: '2018-10-02'
author: 2B98PdoITGQAYwcWk2muY4
tags:
  - tags/cloud-computing
  - tags/hipaa
  - tags/compliance
discovery_topic: discovery_topic/hipaa-compliance
summary: >-
  This guide helps developers configure their Google Cloud SQL instance to be
  HITRUST CSF ready. It covers requirements, controls, and configurations for
  GCP Cloud SQL.
lead: >-
  This guide is intended to give developers an easy to understand, step by step
  run book to configuring their Google Cloud SQL instance to be HITRUST CSF
  ready. In the following sections we’ll walk through the requirements,
  controls, and configurations for GCP Cloud SQL.
related_entries:
  - 43dQoBKc9OuQuyw8k2SmKO
  - 1s1UlhAhkAwwewk20ugYsW
cta_ref: 6fm8uDgwG4eaQ2mQUUuSMQ
---
_Disclaimer: while utilizing these guides can provide alignment with HITRUST, it is still your responsibility as an organization to complete an audit and obtain certification._

<div class="blog-date nomargin text--gray-6">Step 1</div>

## The Business Associate Agreement (BAA)

Google Cloud Platform requires users to contact their account manager to get a BAA signed. From Google: 

> "Execute a Google Cloud BAA. You can request a BAA directly from your account manager."

Only once you’ve signed the BAA and subsequently configured your SQL database to be compliant should you start accepting PHI.

More on BAAs can be found in the [Datica Academy](https://datica.com/academy/).

| Rule     | Header     |
| ---------- | ---------- |
| HIPAA &sect; 164.308       | N/A: GCP does not provide an API to the BAA       |

<div class="blog-date nomargin text--gray-6">Step 2</div>

## Working with VPC networks

Before we jump into creating our SQL instance, first we’re going to create a new VPC and subnet. Creating a network and a subnet is very simple with GCP. Follow these steps.

1. In the left side navigation find "*VPC network*" under the "*Networking*" heading
2. Above the table of default networks, click the "*Create VPC network*" button
3. Fill out the name, and description fields and then select "*Subnet creation mode*" under the "*Subnets*" section
4. In the box titled "*New subnet*" fill out a name
5. The region should be the same region as the database
6. For the IP address range, you should use a standard private VPC network address range
7. For "*Private google access*" which indicates: " *...whether VMs in this subnet can access Google services without assigning external IP addresses* " select "*Off*"
8. Set flow logs to "*On*"
9. Set "Dynamic routing mode" to "*Regional*"
10. Click "*Create*"

| Related Control(s)     | API Reference     |
| ---------- | ---------- |
| HITRUST 0805.01m1 Organizational.12       | [subnetworks](https://cloud.google.com/compute/docs/reference/rest/v1/subnetworks) , [networks](https://cloud.google.com/compute/docs/reference/rest/v1/networks)       |

<div class="blog-date nomargin text--gray-6">Step 3</div>

## Creating the database

Now that we have a network and subnet, we can create our database. To do that, click the menu button in the top left and follow these steps:

1. Select "*SQL*"
2. At the following prompt, select "*Create instance*" <img class="lozad tofigure" alt="Creating a Cloud SQL instance" src="/assets/academy/cloudsql-1.png?fm=png&fl=png8&w=600" data-src="//images.ctfassets.net/189dvqdsjh46/6tB9ogqgPCGImsOC4wiEcW/edfe8828e0505dc5685e5597b4558d59/cloudsql-1.png?fm=png&fl=png8" />
3. Make a selection for "*MySQL*" or "*PostgreSQL*" <img class="lozad tofigure" alt="Choosing database type" src="/assets/academy/cloudsql-2.png?fm=png&fl=png8&w=600" data-src="//images.ctfassets.net/189dvqdsjh46/6EVJDRf5D24UkwUK2q0eo8/43e673137e7b4d399e7bc9d2201e337a/cloudsql-2.png?fm=png&fl=png8" />
4. Enter the information for "*Instance ID*", "*Default user password*", "*Location*", "*Region*" and "*Zone*"
5. Select the "*Show configuration options*" link
6. Under "*Set Connectivity*" select "*Private IP*" (enable the API if you haven’t already)
7. Under "*Private IP*" select the VPC we just created in the previous step <img class="lozad tofigure" alt="Private IP decisions" src="/assets/academy/cloudsql-3.png?fm=png&fl=png8&w=600" data-src="//images.ctfassets.net/189dvqdsjh46/31gvagB55eqEaM0uMUsSUu/9b57729fdf6152b6f5c1f5bdd126c623/cloudsql-3.png?fm=png&fl=png8" />
8. If "*Public IP*" is checked be sure to uncheck it
9. In the "*Enable auto backups and high availability*" section, select "*Automate backups*" 
10. In the same section under "*Availability*" select "*High availability (regional)*"
11. Next, under the "*Set maintenance schedule*" section be sure to select the window and timing that’s appropriate for your internal policy
12. Then click "*Create*"

<div class="blog-date nomargin text--gray-6">Step 4</div>

## High availability

In the previous step where we created our database, we were able to setup high availability across multiple regions. This aids in both disaster recovery and business continuity for your organization. If a region within GCP goes down, high availability will ensure that your data is still accessible from another region. 

For more information on high availability from the GCP, see this [article](https://cloud.google.com/sql/docs/postgres/high-availability).

| Related Control(s)     | API Reference     |
| ---------- | ---------- |
| HITRUST 1616.09l1 Organizational.16       | [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get), [BackupRuns](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/)       |
| HITRUST 1618.09l1 Organizational.45       | [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get), [BackupRuns](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/)       |
| HITRUST 1619.09l1 Organizational.7       | [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get), [BackupRuns](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/)       |
| HITRUST 1620.09l1 Organizational.8       | [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get), [BackupRuns](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/)       |
| HITRUST 1668.12d1 Organizational.67       | [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get), [BackupRuns](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/)
|

<div class="blog-date nomargin text--gray-6">Step 5</div>

## Database access & encryption

When we created the database in step 3, we selected "Private IP" and unselected "*Public IP*". This restricts traffic to the instance only to approved networks. This is important because it forces all traffic to be encrypted and authenticated.

More information on Private IP can be found [here](https://cloud.google.com/sql/docs/mysql/private-ip).

### Connecting over SSL/TLS

From Google:

> "If you are connecting using private IP, configuring SSL/TLS is optional; private services access traffic stays within Google's network at all times."

<img class="lozad tofigure" alt="SSL/TLS options" src="/assets/academy/cloudsql-4.png?fm=png&fl=png8&w=600" data-src="//images.ctfassets.net/189dvqdsjh46/5ryAolx2hyoeEyIcCUkAGe/5db42940b5947db917ac706569eee29b/cloudsql-4.png?fm=png&fl=png8" /> 

You can see in the screenshot above that all incoming connections must use SSL and also that we haven’t set up a certificate yet, which is covered in the guide below. For the purposes of this guide, SSL/TLS is not optional. To enforce a secure connection, [follow this guide](https://cloud.google.com/sql/docs/mysql/configure-ssl-instance#enforcing-ssl).

| Related Control(s)     | API Reference     |
| ---------- | ---------- |
| HITRUST 0605.10h1 System.12       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get)       |
| HITRUST 0630.10h2 System.6       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get)       |
| HITRUST 0805.01m1 Organizational.12       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get)       |
| HITRUST 0806.01m2 Organizational.12356       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get)       |
| HITRUST 0805.01m1 Organizational.12       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get)       |
| HITRUST 0806.01m2 Organizational.12356       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get)       |
| HITRUST 0814.01n1 Organizational.12       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get)       |
| HITRUST 0816.01w1 System.1       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get)       |
| HITRUST 0835.09n1 Organizational.1       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get)       |
| HITRUST 0859.09m1 Organizational.78       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [Databases: get](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/databases/get)       |

### Enabling Encryption

From Google:

> "Cloud Storage always encrypts your data on the server side, before it is written to disk, at no additional charge."

For more information on encryption from GCP, please see [this guide](https://cloud.google.com/storage/docs/encryption/).

| Related Control(s)     | API Reference     |
| ---------- | ---------- |
| HITRUST 0903.10f1 Organizational.1       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances)       |
| HITRUST 1132.01v2 System.3       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances)       |
| HITRUST 1903.06d1 Organizational.3456711       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances)       |

<div class="blog-date nomargin text--gray-6">Step 6</div>

## Backups

In step 3 when we created our database, we selected "*Automate backups*" in the "*Enable auto backups and high availability*" section. These backups are available and should be configured according to your internal compliance policy. Using the GCP APIs you can set and retrieve configuration information about your instance. 

Example response:

~~~javascript
{
  "kind": "sql#backupRun",
  "id": long,
  "selfLink": string,
  "instance": string,
  "description": string,
  "windowStartTime": datetime,
  "status": string,
  "type": string,
  "enqueuedTime": datetime,
  "startTime": datetime,
  "endTime": datetime,
  "error": {
    "kind": "sql#operationError",
    "code": string,
    "message": string
  }
}
~~~


| Related Control(s)     | API Reference     |
| ---------- | ---------- |
| HITRUST 1616.09l1 Organizational.16       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [BackupRuns](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/)       |
| HITRUST 1618.09l1 Organizational.45       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [BackupRuns](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/)       |
| HITRUST 1619.09l1 Organizational.7       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [BackupRuns](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/)       |
| HITRUST 1620.09l1 Organizational.8       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [BackupRuns](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/)       |
| HITRUST 1668.12d1 Organizational.67       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances), [BackupRuns](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/)       |

<div class="blog-date nomargin text--gray-6">Step 7</div>

## Patching

In step 3 when we created our database, we selected our maintenance window by setting a specific day and time for updates. Using the Instances API, we can expect a response like the following:

~~~javascript
"maintenanceWindow": {
  "kind": "sql#maintenanceWindow",
  "hour": integer,
  "day": integer,
  "updateTrack": string
}
~~~


| Related Control(s)     | API Reference     |
| ---------- | ---------- |
| HITRUST 0701.07a1 Organizational.12       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances)       |
| HITRUST 0707.10b2 System.1       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances)       |
| HITRUST 0708.10b2 System.2       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances)       |
| HITRUST 0709.10m1 Organizational.1       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances)       |
| HITRUST 0720.07a1 Organizational.4       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances)       |
| HITRUST 0723.07a1 Organizational.8       | [Instances](https://cloud.google.com/sql/docs/postgres/admin-api/v1beta4/instances)       |

<div class="blog-date nomargin text--gray-6">Step 8</div>

## Logging & Monitoring

Using stackdriver in the GCP console, we can see that logging and monitoring are on by default and are tracking events in the "operations" tab. However, this still doesn’t get us all the way to HITRUST alignment. For auditing, we’re going to be using [Google Cloud Audit Logging](https://cloud.google.com/logging/docs/audit/). 

<img class="lozad tofigure" alt="Cloud Audit panel" src="/assets/academy/cloudsql-5.png?fm=png&fl=png8&w=600" data-src="//images.ctfassets.net/189dvqdsjh46/44OOyzWyD6U2CmU46su6Uq/5b6c1957b35443c2a4d3848a09d6b5f7/cloudsql-5.png?fm=png&fl=png8" />

Fortunately Cloud Audit Logging is on by default, and can be accessed at [console.cloud.google.com/home/activity](https://console.cloud.google.com/home/activity). If you navigate to that page, you’ll see a log of activity, with options in the right menu to filter based on certain criteria.


<img class="lozad tofigure" alt="Cloud Audit logging" src="/assets/academy/cloudsql-6.png?fm=png&fl=png8&w=600" data-src="//images.ctfassets.net/189dvqdsjh46/4kEYwdBZVSU8Em6MMW6gmK/473761f76b6f2e3b1b48d9653db8fdba/cloudsql-6.png?fm=png&fl=png8" />

| Related Control(s)     | API Reference     |
| ---------- | ---------- |
| HITRUST 1204.09aa1 System.3       | [Stackdriver Monitoring API](https://cloud.google.com/monitoring/api/ref_v3/rest/)       |

## Wrapping up

Using this guide, developers can ensure their new GCP Cloud SQL instance is ready to comply with the HITRUST CSF. Maintaining these configurations for all new infrastructure, updating them for new versions of HITRUST and providing proof &mdash; a digital papertrail &mdash; is an incredible amount of work. Having a partner like Datica can mean the difference between an audit taking 4 months, or 4 weeks.

For more information on Datica’s products and services. Check out these helpful links:

- [Cloud Compliance Management System](https://datica.com/ccms)
- [Compliant Kubernetes Service](https://datica.com/cks)
  