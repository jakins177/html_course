<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embedding Content</title>
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
        
        /* Embedded content styles */
        .media-container {
            margin: 20px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            background-color: #f9f9f9;
        }
        .responsive-iframe {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
        }
        .responsive-iframe iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
        .audio-player {
            width: 100%;
            margin: 10px 0;
        }
        .video-player {
            width: 100%;
            max-width: 600px;
            margin: 10px 0;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Embedding Content</h1>
    
    <div class="lesson-container">
        <h2>Introduction to Embedded Content</h2>
        <p>Embedding content allows you to incorporate external resources like videos, maps, social media posts, and other web pages directly into your HTML documents. This creates a richer, more interactive user experience without requiring visitors to navigate away from your site.</p>
        
        <div class="example">
            <h3>Common Types of Embedded Content:</h3>
            <ul>
                <li><strong>iframes</strong> - Embed other web pages or documents</li>
                <li><strong>Audio</strong> - Embed sound files with playback controls</li>
                <li><strong>Video</strong> - Embed video files with playback controls</li>
                <li><strong>Maps</strong> - Embed interactive maps</li>
                <li><strong>Social Media</strong> - Embed posts, tweets, or feeds</li>
                <li><strong>Data Visualizations</strong> - Embed charts and interactive graphics</li>
            </ul>
        </div>
        
        <h3>Benefits of Embedding Content</h3>
        <ul>
            <li><strong>Enhanced User Experience</strong> - Provides interactive elements without leaving the page</li>
            <li><strong>Reduced Development Time</strong> - Leverages existing services rather than building from scratch</li>
            <li><strong>Improved Engagement</strong> - Keeps users on your site longer with rich media</li>
            <li><strong>Content Variety</strong> - Adds different types of media to complement text</li>
            <li><strong>Up-to-date Content</strong> - Dynamically pulls the latest content from external sources</li>
        </ul>
        
        <div class="note">
            <h3>Important Considerations:</h3>
            <p>When embedding external content, always consider:</p>
            <ul>
                <li><strong>Performance</strong> - Embedded content can slow down your page</li>
                <li><strong>Security</strong> - External content may pose security risks</li>
                <li><strong>Privacy</strong> - Third-party embeds may track your users</li>
                <li><strong>Accessibility</strong> - Ensure embedded content is accessible to all users</li>
                <li><strong>Responsiveness</strong> - Embedded content should work on all devices</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Using iframes</h2>
        <p>The <code>&lt;iframe&gt;</code> (inline frame) element allows you to embed another HTML document within your current HTML document. It creates a window where the content from another source is displayed.</p>
        
        <h3>Basic iframe Syntax</h3>
        <div class="code-block">
            &lt;iframe src="https://example.com" width="600" height="400" title="Example Website"&gt;&lt;/iframe&gt;
        </div>
        
        <h3>Key iframe Attributes</h3>
        <table class="comparison-table">
            <tr>
                <th>Attribute</th>
                <th>Description</th>
                <th>Example</th>
            </tr>
            <tr>
                <td><code>src</code></td>
                <td>URL of the page to embed</td>
                <td><code>src="https://example.com"</code></td>
            </tr>
            <tr>
                <td><code>width</code>, <code>height</code></td>
                <td>Dimensions of the iframe</td>
                <td><code>width="600" height="400"</code></td>
            </tr>
            <tr>
                <td><code>title</code></td>
                <td>Accessible title (for screen readers)</td>
                <td><code>title="Weather Forecast"</code></td>
            </tr>
            <tr>
                <td><code>loading</code></td>
                <td>Lazy loading for performance</td>
                <td><code>loading="lazy"</code></td>
            </tr>
            <tr>
                <td><code>sandbox</code></td>
                <td>Security restrictions</td>
                <td><code>sandbox="allow-scripts"</code></td>
            </tr>
            <tr>
                <td><code>allow</code></td>
                <td>Feature permissions</td>
                <td><code>allow="camera; microphone"</code></td>
            </tr>
            <tr>
                <td><code>srcdoc</code></td>
                <td>Inline HTML content</td>
                <td><code>srcdoc="&lt;p&gt;Hello&lt;/p&gt;"</code></td>
            </tr>
        </table>
        
        <div class="example">
            <h3>Responsive iframe Example:</h3>
            <div class="code-block">
                &lt;!-- Container for responsive behavior --&gt;<br>
                &lt;div style="position: relative; width: 100%; padding-bottom: 56.25%; height: 0; overflow: hidden;"&gt;<br>
                &nbsp;&nbsp;&lt;iframe<br>
                &nbsp;&nbsp;&nbsp;&nbsp;src="https://www.youtube.com/embed/dQw4w9WgXcQ"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;title="YouTube video"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;loading="lazy"<br>
                &nbsp;&nbsp;&nbsp;&nbsp;allowfullscreen<br>
                &nbsp;&nbsp;&gt;&lt;/iframe&gt;<br>
                &lt;/div&gt;
            </div>
        </div>
        
        <h3>Common iframe Use Cases</h3>
        <ul>
            <li><strong>YouTube Videos</strong> - Embed videos from YouTube</li>
            <li><strong>Google Maps</strong> - Embed interactive maps</li>
            <li><strong>Social Media Posts</strong> - Embed tweets, Instagram posts, etc.</li>
            <li><strong>PDF Documents</strong> - Display PDF files inline</li>
            <li><strong>External Forms</strong> - Embed forms from services like Google Forms</li>
            <li><strong>Code Playgrounds</strong> - Embed interactive code editors</li>
        </ul>
        
        <div class="warning">
            <h3>Security Concerns with iframes:</h3>
            <p>iframes can pose security risks if not properly implemented:</p>
            <ul>
                <li><strong>Cross-Site Scripting (XSS)</strong> - Malicious code in embedded content</li>
                <li><strong>Clickjacking</strong> - Tricking users into clicking something different than what they perceive</li>
                <li><strong>Data Theft</strong> - Embedded content accessing sensitive information</li>
            </ul>
            <p>Always use the <code>sandbox</code> attribute to restrict iframe capabilities and only embed content from trusted sources.</p>
        </div>
        
        <h3>The sandbox Attribute</h3>
        <p>The <code>sandbox</code> attribute restricts the capabilities of an iframe to prevent security issues:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Value</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><code>allow-forms</code></td>
                <td>Allows form submission</td>
            </tr>
            <tr>
                <td><code>allow-scripts</code></td>
                <td>Allows JavaScript execution</td>
            </tr>
            <tr>
                <td><code>allow-same-origin</code></td>
                <td>Allows the content to be treated as being from the same origin</td>
            </tr>
            <tr>
                <td><code>allow-popups</code></td>
                <td>Allows popups</td>
            </tr>
            <tr>
                <td><code>allow-top-navigation</code></td>
                <td>Allows navigation of the top-level browsing context</td>
            </tr>
        </table>
        
        <div class="example">
            <h3>Secure iframe Example:</h3>
            <div class="code-block">
                &lt;iframe<br>
                &nbsp;&nbsp;src="https://example.com/widget"<br>
                &nbsp;&nbsp;sandbox="allow-scripts allow-forms"<br>
                &nbsp;&nbsp;width="500"<br>
                &nbsp;&nbsp;height="300"<br>
                &nbsp;&nbsp;title="Example Widget"<br>
                &gt;&lt;/iframe&gt;
            </div>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Embedding Audio</h2>
        <p>HTML5 introduced the <code>&lt;audio&gt;</code> element, which provides native support for audio playback without requiring plugins like Flash.</p>
        
        <h3>Basic Audio Syntax</h3>
        <div class="code-block">
            &lt;audio controls&gt;<br>
            &nbsp;&nbsp;&lt;source src="audio-file.mp3" type="audio/mpeg"&gt;<br>
            &nbsp;&nbsp;&lt;source src="audio-file.ogg" type="audio/ogg"&gt;<br>
            &nbsp;&nbsp;Your browser does not support the audio element.<br>
            &lt;/audio&gt;
        </div>
        
        <div class="media-container">
            <h3>Audio Player Example:</h3>
            <audio controls class="audio-player">
                <source src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
            <p><small>Audio: T-Rex Roar (CC0)</small></p>
        </div>
        
        <h3>Key Audio Attributes</h3>
        <table class="comparison-table">
            <tr>
                <th>Attribute</th>
                <th>Description</th>
                <th>Example</th>
            </tr>
            <tr>
                <td><code>controls</code></td>
                <td>Displays playback controls</td>
                <td><code>&lt;audio controls&gt;</code></td>
            </tr>
            <tr>
                <td><code>autoplay</code></td>
                <td>Automatically starts playback (not recommended)</td>
                <td><code>&lt;audio autoplay&gt;</code></td>
            </tr>
            <tr>
                <td><code>loop</code></td>
                <td>Repeats the audio when finished</td>
                <td><code>&lt;audio loop&gt;</code></td>
            </tr>
            <tr>
                <td><code>muted</code></td>
                <td>Mutes the audio by default</td>
                <td><code>&lt;audio muted&gt;</code></td>
            </tr>
            <tr>
                <td><code>preload</code></td>
                <td>Specifies if/how the audio should be loaded</td>
                <td><code>&lt;audio preload="metadata"&gt;</code></td>
            </tr>
        </table>
        
        <h3>Audio File Formats</h3>
        <p>Different browsers support different audio formats. To ensure cross-browser compatibility, provide multiple sources:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Format</th>
                <th>MIME Type</th>
                <th>Browser Support</th>
            </tr>
            <tr>
                <td>MP3</td>
                <td><code>audio/mpeg</code></td>
                <td>All modern browsers</td>
            </tr>
            <tr>
                <td>OGG</td>
                <td><code>audio/ogg</code></td>
                <td>Firefox, Chrome, Opera</td>
            </tr>
            <tr>
                <td>WAV</td>
                <td><code>audio/wav</code></td>
                <td>Firefox, Chrome, Safari, Edge</td>
            </tr>
            <tr>
                <td>AAC</td>
                <td><code>audio/aac</code></td>
                <td>Safari, Chrome, Edge</td>
            </tr>
        </table>
        
        <div class="note">
            <h3>Accessibility Considerations:</h3>
            <ul>
                <li>Always include the <code>controls</code> attribute to ensure users can control playback</li>
                <li>Avoid <code>autoplay</code> as it can be disruptive and confusing</li>
                <li>Provide transcripts for audio content for users who are deaf or hard of hearing</li>
                <li>Include descriptive text near the audio player explaining what the audio contains</li>
            </ul>
        </div>
        
        <h3>JavaScript Audio API</h3>
        <p>You can also control audio playback programmatically using JavaScript:</p>
        
        <div class="code-block">
            &lt;audio id="myAudio"&gt;<br>
            &nbsp;&nbsp;&lt;source src="audio-file.mp3" type="audio/mpeg"&gt;<br>
            &lt;/audio&gt;<br><br>
            
            &lt;button onclick="playAudio()"&gt;Play&lt;/button&gt;<br>
            &lt;button onclick="pauseAudio()"&gt;Pause&lt;/button&gt;<br><br>
            
            &lt;script&gt;<br>
            &nbsp;&nbsp;var audio = document.getElementById("myAudio");<br><br>
            
            &nbsp;&nbsp;function playAudio() {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;audio.play();<br>
            &nbsp;&nbsp;}<br><br>
            
            &nbsp;&nbsp;function pauseAudio() {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;audio.pause();<br>
            &nbsp;&nbsp;}<br>
            &lt;/script&gt;
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Embedding Video</h2>
        <p>The HTML5 <code>&lt;video&gt;</code> element allows you to embed videos directly in your web pages without requiring plugins.</p>
        
        <h3>Basic Video Syntax</h3>
        <div class="code-block">
            &lt;video width="640" height="360" controls&gt;<br>
            &nbsp;&nbsp;&lt;source src="video.mp4" type="video/mp4"&gt;<br>
            &nbsp;&nbsp;&lt;source src="video.webm" type="video/webm"&gt;<br>
            &nbsp;&nbsp;Your browser does not support the video tag.<br>
            &lt;/video&gt;
        </div>
        
        <div class="media-container">
            <h3>Video Player Example:</h3>
            <video controls class="video-player">
                <source src="https://interactive-examples.mdn.mozilla.net/media/cc0-videos/flower.webm" type="video/webm">
                <source src="https://interactive-examples.mdn.mozilla.net/media/cc0-videos/flower.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <p><small>Video: Flower (CC0)</small></p>
        </div>
        
        <h3>Key Video Attributes</h3>
        <table class="comparison-table">
            <tr>
                <th>Attribute</th>
                <th>Description</th>
                <th>Example</th>
            </tr>
            <tr>
                <td><code>controls</code></td>
                <td>Displays playback controls</td>
                <td><code>&lt;video controls&gt;</code></td>
            </tr>
            <tr>
                <td><code>width</code>, <code>height</code></td>
                <td>Dimensions of the video player</td>
                <td><code>&lt;video width="640" height="360"&gt;</code></td>
            </tr>
            <tr>
                <td><code>autoplay</code></td>
                <td>Automatically starts playback (use with caution)</td>
                <td><code>&lt;video autoplay&gt;</code></td>
            </tr>
            <tr>
                <td><code>loop</code></td>
                <td>Repeats the video when finished</td>
                <td><code>&lt;video loop&gt;</code></td>
            </tr>
            <tr>
                <td><code>muted</code></td>
                <td>Mutes the video by default</td>
                <td><code>&lt;video muted&gt;</code></td>
            </tr>
            <tr>
                <td><code>poster</code></td>
                <td>Image to display before the video plays</td>
                <td><code>&lt;video poster="thumbnail.jpg"&gt;</code></td>
            </tr>
            <tr>
                <td><code>preload</code></td>
                <td>Specifies if/how the video should be loaded</td>
                <td><code>&lt;video preload="metadata"&gt;</code></td>
            </tr>
            <tr>
                <td><code>playsinline</code></td>
                <td>Plays inline on iOS (instead of fullscreen)</td>
                <td><code>&lt;video playsinline&gt;</code></td>
            </tr>
        </table>
        
        <h3>Video File Formats</h3>
        <p>Different browsers support different video formats. To ensure cross-browser compatibility, provide multiple sources:</p>
        
        <table class="comparison-table">
            <tr>
                <th>Format</th>
                <th>MIME Type</th>
                <th>Browser Support</th>
            </tr>
            <tr>
                <td>MP4 (H.264)</td>
                <td><code>video/mp4</code></td>
                <td>All modern browsers</td>
            </tr>
            <tr>
                <td>WebM</td>
                <td><code>video/webm</code></td>
                <td>Firefox, Chrome, Opera, Edge</td>
            </tr>
            <tr>
                <td>Ogg (Theora)</td>
                <td><code>video/ogg</code></td>
                <td>Firefox, Chrome, Opera</td>
            </tr>
        </table>
        
        <div class="note">
            <h3>Video Accessibility:</h3>
            <ul>
                <li>Include captions using the <code>&lt;track&gt;</code> element with WebVTT files</li>
                <li>Provide transcripts for video content</li>
                <li>Include descriptive text near the video explaining what it contains</li>
                <li>Ensure controls are accessible via keyboard</li>
            </ul>
        </div>
        
        <h3>Adding Captions with the track Element</h3>
        <div class="code-block">
            &lt;video width="640" height="360" controls&gt;<br>
            &nbsp;&nbsp;&lt;source src="video.mp4" type="video/mp4"&gt;<br>
            &nbsp;&nbsp;&lt;source src="video.webm" type="video/webm"&gt;<br>
            &nbsp;&nbsp;&lt;track src="captions.vtt" kind="subtitles" srclang="en" label="English" default&gt;<br>
            &nbsp;&nbsp;Your browser does not support the video tag.<br>
            &lt;/video&gt;
        </div>
        
        <h3>Responsive Video</h3>
        <p>Make videos responsive to different screen sizes:</p>
        
        <div class="code-block">
            &lt;!-- CSS --&gt;<br>
            &lt;style&gt;<br>
            &nbsp;&nbsp;.video-container {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;position: relative;<br>
            &nbsp;&nbsp;&nbsp;&nbsp;width: 100%;<br>
            &nbsp;&nbsp;&nbsp;&nbsp;padding-bottom: 56.25%; /* 16:9 Aspect Ratio */<br>
            &nbsp;&nbsp;&nbsp;&nbsp;height: 0;<br>
            &nbsp;&nbsp;&nbsp;&nbsp;overflow: hidden;<br>
            &nbsp;&nbsp;}<br><br>
            
            &nbsp;&nbsp;.video-container video {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;position: absolute;<br>
            &nbsp;&nbsp;&nbsp;&nbsp;top: 0;<br>
            &nbsp;&nbsp;&nbsp;&nbsp;left: 0;<br>
            &nbsp;&nbsp;&nbsp;&nbsp;width: 100%;<br>
            &nbsp;&nbsp;&nbsp;&nbsp;height: 100%;<br>
            &nbsp;&nbsp;}<br>
            &lt;/style&gt;<br><br>
            
            &lt;!-- HTML --&gt;<br>
            &lt;div class="video-container"&gt;<br>
            &nbsp;&nbsp;&lt;video controls&gt;<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&lt;source src="video.mp4" type="video/mp4"&gt;<br>
            &nbsp;&nbsp;&lt;/video&gt;<br>
            &lt;/div&gt;
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Embedding Third-Party Content</h2>
        <p>Many websites and services provide embed codes that you can use to include their content on your website.</p>
        
        <h3>YouTube Videos</h3>
        <p>YouTube provides an easy way to embed videos on your website:</p>
        
        <div class="code-block">
            &lt;div class="responsive-iframe"&gt;<br>
            &nbsp;&nbsp;&lt;iframe<br>
            &nbsp;&nbsp;&nbsp;&nbsp;src="https://www.youtube.com/embed/dQw4w9WgXcQ"<br>
            &nbsp;&nbsp;&nbsp;&nbsp;title="YouTube video"<br>
            &nbsp;&nbsp;&nbsp;&nbsp;loading="lazy"<br>
            &nbsp;&nbsp;&nbsp;&nbsp;allowfullscreen<br>
            &nbsp;&nbsp;&gt;&lt;/iframe&gt;<br>
            &lt;/div&gt;
        </div>
        
        <div class="media-container">
            <h3>YouTube Embed Example:</h3>
            <div class="responsive-iframe">
                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video" loading="lazy" allowfullscreen></iframe>
            </div>
        </div>
        
        <h3>Google Maps</h3>
        <p>Embed Google Maps to show locations:</p>
        
        <div class="code-block">
            &lt;div class="responsive-iframe"&gt;<br>
            &nbsp;&nbsp;&lt;iframe<br>
            &nbsp;&nbsp;&nbsp;&nbsp;src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215256613498!2d-73.98784532342224!3d40.75798833440443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes%20Square!5e0!3m2!1sen!2sus!4v1710320000000!5m2!1sen!2sus"<br>
            &nbsp;&nbsp;&nbsp;&nbsp;title="Google Maps - Times Square"<br>
            &nbsp;&nbsp;&nbsp;&nbsp;loading="lazy"<br>
            &nbsp;&nbsp;&nbsp;&nbsp;allowfullscreen<br>
            &nbsp;&nbsp;&gt;&lt;/iframe&gt;<br>
            &lt;/div&gt;
        </div>
        
        <h3>Twitter Posts</h3>
        <p>Embed tweets from Twitter:</p>
        
        <div class="code-block">
            &lt;blockquote class="twitter-tweet"&gt;<br>
            &nbsp;&nbsp;&lt;p lang="en" dir="ltr"&gt;Tweet content here&lt;/p&gt;<br>
            &nbsp;&nbsp;&lt;a href="https://twitter.com/username/status/tweetid"&gt;Link to tweet&lt;/a&gt;<br>
            &lt;/blockquote&gt;<br>
            &lt;script async src="https://platform.twitter.com/widgets.js" charset="utf-8"&gt;&lt;/script&gt;
        </div>
        
        <h3>Instagram Posts</h3>
        <p>Embed Instagram posts:</p>
        
        <div class="code-block">
            &lt;blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/postid/"&gt;<br>
            &nbsp;&nbsp;&lt;a href="https://www.instagram.com/p/postid/"&gt;View on Instagram&lt;/a&gt;<br>
            &lt;/blockquote&gt;<br>
            &lt;script async src="//www.instagram.com/embed.js"&gt;&lt;/script&gt;
        </div>
        
        <div class="warning">
            <h3>Performance Considerations:</h3>
            <p>Third-party embeds can significantly impact page performance:</p>
            <ul>
                <li>Use <code>loading="lazy"</code> to defer loading until the embed is near the viewport</li>
                <li>Consider loading third-party scripts only when needed (e.g., on user interaction)</li>
                <li>Limit the number of embeds on a single page</li>
                <li>Test the impact on page load time and optimize accordingly</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Object and Embed Elements</h2>
        <p>The <code>&lt;object&gt;</code> and <code>&lt;embed&gt;</code> elements are older ways to include external content in HTML. While they're less commonly used today, they're still supported and useful in certain scenarios.</p>
        
        <h3>The object Element</h3>
        <p>The <code>&lt;object&gt;</code> element can be used to embed various types of external content, including PDFs, Flash content, and other media:</p>
        
        <div class="code-block">
            &lt;object<br>
            &nbsp;&nbsp;data="document.pdf"<br>
            &nbsp;&nbsp;type="application/pdf"<br>
            &nbsp;&nbsp;width="600"<br>
            &nbsp;&nbsp;height="800"&gt;<br>
            &nbsp;&nbsp;&lt;p&gt;Your browser does not support PDFs. &lt;a href="document.pdf"&gt;Download the PDF&lt;/a&gt;.&lt;/p&gt;<br>
            &lt;/object&gt;
        </div>
        
        <h3>The embed Element</h3>
        <p>The <code>&lt;embed&gt;</code> element is a simpler, self-closing tag for embedding external content:</p>
        
        <div class="code-block">
            &lt;embed<br>
            &nbsp;&nbsp;src="document.pdf"<br>
            &nbsp;&nbsp;type="application/pdf"<br>
            &nbsp;&nbsp;width="600"<br>
            &nbsp;&nbsp;height="800"&gt;
        </div>
        
        <div class="note">
            <h3>object vs. embed vs. iframe:</h3>
            <ul>
                <li><strong>object</strong> - Most versatile, supports fallback content, better for accessibility</li>
                <li><strong>embed</strong> - Simpler syntax, no fallback content, less accessible</li>
                <li><strong>iframe</strong> - Best for embedding other web pages, modern approach for most content</li>
            </ul>
            <p>For most modern web development, <code>&lt;iframe&gt;</code> is preferred for web content, while <code>&lt;audio&gt;</code> and <code>&lt;video&gt;</code> are used for media.</p>
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Create an Embedded Media Gallery</h2>
        <p>Practice embedding different types of media by editing the code below:</p>
        
        <div>
            <textarea id="htmlEditor" rows="20" style="width: 100%; font-family: monospace; padding: 10px;"><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Gallery</title>
    <style>
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
        
        .gallery {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            margin: 20px 0;
        }
        
        .media-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            background-color: #f9f9f9;
        }
        
        .responsive-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
        }
        
        .responsive-container iframe,
        .responsive-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
        
        audio {
            width: 100%;
            margin: 10px 0;
        }
        
        @media (min-width: 768px) {
            .gallery {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>My Media Gallery</h1>
    
    <div class="gallery">
        <!-- Add your embedded media items here -->
        <!-- Include at least: -->
        <!-- 1. A YouTube video -->
        <!-- 2. An audio player -->
        <!-- 3. A local video player -->
        <!-- 4. A Google Map -->
        
    </div>
</body>
</html></textarea>
            <button onclick="updatePreview()">Update Preview</button>
        </div>
        
        <h3>Preview:</h3>
        <iframe id="previewFrame" style="width: 100%; height: 600px; border: 1px solid #ddd; border-radius: 4px;"></iframe>
        
        <div class="note" style="margin-top: 20px;">
            <h3>Hint:</h3>
            <p>For each media item, create a <code>&lt;div class="media-item"&gt;</code> with:</p>
            <ul>
                <li>A heading describing the content</li>
                <li>The appropriate embed code (iframe, video, or audio element)</li>
                <li>For videos and iframes, wrap them in a <code>&lt;div class="responsive-container"&gt;</code></li>
                <li>Add a caption or description below each item</li>
            </ul>
        </div>
        
        <button id="showSolution" style="margin-top: 15px;">Show Solution</button>
        <div id="solution" style="display: none; margin-top: 15px; padding: 15px; background-color: #f0f0f0; border-radius: 5px;">
            <h3>Solution:</h3>
            <pre style="background-color: #2c3e50; color: #ecf0f1; padding: 15px; border-radius: 5px; overflow-x: auto;">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;Media Gallery&lt;/title&gt;
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
        
        .gallery {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            margin: 20px 0;
        }
        
        .media-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            background-color: #f9f9f9;
        }
        
        .responsive-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
        }
        
        .responsive-container iframe,
        .responsive-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
        
        audio {
            width: 100%;
            margin: 10px 0;
        }
        
        .caption {
            font-style: italic;
            color: #666;
            margin-top: 10px;
        }
        
        @media (min-width: 768px) {
            .gallery {
                grid-template-columns: 1fr 1fr;
            }
        }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;My Media Gallery&lt;/h1&gt;
    
    &lt;div class="gallery"&gt;
        &lt;!-- YouTube Video --&gt;
        &lt;div class="media-item"&gt;
            &lt;h2&gt;YouTube Video&lt;/h2&gt;
            &lt;div class="responsive-container"&gt;
                &lt;iframe 
                    src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                    title="YouTube video"
                    loading="lazy"
                    allowfullscreen&gt;
                &lt;/iframe&gt;
            &lt;/div&gt;
            &lt;p class="caption"&gt;Rick Astley - Never Gonna Give You Up (Official Music Video)&lt;/p&gt;
        &lt;/div&gt;
        
        &lt;!-- Audio Player --&gt;
        &lt;div class="media-item"&gt;
            &lt;h2&gt;Audio Sample&lt;/h2&gt;
            &lt;audio controls&gt;
                &lt;source src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3" type="audio/mpeg"&gt;
                Your browser does not support the audio element.
            &lt;/audio&gt;
            &lt;p class="caption"&gt;T-Rex Roar Sound Effect (CC0)&lt;/p&gt;
        &lt;/div&gt;
        
        &lt;!-- Video Player --&gt;
        &lt;div class="media-item"&gt;
            &lt;h2&gt;Video Sample&lt;/h2&gt;
            &lt;div class="responsive-container"&gt;
                &lt;video controls&gt;
                    &lt;source src="https://interactive-examples.mdn.mozilla.net/media/cc0-videos/flower.webm" type="video/webm"&gt;
                    &lt;source src="https://interactive-examples.mdn.mozilla.net/media/cc0-videos/flower.mp4" type="video/mp4"&gt;
                    Your browser does not support the video tag.
                &lt;/video&gt;
            &lt;/div&gt;
            &lt;p class="caption"&gt;Flower blooming time-lapse (CC0)&lt;/p&gt;
        &lt;/div&gt;
        
        &lt;!-- Google Map --&gt;
        &lt;div class="media-item"&gt;
            &lt;h2&gt;Google Map&lt;/h2&gt;
            &lt;div class="responsive-container"&gt;
                &lt;iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215256613498!2d-73.98784532342224!3d40.75798833440443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes%20Square!5e0!3m2!1sen!2sus!4v1710320000000!5m2!1sen!2sus"
                    title="Google Maps - Times Square"
                    loading="lazy"
                    allowfullscreen&gt;
                &lt;/iframe&gt;
            &lt;/div&gt;
            &lt;p class="caption"&gt;Times Square, New York City&lt;/p&gt;
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
            1. Which HTML element is used to embed another webpage within the current page?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> &lt;embed&gt;</label>
            <label><input type="radio" name="q1" value="b"> &lt;iframe&gt;</label>
            <label><input type="radio" name="q1" value="c"> &lt;frame&gt;</label>
            <label><input type="radio" name="q1" value="d"> &lt;web&gt;</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which attribute of the &lt;iframe&gt; element helps improve security by restricting its capabilities?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> security</label>
            <label><input type="radio" name="q2" value="b"> restrict</label>
            <label><input type="radio" name="q2" value="c"> sandbox</label>
            <label><input type="radio" name="q2" value="d"> safeguard</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which attribute should be included with the &lt;audio&gt; and &lt;video&gt; elements to ensure users can control playback?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> player</label>
            <label><input type="radio" name="q3" value="b"> controls</label>
            <label><input type="radio" name="q3" value="c"> playback</label>
            <label><input type="radio" name="q3" value="d"> interface</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. Which element is used to provide captions or subtitles for video content?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> &lt;caption&gt;</label>
            <label><input type="radio" name="q4" value="b"> &lt;subtitle&gt;</label>
            <label><input type="radio" name="q4" value="c"> &lt;text&gt;</label>
            <label><input type="radio" name="q4" value="d"> &lt;track&gt;</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. What is the recommended approach for making embedded videos responsive?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> Use percentage-based width and fixed height</label>
            <label><input type="radio" name="q5" value="b"> Use the responsive attribute on the video element</label>
            <label><input type="radio" name="q5" value="c"> Use a container with padding-bottom based on aspect ratio</label>
            <label><input type="radio" name="q5" value="d"> Use the fluid attribute on the video element</label>
        </div>
        <div id="feedback5" class="feedback"></div>
        
        <button onclick="checkAnswers()">Submit Answers</button>
        
        <script>
            function checkAnswers() {
                const answers = {
                    q1: 'b',
                    q2: 'c',
                    q3: 'b',
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
            <button onclick="window.location.href='04_character_entities.html'">Previous Lesson: Character Entities</button>
        </div>
        <div>
            <button onclick="window.location.href='06_advanced_forms.html'">Next Lesson: Advanced Forms</button>
        </div>
    </div>
</body>
</html>
