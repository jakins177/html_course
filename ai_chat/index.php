<?php require_once __DIR__ . '/../auth-system/login_check.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprehensive HTML Course</title>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --accent-color: #e74c3c;
            --dark-color: #2c3e50;
            --light-color: #ecf0f1;
            --border-color: #ddd;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --font-main: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: var(--font-main);
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        header {
            background-color: var(--dark-color);
            color: white;
            padding: 20px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        
        .logo span {
            color: var(--primary-color);
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 20px;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        nav ul li a:hover {
            color: var(--primary-color);
        }
        
        .hero {
            background-color: var(--primary-color);
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto 30px;
        }
        
        .btn {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 12px 24px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #27ae60;
        }
        
        .btn-accent {
            background-color: var(--accent-color);
        }
        
        .btn-accent:hover {
            background-color: #c0392b;
        }
        
        .course-overview {
            padding: 60px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            color: var(--dark-color);
        }
        
        .section-title h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .section-title p {
            color: #666;
        }
        
        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 40px;
        }
        
        .feature {
            flex: 0 0 calc(33.333% - 20px);
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            font-size: 40px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .feature h3 {
            margin-bottom: 15px;
            color: var(--dark-color);
        }
        
        .modules {
            padding: 60px 0;
            background-color: #f0f4f8;
        }
        
        .module-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .module-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .module-header {
            background-color: var(--dark-color);
            color: white;
            padding: 15px 20px;
        }
        
        .module-header h3 {
            margin: 0;
        }
        
        .module-content {
            padding: 20px;
        }
        
        .module-content p {
            margin-bottom: 20px;
            color: #666;
        }
        
        .lesson-list {
            list-style: none;
            margin-bottom: 20px;
        }
        
        .lesson-list li {
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
        }
        
        .lesson-list li::before {
            content: "•";
            color: var(--primary-color);
            position: absolute;
            left: 0;
        }
        
        .lesson-list li a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .lesson-list li a:hover {
            color: var(--primary-color);
        }
        
        .progress-section {
            padding: 60px 0;
        }
        
        .progress-tracker {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .progress-stats {
            display: flex;
            margin-bottom: 30px;
        }
        
        .stat-box {
            flex: 1;
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin-right: 15px;
        }
        
        .stat-box:last-child {
            margin-right: 0;
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        .stat-label {
            color: #666;
        }
        
        .module-progress {
            margin-bottom: 20px;
        }
        
        .module-progress h4 {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
        }
        
        .module-progress h4 span {
            color: #666;
            font-weight: normal;
        }
        
        .progress-bar {
            height: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
            overflow: hidden;
        }
        
        .progress-value {
            height: 100%;
            background-color: var(--primary-color);
            border-radius: 5px;
        }
        
        .projects {
            padding: 60px 0;
            background-color: #f0f4f8;
        }
        
        .project-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .project-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .project-image {
            height: 200px;
            background-color: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 1.2rem;
        }
        
        .project-content {
            padding: 20px;
        }
        
        .project-content h3 {
            margin-bottom: 10px;
        }
        
        .project-content p {
            color: #666;
            margin-bottom: 20px;
        }
        
        .tag {
            display: inline-block;
            background-color: #e9ecef;
            color: #495057;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            margin-right: 5px;
            margin-bottom: 5px;
        }
        
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 40px 0;
            text-align: center;
        }
        
        .footer-content {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .footer-content p {
            margin-bottom: 20px;
        }
        
        .social-links {
            margin-bottom: 20px;
        }
        
        .social-links a {
            color: white;
            margin: 0 10px;
            font-size: 1.2rem;
            text-decoration: none;
        }
        
        .copyright {
            color: #bbb;
            font-size: 0.9rem;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
            }
            
            nav ul {
                margin-top: 20px;
            }
            
            .feature {
                flex: 0 0 100%;
            }
            
            .progress-stats {
                flex-direction: column;
            }
            
            .stat-box {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }
        
        /* Progress Tracking System */
        .progress-indicator {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 10px;
            vertical-align: middle;
        }
        
        .not-started {
            background-color: #e9ecef;
        }
        
        .in-progress {
            background-color: var(--warning-color);
        }
        
        .completed {
            background-color: var(--success-color);
        }
        
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1000;
            overflow: auto;
        }
        
        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 30px;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            position: relative;
        }
        
        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
            color: #666;
        }
        
        .close-modal:hover {
            color: var(--accent-color);
        }
    </style>
<link rel="stylesheet" href="/assets/darkmode.css">
<script defer src="/assets/darkmode.js"></script>
</head>
<body>
    <header>
        <div class="container header-content">
            <div class="logo"><a href="/" target="_blank" rel="noopener noreferrer"> <img src="/assets/logo.png"  width="100" height="100" alt="HTML Master Logo" alt="main logo"> </a></div>
            <nav>
                <ul>
                    <li><a href="/" target="_blank" rel="noopener noreferrer">Home</a></li>
                  
                </ul>
            </nav>
        </div>
    </header>
    
    <!-- Project Modals -->
    <div id="portfolio-modal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('portfolio-modal')">&times;</span>
            <h2>Personal Portfolio Project</h2>
            <p>In this project, you'll create a responsive personal portfolio website to showcase your skills and projects.</p>
            <h3>Project Requirements:</h3>
            <ul>
                <li>Create a responsive layout that works on mobile, tablet, and desktop</li>
                <li>Include sections for About, Skills, Projects, and Contact</li>
                <li>Use semantic HTML5 elements for proper document structure</li>
                <li>Implement proper heading hierarchy and accessibility features</li>
                <li>Create a responsive navigation menu</li>
                <li>Include a contact form with proper validation</li>
            </ul>
            <h3>Skills Applied:</h3>
            <ul>
                <li>HTML5 semantic elements</li>
                <li>Responsive design principles</li>
                <li>Form creation and validation</li>
                <li>Accessibility best practices</li>
                <li>Image optimization</li>
            </ul>
            <a href="projects/portfolio_template.html" class="btn" download>Download Project Template</a>
        </div>
    </div>
    
    <div id="blog-modal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('blog-modal')">&times;</span>
            <h2>Blog Template Project</h2>
            <p>Build a blog template with proper semantic structure and accessibility features.</p>
            <h3>Project Requirements:</h3>
            <ul>
                <li>Create a blog homepage with featured posts and categories</li>
                <li>Build an individual blog post page with proper article structure</li>
                <li>Implement a comment section with a form</li>
                <li>Use semantic HTML5 elements throughout</li>
                <li>Ensure proper accessibility with ARIA attributes where needed</li>
                <li>Include proper metadata for SEO</li>
            </ul>
            <h3>Skills Applied:</h3>
            <ul>
                <li>Semantic HTML structure</li>
                <li>Accessibility implementation</li>
                <li>Form creation</li>
                <li>Metadata and SEO basics</li>
                <li>Content organization</li>
            </ul>
            <a href="projects/blog_template.html" class="btn" download>Download Project Template</a>
        </div>
    </div>
    
    <div id="ecommerce-modal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('ecommerce-modal')">&times;</span>
            <h2>E-commerce Product Page Project</h2>
            <p>Create a product page with structured data, image gallery, and interactive elements.</p>
            <h3>Project Requirements:</h3>
            <ul>
                <li>Build a product page with image gallery</li>
                <li>Implement product details with structured data using Microdata or JSON-LD</li>
                <li>Create an add-to-cart form with options (size, color, quantity)</li>
                <li>Include product reviews section</li>
                <li>Add related products section</li>
                <li>Ensure mobile responsiveness</li>
            </ul>
            <h3>Skills Applied:</h3>
            <ul>
                <li>Structured data implementation</li>
                <li>Form creation with various input types</li>
                <li>Image gallery implementation</li>
                <li>Semantic product information</li>
                <li>Responsive design for e-commerce</li>
            </ul>
            <a href="projects/ecommerce_template.html" class="btn" download>Download Project Template</a>
        </div>
    </div>
    
    <div id="dashboard-modal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('dashboard-modal')">&times;</span>
            <h2>Interactive Dashboard Project</h2>
            <p>Build a dashboard with interactive charts using Canvas and SVG elements.</p>
            <h3>Project Requirements:</h3>
            <ul>
                <li>Create a dashboard layout with multiple sections</li>
                <li>Implement at least one chart using Canvas</li>
                <li>Implement at least one visualization using SVG</li>
                <li>Add interactive elements that respond to user actions</li>
                <li>Include a data table with sortable columns</li>
                <li>Ensure the dashboard is responsive</li>
            </ul>
            <h3>Skills Applied:</h3>
            <ul>
                <li>Canvas implementation</li>
                <li>SVG creation and manipulation</li>
                <li>Data visualization basics</li>
                <li>Interactive HTML elements</li>
                <li>Table structure and accessibility</li>
            </ul>
            <a href="projects/dashboard_template.html" class="btn" download>Download Project Template</a>
        </div>
    </div>
    
    <!-- Removed legacy progress tracking and modal functions -->
    <link href="https://cdn.jsdelivr.net/npm/@n8n/chat/dist/style.css" rel="stylesheet" />
   

    <style>
        /* Change primary color */
        html, body {
      margin: 0;
      padding: 0;
      height: 100%;
    }

    #chat-root {
      height: 100vh; /* Full screen height */
      width: 100vw;  /* Full screen width */
      overflow: hidden;
    }

    /* Optional: Override window size to make it use full screen */
    :root {
      --chat--window--width: 100vw;
      --chat--window--height: 100vh;
      --chat--window--bottom: 0;
      --chat--window--right: 0;
      --chat--window--border-radius: 0;
    }
 

  /* 🔧 Override default CSS variables defined by n8n chat */
  :root {
    --chat--color-primary: #00C897; /* Accent color for toggle button, links, etc */
    --chat--color-primary-shade-50: #00b089;
    --chat--color-primary-shade-100: #009777;
    --chat--color-secondary: #00796B; /* User message background */
    --chat--color-secondary-shade-50: #00695C;
    --chat--color-light: #f0f8ff;     /* Chat background */
    --chat--color-dark: #1a1a1a;      /* Bot text color */
    --chat--message--bot--background: #ffffff;
    --chat--message--bot--color: #222;
    --chat--message--user--background: var(--chat--color-secondary);
    --chat--message--user--color: white;
    --chat--toggle--background: var(--chat--color-primary);
    --chat--toggle--hover--background: var(--chat--color-primary-shade-50);
    --chat--toggle--active--background: var(--chat--color-primary-shade-100);
  }

  /* 🎨 Optional: Style message bubbles directly */
  .n8n-chat .chat-message.chat-message-from-bot {
    font-family: 'Segoe UI', sans-serif;
    font-size: 1rem;
    border: 1px solid #e0e0e0;
  }

  .n8n-chat .chat-message.chat-message-from-user {
    font-family: 'Segoe UI', sans-serif;
    font-size: 1rem;
    background: linear-gradient(135deg, #005dc8, #2c3e50);
  }

  /* 📝 Chat input styling */
  .n8n-chat textarea {
    background-color: #ffffff;
    border: 1px solid #0064c8;
    color: hsl(0, 0%, 13%);
  }

  .n8n-chat .chat-input-send-button {
    background-color: #005dc8;
    color: white;
  }

  .n8n-chat .chat-header {
    background-color: #2c3e50;
    color: white;
  }

  .n8n-chat .chat-window-wrapper .chat-window-toggle {
    background: var(--chat--toggle--background);
    color: white;
  }
        
    </style>      
   
    <!-- Removed old chat initialization script -->
    <script src="../assets/js/main-scripts.js"></script>
    <script type="module" src="../assets/js/chat-logic.js"></script>
    <script type="module">
      import { initializeN8NChat } from '../assets/js/chat-logic.js';

      document.addEventListener('DOMContentLoaded', () => {
        initializeN8NChat({
          webhookUrl: 'https://palmtreesai.com/n8n/webhook/776d8016-6e3b-451e-bc5f-f5d1d768de73/chat',
          initialMessages: [
            'Welcome to the AI Master HTML Assistant!',
            'Feel free to ask any questions about HTML.',
          ],
          i18n: {
            en: {
              title: 'AI Master HTML Assistant 👋',
              subtitle: 'Ask me anything anytime about your HTML learning needs',
              footer: '',
              getStarted: 'New Conversation',
              inputPlaceholder: 'Type your question...',
            },
          },
          target: '#chat-root', // Target for ai_chat/index.html
          mode: 'fullscreen',   // Fullscreen mode
          autoOpen: true,       // Auto open
          hideToggle: true,     // Hide toggle
          gasergy: {
            fetchPath: '../gasergy/decrease_gasergy.php', // Path for ai_chat/index.php
            // No balanceDisplaySelector for ai_chat as it's fullscreen and doesn't show balance.
            refillPath: '../gasergy/get.php',
            balancePath: '../gasergy/get_balance.php'
          }
        });
      });
    </script>
</body>
<!-- <footer>
    <div class="container">
        <div class="footer-content">
            <p>Master HTML with our comprehensive, interactive course designed for beginners to advanced learners.</p>
            <div class="social-links">
                <a href="#" aria-label="Twitter">Twitter</a>
                <a href="#" aria-label="GitHub">GitHub</a>
                <a href="#" aria-label="LinkedIn">LinkedIn</a>
            </div>
            <div class="copyright">
                &copy; 2025 HTMLMaster Course. All rights reserved.
            </div>
        </div>
    </div>
</footer> -->
</html>
