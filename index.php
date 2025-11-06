
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
file_put_contents(__DIR__ . '/index_debug.log', date('c') . " index.php loaded\n", FILE_APPEND);

require_once __DIR__ . '/auth-system/login_check.php';
require_once __DIR__ . '/auth-system/config/db.php';

file_put_contents(__DIR__ . '/index_debug.log', "User ID: " . $_SESSION['user_id'] . "\n", FILE_APPEND);
?>


<?php
$gasergyBalance = null;
if (isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare("SELECT gasergy_balance FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $gasergyBalance = $stmt->fetchColumn();
}
?>


<!DOCTYPE html>
<html lang="en" class="themed">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Master Comprehensive HTML Course</title>
    <style>
        :root {
            --font-main: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            --card-radius: 18px;
            --transition-base: 0.25s ease;
        }

        html.themed {
            color-scheme: light;
            --bg-base: #f3f6ff;
            --bg-layer-1: radial-gradient(1200px 600px at 20% -20%, rgba(124, 109, 255, 0.18), transparent 65%);
            --bg-layer-2: radial-gradient(1000px 600px at 120% 10%, rgba(95, 220, 255, 0.2), transparent 60%);
            --text-color: #151b2f;
            --muted-color: #556184;
            --surface: rgba(255, 255, 255, 0.78);
            --surface-strong: rgba(255, 255, 255, 0.92);
            --border-color: rgba(33, 46, 94, 0.16);
            --shadow-color: 0 24px 60px rgba(18, 34, 68, 0.14);
            --chip-bg: rgba(19, 61, 119, 0.08);
            --chip-border: rgba(33, 46, 94, 0.18);
            --chip-highlight: rgba(124, 109, 255, 0.16);
            --primary-gradient: linear-gradient(135deg, #5fdcff 0%, #7c6dff 50%, #ff93f9 100%);
            --ghost-bg: rgba(255, 255, 255, 0.45);
            --ghost-color: #1d2540;
            --card-blur: saturate(1.2) blur(12px);
            --section-spacing: clamp(3rem, 7vw, 5rem);
            --module-header-bg: linear-gradient(135deg, rgba(95, 220, 255, 0.25), rgba(124, 109, 255, 0.32));
            --project-image-overlay: linear-gradient(135deg, rgba(95, 220, 255, 0.18), rgba(124, 109, 255, 0.22));
        }

        html.themed.dark {
            color-scheme: dark;
            --bg-base: #0b1020;
            --bg-layer-1: radial-gradient(1200px 600px at 20% -20%, rgba(122, 107, 255, 0.25), transparent 60%);
            --bg-layer-2: radial-gradient(900px 700px at 120% 20%, rgba(106, 227, 255, 0.18), transparent 60%);
            --text-color: #e9ecf8;
            --muted-color: #a2acc3;
            --surface: rgba(255, 255, 255, 0.06);
            --surface-strong: rgba(255, 255, 255, 0.12);
            --border-color: rgba(255, 255, 255, 0.12);
            --shadow-color: 0 20px 60px rgba(0, 0, 0, 0.5);
            --chip-bg: rgba(255, 255, 255, 0.08);
            --chip-border: rgba(255, 255, 255, 0.18);
            --chip-highlight: rgba(122, 107, 255, 0.22);
            --primary-gradient: linear-gradient(135deg, #6ae3ff 0%, #7a6bff 50%, #ff8dfc 100%);
            --ghost-bg: rgba(255, 255, 255, 0.08);
            --ghost-color: #e9ecf8;
            --card-blur: saturate(1.35) blur(14px);
            --section-spacing: clamp(3rem, 7vw, 5.2rem);
            --module-header-bg: linear-gradient(135deg, rgba(106, 227, 255, 0.2), rgba(122, 107, 255, 0.28));
            --project-image-overlay: linear-gradient(135deg, rgba(106, 227, 255, 0.18), rgba(122, 107, 255, 0.22));
        }

        *, *::before, *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: var(--font-main);
            line-height: 1.65;
            color: var(--text-color);
            background: var(--bg-layer-1), var(--bg-layer-2), var(--bg-base);
            min-height: 100vh;
            transition: background 0.6s ease, color 0.4s ease;
        }

        h1, h2, h3, h4 {
            margin: 0;
            color: var(--text-color);
        }

        p {
            margin: 0;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        img {
            max-width: 100%;
            display: block;
        }

        button {
            font-family: inherit;
        }

        .container {
            width: min(1120px, 92vw);
            margin: 0 auto;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: color-mix(in srgb, var(--bg-base) 82%, transparent);
            backdrop-filter: var(--card-blur);
            border-bottom: 1px solid var(--border-color);
        }

        .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 14px 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            overflow: hidden;
            display: grid;
            place-items: center;
            background: var(--primary-gradient);
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.22);
        }

        .brand-logo img {
            width: 36px;
            height: 36px;
            object-fit: contain;
            filter: drop-shadow(0 6px 16px rgba(0, 0, 0, 0.25));
        }

        .brand-text {
            display: grid;
            gap: 2px;
        }

        .brand-text small {
            color: var(--muted-color);
            font-weight: 500;
        }

        .nav-right {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 18px;
            flex-wrap: wrap;
        }

        nav.nav-links {
            display: flex;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
            justify-content: flex-end;
            font-size: 0.95rem;
        }

        nav.nav-links a {
            opacity: 0.82;
            transition: opacity var(--transition-base), transform var(--transition-base);
        }

        nav.nav-links a:hover {
            opacity: 1;
            transform: translateY(-1px);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .nav-actions .btn {
            box-shadow: none;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 10px 18px;
            border-radius: 14px;
            border: 1px solid transparent;
            font-weight: 600;
            cursor: pointer;
            box-shadow: var(--shadow-color);
            transition: transform var(--transition-base), box-shadow 0.3s ease, opacity 0.3s ease;
            white-space: nowrap;
            background: var(--ghost-bg);
            color: var(--ghost-color);
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0) scale(0.98);
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: #0a0f1c;
            border-color: transparent;
        }

        .btn-ghost {
            background: var(--ghost-bg);
            color: var(--ghost-color);
            border-color: var(--border-color);
            box-shadow: none;
        }

        .btn-outline {
            background: transparent;
            color: var(--text-color);
            border-color: var(--border-color);
            box-shadow: none;
        }

        .chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 12px;
            border-radius: 999px;
            border: 1px solid var(--chip-border);
            background: var(--chip-bg);
            color: var(--muted-color);
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.2px;
        }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 999px;
            background: #7a6bff;
            box-shadow: 0 0 0 6px rgba(122, 107, 255, 0.18);
        }

        .hero {
            padding: var(--section-spacing) 0 calc(var(--section-spacing) - 1rem);
        }

        .hero-grid {
            display: grid;
            gap: clamp(24px, 6vw, 60px);
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            align-items: start;
        }

        .hero-main {
            display: grid;
            gap: 16px;
        }

        .hero h1 {
            font-size: clamp(2.4rem, 5vw, 3.6rem);
            line-height: 1.05;
            letter-spacing: -0.4px;
        }

        .gradient-text {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero p {
            color: var(--muted-color);
            font-size: 1.05rem;
            max-width: 560px;
        }

        .cta-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
        }

        .hero-card {
            background: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--card-radius);
            padding: 18px;
            display: grid;
            gap: 12px;
            backdrop-filter: var(--card-blur);
            box-shadow: var(--shadow-color);
            position: relative;
            overflow: hidden;
        }

        .hero-card .row {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .hero-card.hero-benefits {
            gap: 14px;
        }

        .hero-card.hero-benefits .chip {
            background: var(--chip-highlight);
            border-color: transparent;
            color: var(--text-color);
        }

        .hero-card .avatar {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: var(--primary-gradient);
            display: grid;
            place-items: center;
            color: #0a0f1c;
            font-weight: 800;
            letter-spacing: 0.5px;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.2);
        }

        .hero-card strong {
            color: var(--text-color);
        }

        .hero-card .subtle,
        .subtle {
            color: var(--muted-color);
            font-size: 0.9rem;
        }

        .section {
            padding: var(--section-spacing) 0;
        }

        .section-title {
            display: grid;
            gap: 8px;
            text-align: center;
            margin-bottom: clamp(2.4rem, 5vw, 3.4rem);
        }

        .section-title p {
            color: var(--muted-color);
            margin: 0 auto;
            max-width: 640px;
        }

        .features {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        }

        .feature {
            background: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--card-radius);
            padding: 20px;
            display: grid;
            gap: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            backdrop-filter: var(--card-blur);
        }

        .feature:hover {
            transform: translateY(-4px);
            border-color: color-mix(in srgb, var(--border-color) 70%, transparent);
            box-shadow: var(--shadow-color);
        }

        .feature-icon {
            font-size: 1.8rem;
            background: var(--primary-gradient);
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            color: #0a0f1c;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.22);
        }

        .feature p {
            color: var(--muted-color);
        }

        .modules {
            background: color-mix(in srgb, var(--surface) 25%, transparent);
        }

        .module-grid {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        }

        .module-card {
            background: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--card-radius);
            overflow: hidden;
            display: grid;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            backdrop-filter: var(--card-blur);
        }

        .module-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-color);
        }

        .module-header {
            padding: 18px 22px;
            background: var(--module-header-bg);
            font-weight: 700;
        }

        .module-content {
            padding: 22px;
            display: grid;
            gap: 18px;
        }

        .module-content p {
            color: var(--muted-color);
        }

        .lesson-list {
            list-style: none;
            display: grid;
            gap: 10px;
            padding: 0;
            margin: 0;
        }

        .lesson-list li {
            position: relative;
            padding-left: 20px;
            color: var(--muted-color);
        }

        .lesson-list li::before {
            content: "•";
            position: absolute;
            left: 0;
            top: 0;
            color: var(--text-color);
            opacity: 0.4;
            font-size: 1.2rem;
            line-height: 1;
        }

        .lesson-list a {
            font-weight: 500;
            transition: color var(--transition-base);
        }

        .lesson-list a:hover {
            color: var(--text-color);
        }

        .progress-section .progress-tracker {
            background: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--card-radius);
            padding: 24px;
            display: grid;
            gap: 24px;
            backdrop-filter: var(--card-blur);
            box-shadow: var(--shadow-color);
        }

        .progress-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .progress-stats {
            display: grid;
            gap: 12px;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        }

        .stat-box {
            background: color-mix(in srgb, var(--surface) 70%, transparent);
            border: 1px solid var(--border-color);
            border-radius: var(--card-radius);
            padding: 16px;
            text-align: center;
            display: grid;
            gap: 4px;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
        }

        .stat-label {
            color: var(--muted-color);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.75rem;
        }

        .module-progress {
            display: grid;
            gap: 10px;
        }

        .module-progress h4 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin: 0;
            font-size: 1rem;
        }

        .module-progress span {
            color: var(--muted-color);
            font-weight: 500;
            font-size: 0.85rem;
        }

        .progress-bar {
            height: 10px;
            border-radius: 999px;
            background: color-mix(in srgb, var(--border-color) 40%, transparent);
            overflow: hidden;
        }

        .progress-value {
            height: 100%;
            background: var(--primary-gradient);
            border-radius: inherit;
            transition: width 0.4s ease;
        }

        .projects .project-grid {
            display: grid;
            gap: 18px;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        }

        .project-card {
            background: var(--surface);
            border: 1px solid var(--border-color);
            border-radius: var(--card-radius);
            overflow: hidden;
            display: grid;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            backdrop-filter: var(--card-blur);
        }

        .project-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-color);
        }

        .project-image {
            position: relative;
            padding-top: 62%;
            overflow: hidden;
            background: var(--project-image-overlay);
        }

        .project-image img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .project-content {
            padding: 22px;
            display: grid;
            gap: 14px;
        }

        .project-content p {
            color: var(--muted-color);
        }

        .project-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .tag {
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 999px;
            padding: 6px 10px;
            background: var(--chip-bg);
            border: 1px solid var(--chip-border);
            color: var(--muted-color);
        }

        footer {
            border-top: 1px solid var(--border-color);
            padding: 26px 0;
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            color: var(--muted-color);
            font-size: 0.9rem;
        }

        .footer-content a {
            color: var(--muted-color);
            font-weight: 600;
        }

        .footer-content a:hover {
            color: var(--text-color);
        }

        .footer-blurb {
            display: grid;
            gap: 4px;
        }

        .footer-links {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .footer-meta {
            margin-top: 12px;
            text-align: center;
        }

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 2000;
            background: rgba(6, 12, 26, 0.55);
            backdrop-filter: blur(12px);
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .modal.open {
            display: flex;
        }

        .modal-content {
            position: relative;
            max-width: min(620px, 94vw);
            background: var(--surface-strong);
            border: 1px solid var(--border-color);
            border-radius: var(--card-radius);
            padding: 26px;
            display: grid;
            gap: 18px;
            box-shadow: var(--shadow-color);
            color: var(--text-color);
        }

        .modal-content ul {
            margin: 0;
            padding-left: 20px;
            display: grid;
            gap: 8px;
            color: var(--muted-color);
        }

        .close-modal {
            position: absolute;
            top: 18px;
            right: 18px;
            font-size: 1.4rem;
            color: var(--muted-color);
            cursor: pointer;
        }

        #gasergy-balance-display {
            font-size: 0.85rem;
            color: var(--muted-color);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        @media (max-width: 900px) {
            header {
                position: static;
            }

            .nav-inner {
                flex-wrap: wrap;
                justify-content: center;
            }

            .nav-right {
                justify-content: center;
            }
        }

        @media (max-width: 600px) {
            .hero {
                text-align: center;
            }

            .hero p {
                margin: 0 auto;
            }

            .cta-row {
                justify-content: center;
            }

            .hero-card .row {
                justify-content: center;
            }
        }
    </style>
<link rel="stylesheet" href="assets/darkmode.css">
<script defer src="assets/darkmode.js"></script>
</head>
<body>
    <header>
        <div class="container nav-inner">
            <div class="brand">
                <div class="brand-logo">
                    <a href="/" target="_blank" rel="noopener noreferrer">
                        <img src="assets/logo.png" width="44" height="44" alt="HTML Master Logo">
                    </a>
                </div>
                <div class="brand-text">
                    <span>HTML Master</span>
                    <small>Comprehensive HTML Course</small>
                </div>
            </div>
            <div class="nav-right">
                <nav class="nav-links">
                    <a href="ai_chat/index.php">AI Expert Chat</a>
                    <a href="#course-overview">Overview</a>
                    <a href="#modules">Modules</a>
                    <a href="#projects">Projects</a>
                </nav>
                <div class="nav-actions">
                    <span id="gasergy-balance-display" class="chip" aria-live="polite">⚡ <?php echo htmlspecialchars($gasergyBalance ?? '0'); ?> Gasergy</span>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a class="btn btn-ghost" href="auth-system/backend-login-src/logout.php">Logout</a>
                    <?php else: ?>
                        <a class="btn btn-ghost" href="auth-system/login.html">Login</a>
                        <a class="btn btn-primary" href="auth-system/register.html">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    
    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-main">
                <span class="chip"><span class="dot"></span> SRN-inspired learning experience</span>
                <h1>Master HTML with a <span class="gradient-text">Software Robot Network</span> vibe</h1>
                <p>A comprehensive, interactive course designed to take you from the basics to advanced mastery of HTML. Learn through practical examples, interactive exercises, and real-world projects with a polished, glassmorphism aesthetic.</p>
                <p>Need quick answers or guidance? Launch the <strong>AI Expert Chat</strong> for instant help with coding questions, examples, and more.</p>
                <div class="cta-row">
                    <a href="#modules" class="btn btn-primary">Start Learning</a>
                    <a href="#projects" class="btn btn-ghost">View Projects</a>
                    <a href="ai_chat/index.php" class="btn btn-outline">AI Expert Chat</a>
                    <a href="gasergy/get.php" class="btn btn-ghost">⚡ Get Gasergy</a>
                </div>
                <div class="hero-card hero-benefits">
                    <div class="row">
                        <span class="chip"><span class="dot"></span> Guided curriculum</span>
                        <span class="chip">Interactive practice</span>
                        <span class="chip">AI companion ready</span>
                    </div>
                    <div class="row subtle">Inspired by SRN’s polished network — fast, friendly, and ready for serious builders.</div>
                </div>
            </div>
            <aside>
                <div class="hero-card">
                    <div class="row">
                        <div class="avatar" aria-hidden="true">HM</div>
                        <div>
                            <strong>HTML Master</strong><br>
                            <small class="subtle">Your markup co-pilot</small>
                        </div>
                    </div>
                    <div class="row subtle">“Course + AI companion”</div>
                    <div class="cta-row">
                        <a class="btn btn-primary" href="ai_chat/index.php">Chat with the tutor</a>
                        <a class="btn btn-ghost" href="gasergy/get.php">⚡ Gasergy credits</a>
                    </div>
                    <div class="row subtle">Stay in flow with curated lessons and quick answers whenever you need them.</div>
                </div>
            </aside>
        </div>
    </section>
    
    <section id="course-overview" class="section course-overview">
        <div class="container">
            <div class="section-title">
                <h2>Course Overview</h2>
                <p>Everything you need to become proficient in HTML</p>
            </div>
            
            <div class="features">
                <div class="feature">
                    <div class="feature-icon">📚</div>
                    <h3>Comprehensive Curriculum</h3>
                    <p>20 detailed lessons covering all aspects of HTML from basic to advanced concepts, ensuring a complete understanding of the language.</p>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">💻</div>
                    <h3>Interactive Learning</h3>
                    <p>Learn by doing with built-in code editors, live previews, and interactive exercises that reinforce your understanding.</p>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">🏆</div>
                    <h3>Real-World Projects</h3>
                    <p>Apply your knowledge by building practical projects that prepare you for real-world web development challenges.</p>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">🤖</div>
                    <h3>AI HTML Master Assistant</h3>
                    <p>Get personalized, real-time, 24 hour tutoring from an AI master at HTML.</p>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">🔍</div>
                    <h3>Knowledge Checks</h3>
                    <p>Reinforce your learning with quizzes and assessments that test your understanding of key concepts.</p>
                </div>
                
                <div class="feature">
                    <div class="feature-icon">🌐</div>
                    <h3>Modern HTML5 Focus</h3>
                    <p>Learn the latest HTML5 features, APIs, and best practices used in modern web development.</p>
                </div>
            </div>
        </div>
    </section>
    
    <section id="modules" class="section modules">
        <div class="container">
            <div class="section-title">
                <h2>Course Modules</h2>
                <p>A structured learning path from fundamentals to advanced concepts</p>
            </div>
            
            <div class="module-grid">
                <div class="module-card">
                    <div class="module-header">
                        <h3>HTML Basics</h3>
                    </div>
                    <div class="module-content">
                        <p>Learn the fundamental building blocks of HTML and create your first web pages.</p>
                        <ul class="lesson-list">
                            <li><a href="basics/01_introduction.html">Introduction to HTML</a></li>
                            <li><a href="basics/02_document_structure.html">HTML Document Structure</a></li>
                            <li><a href="basics/03_text_elements.html">Text Elements</a></li>
                            <li><a href="basics/04_links.html">Links and Navigation</a></li>
                            <li><a href="basics/05_images.html">Images and Multimedia</a></li>
                            <li><a href="basics/06_lists.html">Lists</a></li>
                            <li><a href="basics/07_tables.html">Tables</a></li>
                            <li><a href="basics/08_forms.html">Forms</a></li>
                        </ul>
                        <a href="basics/01_introduction.html" class="btn btn-outline">Start Module</a>
                    </div>
                </div>
                
                <div class="module-card">
                    <div class="module-header">
                        <h3>Intermediate HTML</h3>
                    </div>
                    <div class="module-content">
                        <p>Expand your HTML knowledge with more advanced elements and techniques.</p>
                        <ul class="lesson-list">
                            <li><a href="intermediate/01_semantic_elements.php">HTML5 Semantic Elements</a></li>
                            <li><a href="intermediate/02_metadata.php">Metadata and Document Head</a></li>
                            <li><a href="intermediate/03_accessibility.php">Accessibility Best Practices</a></li>
                            <li><a href="intermediate/04_character_entities.php">Character Entities</a></li>
                            <li><a href="intermediate/05_embedding_content.php">Embedding Content</a></li>
                            <li><a href="intermediate/06_advanced_forms.php">Advanced Forms</a></li>
                        </ul>
                        <a href="intermediate/01_semantic_elements.php" class="btn btn-outline">Start Module</a>
                    </div>
                </div>
                
                <div class="module-card">
                    <div class="module-header">
                        <h3>Advanced HTML</h3>
                    </div>
                    <div class="module-content">
                        <p>Master advanced HTML concepts and modern web development techniques.</p>
                        <ul class="lesson-list">
                            <li><a href="advanced/01_html5_apis.php">HTML5 APIs and Features</a></li>
                            <li><a href="advanced/02_canvas_svg.php">Canvas and SVG</a></li>
                            <li><a href="advanced/03_web_components.php">Web Components</a></li>
                            <li><a href="advanced/04_microdata.php">Microdata and Structured Data</a></li>
                            <li><a href="advanced/05_performance_optimization.php">Performance Optimization</a></li>
                            <li><a href="advanced/06_integration.php">Integration with CSS and JavaScript</a></li>
                        </ul>
                        <a href="advanced/01_html5_apis.php" class="btn btn-outline">Start Module</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- <section id="progress" class="progress-section">
        <div class="container">
            <div class="section-title">
                <h2>Your Progress</h2>
                <p>Track your learning journey through the course</p>
            </div>
            
            <div class="progress-tracker">
                <div class="progress-header">
                    <h3>Course Progress</h3>
                    <button class="btn btn-outline" onclick="resetProgress()">Reset Progress</button>
                </div>
                
                <div class="progress-stats">
                    <div class="stat-box">
                        <div class="stat-value" id="completed-lessons">0</div>
                        <div class="stat-label">Lessons Completed</div>
                    </div>
                    
                    <div class="stat-box">
                        <div class="stat-value" id="completion-percentage">0%</div>
                        <div class="stat-label">Course Completion</div>
                    </div>
                    
                    <div class="stat-box">
                        <div class="stat-value" id="quiz-score">0%</div>
                        <div class="stat-label">Quiz Average</div>
                    </div>
                </div>
                
                <div class="module-progress">
                    <h4>HTML Basics <span id="basics-progress">0/8 completed</span></h4>
                    <div class="progress-bar">
                        <div class="progress-value" id="basics-progress-bar" style="width: 0%;"></div>
                    </div>
                </div>
                
                <div class="module-progress">
                    <h4>Intermediate HTML <span id="intermediate-progress">0/6 completed</span></h4>
                    <div class="progress-bar">
                        <div class="progress-value" id="intermediate-progress-bar" style="width: 0%;"></div>
                    </div>
                </div>
                
                <div class="module-progress">
                    <h4>Advanced HTML <span id="advanced-progress">0/6 completed</span></h4>
                    <div class="progress-bar">
                        <div class="progress-value" id="advanced-progress-bar" style="width: 0%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    
    <section id="projects" class="section projects">
        <div class="container">
            <div class="section-title">
                <h2>Practice Projects</h2>
                <p>Apply your HTML skills with these real-world projects</p>
            </div>
            
            <div class="project-grid">
                <div class="project-card">
                    <div class="project-image">
                        <img src="assets/images/ProfileDesign.png" alt="Personal Portfolio">
                    </div>
                    <div class="project-content">
                        <h3>Personal Portfolio</h3>
                        <p>Create a responsive personal portfolio website to showcase your skills and projects.</p>
                        <div class="project-tags">
                            <span class="tag">HTML5</span>
                            <span class="tag">Semantic HTML</span>
                            <span class="tag">Responsive Design</span>
                        </div>
                        <button class="btn btn-outline" onclick="openProjectModal('portfolio')">View Project</button>
                    </div>
                </div>
                
                <div class="project-card">
                    <div class="project-image">
                        <img src="assets/images/LayoutDesign.png" alt="Blog Template">
                    </div>
                    <div class="project-content">
                        <h3>Blog Template</h3>
                        <p>Build a blog template with proper semantic structure and accessibility features.</p>
                        <div class="project-tags">
                            <span class="tag">Semantic HTML</span>
                            <span class="tag">Accessibility</span>
                            <span class="tag">Forms</span>
                        </div>
                        <button class="btn btn-outline" onclick="openProjectModal('blog')">View Project</button>
                    </div>
                </div>
                
                <div class="project-card">
                    <div class="project-image">
                        <img src="assets/images/E-commerce.png" alt="E-commerce Product Page">
                    </div>
                    <div class="project-content">
                        <h3>E-commerce Product Page</h3>
                        <p>Create a product page with structured data, image gallery, and interactive elements.</p>
                        <div class="project-tags">
                            <span class="tag">Microdata</span>
                            <span class="tag">HTML5 APIs</span>
                            <span class="tag">Forms</span>
                        </div>
                        <button class="btn btn-outline" onclick="openProjectModal('ecommerce')">View Project</button>
                    </div>
                </div>
                
                <div class="project-card">
                    <div class="project-image">
                        <img src="assets/images/Dashboard.png" alt="Interactive Dashboard">
                    </div>
                    <div class="project-content">
                        <h3>Interactive Dashboard</h3>
                        <p>Build a dashboard with interactive charts using Canvas and SVG elements.</p>
                        <div class="project-tags">
                            <span class="tag">Canvas</span>
                            <span class="tag">SVG</span>
                            <span class="tag">HTML5 APIs</span>
                        </div>
                        <button class="btn btn-outline" onclick="openProjectModal('dashboard')">View Project</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-blurb">
                    <strong>HTML Master</strong>
                    <span class="subtle">SRN-inspired curriculum and AI companion for modern builders.</span>
                </div>
                <div class="footer-links">
                    <a href="ai_chat/index.php">AI Expert Chat</a>
                    <a href="gasergy/get.php">Gasergy</a>
                    <a href="auth-system/login.html">Login</a>
                </div>
            </div>
            <div class="footer-meta subtle">© <?php echo date('Y'); ?> HTML Master Course. All rights reserved.</div>
        </div>
    </footer>
    
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
            <a href="projects/portfolio_template.html" class="btn btn-primary" download>Download Project Template</a>
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
            <a href="projects/blog_template.html" class="btn btn-primary" download>Download Project Template</a>
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
            <a href="projects/ecommerce_template.html" class="btn btn-primary" download>Download Project Template</a>
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
            <a href="projects/dashboard_template.html" class="btn btn-primary" download>Download Project Template</a>
        </div>
    </div>
    
    <!-- Removed legacy progress tracking and modal functions -->
    <link href="https://cdn.jsdelivr.net/gh/jakins177/Chat1@latest/dist/chatkit.css" rel="stylesheet" />

    <style>
        :root {
            --chatkit-color-primary: #00C897;
            --chatkit-color-primary-50: #00b089;
            --chatkit-color-primary-100: #009777;
            --chatkit-color-secondary: #00796B;
            --chatkit-color-secondary-50: #00695C;
            --chatkit-surface: #f0f8ff;
            --chatkit-text-dark: #1a1a1a;
            --chatkit-message-bot-background: #ffffff;
            --chatkit-message-bot-color: #222;
            --chatkit-message-user-background: var(--chatkit-color-secondary);
            --chatkit-message-user-color: #ffffff;
            --chatkit-toggle-background: var(--chatkit-color-primary);
            --chatkit-toggle-hover-background: var(--chatkit-color-primary-50);
            --chatkit-toggle-active-background: var(--chatkit-color-primary-100);
            --chatkit-font-family: 'Segoe UI', sans-serif;

            /* Fallbacks for legacy variables until ChatKit adopts the new tokens */
            --chat--color-primary: var(--chatkit-color-primary);
            --chat--color-primary-shade-50: var(--chatkit-color-primary-50);
            --chat--color-primary-shade-100: var(--chatkit-color-primary-100);
            --chat--color-secondary: var(--chatkit-color-secondary);
            --chat--color-secondary-shade-50: var(--chatkit-color-secondary-50);
            --chat--color-light: var(--chatkit-surface);
            --chat--color-dark: var(--chatkit-text-dark);
            --chat--message--bot--background: var(--chatkit-message-bot-background);
            --chat--message--bot--color: var(--chatkit-message-bot-color);
            --chat--message--user--background: var(--chatkit-message-user-background);
            --chat--message--user--color: var(--chatkit-message-user-color);
            --chat--toggle--background: var(--chatkit-toggle-background);
            --chat--toggle--hover--background: var(--chatkit-toggle-hover-background);
            --chat--toggle--active--background: var(--chatkit-toggle-active-background);
            --chat--font-family: var(--chatkit-font-family);
        }

        #chatkit-root {
            font-family: var(--chatkit-font-family);
        }
    </style>

   <div id="chatkit-root" class="chatkit-container"></div>
    <script src="assets/js/main-scripts.js"></script>
    <script type="module" src="assets/js/chat-logic.js"></script>
    <script type="module">
      import { initializeChatKit } from './assets/js/chat-logic.js';

      document.addEventListener('DOMContentLoaded', () => {
        // Initialize main scripts (like progress tracking) if it has its own init function,
        // or ensure it runs on DOMContentLoaded from within main-scripts.js itself.
        // For chat:
        initializeChatKit({
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
          target: '#chatkit-root', // Target for index.php
          mode: 'popup', // Default mode
          autoOpen: false,
          hideToggle: false,
          gasergy: {
            fetchPath: 'gasergy/decrease_gasergy.php', // Path for index.php
            balanceDisplaySelector: '#gasergy-balance-display', // Selector for balance display
            refillPath: 'gasergy/get.php',
            balancePath: 'gasergy/get_balance.php'
          }
        });
      });
    </script>
</body>
</html>
