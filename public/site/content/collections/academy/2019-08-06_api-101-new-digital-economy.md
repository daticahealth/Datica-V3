---
id: 22kHwFtNzx7fprNRUDNVwo
title: 'API 101: A Layperson’s Guide: Part 2 – APIs and the New Digital Economy'
slug: api-101-new-digital-economy
pub_date: '2019-03-11'
author: 1iL3zeL6PWrbLRgZE9x5Mf
tags:
  - tags/api
  - tags/ehr
discovery_topic: discovery_topic/ehr-integrations
summary: >-
  The combination of service-oriented software architecture and robust, open
  APIs has made possible the transformation of huge swaths in the digital
  economy.
lead: >-
  In part one of this series, we learned that API technology allows two software
  applications to connect, communicate and collaborate. APIs use standards like
  JSON and XML that provide the data-interchange format (“objects”) and harness
  the power of internet by using web services to provide a secure channel for
  connecting applications and exchanging that data. In this article, we build on
  part one of this series by looking at how this revolutionary approach has
  provided the foundation of the modern digital economy.
related_guide: 5KKD6XVLC8YuCq4eOoKEoO
related_entries:
  - 68tUMiYIOfDjI9jNOQz0jA
cta_ref: 2ptDXKeXwZ1AAVrghZtJJs
---
## How APIs Make UPS a Better Business Partner

Imagine “Jeff” owns “Babylon,” an online retail store that sells books, appliances and pretty much anything else. Jeff knows letting customers conveniently check the status of their orders on his website builds customer satisfaction and loyalty. Babylon has systems that allow it to track order status within Babylon facilities, but ships packages via UPS. How can Babylon report what UPS is doing once the package leaves the Babylon warehouse? UPS and Babylon use different software systems, have different databases and unique business logic. Building and maintaining a direct, customized connection between these systems is a significant challenge. UPS might be willing to do this for a big customer like Babylon, but smaller customers are not worth the investment.
Fortunately, UPS offers an API that makes it easy to track shipping status. This API hides the complexity of the UPS database and business logic. And, because this is an “open” API, it is exposed to the world so almost anyone can use it.  Babylon just needs to register, learn how the API works and connect. Now, Babylon’s system can interrogate the UPS API, instantly retrieve the current status and display it to customers on their website.

A simplified version of this behind-the-scenes exchange via API might look like this:

![UPS APIs.png](/assets/academy/UPS_APIs.png.webp?w=300)


__The Babylon Application “asks” the UPS Application:__

`>Get  /Service/PackageStatus/packageIDNumber/`

__The UPS Application responds with:__

~~~javascript
>{
  “packageIDNumber” : “1234567890”,
  “packageLeftWarehouse” : “01/01/2019 12:55 PM”,
  “packageDelivered” : “01/02/2019 02:35 PM”,
  “packageWeightKg : “10”,
  “signatureRequired” : ”No”,
  “deliveryNote” : “No one home. Left by side door”
}
~~~
{: .prettyprint .lang-js}

As long as UPS doesn’t “break” the API, Babylon and UPS systems can collaborate while operating independently to produce a seamless experience for Babylon customers.

Behind all of this is major shift in underlying application design from a dedicated, to a services-oriented architecture (SOA). This same shift is occurring in health care applications so it’s worth understanding the difference and advantages of SOA. 

![API 101 P2 SOA.png](/assets/academy/API_101_P2_SOA.png.webp)

Monolithic applications are designed as a set of tight, self-contained modules with little or no interaction between them. SOA reimagines these modules as self-contained services that can communicate and collaborate with each other. Adding an “open” API further exposes these services to other “outside” applications.

Consider the example of the Message and Camera apps on a smartphone. These two apps use APIs to interact just like Babylon and UPS. These apps are self-contained but also function as services that can collaborate: the camera app works fine as a stand-alone, but also exposes its services so another application can take advantage of them. A user can take a picture and send it from inside the messaging app, or the other way around, because both apps are designed as services. 

![API 101 P2 API SOA.png](/assets/academy/API_101_P2_API_SOA.png.webp)

Health IT has been migrating to SOA and APIs will accelerate this move. One intense area of activity is with electronic health records (EHRs). Early EHRs were built in the era of monolithic design. Migrating to SOA makes applications like EHRs more flexible and APIs extend core services and facilitate data exchange between the EHR and other applications. Making these APIs “open” further transforms systems like EHRs into platforms for innovation and lays the foundation for a flourishing, diverse health care app ecosystem. 

![API 101 P2 EHR SOA.png](/assets/academy/API_101_P2_EHR_SOA.png.webp)

The combination of service-oriented software architecture and robust, open APIs has made possible the transformation of huge swaths in the digital economy. They provide an agile, technical foundation for how we shop, manage our money, travel and socialize. Widespread adoption by health care will remove major technical barriers to innovation, enhance competition and agility, and ultimately produce more powerful and user-friendly applications. These applications represent the next generation of clinical decision support, population health, unified communications, precision medicine, artificial intelligence, and patient engagement and will lead to better clinical outcomes and enhanced satisfaction for patients and providers alike.

The importance of this approach should not be underestimated. This technology unleashes innovation, makes data liquid and allows applications to build upon and cross-leverage functionality. This can dramatically reduce the time from idea to impact on the real world. Given the scope and scale of the challenge of reinventing health care, this is precisely the kind of technical innovation we need. 
  