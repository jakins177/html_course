<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Elements and Typography</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2, h3, h4, h5, h6 {
            color: #2c3e50;
            margin-top: 1.5em;
            margin-bottom: 0.5em;
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
        hr {
            border: 0;
            height: 1px;
            background-color: #ddd;
            margin: 30px 0;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Text Elements and Typography</h1>
    
    <div class="lesson-container">
        <h2>Headings in HTML</h2>
        <p>HTML provides six levels of headings, from <code>&lt;h1&gt;</code> (the most important) to <code>&lt;h6&gt;</code> (the least important). Headings are used to structure your content and help both users and search engines understand the organization of your page.</p>
        
        <div class="example">
            <h3>Heading Examples:</h3>
            <div class="code-block">
                &lt;h1&gt;This is a Level 1 Heading&lt;/h1&gt;<br>
                &lt;h2&gt;This is a Level 2 Heading&lt;/h2&gt;<br>
                &lt;h3&gt;This is a Level 3 Heading&lt;/h3&gt;<br>
                &lt;h4&gt;This is a Level 4 Heading&lt;/h4&gt;<br>
                &lt;h5&gt;This is a Level 5 Heading&lt;/h5&gt;<br>
                &lt;h6&gt;This is a Level 6 Heading&lt;/h6&gt;
            </div>
        </div>
        
        <div class="note">
            <h3>Best Practices for Headings:</h3>
            <ul>
                <li>Use only one <code>&lt;h1&gt;</code> per page, typically for the main title</li>
                <li>Use headings in hierarchical order (don't skip levels)</li>
                <li>Don't use headings just for styling text (use CSS instead)</li>
                <li>Keep headings concise and descriptive</li>
            </ul>
        </div>
        
        <h3>Visual Representation of Headings:</h3>
        <h1 style="margin-top: 0;">This is a Level 1 Heading</h1>
        <h2>This is a Level 2 Heading</h2>
        <h3>This is a Level 3 Heading</h3>
        <h4>This is a Level 4 Heading</h4>
        <h5>This is a Level 5 Heading</h5>
        <h6>This is a Level 6 Heading</h6>
    </div>
    
    <div class="lesson-container">
        <h2>Paragraphs and Text Formatting</h2>
        
        <h3>Paragraphs</h3>
        <p>The <code>&lt;p&gt;</code> element defines a paragraph in HTML. Browsers automatically add some margin before and after each paragraph.</p>
        
        <div class="example">
            <h3>Paragraph Example:</h3>
            <div class="code-block">
                &lt;p&gt;This is a paragraph of text. HTML will automatically wrap the text and create a new line when needed.&lt;/p&gt;<br><br>
                &lt;p&gt;This is another paragraph. Notice how there's space between paragraphs.&lt;/p&gt;
            </div>
        </div>
        
        <h3>Line Breaks</h3>
        <p>The <code>&lt;br&gt;</code> element creates a line break within text. Unlike paragraphs, it doesn't add extra space between lines.</p>
        
        <div class="example">
            <h3>Line Break Example:</h3>
            <div class="code-block">
                &lt;p&gt;This is a line of text.&lt;br&gt;This text appears on a new line, but within the same paragraph.&lt;/p&gt;
            </div>
        </div>
        
        <h3>Horizontal Rules</h3>
        <p>The <code>&lt;hr&gt;</code> element creates a horizontal line (rule) that can be used to separate content sections.</p>
        
        <div class="example">
            <h3>Horizontal Rule Example:</h3>
            <div class="code-block">
                &lt;p&gt;This is some text above the horizontal rule.&lt;/p&gt;<br>
                &lt;hr&gt;<br>
                &lt;p&gt;This is some text below the horizontal rule.&lt;/p&gt;
            </div>
        </div>
        
        <p>Visual example of a horizontal rule:</p>
        <hr>
    </div>
    
    <div class="lesson-container">
        <h2>Text Formatting Elements</h2>
        <p>HTML provides several elements for formatting text to emphasize or highlight certain parts.</p>
        
        <h3>Bold and Strong Text</h3>
        <p>There are two ways to make text bold in HTML:</p>
        <ul>
            <li><code>&lt;b&gt;</code> - Bold text without extra semantic importance</li>
            <li><code>&lt;strong&gt;</code> - Strong emphasis with semantic importance (preferred)</li>
        </ul>
        
        <div class="example">
            <h3>Bold and Strong Example:</h3>
            <div class="code-block">
                &lt;p&gt;This is &lt;b&gt;bold text&lt;/b&gt; using the b tag.&lt;/p&gt;<br>
                &lt;p&gt;This is &lt;strong&gt;important text&lt;/strong&gt; using the strong tag.&lt;/p&gt;
            </div>
        </div>
        
        <p>Visual example: This is <b>bold text</b> using the b tag.</p>
        <p>Visual example: This is <strong>important text</strong> using the strong tag.</p>
        
        <h3>Italic and Emphasized Text</h3>
        <p>Similarly, there are two ways to italicize text:</p>
        <ul>
            <li><code>&lt;i&gt;</code> - Italic text without extra semantic importance</li>
            <li><code>&lt;em&gt;</code> - Emphasized text with semantic importance (preferred)</li>
        </ul>
        
        <div class="example">
            <h3>Italic and Emphasis Example:</h3>
            <div class="code-block">
                &lt;p&gt;This is &lt;i&gt;italic text&lt;/i&gt; using the i tag.&lt;/p&gt;<br>
                &lt;p&gt;This is &lt;em&gt;emphasized text&lt;/em&gt; using the em tag.&lt;/p&gt;
            </div>
        </div>
        
        <p>Visual example: This is <i>italic text</i> using the i tag.</p>
        <p>Visual example: This is <em>emphasized text</em> using the em tag.</p>
        
        <div class="note">
            <h3>Semantic HTML:</h3>
            <p>It's generally better to use <code>&lt;strong&gt;</code> and <code>&lt;em&gt;</code> instead of <code>&lt;b&gt;</code> and <code>&lt;i&gt;</code> because they convey meaning (semantics) rather than just visual styling. This helps with accessibility and SEO.</p>
        </div>
        
        <h3>Other Text Formatting Elements</h3>
        
        <table class="comparison-table">
            <tr>
                <th>Element</th>
                <th>Description</th>
                <th>Example</th>
            </tr>
            <tr>
                <td><code>&lt;mark&gt;</code></td>
                <td>Highlighted text</td>
                <td><mark>Marked text</mark></td>
            </tr>
            <tr>
                <td><code>&lt;del&gt;</code></td>
                <td>Deleted text (strikethrough)</td>
                <td><del>Deleted text</del></td>
            </tr>
            <tr>
                <td><code>&lt;ins&gt;</code></td>
                <td>Inserted text (underlined)</td>
                <td><ins>Inserted text</ins></td>
            </tr>
            <tr>
                <td><code>&lt;sub&gt;</code></td>
                <td>Subscript text</td>
                <td>H<sub>2</sub>O</td>
            </tr>
            <tr>
                <td><code>&lt;sup&gt;</code></td>
                <td>Superscript text</td>
                <td>2<sup>3</sup> = 8</td>
            </tr>
            <tr>
                <td><code>&lt;small&gt;</code></td>
                <td>Smaller text</td>
                <td><small>Small text</small></td>
            </tr>
            <tr>
                <td><code>&lt;code&gt;</code></td>
                <td>Computer code text</td>
                <td><code>code text</code></td>
            </tr>
            <tr>
                <td><code>&lt;pre&gt;</code></td>
                <td>Preformatted text (preserves spaces and line breaks)</td>
                <td><pre>Preformatted
  text with
    spacing</pre></td>
            </tr>
        </table>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Format a Recipe</h2>
        <p>Use your HTML text formatting skills to improve this plain recipe text. Add appropriate headings, paragraphs, and text formatting:</p>
        
        <div>
            <textarea id="htmlEditor" rows="15" style="width: 100%; font-family: monospace; padding: 10px;">Chocolate Chip Cookies

Classic homemade chocolate chip cookies that are soft, chewy, and loaded with chocolate chips!

Ingredients:
2 1/4 cups all-purpose flour
1/2 teaspoon baking soda
1 cup unsalted butter, room temperature
1/2 cup granulated sugar
1 cup packed brown sugar
1 teaspoon salt
2 teaspoons vanilla extract
2 large eggs
2 cups semi-sweet chocolate chips

Instructions:
Preheat oven to 350°F (175°C).
Sift together the flour and baking soda, set aside.
In a large bowl, cream together the butter, white sugar, and brown sugar until light and fluffy.
Beat in the eggs one at a time, then stir in the vanilla.
Gradually blend in the sifted ingredients.
Stir in the chocolate chips.
Drop by rounded tablespoon onto ungreased cookie sheets.
Bake for 9 to 11 minutes or until golden brown.
Let stand for 2 minutes, then remove to cool on wire racks.</textarea>
            <button onclick="updatePreview()">Update Preview</button>
        </div>
        
        <h3>Preview:</h3>
        <iframe id="previewFrame" style="width: 100%; height: 400px; border: 1px solid #ddd; border-radius: 4px;"></iframe>
        
        <div class="note" style="margin-top: 20px;">
            <h3>Hint:</h3>
            <p>Consider using:</p>
            <ul>
                <li><code>&lt;h1&gt;</code> for the recipe title</li>
                <li><code>&lt;h2&gt;</code> for section headings (Ingredients, Instructions)</li>
                <li><code>&lt;p&gt;</code> for the description</li>
                <li><code>&lt;strong&gt;</code> or <code>&lt;em&gt;</code> for emphasis</li>
                <li><code>&lt;br&gt;</code> for line breaks where needed</li>
            </ul>
        </div>
        
        <button id="showSolution" style="margin-top: 15px;">Show Solution</button>
        <div id="solution" style="display: none; margin-top: 15px; padding: 15px; background-color: #f0f0f0; border-radius: 5px;">
            <h3>One Possible Solution:</h3>
            <pre style="background-color: #2c3e50; color: #ecf0f1; padding: 15px; border-radius: 5px; overflow-x: auto;">
&lt;h1&gt;Chocolate Chip Cookies&lt;/h1&gt;

&lt;p&gt;&lt;em&gt;Classic homemade chocolate chip cookies that are soft, chewy, and loaded with chocolate chips!&lt;/em&gt;&lt;/p&gt;

&lt;h2&gt;Ingredients:&lt;/h2&gt;
&lt;p&gt;
2 1/4 cups all-purpose flour&lt;br&gt;
1/2 teaspoon baking soda&lt;br&gt;
1 cup unsalted butter, room temperature&lt;br&gt;
1/2 cup granulated sugar&lt;br&gt;
1 cup packed brown sugar&lt;br&gt;
1 teaspoon salt&lt;br&gt;
2 teaspoons vanilla extract&lt;br&gt;
2 large eggs&lt;br&gt;
2 cups semi-sweet chocolate chips
&lt;/p&gt;

&lt;h2&gt;Instructions:&lt;/h2&gt;
&lt;p&gt;
1. &lt;strong&gt;Preheat&lt;/strong&gt; oven to 350°F (175°C).&lt;br&gt;
2. Sift together the flour and baking soda, set aside.&lt;br&gt;
3. In a large bowl, cream together the butter, white sugar, and brown sugar until light and fluffy.&lt;br&gt;
4. Beat in the eggs one at a time, then stir in the vanilla.&lt;br&gt;
5. Gradually blend in the sifted ingredients.&lt;br&gt;
6. Stir in the chocolate chips.&lt;br&gt;
7. Drop by rounded tablespoon onto ungreased cookie sheets.&lt;br&gt;
8. &lt;strong&gt;Bake for 9 to 11 minutes&lt;/strong&gt; or until golden brown.&lt;br&gt;
9. Let stand for 2 minutes, then remove to cool on wire racks.
&lt;/p&gt;
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
            1. Which heading tag represents the highest level of importance?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> &lt;h6&gt;</label>
            <label><input type="radio" name="q1" value="b"> &lt;h3&gt;</label>
            <label><input type="radio" name="q1" value="c"> &lt;h1&gt;</label>
            <label><input type="radio" name="q1" value="d"> &lt;header&gt;</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which element should you use for text that needs to be emphasized with semantic importance?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> &lt;i&gt;</label>
            <label><input type="radio" name="q2" value="b"> &lt;em&gt;</label>
            <label><input type="radio" name="q2" value="c"> &lt;italic&gt;</label>
            <label><input type="radio" name="q2" value="d"> &lt;emphasis&gt;</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which HTML element creates a line break?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> &lt;lb&gt;</label>
            <label><input type="radio" name="q3" value="b"> &lt;break&gt;</label>
            <label><input type="radio" name="q3" value="c"> &lt;newline&gt;</label>
            <label><input type="radio" name="q3" value="d"> &lt;br&gt;</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. Which element would you use to mark deleted text?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> &lt;strike&gt;</label>
            <label><input type="radio" name="q4" value="b"> &lt;s&gt;</label>
            <label><input type="radio" name="q4" value="c"> &lt;del&gt;</label>
            <label><input type="radio" name="q4" value="d"> &lt;remove&gt;</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'c',
                    q2: 'b',
                    q3: 'd',
                    q4: 'c'
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
            <button onclick="window.location.href='02_document_structure.php'">Previous Lesson: HTML Document Structure</button>
        </div>
        <div>
            <button onclick="window.location.href='04_links.php'">Next Lesson: Links and Navigation</button>
        </div>
    </div>
</body>
</html>
