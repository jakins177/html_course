<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Document Structure</title>
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
        .visual-diagram {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
        }
        .visual-diagram img {
            max-width: 100%;
            height: auto;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>HTML Document Structure</h1>
    
    <div class="lesson-container">
        <h2>The Anatomy of an HTML Document</h2>
        <p>Every HTML document follows a standard structure that helps browsers understand and render the content correctly. Let's explore the essential components of an HTML document:</p>
        
        <div class="example">
            <h3>Basic HTML Document Structure:</h3>
            <div class="code-block">
                &lt;!DOCTYPE html&gt;<br>
                &lt;html lang="en"&gt;<br>
                &lt;head&gt;<br>
                &nbsp;&nbsp;&lt;meta charset="UTF-8"&gt;<br>
                &nbsp;&nbsp;&lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;<br>
                &nbsp;&nbsp;&lt;title&gt;Document Title&lt;/title&gt;<br>
                &lt;/head&gt;<br>
                &lt;body&gt;<br>
                &nbsp;&nbsp;&lt;!-- Content goes here --&gt;<br>
                &nbsp;&nbsp;&lt;h1&gt;Hello, World!&lt;/h1&gt;<br>
                &nbsp;&nbsp;&lt;p&gt;This is a paragraph.&lt;/p&gt;<br>
                &lt;/body&gt;<br>
                &lt;/html&gt;
            </div>
        </div>
        
        <h2>Understanding Each Component</h2>
        
        <h3>1. DOCTYPE Declaration</h3>
        <p>The <code>&lt;!DOCTYPE html&gt;</code> declaration must be the very first thing in your HTML document, before the <code>&lt;html&gt;</code> tag. It tells the browser which version of HTML the page is using.</p>
        
        <div class="note">
            <p>The DOCTYPE declaration for HTML5 is simple: <code>&lt;!DOCTYPE html&gt;</code>. Older versions of HTML had more complex DOCTYPE declarations, but HTML5's declaration is clean and straightforward.</p>
        </div>
        
        <h3>2. HTML Element</h3>
        <p>The <code>&lt;html&gt;</code> element is the root element of an HTML page. All other elements must be descendants of this element. The <code>lang</code> attribute specifies the language of the document, which helps search engines and browsers.</p>
        
        <div class="example">
            <code>&lt;html lang="en"&gt;...&lt;/html&gt;</code>
        </div>
        
        <h3>3. Head Element</h3>
        <p>The <code>&lt;head&gt;</code> element contains meta-information about the document that isn't displayed on the page itself. This includes:</p>
        <ul>
            <li>Character encoding (<code>&lt;meta charset="UTF-8"&gt;</code>)</li>
            <li>Viewport settings for responsive design (<code>&lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;</code>)</li>
            <li>Page title (<code>&lt;title&gt;</code>)</li>
            <li>Links to external resources like CSS files (<code>&lt;link&gt;</code>)</li>
            <li>JavaScript code or links to JavaScript files (<code>&lt;script&gt;</code>)</li>
            <li>Other metadata about the page</li>
        </ul>
        
        <h3>4. Body Element</h3>
        <p>The <code>&lt;body&gt;</code> element contains all the content that is visible to users, such as text, images, links, and other elements. This is where you'll place most of your HTML code.</p>
    </div>
    
    <div class="lesson-container">
        <h2>Comments in HTML</h2>
        <p>HTML comments allow you to include notes in your code that are not displayed in the browser. They're useful for documenting your code or temporarily disabling parts of it.</p>
        
        <div class="example">
            <h3>HTML Comment Syntax:</h3>
            <div class="code-block">
                &lt;!-- This is a comment --&gt;<br><br>
                &lt;!-- <br>
                This is a multi-line comment<br>
                that spans several lines<br>
                --&gt;
            </div>
        </div>
        
        <div class="note">
            <h3>Important Note:</h3>
            <p>Comments are visible to anyone who views your page source code, so don't include sensitive information in comments.</p>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Nesting HTML Elements</h2>
        <p>HTML elements can be nested inside other elements, creating a hierarchical structure. This nesting must follow specific rules:</p>
        
        <ul>
            <li>Elements must be properly nested (closed in the reverse order they were opened)</li>
            <li>Some elements can only contain specific child elements</li>
            <li>Some elements cannot contain any other elements (empty elements)</li>
        </ul>
        
        <div class="example">
            <h3>Correct Nesting:</h3>
            <div class="code-block">
                &lt;div&gt;<br>
                &nbsp;&nbsp;&lt;p&gt;This is &lt;strong&gt;properly&lt;/strong&gt; nested.&lt;/p&gt;<br>
                &lt;/div&gt;
            </div>
            
            <h3>Incorrect Nesting:</h3>
            <div class="code-block">
                &lt;div&gt;<br>
                &nbsp;&nbsp;&lt;p&gt;This is &lt;strong&gt;improperly&lt;/p&gt;&lt;/strong&gt;<br>
                &lt;/div&gt;
            </div>
        </div>
        
        <div class="visual-diagram">
            <h3>Visual Representation of HTML Document Structure:</h3>
            <pre style="text-align: left; font-family: monospace;">
&lt;!DOCTYPE html&gt;
└── &lt;html&gt;
    ├── &lt;head&gt;
    │   ├── &lt;meta&gt;
    │   ├── &lt;meta&gt;
    │   └── &lt;title&gt;
    └── &lt;body&gt;
        ├── &lt;h1&gt;
        ├── &lt;p&gt;
        └── &lt;div&gt;
            ├── &lt;h2&gt;
            └── &lt;p&gt;
            </pre>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Fix the HTML Structure</h2>
        <p>The following HTML document has structural errors. Try to identify and fix them:</p>
        
        <div>
            <textarea id="htmlEditor" rows="12" style="width: 100%; font-family: monospace; padding: 10px;"><!DOCTYPE>
<html>
<head>
    <title>My Web Page</title>
    <p>This paragraph is in the wrong place.</p>
<body>
    <h1>Welcome to My Page</h1>
    <p>This is a paragraph with <strong>bold text.</p></strong>
    <div>
        <h2>This is a subheading
    </div>
</html></textarea>
            <button onclick="updatePreview()">Update Preview</button>
        </div>
        
        <h3>Preview:</h3>
        <iframe id="previewFrame" style="width: 100%; height: 200px; border: 1px solid #ddd; border-radius: 4px;"></iframe>
        
        <div class="note" style="margin-top: 20px;">
            <h3>Hint:</h3>
            <p>Look for:</p>
            <ul>
                <li>Missing or incomplete DOCTYPE declaration</li>
                <li>Elements in the wrong place</li>
                <li>Improperly nested tags</li>
                <li>Missing closing tags</li>
                <li>Missing body closing tag</li>
            </ul>
        </div>
        
        <button id="showSolution" style="margin-top: 15px;">Show Solution</button>
        <div id="solution" style="display: none; margin-top: 15px; padding: 15px; background-color: #f0f0f0; border-radius: 5px;">
            <h3>Correct Structure:</h3>
            <pre style="background-color: #2c3e50; color: #ecf0f1; padding: 15px; border-radius: 5px; overflow-x: auto;">
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;My Web Page&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Welcome to My Page&lt;/h1&gt;
    &lt;p&gt;This paragraph is in the wrong place.&lt;/p&gt;
    &lt;p&gt;This is a paragraph with &lt;strong&gt;bold text.&lt;/strong&gt;&lt;/p&gt;
    &lt;div&gt;
        &lt;h2&gt;This is a subheading&lt;/h2&gt;
    &lt;/div&gt;
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
            1. What must be the very first thing in an HTML5 document?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> &lt;html&gt; tag</label>
            <label><input type="radio" name="q1" value="b"> &lt;!DOCTYPE html&gt; declaration</label>
            <label><input type="radio" name="q1" value="c"> &lt;head&gt; tag</label>
            <label><input type="radio" name="q1" value="d"> &lt;body&gt; tag</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which HTML element contains meta-information about the document?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> &lt;meta&gt;</label>
            <label><input type="radio" name="q2" value="b"> &lt;body&gt;</label>
            <label><input type="radio" name="q2" value="c"> &lt;head&gt;</label>
            <label><input type="radio" name="q2" value="d"> &lt;title&gt;</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. What is the correct syntax for an HTML comment?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> // This is a comment</label>
            <label><input type="radio" name="q3" value="b"> /* This is a comment */</label>
            <label><input type="radio" name="q3" value="c"> &lt;!-- This is a comment --&gt;</label>
            <label><input type="radio" name="q3" value="d"> # This is a comment</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. Which attribute in the &lt;html&gt; tag specifies the language of the document?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> language</label>
            <label><input type="radio" name="q4" value="b"> lang</label>
            <label><input type="radio" name="q4" value="c"> locale</label>
            <label><input type="radio" name="q4" value="d"> tongue</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'b',
                    q2: 'c',
                    q3: 'c',
                    q4: 'b'
                };
                
                for (let i = 1; i <= 4; i++) {
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
            <button onclick="window.location.href='01_introduction.php'">Previous Lesson: Introduction to HTML</button>
        </div>
        <div>
            <button onclick="window.location.href='03_text_elements.php'">Next Lesson: Text Elements and Typography</button>
        </div>
    </div>
</body>
</html>
