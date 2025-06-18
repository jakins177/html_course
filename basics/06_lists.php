<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lists</title>
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
        .list-example {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .list-example h4 {
            margin-top: 0;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Lists</h1>
    
    <div class="lesson-container">
        <h2>Introduction to HTML Lists</h2>
        <p>Lists are an essential part of web content organization, allowing you to present information in a structured, easy-to-read format. HTML provides three main types of lists:</p>
        
        <ul>
            <li><strong>Ordered Lists</strong> - For items in a specific sequence or ranking</li>
            <li><strong>Unordered Lists</strong> - For items where order doesn't matter</li>
            <li><strong>Definition Lists</strong> - For term-definition pairs</li>
        </ul>
        
        <p>Lists help organize content, improve readability, and make information more accessible to users. They're also beneficial for SEO as they help search engines understand the structure of your content.</p>
    </div>
    
    <div class="lesson-container">
        <h2>Ordered Lists</h2>
        <p>Ordered lists (<code>&lt;ol&gt;</code>) are used when the sequence of items matters, such as step-by-step instructions, rankings, or chronological events. Each item in an ordered list is marked with a number or letter by default.</p>
        
        <div class="example">
            <h3>Basic Ordered List Syntax:</h3>
            <div class="code-block">
                &lt;ol&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;First item&lt;/li&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;Second item&lt;/li&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;Third item&lt;/li&gt;<br>
                &lt;/ol&gt;
            </div>
        </div>
        
        <div class="list-example">
            <h4>How it renders:</h4>
            <ol>
                <li>First item</li>
                <li>Second item</li>
                <li>Third item</li>
            </ol>
        </div>
        
        <h3>Ordered List Attributes</h3>
        <p>The <code>&lt;ol&gt;</code> element supports several attributes that modify how the list is displayed:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Attribute</th>
                <th>Description</th>
                <th>Example</th>
            </tr>
            <tr>
                <td><code>type</code></td>
                <td>Specifies the marker type</td>
                <td><code>type="A"</code> (uppercase letters)<br>
                    <code>type="a"</code> (lowercase letters)<br>
                    <code>type="I"</code> (uppercase Roman numerals)<br>
                    <code>type="i"</code> (lowercase Roman numerals)<br>
                    <code>type="1"</code> (numbers, default)</td>
            </tr>
            <tr>
                <td><code>start</code></td>
                <td>Specifies the starting value</td>
                <td><code>start="5"</code> (starts counting from 5)</td>
            </tr>
            <tr>
                <td><code>reversed</code></td>
                <td>Reverses the order of numbering</td>
                <td><code>reversed</code> (counts down instead of up)</td>
            </tr>
        </table>
        
        <div class="example">
            <h3>Ordered List with Attributes:</h3>
            <div class="code-block">
                &lt;ol type="A" start="3" reversed&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;This will be labeled C&lt;/li&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;This will be labeled B&lt;/li&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;This will be labeled A&lt;/li&gt;<br>
                &lt;/ol&gt;
            </div>
        </div>
        
        <div class="list-example">
            <h4>How it renders:</h4>
            <ol type="A" start="3" reversed>
                <li>This will be labeled C</li>
                <li>This will be labeled B</li>
                <li>This will be labeled A</li>
            </ol>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Unordered Lists</h2>
        <p>Unordered lists (<code>&lt;ul&gt;</code>) are used when the order of items doesn't matter. Each item is typically marked with a bullet point by default, though this can be changed with CSS.</p>
        
        <div class="example">
            <h3>Basic Unordered List Syntax:</h3>
            <div class="code-block">
                &lt;ul&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;Apple&lt;/li&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;Banana&lt;/li&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;Orange&lt;/li&gt;<br>
                &lt;/ul&gt;
            </div>
        </div>
        
        <div class="list-example">
            <h4>How it renders:</h4>
            <ul>
                <li>Apple</li>
                <li>Banana</li>
                <li>Orange</li>
            </ul>
        </div>
        
        <h3>Styling Unordered Lists with CSS</h3>
        <p>You can customize the appearance of unordered lists using CSS:</p>
        
        <div class="example">
            <h3>CSS for Unordered Lists:</h3>
            <div class="code-block">
                ul {<br>
                &nbsp;&nbsp;list-style-type: square; /* Changes bullet type */<br>
                }<br><br>
                
                ul.custom {<br>
                &nbsp;&nbsp;list-style-type: none; /* Removes bullets */<br>
                &nbsp;&nbsp;padding-left: 0; /* Removes default padding */<br>
                }<br><br>
                
                ul.custom li:before {<br>
                &nbsp;&nbsp;content: "→ "; /* Adds custom marker */<br>
                &nbsp;&nbsp;color: #3498db; /* Colors the marker */<br>
                }
            </div>
        </div>
        
        <div class="note">
            <h3>Common List Style Types:</h3>
            <ul>
                <li><code>disc</code> - Filled circle (default)</li>
                <li><code>circle</code> - Hollow circle</li>
                <li><code>square</code> - Filled square</li>
                <li><code>none</code> - No marker</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Definition Lists</h2>
        <p>Definition lists (<code>&lt;dl&gt;</code>) are used to display term-definition pairs, such as a glossary or a dictionary. They consist of three elements:</p>
        
        <ul>
            <li><code>&lt;dl&gt;</code> - The definition list container</li>
            <li><code>&lt;dt&gt;</code> - The term (definition term)</li>
            <li><code>&lt;dd&gt;</code> - The definition (definition description)</li>
        </ul>
        
        <div class="example">
            <h3>Basic Definition List Syntax:</h3>
            <div class="code-block">
                &lt;dl&gt;<br>
                &nbsp;&nbsp;&lt;dt&gt;HTML&lt;/dt&gt;<br>
                &nbsp;&nbsp;&lt;dd&gt;HyperText Markup Language, the standard language for creating web pages.&lt;/dd&gt;<br><br>
                
                &nbsp;&nbsp;&lt;dt&gt;CSS&lt;/dt&gt;<br>
                &nbsp;&nbsp;&lt;dd&gt;Cascading Style Sheets, used for styling web pages.&lt;/dd&gt;<br><br>
                
                &nbsp;&nbsp;&lt;dt&gt;JavaScript&lt;/dt&gt;<br>
                &nbsp;&nbsp;&lt;dd&gt;A programming language that enables interactive web pages.&lt;/dd&gt;<br>
                &lt;/dl&gt;
            </div>
        </div>
        
        <div class="list-example">
            <h4>How it renders:</h4>
            <dl>
                <dt>HTML</dt>
                <dd>HyperText Markup Language, the standard language for creating web pages.</dd>
                
                <dt>CSS</dt>
                <dd>Cascading Style Sheets, used for styling web pages.</dd>
                
                <dt>JavaScript</dt>
                <dd>A programming language that enables interactive web pages.</dd>
            </dl>
        </div>
        
        <div class="note">
            <h3>Definition List Uses:</h3>
            <ul>
                <li>Glossaries and dictionaries</li>
                <li>FAQ sections</li>
                <li>Metadata display (e.g., author, date, category)</li>
                <li>Product specifications</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Nested Lists</h2>
        <p>Lists can be nested inside other lists to create hierarchical structures. This is useful for displaying categories and subcategories, outlines, or multi-level menus.</p>
        
        <div class="example">
            <h3>Nested List Example:</h3>
            <div class="code-block">
                &lt;ul&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;Fruits<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Apples<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Red Delicious&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Granny Smith&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Bananas&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Oranges&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/ul&gt;<br>
                &nbsp;&nbsp;&lt;/li&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;Vegetables<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Carrots&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Broccoli&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/ul&gt;<br>
                &nbsp;&nbsp;&lt;/li&gt;<br>
                &lt;/ul&gt;
            </div>
        </div>
        
        <div class="list-example">
            <h4>How it renders:</h4>
            <ul>
                <li>Fruits
                    <ul>
                        <li>Apples
                            <ul>
                                <li>Red Delicious</li>
                                <li>Granny Smith</li>
                            </ul>
                        </li>
                        <li>Bananas</li>
                        <li>Oranges</li>
                    </ul>
                </li>
                <li>Vegetables
                    <ul>
                        <li>Carrots</li>
                        <li>Broccoli</li>
                    </ul>
                </li>
            </ul>
        </div>
        
        <h3>Mixing Different List Types</h3>
        <p>You can also mix different types of lists when nesting:</p>
        
        <div class="example">
            <h3>Mixed List Types Example:</h3>
            <div class="code-block">
                &lt;ol&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;First step<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Sub-item one&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Sub-item two&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/ul&gt;<br>
                &nbsp;&nbsp;&lt;/li&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;Second step&lt;/li&gt;<br>
                &nbsp;&nbsp;&lt;li&gt;Third step<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;ol type="a"&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Sub-step a&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;Sub-step b&lt;/li&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/ol&gt;<br>
                &nbsp;&nbsp;&lt;/li&gt;<br>
                &lt;/ol&gt;
            </div>
        </div>
        
        <div class="list-example">
            <h4>How it renders:</h4>
            <ol>
                <li>First step
                    <ul>
                        <li>Sub-item one</li>
                        <li>Sub-item two</li>
                    </ul>
                </li>
                <li>Second step</li>
                <li>Third step
                    <ol type="a">
                        <li>Sub-step a</li>
                        <li>Sub-step b</li>
                    </ol>
                </li>
            </ol>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>List Best Practices</h2>
        
        <h3>When to Use Each List Type</h3>
        <table class="comparison-table">
            <tr>
                <th>List Type</th>
                <th>Best Used For</th>
                <th>Examples</th>
            </tr>
            <tr>
                <td>Ordered Lists</td>
                <td>Sequential items, steps, rankings</td>
                <td>Instructions, recipes, top 10 lists</td>
            </tr>
            <tr>
                <td>Unordered Lists</td>
                <td>Non-sequential items, collections</td>
                <td>Features, benefits, navigation menus</td>
            </tr>
            <tr>
                <td>Definition Lists</td>
                <td>Term-definition pairs</td>
                <td>Glossaries, FAQs, metadata</td>
            </tr>
        </table>
        
        <h3>Accessibility Considerations</h3>
        <ul>
            <li>Use the appropriate list type for your content to provide semantic meaning</li>
            <li>Don't use lists purely for indentation or visual styling</li>
            <li>Keep list structures relatively simple for screen reader users</li>
            <li>Ensure sufficient color contrast for list markers</li>
            <li>Don't skip levels in nested lists</li>
        </ul>
        
        <h3>SEO Benefits of Lists</h3>
        <ul>
            <li>Lists help search engines understand the structure of your content</li>
            <li>Content in lists may appear in featured snippets in search results</li>
            <li>Lists improve readability, which can reduce bounce rates</li>
            <li>Lists make content more scannable for users</li>
        </ul>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Create a Recipe with Lists</h2>
        <p>Practice using different types of lists by creating a recipe page:</p>
        
        <div>
            <textarea id="htmlEditor" rows="20" style="width: 100%; font-family: monospace; padding: 10px;"><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Page</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        
        h1, h2 {
            color: #333;
        }
        
        /* Add more styles as needed */
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>My Favorite Recipe</h1>
    
    <!-- Create a recipe page using different types of lists:
    1. Use a definition list for the recipe information (prep time, cook time, servings)
    2. Use an unordered list for the ingredients
    3. Use an ordered list for the preparation steps
    4. Use a nested list somewhere in your recipe -->
    
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
                <li>A definition list (<code>&lt;dl&gt;</code>) for recipe metadata</li>
                <li>An unordered list (<code>&lt;ul&gt;</code>) for ingredients</li>
                <li>An ordered list (<code>&lt;ol&gt;</code>) for preparation steps</li>
                <li>At least one nested list (e.g., for ingredient categories or sub-steps)</li>
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
    &lt;title&gt;Recipe Page&lt;/title&gt;
    &lt;style&gt;
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        
        h1, h2 {
            color: #333;
        }
        
        .recipe-info {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .recipe-info dt {
            font-weight: bold;
            float: left;
            clear: left;
            width: 120px;
        }
        
        .recipe-info dd {
            margin-left: 130px;
            margin-bottom: 10px;
        }
        
        .ingredients {
            background-color: #f0f8ff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .instructions {
            background-color: #f0fff0;
            padding: 15px;
            border-radius: 5px;
        }
        
        .instructions li {
            margin-bottom: 10px;
        }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Classic Chocolate Chip Cookies&lt;/h1&gt;
    
    &lt;div class="recipe-info"&gt;
        &lt;h2&gt;Recipe Information&lt;/h2&gt;
        &lt;dl&gt;
            &lt;dt&gt;Prep Time:&lt;/dt&gt;
            &lt;dd&gt;15 minutes&lt;/dd&gt;
            
            &lt;dt&gt;Cook Time:&lt;/dt&gt;
            &lt;dd&gt;10-12 minutes&lt;/dd&gt;
            
            &lt;dt&gt;Total Time:&lt;/dt&gt;
            &lt;dd&gt;25-27 minutes&lt;/dd&gt;
            
            &lt;dt&gt;Servings:&lt;/dt&gt;
            &lt;dd&gt;24 cookies&lt;/dd&gt;
            
            &lt;dt&gt;Difficulty:&lt;/dt&gt;
            &lt;dd&gt;Easy&lt;/dd&gt;
        &lt;/dl&gt;
    &lt;/div&gt;
    
    &lt;div class="ingredients"&gt;
        &lt;h2&gt;Ingredients&lt;/h2&gt;
        &lt;ul&gt;
            &lt;li&gt;Dry Ingredients
                &lt;ul&gt;
                    &lt;li&gt;2 1/4 cups all-purpose flour&lt;/li&gt;
                    &lt;li&gt;1 teaspoon baking soda&lt;/li&gt;
                    &lt;li&gt;1 teaspoon salt&lt;/li&gt;
                &lt;/ul&gt;
            &lt;/li&gt;
            &lt;li&gt;Wet Ingredients
                &lt;ul&gt;
                    &lt;li&gt;1 cup (2 sticks) unsalted butter, softened&lt;/li&gt;
                    &lt;li&gt;3/4 cup granulated sugar&lt;/li&gt;
                    &lt;li&gt;3/4 cup packed brown sugar&lt;/li&gt;
                    &lt;li&gt;2 large eggs&lt;/li&gt;
                    &lt;li&gt;2 teaspoons vanilla extract&lt;/li&gt;
                &lt;/ul&gt;
            &lt;/li&gt;
            &lt;li&gt;Mix-ins
                &lt;ul&gt;
                    &lt;li&gt;2 cups semi-sweet chocolate chips&lt;/li&gt;
                    &lt;li&gt;1 cup chopped nuts (optional)&lt;/li&gt;
                &lt;/ul&gt;
            &lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;
    
    &lt;div class="instructions"&gt;
        &lt;h2&gt;Instructions&lt;/h2&gt;
        &lt;ol&gt;
            &lt;li&gt;Preheat oven to 375°F (190°C).&lt;/li&gt;
            &lt;li&gt;Prepare the dry ingredients:
                &lt;ol type="a"&gt;
                    &lt;li&gt;In a small bowl, combine flour, baking soda, and salt.&lt;/li&gt;
                    &lt;li&gt;Whisk together until well mixed.&lt;/li&gt;
                    &lt;li&gt;Set aside.&lt;/li&gt;
                &lt;/ol&gt;
            &lt;/li&gt;
            &lt;li&gt;In a large bowl, cream together the butter, granulated sugar, and brown sugar until light and fluffy.&lt;/li&gt;
            &lt;li&gt;Beat in eggs one at a time, then stir in the vanilla.&lt;/li&gt;
            &lt;li&gt;Gradually blend in the dry ingredients.&lt;/li&gt;
            &lt;li&gt;Fold in the chocolate chips (and nuts if using).&lt;/li&gt;
            &lt;li&gt;Drop by rounded tablespoon onto ungreased baking sheets.&lt;/li&gt;
            &lt;li&gt;Bake for 9 to 11 minutes or until golden brown.&lt;/li&gt;
            &lt;li&gt;Allow cookies to cool:
                &lt;ol type="a"&gt;
                    &lt;li&gt;Let stand on baking sheet for 2 minutes.&lt;/li&gt;
                    &lt;li&gt;Remove to wire racks to cool completely.&lt;/li&gt;
                &lt;/ol&gt;
            &lt;/li&gt;
            &lt;li&gt;Store in an airtight container.&lt;/li&gt;
        &lt;/ol&gt;
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
            1. Which HTML element is used to create an ordered list?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> &lt;ul&gt;</label>
            <label><input type="radio" name="q1" value="b"> &lt;ol&gt;</label>
            <label><input type="radio" name="q1" value="c"> &lt;dl&gt;</label>
            <label><input type="radio" name="q1" value="d"> &lt;li&gt;</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which attribute can be used to change the numbering type in an ordered list?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> style</label>
            <label><input type="radio" name="q2" value="b"> list-style</label>
            <label><input type="radio" name="q2" value="c"> type</label>
            <label><input type="radio" name="q2" value="d"> format</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. In a definition list, which element is used for the term being defined?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> &lt;dt&gt;</label>
            <label><input type="radio" name="q3" value="b"> &lt;dd&gt;</label>
            <label><input type="radio" name="q3" value="c"> &lt;dl&gt;</label>
            <label><input type="radio" name="q3" value="d"> &lt;term&gt;</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. Which of the following is NOT a valid value for the type attribute in an ordered list?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> A</label>
            <label><input type="radio" name="q4" value="b"> i</label>
            <label><input type="radio" name="q4" value="c"> 1</label>
            <label><input type="radio" name="q4" value="d"> bullet</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. What is the correct HTML element to use for each item within any type of list?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> &lt;item&gt;</label>
            <label><input type="radio" name="q5" value="b"> &lt;list-item&gt;</label>
            <label><input type="radio" name="q5" value="c"> &lt;li&gt;</label>
            <label><input type="radio" name="q5" value="d"> &lt;bullet&gt;</label>
        </div>
        <div id="feedback5" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'b',
                    q2: 'c',
                    q3: 'a',
                    q4: 'd',
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
            <button onclick="window.location.href='05_images.php'">Previous Lesson: Images and Multimedia</button>
        </div>
        <div>
            <button onclick="window.location.href='07_tables.php'">Next Lesson: Tables</button>
        </div>
    </div>
</body>
</html>
