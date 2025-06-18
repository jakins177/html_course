<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Entities and Special Characters</title>
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
        
        /* Character entity display styles */
        .entity-display {
            font-size: 24px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            margin: 10px 0;
            text-align: center;
        }
        .entity-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 10px;
            margin: 20px 0;
        }
        .entity-item {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
        }
        .entity-char {
            font-size: 24px;
            display: block;
            margin-bottom: 5px;
        }
        .entity-code {
            font-family: monospace;
            font-size: 12px;
            color: #666;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Character Entities and Special Characters</h1>
    
    <div class="lesson-container">
        <h2>Introduction to Character Entities</h2>
        <p>Character entities are special codes used in HTML to display characters that might otherwise be interpreted as HTML markup or that aren't easily typed on a keyboard. They allow you to include special characters, symbols, and even invisible characters in your web pages.</p>
        
        <div class="example">
            <h3>Why Use Character Entities?</h3>
            <ul>
                <li><strong>Reserved Characters</strong> - Some characters like <code>&lt;</code>, <code>&gt;</code>, and <code>&amp;</code> have special meaning in HTML and need to be escaped</li>
                <li><strong>Special Symbols</strong> - Characters like copyright (©), trademark (™), or currency symbols (€, £, ¥)</li>
                <li><strong>Accented Characters</strong> - Characters used in languages other than English (é, ñ, ü)</li>
                <li><strong>Mathematical Symbols</strong> - Symbols like ±, ÷, ×, ≤, ≥</li>
                <li><strong>Invisible Characters</strong> - Non-breaking spaces, zero-width spaces</li>
            </ul>
        </div>
        
        <h3>Character Entity Formats</h3>
        <p>There are three ways to represent character entities in HTML:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Format</th>
                <th>Description</th>
                <th>Example</th>
                <th>Result</th>
            </tr>
            <tr>
                <td>Named Entity</td>
                <td>Uses a descriptive name</td>
                <td><code>&amp;copy;</code></td>
                <td>&copy;</td>
            </tr>
            <tr>
                <td>Decimal Entity</td>
                <td>Uses the decimal Unicode code point</td>
                <td><code>&amp;#169;</code></td>
                <td>&#169;</td>
            </tr>
            <tr>
                <td>Hexadecimal Entity</td>
                <td>Uses the hexadecimal Unicode code point</td>
                <td><code>&amp;#xA9;</code></td>
                <td>&#xA9;</td>
            </tr>
        </table>
        
        <div class="note">
            <h3>Important Note:</h3>
            <p>All character entities start with an ampersand (&amp;) and end with a semicolon (;). Named entities are case-sensitive and must be written exactly as specified.</p>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Essential Character Entities</h2>
        <p>Let's explore the most commonly used character entities in HTML:</p>
        
        <h3>Reserved Characters</h3>
        <p>These characters have special meaning in HTML and must be escaped when used as content:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Character</th>
                <th>Named Entity</th>
                <th>Numeric Entity</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>&lt;</td>
                <td><code>&amp;lt;</code></td>
                <td><code>&amp;#60;</code></td>
                <td>Less than sign</td>
            </tr>
            <tr>
                <td>&gt;</td>
                <td><code>&amp;gt;</code></td>
                <td><code>&amp;#62;</code></td>
                <td>Greater than sign</td>
            </tr>
            <tr>
                <td>&amp;</td>
                <td><code>&amp;amp;</code></td>
                <td><code>&amp;#38;</code></td>
                <td>Ampersand</td>
            </tr>
            <tr>
                <td>&quot;</td>
                <td><code>&amp;quot;</code></td>
                <td><code>&amp;#34;</code></td>
                <td>Double quotation mark</td>
            </tr>
            <tr>
                <td>'</td>
                <td><code>&amp;apos;</code></td>
                <td><code>&amp;#39;</code></td>
                <td>Single quotation mark (apostrophe)</td>
            </tr>
        </table>
        
        <div class="example">
            <h3>Example of Reserved Characters:</h3>
            <div class="code-block">
                &lt;p&gt;In HTML, tags are enclosed in &amp;lt;angle brackets&amp;gt;.&lt;/p&gt;<br>
                &lt;p&gt;To create a link, use the &amp;lt;a&amp;gt; tag with an &amp;amp;href attribute.&lt;/p&gt;
            </div>
            <p>Renders as:</p>
            <div class="entity-display">
                In HTML, tags are enclosed in &lt;angle brackets&gt;.<br>
                To create a link, use the &lt;a&gt; tag with an &amp;href attribute.
            </div>
        </div>
        
        <h3>Space Characters</h3>
        <p>HTML collapses multiple spaces into a single space. To add extra spaces, you need to use special space entities:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Character</th>
                <th>Named Entity</th>
                <th>Numeric Entity</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>(space)</td>
                <td><code>&amp;nbsp;</code></td>
                <td><code>&amp;#160;</code></td>
                <td>Non-breaking space</td>
            </tr>
            <tr>
                <td> </td>
                <td><code>&amp;ensp;</code></td>
                <td><code>&amp;#8194;</code></td>
                <td>En space (width of letter 'n')</td>
            </tr>
            <tr>
                <td> </td>
                <td><code>&amp;emsp;</code></td>
                <td><code>&amp;#8195;</code></td>
                <td>Em space (width of letter 'm')</td>
            </tr>
            <tr>
                <td> </td>
                <td><code>&amp;thinsp;</code></td>
                <td><code>&amp;#8201;</code></td>
                <td>Thin space</td>
            </tr>
        </table>
        
        <div class="example">
            <h3>Example of Space Characters:</h3>
            <div class="code-block">
                &lt;p&gt;Regular spaces:&nbsp;Multiple&nbsp;&nbsp;&nbsp;spaces&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;collapse.&lt;/p&gt;<br>
                &lt;p&gt;Non-breaking spaces: Multiple&amp;nbsp;&amp;nbsp;&amp;nbsp;spaces&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;preserved.&lt;/p&gt;<br>
                &lt;p&gt;Different spaces: Text&amp;nbsp;with&amp;ensp;different&amp;emsp;width&amp;thinsp;spaces.&lt;/p&gt;
            </div>
            <p>Renders as:</p>
            <div class="entity-display">
                Regular spaces: Multiple   spaces     collapse.<br>
                Non-breaking spaces: Multiple&nbsp;&nbsp;&nbsp;spaces&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;preserved.<br>
                Different spaces: Text&nbsp;with&ensp;different&emsp;width&thinsp;spaces.
            </div>
        </div>
        
        <div class="note">
            <h3>Non-breaking Space Usage:</h3>
            <p>The non-breaking space (<code>&amp;nbsp;</code>) has two main purposes:</p>
            <ol>
                <li>Adding extra spaces that won't collapse</li>
                <li>Preventing line breaks between words (e.g., keeping "100&nbsp;km" together)</li>
            </ol>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Common Symbols and Special Characters</h2>
        
        <h3>Currency Symbols</h3>
        <div class="entity-grid">
            <div class="entity-item">
                <span class="entity-char">$</span>
                <span class="entity-code">&amp;#36;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">€</span>
                <span class="entity-code">&amp;euro;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">£</span>
                <span class="entity-code">&amp;pound;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">¥</span>
                <span class="entity-code">&amp;yen;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">₹</span>
                <span class="entity-code">&amp;#8377;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">¢</span>
                <span class="entity-code">&amp;cent;</span>
            </div>
        </div>
        
        <h3>Mathematical Symbols</h3>
        <div class="entity-grid">
            <div class="entity-item">
                <span class="entity-char">±</span>
                <span class="entity-code">&amp;plusmn;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">×</span>
                <span class="entity-code">&amp;times;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">÷</span>
                <span class="entity-code">&amp;divide;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">≠</span>
                <span class="entity-code">&amp;ne;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">≤</span>
                <span class="entity-code">&amp;le;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">≥</span>
                <span class="entity-code">&amp;ge;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">∞</span>
                <span class="entity-code">&amp;infin;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">√</span>
                <span class="entity-code">&amp;radic;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">∑</span>
                <span class="entity-code">&amp;sum;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">π</span>
                <span class="entity-code">&amp;pi;</span>
            </div>
        </div>
        
        <h3>Arrows and Directional Symbols</h3>
        <div class="entity-grid">
            <div class="entity-item">
                <span class="entity-char">←</span>
                <span class="entity-code">&amp;larr;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">→</span>
                <span class="entity-code">&amp;rarr;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">↑</span>
                <span class="entity-code">&amp;uarr;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">↓</span>
                <span class="entity-code">&amp;darr;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">↔</span>
                <span class="entity-code">&amp;harr;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">⇒</span>
                <span class="entity-code">&amp;rArr;</span>
            </div>
        </div>
        
        <h3>Intellectual Property and Legal Symbols</h3>
        <div class="entity-grid">
            <div class="entity-item">
                <span class="entity-char">©</span>
                <span class="entity-code">&amp;copy;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">®</span>
                <span class="entity-code">&amp;reg;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">™</span>
                <span class="entity-code">&amp;trade;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">§</span>
                <span class="entity-code">&amp;sect;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">¶</span>
                <span class="entity-code">&amp;para;</span>
            </div>
        </div>
        
        <h3>Miscellaneous Symbols</h3>
        <div class="entity-grid">
            <div class="entity-item">
                <span class="entity-char">•</span>
                <span class="entity-code">&amp;bull;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">…</span>
                <span class="entity-code">&amp;hellip;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">♠</span>
                <span class="entity-code">&amp;spades;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">♣</span>
                <span class="entity-code">&amp;clubs;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">♥</span>
                <span class="entity-code">&amp;hearts;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">♦</span>
                <span class="entity-code">&amp;diams;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">★</span>
                <span class="entity-code">&amp;#9733;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">☆</span>
                <span class="entity-code">&amp;#9734;</span>
            </div>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Accented Characters and Language Support</h2>
        <p>HTML character entities allow you to display accented characters and special letters used in various languages.</p>
        
        <h3>Common Accented Characters</h3>
        <div class="entity-grid">
            <div class="entity-item">
                <span class="entity-char">á</span>
                <span class="entity-code">&amp;aacute;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">à</span>
                <span class="entity-code">&amp;agrave;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">â</span>
                <span class="entity-code">&amp;acirc;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ä</span>
                <span class="entity-code">&amp;auml;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ã</span>
                <span class="entity-code">&amp;atilde;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">å</span>
                <span class="entity-code">&amp;aring;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">é</span>
                <span class="entity-code">&amp;eacute;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">è</span>
                <span class="entity-code">&amp;egrave;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ê</span>
                <span class="entity-code">&amp;ecirc;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ë</span>
                <span class="entity-code">&amp;euml;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">í</span>
                <span class="entity-code">&amp;iacute;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ì</span>
                <span class="entity-code">&amp;igrave;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">î</span>
                <span class="entity-code">&amp;icirc;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ï</span>
                <span class="entity-code">&amp;iuml;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ñ</span>
                <span class="entity-code">&amp;ntilde;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ó</span>
                <span class="entity-code">&amp;oacute;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ò</span>
                <span class="entity-code">&amp;ograve;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ô</span>
                <span class="entity-code">&amp;ocirc;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ö</span>
                <span class="entity-code">&amp;ouml;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">õ</span>
                <span class="entity-code">&amp;otilde;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ú</span>
                <span class="entity-code">&amp;uacute;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ù</span>
                <span class="entity-code">&amp;ugrave;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">û</span>
                <span class="entity-code">&amp;ucirc;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ü</span>
                <span class="entity-code">&amp;uuml;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ç</span>
                <span class="entity-code">&amp;ccedil;</span>
            </div>
            <div class="entity-item">
                <span class="entity-char">ß</span>
                <span class="entity-code">&amp;szlig;</span>
            </div>
        </div>
        
        <div class="example">
            <h3>Examples in Different Languages:</h3>
            <div class="entity-display">
                French: Voilà où j'ai été élevé.<br>
                Spanish: ¿Cómo estás? Muy bien, gracias.<br>
                German: Ich möchte ein Stück Apfelkuchen.<br>
                Portuguese: Não entendo português.
            </div>
        </div>
        
        <div class="note">
            <h3>Modern Approach to Language Support:</h3>
            <p>While character entities are still useful, modern web development typically uses UTF-8 encoding, which allows direct input of special characters without entities. The most important steps for proper language support are:</p>
            <ol>
                <li>Set the document's character encoding to UTF-8: <code>&lt;meta charset="UTF-8"&gt;</code></li>
                <li>Specify the language of your document: <code>&lt;html lang="fr"&gt;</code></li>
                <li>Use the appropriate keyboard input or character map to insert special characters directly</li>
            </ol>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Practical Uses of Character Entities</h2>
        
        <h3>Displaying Code Examples</h3>
        <p>When showing HTML code examples, you need to escape the angle brackets and other special characters:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;pre&gt;<br>
                &amp;lt;div class="container"&amp;gt;<br>
                &amp;nbsp;&amp;nbsp;&amp;lt;h1&amp;gt;Hello, World!&amp;lt;/h1&amp;gt;<br>
                &amp;nbsp;&amp;nbsp;&amp;lt;p&amp;gt;This is a paragraph.&amp;lt;/p&amp;gt;<br>
                &amp;lt;/div&amp;gt;<br>
                &lt;/pre&gt;
            </div>
            <p>Renders as:</p>
            <pre style="background-color: #f5f5f5; padding: 10px; border-radius: 5px;">
&lt;div class="container"&gt;
  &lt;h1&gt;Hello, World!&lt;/h1&gt;
  &lt;p&gt;This is a paragraph.&lt;/p&gt;
&lt;/div&gt;
            </pre>
        </div>
        
        <h3>Preventing Line Breaks</h3>
        <p>Use non-breaking spaces to keep related words together:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;p&gt;The room is 10&amp;nbsp;m&amp;nbsp;×&amp;nbsp;15&amp;nbsp;m.&lt;/p&gt;<br>
                &lt;p&gt;Call us at 555&amp;nbsp;123&amp;nbsp;4567.&lt;/p&gt;
            </div>
            <p>This ensures that measurements and phone numbers stay together on the same line.</p>
        </div>
        
        <h3>Creating Special Layouts</h3>
        <p>Character entities can be used for simple layouts and formatting:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;p&gt;Menu Items:&lt;/p&gt;<br>
                &lt;p&gt;Burger &amp;emsp;&amp;emsp; $10.99&lt;/p&gt;<br>
                &lt;p&gt;Pizza &amp;emsp;&amp;emsp;&amp;nbsp; $12.99&lt;/p&gt;<br>
                &lt;p&gt;Salad &amp;emsp;&amp;emsp;&amp;nbsp; $8.99&lt;/p&gt;
            </div>
            <p>Renders as:</p>
            <div class="entity-display" style="text-align: left;">
                Menu Items:<br>
                Burger &emsp;&emsp; $10.99<br>
                Pizza &emsp;&emsp;&nbsp; $12.99<br>
                Salad &emsp;&emsp;&nbsp; $8.99
            </div>
        </div>
        
        <div class="note">
            <h3>Better Alternatives for Layout:</h3>
            <p>While character entities can be used for simple layouts, it's generally better to use CSS for more complex formatting. The example above would be better implemented with a table or CSS grid.</p>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Character Entity Decoder</h2>
        <p>Practice using character entities by typing HTML with entities and seeing the rendered result:</p>
        
        <div>
            <textarea id="htmlEditor" rows="10" style="width: 100%; font-family: monospace; padding: 10px;" placeholder="Type HTML with character entities here. For example: &lt;p&gt;Copyright &amp;copy; 2023. Price: &amp;euro;100.&lt;/p&gt;"></textarea>
            <button onclick="updatePreview()">Render HTML</button>
        </div>
        
        <h3>Preview:</h3>
        <div id="previewFrame" style="width: 100%; min-height: 100px; border: 1px solid #ddd; border-radius: 4px; padding: 10px; margin-top: 10px;"></div>
        
        <div class="note" style="margin-top: 20px;">
            <h3>Try These Examples:</h3>
            <ul>
                <li><code>&lt;p&gt;HTML uses &amp;lt;tags&amp;gt; to structure content.&lt;/p&gt;</code></li>
                <li><code>&lt;p&gt;Special symbols: &amp;copy; &amp;reg; &amp;trade; &amp;euro; &amp;pound; &amp;yen;&lt;/p&gt;</code></li>
                <li><code>&lt;p&gt;Mathematical: 5 &amp;times; 6 = 30, 10 &amp;divide; 2 = 5, x&amp;sup2; + y&amp;sup2; = z&amp;sup2;&lt;/p&gt;</code></li>
                <li><code>&lt;p&gt;Spaces:&amp;nbsp;&amp;nbsp;&amp;nbsp;Non-breaking&amp;ensp;En&amp;emsp;Em&lt;/p&gt;</code></li>
            </ul>
        </div>
        
        <script>
            function updatePreview() {
                const htmlCode = document.getElementById('htmlEditor').value;
                const previewFrame = document.getElementById('previewFrame');
                
                previewFrame.innerHTML = htmlCode;
            }
            
            // Initialize with an example
            window.onload = function() {
                document.getElementById('htmlEditor').value = '<p>HTML uses &lt;tags&gt; to structure content.</p>\n<p>Special symbols: &copy; &reg; &trade; &euro; &pound; &yen;</p>';
                updatePreview();
            };
        </script>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Character Entity Finder</h2>
        <p>Find the correct character entity for each symbol:</p>
        
        <div id="entityQuiz" style="margin: 20px 0;">
            <div class="quiz-item" style="margin-bottom: 15px;">
                <p><strong>1. What is the character entity for the copyright symbol (©)?</strong></p>
                <input type="text" id="answer1" style="padding: 5px; width: 150px;">
                <button onclick="checkAnswer(1)">Check</button>
                <span id="feedback1" style="margin-left: 10px;"></span>
            </div>
            
            <div class="quiz-item" style="margin-bottom: 15px;">
                <p><strong>2. What is the character entity for the less than symbol (&lt;)?</strong></p>
                <input type="text" id="answer2" style="padding: 5px; width: 150px;">
                <button onclick="checkAnswer(2)">Check</button>
                <span id="feedback2" style="margin-left: 10px;"></span>
            </div>
            
            <div class="quiz-item" style="margin-bottom: 15px;">
                <p><strong>3. What is the character entity for the non-breaking space?</strong></p>
                <input type="text" id="answer3" style="padding: 5px; width: 150px;">
                <button onclick="checkAnswer(3)">Check</button>
                <span id="feedback3" style="margin-left: 10px;"></span>
            </div>
            
            <div class="quiz-item" style="margin-bottom: 15px;">
                <p><strong>4. What is the character entity for the euro symbol (€)?</strong></p>
                <input type="text" id="answer4" style="padding: 5px; width: 150px;">
                <button onclick="checkAnswer(4)">Check</button>
                <span id="feedback4" style="margin-left: 10px;"></span>
            </div>
            
            <div class="quiz-item" style="margin-bottom: 15px;">
                <p><strong>5. What is the character entity for the multiplication symbol (×)?</strong></p>
                <input type="text" id="answer5" style="padding: 5px; width: 150px;">
                <button onclick="checkAnswer(5)">Check</button>
                <span id="feedback5" style="margin-left: 10px;"></span>
            </div>
        </div>
        
        <script>
            function checkAnswer(questionNumber) {
                const answers = {
                    1: '&copy;',
                    2: '&lt;',
                    3: '&nbsp;',
                    4: '&euro;',
                    5: '&times;'
                };
                
                const userAnswer = document.getElementById('answer' + questionNumber).value.trim();
                const feedbackElement = document.getElementById('feedback' + questionNumber);
                
                if (userAnswer.toLowerCase() === answers[questionNumber]) {
                    feedbackElement.textContent = "Correct!";
                    feedbackElement.style.color = "#155724";
                } else {
                    feedbackElement.textContent = "Incorrect. Try again!";
                    feedbackElement.style.color = "#721c24";
                }
            }
        </script>
    </div>
    
    <div class="quiz-container">
        <h2>Knowledge Check</h2>
        
        <div class="quiz-question">
            1. Which character entity is used to display the ampersand (&amp;) symbol in HTML?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> &amp;ampersand;</label>
            <label><input type="radio" name="q1" value="b"> &amp;amp;</label>
            <label><input type="radio" name="q1" value="c"> &amp;and;</label>
            <label><input type="radio" name="q1" value="d"> &amp;#38;</label>
        </div>
        <div id="quizFeedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. What is the purpose of the non-breaking space entity (&amp;nbsp;)?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> To create a space that is invisible to users</label>
            <label><input type="radio" name="q2" value="b"> To create a space that is twice as wide as a normal space</label>
            <label><input type="radio" name="q2" value="c"> To prevent line breaks between words and keep text together</label>
            <label><input type="radio" name="q2" value="d"> To create a space that can't be modified with CSS</label>
        </div>
        <div id="quizFeedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which of the following is NOT a valid way to represent a character entity in HTML?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> Named entity (e.g., &amp;copy;)</label>
            <label><input type="radio" name="q3" value="b"> Decimal entity (e.g., &amp;#169;)</label>
            <label><input type="radio" name="q3" value="c"> Hexadecimal entity (e.g., &amp;#xA9;)</label>
            <label><input type="radio" name="q3" value="d"> Unicode entity (e.g., &amp;U+00A9;)</label>
        </div>
        <div id="quizFeedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. Why do you need to use character entities for symbols like &lt; and &gt; in HTML?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> These symbols are not available on standard keyboards</label>
            <label><input type="radio" name="q4" value="b"> These symbols have special meaning in HTML and would be interpreted as code</label>
            <label><input type="radio" name="q4" value="c"> These symbols are copyrighted and require special encoding</label>
            <label><input type="radio" name="q4" value="d"> These symbols are not supported in all browsers without entities</label>
        </div>
        <div id="quizFeedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. What is the best approach for supporting special characters and accents in modern web development?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> Always use character entities for all special characters</label>
            <label><input type="radio" name="q5" value="b"> Use UTF-8 encoding and input special characters directly when possible</label>
            <label><input type="radio" name="q5" value="c"> Use images instead of special characters to ensure compatibility</label>
            <label><input type="radio" name="q5" value="d"> Avoid using special characters altogether</label>
        </div>
        <div id="quizFeedback5" class="feedback"></div>
        
        <button onclick="checkQuizAnswers()">Submit Answers</button>
        
        <script>
            function checkQuizAnswers() {
                const answers = {
                    q1: ['b', 'd'], // Both &amp; and &#38; are correct
                    q2: 'c',
                    q3: 'd',
                    q4: 'b',
                    q5: 'b'
                };
                
                for (let i = 1; i <= 5; i++) {
                    const selectedOption = document.querySelector(`input[name="q${i}"]:checked`);
                    const feedbackElement = document.getElementById(`quizFeedback${i}`);
                    
                    if (!selectedOption) {
                        feedbackElement.textContent = "Please select an answer.";
                        feedbackElement.className = "feedback incorrect";
                        feedbackElement.style.display = "block";
                        continue;
                    }
                    
                    const correctAnswer = answers[`q${i}`];
                    let isCorrect = false;
                    
                    if (Array.isArray(correctAnswer)) {
                        isCorrect = correctAnswer.includes(selectedOption.value);
                    } else {
                        isCorrect = selectedOption.value === correctAnswer;
                    }
                    
                    if (isCorrect) {
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
            <button onclick="window.location.href='03_accessibility.html'">Previous Lesson: Accessibility Best Practices</button>
        </div>
        <div>
            <button onclick="window.location.href='05_embedding_content.html'">Next Lesson: Embedding Content</button>
        </div>
    </div>
</body>
</html>
