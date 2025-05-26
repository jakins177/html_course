<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Performance Optimization</title>
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
        
        /* Performance specific styles */
        .performance-meter {
            width: 100%;
            height: 30px;
            background-color: #f0f0f0;
            border-radius: 15px;
            margin: 15px 0;
            overflow: hidden;
            position: relative;
        }
        .performance-value {
            height: 100%;
            background-color: #2ecc71;
            border-radius: 15px;
            transition: width 1s;
        }
        .performance-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #333;
            font-weight: bold;
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
        .before-after {
            display: flex;
            gap: 20px;
            margin: 20px 0;
        }
        .before-after > div {
            flex: 1;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }
        .before-after h4 {
            margin-top: 0;
            text-align: center;
            background-color: #f0f0f0;
            padding: 5px;
            border-radius: 3px;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>HTML Performance Optimization</h1>
    
    <div class="lesson-container">
        <h2>Introduction to Web Performance</h2>
        <p>Web performance refers to how quickly your web pages load and respond to user interactions. Optimizing performance is crucial for providing a good user experience, improving search engine rankings, and increasing conversion rates.</p>
        
        <div class="example">
            <h3>Why Performance Matters:</h3>
            <ul>
                <li><strong>User Experience</strong>: Users expect websites to load quickly. Studies show that 53% of mobile users abandon sites that take longer than 3 seconds to load.</li>
                <li><strong>SEO</strong>: Google uses page speed as a ranking factor for both desktop and mobile searches.</li>
                <li><strong>Conversion Rates</strong>: Faster sites have higher conversion rates. Amazon found that every 100ms of latency cost them 1% in sales.</li>
                <li><strong>Accessibility</strong>: Not all users have high-speed internet connections or powerful devices.</li>
                <li><strong>Energy Efficiency</strong>: Faster, more efficient websites consume less battery power on mobile devices.</li>
            </ul>
        </div>
        
        <h3>Key Performance Metrics</h3>
        <p>When optimizing web performance, it's important to understand the key metrics that affect user experience:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Metric</th>
                <th>Description</th>
                <th>Target</th>
            </tr>
            <tr>
                <td>First Contentful Paint (FCP)</td>
                <td>Time until the first content is rendered on the screen</td>
                <td>&lt; 1.8 seconds</td>
            </tr>
            <tr>
                <td>Largest Contentful Paint (LCP)</td>
                <td>Time until the largest content element is rendered</td>
                <td>&lt; 2.5 seconds</td>
            </tr>
            <tr>
                <td>First Input Delay (FID)</td>
                <td>Time from when a user first interacts to when the browser responds</td>
                <td>&lt; 100 milliseconds</td>
            </tr>
            <tr>
                <td>Cumulative Layout Shift (CLS)</td>
                <td>Measure of visual stability (how much elements move during loading)</td>
                <td>&lt; 0.1</td>
            </tr>
            <tr>
                <td>Time to Interactive (TTI)</td>
                <td>Time until the page is fully interactive</td>
                <td>&lt; 3.8 seconds</td>
            </tr>
            <tr>
                <td>Total Blocking Time (TBT)</td>
                <td>Sum of time when the main thread is blocked</td>
                <td>&lt; 200 milliseconds</td>
            </tr>
        </table>
        
        <div class="note">
            <p>These metrics are part of Google's Core Web Vitals, which are used to measure user experience on the web. They focus on loading performance, interactivity, and visual stability.</p>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>HTML Structure Optimization</h2>
        <p>The structure of your HTML document can significantly impact loading performance. Here are key strategies for optimizing your HTML structure:</p>
        
        <h3>1. Minimize HTML Size</h3>
        <p>Reducing the size of your HTML document helps it load faster:</p>
        
        <div class="before-after">
            <div>
                <h4>Before</h4>
                <div class="code-block">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;My Website&lt;/title&gt;
        
        &lt;!-- Lots of whitespace and comments --&gt;
        
        &lt;!-- This is a comment that explains something obvious --&gt;
        &lt;link rel="stylesheet" href="styles.css"&gt;
        
        &lt;!-- Another unnecessary comment --&gt;
        &lt;script src="script.js"&gt;&lt;/script&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;div class="container"&gt;
            &lt;div class="header"&gt;
                &lt;h1&gt;Welcome to My Website&lt;/h1&gt;
                &lt;p&gt;This is a paragraph with some text.&lt;/p&gt;
            &lt;/div&gt;
            
            &lt;div class="content"&gt;
                &lt;p&gt;More content here...&lt;/p&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
                </div>
            </div>
            <div>
                <h4>After</h4>
                <div class="code-block">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;My Website&lt;/title&gt;
    &lt;link rel="stylesheet" href="styles.css"&gt;
    &lt;script src="script.js"&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div class="container"&gt;
        &lt;div class="header"&gt;
            &lt;h1&gt;Welcome to My Website&lt;/h1&gt;
            &lt;p&gt;This is a paragraph with some text.&lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="content"&gt;
            &lt;p&gt;More content here...&lt;/p&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;
                </div>
            </div>
        </div>
        
        <p>Key techniques for minimizing HTML size:</p>
        <ul>
            <li>Remove unnecessary whitespace and line breaks (use a minifier for production)</li>
            <li>Eliminate redundant or unnecessary comments</li>
            <li>Use shorter class and ID names (but keep them meaningful)</li>
            <li>Remove unused HTML elements and attributes</li>
        </ul>
        
        <h3>2. Optimize the Critical Rendering Path</h3>
        <p>The critical rendering path is the sequence of steps the browser takes to convert HTML, CSS, and JavaScript into pixels on the screen. Optimizing this path can significantly improve perceived loading speed:</p>
        
        <div class="code-block">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Optimized Page&lt;/title&gt;
    
    &lt;!-- Critical CSS inlined in the head --&gt;
    &lt;style&gt;
        /* Only include styles needed for above-the-fold content */
        body { margin: 0; font-family: sans-serif; }
        .header { padding: 20px; background-color: #f0f0f0; }
        h1 { color: #333; }
    &lt;/style&gt;
    
    &lt;!-- Non-critical CSS loaded asynchronously --&gt;
    &lt;link rel="preload" href="styles.css" as="style" onload="this.onload=null;this.rel='stylesheet'"&gt;
    &lt;noscript&gt;&lt;link rel="stylesheet" href="styles.css"&gt;&lt;/noscript&gt;
    
    &lt;!-- Defer non-critical JavaScript --&gt;
    &lt;script src="script.js" defer&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;header class="header"&gt;
        &lt;h1&gt;Welcome to My Website&lt;/h1&gt;
    &lt;/header&gt;
    
    &lt;main&gt;
        &lt;p&gt;Content goes here...&lt;/p&gt;
    &lt;/main&gt;
&lt;/body&gt;
&lt;/html&gt;
        </div>
        
        <p>Key techniques for optimizing the critical rendering path:</p>
        <ul>
            <li>Inline critical CSS in the <code>&lt;head&gt;</code> section</li>
            <li>Load non-critical CSS asynchronously</li>
            <li>Use <code>defer</code> or <code>async</code> attributes for JavaScript files</li>
            <li>Minimize the number of resources needed for initial render</li>
            <li>Prioritize above-the-fold content</li>
        </ul>
        
        <div class="note">
            <h3>Understanding <code>defer</code> vs <code>async</code>:</h3>
            <ul>
                <li><code>defer</code>: Scripts execute after HTML parsing is complete, in the order they appear</li>
                <li><code>async</code>: Scripts execute as soon as they're downloaded, potentially interrupting HTML parsing</li>
            </ul>
            <p>Use <code>defer</code> for scripts that need the DOM and depend on each other. Use <code>async</code> for independent scripts where execution order doesn't matter.</p>
        </div>
        
        <h3>3. Use Semantic HTML</h3>
        <p>Semantic HTML not only improves accessibility and SEO but can also improve performance by making the document structure more efficient:</p>
        
        <div class="before-after">
            <div>
                <h4>Non-Semantic HTML</h4>
                <div class="code-block">
&lt;div class="header"&gt;
    &lt;div class="logo"&gt;My Site&lt;/div&gt;
    &lt;div class="nav"&gt;
        &lt;div class="nav-item"&gt;Home&lt;/div&gt;
        &lt;div class="nav-item"&gt;About&lt;/div&gt;
        &lt;div class="nav-item"&gt;Contact&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;

&lt;div class="main-content"&gt;
    &lt;div class="article"&gt;
        &lt;div class="article-title"&gt;My Article&lt;/div&gt;
        &lt;div class="article-content"&gt;
            &lt;div class="paragraph"&gt;Content here...&lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    
    &lt;div class="sidebar"&gt;
        &lt;div class="widget"&gt;Widget content&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;

&lt;div class="footer"&gt;
    &lt;div class="copyright"&gt;Copyright 2023&lt;/div&gt;
&lt;/div&gt;
                </div>
            </div>
            <div>
                <h4>Semantic HTML</h4>
                <div class="code-block">
&lt;header&gt;
    &lt;div class="logo"&gt;My Site&lt;/div&gt;
    &lt;nav&gt;
        &lt;ul&gt;
            &lt;li&gt;&lt;a href="/"&gt;Home&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href="/about"&gt;About&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href="/contact"&gt;Contact&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;
&lt;/header&gt;

&lt;main&gt;
    &lt;article&gt;
        &lt;h1&gt;My Article&lt;/h1&gt;
        &lt;p&gt;Content here...&lt;/p&gt;
    &lt;/article&gt;
    
    &lt;aside&gt;
        &lt;section class="widget"&gt;Widget content&lt;/section&gt;
    &lt;/aside&gt;
&lt;/main&gt;

&lt;footer&gt;
    &lt;p&gt;Copyright 2023&lt;/p&gt;
&lt;/footer&gt;
                </div>
            </div>
        </div>
        
        <p>Benefits of semantic HTML for performance:</p>
        <ul>
            <li>Browsers can better understand and optimize the document structure</li>
            <li>Reduces the need for excessive class names and attributes</li>
            <li>Improves the efficiency of browser rendering</li>
            <li>Makes the code more maintainable, which indirectly improves performance over time</li>
        </ul>
    </div>
    
    <div class="lesson-container">
        <h2>Resource Loading Optimization</h2>
        <p>How you load resources like images, scripts, and stylesheets can dramatically impact your page's performance.</p>
        
        <h3>1. Resource Hints</h3>
        <p>Resource hints allow you to inform the browser about resources that will be needed soon, enabling it to prepare in advance:</p>
        
        <div class="code-block">
&lt;!-- Preconnect to important third-party domains --&gt;
&lt;link rel="preconnect" href="https://fonts.googleapis.com"&gt;
&lt;link rel="preconnect" href="https://analytics.example.com"&gt;

&lt;!-- Prefetch resources likely to be needed for the next page --&gt;
&lt;link rel="prefetch" href="next-page.html"&gt;

&lt;!-- Preload critical resources needed for the current page --&gt;
&lt;link rel="preload" href="critical-font.woff2" as="font" type="font/woff2" crossorigin&gt;
&lt;link rel="preload" href="hero-image.jpg" as="image"&gt;

&lt;!-- DNS prefetch (older, less powerful version of preconnect) --&gt;
&lt;link rel="dns-prefetch" href="https://api.example.com"&gt;
        </div>
        
        <table class="comparison-table">
            <tr>
                <th>Resource Hint</th>
                <th>Purpose</th>
                <th>When to Use</th>
            </tr>
            <tr>
                <td><code>preconnect</code></td>
                <td>Establish early connections to important domains</td>
                <td>For third-party domains you'll definitely use</td>
            </tr>
            <tr>
                <td><code>prefetch</code></td>
                <td>Fetch resources likely needed for future navigation</td>
                <td>For resources needed on the next page</td>
            </tr>
            <tr>
                <td><code>preload</code></td>
                <td>Load critical resources needed for current page</td>
                <td>For resources needed soon on the current page</td>
            </tr>
            <tr>
                <td><code>dns-prefetch</code></td>
                <td>Resolve DNS for domains that will be used</td>
                <td>As a fallback for browsers that don't support preconnect</td>
            </tr>
            <tr>
                <td><code>prerender</code></td>
                <td>Render a page in the background</td>
                <td>When you're very confident about the next navigation</td>
            </tr>
        </table>
        
        <div class="warning">
            <p>Use resource hints judiciously. Preloading or prefetching too many resources can actually harm performance by competing for bandwidth with critical resources.</p>
        </div>
        
        <h3>2. Lazy Loading</h3>
        <p>Lazy loading defers the loading of non-critical resources until they are needed, typically when they come into the viewport:</p>
        
        <div class="code-block">
&lt;!-- Native lazy loading for images --&gt;
&lt;img src="image.jpg" alt="Description" loading="lazy"&gt;

&lt;!-- Native lazy loading for iframes --&gt;
&lt;iframe src="embed.html" loading="lazy"&gt;&lt;/iframe&gt;

&lt;!-- JavaScript-based lazy loading (for older browsers) --&gt;
&lt;img data-src="image.jpg" alt="Description" class="lazy"&gt;

&lt;script&gt;
    // Simple JavaScript lazy loading implementation
    document.addEventListener("DOMContentLoaded", function() {
        const lazyImages = document.querySelectorAll("img.lazy");
        
        if ("IntersectionObserver" in window) {
            let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        let lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;
                        lazyImage.classList.remove("lazy");
                        lazyImageObserver.unobserve(lazyImage);
                    }
                });
            });
            
            lazyImages.forEach(function(lazyImage) {
                lazyImageObserver.observe(lazyImage);
            });
        }
    });
&lt;/script&gt;
        </div>
        
        <p>Benefits of lazy loading:</p>
        <ul>
            <li>Reduces initial page load time by deferring non-critical resources</li>
            <li>Saves bandwidth for users who don't scroll to the bottom of the page</li>
            <li>Improves performance on mobile devices and slow connections</li>
            <li>Native support in modern browsers with the <code>loading="lazy"</code> attribute</li>
        </ul>
        
        <h3>3. Responsive Images</h3>
        <p>Responsive images ensure that users download only the image size they need based on their device and viewport:</p>
        
        <div class="code-block">
&lt;!-- Using srcset for different resolutions --&gt;
&lt;img src="image-800w.jpg"
     srcset="image-400w.jpg 400w,
             image-800w.jpg 800w,
             image-1200w.jpg 1200w"
     sizes="(max-width: 600px) 400px,
            (max-width: 1000px) 800px,
            1200px"
     alt="Responsive image example"&gt;

&lt;!-- Using picture element for art direction --&gt;
&lt;picture&gt;
    &lt;source media="(max-width: 600px)" srcset="small-image.jpg"&gt;
    &lt;source media="(max-width: 1000px)" srcset="medium-image.jpg"&gt;
    &lt;img src="large-image.jpg" alt="Art-directed responsive image"&gt;
&lt;/picture&gt;

&lt;!-- Using modern image formats with fallbacks --&gt;
&lt;picture&gt;
    &lt;source type="image/webp" srcset="image.webp"&gt;
    &lt;source type="image/jpeg" srcset="image.jpg"&gt;
    &lt;img src="image.jpg" alt="Image with format fallback"&gt;
&lt;/picture&gt;
        </div>
        
        <p>Key techniques for responsive images:</p>
        <ul>
            <li>Use the <code>srcset</code> attribute to provide multiple resolutions</li>
            <li>Use the <code>sizes</code> attribute to help the browser choose the right image</li>
            <li>Use the <code>&lt;picture&gt;</code> element for art direction (different crops for different viewports)</li>
            <li>Provide modern formats like WebP with appropriate fallbacks</li>
            <li>Always include a standard <code>src</code> attribute for older browsers</li>
        </ul>
    </div>
    
    <div class="lesson-container">
        <h2>Image Optimization</h2>
        <p>Images often account for the majority of a webpage's size. Optimizing them can lead to significant performance improvements.</p>
        
        <h3>1. Choose the Right Format</h3>
        <p>Different image formats are suited for different types of images:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Format</th>
                <th>Best For</th>
                <th>Advantages</th>
                <th>Disadvantages</th>
            </tr>
            <tr>
                <td>JPEG</td>
                <td>Photographs, complex images with many colors</td>
                <td>Small file size for photos, widely supported</td>
                <td>Lossy compression, no transparency</td>
            </tr>
            <tr>
                <td>PNG</td>
                <td>Images with transparency, graphics with text</td>
                <td>Lossless, supports transparency</td>
                <td>Larger file size than JPEG for photos</td>
            </tr>
            <tr>
                <td>WebP</td>
                <td>Modern replacement for both JPEG and PNG</td>
                <td>Better compression than JPEG/PNG, supports transparency</td>
                <td>Not supported in older browsers</td>
            </tr>
            <tr>
                <td>SVG</td>
                <td>Logos, icons, simple illustrations</td>
                <td>Scalable, small file size, can be styled with CSS</td>
                <td>Not suitable for photographs</td>
            </tr>
            <tr>
                <td>AVIF</td>
                <td>Next-gen format for all types of images</td>
                <td>Superior compression, high quality</td>
                <td>Limited browser support</td>
            </tr>
        </table>
        
        <h3>2. Compress Images</h3>
        <p>Compressing images reduces their file size while maintaining acceptable quality:</p>
        
        <div class="example">
            <h3>Image Compression Tools:</h3>
            <ul>
                <li><strong>Online Tools</strong>: TinyPNG, Squoosh, ImageOptim (web version)</li>
                <li><strong>Desktop Applications</strong>: ImageOptim (Mac), FileOptimizer (Windows)</li>
                <li><strong>Command Line</strong>: MozJPEG, OptiPNG, SVGO</li>
                <li><strong>Build Tools</strong>: imagemin (for webpack, gulp, etc.)</li>
            </ul>
        </div>
        
        <p>Tips for effective image compression:</p>
        <ul>
            <li>Use lossy compression for photographs (JPEG, WebP)</li>
            <li>Use lossless compression for graphics with text or sharp edges (PNG, SVG)</li>
            <li>Experiment with quality settings to find the right balance between size and quality</li>
            <li>Remove unnecessary metadata (EXIF data) from images</li>
            <li>Consider using modern formats like WebP or AVIF with appropriate fallbacks</li>
        </ul>
        
        <h3>3. Optimize SVG</h3>
        <p>SVG (Scalable Vector Graphics) files can be optimized to reduce their size:</p>
        
        <div class="before-after">
            <div>
                <h4>Unoptimized SVG</h4>
                <div class="code-block">
&lt;svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"&gt;
    &lt;!-- Generator: Adobe Illustrator 24.0.0, SVG Export Plug-In --&gt;
    &lt;metadata&gt;
        &lt;rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"&gt;
            &lt;rdf:Description&gt;
                &lt;dc:title&gt;Simple Circle&lt;/dc:title&gt;
                &lt;dc:creator&gt;John Doe&lt;/dc:creator&gt;
            &lt;/rdf:Description&gt;
        &lt;/rdf:RDF&gt;
    &lt;/metadata&gt;
    &lt;circle cx="50.0" cy="50.0" r="40.0" fill="#ff0000" stroke="#000000" stroke-width="2.5"/&gt;
&lt;/svg&gt;
                </div>
            </div>
            <div>
                <h4>Optimized SVG</h4>
                <div class="code-block">
&lt;svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"&gt;
    &lt;circle cx="50" cy="50" r="40" fill="red" stroke="#000" stroke-width="2.5"/&gt;
&lt;/svg&gt;
                </div>
            </div>
        </div>
        
        <p>SVG optimization techniques:</p>
        <ul>
            <li>Remove unnecessary attributes (width/height can be set via CSS)</li>
            <li>Remove metadata, comments, and editor information</li>
            <li>Use shorter color values (e.g., "red" instead of "#ff0000")</li>
            <li>Round numeric values to fewer decimal places</li>
            <li>Minify and compress SVG files</li>
            <li>Consider using tools like SVGO to automate optimization</li>
        </ul>
    </div>
    
    <div class="lesson-container">
        <h2>Caching and Content Delivery</h2>
        <p>Proper caching and content delivery strategies can dramatically improve load times for returning visitors.</p>
        
        <h3>1. Browser Caching</h3>
        <p>Browser caching allows you to specify how long browsers should keep resources in their local cache:</p>
        
        <div class="code-block">
&lt;!-- Meta tags for caching (less effective than HTTP headers) --&gt;
&lt;meta http-equiv="Cache-Control" content="max-age=31536000"&gt;

&lt;!-- Better approach: Set HTTP headers on the server --&gt;
&lt;!-- Example for Apache (.htaccess file) --&gt;
&lt;IfModule mod_expires.c&gt;
    ExpiresActive On
    
    # Images
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/webp "access plus 1 year"
    ExpiresByType image/svg+xml "access plus 1 year"
    
    # CSS, JavaScript
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType text/javascript "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
    
    # Fonts
    ExpiresByType font/woff "access plus 1 year"
    ExpiresByType font/woff2 "access plus 1 year"
&lt;/IfModule&gt;
        </div>
        
        <p>Caching strategies:</p>
        <ul>
            <li>Set longer cache times for resources that change infrequently (images, fonts)</li>
            <li>Set shorter cache times for resources that change more often (CSS, JavaScript)</li>
            <li>Use versioning or fingerprinting for resources to invalidate cache when content changes</li>
            <li>Consider using <code>Cache-Control: immutable</code> for resources that never change</li>
            <li>Use <code>ETag</code> or <code>Last-Modified</code> headers for validation</li>
        </ul>
        
        <h3>2. Content Delivery Networks (CDNs)</h3>
        <p>CDNs distribute your content across multiple servers around the world, reducing latency for users:</p>
        
        <div class="example">
            <h3>Benefits of Using a CDN:</h3>
            <ul>
                <li><strong>Reduced Latency</strong>: Content is served from the server closest to the user</li>
                <li><strong>Improved Availability</strong>: CDNs provide redundancy and can handle traffic spikes</li>
                <li><strong>Reduced Server Load</strong>: The CDN handles most of the traffic, reducing load on your origin server</li>
                <li><strong>Better Caching</strong>: CDNs often have optimized caching configurations</li>
                <li><strong>Additional Security</strong>: Many CDNs offer DDoS protection and other security features</li>
            </ul>
        </div>
        
        <p>Implementing a CDN:</p>
        
        <div class="code-block">
&lt;!-- Using a CDN for common libraries --&gt;
&lt;link rel="stylesheet" href="https://cdn.example.com/bootstrap/5.0.2/css/bootstrap.min.css"&gt;
&lt;script src="https://cdn.example.com/jquery/3.6.0/jquery.min.js"&gt;&lt;/script&gt;

&lt;!-- Using a CDN for your own assets --&gt;
&lt;link rel="stylesheet" href="https://your-cdn.com/styles.css"&gt;
&lt;script src="https://your-cdn.com/script.js"&gt;&lt;/script&gt;
&lt;img src="https://your-cdn.com/images/hero.jpg" alt="Hero image"&gt;
        </div>
        
        <div class="note">
            <p>When using third-party CDNs for common libraries, consider adding the <code>crossorigin</code> attribute and using Subresource Integrity (SRI) to enhance security:</p>
            <div class="code-block">
&lt;link rel="stylesheet" 
      href="https://cdn.example.com/bootstrap/5.0.2/css/bootstrap.min.css"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"&gt;
            </div>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Performance Testing and Monitoring</h2>
        <p>Regularly testing and monitoring your website's performance is essential for identifying issues and measuring improvements.</p>
        
        <h3>1. Performance Testing Tools</h3>
        <p>Several tools can help you analyze your website's performance:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Tool</th>
                <th>Type</th>
                <th>Features</th>
            </tr>
            <tr>
                <td>Google PageSpeed Insights</td>
                <td>Online</td>
                <td>Performance scores, Core Web Vitals, optimization suggestions</td>
            </tr>
            <tr>
                <td>Lighthouse</td>
                <td>Browser/CLI</td>
                <td>Performance, accessibility, SEO, and best practices audits</td>
            </tr>
            <tr>
                <td>WebPageTest</td>
                <td>Online</td>
                <td>Detailed waterfall charts, multiple test locations, filmstrip view</td>
            </tr>
            <tr>
                <td>Chrome DevTools</td>
                <td>Browser</td>
                <td>Network analysis, performance profiling, memory usage</td>
            </tr>
            <tr>
                <td>GTmetrix</td>
                <td>Online</td>
                <td>Performance scores, waterfall charts, video playback</td>
            </tr>
        </table>
        
        <h3>2. Using Chrome DevTools for Performance Analysis</h3>
        <p>Chrome DevTools provides powerful features for analyzing and debugging performance issues:</p>
        
        <div class="example">
            <h3>Key Chrome DevTools Features for Performance:</h3>
            <ol>
                <li><strong>Network Panel</strong>: Analyze resource loading, identify bottlenecks, and simulate different network conditions</li>
                <li><strong>Performance Panel</strong>: Record and analyze runtime performance, identify long tasks and rendering issues</li>
                <li><strong>Lighthouse</strong>: Run audits directly in DevTools to get performance scores and suggestions</li>
                <li><strong>Coverage Panel</strong>: Identify unused CSS and JavaScript code</li>
                <li><strong>Memory Panel</strong>: Analyze memory usage and identify leaks</li>
            </ol>
        </div>
        
        <p>Steps to analyze performance with Chrome DevTools:</p>
        <ol>
            <li>Open DevTools (F12 or Right-click > Inspect)</li>
            <li>Go to the Network tab</li>
            <li>Reload the page to capture network activity</li>
            <li>Analyze the waterfall chart to identify slow-loading resources</li>
            <li>Check the summary at the bottom for total requests, size, and load time</li>
            <li>Use the Performance tab to record and analyze rendering performance</li>
            <li>Run Lighthouse audits for comprehensive performance analysis</li>
        </ol>
        
        <h3>3. Real User Monitoring (RUM)</h3>
        <p>Real User Monitoring collects performance data from actual users of your website:</p>
        
        <div class="code-block">
&lt;!-- Using the Performance API to collect real user metrics --&gt;
&lt;script&gt;
    // Wait for the page to fully load
    window.addEventListener('load', function() {
        // Use setTimeout to ensure all resources are loaded
        setTimeout(function() {
            // Get performance timing data
            const perfData = window.performance.timing;
            
            // Calculate key metrics
            const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
            const domContentLoaded = perfData.domContentLoadedEventEnd - perfData.navigationStart;
            const firstPaint = performance.getEntriesByType('paint')[0]?.startTime || 0;
            
            // Send data to analytics
            sendToAnalytics({
                pageLoadTime: pageLoadTime,
                domContentLoaded: domContentLoaded,
                firstPaint: firstPaint,
                url: window.location.href,
                userAgent: navigator.userAgent
            });
        }, 0);
    });
    
    // Function to send data to your analytics service
    function sendToAnalytics(data) {
        // Replace with your actual analytics code
        console.log('Performance data:', data);
        
        // Example: Send data to a server endpoint
        // fetch('/analytics/performance', {
        //     method: 'POST',
        //     headers: { 'Content-Type': 'application/json' },
        //     body: JSON.stringify(data)
        // });
    }
&lt;/script&gt;
        </div>
        
        <p>Benefits of Real User Monitoring:</p>
        <ul>
            <li>Collects data from real users in their actual environments</li>
            <li>Provides insights into performance across different devices, browsers, and network conditions</li>
            <li>Helps identify issues that may not appear in synthetic tests</li>
            <li>Allows you to track performance over time and measure the impact of changes</li>
            <li>Can be segmented by user demographics, geography, or other factors</li>
        </ul>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Optimize a Web Page</h2>
        <p>Let's practice optimizing a web page for better performance. Below is a simple web page with several performance issues. Your task is to identify and fix these issues.</p>
        
        <div class="tabs">
            <div class="tab active" onclick="showTab('original')">Original Code</div>
            <div class="tab" onclick="showTab('optimized')">Optimized Code</div>
            <div class="tab" onclick="showTab('explanation')">Explanation</div>
        </div>
        
        <div id="original" class="tab-content active">
            <textarea id="originalCode" rows="30" style="width: 100%; font-family: monospace; padding: 10px;"><!DOCTYPE html>
<html>
<head>
    <title>My Unoptimized Page</title>
    
    <!-- Blocking CSS -->
    <link rel="stylesheet" href="https://cdn.example.com/large-framework.css">
    <link rel="stylesheet" href="styles.css">
    
    <!-- Blocking JavaScript -->
    <script src="https://cdn.example.com/jquery.min.js"></script>
    <script src="https://cdn.example.com/another-library.js"></script>
    <script src="main.js"></script>
    
    <style>
        /* Some inline styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #f0f0f0;
            padding: 20px;
        }
        /* Many more styles... */
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <div class="nav">
            <div class="nav-item">Home</div>
            <div class="nav-item">About</div>
            <div class="nav-item">Contact</div>
        </div>
    </div>
    
    <div class="main">
        <div class="content">
            <h1>Welcome to My Website</h1>
            <p>This is a paragraph with some text.</p>
            
            <!-- Unoptimized image -->
            <img src="large-hero-image.jpg" alt="Hero Image">
            
            <p>More content here...</p>
            
            <!-- More unoptimized images -->
            <div class="gallery">
                <img src="gallery-image-1.jpg" alt="Gallery Image 1">
                <img src="gallery-image-2.jpg" alt="Gallery Image 2">
                <img src="gallery-image-3.jpg" alt="Gallery Image 3">
                <img src="gallery-image-4.jpg" alt="Gallery Image 4">
            </div>
        </div>
        
        <div class="sidebar">
            <div class="widget">
                <h3>Latest Posts</h3>
                <ul>
                    <li>Post 1</li>
                    <li>Post 2</li>
                    <li>Post 3</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <div class="copyright">Copyright 2023</div>
    </div>
    
    <!-- More blocking scripts at the end -->
    <script src="analytics.js"></script>
    <script>
        // Inline script that could block rendering
        for (let i = 0; i < 1000; i++) {
            console.log("Doing some work...");
        }
    </script>
</body>
</html></textarea>
        </div>
        
        <div id="optimized" class="tab-content">
            <textarea id="optimizedCode" rows="30" style="width: 100%; font-family: monospace; padding: 10px;"><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Optimized Page</title>
    
    <!-- Preconnect to CDN domains -->
    <link rel="preconnect" href="https://cdn.example.com">
    
    <!-- Critical CSS inlined -->
    <style>
        /* Only critical styles needed for above-the-fold content */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #f0f0f0;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav {
            display: flex;
        }
        .nav-item {
            margin-left: 15px;
        }
        .main {
            display: flex;
            padding: 20px;
        }
        .content {
            flex: 3;
        }
        .sidebar {
            flex: 1;
            margin-left: 20px;
        }
    </style>
    
    <!-- Non-critical CSS loaded asynchronously -->
    <link rel="preload" href="styles.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="styles.css"></noscript>
    
    <!-- Defer non-critical JavaScript -->
    <script src="https://cdn.example.com/jquery.min.js" defer></script>
    <script src="https://cdn.example.com/another-library.js" defer></script>
    <script src="main.js" defer></script>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <header class="header">
        <div class="logo">
            <!-- Optimized SVG logo instead of PNG -->
            <img src="logo.svg" alt="Logo" width="150" height="50">
        </div>
        <nav class="nav">
            <a class="nav-item" href="/">Home</a>
            <a class="nav-item" href="/about">About</a>
            <a class="nav-item" href="/contact">Contact</a>
        </nav>
    </header>
    
    <main class="main">
        <article class="content">
            <h1>Welcome to My Website</h1>
            <p>This is a paragraph with some text.</p>
            
            <!-- Responsive hero image with WebP support -->
            <picture>
                <source type="image/webp" srcset="hero-small.webp 400w, hero-medium.webp 800w, hero-large.webp 1200w">
                <source type="image/jpeg" srcset="hero-small.jpg 400w, hero-medium.jpg 800w, hero-large.jpg 1200w">
                <img src="hero-medium.jpg" alt="Hero Image" 
                     sizes="(max-width: 600px) 400px, (max-width: 1000px) 800px, 1200px"
                     width="800" height="400">
            </picture>
            
            <p>More content here...</p>
            
            <!-- Lazy loaded gallery images -->
            <div class="gallery">
                <img src="gallery-image-1-thumbnail.jpg" data-src="gallery-image-1.jpg" alt="Gallery Image 1" loading="lazy" width="300" height="200">
                <img src="gallery-image-2-thumbnail.jpg" data-src="gallery-image-2.jpg" alt="Gallery Image 2" loading="lazy" width="300" height="200">
                <img src="gallery-image-3-thumbnail.jpg" data-src="gallery-image-3.jpg" alt="Gallery Image 3" loading="lazy" width="300" height="200">
                <img src="gallery-image-4-thumbnail.jpg" data-src="gallery-image-4.jpg" alt="Gallery Image 4" loading="lazy" width="300" height="200">
            </div>
        </article>
        
        <aside class="sidebar">
            <section class="widget">
                <h3>Latest Posts</h3>
                <ul>
                    <li><a href="/post1">Post 1</a></li>
                    <li><a href="/post2">Post 2</a></li>
                    <li><a href="/post3">Post 3</a></li>
                </ul>
            </section>
        </aside>
    </main>
    
    <footer class="footer">
        <p class="copyright">Copyright 2023</p>
    </footer>
    
    <!-- Async analytics that won't block rendering -->
    <script async src="analytics.js"></script>
    
    <!-- Moved intensive script to the end and made it async -->
    <script>
        // Use requestIdleCallback for non-critical work
        window.addEventListener('load', function() {
            if ('requestIdleCallback' in window) {
                requestIdleCallback(function() {
                    // Do intensive work when the browser is idle
                    for (let i = 0; i < 1000; i++) {
                        console.log("Doing some work...");
                    }
                });
            } else {
                // Fallback for browsers that don't support requestIdleCallback
                setTimeout(function() {
                    for (let i = 0; i < 1000; i++) {
                        console.log("Doing some work...");
                    }
                }, 1000);
            }
        });
    </script>
</body>
</html></textarea>
        </div>
        
        <div id="explanation" class="tab-content">
            <h3>Performance Optimizations Applied:</h3>
            <ol>
                <li><strong>Added proper HTML5 doctype and meta tags</strong>
                    <ul>
                        <li>Added charset and viewport meta tags</li>
                        <li>Added lang attribute to the html element</li>
                    </ul>
                </li>
                <li><strong>Optimized resource loading</strong>
                    <ul>
                        <li>Added preconnect for CDN domains</li>
                        <li>Inlined critical CSS for above-the-fold content</li>
                        <li>Loaded non-critical CSS asynchronously</li>
                        <li>Deferred JavaScript loading with the defer attribute</li>
                    </ul>
                </li>
                <li><strong>Used semantic HTML</strong>
                    <ul>
                        <li>Replaced generic divs with semantic elements (header, nav, main, article, aside, footer)</li>
                        <li>Improved accessibility and browser rendering optimization</li>
                    </ul>
                </li>
                <li><strong>Optimized images</strong>
                    <ul>
                        <li>Used SVG for the logo instead of PNG</li>
                        <li>Implemented responsive images with srcset and sizes attributes</li>
                        <li>Added WebP format with appropriate fallbacks</li>
                        <li>Added width and height attributes to prevent layout shifts</li>
                        <li>Implemented lazy loading for below-the-fold images</li>
                        <li>Used thumbnails for gallery images</li>
                    </ul>
                </li>
                <li><strong>Improved JavaScript execution</strong>
                    <ul>
                        <li>Made analytics script async to prevent blocking</li>
                        <li>Used requestIdleCallback for non-critical intensive work</li>
                        <li>Added a fallback for browsers that don't support requestIdleCallback</li>
                    </ul>
                </li>
            </ol>
            
            <h3>Expected Performance Improvements:</h3>
            <ul>
                <li>Faster initial render due to inlined critical CSS and deferred JavaScript</li>
                <li>Reduced layout shifts due to proper image dimensions</li>
                <li>Lower bandwidth usage due to optimized images and lazy loading</li>
                <li>Better user experience due to semantic HTML and improved accessibility</li>
                <li>Smoother interaction due to non-blocking scripts and idle-time processing</li>
            </ul>
        </div>
        
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
        </script>
    </div>
    
    <div class="quiz-container">
        <h2>Knowledge Check</h2>
        
        <div class="quiz-question">
            1. Which of the following is NOT one of Google's Core Web Vitals?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> Largest Contentful Paint (LCP)</label>
            <label><input type="radio" name="q1" value="b"> First Input Delay (FID)</label>
            <label><input type="radio" name="q1" value="c"> Cumulative Layout Shift (CLS)</label>
            <label><input type="radio" name="q1" value="d"> Time to First Byte (TTFB)</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which attribute should be used to defer the loading of non-critical JavaScript?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> async</label>
            <label><input type="radio" name="q2" value="b"> defer</label>
            <label><input type="radio" name="q2" value="c"> preload</label>
            <label><input type="radio" name="q2" value="d"> lazy</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which image format generally provides the best compression for photographs while maintaining good quality?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> PNG</label>
            <label><input type="radio" name="q3" value="b"> GIF</label>
            <label><input type="radio" name="q3" value="c"> WebP</label>
            <label><input type="radio" name="q3" value="d"> SVG</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. What is the purpose of the 'loading="lazy"' attribute?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> To load the image at a lower quality first, then improve quality</label>
            <label><input type="radio" name="q4" value="b"> To defer loading of the image until it's near the viewport</label>
            <label><input type="radio" name="q4" value="c"> To load the image only when the user clicks on a placeholder</label>
            <label><input type="radio" name="q4" value="d"> To load the image with a fade-in animation effect</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. Which resource hint establishes an early connection to a domain that will be used later?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> preload</label>
            <label><input type="radio" name="q5" value="b"> prefetch</label>
            <label><input type="radio" name="q5" value="c"> preconnect</label>
            <label><input type="radio" name="q5" value="d"> prerender</label>
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
            <button onclick="window.location.href='04_microdata.php'">Previous Lesson: Microdata and Structured Data</button>
        </div>
        <div>
            <button onclick="window.location.href='06_integration.php'">Next Lesson: Integration with CSS and JavaScript</button>
        </div>
    </div>
</body>
</html>
