<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML5 Semantic Elements</title>
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
        
        /* Semantic layout example styles */
        .semantic-layout {
            border: 1px solid #ddd;
            margin: 20px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .semantic-layout header {
            background-color: #f2f2f2;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
        }
        .semantic-layout nav {
            background-color: #e8f4fc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
        }
        .semantic-layout main {
            display: flex;
            margin-bottom: 10px;
        }
        .semantic-layout article {
            flex: 3;
            background-color: #fff;
            padding: 10px;
            margin-right: 10px;
            border-radius: 3px;
            border: 1px solid #eee;
        }
        .semantic-layout aside {
            flex: 1;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #eee;
        }
        .semantic-layout footer {
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 3px;
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
    <h1>HTML5 Semantic Elements</h1>
    
    <div class="lesson-container">
        <h2>Introduction to Semantic HTML</h2>
        <p>Semantic HTML refers to using HTML elements that clearly describe their meaning to both the browser and the developer. Instead of using generic containers like <code>&lt;div&gt;</code> and <code>&lt;span&gt;</code> for everything, semantic elements provide context about the type of content they contain.</p>
        
        <div class="example">
            <h3>Non-Semantic vs. Semantic HTML:</h3>
            <div class="code-block">
                &lt;!-- Non-semantic HTML --&gt;<br>
                &lt;div class="header"&gt;<br>
                &nbsp;&nbsp;&lt;h1&gt;My Website&lt;/h1&gt;<br>
                &lt;/div&gt;<br>
                &lt;div class="navigation"&gt;<br>
                &nbsp;&nbsp;&lt;ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;Home&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;About&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&lt;/ul&gt;<br>
                &lt;/div&gt;<br>
                &lt;div class="main-content"&gt;<br>
                &nbsp;&nbsp;&lt;div class="article"&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;h2&gt;Article Title&lt;/h2&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;Article content...&lt;/p&gt;<br>
                &nbsp;&nbsp;&lt;/div&gt;<br>
                &nbsp;&nbsp;&lt;div class="sidebar"&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;h3&gt;Related Links&lt;/h3&gt;<br>
                &nbsp;&nbsp;&lt;/div&gt;<br>
                &lt;/div&gt;<br>
                &lt;div class="footer"&gt;<br>
                &nbsp;&nbsp;&lt;p&gt;Copyright 2023&lt;/p&gt;<br>
                &lt;/div&gt;<br><br>
                
                &lt;!-- Semantic HTML --&gt;<br>
                &lt;header&gt;<br>
                &nbsp;&nbsp;&lt;h1&gt;My Website&lt;/h1&gt;<br>
                &lt;/header&gt;<br>
                &lt;nav&gt;<br>
                &nbsp;&nbsp;&lt;ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;Home&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;About&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&lt;/ul&gt;<br>
                &lt;/nav&gt;<br>
                &lt;main&gt;<br>
                &nbsp;&nbsp;&lt;article&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;h2&gt;Article Title&lt;/h2&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;Article content...&lt;/p&gt;<br>
                &nbsp;&nbsp;&lt;/article&gt;<br>
                &nbsp;&nbsp;&lt;aside&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;h3&gt;Related Links&lt;/h3&gt;<br>
                &nbsp;&nbsp;&lt;/aside&gt;<br>
                &lt;/main&gt;<br>
                &lt;footer&gt;<br>
                &nbsp;&nbsp;&lt;p&gt;Copyright 2023&lt;/p&gt;<br>
                &lt;/footer&gt;
            </div>
        </div>
        
        <h3>Benefits of Semantic HTML</h3>
        <ul>
            <li><strong>Accessibility</strong> - Screen readers and assistive technologies can better understand the content structure</li>
            <li><strong>SEO</strong> - Search engines can better understand your content and its importance</li>
            <li><strong>Readability</strong> - Code is easier to read and maintain</li>
            <li><strong>Reusability</strong> - Consistent structure makes styling with CSS more efficient</li>
            <li><strong>Mobile Optimization</strong> - Helps with responsive design and device adaptation</li>
        </ul>
        
        <div class="note">
            <h3>When to Use Semantic Elements:</h3>
            <p>Use semantic elements whenever they accurately describe the content they contain. Only fall back to <code>&lt;div&gt;</code> and <code>&lt;span&gt;</code> when no semantic element exists for your specific purpose.</p>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Key HTML5 Semantic Elements</h2>
        <p>HTML5 introduced several new semantic elements to better structure web pages. Let's explore the most important ones:</p>
        
        <h3>Document Structure Elements</h3>
        <table class="comparison-table">
            <tr>
                <th>Element</th>
                <th>Description</th>
                <th>Usage</th>
            </tr>
            <tr>
                <td><code>&lt;header&gt;</code></td>
                <td>Represents introductory content or a group of navigational aids</td>
                <td>Page headers, article headers, section headers</td>
            </tr>
            <tr>
                <td><code>&lt;nav&gt;</code></td>
                <td>Represents a section of navigation links</td>
                <td>Main navigation, sidebar navigation, pagination</td>
            </tr>
            <tr>
                <td><code>&lt;main&gt;</code></td>
                <td>Represents the main content of the document</td>
                <td>Primary content area (only one per page)</td>
            </tr>
            <tr>
                <td><code>&lt;article&gt;</code></td>
                <td>Represents a self-contained composition</td>
                <td>Blog posts, news articles, forum posts, comments</td>
            </tr>
            <tr>
                <td><code>&lt;section&gt;</code></td>
                <td>Represents a standalone section of content</td>
                <td>Chapters, tabbed content, themed content groups</td>
            </tr>
            <tr>
                <td><code>&lt;aside&gt;</code></td>
                <td>Represents content tangentially related to the content around it</td>
                <td>Sidebars, pull quotes, advertising, author bios</td>
            </tr>
            <tr>
                <td><code>&lt;footer&gt;</code></td>
                <td>Represents a footer for its nearest sectioning content or sectioning root element</td>
                <td>Page footers, article footers, section footers</td>
            </tr>
        </table>
        
        <h3>Content-Specific Elements</h3>
        <table class="comparison-table">
            <tr>
                <th>Element</th>
                <th>Description</th>
                <th>Usage</th>
            </tr>
            <tr>
                <td><code>&lt;figure&gt;</code></td>
                <td>Represents self-contained content, often with a caption</td>
                <td>Images, diagrams, code snippets, charts with captions</td>
            </tr>
            <tr>
                <td><code>&lt;figcaption&gt;</code></td>
                <td>Represents a caption or legend for a figure</td>
                <td>Used within a <code>&lt;figure&gt;</code> element</td>
            </tr>
            <tr>
                <td><code>&lt;time&gt;</code></td>
                <td>Represents a specific period in time</td>
                <td>Publication dates, event times, historical dates</td>
            </tr>
            <tr>
                <td><code>&lt;mark&gt;</code></td>
                <td>Represents text highlighted for reference</td>
                <td>Search results highlighting, marking important text</td>
            </tr>
            <tr>
                <td><code>&lt;details&gt;</code></td>
                <td>Creates a disclosure widget</td>
                <td>FAQs, expandable content sections</td>
            </tr>
            <tr>
                <td><code>&lt;summary&gt;</code></td>
                <td>Specifies a visible heading for a details element</td>
                <td>Used within a <code>&lt;details&gt;</code> element</td>
            </tr>
        </table>
        
        <div class="example">
            <h3>Content-Specific Elements Example:</h3>
            <div class="code-block">
                &lt;figure&gt;<br>
                &nbsp;&nbsp;&lt;img src="diagram.png" alt="Website structure diagram"&gt;<br>
                &nbsp;&nbsp;&lt;figcaption&gt;Fig.1 - Semantic HTML structure of a typical webpage&lt;/figcaption&gt;<br>
                &lt;/figure&gt;<br><br>
                
                &lt;p&gt;The article was published on &lt;time datetime="2023-04-15"&gt;April 15, 2023&lt;/time&gt;.&lt;/p&gt;<br><br>
                
                &lt;p&gt;The most important part is &lt;mark&gt;highlighted for emphasis&lt;/mark&gt;.&lt;/p&gt;<br><br>
                
                &lt;details&gt;<br>
                &nbsp;&nbsp;&lt;summary&gt;Click to show more information&lt;/summary&gt;<br>
                &nbsp;&nbsp;&lt;p&gt;This is additional information that is hidden by default.&lt;/p&gt;<br>
                &lt;/details&gt;
            </div>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Semantic Page Structure</h2>
        <p>Let's look at how semantic elements can be used together to create a well-structured webpage:</p>
        
        <div class="visual-diagram">
&lt;body&gt;
  ├── &lt;header&gt; - Site header, logo, site title
  │    └── &lt;nav&gt; - Main navigation menu
  │
  ├── &lt;main&gt; - Main content area (only one per page)
  │    ├── &lt;article&gt; - Self-contained content
  │    │    ├── &lt;header&gt; - Article header
  │    │    ├── &lt;section&gt; - Content sections
  │    │    └── &lt;footer&gt; - Article footer
  │    │
  │    └── &lt;aside&gt; - Sidebar content
  │
  └── &lt;footer&gt; - Site footer
</div>
        
        <div class="example">
            <h3>Complete Semantic Page Structure:</h3>
            <div class="code-block">
                &lt;!DOCTYPE html&gt;<br>
                &lt;html lang="en"&gt;<br>
                &lt;head&gt;<br>
                &nbsp;&nbsp;&lt;meta charset="UTF-8"&gt;<br>
                &nbsp;&nbsp;&lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;<br>
                &nbsp;&nbsp;&lt;title&gt;Semantic HTML Example&lt;/title&gt;<br>
                &lt;/head&gt;<br>
                &lt;body&gt;<br>
                &nbsp;&nbsp;&lt;header&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;h1&gt;My Website&lt;/h1&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;nav&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;Home&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;About&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;Services&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;Contact&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/nav&gt;<br>
                &nbsp;&nbsp;&lt;/header&gt;<br><br>
                
                &nbsp;&nbsp;&lt;main&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;article&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;header&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h2&gt;Article Title&lt;/h2&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;Posted on &lt;time datetime="2023-04-15"&gt;April 15, 2023&lt;/time&gt; by Author&lt;/p&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/header&gt;<br><br>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;section&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h3&gt;Introduction&lt;/h3&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;This is the introduction to the article...&lt;/p&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/section&gt;<br><br>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;section&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h3&gt;Main Content&lt;/h3&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;This is the main content of the article...&lt;/p&gt;<br><br>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;figure&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;img src="image.jpg" alt="Descriptive text"&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;figcaption&gt;Figure 1: Description of the image&lt;/figcaption&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/figure&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/section&gt;<br><br>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;section&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h3&gt;Conclusion&lt;/h3&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;This is the conclusion of the article...&lt;/p&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/section&gt;<br><br>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;footer&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;Tags: &lt;a href="#"&gt;HTML5&lt;/a&gt;, &lt;a href="#"&gt;Semantic&lt;/a&gt;, &lt;a href="#"&gt;Web Development&lt;/a&gt;&lt;/p&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/footer&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/article&gt;<br><br>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;aside&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;h3&gt;Related Articles&lt;/h3&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;Introduction to CSS&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;JavaScript Basics&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;Responsive Design Tips&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/ul&gt;<br><br>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;details&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;summary&gt;About the Author&lt;/summary&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;The author is a web developer with 10 years of experience.&lt;/p&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/details&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/aside&gt;<br>
                &nbsp;&nbsp;&lt;/main&gt;<br><br>
                
                &nbsp;&nbsp;&lt;footer&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;&copy; 2023 My Website. All rights reserved.&lt;/p&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;nav&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;Privacy Policy&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;Terms of Service&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;Contact Us&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/nav&gt;<br>
                &nbsp;&nbsp;&lt;/footer&gt;<br>
                &lt;/body&gt;<br>
                &lt;/html&gt;
            </div>
        </div>
        
        <h3>Visual Representation</h3>
        <p>Here's a simplified visual representation of the semantic structure:</p>
        
        <div class="semantic-layout">
            <header>
                <h4>HEADER</h4>
                <nav>NAVIGATION</nav>
            </header>
            
            <main>
                <article>
                    <h4>ARTICLE</h4>
                    <p>Main content goes here...</p>
                    <section>SECTION 1</section>
                    <section>SECTION 2</section>
                </article>
                
                <aside>
                    <h4>ASIDE</h4>
                    <p>Sidebar content</p>
                </aside>
            </main>
            
            <footer>
                <h4>FOOTER</h4>
            </footer>
        </div>
        
        <div class="note">
            <h3>Important Considerations:</h3>
            <ul>
                <li>You can have multiple <code>&lt;header&gt;</code>, <code>&lt;footer&gt;</code>, <code>&lt;section&gt;</code>, and <code>&lt;article&gt;</code> elements on a page</li>
                <li>You should have only one <code>&lt;main&gt;</code> element per page</li>
                <li>Semantic elements can be nested within each other when appropriate</li>
                <li>Not every page needs to use all semantic elements - use what makes sense for your content</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Semantic Elements vs. ARIA Roles</h2>
        <p>While semantic HTML elements provide structure and meaning, ARIA (Accessible Rich Internet Applications) roles can be used to enhance accessibility further, especially for complex web applications or when semantic HTML alone isn't sufficient.</p>
        
        <div class="example">
            <h3>Semantic HTML vs. ARIA:</h3>
            <div class="code-block">
                &lt;!-- Semantic HTML (preferred) --&gt;<br>
                &lt;nav&gt;<br>
                &nbsp;&nbsp;&lt;ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;Home&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&lt;/ul&gt;<br>
                &lt;/nav&gt;<br><br>
                
                &lt;!-- Non-semantic HTML with ARIA (fallback) --&gt;<br>
                &lt;div role="navigation"&gt;<br>
                &nbsp;&nbsp;&lt;ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;&lt;a href="#"&gt;Home&lt;/a&gt;&lt;/li&gt;<br>
                &nbsp;&nbsp;&lt;/ul&gt;<br>
                &lt;/div&gt;
            </div>
        </div>
        
        <p>The general rule is to use semantic HTML elements whenever possible, and only use ARIA roles when:</p>
        <ol>
            <li>You need to support older browsers that don't understand HTML5 semantic elements</li>
            <li>You're creating complex UI components that don't have corresponding semantic elements</li>
            <li>You need to provide additional context for assistive technologies</li>
        </ol>
        
        <div class="note">
            <h3>First Rule of ARIA:</h3>
            <p>"If you can use a native HTML element or attribute with the semantics and behavior you require already built in, instead of re-purposing an element and adding an ARIA role, state or property to make it accessible, then do so."</p>
            <p><small>Source: <a href="https://www.w3.org/TR/using-aria/" target="_blank">W3C ARIA Documentation</a></small></p>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Convert Non-Semantic to Semantic HTML</h2>
        <p>Practice converting non-semantic HTML to semantic HTML by editing the code below:</p>
        
        <div>
            <textarea id="htmlEditor" rows="20" style="width: 100%; font-family: monospace; padding: 10px;"><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <style>
        /* Basic styling for visualization */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .header {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }
        .nav {
            background-color: #333;
            color: white;
            padding: 10px;
        }
        .nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        .nav li {
            margin: 0 10px;
        }
        .nav a {
            color: white;
            text-decoration: none;
        }
        .content {
            display: flex;
            margin: 20px 0;
        }
        .main {
            flex: 3;
            padding-right: 20px;
        }
        .sidebar {
            flex: 1;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .post {
            margin-bottom: 30px;
        }
        .post-meta {
            color: #666;
            font-size: 0.9em;
        }
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <!-- Convert this non-semantic HTML to semantic HTML -->
    <div class="header">
        <h1>My Blog</h1>
    </div>
    
    <div class="nav">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    
    <div class="content">
        <div class="main">
            <div class="post">
                <h2>First Blog Post</h2>
                <div class="post-meta">Posted on January 15, 2023 by Admin</div>
                <p>This is the content of my first blog post. It contains important information about web development.</p>
                <div class="post-image">
                    <img src="https://via.placeholder.com/600x300" alt="Placeholder Image">
                    <div class="caption">Image caption goes here</div>
                </div>
                <p>More content for the first blog post...</p>
            </div>
            
            <div class="post">
                <h2>Second Blog Post</h2>
                <div class="post-meta">Posted on January 20, 2023 by Admin</div>
                <p>This is the content of my second blog post. It contains more information about web development.</p>
                <p>More content for the second blog post...</p>
            </div>
        </div>
        
        <div class="sidebar">
            <h3>About Me</h3>
            <p>I am a web developer passionate about HTML, CSS, and JavaScript.</p>
            
            <h3>Recent Posts</h3>
            <ul>
                <li><a href="#">First Blog Post</a></li>
                <li><a href="#">Second Blog Post</a></li>
            </ul>
            
            <h3>Categories</h3>
            <ul>
                <li><a href="#">HTML</a></li>
                <li><a href="#">CSS</a></li>
                <li><a href="#">JavaScript</a></li>
            </ul>
        </div>
    </div>
    
    <div class="footer">
        <p>&copy; 2023 My Blog. All rights reserved.</p>
    </div>
</body>
</html></textarea>
            <button onclick="updatePreview()">Update Preview</button>
        </div>
        
        <h3>Preview:</h3>
        <iframe id="previewFrame" style="width: 100%; height: 500px; border: 1px solid #ddd; border-radius: 4px;"></iframe>
        
        <div class="note" style="margin-top: 20px;">
            <h3>Hint:</h3>
            <p>Replace the generic <code>&lt;div&gt;</code> elements with appropriate semantic elements:</p>
            <ul>
                <li>Replace <code>div class="header"</code> with <code>&lt;header&gt;</code></li>
                <li>Replace <code>div class="nav"</code> with <code>&lt;nav&gt;</code></li>
                <li>Replace <code>div class="content"</code> with <code>&lt;main&gt;</code></li>
                <li>Replace <code>div class="main"</code> with appropriate elements</li>
                <li>Replace <code>div class="post"</code> with <code>&lt;article&gt;</code></li>
                <li>Replace <code>div class="sidebar"</code> with <code>&lt;aside&gt;</code></li>
                <li>Replace <code>div class="footer"</code> with <code>&lt;footer&gt;</code></li>
                <li>Consider using <code>&lt;time&gt;</code>, <code>&lt;figure&gt;</code>, and <code>&lt;figcaption&gt;</code> where appropriate</li>
            </ul>
        </div>
        
        <button id="showSolution" style="margin-top: 15px;">Show Solution</button>
        <div id="solution" style="display: none; margin-top: 15px; padding: 15px; background-color: #f0f0f0; border-radius: 5px;">
            <h3>Solution:</h3>
            <pre style="background-color: #2c3e50; color: #ecf0f1; padding: 15px; border-radius: 5px; overflow-x: auto;">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;My Blog&lt;/title&gt;
    &lt;style&gt;
        /* Basic styling for visualization */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        header {
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: #333;
            color: white;
            padding: 10px;
        }
        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        nav li {
            margin: 0 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
        }
        main {
            display: flex;
            margin: 20px 0;
        }
        article {
            margin-bottom: 30px;
        }
        section.posts {
            flex: 3;
            padding-right: 20px;
        }
        aside {
            flex: 1;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .post-meta {
            color: #666;
            font-size: 0.9em;
        }
        figure {
            margin: 0;
            padding: 0;
        }
        figcaption {
            font-style: italic;
            color: #666;
            font-size: 0.9em;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;header&gt;
        &lt;h1&gt;My Blog&lt;/h1&gt;
    &lt;/header&gt;
    
    &lt;nav&gt;
        &lt;ul&gt;
            &lt;li&gt;&lt;a href="#"&gt;Home&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href="#"&gt;About&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href="#"&gt;Blog&lt;/a&gt;&lt;/li&gt;
            &lt;li&gt;&lt;a href="#"&gt;Contact&lt;/a&gt;&lt;/li&gt;
        &lt;/ul&gt;
    &lt;/nav&gt;
    
    &lt;main&gt;
        &lt;section class="posts"&gt;
            &lt;article&gt;
                &lt;header&gt;
                    &lt;h2&gt;First Blog Post&lt;/h2&gt;
                    &lt;p class="post-meta"&gt;Posted on &lt;time datetime="2023-01-15"&gt;January 15, 2023&lt;/time&gt; by Admin&lt;/p&gt;
                &lt;/header&gt;
                &lt;p&gt;This is the content of my first blog post. It contains important information about web development.&lt;/p&gt;
                &lt;figure&gt;
                    &lt;img src="https://via.placeholder.com/600x300" alt="Placeholder Image"&gt;
                    &lt;figcaption&gt;Image caption goes here&lt;/figcaption&gt;
                &lt;/figure&gt;
                &lt;p&gt;More content for the first blog post...&lt;/p&gt;
            &lt;/article&gt;
            
            &lt;article&gt;
                &lt;header&gt;
                    &lt;h2&gt;Second Blog Post&lt;/h2&gt;
                    &lt;p class="post-meta"&gt;Posted on &lt;time datetime="2023-01-20"&gt;January 20, 2023&lt;/time&gt; by Admin&lt;/p&gt;
                &lt;/header&gt;
                &lt;p&gt;This is the content of my second blog post. It contains more information about web development.&lt;/p&gt;
                &lt;p&gt;More content for the second blog post...&lt;/p&gt;
            &lt;/article&gt;
        &lt;/section&gt;
        
        &lt;aside&gt;
            &lt;section&gt;
                &lt;h3&gt;About Me&lt;/h3&gt;
                &lt;p&gt;I am a web developer passionate about HTML, CSS, and JavaScript.&lt;/p&gt;
            &lt;/section&gt;
            
            &lt;section&gt;
                &lt;h3&gt;Recent Posts&lt;/h3&gt;
                &lt;ul&gt;
                    &lt;li&gt;&lt;a href="#"&gt;First Blog Post&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href="#"&gt;Second Blog Post&lt;/a&gt;&lt;/li&gt;
                &lt;/ul&gt;
            &lt;/section&gt;
            
            &lt;section&gt;
                &lt;h3&gt;Categories&lt;/h3&gt;
                &lt;ul&gt;
                    &lt;li&gt;&lt;a href="#"&gt;HTML&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href="#"&gt;CSS&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href="#"&gt;JavaScript&lt;/a&gt;&lt;/li&gt;
                &lt;/ul&gt;
            &lt;/section&gt;
        &lt;/aside&gt;
    &lt;/main&gt;
    
    &lt;footer&gt;
        &lt;p&gt;&copy; 2023 My Blog. All rights reserved.&lt;/p&gt;
    &lt;/footer&gt;
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
            1. What is the main benefit of using semantic HTML elements?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> They make the page load faster</label>
            <label><input type="radio" name="q1" value="b"> They provide meaning and structure to the content</label>
            <label><input type="radio" name="q1" value="c"> They automatically style the content</label>
            <label><input type="radio" name="q1" value="d"> They reduce the file size of HTML documents</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which semantic element should be used for the main content area of a webpage?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> &lt;content&gt;</label>
            <label><input type="radio" name="q2" value="b"> &lt;section&gt;</label>
            <label><input type="radio" name="q2" value="c"> &lt;main&gt;</label>
            <label><input type="radio" name="q2" value="d"> &lt;article&gt;</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which semantic element is used for standalone, self-contained content that could be distributed independently?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> &lt;section&gt;</label>
            <label><input type="radio" name="q3" value="b"> &lt;aside&gt;</label>
            <label><input type="radio" name="q3" value="c"> &lt;div&gt;</label>
            <label><input type="radio" name="q3" value="d"> &lt;article&gt;</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. How many &lt;main&gt; elements should a webpage have?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> As many as needed</label>
            <label><input type="radio" name="q4" value="b"> Only one</label>
            <label><input type="radio" name="q4" value="c"> At least one</label>
            <label><input type="radio" name="q4" value="d"> None, it's optional</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. Which pair of elements is used to create a figure with a caption?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> &lt;figure&gt; and &lt;figcaption&gt;</label>
            <label><input type="radio" name="q5" value="b"> &lt;img&gt; and &lt;caption&gt;</label>
            <label><input type="radio" name="q5" value="c"> &lt;picture&gt; and &lt;description&gt;</label>
            <label><input type="radio" name="q5" value="d"> &lt;image&gt; and &lt;text&gt;</label>
        </div>
        <div id="feedback5" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'b',
                    q2: 'c',
                    q3: 'd',
                    q4: 'b',
                    q5: 'a'
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
            <button onclick="window.location.href='../basics/08_forms.html'">Previous Lesson: Forms and Input Elements</button>
        </div>
        <div>
            <button onclick="window.location.href='02_metadata.html'">Next Lesson: Metadata and Document Head</button>
        </div>
    </div>
</body>
</html>
