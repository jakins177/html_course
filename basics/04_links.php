<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Links and Navigation</title>
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
        a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s;
        }
        a:hover {
            color: #2980b9;
            text-decoration: underline;
        }
        a:visited {
            color: #8e44ad;
        }
        a:active {
            color: #e74c3c;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Links and Navigation</h1>
    
    <div class="lesson-container">
        <h2>Creating Hyperlinks with Anchor Tags</h2>
        <p>Hyperlinks are one of the most fundamental features of the web, allowing users to navigate between pages and websites. In HTML, links are created using the anchor element <code>&lt;a&gt;</code>.</p>
        
        <div class="example">
            <h3>Basic Link Syntax:</h3>
            <div class="code-block">
                &lt;a href="url"&gt;Link Text&lt;/a&gt;
            </div>
        </div>
        
        <p>The <code>href</code> attribute (hypertext reference) specifies the destination of the link, while the text between the opening and closing tags is what users will see and click on.</p>
        
        <h3>Example Links:</h3>
        <ul>
            <li><code>&lt;a href="https://www.example.com"&gt;Visit Example.com&lt;/a&gt;</code> - Creates a link to an external website</li>
            <li><code>&lt;a href="about.html"&gt;About Us&lt;/a&gt;</code> - Creates a link to another page in the same directory</li>
            <li><code>&lt;a href="#section1"&gt;Jump to Section 1&lt;/a&gt;</code> - Creates a link to a section within the same page</li>
        </ul>
    </div>
    
    <div class="lesson-container">
        <h2>Relative vs. Absolute URLs</h2>
        <p>When creating links, you can use either relative or absolute URLs, each with its own advantages.</p>
        
        <h3>Absolute URLs</h3>
        <p>Absolute URLs provide the complete path to a resource, including the protocol (http/https), domain name, and path.</p>
        
        <div class="example">
            <h3>Absolute URL Examples:</h3>
            <div class="code-block">
                &lt;a href="https://www.example.com/products/item1.html"&gt;Product 1&lt;/a&gt;<br>
                &lt;a href="https://www.example.com"&gt;Example Website&lt;/a&gt;
            </div>
        </div>
        
        <h3>Relative URLs</h3>
        <p>Relative URLs specify the path to a resource relative to the current document's location. They don't include the protocol or domain name.</p>
        
        <div class="example">
            <h3>Relative URL Examples:</h3>
            <div class="code-block">
                &lt;a href="contact.html"&gt;Contact Us&lt;/a&gt; &lt;!-- Same directory --&gt;<br>
                &lt;a href="pages/about.html"&gt;About Us&lt;/a&gt; &lt;!-- Subdirectory --&gt;<br>
                &lt;a href="../index.html"&gt;Home&lt;/a&gt; &lt;!-- Parent directory --&gt;<br>
                &lt;a href="/"&gt;Root&lt;/a&gt; &lt;!-- Root of the website --&gt;
            </div>
        </div>
        
        <div class="note">
            <h3>When to Use Each Type:</h3>
            <ul>
                <li><strong>Absolute URLs:</strong> Use when linking to external websites or when the link needs to work regardless of where the HTML file is located.</li>
                <li><strong>Relative URLs:</strong> Use when linking to pages within your own website. They make your site more portable and easier to move to a different domain.</li>
            </ul>
        </div>
        
        <h3>URL Path Reference Guide:</h3>
        <table class="comparison-table">
            <tr>
                <th>Path</th>
                <th>Description</th>
                <th>Example</th>
            </tr>
            <tr>
                <td>file.html</td>
                <td>File in the same directory</td>
                <td><code>&lt;a href="contact.html"&gt;Contact&lt;/a&gt;</code></td>
            </tr>
            <tr>
                <td>folder/file.html</td>
                <td>File in a subdirectory</td>
                <td><code>&lt;a href="pages/about.html"&gt;About&lt;/a&gt;</code></td>
            </tr>
            <tr>
                <td>../file.html</td>
                <td>File in the parent directory</td>
                <td><code>&lt;a href="../index.html"&gt;Home&lt;/a&gt;</code></td>
            </tr>
            <tr>
                <td>../../file.html</td>
                <td>File two directories up</td>
                <td><code>&lt;a href="../../main.html"&gt;Main&lt;/a&gt;</code></td>
            </tr>
            <tr>
                <td>/file.html</td>
                <td>File from the root directory</td>
                <td><code>&lt;a href="/index.html"&gt;Home&lt;/a&gt;</code></td>
            </tr>
        </table>
    </div>
    
    <div class="lesson-container">
        <h2>Internal Page Links and Bookmarks</h2>
        <p>You can create links that jump to specific sections within the same page using IDs and anchor links. These are sometimes called "bookmarks" or "fragment identifiers".</p>
        
        <h3>Creating Internal Links:</h3>
        <ol>
            <li>Add an <code>id</code> attribute to the element you want to link to</li>
            <li>Create an anchor link with a hash (#) followed by the ID</li>
        </ol>
        
        <div class="example">
            <h3>Internal Link Example:</h3>
            <div class="code-block">
                &lt;!-- Step 1: Add an ID to the target element --&gt;<br>
                &lt;h2 id="section2"&gt;Section 2&lt;/h2&gt;<br><br>
                
                &lt;!-- Step 2: Create a link to that ID --&gt;<br>
                &lt;a href="#section2"&gt;Jump to Section 2&lt;/a&gt;
            </div>
        </div>
        
        <p>This is particularly useful for long pages where you want to help users navigate to specific sections quickly.</p>
        
        <h3>Table of Contents Example:</h3>
        <div class="code-block">
            &lt;h2&gt;Table of Contents&lt;/h2&gt;<br>
            &lt;ul&gt;<br>
            &nbsp;&nbsp;&lt;li&gt;&lt;a href="#introduction"&gt;Introduction&lt;/a&gt;&lt;/li&gt;<br>
            &nbsp;&nbsp;&lt;li&gt;&lt;a href="#chapter1"&gt;Chapter 1&lt;/a&gt;&lt;/li&gt;<br>
            &nbsp;&nbsp;&lt;li&gt;&lt;a href="#chapter2"&gt;Chapter 2&lt;/a&gt;&lt;/li&gt;<br>
            &nbsp;&nbsp;&lt;li&gt;&lt;a href="#conclusion"&gt;Conclusion&lt;/a&gt;&lt;/li&gt;<br>
            &lt;/ul&gt;<br><br>
            
            &lt;h2 id="introduction"&gt;Introduction&lt;/h2&gt;<br>
            &lt;!-- Content here --&gt;<br><br>
            
            &lt;h2 id="chapter1"&gt;Chapter 1&lt;/h2&gt;<br>
            &lt;!-- Content here --&gt;<br><br>
            
            &lt;h2 id="chapter2"&gt;Chapter 2&lt;/h2&gt;<br>
            &lt;!-- Content here --&gt;<br><br>
            
            &lt;h2 id="conclusion"&gt;Conclusion&lt;/h2&gt;<br>
            &lt;!-- Content here --&gt;
        </div>
        
        <div class="note">
            <h3>Linking to IDs on Other Pages:</h3>
            <p>You can also link to specific sections on other pages by combining the page URL with the fragment identifier:</p>
            <code>&lt;a href="page.html#section3"&gt;Go to Section 3 on Page&lt;/a&gt;</code>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Email and Telephone Links</h2>
        <p>HTML allows you to create special links that open the user's email client or initiate a phone call on mobile devices.</p>
        
        <h3>Email Links</h3>
        <p>Email links use the <code>mailto:</code> protocol in the <code>href</code> attribute:</p>
        
        <div class="example">
            <h3>Email Link Example:</h3>
            <div class="code-block">
                &lt;a href="mailto:contact@example.com"&gt;Send us an email&lt;/a&gt;
            </div>
        </div>
        
        <p>You can also add subject lines, CC recipients, and even body text:</p>
        
        <div class="code-block">
            &lt;a href="mailto:contact@example.com?subject=Website%20Inquiry&cc=support@example.com&body=Hello%2C%20I%20have%20a%20question%20about..."&gt;Contact Us&lt;/a&gt;
        </div>
        
        <div class="note">
            <p>Note that spaces and special characters in the subject and body must be URL-encoded (e.g., spaces become %20).</p>
        </div>
        
        <h3>Telephone Links</h3>
        <p>Telephone links use the <code>tel:</code> protocol and are especially useful for mobile users:</p>
        
        <div class="example">
            <h3>Telephone Link Example:</h3>
            <div class="code-block">
                &lt;a href="tel:+15551234567"&gt;Call us at (555) 123-4567&lt;/a&gt;
            </div>
        </div>
        
        <p>It's best practice to use the international format with the plus sign and country code.</p>
    </div>
    
    <div class="lesson-container">
        <h2>Link Attributes and Best Practices</h2>
        
        <h3>Important Link Attributes</h3>
        <table class="comparison-table">
            <tr>
                <th>Attribute</th>
                <th>Description</th>
                <th>Example</th>
            </tr>
            <tr>
                <td><code>href</code></td>
                <td>Specifies the URL of the page the link goes to</td>
                <td><code>href="https://example.com"</code></td>
            </tr>
            <tr>
                <td><code>target</code></td>
                <td>Specifies where to open the linked document</td>
                <td><code>target="_blank"</code> (opens in new tab)</td>
            </tr>
            <tr>
                <td><code>title</code></td>
                <td>Provides additional information about the link (shown as tooltip)</td>
                <td><code>title="Visit our homepage"</code></td>
            </tr>
            <tr>
                <td><code>download</code></td>
                <td>Specifies that the target will be downloaded when clicked</td>
                <td><code>download="filename.pdf"</code></td>
            </tr>
            <tr>
                <td><code>rel</code></td>
                <td>Specifies the relationship between the current and linked document</td>
                <td><code>rel="nofollow"</code> or <code>rel="noopener"</code></td>
            </tr>
        </table>
        
        <h3>Link Best Practices</h3>
        <ul>
            <li><strong>Use descriptive link text:</strong> Instead of "click here," use text that describes the destination.</li>
            <li><strong>Add <code>rel="noopener"</code> to external links:</strong> When using <code>target="_blank"</code>, add <code>rel="noopener"</code> for security reasons.</li>
            <li><strong>Make links accessible:</strong> Ensure links are distinguishable from regular text (usually through color and underline).</li>
            <li><strong>Check for broken links:</strong> Regularly test your links to ensure they still work.</li>
            <li><strong>Use the <code>title</code> attribute:</strong> Provide additional context when the link text might not be clear enough.</li>
        </ul>
        
        <div class="example">
            <h3>Good Link Example:</h3>
            <div class="code-block">
                &lt;a href="https://example.com/products" target="_blank" rel="noopener" title="View our complete product catalog"&gt;Browse our product catalog&lt;/a&gt;
            </div>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Create a Navigation Menu</h2>
        <p>Practice creating a simple navigation menu with different types of links:</p>
        
        <div>
            <textarea id="htmlEditor" rows="15" style="width: 100%; font-family: monospace; padding: 10px;"><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <style>
        /* Add some basic styling for the navigation */
        nav {
            background-color: #f0f0f0;
            padding: 10px;
        }
        /* Add your styles here */
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <header>
        <h1>My Website</h1>
        <!-- Create your navigation menu here -->
        <nav>
            <!-- Add links to home, about, services, and contact pages -->
            <!-- Also add an email link and a link to an external website -->
        </nav>
    </header>
    
    <main>
        <section id="welcome">
            <h2>Welcome to My Website</h2>
            <p>This is the homepage content.</p>
        </section>
        
        <!-- Add more sections with IDs that you can link to -->
    </main>
    
    <footer>
        <!-- Add a "Back to Top" link here -->
    </footer>
</body>
</html></textarea>
            <button onclick="updatePreview()">Update Preview</button>
        </div>
        
        <h3>Preview:</h3>
        <iframe id="previewFrame" style="width: 100%; height: 400px; border: 1px solid #ddd; border-radius: 4px;"></iframe>
        
        <div class="note" style="margin-top: 20px;">
            <h3>Hint:</h3>
            <p>Try to include:</p>
            <ul>
                <li>Relative links to other pages</li>
                <li>An internal link to a section on the same page</li>
                <li>An absolute link to an external website</li>
                <li>An email link</li>
                <li>A "Back to Top" link in the footer</li>
            </ul>
        </div>
        
        <button id="showSolution" style="margin-top: 15px;">Show Solution</button>
        <div id="solution" style="display: none; margin-top: 15px; padding: 15px; background-color: #f0f0f0; border-radius: 5px;">
            <h3>One Possible Solution:</h3>
            <pre style="background-color: #2c3e50; color: #ecf0f1; padding: 15px; border-radius: 5px; overflow-x: auto;">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;My Website&lt;/title&gt;
    &lt;style&gt;
        /* Add some basic styling for the navigation */
        nav {
            background-color: #f0f0f0;
            padding: 10px;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }
        nav a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        section {
            min-height: 300px;
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #ddd;
        }
        footer {
            background-color: #f0f0f0;
            padding: 10px;
            text-align: center;
        }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;header&gt;
        &lt;h1&gt;My Website&lt;/h1&gt;
        &lt;!-- Create your navigation menu here --&gt;
        &lt;nav&gt;
            &lt;ul&gt;
                &lt;li&gt;&lt;a href="index.html"&gt;Home&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href="about.html"&gt;About&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href="services.html"&gt;Services&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href="#contact"&gt;Contact&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href="mailto:info@example.com"&gt;Email Us&lt;/a&gt;&lt;/li&gt;
                &lt;li&gt;&lt;a href="https://www.example.com" target="_blank" rel="noopener"&gt;Visit Example.com&lt;/a&gt;&lt;/li&gt;
            &lt;/ul&gt;
        &lt;/nav&gt;
    &lt;/header&gt;
    
    &lt;main&gt;
        &lt;section id="welcome"&gt;
            &lt;h2&gt;Welcome to My Website&lt;/h2&gt;
            &lt;p&gt;This is the homepage content.&lt;/p&gt;
        &lt;/section&gt;
        
        &lt;section id="about-us"&gt;
            &lt;h2&gt;About Us&lt;/h2&gt;
            &lt;p&gt;Learn more about our company.&lt;/p&gt;
        &lt;/section&gt;
        
        &lt;section id="services"&gt;
            &lt;h2&gt;Our Services&lt;/h2&gt;
            &lt;p&gt;Explore the services we offer.&lt;/p&gt;
        &lt;/section&gt;
        
        &lt;section id="contact"&gt;
            &lt;h2&gt;Contact Us&lt;/h2&gt;
            &lt;p&gt;Get in touch with our team.&lt;/p&gt;
            &lt;p&gt;Phone: &lt;a href="tel:+15551234567"&gt;(555) 123-4567&lt;/a&gt;&lt;/p&gt;
        &lt;/section&gt;
    &lt;/main&gt;
    
    &lt;footer&gt;
        &lt;a href="#"&gt;Back to Top&lt;/a&gt;
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
            1. Which HTML element is used to create a hyperlink?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> &lt;link&gt;</label>
            <label><input type="radio" name="q1" value="b"> &lt;a&gt;</label>
            <label><input type="radio" name="q1" value="c"> &lt;href&gt;</label>
            <label><input type="radio" name="q1" value="d"> &lt;hyperlink&gt;</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which attribute is used to specify the URL in a hyperlink?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> src</label>
            <label><input type="radio" name="q2" value="b"> link</label>
            <label><input type="radio" name="q2" value="c"> url</label>
            <label><input type="radio" name="q2" value="d"> href</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which of the following is an example of a relative URL?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> https://www.example.com/about.html</label>
            <label><input type="radio" name="q3" value="b"> http://example.com</label>
            <label><input type="radio" name="q3" value="c"> about.html</label>
            <label><input type="radio" name="q3" value="d"> www.example.com</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. What is the correct way to create an email link?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> &lt;a email="info@example.com"&gt;Email Us&lt;/a&gt;</label>
            <label><input type="radio" name="q4" value="b"> &lt;a href="info@example.com"&gt;Email Us&lt;/a&gt;</label>
            <label><input type="radio" name="q4" value="c"> &lt;a href="mailto:info@example.com"&gt;Email Us&lt;/a&gt;</label>
            <label><input type="radio" name="q4" value="d"> &lt;mail href="info@example.com"&gt;Email Us&lt;/mail&gt;</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. Which attribute should be used to open a link in a new tab or window?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> target="_blank"</label>
            <label><input type="radio" name="q5" value="b"> target="_new"</label>
            <label><input type="radio" name="q5" value="c"> window="new"</label>
            <label><input type="radio" name="q5" value="d"> open="newtab"</label>
        </div>
        <div id="feedback5" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'b',
                    q2: 'd',
                    q3: 'c',
                    q4: 'c',
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
            <button onclick="window.location.href='03_text_elements.php'">Previous Lesson: Text Elements and Typography</button>
        </div>
        <div>
            <button onclick="window.location.href='05_images.php'">Next Lesson: Images and Multimedia</button>
        </div>
    </div>
</body>
</html>
