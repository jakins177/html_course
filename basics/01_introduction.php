<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction to HTML and Web Development</title>
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
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Introduction to HTML and Web Development</h1>
    
    <div class="lesson-container">
        <h2>What is HTML?</h2>
        <p>HTML (HyperText Markup Language) is the standard markup language used to create web pages. It describes the structure of a web page and consists of a series of elements that tell the browser how to display the content.</p>
        
        <p>HTML elements are represented by tags, written using angle brackets. For example, <code>&lt;p&gt;</code> represents a paragraph. Tags usually come in pairs like <code>&lt;p&gt;</code> and <code>&lt;/p&gt;</code>, where the first tag is the opening tag and the second tag is the closing tag (with a forward slash).</p>
        
        <div class="example">
            <h3>Example of HTML Code:</h3>
            <div class="code-block">
                &lt;!DOCTYPE html&gt;<br>
                &lt;html&gt;<br>
                &lt;head&gt;<br>
                &nbsp;&nbsp;&lt;title&gt;My First Web Page&lt;/title&gt;<br>
                &lt;/head&gt;<br>
                &lt;body&gt;<br>
                &nbsp;&nbsp;&lt;h1&gt;Hello, World!&lt;/h1&gt;<br>
                &nbsp;&nbsp;&lt;p&gt;This is my first web page.&lt;/p&gt;<br>
                &lt;/body&gt;<br>
                &lt;/html&gt;
            </div>
        </div>
        
        <h2>The Role of HTML in Web Development</h2>
        <p>HTML is one of the three core technologies of the World Wide Web, alongside CSS (Cascading Style Sheets) and JavaScript:</p>
        <ul>
            <li><strong>HTML</strong> provides the structure and content of web pages</li>
            <li><strong>CSS</strong> controls the presentation and layout of web pages</li>
            <li><strong>JavaScript</strong> adds interactivity and dynamic behavior to web pages</li>
        </ul>
        
        <p>Think of HTML as the skeleton of a web page, CSS as its appearance, and JavaScript as its behavior. Together, they create the complete web experience that users interact with.</p>
        
        <div class="note">
            <h3>Important Note:</h3>
            <p>HTML is not a programming language; it's a markup language. This means it uses tags to define elements within a document rather than using programming logic.</p>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Web Browsers and How They Render HTML</h2>
        <p>Web browsers are software applications that retrieve and display web pages. When you enter a URL or click a link, the browser sends a request to the web server, which responds by sending back HTML, CSS, and JavaScript files.</p>
        
        <p>The browser then processes these files in the following way:</p>
        <ol>
            <li>Parses the HTML to create the Document Object Model (DOM)</li>
            <li>Processes the CSS to create the CSS Object Model (CSSOM)</li>
            <li>Combines the DOM and CSSOM to create the render tree</li>
            <li>Computes the layout of each element</li>
            <li>Paints the pixels to the screen</li>
        </ol>
        
        <p>Different browsers may render the same HTML slightly differently, which is why cross-browser testing is important in web development.</p>
        
        <h3>Popular Web Browsers:</h3>
        <ul>
            <li>Google Chrome</li>
            <li>Mozilla Firefox</li>
            <li>Safari</li>
            <li>Microsoft Edge</li>
            <li>Opera</li>
        </ul>
    </div>
    
    <div class="lesson-container">
        <h2>Development Tools and Environment Setup</h2>
        <p>To start developing HTML, you only need two basic tools:</p>
        
        <h3>1. Text Editor</h3>
        <p>A text editor is used to write and edit HTML code. While you can use simple editors like Notepad (Windows) or TextEdit (Mac), specialized code editors offer helpful features like syntax highlighting, code completion, and error checking.</p>
        
        <p>Popular code editors for HTML development include:</p>
        <ul>
            <li>Visual Studio Code (free, cross-platform)</li>
            <li>Sublime Text (paid, cross-platform)</li>
            <li>Atom (free, cross-platform)</li>
            <li>Notepad++ (free, Windows)</li>
            <li>Brackets (free, cross-platform)</li>
        </ul>
        
        <h3>2. Web Browser</h3>
        <p>You'll need a web browser to view and test your HTML pages. Most modern browsers also include developer tools that help you inspect and debug your code.</p>
        
        <p>To access developer tools in most browsers, you can:</p>
        <ul>
            <li>Right-click on a web page and select "Inspect" or "Inspect Element"</li>
            <li>Use keyboard shortcuts: F12 or Ctrl+Shift+I (Windows/Linux) or Cmd+Option+I (Mac)</li>
        </ul>
        
        <div class="note">
            <h3>Getting Started Tip:</h3>
            <p>You don't need a web server to start learning HTML. You can create HTML files on your computer and open them directly in your browser using the "File > Open" menu or by dragging the file into the browser window.</p>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Create Your First HTML Document</h2>
        <p>Let's create a simple HTML document together. Try editing the code below and see the results in real-time:</p>
        
        <div>
            <textarea id="htmlEditor" rows="10" style="width: 100%; font-family: monospace; padding: 10px;"><!DOCTYPE html>
<html>
<head>
    <title>My First Web Page</title>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Hello, World!</h1>
    <p>This is my first web page.</p>
    <!-- Try adding more HTML elements here -->
</body>
</html></textarea>
            <button onclick="updatePreview()">Update Preview</button>
        </div>
        
        <h3>Preview:</h3>
        <iframe id="previewFrame" style="width: 100%; height: 200px; border: 1px solid #ddd; border-radius: 4px;"></iframe>
        
        <script>
            function updatePreview() {
                const htmlCode = document.getElementById('htmlEditor').value;
                const previewFrame = document.getElementById('previewFrame');
                const frameDoc = previewFrame.contentDocument || previewFrame.contentWindow.document;
                
                frameDoc.open();
                frameDoc.write(htmlCode);
                frameDoc.close();
            }
            
            // Initialize preview
            window.onload = function() {
                updatePreview();
            };
        </script>
    </div>
    
    <div class="quiz-container">
        <h2>Knowledge Check</h2>
        
        <div class="quiz-question">
            1. What does HTML stand for?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> Hyperlinks and Text Markup Language</label>
            <label><input type="radio" name="q1" value="b"> Home Tool Markup Language</label>
            <label><input type="radio" name="q1" value="c"> HyperText Markup Language</label>
            <label><input type="radio" name="q1" value="d"> High-level Text Management Language</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which of the following is NOT a core technology of the World Wide Web?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> HTML</label>
            <label><input type="radio" name="q2" value="b"> CSS</label>
            <label><input type="radio" name="q2" value="c"> JavaScript</label>
            <label><input type="radio" name="q2" value="d"> Python</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. What is the correct HTML element for the largest heading?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> &lt;heading&gt;</label>
            <label><input type="radio" name="q3" value="b"> &lt;h6&gt;</label>
            <label><input type="radio" name="q3" value="c"> &lt;head&gt;</label>
            <label><input type="radio" name="q3" value="d"> &lt;h1&gt;</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'c',
                    q2: 'd',
                    q3: 'd'
                };
                
                for (let i = 1; i <= 3; i++) {
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
            <button onclick="window.location.href='index.html'">Back to Course Home</button>
        </div>
        <div>
            <button onclick="window.location.href='02_document_structure.php'">Next Lesson: HTML Document Structure</button>
        </div>
    </div>
</body>
</html>
