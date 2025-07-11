<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images and Multimedia</title>
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
        .image-container {
            text-align: center;
            margin: 20px 0;
        }
        .image-container img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
        }
        .image-caption {
            font-style: italic;
            color: #666;
            margin-top: 8px;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Images and Multimedia</h1>
    
    <div class="lesson-container">
        <h2>Adding Images with the img Tag</h2>
        <p>Images are an essential part of web content, making pages more engaging and informative. In HTML, images are added using the <code>&lt;img&gt;</code> element, which is a self-closing tag (it doesn't have a closing tag).</p>
        
        <div class="example">
            <h3>Basic Image Syntax:</h3>
            <div class="code-block">
                &lt;img src="image.jpg" alt="Description of the image"&gt;
            </div>
        </div>
        
        <p>The <code>src</code> attribute specifies the path to the image file, while the <code>alt</code> attribute provides alternative text that describes the image. The alt text is displayed if the image cannot be loaded and is also used by screen readers for accessibility.</p>
        
        <h3>Example of an Image:</h3>
        <div class="image-container">
            <img src="https://via.placeholder.com/400x200?text=Example+Image" alt="Example placeholder image">
            <p class="image-caption">A simple placeholder image</p>
        </div>
        
        <div class="code-block">
            &lt;img src="https://via.placeholder.com/400x200?text=Example+Image" alt="Example placeholder image"&gt;
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Image Attributes</h2>
        <p>The <code>&lt;img&gt;</code> element supports several attributes that control how images are displayed and provide additional information.</p>
        
        <h3>Essential Image Attributes</h3>
        <table class="comparison-table">
            <tr>
                <th>Attribute</th>
                <th>Description</th>
                <th>Example</th>
            </tr>
            <tr>
                <td><code>src</code></td>
                <td>Specifies the path to the image file (required)</td>
                <td><code>src="images/photo.jpg"</code></td>
            </tr>
            <tr>
                <td><code>alt</code></td>
                <td>Provides alternative text for the image (required for accessibility)</td>
                <td><code>alt="Mountain landscape"</code></td>
            </tr>
            <tr>
                <td><code>width</code></td>
                <td>Specifies the width of the image in pixels</td>
                <td><code>width="300"</code></td>
            </tr>
            <tr>
                <td><code>height</code></td>
                <td>Specifies the height of the image in pixels</td>
                <td><code>height="200"</code></td>
            </tr>
            <tr>
                <td><code>title</code></td>
                <td>Provides additional information (shown as tooltip on hover)</td>
                <td><code>title="Photo taken in Switzerland"</code></td>
            </tr>
            <tr>
                <td><code>loading</code></td>
                <td>Specifies how the browser should load the image</td>
                <td><code>loading="lazy"</code></td>
            </tr>
        </table>
        
        <div class="example">
            <h3>Image with Multiple Attributes:</h3>
            <div class="code-block">
                &lt;img src="mountain.jpg" alt="Mountain landscape" width="400" height="300" title="View of the Alps" loading="lazy"&gt;
            </div>
        </div>
        
        <div class="note">
            <h3>Best Practices for Image Attributes:</h3>
            <ul>
                <li><strong>Always include the <code>alt</code> attribute:</strong> It's essential for accessibility and SEO.</li>
                <li><strong>Specify width and height:</strong> This helps the browser allocate space for the image before it loads, reducing layout shifts.</li>
                <li><strong>Use <code>loading="lazy"</code>:</strong> This defers loading of off-screen images until the user scrolls near them, improving page load performance.</li>
                <li><strong>Keep file sizes small:</strong> Optimize images for web use to ensure fast loading times.</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Image Formats for the Web</h2>
        <p>Different image formats have different characteristics and are suitable for different types of images. Choosing the right format can significantly impact both image quality and page performance.</p>
        
        <h3>Common Web Image Formats</h3>
        <table class="comparison-table">
            <tr>
                <th>Format</th>
                <th>File Extension</th>
                <th>Best For</th>
                <th>Characteristics</th>
            </tr>
            <tr>
                <td>JPEG/JPG</td>
                <td>.jpg, .jpeg</td>
                <td>Photographs, complex images with many colors</td>
                <td>Lossy compression, smaller file sizes, no transparency</td>
            </tr>
            <tr>
                <td>PNG</td>
                <td>.png</td>
                <td>Images requiring transparency, graphics with text</td>
                <td>Lossless compression, larger file sizes, supports transparency</td>
            </tr>
            <tr>
                <td>GIF</td>
                <td>.gif</td>
                <td>Simple animations, images with few colors</td>
                <td>Limited to 256 colors, supports animation, supports transparency</td>
            </tr>
            <tr>
                <td>SVG</td>
                <td>.svg</td>
                <td>Logos, icons, illustrations</td>
                <td>Vector format (scalable), small file size, perfect for responsive design</td>
            </tr>
            <tr>
                <td>WebP</td>
                <td>.webp</td>
                <td>Modern replacement for JPEG and PNG</td>
                <td>Better compression than JPEG/PNG, supports transparency and animation</td>
            </tr>
        </table>
        
        <div class="note">
            <h3>Choosing the Right Format:</h3>
            <ul>
                <li><strong>Photographs:</strong> Use JPEG or WebP</li>
                <li><strong>Graphics with transparency:</strong> Use PNG or WebP</li>
                <li><strong>Logos and icons:</strong> Use SVG when possible</li>
                <li><strong>Simple animations:</strong> Use GIF or WebP</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Basic Responsive Images</h2>
        <p>Responsive images automatically adjust to fit different screen sizes, ensuring they look good on all devices from mobile phones to desktop computers.</p>
        
        <h3>Method 1: Using CSS Max-Width</h3>
        <p>The simplest way to make images responsive is to use CSS to set a maximum width:</p>
        
        <div class="example">
            <h3>CSS for Responsive Images:</h3>
            <div class="code-block">
                &lt;style&gt;<br>
                img {<br>
                &nbsp;&nbsp;max-width: 100%;<br>
                &nbsp;&nbsp;height: auto;<br>
                }<br>
                &lt;/style&gt;
            </div>
        </div>
        
        <p>This CSS rule ensures that images never exceed the width of their container and maintain their aspect ratio.</p>
        
        <h3>Method 2: Using the srcset Attribute</h3>
        <p>For more advanced responsive images, HTML provides the <code>srcset</code> attribute, which allows you to specify different image files for different screen resolutions:</p>
        
        <div class="example">
            <h3>Responsive Image with srcset:</h3>
            <div class="code-block">
                &lt;img src="small.jpg" <br>
                &nbsp;&nbsp;srcset="small.jpg 500w, <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;medium.jpg 1000w, <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;large.jpg 1500w" <br>
                &nbsp;&nbsp;alt="Responsive image example"&gt;
            </div>
        </div>
        
        <p>In this example:</p>
        <ul>
            <li><code>small.jpg</code> is used for viewport widths up to 500 pixels</li>
            <li><code>medium.jpg</code> is used for viewport widths between 500 and 1000 pixels</li>
            <li><code>large.jpg</code> is used for viewport widths above 1000 pixels</li>
        </ul>
        
        <h3>Method 3: Using the picture Element</h3>
        <p>The <code>&lt;picture&gt;</code> element provides even more control by allowing you to specify different image sources based on media queries:</p>
        
        <div class="example">
            <h3>Responsive Image with picture Element:</h3>
            <div class="code-block">
                &lt;picture&gt;<br>
                &nbsp;&nbsp;&lt;source media="(max-width: 600px)" srcset="small.jpg"&gt;<br>
                &nbsp;&nbsp;&lt;source media="(max-width: 1200px)" srcset="medium.jpg"&gt;<br>
                &nbsp;&nbsp;&lt;img src="large.jpg" alt="Responsive image example"&gt;<br>
                &lt;/picture&gt;
            </div>
        </div>
        
        <div class="note">
            <h3>Responsive Images Best Practices:</h3>
            <ul>
                <li>Always include a fallback <code>src</code> attribute for browsers that don't support <code>srcset</code> or <code>picture</code></li>
                <li>Optimize all image versions for their target screen sizes</li>
                <li>Use descriptive filenames that indicate the image dimensions (e.g., hero-800w.jpg)</li>
                <li>Consider using modern formats like WebP with fallbacks for older browsers</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Other Multimedia Elements</h2>
        <p>Beyond images, HTML supports various other multimedia elements for audio and video content.</p>
        
        <h3>Audio Element</h3>
        <p>The <code>&lt;audio&gt;</code> element allows you to embed sound content in your web pages:</p>
        
        <div class="example">
            <h3>Basic Audio Element:</h3>
            <div class="code-block">
                &lt;audio controls&gt;<br>
                &nbsp;&nbsp;&lt;source src="music.mp3" type="audio/mpeg"&gt;<br>
                &nbsp;&nbsp;&lt;source src="music.ogg" type="audio/ogg"&gt;<br>
                &nbsp;&nbsp;Your browser does not support the audio element.<br>
                &lt;/audio&gt;
            </div>
        </div>
        
        <h3>Video Element</h3>
        <p>The <code>&lt;video&gt;</code> element allows you to embed video content:</p>
        
        <div class="example">
            <h3>Basic Video Element:</h3>
            <div class="code-block">
                &lt;video width="320" height="240" controls&gt;<br>
                &nbsp;&nbsp;&lt;source src="movie.mp4" type="video/mp4"&gt;<br>
                &nbsp;&nbsp;&lt;source src="movie.webm" type="video/webm"&gt;<br>
                &nbsp;&nbsp;Your browser does not support the video tag.<br>
                &lt;/video&gt;
            </div>
        </div>
        
        <h3>Common Attributes for Audio and Video</h3>
        <table class="comparison-table">
            <tr>
                <th>Attribute</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><code>controls</code></td>
                <td>Displays playback controls (play, pause, volume, etc.)</td>
            </tr>
            <tr>
                <td><code>autoplay</code></td>
                <td>Starts playing the media automatically (use with caution)</td>
            </tr>
            <tr>
                <td><code>loop</code></td>
                <td>Plays the media again when it finishes</td>
            </tr>
            <tr>
                <td><code>muted</code></td>
                <td>Mutes the audio output</td>
            </tr>
            <tr>
                <td><code>preload</code></td>
                <td>Specifies if and how the media should be loaded when the page loads</td>
            </tr>
        </table>
        
        <div class="note">
            <h3>Multimedia Best Practices:</h3>
            <ul>
                <li>Always provide multiple source formats for better browser compatibility</li>
                <li>Include fallback text for browsers that don't support the elements</li>
                <li>Avoid autoplay for videos with sound (it can be annoying and may be blocked by browsers)</li>
                <li>Consider accessibility by providing captions or transcripts</li>
                <li>Optimize media files for web delivery to reduce loading times</li>
            </ul>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Create an Image Gallery</h2>
        <p>Practice working with images by creating a simple image gallery:</p>
        
        <div>
            <textarea id="htmlEditor" rows="20" style="width: 100%; font-family: monospace; padding: 10px;"><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        /* Add your CSS styles here to make the gallery look good */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
        }
        
        /* Add styles for your gallery here */
        
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>My Image Gallery</h1>
    
    <!-- Create your image gallery here -->
    <!-- Use at least 3 images with proper alt text -->
    <!-- Add captions for each image -->
    <!-- Make the images responsive -->
    
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
                <li>A responsive layout using CSS</li>
                <li>Proper image attributes (src, alt, width, height)</li>
                <li>Captions for each image</li>
                <li>You can use placeholder images from https://via.placeholder.com/ or https://picsum.photos/</li>
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
    &lt;title&gt;Image Gallery&lt;/title&gt;
    &lt;style&gt;
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .gallery-item {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }
        
        .gallery-item:hover {
            transform: translateY(-5px);
        }
        
        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .caption {
            padding: 10px;
            text-align: center;
            font-style: italic;
            color: #666;
        }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;My Image Gallery&lt;/h1&gt;
    
    &lt;div class="gallery"&gt;
        &lt;div class="gallery-item"&gt;
            &lt;img src="https://picsum.photos/id/1015/600/400" alt="Mountain landscape with a lake" width="600" height="400" loading="lazy"&gt;
            &lt;div class="caption"&gt;Beautiful mountain landscape with a serene lake&lt;/div&gt;
        &lt;/div&gt;
        
        &lt;div class="gallery-item"&gt;
            &lt;img src="https://picsum.photos/id/1018/600/400" alt="Foggy mountain forest" width="600" height="400" loading="lazy"&gt;
            &lt;div class="caption"&gt;Misty forest in the mountains during early morning&lt;/div&gt;
        &lt;/div&gt;
        
        &lt;div class="gallery-item"&gt;
            &lt;img src="https://picsum.photos/id/1019/600/400" alt="Ocean sunset with silhouette" width="600" height="400" loading="lazy"&gt;
            &lt;div class="caption"&gt;Breathtaking sunset over the ocean&lt;/div&gt;
        &lt;/div&gt;
        
        &lt;div class="gallery-item"&gt;
            &lt;img src="https://picsum.photos/id/1039/600/400" alt="Desert landscape" width="600" height="400" loading="lazy"&gt;
            &lt;div class="caption"&gt;Vast desert landscape under clear blue sky&lt;/div&gt;
        &lt;/div&gt;
        
        &lt;div class="gallery-item"&gt;
            &lt;img src="https://picsum.photos/id/1043/600/400" alt="Autumn forest path" width="600" height="400" loading="lazy"&gt;
            &lt;div class="caption"&gt;Path through a colorful autumn forest&lt;/div&gt;
        &lt;/div&gt;
        
        &lt;div class="gallery-item"&gt;
            &lt;img src="https://picsum.photos/id/1057/600/400" alt="Urban skyline" width="600" height="400" loading="lazy"&gt;
            &lt;div class="caption"&gt;Modern city skyline at dusk&lt;/div&gt;
        &lt;/div&gt;
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
            1. Which attribute is required for the &lt;img&gt; element for accessibility?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> src</label>
            <label><input type="radio" name="q1" value="b"> alt</label>
            <label><input type="radio" name="q1" value="c"> title</label>
            <label><input type="radio" name="q1" value="d"> width</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which image format is best for photographs with many colors?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> PNG</label>
            <label><input type="radio" name="q2" value="b"> GIF</label>
            <label><input type="radio" name="q2" value="c"> JPEG</label>
            <label><input type="radio" name="q2" value="d"> SVG</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which image format is vector-based and ideal for logos and icons?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> JPEG</label>
            <label><input type="radio" name="q3" value="b"> PNG</label>
            <label><input type="radio" name="q3" value="c"> GIF</label>
            <label><input type="radio" name="q3" value="d"> SVG</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. Which attribute can be used to make images load only when they're about to enter the viewport?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> lazy="true"</label>
            <label><input type="radio" name="q4" value="b"> loading="lazy"</label>
            <label><input type="radio" name="q4" value="c"> defer="true"</label>
            <label><input type="radio" name="q4" value="d"> async="true"</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. Which HTML element is used to embed video content?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> &lt;media&gt;</label>
            <label><input type="radio" name="q5" value="b"> &lt;movie&gt;</label>
            <label><input type="radio" name="q5" value="c"> &lt;vid&gt;</label>
            <label><input type="radio" name="q5" value="d"> &lt;video&gt;</label>
        </div>
        <div id="feedback5" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'b',
                    q2: 'c',
                    q3: 'd',
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
            <button onclick="window.location.href='04_links.php'">Previous Lesson: Links and Navigation</button>
        </div>
        <div>
            <button onclick="window.location.href='06_lists.php'">Next Lesson: Lists</button>
        </div>
    </div>
</body>
</html>
