<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tables</title>
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
        
        /* Table styling for examples */
        .demo-table {
            border-collapse: collapse;
            width: 100%;
            margin: 15px 0;
        }
        .demo-table th, .demo-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .demo-table th {
            background-color: #f2f2f2;
            text-align: left;
        }
        .demo-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .demo-table caption {
            caption-side: top;
            padding: 8px;
            font-weight: bold;
            text-align: left;
        }
        
        /* Styling for visual examples */
        .visual-example {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Tables</h1>
    
    <div class="lesson-container">
        <h2>Introduction to HTML Tables</h2>
        <p>HTML tables allow you to organize data into rows and columns, making it easier to present information in a structured format. Tables are particularly useful for displaying tabular data such as product comparisons, schedules, financial information, and statistical data.</p>
        
        <div class="note">
            <h3>Important Note:</h3>
            <p>While tables were once commonly used for page layout, this practice is now discouraged. Tables should be used only for tabular data, not for layout purposes. For page layout, use CSS techniques like Flexbox or Grid instead.</p>
        </div>
        
        <h3>When to Use Tables:</h3>
        <ul>
            <li>Displaying data that naturally fits into rows and columns</li>
            <li>Creating comparison charts</li>
            <li>Presenting schedules or timetables</li>
            <li>Showing financial data or statistics</li>
        </ul>
    </div>
    
    <div class="lesson-container">
        <h2>Table Structure</h2>
        <p>HTML tables are built using several elements that work together to create the structure:</p>
        
        <h3>Basic Table Elements</h3>
        <table class="comparison-table">
            <tr>
                <th>Element</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><code>&lt;table&gt;</code></td>
                <td>The container element that defines the table</td>
            </tr>
            <tr>
                <td><code>&lt;tr&gt;</code></td>
                <td>Table Row - defines a row in the table</td>
            </tr>
            <tr>
                <td><code>&lt;td&gt;</code></td>
                <td>Table Data - defines a cell containing data</td>
            </tr>
            <tr>
                <td><code>&lt;th&gt;</code></td>
                <td>Table Header - defines a header cell (typically bold and centered)</td>
            </tr>
        </table>
        
        <div class="example">
            <h3>Basic Table Structure:</h3>
            <div class="code-block">
                &lt;table&gt;<br>
                &nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;Header 1&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;Header 2&lt;/th&gt;<br>
                &nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;Data 1&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;Data 2&lt;/td&gt;<br>
                &nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;Data 3&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;Data 4&lt;/td&gt;<br>
                &nbsp;&nbsp;&lt;/tr&gt;<br>
                &lt;/table&gt;
            </div>
        </div>
        
        <div class="visual-example">
            <h4>How it renders:</h4>
            <table class="demo-table">
                <tr>
                    <th>Header 1</th>
                    <th>Header 2</th>
                </tr>
                <tr>
                    <td>Data 1</td>
                    <td>Data 2</td>
                </tr>
                <tr>
                    <td>Data 3</td>
                    <td>Data 4</td>
                </tr>
            </table>
        </div>
        
        <h3>Additional Table Elements</h3>
        <table class="comparison-table">
            <tr>
                <th>Element</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><code>&lt;caption&gt;</code></td>
                <td>Provides a title or explanation for the table</td>
            </tr>
            <tr>
                <td><code>&lt;thead&gt;</code></td>
                <td>Groups header content in a table</td>
            </tr>
            <tr>
                <td><code>&lt;tbody&gt;</code></td>
                <td>Groups the body content in a table</td>
            </tr>
            <tr>
                <td><code>&lt;tfoot&gt;</code></td>
                <td>Groups footer content in a table</td>
            </tr>
        </table>
        
        <div class="example">
            <h3>Table with Semantic Sections:</h3>
            <div class="code-block">
                &lt;table&gt;<br>
                &nbsp;&nbsp;&lt;caption&gt;Monthly Savings&lt;/caption&gt;<br>
                &nbsp;&nbsp;&lt;thead&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;Month&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;Savings&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;/thead&gt;<br>
                &nbsp;&nbsp;&lt;tbody&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;January&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;$100&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;February&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;$80&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;/tbody&gt;<br>
                &nbsp;&nbsp;&lt;tfoot&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;Sum&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;$180&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;/tfoot&gt;<br>
                &lt;/table&gt;
            </div>
        </div>
        
        <div class="visual-example">
            <h4>How it renders:</h4>
            <table class="demo-table">
                <caption>Monthly Savings</caption>
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Savings</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>January</td>
                        <td>$100</td>
                    </tr>
                    <tr>
                        <td>February</td>
                        <td>$80</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Sum</td>
                        <td>$180</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <div class="note">
            <h3>Benefits of Using thead, tbody, and tfoot:</h3>
            <ul>
                <li>Improves accessibility by clearly defining table sections</li>
                <li>Makes it easier to style different parts of the table with CSS</li>
                <li>Allows browsers to scroll the tbody independently while keeping the header and footer visible</li>
                <li>Provides semantic meaning to the table structure</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Spanning Rows and Columns</h2>
        <p>Sometimes you need cells that span multiple rows or columns to create more complex table layouts. HTML provides two attributes for this purpose:</p>
        
        <ul>
            <li><code>colspan</code> - Specifies how many columns a cell should span</li>
            <li><code>rowspan</code> - Specifies how many rows a cell should span</li>
        </ul>
        
        <div class="example">
            <h3>Column Spanning Example:</h3>
            <div class="code-block">
                &lt;table&gt;<br>
                &nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;th colspan="2"&gt;Name&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;Age&lt;/th&gt;<br>
                &nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;John&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;Doe&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;30&lt;/td&gt;<br>
                &nbsp;&nbsp;&lt;/tr&gt;<br>
                &lt;/table&gt;
            </div>
        </div>
        
        <div class="visual-example">
            <h4>How it renders:</h4>
            <table class="demo-table">
                <tr>
                    <th colspan="2">Name</th>
                    <th>Age</th>
                </tr>
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>30</td>
                </tr>
            </table>
        </div>
        
        <div class="example">
            <h3>Row Spanning Example:</h3>
            <div class="code-block">
                &lt;table&gt;<br>
                &nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;Name&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;John Doe&lt;/td&gt;<br>
                &nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;th rowspan="2"&gt;Phone&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;555-1234&lt;/td&gt;<br>
                &nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;555-5678&lt;/td&gt;<br>
                &nbsp;&nbsp;&lt;/tr&gt;<br>
                &lt;/table&gt;
            </div>
        </div>
        
        <div class="visual-example">
            <h4>How it renders:</h4>
            <table class="demo-table">
                <tr>
                    <th>Name</th>
                    <td>John Doe</td>
                </tr>
                <tr>
                    <th rowspan="2">Phone</th>
                    <td>555-1234</td>
                </tr>
                <tr>
                    <td>555-5678</td>
                </tr>
            </table>
        </div>
        
        <div class="example">
            <h3>Complex Table with Both Row and Column Spanning:</h3>
            <div class="code-block">
                &lt;table&gt;<br>
                &nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;th colspan="2" rowspan="2"&gt;&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;th colspan="2"&gt;Average&lt;/th&gt;<br>
                &nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;Height&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;Weight&lt;/th&gt;<br>
                &nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;th rowspan="2"&gt;Gender&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;Male&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;1.9m&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;85kg&lt;/td&gt;<br>
                &nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;th&gt;Female&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;1.7m&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;65kg&lt;/td&gt;<br>
                &nbsp;&nbsp;&lt;/tr&gt;<br>
                &lt;/table&gt;
            </div>
        </div>
        
        <div class="visual-example">
            <h4>How it renders:</h4>
            <table class="demo-table">
                <tr>
                    <th colspan="2" rowspan="2"></th>
                    <th colspan="2">Average</th>
                </tr>
                <tr>
                    <th>Height</th>
                    <th>Weight</th>
                </tr>
                <tr>
                    <th rowspan="2">Gender</th>
                    <th>Male</th>
                    <td>1.9m</td>
                    <td>85kg</td>
                </tr>
                <tr>
                    <th>Female</th>
                    <td>1.7m</td>
                    <td>65kg</td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Table Accessibility</h2>
        <p>Creating accessible tables is crucial for users who rely on screen readers or other assistive technologies. Here are some key practices to make your tables more accessible:</p>
        
        <h3>1. Use Proper Table Headers</h3>
        <p>Always use <code>&lt;th&gt;</code> elements for headers and include the <code>scope</code> attribute to explicitly associate headers with rows or columns:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;th scope="col"&gt;Name&lt;/th&gt; &lt;!-- This header applies to the column --&gt;<br>
                &lt;th scope="row"&gt;Total&lt;/th&gt; &lt;!-- This header applies to the row --&gt;
            </div>
        </div>
        
        <h3>2. Include a Caption</h3>
        <p>Use the <code>&lt;caption&gt;</code> element to provide a title or description of the table:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;table&gt;<br>
                &nbsp;&nbsp;&lt;caption&gt;Quarterly Sales Report (2023)&lt;/caption&gt;<br>
                &nbsp;&nbsp;<!-- Table content --><br>
                &lt;/table&gt;
            </div>
        </div>
        
        <h3>3. Use Table Sections</h3>
        <p>Organize your table with <code>&lt;thead&gt;</code>, <code>&lt;tbody&gt;</code>, and <code>&lt;tfoot&gt;</code> to provide structural information.</p>
        
        <h3>4. Provide Summary Information</h3>
        <p>For complex tables, consider adding a summary of the table's purpose and structure either in the caption or in text preceding the table.</p>
        
        <h3>5. Avoid Complex Nesting</h3>
        <p>Keep table structures as simple as possible. If a table becomes too complex, consider breaking it into multiple simpler tables.</p>
        
        <div class="example">
            <h3>Accessible Table Example:</h3>
            <div class="code-block">
                &lt;table&gt;<br>
                &nbsp;&nbsp;&lt;caption&gt;Monthly Budget Summary&lt;/caption&gt;<br>
                &nbsp;&nbsp;&lt;thead&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th scope="col"&gt;Category&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th scope="col"&gt;Budget&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th scope="col"&gt;Actual&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th scope="col"&gt;Difference&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;/thead&gt;<br>
                &nbsp;&nbsp;&lt;tbody&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th scope="row"&gt;Housing&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;$1,000&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;$1,050&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;-$50&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th scope="row"&gt;Food&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;$400&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;$380&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;$20&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;/tbody&gt;<br>
                &nbsp;&nbsp;&lt;tfoot&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;tr&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;th scope="row"&gt;Total&lt;/th&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;$1,400&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;$1,430&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;td&gt;-$30&lt;/td&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/tr&gt;<br>
                &nbsp;&nbsp;&lt;/tfoot&gt;<br>
                &lt;/table&gt;
            </div>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Styling Tables with CSS</h2>
        <p>Plain HTML tables can be difficult to read. CSS can significantly improve the appearance and readability of your tables.</p>
        
        <h3>Basic Table Styling</h3>
        <div class="example">
            <h3>CSS for Basic Table Styling:</h3>
            <div class="code-block">
                table {<br>
                &nbsp;&nbsp;border-collapse: collapse; /* Removes double borders */<br>
                &nbsp;&nbsp;width: 100%; /* Makes table full width of container */<br>
                &nbsp;&nbsp;margin-bottom: 20px;<br>
                }<br><br>
                
                th, td {<br>
                &nbsp;&nbsp;border: 1px solid #ddd; /* Adds borders to cells */<br>
                &nbsp;&nbsp;padding: 8px; /* Adds space inside cells */<br>
                &nbsp;&nbsp;text-align: left;<br>
                }<br><br>
                
                th {<br>
                &nbsp;&nbsp;background-color: #f2f2f2; /* Light gray background for headers */<br>
                &nbsp;&nbsp;font-weight: bold;<br>
                }<br><br>
                
                tr:nth-child(even) {<br>
                &nbsp;&nbsp;background-color: #f9f9f9; /* Zebra striping for rows */<br>
                }<br><br>
                
                tr:hover {<br>
                &nbsp;&nbsp;background-color: #f5f5f5; /* Highlight on hover */<br>
                }
            </div>
        </div>
        
        <h3>Advanced Table Styling Techniques</h3>
        <ul>
            <li><strong>Responsive Tables:</strong> Make tables work well on mobile devices</li>
            <li><strong>Fixed Headers:</strong> Keep headers visible when scrolling through large tables</li>
            <li><strong>Sortable Tables:</strong> Allow users to sort table data (requires JavaScript)</li>
            <li><strong>Collapsible Rows:</strong> Show/hide additional details</li>
        </ul>
        
        <div class="example">
            <h3>CSS for Responsive Tables:</h3>
            <div class="code-block">
                @media screen and (max-width: 600px) {<br>
                &nbsp;&nbsp;table {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;border: 0;<br>
                &nbsp;&nbsp;}<br><br>
                
                &nbsp;&nbsp;table caption {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;font-size: 1.3em;<br>
                &nbsp;&nbsp;}<br><br>
                
                &nbsp;&nbsp;table thead {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;display: none; /* Hide headers on small screens */<br>
                &nbsp;&nbsp;}<br><br>
                
                &nbsp;&nbsp;table tr {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;margin-bottom: 10px;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;display: block;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;border-bottom: 2px solid #ddd;<br>
                &nbsp;&nbsp;}<br><br>
                
                &nbsp;&nbsp;table td {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;display: block;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;text-align: right;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;font-size: 13px;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;border-bottom: 1px dotted #ccc;<br>
                &nbsp;&nbsp;}<br><br>
                
                &nbsp;&nbsp;table td:last-child {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;border-bottom: 0;<br>
                &nbsp;&nbsp;}<br><br>
                
                &nbsp;&nbsp;table td:before {<br>
                &nbsp;&nbsp;&nbsp;&nbsp;content: attr(data-label); /* Add labels from data attributes */<br>
                &nbsp;&nbsp;&nbsp;&nbsp;float: left;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;font-weight: bold;<br>
                &nbsp;&nbsp;}<br>
                }
            </div>
        </div>
        
        <div class="note">
            <h3>For Responsive Tables:</h3>
            <p>When using the responsive table CSS above, you'll need to add <code>data-label</code> attributes to your <code>&lt;td&gt;</code> elements:</p>
            <code>&lt;td data-label="Name"&gt;John Doe&lt;/td&gt;</code>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Create a Product Comparison Table</h2>
        <p>Practice creating tables by building a product comparison table:</p>
        
        <div>
            <textarea id="htmlEditor" rows="20" style="width: 100%; font-family: monospace; padding: 10px;"><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Comparison</title>
    <style>
        /* Add your CSS styles here to make the table look good */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
        }
        
        /* Add table styles here */
        
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Product Comparison</h1>
    
    <!-- Create a product comparison table with:
    1. At least 3 products (columns)
    2. At least 5 features to compare (rows)
    3. Use proper table structure (thead, tbody)
    4. Include a caption
    5. Use appropriate headers with scope attributes
    6. Style the table to make it visually appealing -->
    
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
                <li>A descriptive caption</li>
                <li>Proper table structure with <code>&lt;thead&gt;</code> and <code>&lt;tbody&gt;</code></li>
                <li>Header cells with <code>scope</code> attributes</li>
                <li>At least one cell that spans multiple columns or rows</li>
                <li>CSS styling to make the table visually appealing and easy to read</li>
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
    &lt;title&gt;Product Comparison&lt;/title&gt;
    &lt;style&gt;
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            max-width: 900px;
            margin: 0 auto;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        caption {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: left;
            caption-side: top;
            color: #333;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }
        
        thead th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.9em;
        }
        
        tbody th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tbody tr:hover {
            background-color: #f1f1f1;
        }
        
        .highlight {
            background-color: #d4edda;
        }
        
        .price {
            font-weight: bold;
            color: #2c3e50;
        }
        
        .best-value {
            background-color: #e8f4fc;
            border: 2px solid #3498db;
        }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Product Comparison&lt;/h1&gt;
    
    &lt;table&gt;
        &lt;caption&gt;Smartphone Comparison - Latest Models (2023)&lt;/caption&gt;
        &lt;thead&gt;
            &lt;tr&gt;
                &lt;th scope="col"&gt;Features&lt;/th&gt;
                &lt;th scope="col"&gt;Model A&lt;/th&gt;
                &lt;th scope="col" class="best-value"&gt;Model B&lt;/th&gt;
                &lt;th scope="col"&gt;Model C&lt;/th&gt;
            &lt;/tr&gt;
        &lt;/thead&gt;
        &lt;tbody&gt;
            &lt;tr&gt;
                &lt;th scope="row"&gt;Price&lt;/th&gt;
                &lt;td class="price"&gt;$799&lt;/td&gt;
                &lt;td class="price best-value"&gt;$699&lt;/td&gt;
                &lt;td class="price"&gt;$899&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;th scope="row"&gt;Screen Size&lt;/th&gt;
                &lt;td&gt;6.1"&lt;/td&gt;
                &lt;td class="best-value"&gt;6.4"&lt;/td&gt;
                &lt;td&gt;6.7"&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;th scope="row"&gt;Resolution&lt;/th&gt;
                &lt;td&gt;1170 x 2532&lt;/td&gt;
                &lt;td class="best-value"&gt;1440 x 3088&lt;/td&gt;
                &lt;td&gt;1284 x 2778&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;th scope="row"&gt;Camera&lt;/th&gt;
                &lt;td&gt;12MP Triple&lt;/td&gt;
                &lt;td class="best-value"&gt;108MP Quad&lt;/td&gt;
                &lt;td&gt;12MP Triple&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;th scope="row"&gt;Battery&lt;/th&gt;
                &lt;td&gt;3095 mAh&lt;/td&gt;
                &lt;td class="best-value"&gt;5000 mAh&lt;/td&gt;
                &lt;td&gt;3687 mAh&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;th scope="row"&gt;Storage Options&lt;/th&gt;
                &lt;td colspan="3"&gt;
                    All models available in 128GB, 256GB, and 512GB configurations
                &lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;th scope="row"&gt;Water Resistance&lt;/th&gt;
                &lt;td class="highlight"&gt;IP68&lt;/td&gt;
                &lt;td class="highlight best-value"&gt;IP68&lt;/td&gt;
                &lt;td class="highlight"&gt;IP68&lt;/td&gt;
            &lt;/tr&gt;
            &lt;tr&gt;
                &lt;th scope="row"&gt;Operating System&lt;/th&gt;
                &lt;td&gt;iOS 15&lt;/td&gt;
                &lt;td class="best-value"&gt;Android 12&lt;/td&gt;
                &lt;td&gt;iOS 15&lt;/td&gt;
            &lt;/tr&gt;
        &lt;/tbody&gt;
    &lt;/table&gt;
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
            1. Which HTML element defines a table row?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> &lt;td&gt;</label>
            <label><input type="radio" name="q1" value="b"> &lt;th&gt;</label>
            <label><input type="radio" name="q1" value="c"> &lt;tr&gt;</label>
            <label><input type="radio" name="q1" value="d"> &lt;table-row&gt;</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which attribute is used to make a cell span multiple columns?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> span</label>
            <label><input type="radio" name="q2" value="b"> colspread</label>
            <label><input type="radio" name="q2" value="c"> colspan</label>
            <label><input type="radio" name="q2" value="d"> rowspan</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which element is used to group the header content in a table?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> &lt;thead&gt;</label>
            <label><input type="radio" name="q3" value="b"> &lt;header&gt;</label>
            <label><input type="radio" name="q3" value="c"> &lt;th&gt;</label>
            <label><input type="radio" name="q3" value="d"> &lt;thead&gt;</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. Which attribute should be added to a &lt;th&gt; element to indicate it's a header for a column?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> header="column"</label>
            <label><input type="radio" name="q4" value="b"> scope="col"</label>
            <label><input type="radio" name="q4" value="c"> type="column"</label>
            <label><input type="radio" name="q4" value="d"> column="true"</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. Which CSS property removes the double borders between table cells?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> border-spacing: 0;</label>
            <label><input type="radio" name="q5" value="b"> border-collapse: collapse;</label>
            <label><input type="radio" name="q5" value="c"> border-style: single;</label>
            <label><input type="radio" name="q5" value="d"> border-merge: true;</label>
        </div>
        <div id="feedback5" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'c',
                    q2: 'c',
                    q3: 'a',
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
            <button onclick="window.location.href='06_lists.php'">Previous Lesson: Lists</button>
        </div>
        <div>
            <button onclick="window.location.href='08_forms.php'">Next Lesson: Forms and Input Elements</button>
        </div>
    </div>
</body>
</html>
