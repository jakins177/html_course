<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metadata and Document Head</title>
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
        
        /* Visual diagram styles */
        .visual-diagram {
            font-family: monospace;
            white-space: pre;
            line-height: 1.3;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            margin: 20px 0;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Metadata and Document Head</h1>
    
    <div class="lesson-container">
        <h2>Introduction to the HTML Document Head</h2>
        <p>The <code>&lt;head&gt;</code> section of an HTML document contains metadata - information about the document that isn't displayed directly on the page. This metadata is crucial for browsers, search engines, and other web services to properly process and display your content.</p>
        
        <div class="example">
            <h3>Basic HTML Document Structure:</h3>
            <div class="code-block">
                &lt;!DOCTYPE html&gt;<br>
                &lt;html lang="en"&gt;<br>
                &lt;head&gt;<br>
                &nbsp;&nbsp;&lt;!-- Metadata goes here --&gt;<br>
                &nbsp;&nbsp;&lt;meta charset="UTF-8"&gt;<br>
                &nbsp;&nbsp;&lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;<br>
                &nbsp;&nbsp;&lt;title&gt;Page Title&lt;/title&gt;<br>
                &lt;/head&gt;<br>
                &lt;body&gt;<br>
                &nbsp;&nbsp;&lt;!-- Visible content goes here --&gt;<br>
                &lt;/body&gt;<br>
                &lt;/html&gt;
            </div>
        </div>
        
        <p>The <code>&lt;head&gt;</code> section serves several important purposes:</p>
        <ul>
            <li>Defines document properties and relationships</li>
            <li>Links to external resources (CSS, JavaScript, fonts)</li>
            <li>Provides information for search engines</li>
            <li>Controls how the page is displayed in browsers</li>
            <li>Sets character encoding and language</li>
            <li>Defines how the page should be shared on social media</li>
        </ul>
        
        <div class="note">
            <h3>Important Note:</h3>
            <p>While content in the <code>&lt;head&gt;</code> section isn't directly visible to users, it significantly impacts how your page is processed, displayed, and found online. Proper metadata is essential for accessibility, SEO, and cross-device compatibility.</p>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Essential Head Elements</h2>
        <p>Let's explore the most important elements that should be included in the <code>&lt;head&gt;</code> section of every HTML document:</p>
        
        <h3>1. Document Title</h3>
        <p>The <code>&lt;title&gt;</code> element defines the title of the document, which appears in browser tabs, bookmarks, and search results. Every HTML document must have a title.</p>
        
        <div class="example">
            <div class="code-block">
                &lt;title&gt;My Awesome Website - Home Page&lt;/title&gt;
            </div>
        </div>
        
        <div class="note">
            <h3>Best Practices for Titles:</h3>
            <ul>
                <li>Keep titles concise but descriptive (50-60 characters)</li>
                <li>Include important keywords near the beginning</li>
                <li>Make each page's title unique</li>
                <li>Include your brand/site name (typically at the end)</li>
                <li>Format as: "Primary Keyword - Secondary Keyword | Brand Name"</li>
            </ul>
        </div>
        
        <h3>2. Character Encoding</h3>
        <p>The <code>&lt;meta charset&gt;</code> element specifies the character encoding for the document, ensuring text is displayed correctly.</p>
        
        <div class="example">
            <div class="code-block">
                &lt;meta charset="UTF-8"&gt;
            </div>
        </div>
        
        <div class="note">
            <p>UTF-8 is the recommended character encoding for HTML documents as it supports virtually all characters and symbols from all languages.</p>
        </div>
        
        <h3>3. Viewport Settings</h3>
        <p>The viewport <code>&lt;meta&gt;</code> tag controls how a page is displayed on mobile devices, making it essential for responsive design.</p>
        
        <div class="example">
            <div class="code-block">
                &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
            </div>
        </div>
        
        <p>This setting tells mobile browsers to:</p>
        <ul>
            <li><code>width=device-width</code>: Set the width of the page to match the screen width of the device</li>
            <li><code>initial-scale=1.0</code>: Set the initial zoom level when the page is first loaded</li>
        </ul>
        
        <h3>4. Document Language</h3>
        <p>The <code>lang</code> attribute on the <code>&lt;html&gt;</code> element specifies the language of the document, which helps with:</p>
        <ul>
            <li>Screen readers and assistive technologies</li>
            <li>Search engine optimization</li>
            <li>Spell checking</li>
            <li>Language-specific rendering</li>
        </ul>
        
        <div class="example">
            <div class="code-block">
                &lt;html lang="en"&gt;
            </div>
        </div>
        
        <p>Common language codes include:</p>
        <ul>
            <li><code>en</code> - English</li>
            <li><code>es</code> - Spanish</li>
            <li><code>fr</code> - French</li>
            <li><code>de</code> - German</li>
            <li><code>zh</code> - Chinese</li>
            <li><code>ja</code> - Japanese</li>
        </ul>
        
        <p>For regional variants, you can use extended codes:</p>
        <ul>
            <li><code>en-US</code> - American English</li>
            <li><code>en-GB</code> - British English</li>
            <li><code>pt-BR</code> - Brazilian Portuguese</li>
        </ul>
    </div>
    
    <div class="lesson-container">
        <h2>Meta Tags for SEO and Social Media</h2>
        <p>Meta tags provide additional information about your page to search engines and social media platforms.</p>
        
        <h3>Basic SEO Meta Tags</h3>
        <table class="comparison-table">
            <tr>
                <th>Meta Tag</th>
                <th>Purpose</th>
                <th>Example</th>
            </tr>
            <tr>
                <td><code>description</code></td>
                <td>Provides a brief summary of the page content (shown in search results)</td>
                <td><code>&lt;meta name="description" content="Learn about HTML metadata and how to optimize your website for search engines and social media."&gt;</code></td>
            </tr>
            <tr>
                <td><code>keywords</code></td>
                <td>Lists relevant keywords (less important for modern SEO)</td>
                <td><code>&lt;meta name="keywords" content="HTML, metadata, SEO, head, document"&gt;</code></td>
            </tr>
            <tr>
                <td><code>author</code></td>
                <td>Specifies the author of the document</td>
                <td><code>&lt;meta name="author" content="John Doe"&gt;</code></td>
            </tr>
            <tr>
                <td><code>robots</code></td>
                <td>Controls how search engines index and follow links</td>
                <td><code>&lt;meta name="robots" content="index, follow"&gt;</code></td>
            </tr>
        </table>
        
        <div class="note">
            <h3>About the robots meta tag:</h3>
            <p>Common values for the <code>robots</code> meta tag include:</p>
            <ul>
                <li><code>index, follow</code> - Index this page and follow its links (default)</li>
                <li><code>noindex</code> - Don't index this page</li>
                <li><code>nofollow</code> - Don't follow links on this page</li>
                <li><code>noindex, nofollow</code> - Don't index this page or follow its links</li>
            </ul>
        </div>
        
        <h3>Open Graph Protocol (for Facebook, LinkedIn)</h3>
        <p>Open Graph meta tags control how your content appears when shared on Facebook and other platforms that support the protocol.</p>
        
        <div class="example">
            <div class="code-block">
                &lt;meta property="og:title" content="Complete Guide to HTML Metadata"&gt;<br>
                &lt;meta property="og:description" content="Learn everything about HTML metadata and how to optimize your website."&gt;<br>
                &lt;meta property="og:image" content="https://example.com/image.jpg"&gt;<br>
                &lt;meta property="og:url" content="https://example.com/metadata-guide"&gt;<br>
                &lt;meta property="og:type" content="article"&gt;<br>
                &lt;meta property="og:site_name" content="HTML Academy"&gt;
            </div>
        </div>
        
        <h3>Twitter Card Meta Tags</h3>
        <p>Twitter Card meta tags control how your content appears when shared on Twitter.</p>
        
        <div class="example">
            <div class="code-block">
                &lt;meta name="twitter:card" content="summary_large_image"&gt;<br>
                &lt;meta name="twitter:site" content="@yourusername"&gt;<br>
                &lt;meta name="twitter:title" content="Complete Guide to HTML Metadata"&gt;<br>
                &lt;meta name="twitter:description" content="Learn everything about HTML metadata and how to optimize your website."&gt;<br>
                &lt;meta name="twitter:image" content="https://example.com/image.jpg"&gt;
            </div>
        </div>
        
        <div class="note">
            <h3>Image Requirements:</h3>
            <p>For optimal display on social media:</p>
            <ul>
                <li>Facebook/Open Graph: 1200 × 630 pixels (minimum 600 × 315)</li>
                <li>Twitter: 1200 × 675 pixels for summary_large_image</li>
                <li>Use high-quality, relevant images that represent your content</li>
                <li>Ensure images load quickly (optimize file size)</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Linking External Resources</h2>
        <p>The <code>&lt;head&gt;</code> section is where you connect your HTML document to external resources like stylesheets, scripts, fonts, and icons.</p>
        
        <h3>CSS Stylesheets</h3>
        <p>Link to external CSS files using the <code>&lt;link&gt;</code> element:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;!-- External stylesheet --&gt;<br>
                &lt;link rel="stylesheet" href="styles.css"&gt;<br><br>
                
                &lt;!-- External stylesheet with media query --&gt;<br>
                &lt;link rel="stylesheet" href="mobile.css" media="screen and (max-width: 768px)"&gt;<br><br>
                
                &lt;!-- Alternative: Internal stylesheet --&gt;<br>
                &lt;style&gt;<br>
                &nbsp;&nbsp;body {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;font-family: Arial, sans-serif;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;margin: 0;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;padding: 20px;<br>
                &nbsp;&nbsp;}<br>
                &lt;/style&gt;
            </div>
        </div>
        
        <h3>JavaScript Files</h3>
        <p>Include JavaScript using the <code>&lt;script&gt;</code> element:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;!-- External JavaScript --&gt;<br>
                &lt;script src="script.js"&gt;&lt;/script&gt;<br><br>
                
                &lt;!-- External JavaScript with defer (loads after HTML parsing) --&gt;<br>
                &lt;script src="script.js" defer&gt;&lt;/script&gt;<br><br>
                
                &lt;!-- External JavaScript with async (loads asynchronously) --&gt;<br>
                &lt;script src="analytics.js" async&gt;&lt;/script&gt;<br><br>
                
                &lt;!-- Alternative: Internal JavaScript --&gt;<br>
                &lt;script&gt;<br>
                &nbsp;&nbsp;function greet() {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;alert('Hello, world!');<br>
                &nbsp;&nbsp;}<br>
                &lt;/script&gt;
            </div>
        </div>
        
        <div class="note">
            <h3>Script Loading Attributes:</h3>
            <ul>
                <li><code>defer</code> - Script executes after the HTML is fully parsed (maintains execution order)</li>
                <li><code>async</code> - Script executes as soon as it's downloaded, without blocking HTML parsing (doesn't guarantee execution order)</li>
                <li>For performance, place scripts at the end of the <code>&lt;body&gt;</code> or use <code>defer</code>/<code>async</code> attributes</li>
            </ul>
        </div>
        
        <h3>Web Fonts</h3>
        <p>Include custom fonts using the <code>&lt;link&gt;</code> element or <code>@import</code> in CSS:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;!-- Google Fonts --&gt;<br>
                &lt;link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"&gt;<br><br>
                
                &lt;!-- Alternative: @import in style tag --&gt;<br>
                &lt;style&gt;<br>
                &nbsp;&nbsp;@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');<br>
                &lt;/style&gt;
            </div>
        </div>
        
        <h3>Favicon and App Icons</h3>
        <p>Add favicons and app icons to make your site recognizable in browser tabs, bookmarks, and home screens:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;!-- Basic favicon --&gt;<br>
                &lt;link rel="icon" href="favicon.ico"&gt;<br><br>
                
                &lt;!-- Modern favicon (SVG) --&gt;<br>
                &lt;link rel="icon" href="favicon.svg" type="image/svg+xml"&gt;<br><br>
                
                &lt;!-- iOS/Safari icons --&gt;<br>
                &lt;link rel="apple-touch-icon" href="apple-touch-icon.png"&gt;<br><br>
                
                &lt;!-- Android/Chrome icons --&gt;<br>
                &lt;link rel="manifest" href="manifest.json"&gt;
            </div>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Preloading and Resource Hints</h2>
        <p>Modern HTML provides ways to optimize resource loading through preloading and resource hints.</p>
        
        <h3>Preloading Critical Resources</h3>
        <p>Use <code>preload</code> to tell the browser to download important resources as soon as possible:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;!-- Preload CSS --&gt;<br>
                &lt;link rel="preload" href="critical.css" as="style"&gt;<br><br>
                
                &lt;!-- Preload font --&gt;<br>
                &lt;link rel="preload" href="fonts/myfont.woff2" as="font" type="font/woff2" crossorigin&gt;<br><br>
                
                &lt;!-- Preload image --&gt;<br>
                &lt;link rel="preload" href="hero.jpg" as="image"&gt;
            </div>
        </div>
        
        <h3>DNS Prefetching</h3>
        <p>Use <code>dns-prefetch</code> to resolve domain names before resources are requested:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;link rel="dns-prefetch" href="https://fonts.googleapis.com"&gt;<br>
                &lt;link rel="dns-prefetch" href="https://analytics.example.com"&gt;
            </div>
        </div>
        
        <h3>Preconnect</h3>
        <p>Use <code>preconnect</code> to establish early connections to important third-party domains:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;link rel="preconnect" href="https://fonts.googleapis.com" crossorigin&gt;<br>
                &lt;link rel="preconnect" href="https://fonts.gstatic.com" crossorigin&gt;
            </div>
        </div>
        
        <h3>Prefetch</h3>
        <p>Use <code>prefetch</code> to download resources that will be needed for future navigations:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;link rel="prefetch" href="page2.html"&gt;<br>
                &lt;link rel="prefetch" href="page2-styles.css"&gt;
            </div>
        </div>
        
        <div class="note">
            <h3>Resource Hint Priority:</h3>
            <p>Different resource hints have different priorities:</p>
            <ol>
                <li><code>preload</code> - Highest priority, for current page resources</li>
                <li><code>preconnect</code> - High priority, establishes connections</li>
                <li><code>dns-prefetch</code> - Medium priority, resolves DNS only</li>
                <li><code>prefetch</code> - Low priority, for future navigation</li>
            </ol>
            <p>Use these hints strategically to avoid wasting bandwidth or CPU resources.</p>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Other Important Head Elements</h2>
        
        <h3>Base URL</h3>
        <p>The <code>&lt;base&gt;</code> element specifies the base URL for all relative URLs in the document:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;base href="https://example.com/blog/"&gt;
            </div>
        </div>
        
        <p>With this base URL, a link like <code>&lt;a href="post1.html"&gt;</code> would point to <code>https://example.com/blog/post1.html</code>.</p>
        
        <h3>Content Security Policy</h3>
        <p>The Content Security Policy (CSP) helps prevent cross-site scripting (XSS) attacks by specifying which resources can be loaded:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' https://trusted-cdn.com"&gt;
            </div>
        </div>
        
        <h3>Canonical URL</h3>
        <p>The canonical URL tells search engines which version of a page is the preferred one to index, helping prevent duplicate content issues:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;link rel="canonical" href="https://example.com/products/phone"&gt;
            </div>
        </div>
        
        <h3>Alternate Languages</h3>
        <p>For multilingual sites, specify alternate language versions of the page:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;link rel="alternate" hreflang="es" href="https://example.com/es/page"&gt;<br>
                &lt;link rel="alternate" hreflang="fr" href="https://example.com/fr/page"&gt;<br>
                &lt;link rel="alternate" hreflang="x-default" href="https://example.com/page"&gt;
            </div>
        </div>
        
        <h3>Theme Color</h3>
        <p>Specify a theme color for mobile browsers and PWAs:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;meta name="theme-color" content="#4285f4"&gt;
            </div>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Create a Complete HTML Head</h2>
        <p>Practice creating a comprehensive HTML head section by editing the code below:</p>
        
        <div>
            <textarea id="htmlEditor" rows="20" style="width: 100%; font-family: monospace; padding: 10px;"><!DOCTYPE html>
<html>
<head>
    <!-- Add a complete head section for a blog post about web development -->
    <!-- Include all essential elements and metadata for SEO and social sharing -->
    
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>10 Essential Web Development Tools for 2023</h1>
    <p>In this article, we'll explore the most important tools that every web developer should know about in 2023...</p>
    <!-- Rest of the content... -->
</body>
</html></textarea>
            <button onclick="updatePreview()">Update Preview</button>
        </div>
        
        <h3>Preview:</h3>
        <iframe id="previewFrame" style="width: 100%; height: 300px; border: 1px solid #ddd; border-radius: 4px;"></iframe>
        
        <div class="note" style="margin-top: 20px;">
            <h3>Hint:</h3>
            <p>Include the following elements in your head section:</p>
            <ul>
                <li>Character encoding (UTF-8)</li>
                <li>Viewport settings</li>
                <li>Document language</li>
                <li>Title</li>
                <li>Meta description</li>
                <li>Author information</li>
                <li>Open Graph and Twitter Card metadata</li>
                <li>CSS and JavaScript links</li>
                <li>Favicon</li>
                <li>Any other relevant metadata</li>
            </ul>
        </div>
        
        <button id="showSolution" style="margin-top: 15px;">Show Solution</button>
        <div id="solution" style="display: none; margin-top: 15px; padding: 15px; background-color: #f0f0f0; border-radius: 5px;">
            <h3>Solution:</h3>
            <pre style="background-color: #2c3e50; color: #ecf0f1; padding: 15px; border-radius: 5px; overflow-x: auto;">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;!-- Essential meta tags --&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    
    &lt;!-- Document title --&gt;
    &lt;title&gt;10 Essential Web Development Tools for 2023 | Dev Blog&lt;/title&gt;
    
    &lt;!-- SEO meta tags --&gt;
    &lt;meta name="description" content="Discover the 10 most important web development tools that every developer should be using in 2023 to improve productivity and code quality."&gt;
    &lt;meta name="keywords" content="web development, developer tools, coding, programming, 2023, web dev"&gt;
    &lt;meta name="author" content="Jane Smith"&gt;
    &lt;meta name="robots" content="index, follow"&gt;
    
    &lt;!-- Canonical URL --&gt;
    &lt;link rel="canonical" href="https://example.com/blog/web-development-tools-2023"&gt;
    
    &lt;!-- Open Graph / Facebook --&gt;
    &lt;meta property="og:type" content="article"&gt;
    &lt;meta property="og:url" content="https://example.com/blog/web-development-tools-2023"&gt;
    &lt;meta property="og:title" content="10 Essential Web Development Tools for 2023"&gt;
    &lt;meta property="og:description" content="Discover the 10 most important web development tools that every developer should be using in 2023."&gt;
    &lt;meta property="og:image" content="https://example.com/images/web-dev-tools-2023.jpg"&gt;
    &lt;meta property="og:site_name" content="Dev Blog"&gt;
    
    &lt;!-- Twitter --&gt;
    &lt;meta name="twitter:card" content="summary_large_image"&gt;
    &lt;meta name="twitter:site" content="@devblog"&gt;
    &lt;meta name="twitter:title" content="10 Essential Web Development Tools for 2023"&gt;
    &lt;meta name="twitter:description" content="Discover the 10 most important web development tools that every developer should be using in 2023."&gt;
    &lt;meta name="twitter:image" content="https://example.com/images/web-dev-tools-2023.jpg"&gt;
    
    &lt;!-- Favicon and app icons --&gt;
    &lt;link rel="icon" href="/favicon.ico" sizes="any"&gt;
    &lt;link rel="icon" href="/favicon.svg" type="image/svg+xml"&gt;
    &lt;link rel="apple-touch-icon" href="/apple-touch-icon.png"&gt;
    
    &lt;!-- Theme color --&gt;
    &lt;meta name="theme-color" content="#4285f4"&gt;
    
    &lt;!-- Preconnect to external domains --&gt;
    &lt;link rel="preconnect" href="https://fonts.googleapis.com" crossorigin&gt;
    &lt;link rel="preconnect" href="https://fonts.gstatic.com" crossorigin&gt;
    
    &lt;!-- Stylesheets --&gt;
    &lt;link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"&gt;
    &lt;link rel="stylesheet" href="/css/style.css"&gt;
    &lt;link rel="stylesheet" href="/css/blog.css"&gt;
    
    &lt;!-- Structured data (JSON-LD) --&gt;
    &lt;script type="application/ld+json"&gt;
    {
        "@context": "https://schema.org",
        "@type": "BlogPosting",
        "headline": "10 Essential Web Development Tools for 2023",
        "image": "https://example.com/images/web-dev-tools-2023.jpg",
        "datePublished": "2023-01-15T08:00:00+08:00",
        "dateModified": "2023-01-16T09:20:00+08:00",
        "author": {
            "@type": "Person",
            "name": "Jane Smith"
        },
        "publisher": {
            "@type": "Organization",
            "name": "Dev Blog",
            "logo": {
                "@type": "ImageObject",
                "url": "https://example.com/logo.png"
            }
        },
        "description": "Discover the 10 most important web development tools that every developer should be using in 2023."
    }
    &lt;/script&gt;
    
    &lt;!-- JavaScript --&gt;
    &lt;script src="/js/analytics.js" async&gt;&lt;/script&gt;
    &lt;script src="/js/main.js" defer&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;10 Essential Web Development Tools for 2023&lt;/h1&gt;
    &lt;p&gt;In this article, we'll explore the most important tools that every web developer should know about in 2023...&lt;/p&gt;
    &lt;!-- Rest of the content... --&gt;
&lt;/body&gt;
&lt;/html&gt;
            </pre>
        </div>
        
        <script>
            function updatePreview() {
                const htmlCode = document.getElementById('htmlEditor').value;
                const previewFrame = document.getElementById('previewFrame');
                const frameDoc = previewFrame.contentDocument || previewFrame.contentWindow.document;
                
                frameDoc.open();
                frameDoc.write(htmlCode);
                frameDoc.close();
            }
            
            document.getElementById('showSolution').addEventListener('click', function() {
                const solution = document.getElementById('solution');
                if (solution.style.display === 'none') {
                    solution.style.display = 'block';
                    this.textContent = 'Hide Solution';
                } else {
                    solution.style.display = 'none';
                    this.textContent = 'Show Solution';
                }
            });
            
            // Initialize preview
            window.onload = function() {
                updatePreview();
            };
        </script>
    </div>
    
    <div class="quiz-container">
        <h2>Knowledge Check</h2>
        
        <div class="quiz-question">
            1. Which HTML element is used to specify the title of a document?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> &lt;head&gt;</label>
            <label><input type="radio" name="q1" value="b"> &lt;meta&gt;</label>
            <label><input type="radio" name="q1" value="c"> &lt;title&gt;</label>
            <label><input type="radio" name="q1" value="d"> &lt;header&gt;</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which meta tag is used to ensure proper rendering on mobile devices?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> &lt;meta name="mobile" content="responsive"&gt;</label>
            <label><input type="radio" name="q2" value="b"> &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;</label>
            <label><input type="radio" name="q2" value="c"> &lt;meta name="device" content="mobile"&gt;</label>
            <label><input type="radio" name="q2" value="d"> &lt;meta name="responsive" content="true"&gt;</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which attribute specifies the character encoding for an HTML document?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> &lt;meta encoding="UTF-8"&gt;</label>
            <label><input type="radio" name="q3" value="b"> &lt;meta type="UTF-8"&gt;</label>
            <label><input type="radio" name="q3" value="c"> &lt;meta charset="UTF-8"&gt;</label>
            <label><input type="radio" name="q3" value="d"> &lt;meta language="UTF-8"&gt;</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. Which meta tags are used for Facebook and other social media platforms that support the Open Graph protocol?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> &lt;meta name="facebook:title" content="Page Title"&gt;</label>
            <label><input type="radio" name="q4" value="b"> &lt;meta property="og:title" content="Page Title"&gt;</label>
            <label><input type="radio" name="q4" value="c"> &lt;meta name="social:title" content="Page Title"&gt;</label>
            <label><input type="radio" name="q4" value="d"> &lt;meta property="fb:title" content="Page Title"&gt;</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. Which attribute should be used with the script tag to load JavaScript without blocking HTML parsing?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> nonblocking</label>
            <label><input type="radio" name="q5" value="b"> async</label>
            <label><input type="radio" name="q5" value="c"> parallel</label>
            <label><input type="radio" name="q5" value="d"> background</label>
        </div>
        <div id="feedback5" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'c',
                    q2: 'b',
                    q3: 'c',
                    q4: 'b',
                    q5: 'b'
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
            <button onclick="window.location.href='01_semantic_elements.html'">Previous Lesson: Semantic Elements</button>
        </div>
        <div>
            <button onclick="window.location.href='03_accessibility.html'">Next Lesson: Accessibility Best Practices</button>
        </div>
    </div>
</body>
</html>
