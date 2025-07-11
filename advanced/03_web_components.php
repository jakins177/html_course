<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Components</title>
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
        
        /* Web Components specific styles */
        .demo-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            background-color: #f8f9fa;
        }
        .component-preview {
            border: 1px dashed #ccc;
            padding: 15px;
            margin: 15px 0;
            background-color: #fff;
        }
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
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Web Components</h1>
    
    <div class="lesson-container">
        <h2>Introduction to Web Components</h2>
        <p>Web Components are a set of web platform APIs that allow you to create custom, reusable, encapsulated HTML elements. They are built on the web standards and work across modern browsers. Web Components consist of four main technologies:</p>
        
        <ol>
            <li><strong>Custom Elements</strong>: A set of JavaScript APIs for defining custom HTML elements and their behavior</li>
            <li><strong>Shadow DOM</strong>: A set of JavaScript APIs for attaching an encapsulated "shadow" DOM tree to an element</li>
            <li><strong>HTML Templates</strong>: The <code>&lt;template&gt;</code> and <code>&lt;slot&gt;</code> elements for writing markup templates</li>
            <li><strong>ES Modules</strong>: The JavaScript modules system used for creating shareable components</li>
        </ol>
        
        <div class="example">
            <h3>Why Use Web Components?</h3>
            <ul>
                <li><strong>Reusability</strong>: Create components once and reuse them across your application or even in different projects</li>
                <li><strong>Encapsulation</strong>: Keep the markup, styles, and behaviors hidden and separate from other code on the page</li>
                <li><strong>Standardization</strong>: Based on web standards rather than framework-specific implementations</li>
                <li><strong>Interoperability</strong>: Work with any JavaScript library or framework (React, Angular, Vue, etc.)</li>
                <li><strong>Maintainability</strong>: Components are self-contained, making them easier to update and maintain</li>
            </ul>
        </div>
        
        <h3>Browser Support</h3>
        <p>Web Components are supported in all modern browsers. However, some older browsers may require polyfills. The current browser support is:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Feature</th>
                <th>Chrome</th>
                <th>Firefox</th>
                <th>Safari</th>
                <th>Edge</th>
            </tr>
            <tr>
                <td>Custom Elements</td>
                <td>67+</td>
                <td>63+</td>
                <td>10.1+</td>
                <td>79+</td>
            </tr>
            <tr>
                <td>Shadow DOM</td>
                <td>53+</td>
                <td>63+</td>
                <td>10+</td>
                <td>79+</td>
            </tr>
            <tr>
                <td>HTML Templates</td>
                <td>26+</td>
                <td>22+</td>
                <td>8+</td>
                <td>13+</td>
            </tr>
            <tr>
                <td>ES Modules</td>
                <td>61+</td>
                <td>60+</td>
                <td>10.1+</td>
                <td>16+</td>
            </tr>
        </table>
        
        <div class="note">
            <p>For older browsers, you can use the <a href="https://github.com/webcomponents/polyfills" target="_blank">Web Components polyfills</a> to ensure compatibility.</p>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Custom Elements</h2>
        <p>Custom Elements allow you to define your own custom HTML elements with their own behavior. There are two types of custom elements:</p>
        
        <ul>
            <li><strong>Autonomous custom elements</strong>: Brand new elements that extend the abstract <code>HTMLElement</code> class</li>
            <li><strong>Customized built-in elements</strong>: Elements that extend existing HTML elements</li>
        </ul>
        
        <h3>Creating an Autonomous Custom Element</h3>
        <p>To create a custom element, you define a class that extends <code>HTMLElement</code> and register it with <code>customElements.define()</code>:</p>
        
        <div class="code-block">
            // Define the custom element class
            class HelloWorld extends HTMLElement {
                // Element lifecycle methods
                constructor() {
                    // Always call super() first in the constructor
                    super();
                    
                    // Element initialization code
                    this.textContent = 'Hello, World!';
                }
                
                // Called when the element is added to the document
                connectedCallback() {
                    console.log('Custom element added to page.');
                }
                
                // Called when the element is removed from the document
                disconnectedCallback() {
                    console.log('Custom element removed from page.');
                }
                
                // Called when an attribute is added, removed, or changed
                attributeChangedCallback(name, oldValue, newValue) {
                    console.log(`Attribute ${name} changed from ${oldValue} to ${newValue}`);
                }
                
                // Specify which attributes to observe for changes
                static get observedAttributes() {
                    return ['title', 'color'];
                }
            }
            
            // Register the custom element
            customElements.define('hello-world', HelloWorld);
            
            // Now you can use it in your HTML
            // <hello-world></hello-world>
        </div>
        
        <div class="note">
            <h3>Custom Element Naming Rules:</h3>
            <ul>
                <li>The name must contain a hyphen (-) to distinguish it from built-in elements</li>
                <li>The name cannot be a single character</li>
                <li>The name cannot start with a hyphen</li>
                <li>The name cannot contain uppercase letters</li>
            </ul>
        </div>
        
        <div class="demo-container">
            <h3>Basic Custom Element Demo:</h3>
            <div class="component-preview" id="basic-custom-element-preview">
                <!-- The custom element will be inserted here -->
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Check if custom elements are supported
                    if (window.customElements) {
                        // Define the custom element
                        class HelloWorld extends HTMLElement {
                            constructor() {
                                super();
                                this.textContent = 'Hello, World! I am a custom element.';
                                this.style.display = 'block';
                                this.style.padding = '10px';
                                this.style.backgroundColor = '#e8f4fc';
                                this.style.borderRadius = '5px';
                                this.style.marginTop = '10px';
                            }
                            
                            connectedCallback() {
                                console.log('Hello-world element added to the page.');
                            }
                        }
                        
                        // Register the custom element if it hasn't been registered yet
                        if (!customElements.get('hello-world')) {
                            customElements.define('hello-world', HelloWorld);
                        }
                        
                        // Add the element to the preview
                        const preview = document.getElementById('basic-custom-element-preview');
                        preview.innerHTML = '<hello-world></hello-world>';
                    } else {
                        // Fallback for browsers that don't support custom elements
                        const preview = document.getElementById('basic-custom-element-preview');
                        preview.innerHTML = '<div style="padding: 10px; background-color: #fdedec; border-radius: 5px;">Your browser does not support Custom Elements.</div>';
                    }
                });
            </script>
        </div>
        
        <h3>Creating a Customized Built-in Element</h3>
        <p>You can also extend existing HTML elements to create customized built-in elements:</p>
        
        <div class="code-block">
            // Define a class that extends a specific HTML element
            class FancyButton extends HTMLButtonElement {
                constructor() {
                    super();
                    this.style.backgroundColor = '#3498db';
                    this.style.color = 'white';
                    this.style.border = 'none';
                    this.style.padding = '10px 20px';
                    this.style.borderRadius = '5px';
                    this.style.cursor = 'pointer';
                    
                    // Add a click event listener
                    this.addEventListener('click', () => {
                        this.style.backgroundColor = '#2980b9';
                    });
                }
            }
            
            // Register the custom element with the 'extends' option
            customElements.define('fancy-button', FancyButton, { extends: 'button' });
            
            // Use it in HTML with the 'is' attribute
            // <button is="fancy-button">Click me</button>
        </div>
        
        <div class="demo-container">
            <h3>Customized Built-in Element Demo:</h3>
            <div class="component-preview" id="builtin-custom-element-preview">
                <!-- The custom element will be inserted here -->
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Check if custom elements are supported
                    if (window.customElements) {
                        try {
                            // Define the custom element
                            class FancyButton extends HTMLButtonElement {
                                constructor() {
                                    super();
                                    this.style.backgroundColor = '#3498db';
                                    this.style.color = 'white';
                                    this.style.border = 'none';
                                    this.style.padding = '10px 20px';
                                    this.style.borderRadius = '5px';
                                    this.style.cursor = 'pointer';
                                    this.style.transition = 'background-color 0.3s';
                                    
                                    // Add a click event listener
                                    this.addEventListener('click', () => {
                                        this.style.backgroundColor = this.style.backgroundColor === 'rgb(52, 152, 219)' ? 
                                            '#2980b9' : '#3498db';
                                    });
                                }
                            }
                            
                            // Register the custom element if it hasn't been registered yet
                            if (!customElements.get('fancy-button')) {
                                customElements.define('fancy-button', FancyButton, { extends: 'button' });
                            }
                            
                            // Add the element to the preview
                            const preview = document.getElementById('builtin-custom-element-preview');
                            preview.innerHTML = '<button is="fancy-button">Click me (I\'m a customized button)</button>';
                        } catch (e) {
                            // Some browsers don't support customized built-in elements
                            const preview = document.getElementById('builtin-custom-element-preview');
                            preview.innerHTML = '<div style="padding: 10px; background-color: #fdedec; border-radius: 5px;">Your browser may not support Customized Built-in Elements.</div>';
                            console.error('Error creating customized built-in element:', e);
                        }
                    } else {
                        // Fallback for browsers that don't support custom elements
                        const preview = document.getElementById('builtin-custom-element-preview');
                        preview.innerHTML = '<div style="padding: 10px; background-color: #fdedec; border-radius: 5px;">Your browser does not support Custom Elements.</div>';
                    }
                });
            </script>
        </div>
        
        <h3>Lifecycle Callbacks</h3>
        <p>Custom elements have several lifecycle callbacks that allow you to run code at specific points:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Callback</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><code>constructor()</code></td>
                <td>Called when the element is created or upgraded</td>
            </tr>
            <tr>
                <td><code>connectedCallback()</code></td>
                <td>Called when the element is added to the document</td>
            </tr>
            <tr>
                <td><code>disconnectedCallback()</code></td>
                <td>Called when the element is removed from the document</td>
            </tr>
            <tr>
                <td><code>attributeChangedCallback(name, oldValue, newValue)</code></td>
                <td>Called when an observed attribute is added, removed, or changed</td>
            </tr>
            <tr>
                <td><code>adoptedCallback()</code></td>
                <td>Called when the element is moved to a new document</td>
            </tr>
        </table>
    </div>
    
    <div class="lesson-container">
        <h2>Shadow DOM</h2>
        <p>Shadow DOM provides encapsulation for DOM and CSS. It allows a component to have its own "shadow" DOM tree that is separate from the main document DOM. This means:</p>
        
        <ul>
            <li>CSS styles defined inside the shadow DOM don't affect elements outside it</li>
            <li>CSS styles defined outside the shadow DOM don't affect elements inside it (with some exceptions)</li>
            <li>JavaScript can't easily access DOM elements inside the shadow DOM</li>
        </ul>
        
        <h3>Creating a Shadow DOM</h3>
        <p>To create a shadow DOM for an element, you use the <code>attachShadow()</code> method:</p>
        
        <div class="code-block">
            class ShadowCard extends HTMLElement {
                constructor() {
                    super();
                    
                    // Create a shadow root
                    const shadow = this.attachShadow({ mode: 'open' });
                    
                    // Create elements inside the shadow DOM
                    const wrapper = document.createElement('div');
                    wrapper.setAttribute('class', 'card');
                    
                    const title = document.createElement('h3');
                    title.textContent = this.getAttribute('title') || 'Default Title';
                    
                    const content = document.createElement('div');
                    content.setAttribute('class', 'content');
                    content.textContent = this.getAttribute('content') || 'Default content';
                    
                    // Create CSS for the shadow DOM
                    const style = document.createElement('style');
                    style.textContent = `
                        .card {
                            border: 1px solid #ddd;
                            border-radius: 5px;
                            padding: 15px;
                            margin: 15px 0;
                            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                        }
                        h3 {
                            margin-top: 0;
                            color: #3498db;
                        }
                        .content {
                            color: #333;
                        }
                    `;
                    
                    // Append elements to the shadow DOM
                    shadow.appendChild(style);
                    shadow.appendChild(wrapper);
                    wrapper.appendChild(title);
                    wrapper.appendChild(content);
                }
            }
            
            customElements.define('shadow-card', ShadowCard);
            
            // Use it in HTML
            // <shadow-card title="My Card" content="This is the card content."></shadow-card>
        </div>
        
        <div class="note">
            <h3>Shadow DOM Modes:</h3>
            <ul>
                <li><code>{ mode: 'open' }</code>: The shadow root can be accessed from JavaScript outside the component using <code>element.shadowRoot</code></li>
                <li><code>{ mode: 'closed' }</code>: The shadow root cannot be accessed from outside the component (<code>element.shadowRoot</code> returns null)</li>
            </ul>
        </div>
        
        <div class="demo-container">
            <h3>Shadow DOM Demo:</h3>
            <div class="component-preview" id="shadow-dom-preview">
                <!-- The shadow DOM element will be inserted here -->
            </div>
            
            <div style="margin-top: 20px;">
                <h4>External CSS (should not affect the shadow DOM):</h4>
                <style>
                    /* This style should not affect elements inside the shadow DOM */
                    .card {
                        background-color: red !important;
                        color: white !important;
                    }
                    h3 {
                        color: red !important;
                    }
                </style>
                <div class="card">
                    <h3>Regular Card (affected by external CSS)</h3>
                    <div class="content">This is a regular card that is affected by the external CSS.</div>
                </div>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Check if Shadow DOM is supported
                    if (window.ShadowRoot) {
                        // Define the custom element with Shadow DOM
                        class ShadowCard extends HTMLElement {
                            constructor() {
                                super();
                                
                                // Create a shadow root
                                const shadow = this.attachShadow({ mode: 'open' });
                                
                                // Create elements inside the shadow DOM
                                const wrapper = document.createElement('div');
                                wrapper.setAttribute('class', 'card');
                                
                                const title = document.createElement('h3');
                                title.textContent = this.getAttribute('title') || 'Shadow DOM Card';
                                
                                const content = document.createElement('div');
                                content.setAttribute('class', 'content');
                                content.textContent = this.getAttribute('content') || 
                                    'This card uses Shadow DOM. External CSS styles cannot affect its appearance.';
                                
                                // Create CSS for the shadow DOM
                                const style = document.createElement('style');
                                style.textContent = `
                                    .card {
                                        border: 1px solid #ddd;
                                        border-radius: 5px;
                                        padding: 15px;
                                        margin: 15px 0;
                                        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                                        background-color: white;
                                    }
                                    h3 {
                                        margin-top: 0;
                                        color: #3498db;
                                    }
                                    .content {
                                        color: #333;
                                    }
                                `;
                                
                                // Append elements to the shadow DOM
                                shadow.appendChild(style);
                                shadow.appendChild(wrapper);
                                wrapper.appendChild(title);
                                wrapper.appendChild(content);
                            }
                        }
                        
                        // Register the custom element if it hasn't been registered yet
                        if (!customElements.get('shadow-card')) {
                            customElements.define('shadow-card', ShadowCard);
                        }
                        
                        // Add the element to the preview
                        const preview = document.getElementById('shadow-dom-preview');
                        preview.innerHTML = '<shadow-card></shadow-card>';
                    } else {
                        // Fallback for browsers that don't support Shadow DOM
                        const preview = document.getElementById('shadow-dom-preview');
                        preview.innerHTML = '<div style="padding: 10px; background-color: #fdedec; border-radius: 5px;">Your browser does not support Shadow DOM.</div>';
                    }
                });
            </script>
        </div>
        
        <h3>Styling Shadow DOM</h3>
        <p>There are several ways to style elements in the shadow DOM:</p>
        
        <ol>
            <li><strong>Internal styles</strong>: Define styles inside the shadow DOM using a <code>&lt;style&gt;</code> element</li>
            <li><strong>External stylesheets</strong>: Link to external stylesheets using <code>&lt;link rel="stylesheet"&gt;</code> inside the shadow DOM</li>
            <li><strong>CSS custom properties (variables)</strong>: Use CSS variables to allow styling from outside the shadow DOM</li>
            <li><strong>CSS parts</strong>: Use the <code>::part()</code> pseudo-element to style specific parts from outside</li>
        </ol>
        
        <h4>Using CSS Custom Properties for Styling</h4>
        <div class="code-block">
            class ThemedCard extends HTMLElement {
                constructor() {
                    super();
                    
                    const shadow = this.attachShadow({ mode: 'open' });
                    
                    const style = document.createElement('style');
                    style.textContent = `
                        .card {
                            border: 1px solid var(--card-border-color, #ddd);
                            background-color: var(--card-bg-color, white);
                            color: var(--card-text-color, #333);
                            padding: 15px;
                            border-radius: 5px;
                        }
                        h3 {
                            color: var(--card-title-color, #3498db);
                        }
                    `;
                    
                    const card = document.createElement('div');
                    card.setAttribute('class', 'card');
                    
                    const title = document.createElement('h3');
                    title.textContent = this.getAttribute('title') || 'Themed Card';
                    
                    const content = document.createElement('div');
                    content.textContent = this.getAttribute('content') || 'This card can be themed using CSS variables.';
                    
                    shadow.appendChild(style);
                    shadow.appendChild(card);
                    card.appendChild(title);
                    card.appendChild(content);
                }
            }
            
            customElements.define('themed-card', ThemedCard);
            
            // Style it from outside using CSS variables
            /*
            themed-card {
                --card-bg-color: #f8f9fa;
                --card-border-color: #3498db;
                --card-title-color: #2c3e50;
                --card-text-color: #333;
            }
            */
        </div>
        
        <div class="demo-container">
            <h3>Themed Shadow DOM Demo:</h3>
            <style>
                #theme-default {
                    /* Default theme uses the component's default values */
                }
                
                #theme-dark {
                    --card-bg-color: #2c3e50;
                    --card-border-color: #3498db;
                    --card-title-color: #3498db;
                    --card-text-color: #ecf0f1;
                }
                
                #theme-colorful {
                    --card-bg-color: #f9ebea;
                    --card-border-color: #e74c3c;
                    --card-title-color: #c0392b;
                    --card-text-color: #7b241c;
                }
            </style>
            
            <div class="component-preview" id="themed-shadow-dom-preview">
                <!-- The themed shadow DOM elements will be inserted here -->
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Check if Shadow DOM is supported
                    if (window.ShadowRoot) {
                        // Define the custom element with themed Shadow DOM
                        class ThemedCard extends HTMLElement {
                            constructor() {
                                super();
                                
                                const shadow = this.attachShadow({ mode: 'open' });
                                
                                const style = document.createElement('style');
                                style.textContent = `
                                    .card {
                                        border: 1px solid var(--card-border-color, #ddd);
                                        background-color: var(--card-bg-color, white);
                                        color: var(--card-text-color, #333);
                                        padding: 15px;
                                        border-radius: 5px;
                                        margin: 15px 0;
                                    }
                                    h3 {
                                        color: var(--card-title-color, #3498db);
                                        margin-top: 0;
                                    }
                                `;
                                
                                const card = document.createElement('div');
                                card.setAttribute('class', 'card');
                                
                                const title = document.createElement('h3');
                                title.textContent = this.getAttribute('title') || 'Themed Card';
                                
                                const content = document.createElement('div');
                                content.textContent = this.getAttribute('content') || 
                                    'This card can be themed using CSS variables.';
                                
                                shadow.appendChild(style);
                                shadow.appendChild(card);
                                card.appendChild(title);
                                card.appendChild(content);
                            }
                        }
                        
                        // Register the custom element if it hasn't been registered yet
                        if (!customElements.get('themed-card')) {
                            customElements.define('themed-card', ThemedCard);
                        }
                        
                        // Add the elements to the preview
                        const preview = document.getElementById('themed-shadow-dom-preview');
                        preview.innerHTML = `
                            <themed-card id="theme-default" title="Default Theme" content="This card uses the default theme."></themed-card>
                            <themed-card id="theme-dark" title="Dark Theme" content="This card uses a dark theme via CSS variables."></themed-card>
                            <themed-card id="theme-colorful" title="Colorful Theme" content="This card uses a colorful theme via CSS variables."></themed-card>
                        `;
                    } else {
                        // Fallback for browsers that don't support Shadow DOM
                        const preview = document.getElementById('themed-shadow-dom-preview');
                        preview.innerHTML = '<div style="padding: 10px; background-color: #fdedec; border-radius: 5px;">Your browser does not support Shadow DOM.</div>';
                    }
                });
            </script>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>HTML Templates</h2>
        <p>HTML Templates provide a way to declare fragments of HTML that can be cloned and inserted into the document. The <code>&lt;template&gt;</code> element holds HTML that is not rendered when the page loads but can be instantiated later using JavaScript.</p>
        
        <h3>Using the Template Element</h3>
        <div class="code-block">
            <!-- HTML Template -->
            <template id="user-card-template">
                <div class="user-card">
                    <img class="avatar" src="" alt="User Avatar">
                    <div class="user-info">
                        <h3 class="name"></h3>
                        <p class="email"></p>
                        <p class="phone"></p>
                    </div>
                </div>
                <style>
                    .user-card {
                        display: flex;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        padding: 10px;
                        margin: 10px 0;
                    }
                    .avatar {
                        width: 50px;
                        height: 50px;
                        border-radius: 50%;
                        margin-right: 10px;
                    }
                    .user-info {
                        flex: 1;
                    }
                    .name {
                        margin: 0 0 5px 0;
                    }
                    .email, .phone {
                        margin: 5px 0;
                        color: #666;
                    }
                </style>
            </template>
            
            <!-- JavaScript to use the template -->
            <script>
                class UserCard extends HTMLElement {
                    constructor() {
                        super();
                        
                        // Create shadow DOM
                        const shadow = this.attachShadow({ mode: 'open' });
                        
                        // Get the template content
                        const template = document.getElementById('user-card-template');
                        const templateContent = template.content;
                        
                        // Clone the template
                        const clone = templateContent.cloneNode(true);
                        
                        // Customize the content
                        const avatar = clone.querySelector('.avatar');
                        const name = clone.querySelector('.name');
                        const email = clone.querySelector('.email');
                        const phone = clone.querySelector('.phone');
                        
                        avatar.src = this.getAttribute('avatar') || 'default-avatar.png';
                        name.textContent = this.getAttribute('name') || 'Unknown User';
                        email.textContent = this.getAttribute('email') || 'No email';
                        phone.textContent = this.getAttribute('phone') || 'No phone';
                        
                        // Append the clone to the shadow DOM
                        shadow.appendChild(clone);
                    }
                }
                
                customElements.define('user-card', UserCard);
            </script>
        </div>
        
        <div class="demo-container">
            <h3>HTML Template Demo:</h3>
            
            <!-- Template definition -->
            <template id="user-card-template">
                <div class="user-card">
                    <img class="avatar" src="" alt="User Avatar">
                    <div class="user-info">
                        <h3 class="name"></h3>
                        <p class="email"></p>
                        <p class="phone"></p>
                    </div>
                </div>
                <style>
                    .user-card {
                        display: flex;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        padding: 10px;
                        margin: 10px 0;
                        background-color: white;
                    }
                    .avatar {
                        width: 50px;
                        height: 50px;
                        border-radius: 50%;
                        margin-right: 10px;
                        background-color: #f0f0f0;
                    }
                    .user-info {
                        flex: 1;
                    }
                    .name {
                        margin: 0 0 5px 0;
                        color: #2c3e50;
                    }
                    .email, .phone {
                        margin: 5px 0;
                        color: #666;
                    }
                </style>
            </template>
            
            <div class="component-preview" id="template-preview">
                <!-- The template-based elements will be inserted here -->
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Check if templates and Shadow DOM are supported
                    if ('content' in document.createElement('template') && window.ShadowRoot) {
                        // Define the custom element using the template
                        class UserCard extends HTMLElement {
                            constructor() {
                                super();
                                
                                // Create shadow DOM
                                const shadow = this.attachShadow({ mode: 'open' });
                                
                                // Get the template content
                                const template = document.getElementById('user-card-template');
                                const templateContent = template.content;
                                
                                // Clone the template
                                const clone = templateContent.cloneNode(true);
                                
                                // Customize the content
                                const avatar = clone.querySelector('.avatar');
                                const name = clone.querySelector('.name');
                                const email = clone.querySelector('.email');
                                const phone = clone.querySelector('.phone');
                                
                                avatar.src = this.getAttribute('avatar') || 'https://via.placeholder.com/50';
                                name.textContent = this.getAttribute('name') || 'Unknown User';
                                email.textContent = this.getAttribute('email') || 'No email';
                                phone.textContent = this.getAttribute('phone') || 'No phone';
                                
                                // Append the clone to the shadow DOM
                                shadow.appendChild(clone);
                            }
                        }
                        
                        // Register the custom element if it hasn't been registered yet
                        if (!customElements.get('user-card')) {
                            customElements.define('user-card', UserCard);
                        }
                        
                        // Add the elements to the preview
                        const preview = document.getElementById('template-preview');
                        preview.innerHTML = `
                            <user-card 
                                name="John Doe" 
                                email="john@example.com" 
                                phone="(123) 456-7890" 
                                avatar="https://via.placeholder.com/50/3498db/ffffff?text=JD">
                            </user-card>
                            <user-card 
                                name="Jane Smith" 
                                email="jane@example.com" 
                                phone="(987) 654-3210" 
                                avatar="https://via.placeholder.com/50/e74c3c/ffffff?text=JS">
                            </user-card>
                        `;
                    } else {
                        // Fallback for browsers that don't support templates or Shadow DOM
                        const preview = document.getElementById('template-preview');
                        preview.innerHTML = '<div style="padding: 10px; background-color: #fdedec; border-radius: 5px;">Your browser does not support HTML Templates or Shadow DOM.</div>';
                    }
                });
            </script>
        </div>
        
        <h3>Using Slots</h3>
        <p>The <code>&lt;slot&gt;</code> element is a placeholder inside a web component that you can fill with your own markup. It allows for content projection from the light DOM (the regular DOM) into the shadow DOM.</p>
        
        <div class="code-block">
            <!-- HTML Template with slots -->
            <template id="card-template">
                <div class="card">
                    <div class="card-header">
                        <slot name="header">Default Header</slot>
                    </div>
                    <div class="card-body">
                        <slot>Default content</slot>
                    </div>
                    <div class="card-footer">
                        <slot name="footer">Default Footer</slot>
                    </div>
                </div>
                <style>
                    .card {
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        overflow: hidden;
                    }
                    .card-header {
                        background-color: #f5f5f5;
                        padding: 10px;
                        border-bottom: 1px solid #ddd;
                        font-weight: bold;
                    }
                    .card-body {
                        padding: 15px;
                    }
                    .card-footer {
                        background-color: #f5f5f5;
                        padding: 10px;
                        border-top: 1px solid #ddd;
                    }
                </style>
            </template>
            
            <!-- JavaScript to use the template with slots -->
            <script>
                class SlotCard extends HTMLElement {
                    constructor() {
                        super();
                        
                        const shadow = this.attachShadow({ mode: 'open' });
                        const template = document.getElementById('card-template');
                        const clone = template.content.cloneNode(true);
                        
                        shadow.appendChild(clone);
                    }
                }
                
                customElements.define('slot-card', SlotCard);
            </script>
            
            <!-- Using the component with slots -->
            <slot-card>
                <h2 slot="header">Custom Header</h2>
                <p>This is the main content of the card.</p>
                <div slot="footer">
                    <button>Action Button</button>
                </div>
            </slot-card>
        </div>
        
        <div class="demo-container">
            <h3>Slots Demo:</h3>
            
            <!-- Template definition with slots -->
            <template id="slot-card-template">
                <div class="card">
                    <div class="card-header">
                        <slot name="header">Default Header</slot>
                    </div>
                    <div class="card-body">
                        <slot>Default content</slot>
                    </div>
                    <div class="card-footer">
                        <slot name="footer">Default Footer</slot>
                    </div>
                </div>
                <style>
                    .card {
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        overflow: hidden;
                        margin: 15px 0;
                        background-color: white;
                    }
                    .card-header {
                        background-color: #f5f5f5;
                        padding: 10px;
                        border-bottom: 1px solid #ddd;
                        font-weight: bold;
                    }
                    .card-body {
                        padding: 15px;
                    }
                    .card-footer {
                        background-color: #f5f5f5;
                        padding: 10px;
                        border-top: 1px solid #ddd;
                    }
                </style>
            </template>
            
            <div class="component-preview" id="slots-preview">
                <!-- The slot-based elements will be inserted here -->
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Check if templates, slots, and Shadow DOM are supported
                    if ('content' in document.createElement('template') && 
                        'attachShadow' in Element.prototype) {
                        
                        // Define the custom element using the template with slots
                        class SlotCard extends HTMLElement {
                            constructor() {
                                super();
                                
                                const shadow = this.attachShadow({ mode: 'open' });
                                const template = document.getElementById('slot-card-template');
                                const clone = template.content.cloneNode(true);
                                
                                shadow.appendChild(clone);
                            }
                        }
                        
                        // Register the custom element if it hasn't been registered yet
                        if (!customElements.get('slot-card')) {
                            customElements.define('slot-card', SlotCard);
                        }
                        
                        // Add the elements to the preview
                        const preview = document.getElementById('slots-preview');
                        
                        // First card with custom content in slots
                        const card1 = document.createElement('slot-card');
                        
                        const header1 = document.createElement('h3');
                        header1.setAttribute('slot', 'header');
                        header1.textContent = 'Custom Header';
                        
                        const content1 = document.createElement('p');
                        content1.textContent = 'This is custom content provided via slots.';
                        
                        const footer1 = document.createElement('div');
                        footer1.setAttribute('slot', 'footer');
                        
                        const button1 = document.createElement('button');
                        button1.textContent = 'Action Button';
                        footer1.appendChild(button1);
                        
                        card1.appendChild(header1);
                        card1.appendChild(content1);
                        card1.appendChild(footer1);
                        
                        // Second card with default slot content
                        const card2 = document.createElement('slot-card');
                        
                        preview.appendChild(card1);
                        preview.appendChild(card2);
                    } else {
                        // Fallback for browsers that don't support templates, slots, or Shadow DOM
                        const preview = document.getElementById('slots-preview');
                        preview.innerHTML = '<div style="padding: 10px; background-color: #fdedec; border-radius: 5px;">Your browser does not support HTML Templates, Slots, or Shadow DOM.</div>';
                    }
                });
            </script>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Creating a Complete Web Component</h2>
        <p>Let's put everything together to create a complete web component that uses custom elements, shadow DOM, templates, and slots.</p>
        
        <div class="code-block">
            // HTML Template
            <template id="tab-panel-template">
                <div class="tab-container">
                    <div class="tabs">
                        <slot name="tab"></slot>
                    </div>
                    <div class="panels">
                        <slot name="panel"></slot>
                    </div>
                </div>
                <style>
                    .tab-container {
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        overflow: hidden;
                    }
                    .tabs {
                        display: flex;
                        background-color: #f5f5f5;
                        border-bottom: 1px solid #ddd;
                    }
                    ::slotted([slot="tab"]) {
                        padding: 10px 15px;
                        cursor: pointer;
                        border-bottom: 2px solid transparent;
                    }
                    ::slotted([slot="tab"].active) {
                        border-bottom-color: #3498db;
                        color: #3498db;
                    }
                    ::slotted([slot="panel"]) {
                        display: none;
                        padding: 15px;
                    }
                    ::slotted([slot="panel"].active) {
                        display: block;
                    }
                </style>
            </template>
            
            // JavaScript for the component
            class TabPanel extends HTMLElement {
                constructor() {
                    super();
                    
                    // Create shadow DOM
                    this.attachShadow({ mode: 'open' });
                    
                    // Clone the template
                    const template = document.getElementById('tab-panel-template');
                    this.shadowRoot.appendChild(template.content.cloneNode(true));
                    
                    // Bind methods
                    this._onTabClick = this._onTabClick.bind(this);
                }
                
                connectedCallback() {
                    // Add event listeners when the element is added to the DOM
                    this.shadowRoot.addEventListener('click', this._onTabClick);
                    
                    // Set up initial state
                    this._setupTabs();
                }
                
                disconnectedCallback() {
                    // Remove event listeners when the element is removed from the DOM
                    this.shadowRoot.removeEventListener('click', this._onTabClick);
                }
                
                _setupTabs() {
                    // Get all tabs and panels
                    const tabs = this.querySelectorAll('[slot="tab"]');
                    const panels = this.querySelectorAll('[slot="panel"]');
                    
                    // Activate the first tab by default
                    if (tabs.length > 0) {
                        tabs[0].classList.add('active');
                    }
                    
                    if (panels.length > 0) {
                        panels[0].classList.add('active');
                    }
                }
                
                _onTabClick(event) {
                    // Check if a tab was clicked
                    const tab = event.target.closest('[slot="tab"]');
                    if (!tab) return;
                    
                    // Get all tabs and panels
                    const tabs = this.querySelectorAll('[slot="tab"]');
                    const panels = this.querySelectorAll('[slot="panel"]');
                    
                    // Find the index of the clicked tab
                    const tabIndex = Array.from(tabs).indexOf(tab);
                    
                    // Deactivate all tabs and panels
                    tabs.forEach(t => t.classList.remove('active'));
                    panels.forEach(p => p.classList.remove('active'));
                    
                    // Activate the clicked tab and corresponding panel
                    tab.classList.add('active');
                    if (panels[tabIndex]) {
                        panels[tabIndex].classList.add('active');
                    }
                }
            }
            
            // Register the custom element
            customElements.define('tab-panel', TabPanel);
            
            // Usage:
            /*
            <tab-panel>
                <div slot="tab">Tab 1</div>
                <div slot="tab">Tab 2</div>
                <div slot="tab">Tab 3</div>
                
                <div slot="panel">Content for Tab 1</div>
                <div slot="panel">Content for Tab 2</div>
                <div slot="panel">Content for Tab 3</div>
            </tab-panel>
            */
        </div>
        
        <div class="demo-container">
            <h3>Complete Web Component Demo:</h3>
            
            <!-- Template definition for the tab panel -->
            <template id="tab-panel-template">
                <div class="tab-container">
                    <div class="tabs">
                        <slot name="tab"></slot>
                    </div>
                    <div class="panels">
                        <slot name="panel"></slot>
                    </div>
                </div>
                <style>
                    .tab-container {
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        overflow: hidden;
                        background-color: white;
                    }
                    .tabs {
                        display: flex;
                        background-color: #f5f5f5;
                        border-bottom: 1px solid #ddd;
                    }
                    ::slotted([slot="tab"]) {
                        padding: 10px 15px;
                        cursor: pointer;
                        border-bottom: 2px solid transparent;
                        transition: all 0.3s;
                    }
                    ::slotted([slot="tab"].active) {
                        border-bottom-color: #3498db;
                        color: #3498db;
                    }
                    ::slotted([slot="tab"]:hover) {
                        background-color: #e8f4fc;
                    }
                    ::slotted([slot="panel"]) {
                        display: none;
                        padding: 15px;
                    }
                    ::slotted([slot="panel"].active) {
                        display: block;
                    }
                </style>
            </template>
            
            <div class="component-preview" id="complete-component-preview">
                <!-- The complete web component will be inserted here -->
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Check if all required features are supported
                    if ('content' in document.createElement('template') && 
                        'attachShadow' in Element.prototype) {
                        
                        // Define the tab panel component
                        class TabPanel extends HTMLElement {
                            constructor() {
                                super();
                                
                                // Create shadow DOM
                                this.attachShadow({ mode: 'open' });
                                
                                // Clone the template
                                const template = document.getElementById('tab-panel-template');
                                this.shadowRoot.appendChild(template.content.cloneNode(true));
                                
                                // Bind methods
                                this._onTabClick = this._onTabClick.bind(this);
                            }
                            
                            connectedCallback() {
                                // Add event listeners when the element is added to the DOM
                                this.shadowRoot.addEventListener('click', this._onTabClick);
                                
                                // Set up initial state
                                this._setupTabs();
                            }
                            
                            disconnectedCallback() {
                                // Remove event listeners when the element is removed from the DOM
                                this.shadowRoot.removeEventListener('click', this._onTabClick);
                            }
                            
                            _setupTabs() {
                                // Get all tabs and panels
                                const tabs = this.querySelectorAll('[slot="tab"]');
                                const panels = this.querySelectorAll('[slot="panel"]');
                                
                                // Activate the first tab by default
                                if (tabs.length > 0) {
                                    tabs[0].classList.add('active');
                                }
                                
                                if (panels.length > 0) {
                                    panels[0].classList.add('active');
                                }
                            }
                            
                            _onTabClick(event) {
                                // Check if a tab was clicked
                                const slot = this.shadowRoot.querySelector('slot[name="tab"]');
                                const nodes = slot.assignedNodes();
                                const clickedNode = event.composedPath().find(node => 
                                    nodes.includes(node) && node.getAttribute && node.getAttribute('slot') === 'tab');
                                
                                if (!clickedNode) return;
                                
                                // Get all tabs and panels
                                const tabs = this.querySelectorAll('[slot="tab"]');
                                const panels = this.querySelectorAll('[slot="panel"]');
                                
                                // Find the index of the clicked tab
                                const tabIndex = Array.from(tabs).indexOf(clickedNode);
                                
                                // Deactivate all tabs and panels
                                tabs.forEach(t => t.classList.remove('active'));
                                panels.forEach(p => p.classList.remove('active'));
                                
                                // Activate the clicked tab and corresponding panel
                                clickedNode.classList.add('active');
                                if (panels[tabIndex]) {
                                    panels[tabIndex].classList.add('active');
                                }
                            }
                        }
                        
                        // Register the custom element if it hasn't been registered yet
                        if (!customElements.get('tab-panel')) {
                            customElements.define('tab-panel', TabPanel);
                        }
                        
                        // Create the tab panel component
                        const preview = document.getElementById('complete-component-preview');
                        
                        // Create the tab panel element
                        const tabPanel = document.createElement('tab-panel');
                        
                        // Create tabs
                        const tab1 = document.createElement('div');
                        tab1.setAttribute('slot', 'tab');
                        tab1.textContent = 'HTML';
                        
                        const tab2 = document.createElement('div');
                        tab2.setAttribute('slot', 'tab');
                        tab2.textContent = 'CSS';
                        
                        const tab3 = document.createElement('div');
                        tab3.setAttribute('slot', 'tab');
                        tab3.textContent = 'JavaScript';
                        
                        // Create panels
                        const panel1 = document.createElement('div');
                        panel1.setAttribute('slot', 'panel');
                        panel1.innerHTML = `
                            <h3>HTML</h3>
                            <p>HTML (HyperText Markup Language) is the standard markup language for documents designed to be displayed in a web browser.</p>
                            <p>It defines the structure and content of web pages.</p>
                        `;
                        
                        const panel2 = document.createElement('div');
                        panel2.setAttribute('slot', 'panel');
                        panel2.innerHTML = `
                            <h3>CSS</h3>
                            <p>CSS (Cascading Style Sheets) is a style sheet language used for describing the presentation of a document written in HTML.</p>
                            <p>It controls the layout, colors, fonts, and other visual aspects of web pages.</p>
                        `;
                        
                        const panel3 = document.createElement('div');
                        panel3.setAttribute('slot', 'panel');
                        panel3.innerHTML = `
                            <h3>JavaScript</h3>
                            <p>JavaScript is a programming language that enables interactive web pages.</p>
                            <p>It is an essential part of web applications, allowing for dynamic content, user interaction, and much more.</p>
                        `;
                        
                        // Add tabs and panels to the tab panel
                        tabPanel.appendChild(tab1);
                        tabPanel.appendChild(tab2);
                        tabPanel.appendChild(tab3);
                        tabPanel.appendChild(panel1);
                        tabPanel.appendChild(panel2);
                        tabPanel.appendChild(panel3);
                        
                        // Add the tab panel to the preview
                        preview.appendChild(tabPanel);
                    } else {
                        // Fallback for browsers that don't support required features
                        const preview = document.getElementById('complete-component-preview');
                        preview.innerHTML = '<div style="padding: 10px; background-color: #fdedec; border-radius: 5px;">Your browser does not support the required features for Web Components.</div>';
                    }
                });
            </script>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Best Practices for Web Components</h2>
        
        <h3>Design Principles</h3>
        <ul>
            <li><strong>Single Responsibility</strong>: Each component should do one thing and do it well</li>
            <li><strong>Encapsulation</strong>: Keep internal details hidden and provide a clean API</li>
            <li><strong>Composability</strong>: Design components that can work together</li>
            <li><strong>Accessibility</strong>: Ensure components are accessible to all users</li>
            <li><strong>Progressive Enhancement</strong>: Provide fallbacks for browsers that don't support Web Components</li>
        </ul>
        
        <h3>Performance Considerations</h3>
        <ul>
            <li>Minimize DOM operations inside the component</li>
            <li>Use <code>connectedCallback</code> for initialization rather than the constructor</li>
            <li>Lazy-load resources when possible</li>
            <li>Use event delegation for handling multiple events</li>
            <li>Consider using <code>adoptedStyleSheets</code> for shared styles</li>
        </ul>
        
        <h3>Accessibility</h3>
        <ul>
            <li>Use semantic HTML inside your components</li>
            <li>Ensure keyboard navigation works properly</li>
            <li>Add appropriate ARIA attributes</li>
            <li>Test with screen readers and other assistive technologies</li>
            <li>Maintain focus management for interactive components</li>
        </ul>
        
        <div class="example">
            <h3>Example: Accessible Button Component</h3>
            <div class="code-block">
                class AccessibleButton extends HTMLElement {
                    constructor() {
                        super();
                        
                        const shadow = this.attachShadow({ mode: 'open' });
                        
                        // Create button element
                        const button = document.createElement('button');
                        button.setAttribute('class', 'a11y-button');
                        button.setAttribute('role', 'button');
                        button.setAttribute('aria-label', this.getAttribute('aria-label') || 'Button');
                        button.setAttribute('tabindex', '0');
                        
                        // Add content
                        button.innerHTML = '<slot></slot>';
                        
                        // Add styles
                        const style = document.createElement('style');
                        style.textContent = `
                            .a11y-button {
                                background-color: var(--button-bg, #3498db);
                                color: var(--button-text, white);
                                border: none;
                                padding: 10px 15px;
                                border-radius: 5px;
                                cursor: pointer;
                                font-size: 16px;
                            }
                            
                            .a11y-button:hover, .a11y-button:focus {
                                background-color: var(--button-hover-bg, #2980b9);
                                outline: 2px solid var(--button-focus-outline, #2980b9);
                                outline-offset: 2px;
                            }
                            
                            .a11y-button:active {
                                transform: translateY(1px);
                            }
                        `;
                        
                        // Add event listeners
                        button.addEventListener('click', (e) => {
                            this.dispatchEvent(new CustomEvent('a11y-click', {
                                bubbles: true,
                                composed: true,
                                detail: { originalEvent: e }
                            }));
                        });
                        
                        // Handle keyboard events
                        button.addEventListener('keydown', (e) => {
                            if (e.key === 'Enter' || e.key === ' ') {
                                e.preventDefault();
                                button.click();
                            }
                        });
                        
                        // Append to shadow DOM
                        shadow.appendChild(style);
                        shadow.appendChild(button);
                    }
                    
                    // Reflect attributes
                    static get observedAttributes() {
                        return ['disabled', 'aria-label'];
                    }
                    
                    attributeChangedCallback(name, oldValue, newValue) {
                        const button = this.shadowRoot.querySelector('button');
                        
                        if (name === 'disabled') {
                            if (newValue !== null) {
                                button.setAttribute('disabled', '');
                                button.setAttribute('aria-disabled', 'true');
                            } else {
                                button.removeAttribute('disabled');
                                button.setAttribute('aria-disabled', 'false');
                            }
                        }
                        
                        if (name === 'aria-label') {
                            button.setAttribute('aria-label', newValue);
                        }
                    }
                }
                
                customElements.define('a11y-button', AccessibleButton);
            </div>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Create Your Own Web Component</h2>
        <p>Let's create a simple rating component using Web Components. This component will display a set of stars that users can click to provide a rating.</p>
        
        <div class="tabs">
            <div class="tab active" onclick="showTab('html')">HTML</div>
            <div class="tab" onclick="showTab('js')">JavaScript</div>
            <div class="tab" onclick="showTab('css')">CSS</div>
        </div>
        
        <div id="html" class="tab-content active">
            <textarea id="htmlEditor" rows="10" style="width: 100%; font-family: monospace; padding: 10px;"><!-- HTML Template -->
<template id="star-rating-template">
    <div class="star-rating">
        <!-- Stars will be added here -->
    </div>
    <style>
        /* Add your CSS here */
        .star-rating {
            display: flex;
        }
        .star {
            font-size: 24px;
            cursor: pointer;
            color: #ddd;
        }
        .star.filled {
            color: gold;
        }
    </style>
</template>

<!-- Usage -->
<star-rating max="5" value="3"></star-rating></textarea>
        </div>
        
        <div id="js" class="tab-content">
            <textarea id="jsEditor" rows="20" style="width: 100%; font-family: monospace; padding: 10px;">// Define the custom element
class StarRating extends HTMLElement {
    constructor() {
        super();
        
        // Create shadow DOM
        this.attachShadow({ mode: 'open' });
        
        // Get template content
        const template = document.getElementById('star-rating-template');
        this.shadowRoot.appendChild(template.content.cloneNode(true));
        
        // Get container
        this.container = this.shadowRoot.querySelector('.star-rating');
        
        // Bind methods
        this._onClick = this._onClick.bind(this);
    }
    
    // Add your JavaScript here
    connectedCallback() {
        // Get attributes
        this.max = parseInt(this.getAttribute('max') || 5);
        this.value = parseInt(this.getAttribute('value') || 0);
        
        // Create stars
        this._createStars();
        
        // Add event listener
        this.container.addEventListener('click', this._onClick);
    }
    
    disconnectedCallback() {
        // Remove event listener
        this.container.removeEventListener('click', this._onClick);
    }
    
    _createStars() {
        // Clear container
        this.container.innerHTML = '';
        
        // Create stars
        for (let i = 1; i <= this.max; i++) {
            const star = document.createElement('span');
            star.classList.add('star');
            star.textContent = '★';
            star.dataset.value = i;
            
            if (i <= this.value) {
                star.classList.add('filled');
            }
            
            this.container.appendChild(star);
        }
    }
    
    _onClick(event) {
        if (event.target.classList.contains('star')) {
            this.value = parseInt(event.target.dataset.value);
            this._updateStars();
            
            // Dispatch event
            this.dispatchEvent(new CustomEvent('rating-changed', {
                bubbles: true,
                composed: true,
                detail: { value: this.value }
            }));
        }
    }
    
    _updateStars() {
        const stars = this.container.querySelectorAll('.star');
        stars.forEach(star => {
            const starValue = parseInt(star.dataset.value);
            if (starValue <= this.value) {
                star.classList.add('filled');
            } else {
                star.classList.remove('filled');
            }
        });
    }
    
    // Reflect attributes
    static get observedAttributes() {
        return ['value', 'max'];
    }
    
    attributeChangedCallback(name, oldValue, newValue) {
        if (name === 'value') {
            this.value = parseInt(newValue || 0);
            if (this.container) {
                this._updateStars();
            }
        }
        
        if (name === 'max') {
            this.max = parseInt(newValue || 5);
            if (this.container) {
                this._createStars();
            }
        }
    }
}

// Register the custom element
customElements.define('star-rating', StarRating);</textarea>
        </div>
        
        <div id="css" class="tab-content">
            <textarea id="cssEditor" rows="15" style="width: 100%; font-family: monospace; padding: 10px;">/* Add additional CSS here to enhance the component */
.star-rating {
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.star {
    font-size: 30px;
    cursor: pointer;
    color: #ddd;
    transition: color 0.2s, transform 0.2s;
    margin: 0 5px;
}

.star:hover {
    transform: scale(1.2);
}

.star.filled {
    color: gold;
}

/* Add hover effect to show potential rating */
.star:hover ~ .star {
    color: #ddd;
}

.star-rating:hover .star {
    color: gold;
}

.star-rating .star:hover ~ .star {
    color: #ddd;
}</textarea>
        </div>
        
        <button onclick="updatePreview()">Update Preview</button>
        
        <h3>Preview:</h3>
        <div id="componentPreview" style="width: 100%; padding: 20px; border: 1px solid #ddd; margin: 10px 0; background-color: white;"></div>
        <div id="ratingValue" style="text-align: center; margin-top: 10px;"></div>
        
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
                const htmlCode = document.getElementById('htmlEditor').value;
                const jsCode = document.getElementById('jsEditor').value;
                const cssCode = document.getElementById('cssEditor').value;
                
                // Clear previous preview
                const preview = document.getElementById('componentPreview');
                preview.innerHTML = '';
                
                // Add template to the document
                const templateContainer = document.createElement('div');
                templateContainer.innerHTML = htmlCode;
                document.body.appendChild(templateContainer);
                
                // Add CSS
                const style = document.createElement('style');
                style.textContent = cssCode;
                document.head.appendChild(style);
                
                // Add JavaScript
                const script = document.createElement('script');
                script.textContent = jsCode;
                document.body.appendChild(script);
                
                // Add the component to the preview
                setTimeout(() => {
                    const component = document.createElement('star-rating');
                    component.setAttribute('max', '5');
                    component.setAttribute('value', '3');
                    
                    // Add event listener for rating changes
                    component.addEventListener('rating-changed', (e) => {
                        document.getElementById('ratingValue').textContent = `Current rating: ${e.detail.value} out of 5`;
                    });
                    
                    preview.appendChild(component);
                    
                    // Set initial rating value
                    document.getElementById('ratingValue').textContent = 'Current rating: 3 out of 5';
                }, 100);
            }
            
            // Initialize preview
            document.addEventListener('DOMContentLoaded', function() {
                updatePreview();
            });
        </script>
    </div>
    
    <div class="quiz-container">
        <h2>Knowledge Check</h2>
        
        <div class="quiz-question">
            1. Which of the following is NOT one of the main technologies that make up Web Components?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> Custom Elements</label>
            <label><input type="radio" name="q1" value="b"> Shadow DOM</label>
            <label><input type="radio" name="q1" value="c"> HTML Templates</label>
            <label><input type="radio" name="q1" value="d"> Web Workers</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. What is the correct way to register a custom element?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> document.registerElement('my-element', MyElement);</label>
            <label><input type="radio" name="q2" value="b"> customElements.define('my-element', MyElement);</label>
            <label><input type="radio" name="q2" value="c"> HTMLElement.register('my-element', MyElement);</label>
            <label><input type="radio" name="q2" value="d"> customElements.register('my-element', MyElement);</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which lifecycle callback is called when a custom element is added to the document?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> createdCallback()</label>
            <label><input type="radio" name="q3" value="b"> attachedCallback()</label>
            <label><input type="radio" name="q3" value="c"> connectedCallback()</label>
            <label><input type="radio" name="q3" value="d"> addedCallback()</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. What is the purpose of the Shadow DOM?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> To create hidden elements that are not visible to users</label>
            <label><input type="radio" name="q4" value="b"> To provide encapsulation for DOM and CSS</label>
            <label><input type="radio" name="q4" value="c"> To improve performance by reducing the number of DOM elements</label>
            <label><input type="radio" name="q4" value="d"> To create a backup copy of the DOM for error recovery</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. What is the purpose of the <code>&lt;slot&gt;</code> element in Web Components?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> To create a placeholder for content provided by the user of the component</label>
            <label><input type="radio" name="q5" value="b"> To define a reusable template for the component</label>
            <label><input type="radio" name="q5" value="c"> To create a container for Shadow DOM content</label>
            <label><input type="radio" name="q5" value="d"> To define a slot machine animation for the component</label>
        </div>
        <div id="feedback5" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'd',
                    q2: 'b',
                    q3: 'c',
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
            <button onclick="window.location.href='02_canvas_svg.php'">Previous Lesson: Canvas and SVG</button>
        </div>
        <div>
            <button onclick="window.location.href='04_microdata.php'">Next Lesson: Microdata and Structured Data</button>
        </div>
    </div>
</body>
</html>
