<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas and SVG</title>
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
        
        /* Canvas and SVG specific styles */
        .canvas-container, .svg-container {
            border: 1px solid #ddd;
            margin: 15px 0;
            background-color: #fff;
        }
        .controls {
            margin: 15px 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .color-picker {
            height: 30px;
            width: 60px;
            padding: 0;
            border: 1px solid #ccc;
            cursor: pointer;
        }
        .range-slider {
            width: 100px;
            margin: 0 10px;
            vertical-align: middle;
        }
        .demo-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            background-color: #f8f9fa;
        }
        .side-by-side {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px 0;
        }
        .side-by-side > div {
            flex: 1;
            min-width: 300px;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Canvas and SVG</h1>
    
    <div class="lesson-container">
        <h2>Introduction to Canvas and SVG</h2>
        <p>HTML5 introduced two powerful technologies for creating graphics on the web: Canvas and SVG (Scalable Vector Graphics). Both allow you to create rich, interactive graphics, but they have different approaches and use cases.</p>
        
        <div class="side-by-side">
            <div>
                <h3>Canvas</h3>
                <p>Canvas provides a bitmap drawing surface that you can control pixel by pixel using JavaScript. It's like drawing on a blank slate with immediate results.</p>
                <ul>
                    <li>Pixel-based (raster) graphics</li>
                    <li>Resolution-dependent</li>
                    <li>No DOM nodes for drawn objects</li>
                    <li>Better performance for complex animations</li>
                    <li>Programmatic rendering with JavaScript</li>
                </ul>
            </div>
            <div>
                <h3>SVG</h3>
                <p>SVG defines graphics using XML-based markup. It creates vector-based graphics that can be styled with CSS and manipulated with JavaScript.</p>
                <ul>
                    <li>Vector-based graphics</li>
                    <li>Resolution-independent (scales without losing quality)</li>
                    <li>Each element becomes part of the DOM</li>
                    <li>Better for interactive graphics with fewer objects</li>
                    <li>Declarative approach with markup</li>
                </ul>
            </div>
        </div>
        
        <div class="example">
            <h3>When to Use Each Technology:</h3>
            <table class="comparison-table">
                <tr>
                    <th>Use Canvas When:</th>
                    <th>Use SVG When:</th>
                </tr>
                <tr>
                    <td>Creating pixel-manipulation applications</td>
                    <td>Creating scalable graphics for various screen sizes</td>
                </tr>
                <tr>
                    <td>Building games or complex animations</td>
                    <td>Creating interactive diagrams or infographics</td>
                </tr>
                <tr>
                    <td>Generating dynamic charts with many data points</td>
                    <td>Building graphics that need accessibility features</td>
                </tr>
                <tr>
                    <td>Processing images or video frames</td>
                    <td>Creating graphics that need to be styled with CSS</td>
                </tr>
                <tr>
                    <td>Working with thousands of objects</td>
                    <td>Working with fewer, larger objects</td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>HTML5 Canvas</h2>
        <p>The HTML5 Canvas element provides a rectangular drawing area that you can control with JavaScript. It's a low-level, procedural model that updates a bitmap and doesn't create persistent objects in the scene graph.</p>
        
        <h3>Creating a Canvas</h3>
        <p>To create a canvas, you use the <code>&lt;canvas&gt;</code> element and get a reference to its 2D context:</p>
        
        <div class="code-block">
            &lt;!-- HTML --&gt;
            &lt;canvas id="myCanvas" width="400" height="200"&gt;
                Your browser does not support the canvas element.
            &lt;/canvas&gt;
            
            &lt;!-- JavaScript --&gt;
            &lt;script&gt;
                // Get the canvas element
                const canvas = document.getElementById('myCanvas');
                
                // Get the 2D drawing context
                const ctx = canvas.getContext('2d');
                
                // Now you can draw on the canvas using the context
            &lt;/script&gt;
        </div>
        
        <div class="note">
            <p>The text inside the canvas element is fallback content that will be displayed if the browser doesn't support canvas. Always include fallback content for accessibility and older browsers.</p>
        </div>
        
        <h3>Basic Drawing with Canvas</h3>
        <p>Canvas provides methods for drawing shapes, text, images, and more:</p>
        
        <div class="code-block">
            // Set fill and stroke styles
            ctx.fillStyle = 'blue';
            ctx.strokeStyle = 'red';
            ctx.lineWidth = 3;
            
            // Draw a rectangle
            ctx.fillRect(10, 10, 100, 80);
            ctx.strokeRect(10, 10, 100, 80);
            
            // Draw a line
            ctx.beginPath();
            ctx.moveTo(150, 20);
            ctx.lineTo(250, 100);
            ctx.stroke();
            
            // Draw a circle
            ctx.beginPath();
            ctx.arc(300, 50, 40, 0, Math.PI * 2);
            ctx.fill();
            ctx.stroke();
            
            // Draw text
            ctx.font = '20px Arial';
            ctx.fillStyle = 'black';
            ctx.fillText('Hello Canvas!', 150, 150);
        </div>
        
        <div class="demo-container">
            <h3>Basic Canvas Drawing Demo:</h3>
            <canvas id="basicCanvas" width="400" height="200" class="canvas-container"></canvas>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const canvas = document.getElementById('basicCanvas');
                    const ctx = canvas.getContext('2d');
                    
                    // Set fill and stroke styles
                    ctx.fillStyle = 'blue';
                    ctx.strokeStyle = 'red';
                    ctx.lineWidth = 3;
                    
                    // Draw a rectangle
                    ctx.fillRect(10, 10, 100, 80);
                    ctx.strokeRect(10, 10, 100, 80);
                    
                    // Draw a line
                    ctx.beginPath();
                    ctx.moveTo(150, 20);
                    ctx.lineTo(250, 100);
                    ctx.stroke();
                    
                    // Draw a circle
                    ctx.beginPath();
                    ctx.arc(300, 50, 40, 0, Math.PI * 2);
                    ctx.fill();
                    ctx.stroke();
                    
                    // Draw text
                    ctx.font = '20px Arial';
                    ctx.fillStyle = 'black';
                    ctx.fillText('Hello Canvas!', 150, 150);
                });
            </script>
        </div>
        
        <h3>Canvas Paths</h3>
        <p>Paths are a series of points connected by lines or curves. You can create complex shapes using paths:</p>
        
        <div class="code-block">
            // Start a new path
            ctx.beginPath();
            
            // Define the path
            ctx.moveTo(50, 50);    // Move to starting point
            ctx.lineTo(150, 50);   // Draw line to point
            ctx.lineTo(100, 150);  // Draw line to point
            ctx.closePath();       // Close the path (draws line back to start)
            
            // Render the path
            ctx.fillStyle = 'green';
            ctx.fill();            // Fill the path
            ctx.strokeStyle = 'black';
            ctx.stroke();          // Stroke the path
        </div>
        
        <div class="demo-container">
            <h3>Canvas Paths Demo:</h3>
            <canvas id="pathsCanvas" width="400" height="200" class="canvas-container"></canvas>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const canvas = document.getElementById('pathsCanvas');
                    const ctx = canvas.getContext('2d');
                    
                    // Triangle
                    ctx.beginPath();
                    ctx.moveTo(50, 50);
                    ctx.lineTo(150, 50);
                    ctx.lineTo(100, 150);
                    ctx.closePath();
                    ctx.fillStyle = 'green';
                    ctx.fill();
                    ctx.strokeStyle = 'black';
                    ctx.lineWidth = 2;
                    ctx.stroke();
                    
                    // Star
                    ctx.beginPath();
                    const cx = 250;
                    const cy = 100;
                    const spikes = 5;
                    const outerRadius = 60;
                    const innerRadius = 25;
                    
                    let rot = Math.PI / 2 * 3;
                    let x = cx;
                    let y = cy;
                    const step = Math.PI / spikes;
                    
                    ctx.moveTo(cx, cy - outerRadius);
                    
                    for (let i = 0; i < spikes; i++) {
                        x = cx + Math.cos(rot) * outerRadius;
                        y = cy + Math.sin(rot) * outerRadius;
                        ctx.lineTo(x, y);
                        rot += step;
                        
                        x = cx + Math.cos(rot) * innerRadius;
                        y = cy + Math.sin(rot) * innerRadius;
                        ctx.lineTo(x, y);
                        rot += step;
                    }
                    
                    ctx.lineTo(cx, cy - outerRadius);
                    ctx.closePath();
                    ctx.fillStyle = 'gold';
                    ctx.fill();
                    ctx.strokeStyle = 'orange';
                    ctx.lineWidth = 2;
                    ctx.stroke();
                });
            </script>
        </div>
        
        <h3>Canvas Transformations</h3>
        <p>Canvas provides methods for transforming the coordinate system:</p>
        
        <div class="code-block">
            // Save the current state
            ctx.save();
            
            // Translate (move) the origin
            ctx.translate(100, 100);
            
            // Rotate the coordinate system (in radians)
            ctx.rotate(Math.PI / 4); // 45 degrees
            
            // Scale the coordinate system
            ctx.scale(1.5, 0.5);
            
            // Draw a rectangle at the transformed position
            ctx.fillStyle = 'purple';
            ctx.fillRect(-25, -25, 50, 50);
            
            // Restore the original state
            ctx.restore();
        </div>
        
        <div class="demo-container">
            <h3>Canvas Transformations Demo:</h3>
            <canvas id="transformCanvas" width="400" height="200" class="canvas-container"></canvas>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const canvas = document.getElementById('transformCanvas');
                    const ctx = canvas.getContext('2d');
                    
                    // Draw original rectangle for reference
                    ctx.fillStyle = 'blue';
                    ctx.fillRect(100 - 25, 100 - 25, 50, 50);
                    
                    // Save the current state
                    ctx.save();
                    
                    // Translate (move) the origin
                    ctx.translate(250, 100);
                    
                    // Rotate the coordinate system (in radians)
                    ctx.rotate(Math.PI / 4); // 45 degrees
                    
                    // Scale the coordinate system
                    ctx.scale(1.5, 0.5);
                    
                    // Draw a rectangle at the transformed position
                    ctx.fillStyle = 'purple';
                    ctx.fillRect(-25, -25, 50, 50);
                    
                    // Restore the original state
                    ctx.restore();
                    
                    // Add labels
                    ctx.font = '14px Arial';
                    ctx.fillStyle = 'black';
                    ctx.fillText('Original', 75, 50);
                    ctx.fillText('Transformed', 225, 50);
                    
                    // Draw arrows to show transformation
                    ctx.beginPath();
                    ctx.moveTo(130, 100);
                    ctx.lineTo(200, 100);
                    ctx.stroke();
                    ctx.beginPath();
                    ctx.moveTo(195, 95);
                    ctx.lineTo(200, 100);
                    ctx.lineTo(195, 105);
                    ctx.stroke();
                });
            </script>
        </div>
        
        <h3>Canvas Animation</h3>
        <p>Canvas is great for animations. The basic animation loop involves:</p>
        <ol>
            <li>Clear the canvas</li>
            <li>Update the position or properties of objects</li>
            <li>Redraw everything</li>
            <li>Request the next animation frame</li>
        </ol>
        
        <div class="code-block">
            // Animation variables
            let x = 0;
            const ballRadius = 20;
            const speed = 2;
            
            // Animation function
            function animate() {
                // Clear the canvas
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                
                // Update position
                x += speed;
                if (x > canvas.width + ballRadius) {
                    x = -ballRadius;
                }
                
                // Draw the ball
                ctx.beginPath();
                ctx.arc(x, canvas.height / 2, ballRadius, 0, Math.PI * 2);
                ctx.fillStyle = 'red';
                ctx.fill();
                
                // Request next frame
                requestAnimationFrame(animate);
            }
            
            // Start the animation
            animate();
        </div>
        
        <div class="demo-container">
            <h3>Canvas Animation Demo:</h3>
            <canvas id="animationCanvas" width="400" height="100" class="canvas-container"></canvas>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const canvas = document.getElementById('animationCanvas');
                    const ctx = canvas.getContext('2d');
                    
                    // Animation variables
                    let x = 0;
                    const ballRadius = 20;
                    const speed = 2;
                    
                    // Animation function
                    function animate() {
                        // Clear the canvas
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        
                        // Update position
                        x += speed;
                        if (x > canvas.width + ballRadius) {
                            x = -ballRadius;
                        }
                        
                        // Draw the ball
                        ctx.beginPath();
                        ctx.arc(x, canvas.height / 2, ballRadius, 0, Math.PI * 2);
                        ctx.fillStyle = 'red';
                        ctx.fill();
                        
                        // Request next frame
                        requestAnimationFrame(animate);
                    }
                    
                    // Start the animation
                    animate();
                });
            </script>
        </div>
        
        <h3>Canvas Images</h3>
        <p>You can draw images on a canvas using the <code>drawImage()</code> method:</p>
        
        <div class="code-block">
            // Create an image object
            const img = new Image();
            
            // Set the source
            img.src = 'path/to/image.jpg';
            
            // Draw the image when it's loaded
            img.onload = function() {
                // Basic: draw the image at position (0, 0)
                ctx.drawImage(img, 0, 0);
                
                // With size: draw the image at (0, 0) with width 200 and height 100
                ctx.drawImage(img, 0, 0, 200, 100);
                
                // With source crop: draw a portion of the image
                // Parameters: image, sourceX, sourceY, sourceWidth, sourceHeight,
                //            destX, destY, destWidth, destHeight
                ctx.drawImage(img, 50, 50, 100, 100, 250, 0, 150, 150);
            };
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Interactive Canvas Drawing App</h2>
        <p>Let's create a simple drawing application using Canvas. This will demonstrate how to handle user interactions with Canvas.</p>
        
        <div class="demo-container">
            <h3>Canvas Drawing App:</h3>
            <div class="controls">
                <label for="brushColor">Color:</label>
                <input type="color" id="brushColor" value="#000000" class="color-picker">
                
                <label for="brushSize">Size:</label>
                <input type="range" id="brushSize" min="1" max="50" value="5" class="range-slider">
                <span id="sizeValue">5</span>px
                
                <button id="clearCanvas">Clear Canvas</button>
            </div>
            <canvas id="drawingCanvas" width="600" height="300" class="canvas-container" style="cursor: crosshair;"></canvas>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const canvas = document.getElementById('drawingCanvas');
                    const ctx = canvas.getContext('2d');
                    const colorPicker = document.getElementById('brushColor');
                    const brushSize = document.getElementById('brushSize');
                    const sizeValue = document.getElementById('sizeValue');
                    const clearBtn = document.getElementById('clearCanvas');
                    
                    // Set initial canvas background
                    ctx.fillStyle = 'white';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                    
                    // Drawing state
                    let isDrawing = false;
                    let lastX = 0;
                    let lastY = 0;
                    
                    // Update brush size display
                    brushSize.addEventListener('input', function() {
                        sizeValue.textContent = this.value;
                    });
                    
                    // Clear canvas
                    clearBtn.addEventListener('click', function() {
                        ctx.fillStyle = 'white';
                        ctx.fillRect(0, 0, canvas.width, canvas.height);
                    });
                    
                    // Start drawing
                    canvas.addEventListener('mousedown', function(e) {
                        isDrawing = true;
                        [lastX, lastY] = getMousePos(canvas, e);
                    });
                    
                    // Draw
                    canvas.addEventListener('mousemove', function(e) {
                        if (!isDrawing) return;
                        
                        const [x, y] = getMousePos(canvas, e);
                        
                        ctx.lineJoin = 'round';
                        ctx.lineCap = 'round';
                        ctx.lineWidth = brushSize.value;
                        ctx.strokeStyle = colorPicker.value;
                        
                        ctx.beginPath();
                        ctx.moveTo(lastX, lastY);
                        ctx.lineTo(x, y);
                        ctx.stroke();
                        
                        [lastX, lastY] = [x, y];
                    });
                    
                    // Stop drawing
                    canvas.addEventListener('mouseup', () => isDrawing = false);
                    canvas.addEventListener('mouseout', () => isDrawing = false);
                    
                    // Touch support
                    canvas.addEventListener('touchstart', function(e) {
                        e.preventDefault();
                        isDrawing = true;
                        [lastX, lastY] = getTouchPos(canvas, e);
                    });
                    
                    canvas.addEventListener('touchmove', function(e) {
                        e.preventDefault();
                        if (!isDrawing) return;
                        
                        const [x, y] = getTouchPos(canvas, e);
                        
                        ctx.lineJoin = 'round';
                        ctx.lineCap = 'round';
                        ctx.lineWidth = brushSize.value;
                        ctx.strokeStyle = colorPicker.value;
                        
                        ctx.beginPath();
                        ctx.moveTo(lastX, lastY);
                        ctx.lineTo(x, y);
                        ctx.stroke();
                        
                        [lastX, lastY] = [x, y];
                    });
                    
                    canvas.addEventListener('touchend', () => isDrawing = false);
                    
                    // Helper functions
                    function getMousePos(canvas, evt) {
                        const rect = canvas.getBoundingClientRect();
                        return [
                            evt.clientX - rect.left,
                            evt.clientY - rect.top
                        ];
                    }
                    
                    function getTouchPos(canvas, evt) {
                        const rect = canvas.getBoundingClientRect();
                        const touch = evt.touches[0];
                        return [
                            touch.clientX - rect.left,
                            touch.clientY - rect.top
                        ];
                    }
                });
            </script>
        </div>
        
        <div class="note">
            <h3>Canvas Performance Tips:</h3>
            <ul>
                <li>Avoid unnecessary canvas state changes (fillStyle, strokeStyle, etc.)</li>
                <li>Group similar drawing operations together</li>
                <li>Use multiple canvas layers for complex scenes</li>
                <li>Limit the number of objects being drawn</li>
                <li>Use <code>requestAnimationFrame</code> instead of <code>setTimeout</code> for animations</li>
                <li>Consider using <code>canvas.toDataURL()</code> to cache complex drawings</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>SVG (Scalable Vector Graphics)</h2>
        <p>SVG is an XML-based markup language for describing two-dimensional vector graphics. Unlike Canvas, SVG is resolution-independent and creates DOM elements for each shape.</p>
        
        <h3>Creating SVG Elements</h3>
        <p>You can create SVG elements directly in your HTML or dynamically with JavaScript:</p>
        
        <div class="code-block">
            &lt;!-- Inline SVG in HTML --&gt;
            &lt;svg width="400" height="200" xmlns="http://www.w3.org/2000/svg"&gt;
                &lt;!-- Rectangle --&gt;
                &lt;rect x="10" y="10" width="100" height="80" fill="blue" stroke="red" stroke-width="3" /&gt;
                
                &lt;!-- Line --&gt;
                &lt;line x1="150" y1="20" x2="250" y2="100" stroke="red" stroke-width="3" /&gt;
                
                &lt;!-- Circle --&gt;
                &lt;circle cx="300" cy="50" r="40" fill="blue" stroke="red" stroke-width="3" /&gt;
                
                &lt;!-- Text --&gt;
                &lt;text x="150" y="150" font-family="Arial" font-size="20" fill="black"&gt;Hello SVG!&lt;/text&gt;
            &lt;/svg&gt;
        </div>
        
        <div class="demo-container">
            <h3>Basic SVG Elements Demo:</h3>
            <svg width="400" height="200" class="svg-container">
                <!-- Rectangle -->
                <rect x="10" y="10" width="100" height="80" fill="blue" stroke="red" stroke-width="3" />
                
                <!-- Line -->
                <line x1="150" y1="20" x2="250" y2="100" stroke="red" stroke-width="3" />
                
                <!-- Circle -->
                <circle cx="300" cy="50" r="40" fill="blue" stroke="red" stroke-width="3" />
                
                <!-- Text -->
                <text x="150" y="150" font-family="Arial" font-size="20" fill="black">Hello SVG!</text>
            </svg>
        </div>
        
        <h3>Creating SVG with JavaScript</h3>
        <p>You can also create and manipulate SVG elements dynamically with JavaScript:</p>
        
        <div class="code-block">
            // Create SVG element
            const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
            svg.setAttribute('width', '400');
            svg.setAttribute('height', '200');
            document.body.appendChild(svg);
            
            // Create a rectangle
            const rect = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
            rect.setAttribute('x', '10');
            rect.setAttribute('y', '10');
            rect.setAttribute('width', '100');
            rect.setAttribute('height', '80');
            rect.setAttribute('fill', 'blue');
            rect.setAttribute('stroke', 'red');
            rect.setAttribute('stroke-width', '3');
            svg.appendChild(rect);
            
            // Create a circle
            const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
            circle.setAttribute('cx', '300');
            circle.setAttribute('cy', '50');
            circle.setAttribute('r', '40');
            circle.setAttribute('fill', 'green');
            svg.appendChild(circle);
        </div>
        
        <h3>SVG Paths</h3>
        <p>The <code>&lt;path&gt;</code> element is the most powerful element in SVG. It can be used to create any shape:</p>
        
        <div class="code-block">
            &lt;svg width="400" height="200" xmlns="http://www.w3.org/2000/svg"&gt;
                &lt;!-- Triangle using path --&gt;
                &lt;path d="M50,50 L150,50 L100,150 Z" fill="green" stroke="black" stroke-width="2" /&gt;
                
                &lt;!-- More complex shape --&gt;
                &lt;path d="M200,50 C230,30 270,30 300,50 S340,70 370,50" 
                      fill="none" stroke="purple" stroke-width="3" /&gt;
            &lt;/svg&gt;
        </div>
        
        <div class="demo-container">
            <h3>SVG Paths Demo:</h3>
            <svg width="400" height="200" class="svg-container">
                <!-- Triangle using path -->
                <path d="M50,50 L150,50 L100,150 Z" fill="green" stroke="black" stroke-width="2" />
                
                <!-- Star using path -->
                <path d="M250,50 L260,84 L295,84 L267,104 L278,138 L250,118 L222,138 L233,104 L205,84 L240,84 Z" 
                      fill="gold" stroke="orange" stroke-width="2" />
                
                <!-- Curved path -->
                <path d="M50,180 C100,120 150,200 200,150 S300,180 350,140" 
                      fill="none" stroke="purple" stroke-width="3" />
            </svg>
        </div>
        
        <h3>SVG Path Commands</h3>
        <p>The path data consists of commands and parameters:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Command</th>
                <th>Description</th>
                <th>Parameters</th>
            </tr>
            <tr>
                <td>M, m</td>
                <td>Move to</td>
                <td>x y</td>
            </tr>
            <tr>
                <td>L, l</td>
                <td>Line to</td>
                <td>x y</td>
            </tr>
            <tr>
                <td>H, h</td>
                <td>Horizontal line to</td>
                <td>x</td>
            </tr>
            <tr>
                <td>V, v</td>
                <td>Vertical line to</td>
                <td>y</td>
            </tr>
            <tr>
                <td>C, c</td>
                <td>Cubic Bézier curve</td>
                <td>x1 y1 x2 y2 x y</td>
            </tr>
            <tr>
                <td>S, s</td>
                <td>Smooth cubic Bézier</td>
                <td>x2 y2 x y</td>
            </tr>
            <tr>
                <td>Q, q</td>
                <td>Quadratic Bézier curve</td>
                <td>x1 y1 x y</td>
            </tr>
            <tr>
                <td>T, t</td>
                <td>Smooth quadratic Bézier</td>
                <td>x y</td>
            </tr>
            <tr>
                <td>A, a</td>
                <td>Elliptical arc</td>
                <td>rx ry x-axis-rotation large-arc-flag sweep-flag x y</td>
            </tr>
            <tr>
                <td>Z, z</td>
                <td>Close path</td>
                <td>none</td>
            </tr>
        </table>
        
        <div class="note">
            <p>Uppercase commands (M, L, etc.) use absolute coordinates, while lowercase commands (m, l, etc.) use coordinates relative to the current position.</p>
        </div>
        
        <h3>SVG Transformations</h3>
        <p>SVG elements can be transformed using the <code>transform</code> attribute:</p>
        
        <div class="code-block">
            &lt;svg width="400" height="200" xmlns="http://www.w3.org/2000/svg"&gt;
                &lt;!-- Original rectangle for reference --&gt;
                &lt;rect x="75" y="75" width="50" height="50" fill="blue" /&gt;
                
                &lt;!-- Transformed rectangle --&gt;
                &lt;rect x="-25" y="-25" width="50" height="50" fill="purple"
                      transform="translate(250, 100) rotate(45) scale(1.5, 0.5)" /&gt;
            &lt;/svg&gt;
        </div>
        
        <div class="demo-container">
            <h3>SVG Transformations Demo:</h3>
            <svg width="400" height="200" class="svg-container">
                <!-- Original rectangle for reference -->
                <rect x="75" y="75" width="50" height="50" fill="blue" />
                
                <!-- Transformed rectangle -->
                <rect x="-25" y="-25" width="50" height="50" fill="purple"
                      transform="translate(250, 100) rotate(45) scale(1.5, 0.5)" />
                
                <!-- Labels -->
                <text x="75" y="50" font-family="Arial" font-size="14" fill="black">Original</text>
                <text x="225" y="50" font-family="Arial" font-size="14" fill="black">Transformed</text>
                
                <!-- Arrow -->
                <line x1="130" y1="100" x2="200" y2="100" stroke="black" stroke-width="1" />
                <path d="M195,95 L200,100 L195,105" fill="none" stroke="black" stroke-width="1" />
            </svg>
        </div>
        
        <h3>SVG Animation</h3>
        <p>SVG elements can be animated in several ways:</p>
        <ol>
            <li>Using CSS animations and transitions</li>
            <li>Using SMIL (Synchronized Multimedia Integration Language) animations</li>
            <li>Using JavaScript to manipulate attributes</li>
        </ol>
        
        <h4>CSS Animation Example:</h4>
        <div class="code-block">
            &lt;style&gt;
                @keyframes move {
                    0% { transform: translateX(0); }
                    100% { transform: translateX(300px); }
                }
                
                .animated-circle {
                    animation: move 3s linear infinite alternate;
                }
            &lt;/style&gt;
            
            &lt;svg width="400" height="100" xmlns="http://www.w3.org/2000/svg"&gt;
                &lt;circle class="animated-circle" cx="50" cy="50" r="20" fill="red" /&gt;
            &lt;/svg&gt;
        </div>
        
        <div class="demo-container">
            <h3>SVG CSS Animation Demo:</h3>
            <style>
                @keyframes move {
                    0% { transform: translateX(0); }
                    100% { transform: translateX(300px); }
                }
                
                .animated-circle {
                    animation: move 3s linear infinite alternate;
                }
            </style>
            
            <svg width="400" height="100" class="svg-container">
                <circle class="animated-circle" cx="50" cy="50" r="20" fill="red" />
            </svg>
        </div>
        
        <h4>SMIL Animation Example:</h4>
        <div class="code-block">
            &lt;svg width="400" height="100" xmlns="http://www.w3.org/2000/svg"&gt;
                &lt;circle cx="50" cy="50" r="20" fill="blue"&gt;
                    &lt;animate 
                        attributeName="cx" 
                        from="50" 
                        to="350" 
                        dur="3s" 
                        repeatCount="indefinite" 
                        fill="freeze" 
                        id="circleAnim" /&gt;
                &lt;/circle&gt;
            &lt;/svg&gt;
        </div>
        
        <div class="demo-container">
            <h3>SVG SMIL Animation Demo:</h3>
            <svg width="400" height="100" class="svg-container">
                <circle cx="50" cy="50" r="20" fill="blue">
                    <animate 
                        attributeName="cx" 
                        from="50" 
                        to="350" 
                        dur="3s" 
                        repeatCount="indefinite" 
                        fill="freeze" 
                        id="circleAnim" />
                </circle>
            </svg>
            <p><small>Note: SMIL animations are deprecated in some browsers. Consider using CSS or JavaScript for production.</small></p>
        </div>
        
        <h4>JavaScript Animation Example:</h4>
        <div class="code-block">
            const circle = document.getElementById('jsAnimCircle');
            let x = 50;
            const speed = 2;
            
            function animate() {
                x += speed;
                if (x > 350) {
                    x = 50;
                }
                
                circle.setAttribute('cx', x);
                requestAnimationFrame(animate);
            }
            
            animate();
        </div>
        
        <div class="demo-container">
            <h3>SVG JavaScript Animation Demo:</h3>
            <svg width="400" height="100" class="svg-container">
                <circle id="jsAnimCircle" cx="50" cy="50" r="20" fill="green" />
            </svg>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const circle = document.getElementById('jsAnimCircle');
                    let x = 50;
                    const speed = 2;
                    
                    function animate() {
                        x += speed;
                        if (x > 350) {
                            x = 50;
                        }
                        
                        circle.setAttribute('cx', x);
                        requestAnimationFrame(animate);
                    }
                    
                    animate();
                });
            </script>
        </div>
        
        <h3>SVG Interactivity</h3>
        <p>SVG elements can respond to events just like HTML elements:</p>
        
        <div class="code-block">
            &lt;svg width="400" height="200" xmlns="http://www.w3.org/2000/svg"&gt;
                &lt;circle id="interactiveCircle" cx="200" cy="100" r="50" 
                        fill="blue" stroke="black" stroke-width="2"
                        onclick="this.setAttribute('fill', 'red')"
                        onmouseover="this.setAttribute('r', '60')"
                        onmouseout="this.setAttribute('r', '50')" /&gt;
            &lt;/svg&gt;
        </div>
        
        <div class="demo-container">
            <h3>SVG Interactivity Demo:</h3>
            <p>Click the circle to change its color. Hover to change its size.</p>
            <svg width="400" height="200" class="svg-container">
                <circle id="interactiveCircle" cx="200" cy="100" r="50" 
                        fill="blue" stroke="black" stroke-width="2" />
            </svg>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const circle = document.getElementById('interactiveCircle');
                    
                    circle.addEventListener('click', function() {
                        const currentFill = this.getAttribute('fill');
                        this.setAttribute('fill', currentFill === 'blue' ? 'red' : 'blue');
                    });
                    
                    circle.addEventListener('mouseover', function() {
                        this.setAttribute('r', '60');
                    });
                    
                    circle.addEventListener('mouseout', function() {
                        this.setAttribute('r', '50');
                    });
                });
            </script>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Interactive SVG Drawing App</h2>
        <p>Let's create a simple SVG-based drawing application to demonstrate how SVG differs from Canvas in handling user interactions.</p>
        
        <div class="demo-container">
            <h3>SVG Drawing App:</h3>
            <div class="controls">
                <label for="svgShapeType">Shape:</label>
                <select id="svgShapeType">
                    <option value="rect">Rectangle</option>
                    <option value="circle">Circle</option>
                    <option value="line">Line</option>
                </select>
                
                <label for="svgFillColor">Fill:</label>
                <input type="color" id="svgFillColor" value="#3498db" class="color-picker">
                
                <label for="svgStrokeColor">Stroke:</label>
                <input type="color" id="svgStrokeColor" value="#000000" class="color-picker">
                
                <label for="svgStrokeWidth">Stroke Width:</label>
                <input type="range" id="svgStrokeWidth" min="1" max="10" value="2" class="range-slider">
                
                <button id="clearSvg">Clear All</button>
            </div>
            <div id="svgContainer" style="width: 600px; height: 300px; border: 1px solid #ddd; background-color: white;"></div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const container = document.getElementById('svgContainer');
                    const shapeType = document.getElementById('svgShapeType');
                    const fillColor = document.getElementById('svgFillColor');
                    const strokeColor = document.getElementById('svgStrokeColor');
                    const strokeWidth = document.getElementById('svgStrokeWidth');
                    const clearBtn = document.getElementById('clearSvg');
                    
                    // Create SVG element
                    const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
                    svg.setAttribute('width', '100%');
                    svg.setAttribute('height', '100%');
                    container.appendChild(svg);
                    
                    // Drawing state
                    let isDrawing = false;
                    let currentShape = null;
                    let startX = 0;
                    let startY = 0;
                    
                    // Clear SVG
                    clearBtn.addEventListener('click', function() {
                        while (svg.firstChild) {
                            svg.removeChild(svg.firstChild);
                        }
                    });
                    
                    // Start drawing
                    svg.addEventListener('mousedown', function(e) {
                        isDrawing = true;
                        const rect = container.getBoundingClientRect();
                        startX = e.clientX - rect.left;
                        startY = e.clientY - rect.top;
                        
                        // Create shape based on selected type
                        switch(shapeType.value) {
                            case 'rect':
                                currentShape = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
                                currentShape.setAttribute('x', startX);
                                currentShape.setAttribute('y', startY);
                                currentShape.setAttribute('width', 0);
                                currentShape.setAttribute('height', 0);
                                break;
                            case 'circle':
                                currentShape = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
                                currentShape.setAttribute('cx', startX);
                                currentShape.setAttribute('cy', startY);
                                currentShape.setAttribute('r', 0);
                                break;
                            case 'line':
                                currentShape = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                                currentShape.setAttribute('x1', startX);
                                currentShape.setAttribute('y1', startY);
                                currentShape.setAttribute('x2', startX);
                                currentShape.setAttribute('y2', startY);
                                break;
                        }
                        
                        // Set styles
                        currentShape.setAttribute('fill', shapeType.value === 'line' ? 'none' : fillColor.value);
                        currentShape.setAttribute('stroke', strokeColor.value);
                        currentShape.setAttribute('stroke-width', strokeWidth.value);
                        
                        // Add to SVG
                        svg.appendChild(currentShape);
                    });
                    
                    // Draw
                    svg.addEventListener('mousemove', function(e) {
                        if (!isDrawing) return;
                        
                        const rect = container.getBoundingClientRect();
                        const currentX = e.clientX - rect.left;
                        const currentY = e.clientY - rect.top;
                        
                        // Update shape based on type
                        switch(shapeType.value) {
                            case 'rect':
                                const width = currentX - startX;
                                const height = currentY - startY;
                                
                                // Handle negative dimensions
                                if (width < 0) {
                                    currentShape.setAttribute('x', currentX);
                                    currentShape.setAttribute('width', Math.abs(width));
                                } else {
                                    currentShape.setAttribute('width', width);
                                }
                                
                                if (height < 0) {
                                    currentShape.setAttribute('y', currentY);
                                    currentShape.setAttribute('height', Math.abs(height));
                                } else {
                                    currentShape.setAttribute('height', height);
                                }
                                break;
                            case 'circle':
                                const dx = currentX - startX;
                                const dy = currentY - startY;
                                const radius = Math.sqrt(dx * dx + dy * dy);
                                currentShape.setAttribute('r', radius);
                                break;
                            case 'line':
                                currentShape.setAttribute('x2', currentX);
                                currentShape.setAttribute('y2', currentY);
                                break;
                        }
                    });
                    
                    // Stop drawing
                    svg.addEventListener('mouseup', function() {
                        isDrawing = false;
                        currentShape = null;
                    });
                    
                    svg.addEventListener('mouseleave', function() {
                        isDrawing = false;
                        currentShape = null;
                    });
                });
            </script>
        </div>
        
        <div class="note">
            <h3>SVG vs Canvas for Drawing Applications:</h3>
            <p>Notice the key differences between the SVG and Canvas drawing apps:</p>
            <ul>
                <li><strong>Object Model:</strong> SVG creates DOM elements for each shape, while Canvas just draws pixels</li>
                <li><strong>Interaction:</strong> SVG shapes can be individually selected and modified later</li>
                <li><strong>Memory:</strong> SVG uses more memory as the number of shapes increases</li>
                <li><strong>Scalability:</strong> SVG shapes maintain quality when zoomed, Canvas becomes pixelated</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Combining Canvas and SVG</h2>
        <p>In some cases, you might want to combine Canvas and SVG to leverage the strengths of both technologies:</p>
        
        <div class="example">
            <h3>When to Combine Canvas and SVG:</h3>
            <ul>
                <li>Use SVG for UI elements and interactive components</li>
                <li>Use Canvas for high-performance rendering of complex scenes</li>
                <li>Use SVG for vector graphics that need to scale</li>
                <li>Use Canvas for pixel manipulation and image processing</li>
            </ul>
        </div>
        
        <div class="code-block">
            &lt;!-- HTML structure --&gt;
            &lt;div class="graphics-container"&gt;
                &lt;canvas id="backgroundCanvas" width="600" height="400"&gt;&lt;/canvas&gt;
                &lt;svg id="uiOverlay" width="600" height="400"&gt;
                    &lt;!-- SVG UI elements go here --&gt;
                &lt;/svg&gt;
            &lt;/div&gt;
            
            &lt;style&gt;
                .graphics-container {
                    position: relative;
                    width: 600px;
                    height: 400px;
                }
                
                #backgroundCanvas {
                    position: absolute;
                    top: 0;
                    left: 0;
                    z-index: 1;
                }
                
                #uiOverlay {
                    position: absolute;
                    top: 0;
                    left: 0;
                    z-index: 2;
                    pointer-events: none; /* Allow clicks to pass through to canvas */
                }
                
                /* Make specific SVG elements interactive */
                #uiOverlay .interactive {
                    pointer-events: auto;
                }
            &lt;/style&gt;
        </div>
        
        <div class="demo-container">
            <h3>Canvas + SVG Demo:</h3>
            <div class="graphics-container" style="position: relative; width: 600px; height: 300px;">
                <canvas id="combinedCanvas" width="600" height="300" style="position: absolute; top: 0; left: 0; z-index: 1;"></canvas>
                <svg id="combinedSvg" width="600" height="300" style="position: absolute; top: 0; left: 0; z-index: 2; pointer-events: none;">
                    <!-- SVG UI elements will be added here -->
                </svg>
            </div>
            
            <div class="controls" style="margin-top: 10px;">
                <button id="addParticles">Add Particles</button>
                <button id="addControls">Add SVG Controls</button>
                <button id="resetDemo">Reset Demo</button>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const canvas = document.getElementById('combinedCanvas');
                    const ctx = canvas.getContext('2d');
                    const svg = document.getElementById('combinedSvg');
                    
                    const addParticlesBtn = document.getElementById('addParticles');
                    const addControlsBtn = document.getElementById('addControls');
                    const resetBtn = document.getElementById('resetDemo');
                    
                    // Canvas background
                    ctx.fillStyle = '#f0f0f0';
                    ctx.fillRect(0, 0, canvas.width, canvas.height);
                    
                    // Particles system
                    let particles = [];
                    let animationId = null;
                    
                    function Particle(x, y) {
                        this.x = x;
                        this.y = y;
                        this.size = Math.random() * 5 + 2;
                        this.speedX = Math.random() * 3 - 1.5;
                        this.speedY = Math.random() * 3 - 1.5;
                        this.color = `hsl(${Math.random() * 360}, 70%, 50%)`;
                    }
                    
                    Particle.prototype.update = function() {
                        this.x += this.speedX;
                        this.y += this.speedY;
                        
                        // Bounce off edges
                        if (this.x < 0 || this.x > canvas.width) this.speedX *= -1;
                        if (this.y < 0 || this.y > canvas.height) this.speedY *= -1;
                    };
                    
                    Particle.prototype.draw = function() {
                        ctx.fillStyle = this.color;
                        ctx.beginPath();
                        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                        ctx.fill();
                    };
                    
                    function createParticles(count) {
                        for (let i = 0; i < count; i++) {
                            const x = Math.random() * canvas.width;
                            const y = Math.random() * canvas.height;
                            particles.push(new Particle(x, y));
                        }
                    }
                    
                    function animate() {
                        ctx.fillStyle = 'rgba(240, 240, 240, 0.1)';
                        ctx.fillRect(0, 0, canvas.width, canvas.height);
                        
                        particles.forEach(particle => {
                            particle.update();
                            particle.draw();
                        });
                        
                        animationId = requestAnimationFrame(animate);
                    }
                    
                    // Add SVG controls
                    function addSvgControls() {
                        // Clear existing controls
                        while (svg.firstChild) {
                            svg.removeChild(svg.firstChild);
                        }
                        
                        // Add play/pause button
                        const playButton = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
                        playButton.setAttribute('cx', 50);
                        playButton.setAttribute('cy', 50);
                        playButton.setAttribute('r', 30);
                        playButton.setAttribute('fill', '#3498db');
                        playButton.setAttribute('class', 'interactive');
                        playButton.setAttribute('style', 'pointer-events: auto; cursor: pointer;');
                        svg.appendChild(playButton);
                        
                        // Add play icon
                        const playIcon = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                        playIcon.setAttribute('d', 'M45,35 L45,65 L65,50 Z');
                        playIcon.setAttribute('fill', 'white');
                        playIcon.setAttribute('class', 'interactive');
                        playIcon.setAttribute('style', 'pointer-events: auto; cursor: pointer;');
                        svg.appendChild(playIcon);
                        
                        // Add slider
                        const sliderTrack = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
                        sliderTrack.setAttribute('x', 100);
                        sliderTrack.setAttribute('y', 48);
                        sliderTrack.setAttribute('width', 200);
                        sliderTrack.setAttribute('height', 4);
                        sliderTrack.setAttribute('rx', 2);
                        sliderTrack.setAttribute('fill', '#ccc');
                        svg.appendChild(sliderTrack);
                        
                        const sliderHandle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
                        sliderHandle.setAttribute('cx', 200);
                        sliderHandle.setAttribute('cy', 50);
                        sliderHandle.setAttribute('r', 10);
                        sliderHandle.setAttribute('fill', '#3498db');
                        sliderHandle.setAttribute('class', 'interactive');
                        sliderHandle.setAttribute('style', 'pointer-events: auto; cursor: pointer;');
                        svg.appendChild(sliderHandle);
                        
                        // Add text label
                        const label = document.createElementNS('http://www.w3.org/2000/svg', 'text');
                        label.setAttribute('x', 320);
                        label.setAttribute('y', 55);
                        label.setAttribute('font-family', 'Arial');
                        label.setAttribute('font-size', '14');
                        label.setAttribute('fill', '#333');
                        label.textContent = 'Particle Speed';
                        svg.appendChild(label);
                        
                        // Add event listeners
                        let isPlaying = true;
                        
                        playButton.addEventListener('click', togglePlay);
                        playIcon.addEventListener('click', togglePlay);
                        
                        function togglePlay() {
                            if (isPlaying) {
                                cancelAnimationFrame(animationId);
                                playIcon.setAttribute('d', 'M40,35 L50,35 L50,65 L40,65 Z M55,35 L65,35 L65,65 L55,65 Z');
                            } else {
                                animate();
                                playIcon.setAttribute('d', 'M45,35 L45,65 L65,50 Z');
                            }
                            isPlaying = !isPlaying;
                        }
                        
                        // Draggable slider
                        let isDragging = false;
                        
                        sliderHandle.addEventListener('mousedown', function(e) {
                            isDragging = true;
                        });
                        
                        document.addEventListener('mousemove', function(e) {
                            if (isDragging) {
                                const rect = svg.getBoundingClientRect();
                                let x = e.clientX - rect.left;
                                
                                // Constrain to slider track
                                x = Math.max(100, Math.min(300, x));
                                
                                sliderHandle.setAttribute('cx', x);
                                
                                // Update particle speed based on slider position
                                const speedFactor = (x - 100) / 200 * 2 + 0.5; // 0.5 to 2.5
                                
                                particles.forEach(particle => {
                                    particle.speedX = particle.speedX > 0 ? 
                                        Math.abs(particle.speedX / particle.speedX * speedFactor) : 
                                        -Math.abs(particle.speedX / particle.speedX * speedFactor);
                                    particle.speedY = particle.speedY > 0 ? 
                                        Math.abs(particle.speedY / particle.speedY * speedFactor) : 
                                        -Math.abs(particle.speedY / particle.speedY * speedFactor);
                                });
                            }
                        });
                        
                        document.addEventListener('mouseup', function() {
                            isDragging = false;
                        });
                    }
                    
                    // Button event listeners
                    addParticlesBtn.addEventListener('click', function() {
                        createParticles(50);
                        if (!animationId) animate();
                    });
                    
                    addControlsBtn.addEventListener('click', addSvgControls);
                    
                    resetBtn.addEventListener('click', function() {
                        // Stop animation
                        if (animationId) {
                            cancelAnimationFrame(animationId);
                            animationId = null;
                        }
                        
                        // Clear canvas
                        ctx.fillStyle = '#f0f0f0';
                        ctx.fillRect(0, 0, canvas.width, canvas.height);
                        
                        // Clear SVG
                        while (svg.firstChild) {
                            svg.removeChild(svg.firstChild);
                        }
                        
                        // Reset particles
                        particles = [];
                    });
                    
                    // Initial setup
                    createParticles(20);
                    animate();
                });
            </script>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Create a Logo with SVG</h2>
        <p>Let's practice creating a logo using SVG. You'll create a simple logo that combines basic shapes and text.</p>
        
        <div>
            <textarea id="svgEditor" rows="20" style="width: 100%; font-family: monospace; padding: 10px;"><svg width="300" height="200" xmlns="http://www.w3.org/2000/svg">
    <!-- Create your logo here using SVG elements -->
    <!-- Try using circles, rectangles, paths, and text -->
    <!-- Example: -->
    <circle cx="150" cy="100" r="50" fill="blue" />
    
</svg></textarea>
            <button onclick="updateSvgPreview()">Update Preview</button>
        </div>
        
        <h3>Preview:</h3>
        <div id="svgPreview" style="width: 300px; height: 200px; border: 1px solid #ddd; margin: 10px 0;"></div>
        
        <div class="note" style="margin-top: 20px;">
            <h3>Hint:</h3>
            <p>Your logo should include:</p>
            <ul>
                <li>At least two different shapes (circle, rectangle, path, etc.)</li>
                <li>Text for a company name</li>
                <li>At least two different colors</li>
                <li>Optional: Add a simple animation or hover effect</li>
            </ul>
        </div>
        
        <button id="showSvgSolution" style="margin-top: 15px;">Show Solution</button>
        <div id="svgSolution" style="display: none; margin-top: 15px; padding: 15px; background-color: #f0f0f0; border-radius: 5px;">
            <h3>Solution:</h3>
            <pre style="background-color: #2c3e50; color: #ecf0f1; padding: 15px; border-radius: 5px; overflow-x: auto;">
&lt;svg width="300" height="200" xmlns="http://www.w3.org/2000/svg"&gt;
    &lt;!-- Background rectangle --&gt;
    &lt;rect width="300" height="200" fill="#f5f5f5" rx="10" ry="10" /&gt;
    
    &lt;!-- Logo shape - overlapping circles --&gt;
    &lt;circle cx="120" cy="80" r="40" fill="#3498db" opacity="0.8" /&gt;
    &lt;circle cx="150" cy="80" r="40" fill="#e74c3c" opacity="0.8" /&gt;
    &lt;circle cx="180" cy="80" r="40" fill="#2ecc71" opacity="0.8" /&gt;
    
    &lt;!-- Company name --&gt;
    &lt;text x="150" y="150" font-family="Arial" font-size="24" font-weight="bold" 
          text-anchor="middle" fill="#2c3e50"&gt;WebCraft&lt;/text&gt;
    
    &lt;!-- Tagline --&gt;
    &lt;text x="150" y="170" font-family="Arial" font-size="12" 
          text-anchor="middle" fill="#7f8c8d"&gt;Creative Web Solutions&lt;/text&gt;
    
    &lt;!-- Add hover effect with CSS --&gt;
    &lt;style&gt;
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        circle:hover {
            animation: pulse 1s infinite;
        }
    &lt;/style&gt;
&lt;/svg&gt;
            </pre>
        </div>
        
        <script>
            function updateSvgPreview() {
                const svgCode = document.getElementById('svgEditor').value;
                const previewDiv = document.getElementById('svgPreview');
                
                previewDiv.innerHTML = svgCode;
            }
            
            document.getElementById('showSvgSolution').addEventListener('click', function() {
                const solution = document.getElementById('svgSolution');
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
                updateSvgPreview();
            };
        </script>
    </div>
    
    <div class="quiz-container">
        <h2>Knowledge Check</h2>
        
        <div class="quiz-question">
            1. Which technology creates raster (pixel-based) graphics?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> SVG</label>
            <label><input type="radio" name="q1" value="b"> Canvas</label>
            <label><input type="radio" name="q1" value="c"> Both SVG and Canvas</label>
            <label><input type="radio" name="q1" value="d"> Neither SVG nor Canvas</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which method is used to get a drawing context for a Canvas element?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> canvas.getDrawingContext('2d')</label>
            <label><input type="radio" name="q2" value="b"> canvas.createContext('2d')</label>
            <label><input type="radio" name="q2" value="c"> canvas.getContext('2d')</label>
            <label><input type="radio" name="q2" value="d"> canvas.initContext('2d')</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which of the following is NOT a valid SVG element?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> &lt;rect&gt;</label>
            <label><input type="radio" name="q3" value="b"> &lt;circle&gt;</label>
            <label><input type="radio" name="q3" value="c"> &lt;square&gt;</label>
            <label><input type="radio" name="q3" value="d"> &lt;path&gt;</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. Which technology is better for applications that need to manipulate thousands of objects?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> SVG</label>
            <label><input type="radio" name="q4" value="b"> Canvas</label>
            <label><input type="radio" name="q4" value="c"> They perform equally well</label>
            <label><input type="radio" name="q4" value="d"> It depends on the browser</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. Which method is used to start a new path in Canvas?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> ctx.startPath()</label>
            <label><input type="radio" name="q5" value="b"> ctx.newPath()</label>
            <label><input type="radio" name="q5" value="c"> ctx.beginPath()</label>
            <label><input type="radio" name="q5" value="d"> ctx.createPath()</label>
        </div>
        <div id="feedback5" class="feedback"></div>
        
        <button onclick="checkSvgAnswers()">Submit Answers</button>
        
        <script>
            function checkSvgAnswers() {
                const answers = {
                    q1: 'b',
                    q2: 'c',
                    q3: 'c',
                    q4: 'b',
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
            <button onclick="window.location.href='01_html5_apis.php'">Previous Lesson: HTML5 APIs</button>
        </div>
        <div>
            <button onclick="window.location.href='03_web_components.php'">Next Lesson: Web Components</button>
        </div>
    </div>
</body>
</html>
