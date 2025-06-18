<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Microdata and Structured Data</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2, h3 {
            color: #2c3e50;
        }
        .lesson-container {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .example {
            background-color: #e8f4fc;
            border-left: 4px solid #3498db;
            padding: 15px;
            margin: 20px 0;
        }
        .note {
            background-color: #fef9e7;
            border-left: 4px solid #f1c40f;
            padding: 15px;
            margin: 20px 0;
        }
        .warning {
            background-color: #fdedec;
            border-left: 4px solid #e74c3c;
            padding: 15px;
            margin: 20px 0;
        }
        code {
            background-color: #f0f0f0;
            padding: 2px 5px;
            border-radius: 3px;
            font-family: 'Courier New', Courier, monospace;
        }
        .code-block {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            font-family: 'Courier New', Courier, monospace;
            margin: 20px 0;
        }
        .interactive {
            background-color: #e8f8f5;
            border: 1px solid #1abc9c;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2980b9;
        }
        .navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        .quiz-container {
            background-color: #e8f4fc;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
        }
        .quiz-question {
            margin-bottom: 15px;
            font-weight: bold;
        }
        .quiz-options label {
            display: block;
            margin: 10px 0;
            cursor: pointer;
        }
        .feedback {
            margin-top: 15px;
            padding: 10px;
            border-radius: 4px;
            display: none;
        }
        .correct {
            background-color: #d4edda;
            color: #155724;
        }
        .incorrect {
            background-color: #f8d7da;
            color: #721c24;
        }
        .comparison-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .comparison-table th, .comparison-table td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: left;
        }
        .comparison-table th {
            background-color: #f2f2f2;
        }
        .comparison-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        /* Microdata specific styles */
        .schema-example {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            background-color: #f8f9fa;
        }
        .schema-preview {
            border: 1px dashed #ccc;
            padding: 15px;
            margin: 15px 0;
            background-color: #fff;
        }
        .tabs {
            display: flex;
            margin-bottom: 10px;
        }
        .tab {
            padding: 8px 15px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-bottom: none;
            border-radius: 5px 5px 0 0;
            margin-right: 5px;
            cursor: pointer;
        }
        .tab.active {
            background-color: #fff;
            border-bottom: 1px solid #fff;
            margin-bottom: -1px;
            position: relative;
            z-index: 1;
        }
        .tab-content {
            display: none;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 0 5px 5px 5px;
        }
        .tab-content.active {
            display: block;
        }
        .rich-result {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 15px 0;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .rich-result-title {
            color: #1a0dab;
            font-size: 18px;
            text-decoration: underline;
            margin-bottom: 5px;
        }
        .rich-result-url {
            color: #006621;
            font-size: 14px;
            margin-bottom: 5px;
        }
        .rich-result-description {
            color: #545454;
            font-size: 14px;
        }
        .rich-result-rating {
            display: flex;
            align-items: center;
            margin-top: 5px;
        }
        .rich-result-stars {
            color: #f5a623;
            margin-right: 5px;
        }
        .rich-result-count {
            color: #70757a;
            font-size: 14px;
        }
        .rich-result-price {
            color: #202124;
            font-weight: bold;
            margin-top: 5px;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Microdata and Structured Data</h1>
    
    <div class="lesson-container">
        <h2>Introduction to Structured Data</h2>
        <p>Structured data is a standardized format for providing information about a page and classifying its content. It helps search engines understand the content of your web pages, which can lead to better visibility in search results through rich snippets, knowledge panels, carousels, and other special search result features.</p>
        
        <div class="example">
            <h3>Benefits of Using Structured Data:</h3>
            <ul>
                <li><strong>Enhanced Search Results</strong>: Your content can appear in rich results, knowledge panels, and other special search features</li>
                <li><strong>Improved Click-Through Rates</strong>: Rich results typically have higher click-through rates than standard search results</li>
                <li><strong>Better Content Understanding</strong>: Search engines can better understand what your content is about</li>
                <li><strong>Voice Search Optimization</strong>: Structured data helps voice assistants provide more accurate answers</li>
                <li><strong>Future-Proofing</strong>: As search engines evolve, structured data becomes increasingly important</li>
            </ul>
        </div>
        
        <h3>Types of Structured Data Formats</h3>
        <p>There are several formats for implementing structured data on your website:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Format</th>
                <th>Description</th>
                <th>Syntax Example</th>
            </tr>
            <tr>
                <td><strong>Microdata</strong></td>
                <td>HTML5 specification that uses attributes in HTML tags</td>
                <td><code>&lt;div itemscope itemtype="http://schema.org/Person"&gt;</code></td>
            </tr>
            <tr>
                <td><strong>JSON-LD</strong></td>
                <td>JavaScript notation embedded in a &lt;script&gt; tag</td>
                <td><code>&lt;script type="application/ld+json"&gt;{...}&lt;/script&gt;</code></td>
            </tr>
            <tr>
                <td><strong>RDFa</strong></td>
                <td>Extension to HTML5 that supports linked data</td>
                <td><code>&lt;div vocab="http://schema.org/" typeof="Person"&gt;</code></td>
            </tr>
        </table>
        
        <div class="note">
            <p>While all three formats are supported by major search engines, <strong>JSON-LD</strong> is generally recommended by Google as it's easier to implement and maintain, and it separates the structured data from the content markup.</p>
        </div>
        
        <h3>Schema.org Vocabulary</h3>
        <p>Schema.org is a collaborative, community-driven project that creates, maintains, and promotes schemas for structured data on the internet. It was founded by Google, Microsoft, Yahoo, and Yandex and provides a shared vocabulary that webmasters can use to mark up their pages.</p>
        
        <p>The Schema.org vocabulary includes:</p>
        <ul>
            <li><strong>Types</strong>: Categories of items (e.g., Person, Event, Organization)</li>
            <li><strong>Properties</strong>: Attributes of types (e.g., name, address, startDate)</li>
            <li><strong>Relationships</strong>: How types can be related to each other</li>
        </ul>
        
        <div class="schema-example">
            <h3>Schema.org Hierarchy Example:</h3>
            <pre>
Thing
  ├── CreativeWork
  │     ├── Article
  │     │     ├── NewsArticle
  │     │     ├── BlogPosting
  │     │     └── TechArticle
  │     ├── Book
  │     └── Movie
  ├── Event
  │     ├── BusinessEvent
  │     ├── SportsEvent
  │     └── MusicEvent
  ├── Organization
  │     ├── Corporation
  │     ├── EducationalOrganization
  │     └── LocalBusiness
  └── Person
            </pre>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Microdata</h2>
        <p>Microdata is a set of HTML attributes that allows you to embed structured data directly in your HTML content. It uses the following attributes:</p>
        
        <ul>
            <li><code>itemscope</code>: Indicates that the HTML contains an item</li>
            <li><code>itemtype</code>: Specifies the item type as a URL (usually from Schema.org)</li>
            <li><code>itemprop</code>: Specifies a property of the item</li>
            <li><code>itemid</code>: Provides a unique identifier for the item</li>
            <li><code>itemref</code>: References properties that are not direct descendants of the item</li>
        </ul>
        
        <h3>Basic Microdata Example</h3>
        <p>Here's a simple example of using Microdata to mark up a person:</p>
        
        <div class="code-block">
&lt;div itemscope itemtype="http://schema.org/Person"&gt;
    &lt;span itemprop="name"&gt;John Doe&lt;/span&gt;
    &lt;span itemprop="jobTitle"&gt;Web Developer&lt;/span&gt;
    &lt;div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"&gt;
        &lt;span itemprop="streetAddress"&gt;123 Main St&lt;/span&gt;
        &lt;span itemprop="addressLocality"&gt;New York&lt;/span&gt;,
        &lt;span itemprop="addressRegion"&gt;NY&lt;/span&gt;
    &lt;/div&gt;
    &lt;span itemprop="telephone"&gt;(123) 456-7890&lt;/span&gt;
    &lt;a itemprop="email" href="mailto:john@example.com"&gt;john@example.com&lt;/a&gt;
&lt;/div&gt;
        </div>
        
        <div class="schema-preview">
            <h3>Preview:</h3>
            <div itemscope itemtype="http://schema.org/Person">
                <span itemprop="name">John Doe</span><br>
                <span itemprop="jobTitle">Web Developer</span><br>
                <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                    <span itemprop="streetAddress">123 Main St</span><br>
                    <span itemprop="addressLocality">New York</span>,
                    <span itemprop="addressRegion">NY</span>
                </div>
                <span itemprop="telephone">(123) 456-7890</span><br>
                <a itemprop="email" href="mailto:john@example.com">john@example.com</a>
            </div>
        </div>
        
        <h3>Nested Items</h3>
        <p>Microdata allows for nesting items within other items, which is useful for representing complex relationships:</p>
        
        <div class="code-block">
&lt;div itemscope itemtype="http://schema.org/Product"&gt;
    &lt;span itemprop="name"&gt;Smartphone X&lt;/span&gt;
    &lt;span itemprop="description"&gt;A high-end smartphone with advanced features.&lt;/span&gt;
    
    &lt;div itemprop="offers" itemscope itemtype="http://schema.org/Offer"&gt;
        &lt;span itemprop="price"&gt;$799.99&lt;/span&gt;
        &lt;meta itemprop="priceCurrency" content="USD"&gt;
        &lt;link itemprop="availability" href="http://schema.org/InStock"&gt;In Stock
    &lt;/div&gt;
    
    &lt;div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"&gt;
        &lt;span itemprop="ratingValue"&gt;4.5&lt;/span&gt; stars - based on 
        &lt;span itemprop="reviewCount"&gt;123&lt;/span&gt; reviews
    &lt;/div&gt;
&lt;/div&gt;
        </div>
        
        <div class="schema-preview">
            <h3>Preview:</h3>
            <div itemscope itemtype="http://schema.org/Product">
                <span itemprop="name">Smartphone X</span><br>
                <span itemprop="description">A high-end smartphone with advanced features.</span><br><br>
                
                <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                    <span itemprop="price">$799.99</span>
                    <meta itemprop="priceCurrency" content="USD">
                    <link itemprop="availability" href="http://schema.org/InStock">In Stock
                </div><br>
                
                <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                    <span itemprop="ratingValue">4.5</span> stars - based on 
                    <span itemprop="reviewCount">123</span> reviews
                </div>
            </div>
        </div>
        
        <h3>Using the <code>meta</code> and <code>link</code> Elements</h3>
        <p>Sometimes you need to include structured data that isn't visible to users. You can use <code>meta</code> and <code>link</code> elements for this purpose:</p>
        
        <div class="code-block">
&lt;div itemscope itemtype="http://schema.org/Movie"&gt;
    &lt;h1 itemprop="name"&gt;Avatar&lt;/h1&gt;
    &lt;div itemprop="director" itemscope itemtype="http://schema.org/Person"&gt;
        Director: &lt;span itemprop="name"&gt;James Cameron&lt;/span&gt;
    &lt;/div&gt;
    
    &lt;!-- Hidden structured data --&gt;
    &lt;meta itemprop="datePublished" content="2009-12-18"&gt;
    &lt;link itemprop="sameAs" href="https://www.imdb.com/title/tt0499549/"&gt;
&lt;/div&gt;
        </div>
        
        <div class="note">
            <h3>When to Use Each Element:</h3>
            <ul>
                <li><code>meta</code>: For simple string values that aren't visible to users</li>
                <li><code>link</code>: For URL values that aren't visible to users</li>
                <li>Regular HTML elements: For visible content that should be both displayed and included in structured data</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>JSON-LD (JavaScript Object Notation for Linked Data)</h2>
        <p>JSON-LD is a method of encoding structured data using JSON. Unlike Microdata, which is embedded within your HTML content, JSON-LD is typically added to the <code>&lt;head&gt;</code> section of your HTML document in a <code>&lt;script&gt;</code> tag.</p>
        
        <h3>Basic JSON-LD Example</h3>
        <p>Here's the same person example from earlier, but using JSON-LD:</p>
        
        <div class="code-block">
&lt;script type="application/ld+json"&gt;
{
    "@context": "http://schema.org",
    "@type": "Person",
    "name": "John Doe",
    "jobTitle": "Web Developer",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "123 Main St",
        "addressLocality": "New York",
        "addressRegion": "NY"
    },
    "telephone": "(123) 456-7890",
    "email": "john@example.com"
}
&lt;/script&gt;
        </div>
        
        <div class="example">
            <h3>Advantages of JSON-LD:</h3>
            <ul>
                <li><strong>Separation of Concerns</strong>: Keeps your structured data separate from your HTML markup</li>
                <li><strong>Easier to Implement</strong>: No need to modify existing HTML</li>
                <li><strong>Easier to Maintain</strong>: All structured data is in one place</li>
                <li><strong>Less Error-Prone</strong>: Easier to validate and debug</li>
                <li><strong>Recommended by Google</strong>: Google's preferred format for structured data</li>
            </ul>
        </div>
        
        <h3>Complex JSON-LD Example</h3>
        <p>JSON-LD can easily represent complex nested structures:</p>
        
        <div class="code-block">
&lt;script type="application/ld+json"&gt;
{
    "@context": "http://schema.org",
    "@type": "Product",
    "name": "Smartphone X",
    "description": "A high-end smartphone with advanced features.",
    "image": "https://example.com/smartphone-x.jpg",
    "brand": {
        "@type": "Brand",
        "name": "TechCorp"
    },
    "offers": {
        "@type": "Offer",
        "price": "799.99",
        "priceCurrency": "USD",
        "availability": "http://schema.org/InStock",
        "seller": {
            "@type": "Organization",
            "name": "Electronics Store"
        }
    },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.5",
        "reviewCount": "123"
    },
    "review": [
        {
            "@type": "Review",
            "author": {
                "@type": "Person",
                "name": "Alice Smith"
            },
            "datePublished": "2023-01-15",
            "reviewRating": {
                "@type": "Rating",
                "ratingValue": "5"
            },
            "reviewBody": "This is the best smartphone I've ever owned!"
        },
        {
            "@type": "Review",
            "author": {
                "@type": "Person",
                "name": "Bob Johnson"
            },
            "datePublished": "2023-02-20",
            "reviewRating": {
                "@type": "Rating",
                "ratingValue": "4"
            },
            "reviewBody": "Great phone, but battery life could be better."
        }
    ]
}
&lt;/script&gt;
        </div>
        
        <h3>Multiple JSON-LD Blocks</h3>
        <p>You can include multiple JSON-LD blocks on a single page to represent different entities:</p>
        
        <div class="code-block">
&lt;!-- Organization information --&gt;
&lt;script type="application/ld+json"&gt;
{
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "Example Company",
    "url": "https://www.example.com",
    "logo": "https://www.example.com/logo.png",
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+1-800-555-1234",
        "contactType": "customer service"
    }
}
&lt;/script&gt;

&lt;!-- Breadcrumb navigation --&gt;
&lt;script type="application/ld+json"&gt;
{
    "@context": "http://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "https://www.example.com"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Products",
            "item": "https://www.example.com/products"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "Smartphone X",
            "item": "https://www.example.com/products/smartphone-x"
        }
    ]
}
&lt;/script&gt;
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Common Schema.org Types and Their Properties</h2>
        <p>Let's explore some of the most commonly used Schema.org types and their important properties:</p>
        
        <h3>1. LocalBusiness</h3>
        <p>Used for businesses with a physical location.</p>
        
        <div class="code-block">
&lt;script type="application/ld+json"&gt;
{
    "@context": "http://schema.org",
    "@type": "LocalBusiness",
    "name": "Joe's Pizza",
    "image": "https://example.com/joes-pizza.jpg",
    "telephone": "(123) 456-7890",
    "priceRange": "$$",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "123 Main St",
        "addressLocality": "New York",
        "addressRegion": "NY",
        "postalCode": "10001",
        "addressCountry": "US"
    },
    "geo": {
        "@type": "GeoCoordinates",
        "latitude": "40.7128",
        "longitude": "-74.0060"
    },
    "openingHoursSpecification": [
        {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday"],
            "opens": "11:00",
            "closes": "22:00"
        },
        {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": ["Friday", "Saturday"],
            "opens": "11:00",
            "closes": "23:00"
        },
        {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": "Sunday",
            "opens": "12:00",
            "closes": "21:00"
        }
    ]
}
&lt;/script&gt;
        </div>
        
        <div class="rich-result">
            <div class="rich-result-title">Joe's Pizza - New York, NY</div>
            <div class="rich-result-url">example.com › joes-pizza</div>
            <div class="rich-result-description">Pizza restaurant in New York, NY · Open ⋅ Closes 10PM · $$ · (123) 456-7890</div>
            <div class="rich-result-rating">
                <div class="rich-result-stars">★★★★☆</div>
                <div class="rich-result-count">4.2 (142)</div>
            </div>
        </div>
        
        <h3>2. Article</h3>
        <p>Used for news articles, blog posts, and other written content.</p>
        
        <div class="code-block">
&lt;script type="application/ld+json"&gt;
{
    "@context": "http://schema.org",
    "@type": "Article",
    "headline": "Understanding Structured Data in HTML",
    "author": {
        "@type": "Person",
        "name": "Jane Smith"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Tech Blog",
        "logo": {
            "@type": "ImageObject",
            "url": "https://example.com/logo.png",
            "width": "600",
            "height": "60"
        }
    },
    "image": "https://example.com/article-image.jpg",
    "datePublished": "2023-05-15T08:00:00+08:00",
    "dateModified": "2023-05-16T09:30:00+08:00",
    "description": "Learn how to implement structured data in your HTML to improve SEO.",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://example.com/article"
    }
}
&lt;/script&gt;
        </div>
        
        <div class="rich-result">
            <div class="rich-result-title">Understanding Structured Data in HTML</div>
            <div class="rich-result-url">example.com › article</div>
            <div style="color: #70757a; font-size: 14px; margin-bottom: 5px;">Tech Blog · May 15, 2023 · Jane Smith</div>
            <div class="rich-result-description">Learn how to implement structured data in your HTML to improve SEO.</div>
        </div>
        
        <h3>3. Product</h3>
        <p>Used for product pages on e-commerce websites.</p>
        
        <div class="code-block">
&lt;script type="application/ld+json"&gt;
{
    "@context": "http://schema.org",
    "@type": "Product",
    "name": "Wireless Headphones",
    "image": "https://example.com/headphones.jpg",
    "description": "High-quality wireless headphones with noise cancellation.",
    "brand": {
        "@type": "Brand",
        "name": "AudioTech"
    },
    "sku": "AUD-WH-100",
    "mpn": "925872",
    "offers": {
        "@type": "Offer",
        "url": "https://example.com/headphones",
        "price": "149.99",
        "priceCurrency": "USD",
        "availability": "http://schema.org/InStock",
        "priceValidUntil": "2023-12-31"
    },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.7",
        "reviewCount": "89"
    }
}
&lt;/script&gt;
        </div>
        
        <div class="rich-result">
            <div class="rich-result-title">Wireless Headphones | AudioTech</div>
            <div class="rich-result-url">example.com › headphones</div>
            <div class="rich-result-description">High-quality wireless headphones with noise cancellation.</div>
            <div class="rich-result-rating">
                <div class="rich-result-stars">★★★★★</div>
                <div class="rich-result-count">4.7 (89 reviews)</div>
            </div>
            <div class="rich-result-price">$149.99 - In stock</div>
        </div>
        
        <h3>4. Event</h3>
        <p>Used for events such as concerts, conferences, and workshops.</p>
        
        <div class="code-block">
&lt;script type="application/ld+json"&gt;
{
    "@context": "http://schema.org",
    "@type": "Event",
    "name": "Web Development Conference 2023",
    "startDate": "2023-09-15T09:00:00-07:00",
    "endDate": "2023-09-17T17:00:00-07:00",
    "location": {
        "@type": "Place",
        "name": "Tech Convention Center",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "123 Convention Ave",
            "addressLocality": "San Francisco",
            "addressRegion": "CA",
            "postalCode": "94103",
            "addressCountry": "US"
        }
    },
    "image": "https://example.com/conference.jpg",
    "description": "A three-day conference on the latest web development technologies and practices.",
    "offers": {
        "@type": "Offer",
        "url": "https://example.com/conference-tickets",
        "price": "499",
        "priceCurrency": "USD",
        "availability": "http://schema.org/InStock",
        "validFrom": "2023-05-01T00:00:00-07:00"
    },
    "performer": {
        "@type": "Person",
        "name": "Various Industry Experts"
    },
    "organizer": {
        "@type": "Organization",
        "name": "Web Dev Association",
        "url": "https://example.com/wda"
    }
}
&lt;/script&gt;
        </div>
        
        <div class="rich-result">
            <div class="rich-result-title">Web Development Conference 2023</div>
            <div class="rich-result-url">example.com › conference-tickets</div>
            <div style="color: #70757a; font-size: 14px; margin-bottom: 5px;">Sep 15-17 · Tech Convention Center, San Francisco, CA</div>
            <div class="rich-result-description">A three-day conference on the latest web development technologies and practices.</div>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Testing and Validating Structured Data</h2>
        <p>Before implementing structured data on your live website, it's important to test and validate it to ensure it's correctly formatted and will be properly understood by search engines.</p>
        
        <h3>Google's Rich Results Test</h3>
        <p>Google provides a tool called the Rich Results Test that allows you to test your structured data and see how it might appear in search results.</p>
        
        <div class="example">
            <h3>How to Use the Rich Results Test:</h3>
            <ol>
                <li>Go to <a href="https://search.google.com/test/rich-results" target="_blank">https://search.google.com/test/rich-results</a></li>
                <li>Enter the URL of your page or paste your HTML code</li>
                <li>Click "Test URL" or "Test Code"</li>
                <li>Review the results to see if your structured data is valid and eligible for rich results</li>
            </ol>
        </div>
        
        <h3>Schema.org Validator</h3>
        <p>Schema.org also provides a validator that checks if your structured data follows the Schema.org vocabulary correctly.</p>
        
        <div class="example">
            <h3>How to Use the Schema.org Validator:</h3>
            <ol>
                <li>Go to <a href="https://validator.schema.org/" target="_blank">https://validator.schema.org/</a></li>
                <li>Paste your structured data code</li>
                <li>Click "Validate"</li>
                <li>Review the results for any errors or warnings</li>
            </ol>
        </div>
        
        <h3>Common Validation Errors</h3>
        <p>Here are some common errors you might encounter when validating your structured data:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Error</th>
                <th>Description</th>
                <th>Solution</th>
            </tr>
            <tr>
                <td>Missing required property</td>
                <td>A required property for a specific type is missing</td>
                <td>Add the missing property with a valid value</td>
            </tr>
            <tr>
                <td>Invalid property value</td>
                <td>A property has a value that doesn't match the expected format</td>
                <td>Correct the value to match the expected format (e.g., date format, URL format)</td>
            </tr>
            <tr>
                <td>Incorrect property type</td>
                <td>A property has a value of the wrong type</td>
                <td>Change the value to the correct type (e.g., string, number, nested object)</td>
            </tr>
            <tr>
                <td>Duplicate IDs</td>
                <td>Multiple items have the same ID</td>
                <td>Ensure each item has a unique ID</td>
            </tr>
            <tr>
                <td>Invalid syntax</td>
                <td>The JSON-LD or HTML syntax is incorrect</td>
                <td>Fix the syntax errors (e.g., missing commas, unclosed brackets)</td>
            </tr>
        </table>
        
        <div class="warning">
            <h3>Important Considerations:</h3>
            <ul>
                <li>Structured data should accurately represent the content visible on the page</li>
                <li>Don't use structured data to mislead users or search engines</li>
                <li>Follow Google's structured data guidelines to avoid penalties</li>
                <li>Test your structured data after any significant changes to your website</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Best Practices for Implementing Structured Data</h2>
        
        <h3>1. Choose the Right Format</h3>
        <ul>
            <li>Use JSON-LD when possible, as it's recommended by Google and easier to maintain</li>
            <li>Use Microdata when you need to tie structured data directly to visible elements</li>
            <li>Be consistent with your chosen format across your website</li>
        </ul>
        
        <h3>2. Be Specific</h3>
        <ul>
            <li>Use the most specific type possible (e.g., use "LocalBusiness" instead of just "Organization")</li>
            <li>Include as many relevant properties as possible</li>
            <li>Use specific subtypes when applicable (e.g., "Restaurant" instead of "LocalBusiness" for a restaurant)</li>
        </ul>
        
        <h3>3. Ensure Accuracy</h3>
        <ul>
            <li>Structured data should accurately reflect the visible content on the page</li>
            <li>Keep structured data up-to-date when content changes</li>
            <li>Don't mark up content that isn't visible to users</li>
        </ul>
        
        <h3>4. Prioritize Important Pages</h3>
        <ul>
            <li>Start by implementing structured data on your most important pages</li>
            <li>Focus on pages that could benefit from rich results (e.g., product pages, event pages)</li>
            <li>Gradually expand to other pages as resources allow</li>
        </ul>
        
        <h3>5. Test and Monitor</h3>
        <ul>
            <li>Validate your structured data before publishing</li>
            <li>Monitor your structured data in Google Search Console</li>
            <li>Fix any errors or warnings promptly</li>
            <li>Test after making changes to your website</li>
        </ul>
        
        <div class="example">
            <h3>Structured Data Implementation Checklist:</h3>
            <ol>
                <li>Identify the type of content you want to mark up</li>
                <li>Choose the appropriate Schema.org type</li>
                <li>Decide on the format (JSON-LD or Microdata)</li>
                <li>Implement the structured data</li>
                <li>Validate using testing tools</li>
                <li>Fix any errors or warnings</li>
                <li>Publish the updated page</li>
                <li>Monitor in Google Search Console</li>
            </ol>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Create Structured Data for a Recipe</h2>
        <p>Let's create structured data for a recipe using both Microdata and JSON-LD formats.</p>
        
        <div class="tabs">
            <div class="tab active" onclick="showTab('recipe-html')">HTML Content</div>
            <div class="tab" onclick="showTab('recipe-microdata')">Microdata</div>
            <div class="tab" onclick="showTab('recipe-jsonld')">JSON-LD</div>
        </div>
        
        <div id="recipe-html" class="tab-content active">
            <textarea id="htmlEditor" rows="15" style="width: 100%; font-family: monospace; padding: 10px;"><!-- Basic HTML for a recipe page -->
<div class="recipe">
    <h1>Chocolate Chip Cookies</h1>
    <p class="description">Classic chocolate chip cookies that are soft, chewy, and loaded with chocolate chips.</p>
    
    <div class="recipe-meta">
        <p>Prep Time: 15 minutes</p>
        <p>Cook Time: 10 minutes</p>
        <p>Total Time: 25 minutes</p>
        <p>Yield: 24 cookies</p>
        <p>Calories: 150 per cookie</p>
    </div>
    
    <div class="author">
        <p>By: Jane Smith</p>
        <p>Published: January 15, 2023</p>
    </div>
    
    <img src="https://example.com/chocolate-chip-cookies.jpg" alt="Chocolate Chip Cookies">
    
    <h2>Ingredients</h2>
    <ul>
        <li>1 cup butter, softened</li>
        <li>1 cup white sugar</li>
        <li>1 cup packed brown sugar</li>
        <li>2 eggs</li>
        <li>2 teaspoons vanilla extract</li>
        <li>3 cups all-purpose flour</li>
        <li>1 teaspoon baking soda</li>
        <li>2 teaspoons hot water</li>
        <li>1/2 teaspoon salt</li>
        <li>2 cups semisweet chocolate chips</li>
    </ul>
    
    <h2>Instructions</h2>
    <ol>
        <li>Preheat oven to 350 degrees F (175 degrees C).</li>
        <li>Cream together the butter, white sugar, and brown sugar until smooth.</li>
        <li>Beat in the eggs one at a time, then stir in the vanilla.</li>
        <li>Dissolve baking soda in hot water. Add to batter along with salt.</li>
        <li>Stir in flour and chocolate chips.</li>
        <li>Drop by large spoonfuls onto ungreased pans.</li>
        <li>Bake for about 10 minutes or until edges are nicely browned.</li>
    </ol>
    
    <h2>Nutrition Information</h2>
    <p>Calories: 150, Fat: 7g, Carbohydrates: 20g, Protein: 2g</p>
</div></textarea>
        </div>
        
        <div id="recipe-microdata" class="tab-content">
            <textarea id="microdataEditor" rows="25" style="width: 100%; font-family: monospace; padding: 10px;"><!-- Recipe with Microdata -->
<div class="recipe" itemscope itemtype="http://schema.org/Recipe">
    <h1 itemprop="name">Chocolate Chip Cookies</h1>
    <p itemprop="description">Classic chocolate chip cookies that are soft, chewy, and loaded with chocolate chips.</p>
    
    <div class="recipe-meta">
        <meta itemprop="prepTime" content="PT15M">Prep Time: 15 minutes
        <meta itemprop="cookTime" content="PT10M">Cook Time: 10 minutes
        <meta itemprop="totalTime" content="PT25M">Total Time: 25 minutes
        <p>Yield: <span itemprop="recipeYield">24 cookies</span></p>
        <p>Calories: <span itemprop="nutrition" itemscope itemtype="http://schema.org/NutritionInformation">
            <span itemprop="calories">150</span> per cookie
        </span></p>
    </div>
    
    <div class="author">
        <p>By: <span itemprop="author" itemscope itemtype="http://schema.org/Person">
            <span itemprop="name">Jane Smith</span>
        </span></p>
        <meta itemprop="datePublished" content="2023-01-15">Published: January 15, 2023
    </div>
    
    <img itemprop="image" src="https://example.com/chocolate-chip-cookies.jpg" alt="Chocolate Chip Cookies">
    
    <h2>Ingredients</h2>
    <ul>
        <li itemprop="recipeIngredient">1 cup butter, softened</li>
        <li itemprop="recipeIngredient">1 cup white sugar</li>
        <li itemprop="recipeIngredient">1 cup packed brown sugar</li>
        <li itemprop="recipeIngredient">2 eggs</li>
        <li itemprop="recipeIngredient">2 teaspoons vanilla extract</li>
        <li itemprop="recipeIngredient">3 cups all-purpose flour</li>
        <li itemprop="recipeIngredient">1 teaspoon baking soda</li>
        <li itemprop="recipeIngredient">2 teaspoons hot water</li>
        <li itemprop="recipeIngredient">1/2 teaspoon salt</li>
        <li itemprop="recipeIngredient">2 cups semisweet chocolate chips</li>
    </ul>
    
    <h2>Instructions</h2>
    <ol itemprop="recipeInstructions">
        <li>Preheat oven to 350 degrees F (175 degrees C).</li>
        <li>Cream together the butter, white sugar, and brown sugar until smooth.</li>
        <li>Beat in the eggs one at a time, then stir in the vanilla.</li>
        <li>Dissolve baking soda in hot water. Add to batter along with salt.</li>
        <li>Stir in flour and chocolate chips.</li>
        <li>Drop by large spoonfuls onto ungreased pans.</li>
        <li>Bake for about 10 minutes or until edges are nicely browned.</li>
    </ol>
    
    <h2>Nutrition Information</h2>
    <p itemprop="nutrition" itemscope itemtype="http://schema.org/NutritionInformation">
        <span itemprop="calories">150</span> calories, 
        <span itemprop="fatContent">7g</span> fat, 
        <span itemprop="carbohydrateContent">20g</span> carbohydrates, 
        <span itemprop="proteinContent">2g</span> protein
    </p>
    
    <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
        <meta itemprop="ratingValue" content="4.8">
        <meta itemprop="reviewCount" content="276">
        <!-- This data could be displayed elsewhere on the page -->
    </div>
    
    <meta itemprop="keywords" content="cookies, chocolate chip, dessert, baking">
</div></textarea>
        </div>
        
        <div id="recipe-jsonld" class="tab-content">
            <textarea id="jsonldEditor" rows="40" style="width: 100%; font-family: monospace; padding: 10px;"><!-- Recipe with JSON-LD -->
<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Recipe",
    "name": "Chocolate Chip Cookies",
    "description": "Classic chocolate chip cookies that are soft, chewy, and loaded with chocolate chips.",
    "image": "https://example.com/chocolate-chip-cookies.jpg",
    "author": {
        "@type": "Person",
        "name": "Jane Smith"
    },
    "datePublished": "2023-01-15",
    "prepTime": "PT15M",
    "cookTime": "PT10M",
    "totalTime": "PT25M",
    "recipeYield": "24 cookies",
    "recipeIngredient": [
        "1 cup butter, softened",
        "1 cup white sugar",
        "1 cup packed brown sugar",
        "2 eggs",
        "2 teaspoons vanilla extract",
        "3 cups all-purpose flour",
        "1 teaspoon baking soda",
        "2 teaspoons hot water",
        "1/2 teaspoon salt",
        "2 cups semisweet chocolate chips"
    ],
    "recipeInstructions": [
        {
            "@type": "HowToStep",
            "text": "Preheat oven to 350 degrees F (175 degrees C)."
        },
        {
            "@type": "HowToStep",
            "text": "Cream together the butter, white sugar, and brown sugar until smooth."
        },
        {
            "@type": "HowToStep",
            "text": "Beat in the eggs one at a time, then stir in the vanilla."
        },
        {
            "@type": "HowToStep",
            "text": "Dissolve baking soda in hot water. Add to batter along with salt."
        },
        {
            "@type": "HowToStep",
            "text": "Stir in flour and chocolate chips."
        },
        {
            "@type": "HowToStep",
            "text": "Drop by large spoonfuls onto ungreased pans."
        },
        {
            "@type": "HowToStep",
            "text": "Bake for about 10 minutes or until edges are nicely browned."
        }
    ],
    "nutrition": {
        "@type": "NutritionInformation",
        "calories": "150 calories",
        "fatContent": "7 g",
        "carbohydrateContent": "20 g",
        "proteinContent": "2 g"
    },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "reviewCount": "276"
    },
    "keywords": "cookies, chocolate chip, dessert, baking",
    "recipeCategory": "Dessert",
    "recipeCuisine": "American"
}
</script></textarea>
        </div>
        
        <button onclick="updatePreview()">Update Preview</button>
        
        <h3>Preview:</h3>
        <div id="recipePreview" style="width: 100%; padding: 20px; border: 1px solid #ddd; margin: 10px 0; background-color: white;"></div>
        
        <script>
            function showTab(tabName) {
                // Hide all tab contents
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                
                // Deactivate all tabs
                document.querySelectorAll('.tab').forEach(tab => {
                    tab.classList.remove('active');
                });
                
                // Activate selected tab and content
                document.getElementById(tabName).classList.add('active');
                document.querySelector(`.tab[onclick="showTab('${tabName}')"]`).classList.add('active');
            }
            
            function updatePreview() {
                const htmlCode = document.getElementById('htmlEditor').value;
                const preview = document.getElementById('recipePreview');
                preview.innerHTML = htmlCode;
                
                // Add a rich result preview
                const richPreview = document.createElement('div');
                richPreview.innerHTML = `
                    <h3>How this might appear in search results:</h3>
                    <div class="rich-result">
                        <div class="rich-result-title">Chocolate Chip Cookies Recipe</div>
                        <div class="rich-result-url">example.com › recipes › chocolate-chip-cookies</div>
                        <div style="display: flex; margin-top: 10px;">
                            <div style="width: 100px; height: 100px; background-color: #f0f0f0; margin-right: 15px; background-image: url('https://via.placeholder.com/100x100?text=Cookie'); background-size: cover;"></div>
                            <div>
                                <div class="rich-result-rating">
                                    <div class="rich-result-stars">★★★★★</div>
                                    <div class="rich-result-count">4.8 (276)</div>
                                </div>
                                <div style="margin-top: 5px;">Total Time: 25 min · Yield: 24 cookies</div>
                                <div style="margin-top: 5px;">Calories: 150 per cookie</div>
                            </div>
                        </div>
                    </div>
                `;
                preview.appendChild(richPreview);
            }
            
            // Initialize preview
            document.addEventListener('DOMContentLoaded', function() {
                updatePreview();
            });
        </script>
    </div>
    
    <div class="quiz-container">
        <h2>Knowledge Check</h2>
        
        <div class="quiz-question">
            1. Which of the following is NOT a structured data format?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> JSON-LD</label>
            <label><input type="radio" name="q1" value="b"> Microdata</label>
            <label><input type="radio" name="q1" value="c"> RDFa</label>
            <label><input type="radio" name="q1" value="d"> HTML5</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which attribute is used to specify the item type in Microdata?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> itemscope</label>
            <label><input type="radio" name="q2" value="b"> itemtype</label>
            <label><input type="radio" name="q2" value="c"> itemprop</label>
            <label><input type="radio" name="q2" value="d"> itemid</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which structured data format is recommended by Google?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> Microdata</label>
            <label><input type="radio" name="q3" value="b"> RDFa</label>
            <label><input type="radio" name="q3" value="c"> JSON-LD</label>
            <label><input type="radio" name="q3" value="d"> XML</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. What is the purpose of structured data on a webpage?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> To improve the visual design of the page</label>
            <label><input type="radio" name="q4" value="b"> To help search engines understand the content of the page</label>
            <label><input type="radio" name="q4" value="c"> To make the page load faster</label>
            <label><input type="radio" name="q4" value="d"> To prevent hackers from accessing the page</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. Which tool can you use to test your structured data for Google search results?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> Google Analytics</label>
            <label><input type="radio" name="q5" value="b"> Google PageSpeed Insights</label>
            <label><input type="radio" name="q5" value="c"> Google Rich Results Test</label>
            <label><input type="radio" name="q5" value="d"> Google Keyword Planner</label>
        </div>
        <div id="feedback5" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'd',
                    q2: 'b',
                    q3: 'c',
                    q4: 'b',
                    q5: 'c'
                };
                
                for (let i = 1; i <= 5; i++) {
                    const selectedOption = document.querySelector(`input[name="q${i}"]:checked`);
                    const feedbackElement = document.getElementById(`feedback${i}`);
                    
                    if (!selectedOption) {
                        feedbackElement.textContent = "Please select an answer.";
                        feedbackElement.className = "feedback incorrect";
                        feedbackElement.style.display = "block";
                        continue;
                    }
                    
                    if (selectedOption.value === answers[`q${i}`]) {
                        feedbackElement.textContent = "Correct!";
                        feedbackElement.className = "feedback correct";
                    } else {
                        feedbackElement.textContent = "Incorrect. Try again!";
                        feedbackElement.className = "feedback incorrect";
                    }
                    
                    feedbackElement.style.display = "block";
                }
            }
        </script>
    </div>
    
    <div class="navigation">
        <div>
            <button onclick="window.location.href='03_web_components.php'">Previous Lesson: Web Components</button>
        </div>
        <div>
            <button onclick="window.location.href='05_performance_optimization.php'">Next Lesson: Performance Optimization</button>
        </div>
    </div>
</body>
</html>
