![SharpAPI GitHub cover](https://sharpapi.com/sharpapi-github-php-bg.jpg "SharpAPI Laravel Client")

# SharpAPI PHP Client

## SharpAPI: AI-Powered Swiss Army Knife API for every software developer

### Unleash the full potential of your applications effortlessly by integrating powerful AI capabilities with just a few lines of code.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sharpapi/sharpapi-laravel-client.svg?style=flat-square)](https://packagist.org/packages/sharpapi/sharpapi-laravel-client)
[![Total Downloads](https://img.shields.io/packagist/dt/sharpapi/sharpapi-laravel-client.svg?style=flat-square)](https://packagist.org/packages/sharpapi/sharpapi-laravel-client)

Assisting coders with the most repetitive content analysis and content generation processing needs of any app or
platform.
SharpAPI is an easy-to-use REST API endpoints to help automate your app AI content processing whether it's:
[E-commerce](https://sharpapi.com/#ecommerce),
[HR Tech](https://sharpapi.com/#hr),
[Travel](https://sharpapi.com/#tth),
[Tourism & Hospitality](https://sharpapi.com/#tth),
[Content](https://sharpapi.com/#content)
or [SEO](https://sharpapi.com/#seo).

## [If you're looking for a Laravel version - check here &raquo;](https://github.com/sharpapi/laravel-client)

## Requirements

- PHP >= 8.1

## Features

Please refer to the official:

- [SharpAPI.com Website](https://sharpapi.com/)
- [API Documentation](https://sharpapi.com/documentation)
- **Multi-language Support**:
  Supporting nearly 100 languages for every content or data analysis API endpoint.
  [Check the list here](https://botpress.com/blog/list-of-languages-supported-by-chatgpt).
- **Easy-to-Use RESTful Format**:
  With standardized set of endpoints - gain valuable insights through analysis endpoints, covering product categories,
  skills, and job positions, providing relevant scores.
- **Clean Data Formats**:
  Rest assured with consistent, always predictable JSON format
  for all returned data. No need to worry about fuzzy AI data.
- **Tech Support**:
  Crafted by developers for developers, we provide continuous
  assistance throughout your journey.

## Installation

1. You can install the package via composer:

```bash
composer require sharpapi/sharpapi-php-client
```

2. Register at [SharpApi.com](https://sharpapi.com/) and get the API key.

**That's it!**

## Usage

### Simple example
```php
$sharpApi = new \SharpAPI\SharpApiService\SharpApiService('8bKzQl3cwckfVsnsN8T8p4BsACkziEQJ72U4pXpQ');

$statusUrl = $sharpApi->productCategories('Lenovo Chromebook Laptop (2023), 14" FHD Touchscreen Slim 3, 8-Core MediaTek Kompanio 520 CPU, 4GB RAM, 128GB Storage');

$resultSharpApiJob = $sharpApi->pollJobStatusAndFetchResults($statusUrl);

var_dump($resultSharpApiJob->getResultJson());
```
Typical use case require these steps:

1. Dispatch one of the available AI processing methods (this will return job processing status URL)
2. Run `pollJobStatusAndFetchResults($statusUrl)` method which operates in polling mode, sending underneath
   requests every 10 seconds for 180 seconds (these values can be customized, 
   check `SharpApiService` source code).
3. `SharpApiJob` object will be returned.
4. For a job finished with `success` return status you can obtain the results with one
   of the methods, for example `$jobResultJson = $jobResult->getResultJson()`.

**Each dispatched job usually takes somewhere between a couple of seconds to a minute.**

After that period a returned job will usually have `success` status and it's results will
be available for further processing.
Each API method returns different return format.
[Go to List of API methods/endpoints below for details&raquo;](#list-of-api-methodsendpoints)

**Our API guarantees to return correct format every time.** AI engines that SharpAPI
use in rare cases have a tendency to misbehave and timeout
or return incorrect data.
In those cases the returned `status` for the job will be `failed`.
You can rerun the exact same job request in that case.

As long as the job is still being processed by our engine it will keep
returning `pending` status.

### Guzzle Exceptions
Underlying HTTP requests are powered with Guzzle,
so it's a good idea to check for
typical [Guzzle Exceptions](https://docs.guzzlephp.org/en/stable/quickstart.html#exceptions):

```php
use GuzzleHttp\Exception\ClientException;

// Step 1: dispatch the job to the API with one of the methods, for example:
try {
    $statusUrl = \SharpApiService::summarizeText($text, 'German');
    // $statusUrl example value: 'http://sharpapi.com/api/v1/job/status/75acb6dc-a975-4969-9ef1-c62cebc511cb'
} catch (ClientException $e) {
    // $e->getResponse()
}

// Step 2: request to check job status in polling mode and wait for the result
$jobResult = \SharpApiService::pollJobStatusAndFetchResults($statusUrl);

// Step 3: get results of dispatched API job, f.e. this returns job result as a prettied JSON
$jobResultJson = $jobResult->getResultJson();
// ..or PHP array:
$jobResultArray = $jobResult->getResultArray();
// ..or PHP stdClass:
$jobResultObject = $jobResult->getResultObject();
```


### Framework Controller usage example

```php
<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use SharpAPI\SharpApiService\SharpApiService;

class SharpTest extends Controller
{
    public function __construct(public SharpApiService $sharpApiService)
    {
    }

    /**
     * @throws GuzzleException
     */
    public function detect_phones(): void
    {
        $statusUrl = $this->sharpApiService->detectPhones(
            'Where to find us? Call with a sales tech advisor:
            Call: 1800-394-7486 or our Singapore office +65 8888 8888'
        );
        
        $result = $this->sharpApiService->pollJobStatusAndFetchResults($statusUrl);
        
        dd($result->getResultJson());
        /* returned:
        [
            {
                "detected_number": "1800-394-7486",
                "parsed_number": "+18003947486"
            },
            {
                "detected_number": "+65 8888 8888",
                "parsed_number": "+6588888888"
            }
        ]
         */
    }
}
```

## List of API methods/endpoints

Each method always returns `SharpApiJob` object, where its
`getResultJson / getResultArray / getResultObject`
methods will return different data structure.
Please refer to the detailed examples provided
at [SharpAPI.com](https://sharpapi.com/)

### HR

#### Parse Resume/CV File

Parses a resume (CV) file from multiple formats (PDF/DOC/DOCX/TXT/RTF) and returns an extensive object of data points.

An optional output language parameter can also be provided (`English` value is set as the default one) .

```php
$statusUrl = \SharpApiService::parseResume('/test/resume.pdf', 'English');
```

#### Generate Job Description

Based on the list of extensive parameters this endpoint provides concise job details in the response format, including
the short description, job requirements, and job responsibilities.
The only mandatory parameter is `name`.

This functionality utilizes a specialized `DTO` class (`Data Transfer Object`) parameter
named `JobDescriptionParameters` to aid in the validation of input parameters.
Only the `name` parameter in the constructor of this `DTO` is mandatory.

```php
$jobDescriptionParameters = new JobDescriptionParameters(
    name: "PHP Senior Engineer",
    company_name: "ACME LTD",
    minimum_work_experience: "5 years",
    minimum_education: "Bachelor Degree",
    employment_type: "full time",
    required_skills: ['PHP8', 'Laravel'],
    optional_skills: ['AWS', 'Redis'],
    country: "United Kingdom",
    remote: true,
    visa_sponsored: true,
    language: 'English'
);

$statusUrl = \SharpApiService::generateJobDescription($jobDescriptionParameters);
```

#### Related Skills

Generates a list of related skills with their weights as a float
value (1.0-10.0) where 10 equals 100%, the highest relevance score.

```php
$statusUrl = \SharpApiService::relatedSkills('MySQL', 'English');
```

#### Related Job Positions

Generates a list of related job positions with their weights as
float value (1.0-10.0) where 10 equals 100%, the highest relevance score.

```php
$statusUrl = \SharpApiService::relatedJobPositions('Senior PHP Engineer', 'English');
```

### E-commerce

#### Product Review Sentiment

Parses the customer's product review and provides its sentiment (POSITIVE/NEGATIVE/NEUTRAL)
with a score between 0-100%. Great for sentiment report processing for any online store.

```php
$statusUrl = \SharpApiService::productReviewSentiment('review contents', 'English');
```

#### Product Categories

Generates a list of suitable categories for the product with relevance
weights as a float value (1.0-10.0) where 10 equals 100%, the highest relevance score.
Provide the product name and its parameters to get the best category matches possible.
Comes in handy with populating product catalogue data and bulk products' processing.

```php
$statusUrl = \SharpApiService::productCategories('Sony Playstation 5', 'English');
```

#### Generate Product Intro

Generates a shorter version of the product description. Provide as many details
and parameters of the product to get the best marketing introduction possible.
Comes in handy with populating product catalog data and bulk products processing.

```php
$statusUrl = \SharpApiService::generateProductIntro('Sony Playstation 5', 'English');
```

#### Generate Thank You E-mail

Generates a personalized thank-you email to the customer after the purchase.
The response content does not contain the title, greeting or sender info at the end,
so you can personalize the rest of the email easily.

```php
$statusUrl = \SharpApiService::generateThankYouEmail('Sony Playstation 5', 'English');
```

### Content

#### Translate Text

Translates provided text to selected language. 80 languages are supported.
Please check included `SharpApiLanguages` _Enum_ class for details.

```php
$statusUrl = \SharpApiService::translate($text, SharpApiLanguages::ITALIAN);
```

#### Detect Spam

Checks if provided content passes a spam filtration test.
Provides a percentage confidence score and an explanation
for whether it is considered spam or not.
This information is useful for moderators to make a final decision.

```php
$statusUrl = \SharpApiService::detectSpam($text);
```

#### Detect Phones Numbers

Parses the provided text for any phone numbers and returns the original detected
version and its E.164 format. Might come in handy in the case of processing
and validating big chunks of data against phone numbers or f.e. if you want
to detect phone numbers in places where they're not supposed to be.

```php
$statusUrl = \SharpApiService::detectPhones($text);
```

#### Detect Emails

Parses the provided text for any possible emails. Might come in handy in case
of processing and validating big chunks of data against email addresses
or f.e. if you want to detect emails in places where they're not supposed to be.

```php
$statusUrl = \SharpApiService::detectEmails($text);
```

#### Summarize Text

Generates a summarized version of the provided content. Perfect for generating
marketing introductions of longer texts.

```php
$statusUrl = \SharpApiService::summarizeText($text, 'English');
```

### SEO

#### Generate SEO Tags

Generates all most important META tags based on the content provided. Make sure to include
link to the website and pictures URL to get as many tags populated as possible.

```php
$statusUrl = \SharpApiService::generateSeoTags($text, 'English');
```

### Travel, Tourism & Hospitality

#### Travel Review Sentiment

Parses the Travel/Hospitality product review and provides its sentiment
(POSITIVE/NEGATIVE/NEUTRAL) with a score between 0-100%.
Great for sentiment report processing for any online store.

```php
$statusUrl = \SharpApiService::travelReviewSentiment($text, 'English');
```

#### Tours & Activities Product Categories

Generates a list of suitable categories for the Tours & Activities product
with relevance weights as float value (1.0-10.0) where 10 equals 100%,
the highest relevance score. Provide the product name and its parameters
to get the best category matches possible. Comes in handy with populating
product catalogue data and bulk product processing.
Only first parameter `productName` is required.

```php
$statusUrl = \SharpApiService::toursAndActivitiesProductCategories(
        'Oasis of the Bay'
        'Ha Long',
        'Vietnam',
        'English'
    );
```

#### Hospitality Product Categories

Generates a list of suitable categories for the Hospitality type product
with relevance weights as float value (1.0-10.0) where 10 equals 100%,
the highest relevance score. Provide the product name and its parameters
to get the best category matches possible. Comes in handy with populating
products catalogs data and bulk products' processing.
Only first parameter `productName` is required.

```php
$statusUrl = \SharpApiService::hospitalityProductCategories(
        'Hotel Crystal 大人専用'
        'Tokyo',
        'Japan',
        'English'
    );
```

### Do you think our API is missing some obvious functionality?

[Please let us know»](https://github.com/sharpapi/laravel-client/issues)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [A2Z WEB LTD](https://github.com/a2zwebltd)
- [Dawid Makowski](https://github.com/makowskid)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
