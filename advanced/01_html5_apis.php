<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML5 APIs and Features</title>
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
        
        /* API demo styles */
        .demo-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
            background-color: #f8f9fa;
        }
        .demo-result {
            min-height: 50px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-top: 10px;
        }
        #map {
            height: 300px;
            width: 100%;
            border-radius: 4px;
        }
        #storage-demo input, #storage-demo button {
            margin: 5px 0;
        }
        .progress-container {
            width: 100%;
            background-color: #f1f1f1;
            border-radius: 4px;
            margin: 10px 0;
        }
        .progress-bar {
            width: 0%;
            height: 30px;
            background-color: #4CAF50;
            text-align: center;
            line-height: 30px;
            color: white;
            border-radius: 4px;
        }
        #drop-zone {
            border: 2px dashed #ccc;
            border-radius: 5px;
            padding: 25px;
            text-align: center;
            color: #666;
            cursor: pointer;
            margin: 10px 0;
        }
        #drop-zone.highlight {
            border-color: #3498db;
            background-color: #e8f4fc;
        }
        #notification-demo {
            margin: 10px 0;
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>HTML5 APIs and Features</h1>
    
    <div class="lesson-container">
        <h2>Introduction to HTML5 APIs</h2>
        <p>HTML5 introduced a rich set of JavaScript APIs that enable web developers to create more interactive, feature-rich applications. These APIs provide access to device hardware, local storage, real-time communication, and much more, allowing web applications to rival native applications in functionality.</p>
        
        <div class="example">
            <h3>Key HTML5 APIs We'll Explore:</h3>
            <ul>
                <li><strong>Geolocation API</strong> - Access the user's geographical location</li>
                <li><strong>Web Storage API</strong> - Store data locally in the user's browser</li>
                <li><strong>Drag and Drop API</strong> - Enable drag-and-drop functionality</li>
                <li><strong>History API</strong> - Manipulate the browser history</li>
                <li><strong>Notifications API</strong> - Display system notifications</li>
                <li><strong>Web Workers API</strong> - Run scripts in background threads</li>
                <li><strong>Fetch API</strong> - Make network requests to retrieve resources</li>
            </ul>
        </div>
        
        <h3>Why HTML5 APIs Matter</h3>
        <p>HTML5 APIs have revolutionized web development by enabling capabilities that were previously only possible with native applications:</p>
        <ul>
            <li><strong>Enhanced User Experience</strong> - Create more interactive and responsive web applications</li>
            <li><strong>Offline Functionality</strong> - Build applications that work without an internet connection</li>
            <li><strong>Device Integration</strong> - Access device features like camera, microphone, and location</li>
            <li><strong>Performance Improvements</strong> - Utilize multi-threading and efficient data handling</li>
            <li><strong>Cross-Platform Compatibility</strong> - Develop once and run on multiple platforms</li>
        </ul>
        
        <div class="note">
            <h3>Browser Compatibility:</h3>
            <p>While most modern browsers support HTML5 APIs, there can be differences in implementation and availability. Always check browser compatibility and provide fallbacks when necessary. Resources like <a href="https://caniuse.com/" target="_blank">Can I Use</a> can help you determine which features are supported across different browsers.</p>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Geolocation API</h2>
        <p>The Geolocation API allows web applications to access the user's geographical location. This is useful for location-based services, mapping applications, and personalized content delivery.</p>
        
        <h3>How It Works</h3>
        <p>The Geolocation API uses various methods to determine the user's location:</p>
        <ul>
            <li><strong>GPS</strong> - Most accurate, but only available on devices with GPS hardware</li>
            <li><strong>IP Address</strong> - Less accurate, but widely available</li>
            <li><strong>Wi-Fi Positioning</strong> - Uses nearby Wi-Fi access points to triangulate location</li>
            <li><strong>Cell Tower Triangulation</strong> - Uses cellular network information</li>
        </ul>
        
        <h3>Basic Usage</h3>
        <div class="code-block">
            // Check if geolocation is supported
            if (navigator.geolocation) {
                // Get current position
                navigator.geolocation.getCurrentPosition(
                    // Success callback
                    function(position) {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;
                        console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);
                    },
                    // Error callback
                    function(error) {
                        console.error("Error getting location:", error.message);
                    },
                    // Options
                    {
                        enableHighAccuracy: true, // Use GPS if available
                        timeout: 5000,           // Time to wait for a position
                        maximumAge: 0            // Don't use cached position
                    }
                );
            } else {
                console.error("Geolocation is not supported by this browser");
            }
        </div>
        
        <h3>Watching Position</h3>
        <p>You can also continuously monitor the user's position as they move:</p>
        
        <div class="code-block">
            // Start watching position
            const watchId = navigator.geolocation.watchPosition(
                function(position) {
                    // Handle updated position
                    console.log(`Updated position: ${position.coords.latitude}, ${position.coords.longitude}`);
                },
                function(error) {
                    console.error("Error watching position:", error.message);
                }
            );
            
            // Stop watching when no longer needed
            // navigator.geolocation.clearWatch(watchId);
        </div>
        
        <div class="demo-container">
            <h3>Geolocation Demo:</h3>
            <p>Click the button below to get your current location and display it on a map:</p>
            <button id="get-location">Get My Location</button>
            <div id="location-result" class="demo-result"></div>
            <div id="map"></div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const getLocationButton = document.getElementById('get-location');
                    const locationResult = document.getElementById('location-result');
                    const mapDiv = document.getElementById('map');
                    
                    // Initialize map with default view
                    let map;
                    let marker;
                    
                    function initMap(lat = 40.7128, lng = -74.0060) {
                        // Check if the Google Maps API is loaded
                        if (typeof google === 'undefined' || typeof google.maps === 'undefined') {
                            mapDiv.innerHTML = 'Google Maps API not loaded. This is expected in the sandbox environment.';
                            return;
                        }
                        
                        map = new google.maps.Map(mapDiv, {
                            center: { lat, lng },
                            zoom: 12
                        });
                        
                        marker = new google.maps.Marker({
                            position: { lat, lng },
                            map: map,
                            title: 'Your Location'
                        });
                    }
                    
                    // Try to initialize map (will only work if Google Maps API is available)
                    try {
                        initMap();
                    } catch (e) {
                        mapDiv.innerHTML = 'Map could not be loaded. This is expected in the sandbox environment.';
                    }
                    
                    getLocationButton.addEventListener('click', function() {
                        locationResult.textContent = 'Requesting location...';
                        
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(
                                function(position) {
                                    const lat = position.coords.latitude;
                                    const lng = position.coords.longitude;
                                    const accuracy = position.coords.accuracy;
                                    
                                    locationResult.innerHTML = `
                                        <strong>Latitude:</strong> ${lat.toFixed(6)}<br>
                                        <strong>Longitude:</strong> ${lng.toFixed(6)}<br>
                                        <strong>Accuracy:</strong> ${accuracy.toFixed(2)} meters
                                    `;
                                    
                                    // Update map if available
                                    try {
                                        if (map && marker) {
                                            const newPosition = { lat, lng };
                                            map.setCenter(newPosition);
                                            marker.setPosition(newPosition);
                                        }
                                    } catch (e) {
                                        console.error("Error updating map:", e);
                                    }
                                },
                                function(error) {
                                    let errorMessage;
                                    switch(error.code) {
                                        case error.PERMISSION_DENIED:
                                            errorMessage = "User denied the request for geolocation.";
                                            break;
                                        case error.POSITION_UNAVAILABLE:
                                            errorMessage = "Location information is unavailable.";
                                            break;
                                        case error.TIMEOUT:
                                            errorMessage = "The request to get user location timed out.";
                                            break;
                                        case error.UNKNOWN_ERROR:
                                            errorMessage = "An unknown error occurred.";
                                            break;
                                    }
                                    locationResult.textContent = `Error: ${errorMessage}`;
                                }
                            );
                        } else {
                            locationResult.textContent = "Geolocation is not supported by this browser.";
                        }
                    });
                });
            </script>
        </div>
        
        <div class="note">
            <h3>Privacy Considerations:</h3>
            <p>The Geolocation API requires user permission. Browsers will display a prompt asking the user to allow or block location access. Always request location only when necessary and explain to users why you need their location.</p>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Web Storage API</h2>
        <p>The Web Storage API provides mechanisms for storing data in the browser. It offers two storage objects:</p>
        <ul>
            <li><strong>localStorage</strong> - Stores data with no expiration date</li>
            <li><strong>sessionStorage</strong> - Stores data for one session (data is lost when the browser tab is closed)</li>
        </ul>
        
        <h3>Key Features</h3>
        <ul>
            <li>Data is stored as key-value pairs (both must be strings)</li>
            <li>Storage capacity is typically around 5-10MB (varies by browser)</li>
            <li>Data is stored locally on the user's device, not sent to the server</li>
            <li>Data persists even after the browser is closed (localStorage only)</li>
            <li>Storage is domain-specific (each website has its own storage)</li>
        </ul>
        
        <h3>Basic Usage</h3>
        <div class="code-block">
            // localStorage
            
            // Store data
            localStorage.setItem('username', 'JohnDoe');
            localStorage.setItem('preferences', JSON.stringify({ theme: 'dark', fontSize: 'large' }));
            
            // Retrieve data
            const username = localStorage.getItem('username');
            const preferences = JSON.parse(localStorage.getItem('preferences'));
            
            // Remove data
            localStorage.removeItem('username');
            
            // Clear all data
            localStorage.clear();
            
            // sessionStorage (same methods, but data is temporary)
            sessionStorage.setItem('tempData', 'This will be gone when the tab closes');
        </div>
        
        <div class="demo-container">
            <h3>Web Storage Demo:</h3>
            <div id="storage-demo">
                <div class="form-group">
                    <label for="storage-key">Key:</label>
                    <input type="text" id="storage-key" placeholder="Enter key">
                </div>
                <div class="form-group">
                    <label for="storage-value">Value:</label>
                    <input type="text" id="storage-value" placeholder="Enter value">
                </div>
                <div class="form-group">
                    <button id="save-local">Save to localStorage</button>
                    <button id="save-session">Save to sessionStorage</button>
                </div>
                <div class="form-group">
                    <button id="get-local">Get from localStorage</button>
                    <button id="get-session">Get from sessionStorage</button>
                </div>
                <div class="form-group">
                    <button id="clear-local">Clear localStorage</button>
                    <button id="clear-session">Clear sessionStorage</button>
                </div>
                <div id="storage-result" class="demo-result"></div>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const keyInput = document.getElementById('storage-key');
                    const valueInput = document.getElementById('storage-value');
                    const saveLocalBtn = document.getElementById('save-local');
                    const saveSessionBtn = document.getElementById('save-session');
                    const getLocalBtn = document.getElementById('get-local');
                    const getSessionBtn = document.getElementById('get-session');
                    const clearLocalBtn = document.getElementById('clear-local');
                    const clearSessionBtn = document.getElementById('clear-session');
                    const resultDiv = document.getElementById('storage-result');
                    
                    // Save to localStorage
                    saveLocalBtn.addEventListener('click', function() {
                        const key = keyInput.value.trim();
                        const value = valueInput.value.trim();
                        
                        if (key && value) {
                            try {
                                localStorage.setItem(key, value);
                                resultDiv.innerHTML = `<span style="color: green;">Saved to localStorage: "${key}" = "${value}"</span>`;
                            } catch (e) {
                                resultDiv.innerHTML = `<span style="color: red;">Error: ${e.message}</span>`;
                            }
                        } else {
                            resultDiv.innerHTML = '<span style="color: red;">Please enter both key and value</span>';
                        }
                    });
                    
                    // Save to sessionStorage
                    saveSessionBtn.addEventListener('click', function() {
                        const key = keyInput.value.trim();
                        const value = valueInput.value.trim();
                        
                        if (key && value) {
                            try {
                                sessionStorage.setItem(key, value);
                                resultDiv.innerHTML = `<span style="color: green;">Saved to sessionStorage: "${key}" = "${value}"</span>`;
                            } catch (e) {
                                resultDiv.innerHTML = `<span style="color: red;">Error: ${e.message}</span>`;
                            }
                        } else {
                            resultDiv.innerHTML = '<span style="color: red;">Please enter both key and value</span>';
                        }
                    });
                    
                    // Get from localStorage
                    getLocalBtn.addEventListener('click', function() {
                        const key = keyInput.value.trim();
                        
                        if (key) {
                            const value = localStorage.getItem(key);
                            if (value !== null) {
                                resultDiv.innerHTML = `<span style="color: blue;">From localStorage: "${key}" = "${value}"</span>`;
                            } else {
                                resultDiv.innerHTML = `<span style="color: orange;">Key "${key}" not found in localStorage</span>`;
                            }
                        } else {
                            resultDiv.innerHTML = '<span style="color: red;">Please enter a key to retrieve</span>';
                        }
                    });
                    
                    // Get from sessionStorage
                    getSessionBtn.addEventListener('click', function() {
                        const key = keyInput.value.trim();
                        
                        if (key) {
                            const value = sessionStorage.getItem(key);
                            if (value !== null) {
                                resultDiv.innerHTML = `<span style="color: blue;">From sessionStorage: "${key}" = "${value}"</span>`;
                            } else {
                                resultDiv.innerHTML = `<span style="color: orange;">Key "${key}" not found in sessionStorage</span>`;
                            }
                        } else {
                            resultDiv.innerHTML = '<span style="color: red;">Please enter a key to retrieve</span>';
                        }
                    });
                    
                    // Clear localStorage
                    clearLocalBtn.addEventListener('click', function() {
                        localStorage.clear();
                        resultDiv.innerHTML = '<span style="color: green;">localStorage cleared</span>';
                    });
                    
                    // Clear sessionStorage
                    clearSessionBtn.addEventListener('click', function() {
                        sessionStorage.clear();
                        resultDiv.innerHTML = '<span style="color: green;">sessionStorage cleared</span>';
                    });
                });
            </script>
        </div>
        
        <h3>Storage Events</h3>
        <p>You can listen for changes to localStorage (but not sessionStorage) across browser tabs:</p>
        
        <div class="code-block">
            // Listen for storage changes in other tabs/windows
            window.addEventListener('storage', function(event) {
                console.log('Storage changed in another tab/window');
                console.log('Key:', event.key);
                console.log('Old value:', event.oldValue);
                console.log('New value:', event.newValue);
                console.log('Storage area:', event.storageArea);
            });
        </div>
        
        <div class="warning">
            <h3>Limitations and Considerations:</h3>
            <ul>
                <li><strong>Security</strong> - Web Storage is not secure for sensitive data (passwords, tokens, etc.)</li>
                <li><strong>Size Limits</strong> - Typically limited to 5-10MB per domain</li>
                <li><strong>Synchronous API</strong> - Operations block the main thread</li>
                <li><strong>String Only</strong> - All values are stored as strings (use JSON for objects)</li>
                <li><strong>No Expiration</strong> - localStorage has no built-in expiration mechanism</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Drag and Drop API</h2>
        <p>The HTML5 Drag and Drop API allows you to make elements draggable and define drop targets, enabling intuitive user interactions like file uploads, item reordering, and drag-and-drop interfaces.</p>
        
        <h3>Key Concepts</h3>
        <ul>
            <li><strong>Draggable Elements</strong> - Elements that can be dragged</li>
            <li><strong>Drop Targets</strong> - Elements that can receive dragged items</li>
            <li><strong>Drag Events</strong> - Events that fire during the drag-and-drop process</li>
            <li><strong>DataTransfer Object</strong> - Contains data being dragged and its type</li>
        </ul>
        
        <h3>Making Elements Draggable</h3>
        <p>To make an element draggable, add the <code>draggable</code> attribute and handle the <code>dragstart</code> event:</p>
        
        <div class="code-block">
            &lt;div id="draggable" draggable="true"&gt;Drag me!&lt;/div&gt;
            
            &lt;script&gt;
                const element = document.getElementById('draggable');
                
                element.addEventListener('dragstart', function(event) {
                    // Store data being dragged
                    event.dataTransfer.setData('text/plain', event.target.id);
                    
                    // Change appearance during drag
                    event.target.style.opacity = '0.5';
                });
                
                element.addEventListener('dragend', function(event) {
                    // Reset appearance after drag
                    event.target.style.opacity = '1';
                });
            &lt;/script&gt;
        </div>
        
        <h3>Creating Drop Targets</h3>
        <p>To create a drop target, handle the <code>dragover</code> and <code>drop</code> events:</p>
        
        <div class="code-block">
            &lt;div id="drop-target" class="drop-zone"&gt;Drop here&lt;/div&gt;
            
            &lt;script&gt;
                const dropTarget = document.getElementById('drop-target');
                
                // Prevent default to allow drop
                dropTarget.addEventListener('dragover', function(event) {
                    event.preventDefault();
                });
                
                // Handle enter/leave for visual feedback
                dropTarget.addEventListener('dragenter', function(event) {
                    this.classList.add('highlight');
                });
                
                dropTarget.addEventListener('dragleave', function(event) {
                    this.classList.remove('highlight');
                });
                
                // Handle the drop
                dropTarget.addEventListener('drop', function(event) {
                    event.preventDefault();
                    this.classList.remove('highlight');
                    
                    // Get the dragged data
                    const id = event.dataTransfer.getData('text/plain');
                    const draggedElement = document.getElementById(id);
                    
                    // Append the element to the drop target
                    this.appendChild(draggedElement);
                });
            &lt;/script&gt;
        </div>
        
        <div class="demo-container">
            <h3>Drag and Drop Demo:</h3>
            <style>
                .draggable {
                    width: 100px;
                    height: 100px;
                    background-color: #3498db;
                    color: white;
                    text-align: center;
                    line-height: 100px;
                    margin: 10px;
                    cursor: move;
                    display: inline-block;
                    border-radius: 5px;
                    user-select: none;
                }
                .drop-zone {
                    width: 100%;
                    height: 150px;
                    border: 2px dashed #ccc;
                    border-radius: 5px;
                    margin-top: 20px;
                    padding: 10px;
                    text-align: center;
                    line-height: 150px;
                    color: #666;
                }
                .drop-zone.highlight {
                    border-color: #3498db;
                    background-color: #e8f4fc;
                }
                .draggable-container {
                    margin-bottom: 20px;
                }
            </style>
            
            <div class="draggable-container">
                <div id="drag1" class="draggable" draggable="true">Item 1</div>
                <div id="drag2" class="draggable" draggable="true">Item 2</div>
                <div id="drag3" class="draggable" draggable="true">Item 3</div>
            </div>
            
            <div id="drop-target" class="drop-zone">Drop items here</div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const draggables = document.querySelectorAll('.draggable');
                    const dropZone = document.getElementById('drop-target');
                    
                    // Make elements draggable
                    draggables.forEach(item => {
                        item.addEventListener('dragstart', function(event) {
                            event.dataTransfer.setData('text/plain', event.target.id);
                            setTimeout(() => {
                                event.target.style.opacity = '0.5';
                            }, 0);
                        });
                        
                        item.addEventListener('dragend', function(event) {
                            event.target.style.opacity = '1';
                        });
                    });
                    
                    // Set up drop zone
                    dropZone.addEventListener('dragover', function(event) {
                        event.preventDefault();
                    });
                    
                    dropZone.addEventListener('dragenter', function(event) {
                        this.classList.add('highlight');
                    });
                    
                    dropZone.addEventListener('dragleave', function(event) {
                        this.classList.remove('highlight');
                    });
                    
                    dropZone.addEventListener('drop', function(event) {
                        event.preventDefault();
                        this.classList.remove('highlight');
                        
                        const id = event.dataTransfer.getData('text/plain');
                        const draggedElement = document.getElementById(id);
                        
                        if (draggedElement) {
                            this.appendChild(draggedElement);
                        }
                    });
                });
            </script>
        </div>
        
        <h3>File Drag and Drop</h3>
        <p>One of the most common uses of the Drag and Drop API is for file uploads:</p>
        
        <div class="code-block">
            &lt;div id="file-drop-zone"&gt;Drop files here&lt;/div&gt;
            
            &lt;script&gt;
                const dropZone = document.getElementById('file-drop-zone');
                
                dropZone.addEventListener('dragover', function(event) {
                    event.preventDefault();
                    this.classList.add('highlight');
                });
                
                dropZone.addEventListener('dragleave', function(event) {
                    this.classList.remove('highlight');
                });
                
                dropZone.addEventListener('drop', function(event) {
                    event.preventDefault();
                    this.classList.remove('highlight');
                    
                    const files = event.dataTransfer.files;
                    
                    if (files.length > 0) {
                        // Process the files
                        for (let i = 0; i < files.length; i++) {
                            console.log(`File ${i}: ${files[i].name} (${files[i].type}, ${files[i].size} bytes)`);
                            
                            // Here you would typically upload the file or process it
                        }
                    }
                });
            &lt;/script&gt;
        </div>
        
        <div class="demo-container">
            <h3>File Drag and Drop Demo:</h3>
            <div id="drop-zone">
                <p>Drop files here or click to select</p>
                <input type="file" id="file-input" multiple style="display: none;">
            </div>
            <div id="file-list" class="demo-result"></div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const dropZone = document.getElementById('drop-zone');
                    const fileInput = document.getElementById('file-input');
                    const fileList = document.getElementById('file-list');
                    
                    // Handle file selection via click
                    dropZone.addEventListener('click', function() {
                        fileInput.click();
                    });
                    
                    fileInput.addEventListener('change', function() {
                        handleFiles(this.files);
                    });
                    
                    // Handle drag and drop
                    dropZone.addEventListener('dragover', function(event) {
                        event.preventDefault();
                        this.classList.add('highlight');
                    });
                    
                    dropZone.addEventListener('dragleave', function(event) {
                        this.classList.remove('highlight');
                    });
                    
                    dropZone.addEventListener('drop', function(event) {
                        event.preventDefault();
                        this.classList.remove('highlight');
                        
                        const files = event.dataTransfer.files;
                        handleFiles(files);
                    });
                    
                    function handleFiles(files) {
                        if (files.length === 0) return;
                        
                        let output = '<ul style="list-style-type: none; padding-left: 0;">';
                        
                        for (let i = 0; i < files.length; i++) {
                            const file = files[i];
                            const fileSize = (file.size / 1024).toFixed(2);
                            
                            output += `
                                <li style="margin-bottom: 10px; padding: 10px; background-color: #f8f9fa; border-radius: 4px;">
                                    <strong>${file.name}</strong><br>
                                    Type: ${file.type || 'unknown'}<br>
                                    Size: ${fileSize} KB
                                </li>
                            `;
                        }
                        
                        output += '</ul>';
                        fileList.innerHTML = output;
                    }
                });
            </script>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>History API</h2>
        <p>The History API allows you to manipulate the browser's history and change the URL without reloading the page. This is essential for creating single-page applications (SPAs) with proper navigation.</p>
        
        <h3>Key Methods</h3>
        <table class="comparison-table">
            <tr>
                <th>Method</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><code>history.pushState()</code></td>
                <td>Adds a new state to the history stack</td>
            </tr>
            <tr>
                <td><code>history.replaceState()</code></td>
                <td>Replaces the current state in the history stack</td>
            </tr>
            <tr>
                <td><code>history.back()</code></td>
                <td>Navigates back one page in the history</td>
            </tr>
            <tr>
                <td><code>history.forward()</code></td>
                <td>Navigates forward one page in the history</td>
            </tr>
            <tr>
                <td><code>history.go()</code></td>
                <td>Navigates to a specific page in the history</td>
            </tr>
        </table>
        
        <h3>Basic Usage</h3>
        <div class="code-block">
            // Add a new state to the history
            history.pushState(
                { page: 'home' },           // State object
                'Home Page',                // Title (ignored by most browsers)
                '/home'                     // URL
            );
            
            // Replace the current state
            history.replaceState(
                { page: 'about' },
                'About Page',
                '/about'
            );
            
            // Navigate through history
            history.back();      // Go back one page
            history.forward();   // Go forward one page
            history.go(-2);      // Go back two pages
        </div>
        
        <h3>Handling State Changes</h3>
        <p>When the user navigates through history (using browser back/forward buttons), the <code>popstate</code> event is fired:</p>
        
        <div class="code-block">
            // Listen for navigation events
            window.addEventListener('popstate', function(event) {
                // event.state contains the state object passed to pushState/replaceState
                if (event.state) {
                    console.log('Navigated to:', event.state.page);
                    // Update the UI based on the state
                    updateUI(event.state);
                }
            });
            
            function updateUI(state) {
                // Change the content based on the state
                if (state.page === 'home') {
                    document.getElementById('content').innerHTML = 'Home Page Content';
                } else if (state.page === 'about') {
                    document.getElementById('content').innerHTML = 'About Page Content';
                }
            }
        </div>
        
        <div class="demo-container">
            <h3>History API Demo:</h3>
            <div id="history-demo">
                <div id="nav-buttons" style="margin-bottom: 15px;">
                    <button id="home-btn">Home</button>
                    <button id="about-btn">About</button>
                    <button id="contact-btn">Contact</button>
                </div>
                <div id="content-area" class="demo-result" style="min-height: 100px; padding: 15px;"></div>
                <div id="url-display" style="margin-top: 10px; font-family: monospace;"></div>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const homeBtn = document.getElementById('home-btn');
                    const aboutBtn = document.getElementById('about-btn');
                    const contactBtn = document.getElementById('contact-btn');
                    const contentArea = document.getElementById('content-area');
                    const urlDisplay = document.getElementById('url-display');
                    
                    // Initial state
                    updateContent('home');
                    updateUrlDisplay();
                    
                    // Navigation buttons
                    homeBtn.addEventListener('click', function() {
                        navigateTo('home');
                    });
                    
                    aboutBtn.addEventListener('click', function() {
                        navigateTo('about');
                    });
                    
                    contactBtn.addEventListener('click', function() {
                        navigateTo('contact');
                    });
                    
                    // Handle popstate events (browser back/forward)
                    window.addEventListener('popstate', function(event) {
                        if (event.state) {
                            updateContent(event.state.page);
                        }
                        updateUrlDisplay();
                    });
                    
                    function navigateTo(page) {
                        // Update content
                        updateContent(page);
                        
                        // Update history and URL
                        const url = `#/${page}`;
                        history.pushState({ page: page }, '', url);
                        updateUrlDisplay();
                    }
                    
                    function updateContent(page) {
                        let content = '';
                        
                        switch(page) {
                            case 'home':
                                content = `
                                    <h3>Home Page</h3>
                                    <p>Welcome to the History API demo! This is the home page content.</p>
                                    <p>Click the navigation buttons above to change pages without reloading.</p>
                                `;
                                break;
                            case 'about':
                                content = `
                                    <h3>About Page</h3>
                                    <p>This is the about page content.</p>
                                    <p>The URL has changed, but the page didn't reload. This is how single-page applications work!</p>
                                `;
                                break;
                            case 'contact':
                                content = `
                                    <h3>Contact Page</h3>
                                    <p>This is the contact page content.</p>
                                    <p>Try using your browser's back and forward buttons to navigate between pages.</p>
                                `;
                                break;
                        }
                        
                        contentArea.innerHTML = content;
                    }
                    
                    function updateUrlDisplay() {
                        urlDisplay.textContent = `Current URL: ${window.location.href}`;
                    }
                });
            </script>
        </div>
        
        <div class="note">
            <h3>Important Considerations:</h3>
            <ul>
                <li>The URL must be on the same origin as the current page</li>
                <li>Only the URL path, query parameters, and fragment can be changed</li>
                <li>The page doesn't reload when using pushState/replaceState</li>
                <li>Server-side routing must be configured to handle these URLs for direct access</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Notifications API</h2>
        <p>The Notifications API allows web applications to display system notifications to the user, even when the web page is not in focus or is minimized.</p>
        
        <h3>Key Features</h3>
        <ul>
            <li>Display notifications outside the browser window</li>
            <li>Include text, images, and action buttons</li>
            <li>Trigger notifications even when the user is not actively using your site</li>
            <li>Requires user permission</li>
        </ul>
        
        <h3>Basic Usage</h3>
        <div class="code-block">
            // Check if notifications are supported
            if ('Notification' in window) {
                // Request permission
                Notification.requestPermission().then(function(permission) {
                    if (permission === 'granted') {
                        // Create and show a notification
                        const notification = new Notification('Hello!', {
                            body: 'This is a notification from the web page.',
                            icon: '/path/to/icon.png'
                        });
                        
                        // Handle notification click
                        notification.onclick = function() {
                            console.log('Notification clicked');
                            window.focus();
                            notification.close();
                        };
                    }
                });
            }
        </div>
        
        <h3>Notification Options</h3>
        <table class="comparison-table">
            <tr>
                <th>Option</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><code>body</code></td>
                <td>Main text of the notification</td>
            </tr>
            <tr>
                <td><code>icon</code></td>
                <td>URL of an image to display</td>
            </tr>
            <tr>
                <td><code>badge</code></td>
                <td>URL of a small icon for identifying the source</td>
            </tr>
            <tr>
                <td><code>image</code></td>
                <td>URL of a large image to display</td>
            </tr>
            <tr>
                <td><code>vibrate</code></td>
                <td>Vibration pattern for mobile devices</td>
            </tr>
            <tr>
                <td><code>tag</code></td>
                <td>ID for the notification (replaces previous with same tag)</td>
            </tr>
            <tr>
                <td><code>actions</code></td>
                <td>Array of action buttons</td>
            </tr>
        </table>
        
        <div class="demo-container">
            <h3>Notifications Demo:</h3>
            <div id="notification-demo">
                <button id="request-permission">Request Notification Permission</button>
                <button id="show-notification" disabled>Show Notification</button>
                <div id="notification-status" class="demo-result"></div>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const requestBtn = document.getElementById('request-permission');
                    const showBtn = document.getElementById('show-notification');
                    const statusDiv = document.getElementById('notification-status');
                    
                    // Check if notifications are supported
                    if (!('Notification' in window)) {
                        statusDiv.textContent = 'This browser does not support notifications';
                        requestBtn.disabled = true;
                        return;
                    }
                    
                    // Check current permission status
                    updatePermissionStatus();
                    
                    // Request permission button
                    requestBtn.addEventListener('click', function() {
                        Notification.requestPermission().then(function(permission) {
                            updatePermissionStatus();
                        });
                    });
                    
                    // Show notification button
                    showBtn.addEventListener('click', function() {
                        if (Notification.permission === 'granted') {
                            try {
                                const notification = new Notification('HTML5 Course Notification', {
                                    body: 'This is a test notification from the HTML5 APIs lesson.',
                                    icon: 'https://via.placeholder.com/64',
                                    tag: 'test-notification'
                                });
                                
                                notification.onclick = function() {
                                    statusDiv.textContent = 'Notification was clicked';
                                    notification.close();
                                };
                                
                                statusDiv.textContent = 'Notification sent!';
                            } catch (e) {
                                statusDiv.textContent = `Error creating notification: ${e.message}`;
                            }
                        } else {
                            statusDiv.textContent = 'Notification permission not granted';
                        }
                    });
                    
                    function updatePermissionStatus() {
                        const permission = Notification.permission;
                        
                        switch(permission) {
                            case 'granted':
                                statusDiv.textContent = 'Notification permission granted';
                                showBtn.disabled = false;
                                requestBtn.disabled = true;
                                break;
                            case 'denied':
                                statusDiv.textContent = 'Notification permission denied';
                                showBtn.disabled = true;
                                break;
                            case 'default':
                                statusDiv.textContent = 'Notification permission not yet requested';
                                showBtn.disabled = true;
                                break;
                        }
                    }
                });
            </script>
        </div>
        
        <div class="warning">
            <h3>Permission and Best Practices:</h3>
            <ul>
                <li>Always request permission in response to a user action (like a button click)</li>
                <li>Explain why you need to send notifications before requesting permission</li>
                <li>Use notifications sparingly and only for important information</li>
                <li>Provide a way for users to manage notification preferences</li>
                <li>Be aware that notifications may be blocked by the operating system</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Web Workers API</h2>
        <p>Web Workers allow you to run JavaScript in background threads, separate from the main execution thread. This enables you to perform processor-intensive tasks without blocking the user interface.</p>
        
        <h3>Key Benefits</h3>
        <ul>
            <li>Run CPU-intensive tasks without freezing the UI</li>
            <li>Perform long-running operations in the background</li>
            <li>Utilize multi-core processors more effectively</li>
            <li>Improve overall application responsiveness</li>
        </ul>
        
        <h3>Types of Web Workers</h3>
        <ul>
            <li><strong>Dedicated Workers</strong> - Connected to a single script</li>
            <li><strong>Shared Workers</strong> - Can be shared between multiple scripts or windows</li>
            <li><strong>Service Workers</strong> - Act as proxy servers between web applications, the browser, and the network</li>
        </ul>
        
        <h3>Creating a Dedicated Worker</h3>
        <div class="code-block">
            // Main script (main.js)
            
            // Create a new worker
            const worker = new Worker('worker.js');
            
            // Send data to the worker
            worker.postMessage({
                command: 'calculate',
                data: [1, 2, 3, 4, 5]
            });
            
            // Receive data from the worker
            worker.onmessage = function(event) {
                console.log('Result from worker:', event.data);
            };
            
            // Handle errors
            worker.onerror = function(error) {
                console.error('Worker error:', error.message);
            };
            
            // Terminate the worker when done
            // worker.terminate();
            
            
            // Worker script (worker.js)
            
            // Listen for messages from the main script
            self.onmessage = function(event) {
                const message = event.data;
                
                if (message.command === 'calculate') {
                    // Perform calculation
                    const result = performHeavyCalculation(message.data);
                    
                    // Send result back to main script
                    self.postMessage(result);
                }
            };
            
            function performHeavyCalculation(data) {
                // Simulate a CPU-intensive task
                let result = 0;
                for (let i = 0; i < 10000000; i++) {
                    result += data.reduce((sum, num) => sum + num, 0);
                }
                return result;
            }
        </div>
        
        <div class="demo-container">
            <h3>Web Worker Demo:</h3>
            <div id="worker-demo">
                <div class="form-group">
                    <label>Number of iterations:</label>
                    <input type="number" id="iterations" value="10000000" min="1000000" max="100000000" step="1000000">
                </div>
                <div class="form-group">
                    <button id="run-main-thread">Run in Main Thread</button>
                    <button id="run-worker">Run in Web Worker</button>
                </div>
                <div class="progress-container">
                    <div id="progress-bar" class="progress-bar">0%</div>
                </div>
                <div id="worker-result" class="demo-result"></div>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const iterationsInput = document.getElementById('iterations');
                    const mainThreadBtn = document.getElementById('run-main-thread');
                    const workerBtn = document.getElementById('run-worker');
                    const progressBar = document.getElementById('progress-bar');
                    const resultDiv = document.getElementById('worker-result');
                    
                    // Create a blob URL for the worker
                    const workerCode = `
                        self.onmessage = function(event) {
                            const iterations = event.data.iterations;
                            
                            // Perform a CPU-intensive calculation
                            let result = 0;
                            for (let i = 0; i < iterations; i++) {
                                // Update progress every 5%
                                if (i % Math.floor(iterations / 20) === 0) {
                                    const progress = Math.floor((i / iterations) * 100);
                                    self.postMessage({ type: 'progress', progress: progress });
                                }
                                
                                result += Math.sqrt(i);
                            }
                            
                            self.postMessage({ 
                                type: 'result', 
                                result: result,
                                progress: 100
                            });
                        };
                    `;
                    
                    const blob = new Blob([workerCode], { type: 'application/javascript' });
                    const workerUrl = URL.createObjectURL(blob);
                    
                    // Run in main thread
                    mainThreadBtn.addEventListener('click', function() {
                        const iterations = parseInt(iterationsInput.value);
                        resultDiv.textContent = 'Calculating in main thread...';
                        progressBar.style.width = '0%';
                        progressBar.textContent = '0%';
                        
                        // Disable buttons during calculation
                        mainThreadBtn.disabled = true;
                        workerBtn.disabled = true;
                        
                        // Small delay to allow UI to update
                        setTimeout(function() {
                            const startTime = performance.now();
                            
                            // Perform calculation in main thread
                            let result = 0;
                            for (let i = 0; i < iterations; i++) {
                                // Update progress every 5%
                                if (i % Math.floor(iterations / 20) === 0) {
                                    const progress = Math.floor((i / iterations) * 100);
                                    progressBar.style.width = progress + '%';
                                    progressBar.textContent = progress + '%';
                                }
                                
                                result += Math.sqrt(i);
                            }
                            
                            const endTime = performance.now();
                            const duration = ((endTime - startTime) / 1000).toFixed(2);
                            
                            progressBar.style.width = '100%';
                            progressBar.textContent = '100%';
                            resultDiv.textContent = `Calculation completed in ${duration} seconds. Notice how the UI was frozen during calculation.`;
                            
                            // Re-enable buttons
                            mainThreadBtn.disabled = false;
                            workerBtn.disabled = false;
                        }, 100);
                    });
                    
                    // Run in web worker
                    workerBtn.addEventListener('click', function() {
                        const iterations = parseInt(iterationsInput.value);
                        resultDiv.textContent = 'Calculating in web worker...';
                        progressBar.style.width = '0%';
                        progressBar.textContent = '0%';
                        
                        // Disable buttons during calculation
                        mainThreadBtn.disabled = true;
                        workerBtn.disabled = true;
                        
                        const startTime = performance.now();
                        
                        // Create worker
                        const worker = new Worker(workerUrl);
                        
                        // Send data to worker
                        worker.postMessage({ iterations: iterations });
                        
                        // Receive messages from worker
                        worker.onmessage = function(event) {
                            const data = event.data;
                            
                            if (data.type === 'progress') {
                                progressBar.style.width = data.progress + '%';
                                progressBar.textContent = data.progress + '%';
                            } else if (data.type === 'result') {
                                const endTime = performance.now();
                                const duration = ((endTime - startTime) / 1000).toFixed(2);
                                
                                progressBar.style.width = '100%';
                                progressBar.textContent = '100%';
                                resultDiv.textContent = `Calculation completed in ${duration} seconds. Notice how the UI remained responsive during calculation.`;
                                
                                // Terminate worker
                                worker.terminate();
                                
                                // Re-enable buttons
                                mainThreadBtn.disabled = false;
                                workerBtn.disabled = false;
                            }
                        };
                        
                        // Handle errors
                        worker.onerror = function(error) {
                            resultDiv.textContent = `Worker error: ${error.message}`;
                            
                            // Re-enable buttons
                            mainThreadBtn.disabled = false;
                            workerBtn.disabled = false;
                        };
                    });
                });
            </script>
        </div>
        
        <h3>Web Worker Limitations</h3>
        <p>Web Workers have some limitations compared to the main thread:</p>
        <ul>
            <li>No access to the DOM (can't manipulate the page directly)</li>
            <li>No access to the <code>window</code>, <code>document</code>, or <code>parent</code> objects</li>
            <li>Limited access to browser APIs</li>
            <li>Communication with the main thread is only possible via messaging</li>
            <li>Data is copied between threads, not shared (except with SharedArrayBuffer)</li>
        </ul>
        
        <div class="note">
            <h3>Use Cases for Web Workers:</h3>
            <ul>
                <li>Complex calculations and data processing</li>
                <li>Image and video processing</li>
                <li>Data parsing and validation</li>
                <li>Real-time data analysis</li>
                <li>Background synchronization</li>
                <li>Offline functionality (Service Workers)</li>
            </ul>
        </div>
    </div>
    
    <div class="lesson-container">
        <h2>Fetch API</h2>
        <p>The Fetch API provides a modern interface for making HTTP requests. It's a more powerful and flexible replacement for XMLHttpRequest (XHR).</p>
        
        <h3>Key Features</h3>
        <ul>
            <li>Promise-based for better async handling</li>
            <li>Streamlined API with cleaner syntax</li>
            <li>Built-in support for JSON</li>
            <li>Better error handling</li>
            <li>Support for request/response headers</li>
            <li>Support for streaming responses</li>
        </ul>
        
        <h3>Basic Usage</h3>
        <div class="code-block">
            // Basic GET request
            fetch('https://api.example.com/data')
                .then(response => {
                    // Check if the request was successful
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    // Parse the JSON response
                    return response.json();
                })
                .then(data => {
                    // Handle the data
                    console.log('Data received:', data);
                })
                .catch(error => {
                    // Handle errors
                    console.error('Fetch error:', error);
                });
            
            // POST request with options
            fetch('https://api.example.com/submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer token123'
                },
                body: JSON.stringify({
                    name: 'John Doe',
                    email: 'john@example.com'
                })
            })
                .then(response => response.json())
                .then(data => console.log('Success:', data))
                .catch(error => console.error('Error:', error));
        </div>
        
        <h3>Request Options</h3>
        <table class="comparison-table">
            <tr>
                <th>Option</th>
                <th>Description</th>
            </tr>
            <tr>
                <td><code>method</code></td>
                <td>HTTP method (GET, POST, PUT, DELETE, etc.)</td>
            </tr>
            <tr>
                <td><code>headers</code></td>
                <td>HTTP headers to include in the request</td>
            </tr>
            <tr>
                <td><code>body</code></td>
                <td>Body content for POST/PUT requests</td>
            </tr>
            <tr>
                <td><code>mode</code></td>
                <td>CORS mode (cors, no-cors, same-origin)</td>
            </tr>
            <tr>
                <td><code>credentials</code></td>
                <td>Whether to include cookies (omit, same-origin, include)</td>
            </tr>
            <tr>
                <td><code>cache</code></td>
                <td>Cache mode (default, no-store, reload, no-cache, force-cache)</td>
            </tr>
            <tr>
                <td><code>redirect</code></td>
                <td>How to handle redirects (follow, error, manual)</td>
            </tr>
            <tr>
                <td><code>referrer</code></td>
                <td>Referrer URL to use</td>
            </tr>
            <tr>
                <td><code>signal</code></td>
                <td>AbortSignal to abort the request</td>
            </tr>
        </table>
        
        <div class="demo-container">
            <h3>Fetch API Demo:</h3>
            <div id="fetch-demo">
                <div class="form-group">
                    <label for="api-url">API URL:</label>
                    <input type="text" id="api-url" value="https://jsonplaceholder.typicode.com/posts/1" style="width: 100%;">
                </div>
                <div class="form-group">
                    <button id="fetch-get">GET Request</button>
                    <button id="fetch-post">POST Request</button>
                </div>
                <div id="fetch-result" class="demo-result"></div>
            </div>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const urlInput = document.getElementById('api-url');
                    const getBtn = document.getElementById('fetch-get');
                    const postBtn = document.getElementById('fetch-post');
                    const resultDiv = document.getElementById('fetch-result');
                    
                    // GET request
                    getBtn.addEventListener('click', function() {
                        const url = urlInput.value.trim();
                        
                        if (!url) {
                            resultDiv.innerHTML = '<span style="color: red;">Please enter a URL</span>';
                            return;
                        }
                        
                        resultDiv.innerHTML = 'Loading...';
                        
                        fetch(url)
                            .then(response => {
                                const statusInfo = `Status: ${response.status} ${response.statusText}`;
                                
                                if (!response.ok) {
                                    throw new Error(`HTTP error! ${statusInfo}`);
                                }
                                
                                return {
                                    data: response.json(),
                                    status: statusInfo
                                };
                            })
                            .then(({ data, status }) => {
                                return data.then(jsonData => {
                                    return { jsonData, status };
                                });
                            })
                            .then(({ jsonData, status }) => {
                                resultDiv.innerHTML = `
                                    <div style="margin-bottom: 10px; color: green;">${status}</div>
                                    <pre style="background-color: #f5f5f5; padding: 10px; border-radius: 4px; overflow-x: auto;">${JSON.stringify(jsonData, null, 2)}</pre>
                                `;
                            })
                            .catch(error => {
                                resultDiv.innerHTML = `<span style="color: red;">Error: ${error.message}</span>`;
                            });
                    });
                    
                    // POST request
                    postBtn.addEventListener('click', function() {
                        const url = urlInput.value.trim();
                        
                        if (!url) {
                            resultDiv.innerHTML = '<span style="color: red;">Please enter a URL</span>';
                            return;
                        }
                        
                        resultDiv.innerHTML = 'Sending POST request...';
                        
                        // Sample data to send
                        const postData = {
                            title: 'Fetch API Test',
                            body: 'This is a test post request using the Fetch API',
                            userId: 1
                        };
                        
                        fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(postData)
                        })
                            .then(response => {
                                const statusInfo = `Status: ${response.status} ${response.statusText}`;
                                
                                if (!response.ok) {
                                    throw new Error(`HTTP error! ${statusInfo}`);
                                }
                                
                                return {
                                    data: response.json(),
                                    status: statusInfo
                                };
                            })
                            .then(({ data, status }) => {
                                return data.then(jsonData => {
                                    return { jsonData, status };
                                });
                            })
                            .then(({ jsonData, status }) => {
                                resultDiv.innerHTML = `
                                    <div style="margin-bottom: 10px; color: green;">${status}</div>
                                    <div style="margin-bottom: 10px;">
                                        <strong>Sent:</strong>
                                        <pre style="background-color: #f5f5f5; padding: 10px; border-radius: 4px; overflow-x: auto;">${JSON.stringify(postData, null, 2)}</pre>
                                    </div>
                                    <div>
                                        <strong>Received:</strong>
                                        <pre style="background-color: #f5f5f5; padding: 10px; border-radius: 4px; overflow-x: auto;">${JSON.stringify(jsonData, null, 2)}</pre>
                                    </div>
                                `;
                            })
                            .catch(error => {
                                resultDiv.innerHTML = `<span style="color: red;">Error: ${error.message}</span>`;
                            });
                    });
                });
            </script>
        </div>
        
        <h3>Using Async/Await with Fetch</h3>
        <p>Modern JavaScript allows for cleaner fetch code using async/await:</p>
        
        <div class="code-block">
            async function fetchData() {
                try {
                    // Make the request
                    const response = await fetch('https://api.example.com/data');
                    
                    // Check if successful
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    
                    // Parse the JSON
                    const data = await response.json();
                    
                    // Use the data
                    console.log('Data received:', data);
                    return data;
                } catch (error) {
                    console.error('Fetch error:', error);
                    throw error;
                }
            }
            
            // Call the function
            fetchData().then(data => {
                // Do something with the data
            });
        </div>
        
        <h3>Aborting Fetch Requests</h3>
        <p>You can cancel fetch requests using the AbortController:</p>
        
        <div class="code-block">
            // Create an AbortController
            const controller = new AbortController();
            const signal = controller.signal;
            
            // Make a fetch request with the signal
            fetch('https://api.example.com/data', { signal })
                .then(response => response.json())
                .then(data => console.log('Data:', data))
                .catch(error => {
                    if (error.name === 'AbortError') {
                        console.log('Fetch aborted');
                    } else {
                        console.error('Fetch error:', error);
                    }
                });
            
            // Abort the fetch after 5 seconds
            setTimeout(() => {
                controller.abort();
                console.log('Fetch aborted after timeout');
            }, 5000);
        </div>
    </div>
    
    <div class="interactive">
        <h2>Interactive Exercise: Build a Weather App</h2>
        <p>Let's build a simple weather app using the HTML5 APIs we've learned. This exercise will use the Geolocation API to get the user's location and the Fetch API to retrieve weather data.</p>
        
        <div>
            <textarea id="htmlEditor" rows="20" style="width: 100%; font-family: monospace; padding: 10px;"><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: #f5f7fa;
        }
        
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        
        /* Add your styles here */
        
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <h1>Weather App</h1>
    
    <!-- Create your weather app here -->
    <!-- Use the Geolocation API to get the user's location -->
    <!-- Use the Fetch API to get weather data from an API -->
    <!-- Display the weather information to the user -->
    
    <script>
        // Add your JavaScript code here
        
    </script>
</body>
</html></textarea>
            <button onclick="updatePreview()">Update Preview</button>
        </div>
        
        <h3>Preview:</h3>
        <iframe id="previewFrame" style="width: 100%; height: 500px; border: 1px solid #ddd; border-radius: 4px;"></iframe>
        
        <div class="note" style="margin-top: 20px;">
            <h3>Hint:</h3>
            <p>Your weather app should:</p>
            <ul>
                <li>Use the Geolocation API to get the user's coordinates</li>
                <li>Use the Fetch API to request weather data from a weather API (like OpenWeatherMap)</li>
                <li>Display the current weather conditions, temperature, and location</li>
                <li>Include error handling for both geolocation and API requests</li>
                <li>Store the last weather data in localStorage for offline viewing</li>
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
    &lt;title&gt;Weather App&lt;/title&gt;
    &lt;style&gt;
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: #f5f7fa;
            color: #333;
        }
        
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .weather-card {
            text-align: center;
        }
        
        .weather-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto;
        }
        
        .temperature {
            font-size: 48px;
            font-weight: bold;
            margin: 10px 0;
        }
        
        .location {
            font-size: 24px;
            color: #7f8c8d;
            margin-bottom: 10px;
        }
        
        .description {
            font-size: 18px;
            text-transform: capitalize;
            margin-bottom: 20px;
        }
        
        .details {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .detail {
            text-align: center;
        }
        
        .detail-label {
            font-size: 14px;
            color: #7f8c8d;
        }
        
        .detail-value {
            font-size: 18px;
            font-weight: bold;
        }
        
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            margin: 0 auto;
            transition: background-color 0.3s;
        }
        
        button:hover {
            background-color: #2980b9;
        }
        
        .error {
            color: #e74c3c;
            text-align: center;
            margin: 20px 0;
        }
        
        .loading {
            text-align: center;
            margin: 20px 0;
            color: #7f8c8d;
        }
        
        .offline-notice {
            background-color: #f39c12;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;h1&gt;Weather App&lt;/h1&gt;
    
    &lt;div id="offline-notice" class="offline-notice" style="display: none;"&gt;
        You are offline. Showing last saved weather data.
    &lt;/div&gt;
    
    &lt;div id="weather-container" class="container" style="display: none;"&gt;
        &lt;div class="weather-card"&gt;
            &lt;img id="weather-icon" class="weather-icon" src="" alt="Weather icon"&gt;
            &lt;div id="temperature" class="temperature"&gt;&lt;/div&gt;
            &lt;div id="location" class="location"&gt;&lt;/div&gt;
            &lt;div id="description" class="description"&gt;&lt;/div&gt;
            
            &lt;div class="details"&gt;
                &lt;div class="detail"&gt;
                    &lt;div class="detail-label"&gt;Humidity&lt;/div&gt;
                    &lt;div id="humidity" class="detail-value"&gt;&lt;/div&gt;
                &lt;/div&gt;
                &lt;div class="detail"&gt;
                    &lt;div class="detail-label"&gt;Wind&lt;/div&gt;
                    &lt;div id="wind" class="detail-value"&gt;&lt;/div&gt;
                &lt;/div&gt;
                &lt;div class="detail"&gt;
                    &lt;div class="detail-label"&gt;Feels Like&lt;/div&gt;
                    &lt;div id="feels-like" class="detail-value"&gt;&lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    
    &lt;div id="error-container" class="error" style="display: none;"&gt;&lt;/div&gt;
    
    &lt;div id="loading-container" class="loading"&gt;Loading...&lt;/div&gt;
    
    &lt;button id="get-weather"&gt;Get My Weather&lt;/button&gt;
    
    &lt;script&gt;
        document.addEventListener('DOMContentLoaded', function() {
            const weatherContainer = document.getElementById('weather-container');
            const offlineNotice = document.getElementById('offline-notice');
            const errorContainer = document.getElementById('error-container');
            const loadingContainer = document.getElementById('loading-container');
            const getWeatherButton = document.getElementById('get-weather');
            
            // Weather display elements
            const weatherIcon = document.getElementById('weather-icon');
            const temperatureElement = document.getElementById('temperature');
            const locationElement = document.getElementById('location');
            const descriptionElement = document.getElementById('description');
            const humidityElement = document.getElementById('humidity');
            const windElement = document.getElementById('wind');
            const feelsLikeElement = document.getElementById('feels-like');
            
            // Hide loading initially
            loadingContainer.style.display = 'none';
            
            // Check if offline
            function checkOnlineStatus() {
                if (!navigator.onLine) {
                    offlineNotice.style.display = 'block';
                    // Try to load cached data
                    const cachedWeather = localStorage.getItem('weatherData');
                    if (cachedWeather) {
                        displayWeatherData(JSON.parse(cachedWeather));
                    } else {
                        showError('No cached weather data available while offline.');
                    }
                    return false;
                }
                offlineNotice.style.display = 'none';
                return true;
            }
            
            // Display weather data
            function displayWeatherData(data) {
                // Hide loading and error
                loadingContainer.style.display = 'none';
                errorContainer.style.display = 'none';
                
                // Set weather icon
                const iconCode = data.weather[0].icon;
                weatherIcon.src = `https://openweathermap.org/img/wn/${iconCode}@2x.png`;
                weatherIcon.alt = data.weather[0].description;
                
                // Set temperature (convert from Kelvin to Celsius)
                const tempCelsius = Math.round(data.main.temp - 273.15);
                temperatureElement.textContent = `${tempCelsius}°C`;
                
                // Set location
                locationElement.textContent = `${data.name}, ${data.sys.country}`;
                
                // Set description
                descriptionElement.textContent = data.weather[0].description;
                
                // Set details
                humidityElement.textContent = `${data.main.humidity}%`;
                windElement.textContent = `${Math.round(data.wind.speed * 3.6)} km/h`; // Convert m/s to km/h
                
                const feelsLikeCelsius = Math.round(data.main.feels_like - 273.15);
                feelsLikeElement.textContent = `${feelsLikeCelsius}°C`;
                
                // Show weather container
                weatherContainer.style.display = 'block';
                
                // Cache the data
                localStorage.setItem('weatherData', JSON.stringify(data));
            }
            
            // Show error message
            function showError(message) {
                loadingContainer.style.display = 'none';
                weatherContainer.style.display = 'none';
                errorContainer.style.display = 'block';
                errorContainer.textContent = message;
            }
            
            // Get weather data from API
            async function getWeatherData(lat, lon) {
                try {
                    // Note: In a real app, you would use your own API key
                    // For this demo, we'll use a placeholder URL
                    const apiKey = 'YOUR_API_KEY'; // Replace with your actual API key
                    const apiUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}`;
                    
                    // For demo purposes, we'll use a mock response if the API key is not provided
                    if (apiKey === 'YOUR_API_KEY') {
                        // Mock data for demonstration
                        return {
                            weather: [
                                {
                                    icon: '01d',
                                    description: 'clear sky'
                                }
                            ],
                            main: {
                                temp: 293.15, // 20°C in Kelvin
                                feels_like: 291.15, // 18°C in Kelvin
                                humidity: 65
                            },
                            wind: {
                                speed: 5.5 // m/s
                            },
                            name: 'Sample City',
                            sys: {
                                country: 'XX'
                            }
                        };
                    }
                    
                    const response = await fetch(apiUrl);
                    
                    if (!response.ok) {
                        throw new Error(`Weather API error: ${response.status}`);
                    }
                    
                    return await response.json();
                } catch (error) {
                    throw new Error(`Failed to get weather data: ${error.message}`);
                }
            }
            
            // Get user's location and weather
            async function getLocationAndWeather() {
                // Check if online
                if (!checkOnlineStatus()) {
                    return;
                }
                
                // Show loading
                loadingContainer.style.display = 'block';
                weatherContainer.style.display = 'none';
                errorContainer.style.display = 'none';
                
                // Check if geolocation is supported
                if (!navigator.geolocation) {
                    showError('Geolocation is not supported by your browser');
                    return;
                }
                
                try {
                    // Get current position
                    const position = await new Promise((resolve, reject) => {
                        navigator.geolocation.getCurrentPosition(resolve, reject, {
                            enableHighAccuracy: true,
                            timeout: 10000,
                            maximumAge: 0
                        });
                    });
                    
                    const { latitude, longitude } = position.coords;
                    
                    // Get weather data
                    const weatherData = await getWeatherData(latitude, longitude);
                    
                    // Display weather data
                    displayWeatherData(weatherData);
                } catch (error) {
                    let errorMessage = 'An unknown error occurred';
                    
                    if (error.code) {
                        // Geolocation error
                        switch(error.code) {
                            case error.PERMISSION_DENIED:
                                errorMessage = 'User denied the request for geolocation';
                                break;
                            case error.POSITION_UNAVAILABLE:
                                errorMessage = 'Location information is unavailable';
                                break;
                            case error.TIMEOUT:
                                errorMessage = 'The request to get user location timed out';
                                break;
                        }
                    } else {
                        // Other error
                        errorMessage = error.message;
                    }
                    
                    showError(errorMessage);
                }
            }
            
            // Event listener for get weather button
            getWeatherButton.addEventListener('click', getLocationAndWeather);
            
            // Check for cached data on load
            const cachedWeather = localStorage.getItem('weatherData');
            if (cachedWeather) {
                displayWeatherData(JSON.parse(cachedWeather));
            }
            
            // Listen for online/offline events
            window.addEventListener('online', checkOnlineStatus);
            window.addEventListener('offline', checkOnlineStatus);
            
            // Initial check
            checkOnlineStatus();
        });
    &lt;/script&gt;
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
            1. Which HTML5 API would you use to store data that persists even after the browser is closed?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q1" value="a"> Geolocation API</label>
            <label><input type="radio" name="q1" value="b"> Web Storage API (localStorage)</label>
            <label><input type="radio" name="q1" value="c"> Web Storage API (sessionStorage)</label>
            <label><input type="radio" name="q1" value="d"> History API</label>
        </div>
        <div id="feedback1" class="feedback"></div>
        
        <div class="quiz-question">
            2. Which method is used to request the user's geographical location?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q2" value="a"> navigator.getLocation()</label>
            <label><input type="radio" name="q2" value="b"> navigator.geolocation.getPosition()</label>
            <label><input type="radio" name="q2" value="c"> navigator.geolocation.getCurrentPosition()</label>
            <label><input type="radio" name="q2" value="d"> navigator.location.get()</label>
        </div>
        <div id="feedback2" class="feedback"></div>
        
        <div class="quiz-question">
            3. Which HTML5 API allows you to run JavaScript code in a separate thread?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q3" value="a"> Web Workers API</label>
            <label><input type="radio" name="q3" value="b"> Thread API</label>
            <label><input type="radio" name="q3" value="c"> Background API</label>
            <label><input type="radio" name="q3" value="d"> Parallel API</label>
        </div>
        <div id="feedback3" class="feedback"></div>
        
        <div class="quiz-question">
            4. Which method is used to add a new state to the browser's history without reloading the page?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q4" value="a"> history.addState()</label>
            <label><input type="radio" name="q4" value="b"> history.pushState()</label>
            <label><input type="radio" name="q4" value="c"> history.setState()</label>
            <label><input type="radio" name="q4" value="d"> history.updateState()</label>
        </div>
        <div id="feedback4" class="feedback"></div>
        
        <div class="quiz-question">
            5. Which API would you use to make HTTP requests to a server?
        </div>
        <div class="quiz-options">
            <label><input type="radio" name="q5" value="a"> HTTP API</label>
            <label><input type="radio" name="q5" value="b"> Ajax API</label>
            <label><input type="radio" name="q5" value="c"> Fetch API</label>
            <label><input type="radio" name="q5" value="d"> Request API</label>
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
            <button onclick="window.location.href='../intermediate/06_advanced_forms.html'">Previous Module: Advanced Forms</button>
        </div>
        <div>
            <button onclick="window.location.href='02_canvas_svg.php'">Next Lesson: Canvas and SVG</button>
        </div>
    </div>
</body>
</html>
