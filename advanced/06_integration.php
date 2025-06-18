<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integration with CSS and JavaScript</title>
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
        
        /* Integration specific styles */
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
        .demo-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            background-color: #f8f9fa;
        }
        .demo-result {
            border: 1px dashed #ccc;
            padding: 15px;
            margin: 15px 0;
            background-color: #fff;
        }
        .code-editor {
            width: 100%;
            height: 200px;
            font-family: 'Courier New', Courier, monospace;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
        }
        .preview-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-top: 10px;
            min-height: 100px;
            background-color: #fff;
        }
        .color-html {
            color: #e34c26;
        }
        .color-css {
            color: #264de4;
        }
        .color-js {
            color: #f0db4f;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Integration with CSS and JavaScript</h1>
    
    <div class="lesson-container">
        <h2>Introduction to HTML, CSS, and JavaScript Integration</h2>
        <p>Modern web development relies on the integration of three core technologies:</p>
        
        <ul>
            <li><strong class="color-html">HTML (HyperText Markup Language)</strong>: Provides the structure and content of web pages</li>
            <li><strong class="color-css">CSS (Cascading Style Sheets)</strong>: Controls the presentation and layout of web pages</li>
            <li><strong class="color-js">JavaScript</strong>: Adds interactivity and dynamic behavior to web pages</li>
        </ul>
        
        <p>These technologies work together to create engaging, interactive web experiences:</p>
        
        <div class="example">
            <h3>The Web Development Trinity:</h3>
            <ul>
                <li><strong class="color-html">HTML</strong> is like the skeleton of a web page, providing structure and content</li>
                <li><strong class="color-css">CSS</strong> is like the skin and clothing, providing appearance and style</li>
                <li><strong class="color-js">JavaScript</strong> is like the muscles and nervous system, providing movement and interactivity</li>
            </ul>
        </div>
        
        <h3>Separation of Concerns</h3>
        <p>A fundamental principle in web development is the separation of concerns, where each technology has a specific role:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Technology</th>
                <th>Responsibility</th>
                <th>File Extension</th>
            </tr>
            <tr>
                <td><strong class="color-html">HTML</strong></td>
                <td>Content and structure</td>
                <td>.html, .htm</td>
            </tr>
            <tr>
                <td><strong class="color-css">CSS</strong></td>
                <td>Presentation and layout</td>
                <td>.css</td>
            </tr>
            <tr>
                <td><strong class="color-js">JavaScript</strong></td>
                <td>Behavior and interactivity</td>
                <td>.js</td>
            </tr>
        </table>
        
        <p>This separation makes code more maintainable, reusable, and easier to understand. It also allows different specialists (content creators, designers, and developers) to work on the same project without interfering with each other's work.</p>
    </div>
    
    <div class="lesson-container">
        <h2>Integrating CSS with HTML</h2>
        <p>There are three main ways to integrate CSS with HTML:</p>
        
        <h3>1. Inline CSS</h3>
        <p>Inline CSS is applied directly to individual HTML elements using the <code>style</code> attribute:</p>
        
        <div class="code-block">
&lt;p style="color: blue; font-size: 18px; margin-top: 20px;"&gt;This paragraph has inline styles.&lt;/p&gt;
        </div>
        
        <div class="note">
            <h3>When to Use Inline CSS:</h3>
            <ul>
                <li>For quick testing or prototyping</li>
                <li>When styles need to be applied to a single element</li>
                <li>In email templates where external stylesheets aren't fully supported</li>
                <li>When styles need to override other styles with high specificity</li>
            </ul>
            <p><strong>Drawbacks:</strong> Mixes content with presentation, difficult to maintain, and leads to code duplication.</p>
        </div>
        
        <h3>2. Internal CSS</h3>
        <p>Internal CSS is defined within a <code>&lt;style&gt;</code> element in the <code>&lt;head&gt;</code> section of an HTML document:</p>
        
        <div class="code-block">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Internal CSS Example&lt;/title&gt;
    &lt;style&gt;
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        h1 {
            color: #2c3e50;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        
        .highlight {
            background-color: #ffffcc;
            padding: 5px;
            border-radius: 3px;
        }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Welcome to My Page&lt;/h1&gt;
    &lt;p&gt;This is a paragraph with &lt;span class="highlight"&gt;highlighted text&lt;/span&gt;.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;
        </div>
        
        <div class="note">
            <h3>When to Use Internal CSS:</h3>
            <ul>
                <li>For single-page websites or small projects</li>
                <li>When styles are specific to a single page</li>
                <li>For pages that need to be self-contained (e.g., for distribution)</li>
            </ul>
            <p><strong>Drawbacks:</strong> Styles can't be reused across multiple pages, and the CSS increases the page size.</p>
        </div>
        
        <h3>3. External CSS</h3>
        <p>External CSS is defined in separate .css files and linked to HTML documents using the <code>&lt;link&gt;</code> element:</p>
        
        <div class="code-block">
&lt;!-- In the HTML file (index.html) --&gt;
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;External CSS Example&lt;/title&gt;
    &lt;link rel="stylesheet" href="styles.css"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Welcome to My Page&lt;/h1&gt;
    &lt;p&gt;This is a paragraph with &lt;span class="highlight"&gt;highlighted text&lt;/span&gt;.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

&lt;!-- In the CSS file (styles.css) --&gt;
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    color: #333;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    color: #2c3e50;
    border-bottom: 2px solid #eee;
    padding-bottom: 10px;
}

.highlight {
    background-color: #ffffcc;
    padding: 5px;
    border-radius: 3px;
}
        </div>
        
        <div class="note">
            <h3>When to Use External CSS:</h3>
            <ul>
                <li>For multi-page websites (the preferred approach for most projects)</li>
                <li>When styles need to be reused across multiple pages</li>
                <li>For better organization and maintenance of code</li>
                <li>For improved performance through browser caching</li>
            </ul>
            <p><strong>Advantages:</strong> Separation of concerns, code reusability, reduced file size through caching, and easier maintenance.</p>
        </div>
        
        <h3>CSS Selectors for HTML Integration</h3>
        <p>CSS selectors are patterns used to select and style HTML elements. Understanding selectors is crucial for effective HTML-CSS integration:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Selector Type</th>
                <th>Example</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>Element Selector</td>
                <td><code>p { color: blue; }</code></td>
                <td>Selects all &lt;p&gt; elements</td>
            </tr>
            <tr>
                <td>Class Selector</td>
                <td><code>.highlight { background: yellow; }</code></td>
                <td>Selects elements with class="highlight"</td>
            </tr>
            <tr>
                <td>ID Selector</td>
                <td><code>#header { position: fixed; }</code></td>
                <td>Selects the element with id="header"</td>
            </tr>
            <tr>
                <td>Attribute Selector</td>
                <td><code>[type="submit"] { background: green; }</code></td>
                <td>Selects elements with type="submit"</td>
            </tr>
            <tr>
                <td>Descendant Selector</td>
                <td><code>article p { line-height: 1.8; }</code></td>
                <td>Selects &lt;p&gt; elements inside &lt;article&gt; elements</td>
            </tr>
            <tr>
                <td>Child Selector</td>
                <td><code>ul > li { list-style: square; }</code></td>
                <td>Selects &lt;li&gt; elements that are direct children of &lt;ul&gt;</td>
            </tr>
            <tr>
                <td>Pseudo-class</td>
                <td><code>a:hover { text-decoration: underline; }</code></td>
                <td>Selects &lt;a&gt; elements when hovered</td>
            </tr>
            <tr>
                <td>Pseudo-element</td>
                <td><code>p::first-line { font-weight: bold; }</code></td>
                <td>Selects the first line of &lt;p&gt; elements</td>
            </tr>
        </table>
        
        <div class="demo-container">
            <h3>Interactive CSS Selector Demo:</h3>
            <div class="tabs">
                <div class="tab active" onclick="showTab('html-tab')">HTML</div>
                <div class="tab" onclick="showTab('css-tab')">CSS</div>
                <div class="tab" onclick="showTab('result-tab')">Result</div>
            </div>
            
            <div id="html-tab" class="tab-content active">
                <textarea id="html-editor" class="code-editor">
<div class="container">
  <h1 id="main-title">CSS Selectors Example</h1>
  
  <p>This is a <span class="highlight">highlighted</span> paragraph.</p>
  
  <ul class="list">
    <li>First item</li>
    <li class="special">Second item (special)</li>
    <li>Third item</li>
  </ul>
  
  <div class="box">
    <p>This paragraph is inside a box.</p>
  </div>
  
  <a href="#" class="button">Click me</a>
</div>
                </textarea>
            </div>
            
            <div id="css-tab" class="tab-content">
                <textarea id="css-editor" class="code-editor">
/* Element selector */
h1 {
  color: #2c3e50;
  border-bottom: 2px solid #eee;
}

/* ID selector */
#main-title {
  font-size: 24px;
}

/* Class selector */
.highlight {
  background-color: yellow;
  padding: 2px 5px;
}

/* Descendant selector */
.container p {
  line-height: 1.6;
}

/* Child selector */
ul > li {
  margin-bottom: 10px;
}

/* Attribute selector */
[href="#"] {
  text-decoration: none;
}

/* Class selector */
.button {
  background-color: #3498db;
  color: white;
  padding: 10px 15px;
  border-radius: 4px;
  display: inline-block;
}

/* Pseudo-class */
.button:hover {
  background-color: #2980b9;
}

/* Multiple selectors */
.box, .special {
  background-color: #f8f9fa;
  border: 1px solid #ddd;
  padding: 10px;
  border-radius: 4px;
}
                </textarea>
            </div>
            
            <div id="result-tab" class="tab-content">
                <div id="preview-container" class="preview-container">
                    <!-- Preview will be shown here -->
                </div>
            </div>
            
            <button onclick="updatePreview()">Update Preview</button>
            
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
                    const htmlCode = document.getElementById('html-editor').value;
                    const cssCode = document.getElementById('css-editor').value;
                    const previewContainer = document.getElementById('preview-container');
                    
                    // Create a style element for the CSS
                    const styleElement = document.createElement('style');
                    styleElement.textContent = cssCode;
                    
                    // Set the HTML content
                    previewContainer.innerHTML = htmlCode;
                    
                    // Add the style element
                    previewContainer.appendChild(styleElement);
                }
                
                // Initialize preview when the page loads
                document.addEventListener('DOMContentLoaded', function() {
                    updatePreview();
                });
            </script>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Integrating JavaScript with HTML</h2>
        <p>There are several ways to integrate JavaScript with HTML:</p>
        
        <h3>1. Inline JavaScript</h3>
        <p>Inline JavaScript is written directly within HTML elements using event attributes:</p>
        
        <div class="code-block">
&lt;button onclick="alert('Hello, World!')"&gt;Click Me&lt;/button&gt;

&lt;a href="#" onmouseover="this.style.color='red'" onmouseout="this.style.color='blue'"&gt;Hover over me&lt;/a&gt;
        </div>
        
        <div class="note">
            <h3>When to Use Inline JavaScript:</h3>
            <ul>
                <li>For quick testing or prototyping</li>
                <li>For simple, one-off interactions</li>
                <li>In HTML email templates where external scripts aren't supported</li>
            </ul>
            <p><strong>Drawbacks:</strong> Mixes content with behavior, difficult to maintain, and leads to code duplication.</p>
        </div>
        
        <h3>2. Internal JavaScript</h3>
        <p>Internal JavaScript is defined within a <code>&lt;script&gt;</code> element in the HTML document:</p>
        
        <div class="code-block">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Internal JavaScript Example&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1 id="title"&gt;Hello, World!&lt;/h1&gt;
    &lt;button id="changeButton"&gt;Change Text&lt;/button&gt;
    
    &lt;script&gt;
        // Wait for the DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Get references to elements
            const title = document.getElementById('title');
            const button = document.getElementById('changeButton');
            
            // Add click event listener to the button
            button.addEventListener('click', function() {
                // Change the title text
                title.textContent = 'Text Changed!';
                
                // Change the title color
                title.style.color = 'blue';
            });
        });
    &lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
        </div>
        
        <div class="note">
            <h3>When to Use Internal JavaScript:</h3>
            <ul>
                <li>For single-page websites or small projects</li>
                <li>When scripts are specific to a single page</li>
                <li>For pages that need to be self-contained (e.g., for distribution)</li>
            </ul>
            <p><strong>Drawbacks:</strong> Scripts can't be reused across multiple pages, and the JavaScript increases the page size.</p>
        </div>
        
        <h3>3. External JavaScript</h3>
        <p>External JavaScript is defined in separate .js files and linked to HTML documents using the <code>&lt;script&gt;</code> element with a <code>src</code> attribute:</p>
        
        <div class="code-block">
&lt;!-- In the HTML file (index.html) --&gt;
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;External JavaScript Example&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1 id="title"&gt;Hello, World!&lt;/h1&gt;
    &lt;button id="changeButton"&gt;Change Text&lt;/button&gt;
    
    &lt;!-- Load the external JavaScript file --&gt;
    &lt;script src="script.js"&gt;&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;

&lt;!-- In the JavaScript file (script.js) --&gt;
// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get references to elements
    const title = document.getElementById('title');
    const button = document.getElementById('changeButton');
    
    // Add click event listener to the button
    button.addEventListener('click', function() {
        // Change the title text
        title.textContent = 'Text Changed!';
        
        // Change the title color
        title.style.color = 'blue';
    });
});
        </div>
        
        <div class="note">
            <h3>When to Use External JavaScript:</h3>
            <ul>
                <li>For multi-page websites (the preferred approach for most projects)</li>
                <li>When scripts need to be reused across multiple pages</li>
                <li>For better organization and maintenance of code</li>
                <li>For improved performance through browser caching</li>
            </ul>
            <p><strong>Advantages:</strong> Separation of concerns, code reusability, reduced file size through caching, and easier maintenance.</p>
        </div>
        
        <h3>Script Loading Strategies</h3>
        <p>How and when JavaScript is loaded can significantly impact page performance and user experience:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Strategy</th>
                <th>Example</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>Regular (Blocking)</td>
                <td><code>&lt;script src="script.js"&gt;&lt;/script&gt;</code></td>
                <td>Blocks HTML parsing until the script is downloaded and executed</td>
            </tr>
            <tr>
                <td>Defer</td>
                <td><code>&lt;script src="script.js" defer&gt;&lt;/script&gt;</code></td>
                <td>Downloads script while HTML parsing continues, executes after parsing is complete</td>
            </tr>
            <tr>
                <td>Async</td>
                <td><code>&lt;script src="script.js" async&gt;&lt;/script&gt;</code></td>
                <td>Downloads script while HTML parsing continues, executes as soon as it's downloaded</td>
            </tr>
            <tr>
                <td>Dynamic Loading</td>
                <td><code>const script = document.createElement('script');<br>script.src = 'script.js';<br>document.head.appendChild(script);</code></td>
                <td>Creates script element dynamically and adds it to the document</td>
            </tr>
            <tr>
                <td>Module</td>
                <td><code>&lt;script type="module" src="module.js"&gt;&lt;/script&gt;</code></td>
                <td>Loads JavaScript as a module with its own scope, deferred by default</td>
            </tr>
        </table>
        
        <div class="example">
            <h3>Best Practices for Script Loading:</h3>
            <ul>
                <li>Place regular <code>&lt;script&gt;</code> elements at the end of the <code>&lt;body&gt;</code> to avoid blocking rendering</li>
                <li>Use <code>defer</code> for scripts that need the DOM and depend on each other</li>
                <li>Use <code>async</code> for independent scripts where execution order doesn't matter</li>
                <li>Consider using ES modules (<code>type="module"</code>) for modern applications</li>
                <li>Use dynamic loading for scripts that are only needed under certain conditions</li>
            </ul>
        </div>
        
        <div class="demo-container">
            <h3>Interactive JavaScript Integration Demo:</h3>
            <div class="tabs">
                <div class="tab active" onclick="showTab2('html-tab2')">HTML</div>
                <div class="tab" onclick="showTab2('js-tab2')">JavaScript</div>
                <div class="tab" onclick="showTab2('result-tab2')">Result</div>
            </div>
            
            <div id="html-tab2" class="tab-content active">
                <textarea id="html-editor2" class="code-editor">
<div class="demo">
  <h2 id="counter-title">Counter: <span id="count">0</span></h2>
  
  <div class="buttons">
    <button id="increment">Increment</button>
    <button id="decrement">Decrement</button>
    <button id="reset">Reset</button>
  </div>
  
  <div class="message-box">
    <input type="text" id="message-input" placeholder="Enter a message">
    <button id="show-message">Show Message</button>
  </div>
  
  <div id="output" class="output"></div>
</div>
                </textarea>
            </div>
            
            <div id="js-tab2" class="tab-content">
                <textarea id="js-editor" class="code-editor">
// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
  // Get references to elements
  const countElement = document.getElementById('count');
  const incrementButton = document.getElementById('increment');
  const decrementButton = document.getElementById('decrement');
  const resetButton = document.getElementById('reset');
  const messageInput = document.getElementById('message-input');
  const showMessageButton = document.getElementById('show-message');
  const outputElement = document.getElementById('output');
  
  // Initialize counter
  let count = 0;
  
  // Add event listeners for counter buttons
  incrementButton.addEventListener('click', function() {
    count++;
    updateCounter();
  });
  
  decrementButton.addEventListener('click', function() {
    count--;
    updateCounter();
  });
  
  resetButton.addEventListener('click', function() {
    count = 0;
    updateCounter();
    outputElement.textContent = '';
  });
  
  // Add event listener for message button
  showMessageButton.addEventListener('click', function() {
    const message = messageInput.value;
    if (message.trim() !== '') {
      outputElement.textContent = message;
      messageInput.value = '';
    } else {
      outputElement.textContent = 'Please enter a message!';
    }
  });
  
  // Function to update the counter display
  function updateCounter() {
    countElement.textContent = count;
    
    // Change color based on value
    if (count > 0) {
      countElement.style.color = 'green';
    } else if (count < 0) {
      countElement.style.color = 'red';
    } else {
      countElement.style.color = 'black';
    }
  }
});
                </textarea>
            </div>
            
            <div id="result-tab2" class="tab-content">
                <div id="preview-container2" class="preview-container">
                    <!-- Preview will be shown here -->
                </div>
            </div>
            
            <button onclick="updatePreview2()">Update Preview</button>
            
            <script>
                function showTab2(tabName) {
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
                    document.querySelector(`.tab[onclick="showTab2('${tabName}')"]`).classList.add('active');
                }
                
                function updatePreview2() {
                    const htmlCode = document.getElementById('html-editor2').value;
                    const jsCode = document.getElementById('js-editor').value;
                    const previewContainer = document.getElementById('preview-container2');
                    
                    // Set the HTML content
                    previewContainer.innerHTML = htmlCode;
                    
                    // Create a script element for the JavaScript
                    const scriptElement = document.createElement('script');
                    scriptElement.textContent = jsCode;
                    
                    // Add the script element
                    previewContainer.appendChild(scriptElement);
                }
                
                // Initialize preview when the page loads
                document.addEventListener('DOMContentLoaded', function() {
                    updatePreview2();
                });
            </script>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>DOM Manipulation with JavaScript</h2>
        <p>The Document Object Model (DOM) is a programming interface for HTML documents. It represents the page as a tree of objects that JavaScript can manipulate.</p>
        
        <h3>Accessing HTML Elements</h3>
        <p>JavaScript provides several methods to access HTML elements:</p>
        
        <div class="code-block">
// By ID (returns a single element)
const element = document.getElementById('myId');

// By class name (returns a collection of elements)
const elements = document.getElementsByClassName('myClass');

// By tag name (returns a collection of elements)
const paragraphs = document.getElementsByTagName('p');

// Using CSS selectors (returns the first matching element)
const firstElement = document.querySelector('.myClass');

// Using CSS selectors (returns all matching elements)
const allElements = document.querySelectorAll('div.container > p');
        </div>
        
        <h3>Modifying HTML Content and Attributes</h3>
        <p>Once you have a reference to an element, you can modify its content and attributes:</p>
        
        <div class="code-block">
// Changing text content
element.textContent = 'New text content';

// Changing HTML content
element.innerHTML = '<strong>Bold text</strong> and <em>italic text</em>';

// Setting attributes
element.setAttribute('class', 'highlight');
element.setAttribute('data-custom', 'value');

// Getting attribute values
const className = element.getAttribute('class');

// Modifying styles
element.style.color = 'blue';
element.style.fontSize = '18px';
element.style.backgroundColor = '#f0f0f0';

// Adding and removing classes
element.classList.add('active');
element.classList.remove('hidden');
element.classList.toggle('selected');
element.classList.contains('active'); // returns true or false
        </div>
        
        <h3>Creating and Manipulating Elements</h3>
        <p>JavaScript can create new elements and modify the DOM structure:</p>
        
        <div class="code-block">
// Creating a new element
const newParagraph = document.createElement('p');
newParagraph.textContent = 'This is a new paragraph.';
newParagraph.className = 'new-content';

// Appending elements
document.body.appendChild(newParagraph);
parentElement.appendChild(newParagraph);

// Inserting before another element
parentElement.insertBefore(newParagraph, referenceElement);

// Modern insertion methods
parentElement.append(element1, element2, 'Text node');
parentElement.prepend(element);
referenceElement.before(element);
referenceElement.after(element);
referenceElement.replaceWith(element);

// Removing elements
element.remove();
parentElement.removeChild(childElement);

// Cloning elements
const clone = element.cloneNode(true); // true to clone with all descendants
        </div>
        
        <h3>Event Handling</h3>
        <p>JavaScript can respond to user interactions and other events:</p>
        
        <div class="code-block">
// Using addEventListener
element.addEventListener('click', function(event) {
    console.log('Element clicked!');
    console.log('Event object:', event);
});

// Using named functions
function handleClick(event) {
    console.log('Button clicked!');
    // Prevent default behavior (e.g., for links)
    event.preventDefault();
    // Stop event propagation
    event.stopPropagation();
}

button.addEventListener('click', handleClick);

// Removing event listeners
button.removeEventListener('click', handleClick);

// Common events
// - Mouse events: click, dblclick, mousedown, mouseup, mousemove, mouseover, mouseout
// - Keyboard events: keydown, keyup, keypress
// - Form events: submit, change, input, focus, blur
// - Document/Window events: load, resize, scroll, unload
        </div>
        
        <div class="example">
            <h3>Event Propagation: Bubbling and Capturing</h3>
            <p>Events in the DOM propagate in two phases:</p>
            <ol>
                <li><strong>Capturing Phase</strong>: Events travel from the document root down to the target element</li>
                <li><strong>Bubbling Phase</strong>: Events bubble up from the target element to the document root</li>
            </ol>
            <div class="code-block">
// The third parameter of addEventListener controls the phase:
// - false (default): Listen during bubbling phase
// - true: Listen during capturing phase
element.addEventListener('click', handleClick, true); // Capturing phase
element.addEventListener('click', handleClick, false); // Bubbling phase (default)

// Stop propagation to prevent the event from bubbling up
function handleClick(event) {
    event.stopPropagation();
}
            </div>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Advanced Integration Techniques</h2>
        
        <h3>1. CSS-in-JS</h3>
        <p>CSS-in-JS is an approach where CSS is written directly in JavaScript code:</p>
        
        <div class="code-block">
// Creating a style element dynamically
function applyStyles() {
    const styleElement = document.createElement('style');
    styleElement.textContent = `
        .dynamic-box {
            background-color: #3498db;
            color: white;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .dynamic-box h3 {
            margin-top: 0;
            border-bottom: 1px solid rgba(255,255,255,0.3);
            padding-bottom: 10px;
        }
    `;
    document.head.appendChild(styleElement);
}

// Creating elements with the dynamic styles
function createDynamicBox(title, content) {
    const box = document.createElement('div');
    box.className = 'dynamic-box';
    
    const heading = document.createElement('h3');
    heading.textContent = title;
    
    const paragraph = document.createElement('p');
    paragraph.textContent = content;
    
    box.appendChild(heading);
    box.appendChild(paragraph);
    
    return box;
}

// Apply styles and create elements
applyStyles();
const dynamicBox = createDynamicBox('Dynamic Content', 'This box was created with JavaScript.');
document.body.appendChild(dynamicBox);
        </div>
        
        <h3>2. CSS Custom Properties (Variables) with JavaScript</h3>
        <p>JavaScript can interact with CSS custom properties to create dynamic styling:</p>
        
        <div class="code-block">
/* CSS with custom properties */
:root {
    --primary-color: #3498db;
    --secondary-color: #2ecc71;
    --text-color: #333;
    --font-size: 16px;
}

.theme-box {
    background-color: var(--primary-color);
    color: white;
    padding: 20px;
    border-radius: 5px;
    font-size: var(--font-size);
}

/* JavaScript to modify custom properties */
function changeTheme(primaryColor, fontSize) {
    // Get the root element
    const root = document.documentElement;
    
    // Set custom properties
    root.style.setProperty('--primary-color', primaryColor);
    root.style.setProperty('--font-size', fontSize + 'px');
}

// Change theme based on user interaction
document.getElementById('theme-button').addEventListener('click', function() {
    changeTheme('#e74c3c', 18);
});
        </div>
        
        <h3>3. Responsive Design with JavaScript</h3>
        <p>JavaScript can enhance responsive design by dynamically adapting content based on screen size or device capabilities:</p>
        
        <div class="code-block">
// Using matchMedia to respond to media queries
const mediaQuery = window.matchMedia('(max-width: 600px)');

function handleScreenChange(e) {
    if (e.matches) {
        // Screen is 600px or less
        document.body.classList.add('mobile-view');
        // Simplify navigation for mobile
        simplifyNavigation();
    } else {
        // Screen is larger than 600px
        document.body.classList.remove('mobile-view');
        // Restore full navigation
        restoreNavigation();
    }
}

// Initial check
handleScreenChange(mediaQuery);

// Add listener for changes
mediaQuery.addEventListener('change', handleScreenChange);

// Function to simplify navigation for mobile
function simplifyNavigation() {
    const nav = document.querySelector('nav');
    const menuButton = document.createElement('button');
    menuButton.textContent = 'Menu';
    menuButton.className = 'menu-button';
    
    menuButton.addEventListener('click', function() {
        nav.classList.toggle('menu-open');
    });
    
    nav.parentNode.insertBefore(menuButton, nav);
}

// Function to restore full navigation
function restoreNavigation() {
    const menuButton = document.querySelector('.menu-button');
    if (menuButton) {
        menuButton.remove();
    }
    
    const nav = document.querySelector('nav');
    nav.classList.remove('menu-open');
}
        </div>
        
        <h3>4. Progressive Enhancement</h3>
        <p>Progressive enhancement is an approach that starts with a basic HTML document and enhances it with CSS and JavaScript when available:</p>
        
        <div class="code-block">
&lt;!-- Basic HTML structure that works without JavaScript --&gt;
&lt;div class="tabs-container"&gt;
    &lt;div class="tab-links"&gt;
        &lt;a href="#tab1" class="tab-link"&gt;Tab 1&lt;/a&gt;
        &lt;a href="#tab2" class="tab-link"&gt;Tab 2&lt;/a&gt;
        &lt;a href="#tab3" class="tab-link"&gt;Tab 3&lt;/a&gt;
    &lt;/div&gt;
    
    &lt;div id="tab1" class="tab-content"&gt;
        &lt;h3&gt;Tab 1 Content&lt;/h3&gt;
        &lt;p&gt;This is the content for tab 1.&lt;/p&gt;
    &lt;/div&gt;
    
    &lt;div id="tab2" class="tab-content"&gt;
        &lt;h3&gt;Tab 2 Content&lt;/h3&gt;
        &lt;p&gt;This is the content for tab 2.&lt;/p&gt;
    &lt;/div&gt;
    
    &lt;div id="tab3" class="tab-content"&gt;
        &lt;h3&gt;Tab 3 Content&lt;/h3&gt;
        &lt;p&gt;This is the content for tab 3.&lt;/p&gt;
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- JavaScript to enhance the tabs --&gt;
&lt;script&gt;
    // Check if JavaScript is available
    document.documentElement.className = 'js';
    
    document.addEventListener('DOMContentLoaded', function() {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');
        
        // Hide all tab contents except the first one
        for (let i = 1; i < tabContents.length; i++) {
            tabContents[i].style.display = 'none';
        }
        
        // Add click event listeners to tab links
        tabLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Get the target tab content
                const targetId = this.getAttribute('href');
                const targetTab = document.querySelector(targetId);
                
                // Hide all tab contents
                tabContents.forEach(function(content) {
                    content.style.display = 'none';
                });
                
                // Show the target tab content
                targetTab.style.display = 'block';
                
                // Update active state
                tabLinks.forEach(function(link) {
                    link.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
        
        // Set the first tab as active
        tabLinks[0].classList.add('active');
    });
&lt;/script&gt;

&lt;!-- CSS for the tabs --&gt;
&lt;style&gt;
    /* Basic styles for all browsers */
    .tab-content {
        margin-top: 20px;
        padding: 15px;
        border: 1px solid #ddd;
    }
    
    /* Enhanced styles for browsers with JavaScript */
    .js .tab-links {
        display: flex;
        border-bottom: 1px solid #ddd;
    }
    
    .js .tab-link {
        padding: 10px 15px;
        text-decoration: none;
        color: #333;
    }
    
    .js .tab-link.active {
        background-color: #f0f0f0;
        border: 1px solid #ddd;
        border-bottom: none;
        border-radius: 5px 5px 0 0;
    }
&lt;/style&gt;
        </div>
        
        <div class="note">
            <h3>Benefits of Progressive Enhancement:</h3>
            <ul>
                <li>Ensures basic functionality for all users, regardless of browser capabilities</li>
                <li>Improves accessibility for users with JavaScript disabled</li>
                <li>Creates a more robust user experience that degrades gracefully</li>
                <li>Follows the principle of "content first, enhancement second"</li>
            </ul>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Building a Dynamic Form</h2>
        <p>Let's create a dynamic form that uses HTML for structure, CSS for styling, and JavaScript for interactivity and validation.</p>
        
        <div class="tabs">
            <div class="tab active" onclick="showTab3('html-tab3')">HTML</div>
            <div class="tab" onclick="showTab3('css-tab3')">CSS</div>
            <div class="tab" onclick="showTab3('js-tab3')">JavaScript</div>
            <div class="tab" onclick="showTab3('result-tab3')">Result</div>
        </div>
        
        <div id="html-tab3" class="tab-content active">
            <textarea id="html-editor3" class="code-editor" style="height: 300px;">
<div class="form-container">
  <h2>User Registration Form</h2>
  
  <form id="registration-form">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      <div class="error-message" id="username-error"></div>
    </div>
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <div class="error-message" id="email-error"></div>
    </div>
    
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <div class="error-message" id="password-error"></div>
    </div>
    
    <div class="form-group">
      <label for="confirm-password">Confirm Password:</label>
      <input type="password" id="confirm-password" name="confirm-password" required>
      <div class="error-message" id="confirm-password-error"></div>
    </div>
    
    <div class="form-group">
      <label>Interests:</label>
      <div class="checkbox-group">
        <label><input type="checkbox" name="interests" value="html"> HTML</label>
        <label><input type="checkbox" name="interests" value="css"> CSS</label>
        <label><input type="checkbox" name="interests" value="javascript"> JavaScript</label>
        <label><input type="checkbox" name="interests" value="other"> Other</label>
      </div>
      <div class="error-message" id="interests-error"></div>
    </div>
    
    <div class="form-group" id="other-interest-group" style="display: none;">
      <label for="other-interest">Specify Other Interest:</label>
      <input type="text" id="other-interest" name="other-interest">
    </div>
    
    <div class="form-group">
      <button type="submit" id="submit-button">Register</button>
      <button type="reset" id="reset-button">Reset</button>
    </div>
  </form>
  
  <div id="form-result" class="form-result"></div>
</div>
            </textarea>
        </div>
        
        <div id="css-tab3" class="tab-content">
            <textarea id="css-editor3" class="code-editor" style="height: 300px;">
.form-container {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.form-container h2 {
  text-align: center;
  color: #2c3e50;
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 16px;
}

.checkbox-group {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-top: 5px;
}

.checkbox-group label {
  font-weight: normal;
  display: flex;
  align-items: center;
  cursor: pointer;
}

.checkbox-group input {
  margin-right: 5px;
}

button {
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
  margin-right: 10px;
}

#submit-button {
  background-color: #3498db;
  color: white;
}

#submit-button:hover {
  background-color: #2980b9;
}

#reset-button {
  background-color: #e74c3c;
  color: white;
}

#reset-button:hover {
  background-color: #c0392b;
}

.error-message {
  color: #e74c3c;
  font-size: 14px;
  margin-top: 5px;
  min-height: 20px;
}

.form-result {
  margin-top: 20px;
  padding: 15px;
  border-radius: 4px;
  display: none;
}

.success {
  background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
}

.error {
  background-color: #f8d7da;
  color: #721c24;
  border: 1px solid #f5c6cb;
}

/* Form validation styles */
input:focus {
  outline: none;
  border-color: #3498db;
  box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
}

input.valid {
  border-color: #2ecc71;
}

input.invalid {
  border-color: #e74c3c;
}
            </textarea>
        </div>
        
        <div id="js-tab3" class="tab-content">
            <textarea id="js-editor3" class="code-editor" style="height: 300px;">
document.addEventListener('DOMContentLoaded', function() {
  // Get form elements
  const form = document.getElementById('registration-form');
  const username = document.getElementById('username');
  const email = document.getElementById('email');
  const password = document.getElementById('password');
  const confirmPassword = document.getElementById('confirm-password');
  const interestCheckboxes = document.querySelectorAll('input[name="interests"]');
  const otherInterestGroup = document.getElementById('other-interest-group');
  const otherInterest = document.getElementById('other-interest');
  const formResult = document.getElementById('form-result');
  
  // Error message elements
  const usernameError = document.getElementById('username-error');
  const emailError = document.getElementById('email-error');
  const passwordError = document.getElementById('password-error');
  const confirmPasswordError = document.getElementById('confirm-password-error');
  const interestsError = document.getElementById('interests-error');
  
  // Show/hide "Other Interest" field based on checkbox
  interestCheckboxes.forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
      if (this.value === 'other' && this.checked) {
        otherInterestGroup.style.display = 'block';
      } else if (this.value === 'other' && !this.checked) {
        otherInterestGroup.style.display = 'none';
        otherInterest.value = '';
      }
    });
  });
  
  // Real-time validation
  username.addEventListener('input', validateUsername);
  email.addEventListener('input', validateEmail);
  password.addEventListener('input', validatePassword);
  confirmPassword.addEventListener('input', validateConfirmPassword);
  
  // Form submission
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validate all fields
    const isUsernameValid = validateUsername();
    const isEmailValid = validateEmail();
    const isPasswordValid = validatePassword();
    const isConfirmPasswordValid = validateConfirmPassword();
    const isInterestsValid = validateInterests();
    
    // If all validations pass
    if (isUsernameValid && isEmailValid && isPasswordValid && 
        isConfirmPasswordValid && isInterestsValid) {
      
      // Collect form data
      const formData = {
        username: username.value,
        email: email.value,
        password: password.value,
        interests: Array.from(interestCheckboxes)
          .filter(cb => cb.checked)
          .map(cb => cb.value === 'other' ? otherInterest.value : cb.value)
      };
      
      // Display success message
      formResult.textContent = 'Registration successful! Thank you for registering.';
      formResult.className = 'form-result success';
      formResult.style.display = 'block';
      
      // Log form data (in a real app, you would send this to a server)
      console.log('Form data:', formData);
      
      // Reset form after successful submission
      form.reset();
      otherInterestGroup.style.display = 'none';
      resetValidationStyles();
    } else {
      // Display error message
      formResult.textContent = 'Please fix the errors in the form.';
      formResult.className = 'form-result error';
      formResult.style.display = 'block';
    }
  });
  
  // Reset button handler
  document.getElementById('reset-button').addEventListener('click', function() {
    resetValidationStyles();
    otherInterestGroup.style.display = 'none';
    formResult.style.display = 'none';
  });
  
  // Validation functions
  function validateUsername() {
    const value = username.value.trim();
    
    if (value === '') {
      setError(username, usernameError, 'Username is required');
      return false;
    } else if (value.length < 3) {
      setError(username, usernameError, 'Username must be at least 3 characters');
      return false;
    } else {
      setSuccess(username, usernameError);
      return true;
    }
  }
  
  function validateEmail() {
    const value = email.value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (value === '') {
      setError(email, emailError, 'Email is required');
      return false;
    } else if (!emailRegex.test(value)) {
      setError(email, emailError, 'Please enter a valid email address');
      return false;
    } else {
      setSuccess(email, emailError);
      return true;
    }
  }
  
  function validatePassword() {
    const value = password.value;
    
    if (value === '') {
      setError(password, passwordError, 'Password is required');
      return false;
    } else if (value.length < 8) {
      setError(password, passwordError, 'Password must be at least 8 characters');
      return false;
    } else {
      setSuccess(password, passwordError);
      return true;
    }
  }
  
  function validateConfirmPassword() {
    const passwordValue = password.value;
    const confirmValue = confirmPassword.value;
    
    if (confirmValue === '') {
      setError(confirmPassword, confirmPasswordError, 'Please confirm your password');
      return false;
    } else if (confirmValue !== passwordValue) {
      setError(confirmPassword, confirmPasswordError, 'Passwords do not match');
      return false;
    } else {
      setSuccess(confirmPassword, confirmPasswordError);
      return true;
    }
  }
  
  function validateInterests() {
    const checkedInterests = Array.from(interestCheckboxes).filter(cb => cb.checked);
    
    if (checkedInterests.length === 0) {
      interestsError.textContent = 'Please select at least one interest';
      return false;
    } else {
      // Check if "Other" is selected but no value is provided
      const otherChecked = checkedInterests.some(cb => cb.value === 'other');
      
      if (otherChecked && otherInterest.value.trim() === '') {
        interestsError.textContent = 'Please specify your other interest';
        return false;
      } else {
        interestsError.textContent = '';
        return true;
      }
    }
  }
  
  // Helper functions
  function setError(input, errorElement, message) {
    input.classList.remove('valid');
    input.classList.add('invalid');
    errorElement.textContent = message;
  }
  
  function setSuccess(input, errorElement) {
    input.classList.remove('invalid');
    input.classList.add('valid');
    errorElement.textContent = '';
  }
  
  function resetValidationStyles() {
    // Reset all validation styles and error messages
    const inputs = form.querySelectorAll('input');
    const errorMessages = form.querySelectorAll('.error-message');
    
    inputs.forEach(input => {
      input.classList.remove('valid', 'invalid');
    });
    
    errorMessages.forEach(error => {
      error.textContent = '';
    });
  }
});
            </textarea>
        </div>
        
        <div id="result-tab3" class="tab-content">
            <div id="preview-container3" class="preview-container" style="min-height: 400px;">
                <!-- Preview will be shown here -->
            </div>
        </div>
        
        <button onclick="updatePreview3()">Update Preview</button>
        
        <script>
            function showTab3(tabName) {
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
                document.querySelector(`.tab[onclick="showTab3('${tabName}')"]`).classList.add('active');
            }
            
            function updatePreview3() {
                const htmlCode = document.getElementById('html-editor3').value;
                const cssCode = document.getElementById('css-editor3').value;
                const jsCode = document.getElementById('js-editor3').value;
                const previewContainer = document.getElementById('preview-container3');
                
                // Create a style element for the CSS
                const styleElement = document.createElement('style');
                styleElement.textContent = cssCode;
                
                // Set the HTML content
                previewContainer.innerHTML = htmlCode;
                
                // Add the style element
                previewContainer.appendChild(styleElement);
                
                // Create a script element for the JavaScript
                const scriptElement = document.createElement('script');
                scriptElement.textContent = jsCode;
                
                // Add the script element
                previewContainer.appendChild(scriptElement);
            }
            
            // Initialize preview when the page loads
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    updatePreview3();
                }, 500);
            });
        </script>
    </div>
    
    <div class="quiz-container">
        <h2>Knowledge Check</h2>
        
        <div class="quiz-question">
            1. Which of the following is NOT a way to integrate CSS with HTML?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> Inline CSS using the style attribute</label>
            <label><input type="radio" name="q1" value="b"> Internal CSS using the &lt;style&gt; element</label>
            <label><input type="radio" name="q1" value="c"> External CSS using the &lt;link&gt; element</label>
            <label><input type="radio" name="q1" value="d"> Dynamic CSS using the &lt;css&gt; element</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which JavaScript attribute should be used for scripts that need to be executed in order after the HTML is parsed?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> async</label>
            <label><input type="radio" name="q2" value="b"> defer</label>
            <label><input type="radio" name="q2" value="c"> type="module"</label>
            <label><input type="radio" name="q2" value="d"> load</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which method would you use to select all elements with the class "highlight" in JavaScript?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> document.getElementById('highlight')</label>
            <label><input type="radio" name="q3" value="b"> document.querySelector('.highlight')</label>
            <label><input type="radio" name="q3" value="c"> document.querySelectorAll('.highlight')</label>
            <label><input type="radio" name="q3" value="d"> document.getElementsById('highlight')</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. What is the principle of "separation of concerns" in web development?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> Using different developers for HTML, CSS, and JavaScript</label>
            <label><input type="radio" name="q4" value="b"> Separating HTML, CSS, and JavaScript into different files</label>
            <label><input type="radio" name="q4" value="c"> Using HTML for structure, CSS for presentation, and JavaScript for behavior</label>
            <label><input type="radio" name="q4" value="d"> Creating separate websites for desktop and mobile users</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. Which of the following is an example of progressive enhancement?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> Using the latest JavaScript frameworks regardless of browser support</label>
            <label><input type="radio" name="q5" value="b"> Starting with a basic HTML structure that works without JavaScript and enhancing it when JavaScript is available</label>
            <label><input type="radio" name="q5" value="c"> Using polyfills to support older browsers</label>
            <label><input type="radio" name="q5" value="d"> Creating separate mobile and desktop versions of a website</label>
        </div>
        <div id="feedback5" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'd',
                    q2: 'b',
                    q3: 'c',
                    q4: 'c',
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
            <button onclick="window.location.href='05_performance_optimization.php'">Previous Lesson: Performance Optimization</button>
        </div>
        <div>
            <button onclick="window.location.href='../index.html'">Back to Course Home</button>
        </div>
    </div>
</body>
</html>
