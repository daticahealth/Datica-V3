---
id: 1t2mQms18kgiecSMeSeCCW
title: Recommended FHIR API Implementation Principles
slug: recommended-fhir-api-implementation-principles
pub_date: '2018-05-17'
author: 5dsPZqJr4Qu2uww6KgYO0G
tags:
  - tags/fhir
discovery_topic: discovery_topic/ehr-integrations
summary: >-
  The FHIR standard is based on API routes but what should the API route look
  like? Learn general design principles and guidelines to build RESTful APIs.
related_guide: wSUz5LDXA4Uu42OqwQ8AM
related_entries:
  - 3lJNN0q4FWgqoYWGGWKGUg
  - 1wWbjWNWOQygO2EaESEOeq
cta_ref: 4OCkYKXr2EEQSIcse0GQOq
---
FHIR is based on API routes. What should the API route look like? The only legitimate link that a quick Google search produces is the Open Epic link. If you haven't already, I strongly recommend that you sign up [here](http://open.epic.com/).

Epic has (for now, I'm sure, as they explore the new FHIR world) chosen to define the API structure as below:

```
https://{domain}/{fhir-version}/api/{resourcesName}/{resourceId}
```

This is not their intended production route as it does not address potential issues. Perhaps a good way to arrive at what the final API route might look like, it is worthwhile to list out the data needed to be communicated in the API route and the associated impact on the design of the API route itself. Here is the list of possible parameters:

- The health system / EHR: This is the domain itself. For example, this would translate to {{domain}} *viz* daticahealth.com
- The environment (prod / dev / ...):
- The FHIR version
- The partner (or should this be better done via an API key?)

```
https://{domain}/fhir/{fhir_version}/{environment}/
```

That will be root or the [base] of all FHIR queries. Additional criteria/parameters will be added on as needed to retrieve the data of interest. For example,

- The resource
- The resource ID

In which case, the `{resourcesName}/{resourceId}` will be tacked on to the end of the root to give us

```
[base]/{resourcesName}/{resourceId}
```

### General API design principles

Here are a few design principles that we have adopted based on REST best practices.

#### 1. Consistency in naming of routes

Note that we always use the plural form in the API route. This is just a standard way of denoting it. All resource names in the route will always be in the plural and the specific ID will always be in the singular.

```
[base]/{resourcesName}/{resourceId}
```

and with a specific example for the patients resource:

```
[base]/patients/patientID
```

#### 2. Consistency in "VERBS" and "NOUNS"

In general, there are three sets of routes or "verbs" per "noun" or resource. They all follow the following pattern:

##### Actions for POST : /resourcesName/resourceId

[(Read more about the Resource Object.)](https://catalyze.io/learn/the-fhir-resource-object-the-core-building-block)

This route will allow you to create and get all resources specific to that user.

```
POST /patients
```
with the associated body will create a patient object. This will also create an internally generated `patientId` and a `createdAt` timestamp. Similarly,

```
POST /patients/6cdf30cc-e81a-4c21-894f-497c5d9ac222/allergies
```

with the associated body will create an allergy object specific to userID `6cdf30cc-e81a-4c21-894f-497c5d9ac222`. This will also create an internally generated `allergyId` and a `createdAt` timestamp.

**It is important to note that POST actions are unlikely to be supported out of the gate in FHIR implementations but are included in here for completeness.**


##### Actions for GET: /resourcesName/resourceId or :/resourcesName?params=value

This route will allow either a specific resource to be returned or based on the parameters supplied, a list of resources. The only caveat is likely to be a patient specific query where the parameters will be restricted: i.e. only a specific set of parameters will be allowed so prevent random searches along the lines of *give me all patients who's last name is Smith*. We will delve into this more detail when we look at the patient specific route details in a subsequent section.

```
GET /allergies/051d8c27-b0c4-432d-a75d-1070fd877206
```

will return a body with the specific allergy details. In the context of a patient, it is likely that the request being sent must include a minimum set of parameters to return a specific patient rather than a general query as mentioned earlier. A patient query (GET) will look like this:

```
GET /patients?lastName=Smith&gender=male&mrn=88776656
```

which will return a patient resource with associated details as long as there is a specific match. If there is no match, then an empty body will be returned or ideally, would not even trigger a response. This is a potentially useful security precaution to ensure that even null responses do not communicate any information.


##### Actions for PUT and DELETE: /resourcesName/resourceId

This route will allow you to modify or delete specific resource objects.

```
PUT /allergies/051d8c27-b0c4-432d-a75d-1070fd877206
```

with the associated body will update the allergy object with ID `051d8c27-b0c4-432d-a75d-1070fd877206`

Since allergies always pertain to a unique patient, the same route could be called as

```
PUT /patients/6cdf30cc-e81a-4c21-894f-497c5d9ac222/allergies/051d8c27-b0c4-432d-a75d-1070fd877206
```

Similarly for DELETE,

```
DELETE /allergies/051d8c27-b0c4-432d-a75d-1070fd877206
```

with an empty body will delete the allergy object with ID `051d8c27-b0c4-432d-a75d-1070fd877206` and the equivalent patient oriented route being

```
DELETE /patients/6cdf30cc-e81a-4c21-894f-497c5d9ac222/allergies/051d8c27-b0c4-432d-a75d-1070fd877206
```

Since the allergyId is a unique number, the patientId is overkill but is in there to simplify / rationalize the structure and number of routes you need to remember.

**Again, it is important to note that PUT and DELETE actions are unlikely to be supported out of the gate in FHIR implementations but are included in here for completeness.**

#### 3. Limiting which fields are returned by the API

You won't always need the full representation of a resource. The ability select and chose returned fields allows you to minimize network traffic and speed up usage of the API. Therefore, we use a fields query parameter that takes a comma separated list of fields to include. For example,

```
GET /patients/2f036fb2-80eb-47ee-9d17-b21790f61663?fields=id,name,updatedAt&status=active
```

would retrieve just enough information to display a sorted listing of allergies for that specific patient (the `-` sign sorts results in reverse chronological order).

#### 4. APIs are rate limited

To prevent abuse, it is standard practice to add some sort of rate limiting to an API. [RFC 6585](http://tools.ietf.org/html/rfc6585) introduced a HTTP status code [429 Too Many Requests](http://tools.ietf.org/html/rfc6585#section-4) to accommodate this. However, it can be very useful to notify you of your  limits before you actually hit it.

This is an area that currently lacks standards but has a number of popular conventions using HTTP response headers.
At a minimum, include the following headers (using Twitter's naming conventions because headers typically don't have mid-word capitalization):

```
X-Rate-Limit-Limit - The number of allowed requests in the current period
X-Rate-Limit-Remaining - The number of remaining requests in the current period
X-Rate-Limit-Reset - The number of seconds left in the current period
```

#### 5. Caching - verify on https

HTTP provides a built-in caching framework. All you have to do is include some additional outbound response headers and do a little validation when you receive some inbound request headers.
There are 2 approaches: [ETag](http://en.wikipedia.org/wiki/HTTP_ETag) and [Last-Modified](http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html#sec14.29).

- **ETag**: When generating a request, include an HTTP header ETag containing a hash or checksum of the representation. This value should change whenever the output representation changes. Now, if an inbound HTTP requests contains an If-None-Match header with a matching ETag value, the API should return a 304 Not Modified status code instead of the output representation of the resource.
- **Last-Modified**: This basically works like to ETag, except that it uses timestamps. The response header Last-Modified contains a timestamp in [RFC 1123](http://www.ietf.org/rfc/rfc1123.txt) format which is validated against If-Modified-Since. Note that the HTTP spec has had [3 different acceptable date formats](http://www.w3.org/Protocols/rfc2616/rfc2616-sec3.html#sec3.3) and the server should be prepared to accept any one of them.

#### 6. Errors

Just like an HTML error page shows a useful error message to a visitor, an API should provide a useful error message in a known consumable format. The representation of an error should be no
different than the representation of any resource, just with its own set of fields. The API should always return sensible HTTP status codes.

API errors typically break down into 2 types:

- **400 series** status codes for client issues &
- **500 series** status codes for server issues.

The API standardizes that all 400 series errors come with consumable JSON error representation. If possible (i.e. if load balancers & reverse proxies can create custom error bodies),
this should extend to 500 series status codes.

A JSON error body should provide a few things for the developer a useful error message, like a unique error code that can be looked up for more details in the docs, and possibly a detailed description. JSON output representation for something like this would look like:

```
    {
      "code" : 1234,
      "message" : "Something bad happened :(",
      "description" : "More details about the error here"
    }
```

##### HTTP status codes

HTTP defines a bunch of meaningful status codes that can be returned from your API. These can be leveraged to help the API consumers route their responses accordingly.

* `200 OK` - Response to a successful GET, PUT, PATCH or DELETE. Can also be used for a POST that doesn't result in a creation.
* `201 Created` - (Not applicable). Response to a POST that results in a creation. Should be combined with a Location header pointing to the location of the new resource
* `204 No Content` - Response to a successful request that won't be returning a body (like a DELETE request)
* `304 Not Modified` - Used when HTTP caching headers are in play
* `400 Bad Request` - The request is malformed, such as if the body does not parse
* `401 Unauthorized` - When no or invalid authentication details are provided. Also useful to trigger an auth popup if the API is used from a browser
* `403 Forbidden` - When authentication succeeded but authenticated user doesn't have access to the resource
* `404 Not Found` - When a non-existent resource is requested
* `405 Method Not Allowed` - When an HTTP method is being requested that isn't allowed for the authenticated user
* `410 Gone` - Indicates that the resource at this end point is no longer available. Useful as a blanket response for old API versions
* `415 Unsupported Media Type` - If incorrect content type was provided as part of the request
* `422 Unprocessable Entity` - Used for validation errors
* `429 Too Many Requests` - When a request is rejected due to rate limiting

#### 7. Result filtering, sorting and searching

It's best to keep the base resource URLs as lean as possible. Complex result filters, sorting requirements and advanced searching (when restricted to a single type of resource) can all be easily implemented as query parameters on top of the base URL. Let's look at these in more detail:

- **Filtering**: Use a unique query parameter for each field that implements filtering. For example, when requesting a list of allergies from the /allergies endpoint, you may want to limit these to only those in the `active` state. This could be accomplished with a request like GET /allergies?status=active. Here, status is a query parameter that implements a filter.
- **Sorting**: Similar to filtering, a generic parameter sort can be used to describe sorting rules. We accommodate complex sorting requirements by letting the sort parameter take in a list of comma separated fields, each with a possible unary negative to imply descending sort order. For example `GET /allergies?sort=-severity` should retrieve a list of allergies in descending order of severity. Similarly, `GET /allergies?sort=-severity,created_at` should retrieve a list of allergies in descending order of severity. Within a specific severity, older allergies are ordered first.
- **Searching**: When full text search is used as a mechanism of retrieving resource instances for a specific type of resource, it can be exposed on the API as a query parameter on the resource's endpoint. Let's say `q`. Search queries will be passed straight to the search engine and API output will be in the same format as a normal list result.

Combining these together, we can build queries like:

- Retrieve all users with recently updated allergies: `GET /allergies?sort=-updatedAt`
- Retrieve all users with recently updated active allergies: `GET /allergies?status=active&sort=-updatedAt`
- Retrieve the set of users with highest severity active allergies mentioning the word 'pollen': `GET /allergies?q=pollen&status=active&sort=-severity,createdAt`

#### 8. Using Contained Resources (Expansion)

You can use expansion to retrieve particular details about resources in the same response you get when you request a list of users, for instance in a search. This is a perfect example of a contained resource. By using expansion, you avoid the process of retrieving the list and then making additional calls to retrieve details about each item in the list. This is more efficient and helps you avoid running up against the limits of your quota.

Patients play a central role in many of the responses returned by resources. For example, queries such as allergy searches, medications all return patient-centric responses. You can expand the patient response format so you can access details about each patient without having to make additional patient resource queries on the individual patients in the response. For example, you can query for patients that match some criteria and at the same time ask the Datica API to extend its response format so that it includes additional details about each patient other than those in the default response format.

### Summary

These are the general design principles that we have followed at Datica. These are guidelines based on our experience building RESTful APIs and gathered from multiple other sources. The key underlying principles being consistency and adherence with HTTP standards.
  