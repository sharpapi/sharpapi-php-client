![SharpAPI GitHub cover](https://sharpapi.com/sharpapi-github-php-bg.jpg "SharpAPI PHP Client")

# ⚠️ DEPRECATED: SharpAPI PHP Client SDK

## 🔴 This Package is No Longer Maintained

**This monolithic package (`sharpapi/sharpapi-php-client`) has been deprecated and replaced with specialized, endpoint-specific packages.**

### Why the Change?

- **Better Performance**: Install only what you need
- **Smaller Dependencies**: Reduced package size
- **Easier Maintenance**: Each endpoint has its own repository
- **Clearer Documentation**: Focused docs for each feature
- **Faster Updates**: Independent versioning per endpoint

### ✅ What Should You Use Instead?

Please migrate to the **new specialized packages** listed below. Each package is focused on a specific SharpAPI endpoint and provides a cleaner, more maintainable solution.

---

## 📦 New Specialized Packages

### 📝 Content & Marketing Automation

| Package | Description | Installation |
|---------|-------------|--------------|
| [php-content-summarize-text](https://packagist.org/packages/sharpapi/php-content-summarize-text) | AI-powered text summarization | `composer require sharpapi/php-content-summarize-text` |
| [php-content-text-translator](https://packagist.org/packages/sharpapi/php-content-text-translator) | Advanced text translator (80+ languages) | `composer require sharpapi/php-content-text-translator` |
| [php-content-paraphrase-text](https://packagist.org/packages/sharpapi/php-content-paraphrase-text) | Paraphrase and rephrase content | `composer require sharpapi/php-content-paraphrase-text` |
| [php-content-proofread-grammar](https://packagist.org/packages/sharpapi/php-content-proofread-grammar) | Proofread text and check grammar | `composer require sharpapi/php-content-proofread-grammar` |
| [php-content-keywords-tags](https://packagist.org/packages/sharpapi/php-content-keywords-tags) | Generate keywords and tags from content | `composer require sharpapi/php-content-keywords-tags` |
| [php-content-spam-detector](https://packagist.org/packages/sharpapi/php-content-spam-detector) | Detect spam content with confidence score | `composer require sharpapi/php-content-spam-detector` |
| [php-content-phone-detector](https://packagist.org/packages/sharpapi/php-content-phone-detector) | Extract and format phone numbers | `composer require sharpapi/php-content-phone-detector` |
| [php-content-url-detector](https://packagist.org/packages/sharpapi/php-content-url-detector) | Extract and validate URLs from text | `composer require sharpapi/php-content-url-detector` |
| [php-content-email-detector](https://packagist.org/packages/sharpapi/php-content-email-detector) | Extract and validate email addresses | `composer require sharpapi/php-content-email-detector` |

### 🛒 E-commerce

| Package | Description | Installation |
|---------|-------------|--------------|
| [php-ecommerce-product-review-sentiment](https://packagist.org/packages/sharpapi/php-ecommerce-product-review-sentiment) | Analyze product review sentiment | `composer require sharpapi/php-ecommerce-product-review-sentiment` |
| [php-ecommerce-product-categorization](https://packagist.org/packages/sharpapi/php-ecommerce-product-categorization) | Categorize products with AI | `composer require sharpapi/php-ecommerce-product-categorization` |
| [php-ecommerce-product-intro-generator](https://packagist.org/packages/sharpapi/php-ecommerce-product-intro-generator) | Generate product introductions | `composer require sharpapi/php-ecommerce-product-intro-generator` |
| [php-ecommerce-thank-you-email](https://packagist.org/packages/sharpapi/php-ecommerce-thank-you-email) | Generate personalized thank you emails | `composer require sharpapi/php-ecommerce-thank-you-email` |

### 🧑‍💻 HR Tech

| Package | Description | Installation |
|---------|-------------|--------------|
| [php-hr-related-skills](https://packagist.org/packages/sharpapi/php-hr-related-skills) | Find related skills with relevance scores | `composer require sharpapi/php-hr-related-skills` |
| [php-hr-related-job-positions](https://packagist.org/packages/sharpapi/php-hr-related-job-positions) | Find similar job positions | `composer require sharpapi/php-hr-related-job-positions` |
| [php-hr-job-description-generator](https://packagist.org/packages/sharpapi/php-hr-job-description-generator) | Generate professional job descriptions | `composer require sharpapi/php-hr-job-description-generator` |

### ✈️ Travel, Tourism & Hospitality

| Package | Description | Installation |
|---------|-------------|--------------|
| [php-travel-review-sentiment](https://packagist.org/packages/sharpapi/php-travel-review-sentiment) | Analyze travel review sentiment | `composer require sharpapi/php-travel-review-sentiment` |
| [php-travel-hospitality-categorization](https://packagist.org/packages/sharpapi/php-travel-hospitality-categorization) | Categorize hospitality products | `composer require sharpapi/php-travel-hospitality-categorization` |
| [php-travel-tours-activities-categorization](https://packagist.org/packages/sharpapi/php-travel-tours-activities-categorization) | Categorize tours and activities | `composer require sharpapi/php-travel-tours-activities-categorization` |

### 🔍 SEO

| Package | Description | Installation |
|---------|-------------|--------------|
| [php-seo-tags-generator](https://packagist.org/packages/sharpapi/php-seo-tags-generator) | Generate SEO and social media META tags | `composer require sharpapi/php-seo-tags-generator` |

### 🛠️ Utilities

| Package | Description | Installation |
|---------|-------------|--------------|
| [php-utility-airports](https://packagist.org/packages/sharpapi/php-utility-airports) | Global airports database (30,000+ airports) | `composer require sharpapi/php-utility-airports` |
| [php-utility-job-positions](https://packagist.org/packages/sharpapi/php-utility-job-positions) | Job positions database API | `composer require sharpapi/php-utility-job-positions` |

---

## 🔄 Migration Guide

### Before (Old Package)

```php
use SharpAPI\SharpApiService\SharpApiService;

$sharpApi = new SharpApiService(SHARP_API_KEY);
$statusUrl = $sharpApi->summarizeText($text, 'English');
$result = $sharpApi->fetchResults($statusUrl);
```

### After (New Specialized Package)

```php
use SharpAPI\ContentSummarize\SummarizeTextClient;

$client = new SummarizeTextClient(apiKey: SHARP_API_KEY);
$statusUrl = $client->summarizeText(
    content: $text,
    language: 'English'
);
$result = $client->fetchResults($statusUrl);
```

### Key Differences

1. **Focused Imports**: Import only the client you need
2. **Named Parameters**: Use modern PHP 8.0+ named arguments
3. **Better Type Safety**: Improved type hints and validation
4. **Smaller Footprint**: Only install dependencies for features you use

---

## ⚠️ Important Notes

### For Existing Users

**This package will continue to work** for projects that already use it. The source code remains unchanged, so your existing implementations won't break.

However, we **strongly recommend migrating** to the new specialized packages because:

- ✅ This package will not receive any new features
- ✅ Bug fixes and security updates will be limited
- ✅ New SharpAPI endpoints will only be available in specialized packages
- ✅ Better performance and smaller dependency footprint
- ✅ Active development and support

### When to Migrate

- **New Projects**: Always use the new specialized packages
- **Existing Projects**: Migrate during your next major update
- **composer update**: You'll see deprecation warnings, but your code will still work

---

## 📚 Resources

- **SharpAPI Website**: [https://sharpapi.com](https://sharpapi.com)
- **API Documentation**: [https://sharpapi.com/documentation](https://sharpapi.com/documentation)
- **GitHub Organization**: [https://github.com/sharpapi](https://github.com/sharpapi)
- **All Packages on Packagist**: [https://packagist.org/packages/sharpapi/](https://packagist.org/packages/sharpapi/)

---

## 💬 Need Help?

- **Questions?** Open an issue on the specific package's GitHub repository
- **Feature Requests?** Submit them to the relevant specialized package
- **General Support?** Visit [https://sharpapi.com/documentation](https://sharpapi.com/documentation)

---

## 📜 Old Documentation (For Reference Only)

<details>
<summary>Click to expand old documentation (for existing users)</summary>

### Installation

```bash
composer require sharpapi/sharpapi-php-client
```

### Requirements

- PHP >= 8.1

### Basic Usage

```php
$sharpApi = new \SharpAPI\SharpApiService\SharpApiService(SHARP_API_KEY);

$statusUrl = $sharpApi->summarizeText($text, 'English');
$result = $sharpApi->fetchResults($statusUrl);

var_dump($result->getResultJson());
```

For complete documentation, please refer to the specialized packages listed above.

</details>

---

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

---

**Thank you for using SharpAPI! Please migrate to our new specialized packages for the best experience.**

[![SharpAPI](https://sharpapi.com/sharpapi-logo.svg)](https://sharpapi.com)
