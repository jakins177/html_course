<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms and Input Elements</title>
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
        
        /* Form styling for examples */
        .demo-form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .btn {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #2980b9;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Forms and Input Elements</h1>
    
    <div class="lesson-container">
        <h2>Introduction to HTML Forms</h2>
        <p>HTML forms are one of the main points of interaction between a user and a website or application. They allow users to enter data that is sent to a server for processing and storage, or used on the client-side to immediately update the interface.</p>
        
        <p>Forms are used for various purposes, including:</p>
        <ul>
            <li>User registration and login</li>
            <li>Contact forms</li>
            <li>Search boxes</li>
            <li>Online shopping carts and checkout</li>
            <li>Surveys and polls</li>
            <li>File uploads</li>
        </ul>
        
        <div class="example">
            <h3>Basic Form Structure:</h3>
            <div class="code-block">
                &lt;form action="/submit-form" method="post"&gt;<br>
                &nbsp;&nbsp;&lt;!-- Form elements go here --&gt;<br>
                &nbsp;&nbsp;&lt;label for="name"&gt;Name:&lt;/label&gt;<br>
                &nbsp;&nbsp;&lt;input type="text" id="name" name="name"&gt;<br><br>
                
                &nbsp;&nbsp;&lt;label for="email"&gt;Email:&lt;/label&gt;<br>
                &nbsp;&nbsp;&lt;input type="email" id="email" name="email"&gt;<br><br>
                
                &nbsp;&nbsp;&lt;input type="submit" value="Submit"&gt;<br>
                &lt;/form&gt;
            </div>
        </div>
        
        <h3>Key Form Attributes</h3>
        <table class="comparison-table">
            <tr>
                <th>Attribute</th>
                <th>Description</th>
                <th>Example</th>
            </tr>
            <tr>
                <td><code>action</code></td>
                <td>Specifies where to send the form data when submitted</td>
                <td><code>action="/submit-form"</code></td>
            </tr>
            <tr>
                <td><code>method</code></td>
                <td>Specifies the HTTP method to use when sending form data</td>
                <td><code>method="post"</code> or <code>method="get"</code></td>
            </tr>
            <tr>
                <td><code>name</code></td>
                <td>Specifies a name for the form (for DOM manipulation)</td>
                <td><code>name="contact-form"</code></td>
            </tr>
            <tr>
                <td><code>target</code></td>
                <td>Specifies where to display the response after submitting</td>
                <td><code>target="_blank"</code> (new window/tab)</td>
            </tr>
            <tr>
                <td><code>enctype</code></td>
                <td>Specifies how form data should be encoded when submitted</td>
                <td><code>enctype="multipart/form-data"</code> (for file uploads)</td>
            </tr>
            <tr>
                <td><code>autocomplete</code></td>
                <td>Specifies whether form should have autocomplete on or off</td>
                <td><code>autocomplete="off"</code></td>
            </tr>
        </table>
        
        <div class="note">
            <h3>GET vs. POST Methods:</h3>
            <ul>
                <li><strong>GET</strong> - Appends form data to the URL (visible in address bar). Limited to about 2000 characters. Good for non-sensitive data like search queries.</li>
                <li><strong>POST</strong> - Sends form data in the HTTP request body (not visible in URL). No size limitations. Better for sensitive data like passwords or large amounts of data.</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Text Inputs and Text Areas</h2>
        <p>Text inputs are the most common form controls, allowing users to enter various types of text data.</p>
        
        <h3>Basic Text Input</h3>
        <p>The <code>&lt;input type="text"&gt;</code> element creates a single-line text input field:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;label for="username"&gt;Username:&lt;/label&gt;<br>
                &lt;input type="text" id="username" name="username" placeholder="Enter your username"&gt;
            </div>
        </div>
        
        <div class="demo-form">
            <div class="form-group">
                <label for="username-demo">Username:</label>
                <input type="text" id="username-demo" name="username" placeholder="Enter your username" class="form-control">
            </div>
        </div>
        
        <h3>Common Text Input Attributes</h3>
        <table class="comparison-table">
            <tr>
                <th>Attribute</th>
                <th>Description</th>
                <th>Example</th>
            </tr>
            <tr>
                <td><code>type</code></td>
                <td>Specifies the type of input</td>
                <td><code>type="text"</code></td>
            </tr>
            <tr>
                <td><code>name</code></td>
                <td>Specifies the name of the input (sent with form data)</td>
                <td><code>name="username"</code></td>
            </tr>
            <tr>
                <td><code>id</code></td>
                <td>Unique identifier (used with label's for attribute)</td>
                <td><code>id="username"</code></td>
            </tr>
            <tr>
                <td><code>value</code></td>
                <td>Specifies the initial value</td>
                <td><code>value="JohnDoe"</code></td>
            </tr>
            <tr>
                <td><code>placeholder</code></td>
                <td>Hint text displayed when the field is empty</td>
                <td><code>placeholder="Enter username"</code></td>
            </tr>
            <tr>
                <td><code>required</code></td>
                <td>Specifies that the field must be filled out</td>
                <td><code>required</code></td>
            </tr>
            <tr>
                <td><code>maxlength</code></td>
                <td>Maximum number of characters allowed</td>
                <td><code>maxlength="30"</code></td>
            </tr>
            <tr>
                <td><code>minlength</code></td>
                <td>Minimum number of characters required</td>
                <td><code>minlength="5"</code></td>
            </tr>
            <tr>
                <td><code>disabled</code></td>
                <td>Disables the input field</td>
                <td><code>disabled</code></td>
            </tr>
            <tr>
                <td><code>readonly</code></td>
                <td>Makes the field read-only (cannot be modified)</td>
                <td><code>readonly</code></td>
            </tr>
        </table>
        
        <h3>Text Area</h3>
        <p>The <code>&lt;textarea&gt;</code> element creates a multi-line text input field:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;label for="message"&gt;Message:&lt;/label&gt;<br>
                &lt;textarea id="message" name="message" rows="4" cols="50" placeholder="Enter your message here..."&gt;&lt;/textarea&gt;
            </div>
        </div>
        
        <div class="demo-form">
            <div class="form-group">
                <label for="message-demo">Message:</label>
                <textarea id="message-demo" name="message" rows="4" placeholder="Enter your message here..." class="form-control"></textarea>
            </div>
        </div>
        
        <div class="note">
            <h3>Textarea vs. Input:</h3>
            <ul>
                <li><strong>Input</strong> - Single line of text, good for short entries like names, emails, etc.</li>
                <li><strong>Textarea</strong> - Multiple lines of text, good for longer content like comments, messages, etc.</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>HTML5 Input Types</h2>
        <p>HTML5 introduced several new input types that provide better user experiences and built-in validation for specific data formats.</p>
        
        <h3>Common HTML5 Input Types</h3>
        <table class="comparison-table">
            <tr>
                <th>Input Type</th>
                <th>Description</th>
                <th>Example</th>
            </tr>
            <tr>
                <td><code>email</code></td>
                <td>For email addresses (includes validation)</td>
                <td><code>&lt;input type="email"&gt;</code></td>
            </tr>
            <tr>
                <td><code>password</code></td>
                <td>For password entry (masks characters)</td>
                <td><code>&lt;input type="password"&gt;</code></td>
            </tr>
            <tr>
                <td><code>number</code></td>
                <td>For numeric input (includes validation)</td>
                <td><code>&lt;input type="number" min="1" max="100"&gt;</code></td>
            </tr>
            <tr>
                <td><code>tel</code></td>
                <td>For telephone numbers</td>
                <td><code>&lt;input type="tel"&gt;</code></td>
            </tr>
            <tr>
                <td><code>url</code></td>
                <td>For web addresses (includes validation)</td>
                <td><code>&lt;input type="url"&gt;</code></td>
            </tr>
            <tr>
                <td><code>date</code></td>
                <td>For date selection (displays date picker)</td>
                <td><code>&lt;input type="date"&gt;</code></td>
            </tr>
            <tr>
                <td><code>time</code></td>
                <td>For time selection</td>
                <td><code>&lt;input type="time"&gt;</code></td>
            </tr>
            <tr>
                <td><code>color</code></td>
                <td>For color selection (displays color picker)</td>
                <td><code>&lt;input type="color"&gt;</code></td>
            </tr>
            <tr>
                <td><code>range</code></td>
                <td>For selecting a value from a range (slider)</td>
                <td><code>&lt;input type="range" min="0" max="100"&gt;</code></td>
            </tr>
            <tr>
                <td><code>search</code></td>
                <td>For search fields</td>
                <td><code>&lt;input type="search"&gt;</code></td>
            </tr>
            <tr>
                <td><code>file</code></td>
                <td>For file uploads</td>
                <td><code>&lt;input type="file"&gt;</code></td>
            </tr>
        </table>
        
        <div class="example">
            <h3>HTML5 Input Types Example:</h3>
            <div class="code-block">
                &lt;form&gt;<br>
                &nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="user-email"&gt;Email:&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="email" id="user-email" name="email" required&gt;<br>
                &nbsp;&nbsp;&lt;/div&gt;<br><br>
                
                &nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="user-password"&gt;Password:&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="password" id="user-password" name="password" minlength="8" required&gt;<br>
                &nbsp;&nbsp;&lt;/div&gt;<br><br>
                
                &nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="user-age"&gt;Age:&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="number" id="user-age" name="age" min="18" max="120"&gt;<br>
                &nbsp;&nbsp;&lt;/div&gt;<br><br>
                
                &nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="user-website"&gt;Website:&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="url" id="user-website" name="website" placeholder="https://example.com"&gt;<br>
                &nbsp;&nbsp;&lt;/div&gt;<br><br>
                
                &nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="user-birthday"&gt;Birthday:&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="date" id="user-birthday" name="birthday"&gt;<br>
                &nbsp;&nbsp;&lt;/div&gt;<br><br>
                
                &nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="user-color"&gt;Favorite Color:&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="color" id="user-color" name="color"&gt;<br>
                &nbsp;&nbsp;&lt;/div&gt;<br><br>
                
                &nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="user-satisfaction"&gt;Satisfaction (1-10):&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="range" id="user-satisfaction" name="satisfaction" min="1" max="10"&gt;<br>
                &nbsp;&nbsp;&lt;/div&gt;<br><br>
                
                &nbsp;&nbsp;&lt;button type="submit"&gt;Submit&lt;/button&gt;<br>
                &lt;/form&gt;
            </div>
        </div>
        
        <div class="demo-form">
            <div class="form-group">
                <label for="demo-email">Email:</label>
                <input type="email" id="demo-email" name="email" required class="form-control">
            </div>
            
            <div class="form-group">
                <label for="demo-password">Password:</label>
                <input type="password" id="demo-password" name="password" minlength="8" required class="form-control">
            </div>
            
            <div class="form-group">
                <label for="demo-age">Age:</label>
                <input type="number" id="demo-age" name="age" min="18" max="120" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="demo-website">Website:</label>
                <input type="url" id="demo-website" name="website" placeholder="https://example.com" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="demo-birthday">Birthday:</label>
                <input type="date" id="demo-birthday" name="birthday" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="demo-color">Favorite Color:</label>
                <input type="color" id="demo-color" name="color" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="demo-satisfaction">Satisfaction (1-10):</label>
                <input type="range" id="demo-satisfaction" name="satisfaction" min="1" max="10" class="form-control">
            </div>
        </div>
        
        <div class="note">
            <h3>Browser Support:</h3>
            <p>Not all browsers support all HTML5 input types equally. When a browser doesn't support a specific input type, it falls back to a standard text input. Always test your forms across different browsers and consider using JavaScript for additional validation.</p>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Checkboxes and Radio Buttons</h2>
        <p>Checkboxes and radio buttons allow users to select options from a predefined list.</p>
        
        <h3>Checkboxes</h3>
        <p>Checkboxes (<code>&lt;input type="checkbox"&gt;</code>) allow users to select multiple options from a group:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;h3&gt;Select your interests:&lt;/h3&gt;<br>
                &lt;div&gt;<br>
                &nbsp;&nbsp;&lt;input type="checkbox" id="coding" name="interests" value="coding"&gt;<br>
                &nbsp;&nbsp;&lt;label for="coding"&gt;Coding&lt;/label&gt;<br>
                &lt;/div&gt;<br>
                &lt;div&gt;<br>
                &nbsp;&nbsp;&lt;input type="checkbox" id="music" name="interests" value="music"&gt;<br>
                &nbsp;&nbsp;&lt;label for="music"&gt;Music&lt;/label&gt;<br>
                &lt;/div&gt;<br>
                &lt;div&gt;<br>
                &nbsp;&nbsp;&lt;input type="checkbox" id="sports" name="interests" value="sports"&gt;<br>
                &nbsp;&nbsp;&lt;label for="sports"&gt;Sports&lt;/label&gt;<br>
                &lt;/div&gt;
            </div>
        </div>
        
        <div class="demo-form">
            <h4>Select your interests:</h4>
            <div class="form-group">
                <input type="checkbox" id="coding-demo" name="interests" value="coding">
                <label for="coding-demo">Coding</label>
            </div>
            <div class="form-group">
                <input type="checkbox" id="music-demo" name="interests" value="music">
                <label for="music-demo">Music</label>
            </div>
            <div class="form-group">
                <input type="checkbox" id="sports-demo" name="interests" value="sports">
                <label for="sports-demo">Sports</label>
            </div>
        </div>
        
        <h3>Radio Buttons</h3>
        <p>Radio buttons (<code>&lt;input type="radio"&gt;</code>) allow users to select only one option from a group. Radio buttons with the same <code>name</code> attribute form a group:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;h3&gt;Select your gender:&lt;/h3&gt;<br>
                &lt;div&gt;<br>
                &nbsp;&nbsp;&lt;input type="radio" id="male" name="gender" value="male"&gt;<br>
                &nbsp;&nbsp;&lt;label for="male"&gt;Male&lt;/label&gt;<br>
                &lt;/div&gt;<br>
                &lt;div&gt;<br>
                &nbsp;&nbsp;&lt;input type="radio" id="female" name="gender" value="female"&gt;<br>
                &nbsp;&nbsp;&lt;label for="female"&gt;Female&lt;/label&gt;<br>
                &lt;/div&gt;<br>
                &lt;div&gt;<br>
                &nbsp;&nbsp;&lt;input type="radio" id="other" name="gender" value="other"&gt;<br>
                &nbsp;&nbsp;&lt;label for="other"&gt;Other&lt;/label&gt;<br>
                &lt;/div&gt;
            </div>
        </div>
        
        <div class="demo-form">
            <h4>Select your gender:</h4>
            <div class="form-group">
                <input type="radio" id="male-demo" name="gender" value="male">
                <label for="male-demo">Male</label>
            </div>
            <div class="form-group">
                <input type="radio" id="female-demo" name="gender" value="female">
                <label for="female-demo">Female</label>
            </div>
            <div class="form-group">
                <input type="radio" id="other-demo" name="gender" value="other">
                <label for="other-demo">Other</label>
            </div>
        </div>
        
        <div class="note">
            <h3>Important Attributes for Checkboxes and Radio Buttons:</h3>
            <ul>
                <li><code>checked</code> - Pre-selects the option</li>
                <li><code>value</code> - Specifies the value sent to the server when selected</li>
                <li><code>name</code> - Groups radio buttons together (only one in a group can be selected)</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Select Dropdowns</h2>
        <p>The <code>&lt;select&gt;</code> element creates a dropdown list of options for users to choose from:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;label for="country"&gt;Select your country:&lt;/label&gt;<br>
                &lt;select id="country" name="country"&gt;<br>
                &nbsp;&nbsp;&lt;option value=""&gt;--Please choose an option--&lt;/option&gt;<br>
                &nbsp;&nbsp;&lt;option value="usa"&gt;United States&lt;/option&gt;<br>
                &nbsp;&nbsp;&lt;option value="canada"&gt;Canada&lt;/option&gt;<br>
                &nbsp;&nbsp;&lt;option value="uk"&gt;United Kingdom&lt;/option&gt;<br>
                &nbsp;&nbsp;&lt;option value="australia"&gt;Australia&lt;/option&gt;<br>
                &lt;/select&gt;
            </div>
        </div>
        
        <div class="demo-form">
            <div class="form-group">
                <label for="country-demo">Select your country:</label>
                <select id="country-demo" name="country" class="form-control">
                    <option value="">--Please choose an option--</option>
                    <option value="usa">United States</option>
                    <option value="canada">Canada</option>
                    <option value="uk">United Kingdom</option>
                    <option value="australia">Australia</option>
                </select>
            </div>
        </div>
        
        <h3>Option Groups</h3>
        <p>You can group related options using the <code>&lt;optgroup&gt;</code> element:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;label for="car"&gt;Choose a car:&lt;/label&gt;<br>
                &lt;select id="car" name="car"&gt;<br>
                &nbsp;&nbsp;&lt;optgroup label="European Cars"&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;option value="volvo"&gt;Volvo&lt;/option&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;option value="mercedes"&gt;Mercedes&lt;/option&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;option value="audi"&gt;Audi&lt;/option&gt;<br>
                &nbsp;&nbsp;&lt;/optgroup&gt;<br>
                &nbsp;&nbsp;&lt;optgroup label="American Cars"&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;option value="ford"&gt;Ford&lt;/option&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;option value="chevrolet"&gt;Chevrolet&lt;/option&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;option value="dodge"&gt;Dodge&lt;/option&gt;<br>
                &nbsp;&nbsp;&lt;/optgroup&gt;<br>
                &lt;/select&gt;
            </div>
        </div>
        
        <div class="demo-form">
            <div class="form-group">
                <label for="car-demo">Choose a car:</label>
                <select id="car-demo" name="car" class="form-control">
                    <optgroup label="European Cars">
                        <option value="volvo">Volvo</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </optgroup>
                    <optgroup label="American Cars">
                        <option value="ford">Ford</option>
                        <option value="chevrolet">Chevrolet</option>
                        <option value="dodge">Dodge</option>
                    </optgroup>
                </select>
            </div>
        </div>
        
        <h3>Multiple Selection</h3>
        <p>You can allow users to select multiple options by adding the <code>multiple</code> attribute:</p>
        
        <div class="example">
            <div class="code-block">
                &lt;label for="languages"&gt;Select programming languages you know:&lt;/label&gt;<br>
                &lt;select id="languages" name="languages" multiple size="4"&gt;<br>
                &nbsp;&nbsp;&lt;option value="html"&gt;HTML&lt;/option&gt;<br>
                &nbsp;&nbsp;&lt;option value="css"&gt;CSS&lt;/option&gt;<br>
                &nbsp;&nbsp;&lt;option value="javascript"&gt;JavaScript&lt;/option&gt;<br>
                &nbsp;&nbsp;&lt;option value="python"&gt;Python&lt;/option&gt;<br>
                &nbsp;&nbsp;&lt;option value="java"&gt;Java&lt;/option&gt;<br>
                &nbsp;&nbsp;&lt;option value="csharp"&gt;C#&lt;/option&gt;<br>
                &lt;/select&gt;<br>
                &lt;p&gt;&lt;small&gt;Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.&lt;/small&gt;&lt;/p&gt;
            </div>
        </div>
        
        <div class="demo-form">
            <div class="form-group">
                <label for="languages-demo">Select programming languages you know:</label>
                <select id="languages-demo" name="languages" multiple size="4" class="form-control">
                    <option value="html">HTML</option>
                    <option value="css">CSS</option>
                    <option value="javascript">JavaScript</option>
                    <option value="python">Python</option>
                    <option value="java">Java</option>
                    <option value="csharp">C#</option>
                </select>
                <p><small>Hold down the Ctrl (Windows) or Command (Mac) button to select multiple options.</small></p>
            </div>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Buttons and Form Submission</h2>
        <p>Buttons are used to trigger actions in forms, such as submitting data or resetting the form.</p>
        
        <h3>Types of Buttons</h3>
        <table class="comparison-table">
            <tr>
                <th>Button Type</th>
                <th>Description</th>
                <th>Example</th>
            </tr>
            <tr>
                <td>Submit Button</td>
                <td>Submits the form data to the server</td>
                <td><code>&lt;button type="submit"&gt;Submit&lt;/button&gt;</code> or<br>
                    <code>&lt;input type="submit" value="Submit"&gt;</code></td>
            </tr>
            <tr>
                <td>Reset Button</td>
                <td>Resets all form controls to their initial values</td>
                <td><code>&lt;button type="reset"&gt;Reset&lt;/button&gt;</code> or<br>
                    <code>&lt;input type="reset" value="Reset"&gt;</code></td>
            </tr>
            <tr>
                <td>Regular Button</td>
                <td>Does nothing by default, but can be used with JavaScript</td>
                <td><code>&lt;button type="button"&gt;Click Me&lt;/button&gt;</code> or<br>
                    <code>&lt;input type="button" value="Click Me"&gt;</code></td>
            </tr>
        </table>
        
        <div class="example">
            <h3>Button Examples:</h3>
            <div class="code-block">
                &lt;form action="/submit" method="post"&gt;<br>
                &nbsp;&nbsp;&lt;!-- Form fields here --&gt;<br><br>
                
                &nbsp;&nbsp;&lt;!-- Submit button --&gt;<br>
                &nbsp;&nbsp;&lt;button type="submit"&gt;Submit Form&lt;/button&gt;<br><br>
                
                &nbsp;&nbsp;&lt;!-- Reset button --&gt;<br>
                &nbsp;&nbsp;&lt;button type="reset"&gt;Clear Form&lt;/button&gt;<br><br>
                
                &nbsp;&nbsp;&lt;!-- Regular button with JavaScript --&gt;<br>
                &nbsp;&nbsp;&lt;button type="button" onclick="validateForm()"&gt;Validate&lt;/button&gt;<br>
                &lt;/form&gt;
            </div>
        </div>
        
        <div class="demo-form">
            <div class="form-group">
                <button type="submit" class="btn">Submit Form</button>
                <button type="reset" class="btn" style="background-color: #e74c3c;">Clear Form</button>
                <button type="button" class="btn" style="background-color: #2ecc71;">Validate</button>
            </div>
        </div>
        
        <h3>Button vs. Input</h3>
        <p>There are two ways to create buttons in HTML:</p>
        <ul>
            <li><code>&lt;button&gt;</code> element - More flexible, can contain HTML content</li>
            <li><code>&lt;input type="submit|reset|button"&gt;</code> - Simpler, self-closing element</li>
        </ul>
        
        <div class="example">
            <h3>Button vs. Input Comparison:</h3>
            <div class="code-block">
                &lt;!-- Button element with HTML content --&gt;<br>
                &lt;button type="submit"&gt;&lt;img src="icon.png" alt=""&gt; Submit with Icon&lt;/button&gt;<br><br>
                
                &lt;!-- Input element (can only have plain text via the value attribute) --&gt;<br>
                &lt;input type="submit" value="Submit"&gt;
            </div>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Form Validation and Accessibility</h2>
        
        <h3>HTML5 Form Validation</h3>
        <p>HTML5 provides built-in form validation through various attributes:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Attribute</th>
                <th>Description</th>
                <th>Example</th>
            </tr>
            <tr>
                <td><code>required</code></td>
                <td>Specifies that the input field must be filled out</td>
                <td><code>&lt;input type="text" required&gt;</code></td>
            </tr>
            <tr>
                <td><code>minlength</code> / <code>maxlength</code></td>
                <td>Specifies minimum/maximum length for text input</td>
                <td><code>&lt;input type="text" minlength="5" maxlength="10"&gt;</code></td>
            </tr>
            <tr>
                <td><code>min</code> / <code>max</code></td>
                <td>Specifies minimum/maximum values for numeric inputs</td>
                <td><code>&lt;input type="number" min="1" max="100"&gt;</code></td>
            </tr>
            <tr>
                <td><code>pattern</code></td>
                <td>Specifies a regular expression pattern for validation</td>
                <td><code>&lt;input type="text" pattern="[A-Za-z]{3}"&gt;</code></td>
            </tr>
        </table>
        
        <div class="example">
            <h3>Form Validation Example:</h3>
            <div class="code-block">
                &lt;form&gt;<br>
                &nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="username"&gt;Username (3-12 characters):&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="text" id="username" name="username" <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;required minlength="3" maxlength="12" <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pattern="[a-zA-Z0-9]+"&gt;<br>
                &nbsp;&nbsp;&lt;/div&gt;<br><br>
                
                &nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="email"&gt;Email:&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="email" id="email" name="email" required&gt;<br>
                &nbsp;&nbsp;&lt;/div&gt;<br><br>
                
                &nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="age"&gt;Age (18-120):&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="number" id="age" name="age" min="18" max="120"&gt;<br>
                &nbsp;&nbsp;&lt;/div&gt;<br><br>
                
                &nbsp;&nbsp;&lt;button type="submit"&gt;Submit&lt;/button&gt;<br>
                &lt;/form&gt;
            </div>
        </div>
        
        <h3>Form Accessibility Best Practices</h3>
        <ol>
            <li><strong>Use Labels</strong> - Always associate labels with form controls using the <code>for</code> attribute that matches the input's <code>id</code>.</li>
            <li><strong>Group Related Fields</strong> - Use <code>&lt;fieldset&gt;</code> and <code>&lt;legend&gt;</code> to group related form controls.</li>
            <li><strong>Provide Clear Instructions</strong> - Use placeholder text, help text, or aria attributes to provide guidance.</li>
            <li><strong>Indicate Required Fields</strong> - Clearly mark which fields are required.</li>
            <li><strong>Provide Error Messages</strong> - Use clear, specific error messages that explain how to fix the issue.</li>
            <li><strong>Maintain Keyboard Navigation</strong> - Ensure all form controls can be accessed and operated using a keyboard.</li>
        </ol>
        
        <div class="example">
            <h3>Accessible Form Example:</h3>
            <div class="code-block">
                &lt;form&gt;<br>
                &nbsp;&nbsp;&lt;fieldset&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;legend&gt;Personal Information&lt;/legend&gt;<br><br>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="full-name"&gt;Full Name&lt;span aria-label="required"&gt;*&lt;/span&gt;:&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="text" id="full-name" name="fullname" required <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;aria-required="true" aria-describedby="name-help"&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p id="name-help" class="help-text"&gt;Please enter your first and last name.&lt;/p&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br><br>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="user-email"&gt;Email Address&lt;span aria-label="required"&gt;*&lt;/span&gt;:&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="email" id="user-email" name="email" required <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;aria-required="true"&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br>
                &nbsp;&nbsp;&lt;/fieldset&gt;<br><br>
                
                &nbsp;&nbsp;&lt;fieldset&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;legend&gt;Preferences&lt;/legend&gt;<br><br>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt;How would you like to be contacted?&lt;/p&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="radio" id="contact-email" name="contact" value="email"&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="contact-email"&gt;Email&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;input type="radio" id="contact-phone" name="contact" value="phone"&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;label for="contact-phone"&gt;Phone&lt;/label&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&lt;/div&gt;<br>
                &nbsp;&nbsp;&lt;/fieldset&gt;<br><br>
                
                &nbsp;&nbsp;&lt;button type="submit"&gt;Submit&lt;/button&gt;<br>
                &lt;/form&gt;
            </div>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Create a Registration Form</h2>
        <p>Practice creating forms by building a user registration form:</p>
        
        <div>
            <textarea id="htmlEditor" rows="20" style="width: 100%; font-family: monospace; padding: 10px;"><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        /* Add your CSS styles here to make the form look good */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
        }
        
        /* Add form styles here */
        
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>User Registration</h1>
    
    <!-- Create a registration form with:
    1. Personal information section (name, email, password)
    2. Profile information section (bio, profile picture upload)
    3. Preferences section (newsletter subscription, theme preference)
    4. Use appropriate input types, validation, and accessibility features
    5. Include a submit button and a reset button -->
    
</body>
</html></textarea>
            <button onclick="updatePreview()">Update Preview</button>
        </div>
        
        <h3>Preview:</h3>
        <iframe id="previewFrame" style="width: 100%; height: 500px; border: 1px solid #ddd; border-radius: 4px;"></iframe>
        
        <div class="note" style="margin-top: 20px;">
            <h3>Hint:</h3>
            <p>Try to include:</p>
            <ul>
                <li>Different input types (text, email, password, file, etc.)</li>
                <li>Form validation attributes (required, pattern, etc.)</li>
                <li>Fieldsets and legends to group related fields</li>
                <li>Proper labels for all form controls</li>
                <li>Clear instructions and error messages</li>
                <li>Submit and reset buttons</li>
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
    &lt;title&gt;User Registration&lt;/title&gt;
    &lt;style&gt;
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: #f9f9f9;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        fieldset {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        legend {
            font-weight: bold;
            padding: 0 10px;
            color: #3498db;
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
        input[type="password"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        
        input[type="radio"],
        input[type="checkbox"] {
            margin-right: 5px;
        }
        
        .radio-group,
        .checkbox-group {
            margin-bottom: 10px;
        }
        
        .radio-group label,
        .checkbox-group label {
            display: inline;
            font-weight: normal;
        }
        
        .help-text {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
        
        .required {
            color: #e74c3c;
        }
        
        button {
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }
        
        button[type="reset"] {
            background-color: #e74c3c;
        }
        
        button:hover {
            opacity: 0.9;
        }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;User Registration&lt;/h1&gt;
    
    &lt;form action="/register" method="post" enctype="multipart/form-data"&gt;
        &lt;fieldset&gt;
            &lt;legend&gt;Personal Information&lt;/legend&gt;
            
            &lt;div class="form-group"&gt;
                &lt;label for="fullname"&gt;Full Name &lt;span class="required"&gt;*&lt;/span&gt;&lt;/label&gt;
                &lt;input type="text" id="fullname" name="fullname" required 
                       aria-required="true" aria-describedby="name-help"&gt;
                &lt;p id="name-help" class="help-text"&gt;Please enter your first and last name.&lt;/p&gt;
            &lt;/div&gt;
            
            &lt;div class="form-group"&gt;
                &lt;label for="email"&gt;Email Address &lt;span class="required"&gt;*&lt;/span&gt;&lt;/label&gt;
                &lt;input type="email" id="email" name="email" required 
                       aria-required="true"&gt;
            &lt;/div&gt;
            
            &lt;div class="form-group"&gt;
                &lt;label for="password"&gt;Password &lt;span class="required"&gt;*&lt;/span&gt;&lt;/label&gt;
                &lt;input type="password" id="password" name="password" 
                       required minlength="8" 
                       aria-required="true" aria-describedby="password-help"&gt;
                &lt;p id="password-help" class="help-text"&gt;Password must be at least 8 characters long.&lt;/p&gt;
            &lt;/div&gt;
            
            &lt;div class="form-group"&gt;
                &lt;label for="confirm-password"&gt;Confirm Password &lt;span class="required"&gt;*&lt;/span&gt;&lt;/label&gt;
                &lt;input type="password" id="confirm-password" name="confirm-password" 
                       required minlength="8" aria-required="true"&gt;
            &lt;/div&gt;
        &lt;/fieldset&gt;
        
        &lt;fieldset&gt;
            &lt;legend&gt;Profile Information&lt;/legend&gt;
            
            &lt;div class="form-group"&gt;
                &lt;label for="bio"&gt;Bio&lt;/label&gt;
                &lt;textarea id="bio" name="bio" rows="4" 
                          placeholder="Tell us about yourself..." 
                          maxlength="500"&gt;&lt;/textarea&gt;
                &lt;p class="help-text"&gt;Maximum 500 characters.&lt;/p&gt;
            &lt;/div&gt;
            
            &lt;div class="form-group"&gt;
                &lt;label for="birthdate"&gt;Date of Birth&lt;/label&gt;
                &lt;input type="date" id="birthdate" name="birthdate"&gt;
            &lt;/div&gt;
            
            &lt;div class="form-group"&gt;
                &lt;label for="profile-picture"&gt;Profile Picture&lt;/label&gt;
                &lt;input type="file" id="profile-picture" name="profile-picture" 
                       accept="image/*" aria-describedby="picture-help"&gt;
                &lt;p id="picture-help" class="help-text"&gt;Accepted formats: JPG, PNG, GIF. Max size: 2MB.&lt;/p&gt;
            &lt;/div&gt;
        &lt;/fieldset&gt;
        
        &lt;fieldset&gt;
            &lt;legend&gt;Preferences&lt;/legend&gt;
            
            &lt;div class="form-group"&gt;
                &lt;label&gt;Gender&lt;/label&gt;
                &lt;div class="radio-group"&gt;
                    &lt;input type="radio" id="male" name="gender" value="male"&gt;
                    &lt;label for="male"&gt;Male&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class="radio-group"&gt;
                    &lt;input type="radio" id="female" name="gender" value="female"&gt;
                    &lt;label for="female"&gt;Female&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class="radio-group"&gt;
                    &lt;input type="radio" id="other" name="gender" value="other"&gt;
                    &lt;label for="other"&gt;Other&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class="radio-group"&gt;
                    &lt;input type="radio" id="prefer-not" name="gender" value="prefer-not"&gt;
                    &lt;label for="prefer-not"&gt;Prefer not to say&lt;/label&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            
            &lt;div class="form-group"&gt;
                &lt;label for="theme"&gt;Preferred Theme&lt;/label&gt;
                &lt;select id="theme" name="theme"&gt;
                    &lt;option value="light"&gt;Light&lt;/option&gt;
                    &lt;option value="dark"&gt;Dark&lt;/option&gt;
                    &lt;option value="system"&gt;System Default&lt;/option&gt;
                &lt;/select&gt;
            &lt;/div&gt;
            
            &lt;div class="form-group"&gt;
                &lt;div class="checkbox-group"&gt;
                    &lt;input type="checkbox" id="newsletter" name="newsletter" value="yes"&gt;
                    &lt;label for="newsletter"&gt;Subscribe to our newsletter&lt;/label&gt;
                &lt;/div&gt;
            &lt;/div&gt;
            
            &lt;div class="form-group"&gt;
                &lt;label&gt;Interests (select all that apply)&lt;/label&gt;
                &lt;div class="checkbox-group"&gt;
                    &lt;input type="checkbox" id="tech" name="interests" value="tech"&gt;
                    &lt;label for="tech"&gt;Technology&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class="checkbox-group"&gt;
                    &lt;input type="checkbox" id="sports" name="interests" value="sports"&gt;
                    &lt;label for="sports"&gt;Sports&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class="checkbox-group"&gt;
                    &lt;input type="checkbox" id="music" name="interests" value="music"&gt;
                    &lt;label for="music"&gt;Music&lt;/label&gt;
                &lt;/div&gt;
                &lt;div class="checkbox-group"&gt;
                    &lt;input type="checkbox" id="art" name="interests" value="art"&gt;
                    &lt;label for="art"&gt;Art&lt;/label&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/fieldset&gt;
        
        &lt;div class="form-group"&gt;
            &lt;div class="checkbox-group"&gt;
                &lt;input type="checkbox" id="terms" name="terms" required&gt;
                &lt;label for="terms"&gt;I agree to the &lt;a href="#"&gt;Terms and Conditions&lt;/a&gt; &lt;span class="required"&gt;*&lt;/span&gt;&lt;/label&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        
        &lt;div class="form-group"&gt;
            &lt;button type="submit"&gt;Register&lt;/button&gt;
            &lt;button type="reset"&gt;Clear Form&lt;/button&gt;
        &lt;/div&gt;
    &lt;/form&gt;
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
            1. Which HTML element is used to create a form?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> &lt;input&gt;</label>
            <label><input type="radio" name="q1" value="b"> &lt;form&gt;</label>
            <label><input type="radio" name="q1" value="c"> &lt;formfield&gt;</label>
            <label><input type="radio" name="q1" value="d"> &lt;fieldset&gt;</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which attribute specifies where to send the form data when a form is submitted?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> method</label>
            <label><input type="radio" name="q2" value="b"> destination</label>
            <label><input type="radio" name="q2" value="c"> action</label>
            <label><input type="radio" name="q2" value="d"> target</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which input type would you use for a password field?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> &lt;input type="password"&gt;</label>
            <label><input type="radio" name="q3" value="b"> &lt;input type="secret"&gt;</label>
            <label><input type="radio" name="q3" value="c"> &lt;input type="hidden"&gt;</label>
            <label><input type="radio" name="q3" value="d"> &lt;input type="secure"&gt;</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. Which attribute makes a form field required?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> mandatory</label>
            <label><input type="radio" name="q4" value="b"> required</label>
            <label><input type="radio" name="q4" value="c"> validate</label>
            <label><input type="radio" name="q4" value="d"> necessary</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. Which element is used to group related form elements?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> &lt;group&gt;</label>
            <label><input type="radio" name="q5" value="b"> &lt;section&gt;</label>
            <label><input type="radio" name="q5" value="c"> &lt;div&gt;</label>
            <label><input type="radio" name="q5" value="d"> &lt;fieldset&gt;</label>
        </div>
        <div id="feedback5" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'b',
                    q2: 'c',
                    q3: 'a',
                    q4: 'b',
                    q5: 'd'
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
            <button onclick="window.location.href='07_tables.php'">Previous Lesson: Tables</button>
        </div>
        <div>
            <button onclick="window.location.href='../index.html'">Back to Course Home</button>
        </div>
    </div>
</body>
</html>
