<?php
// Simple environment variable loader
// Looks for a .env file in this directory or project root and sets variables

$paths = [__DIR__ . '/.env', dirname(__DIR__) . '/.env'];
foreach ($paths as $path) {
    if (is_readable($path)) {
        foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            if (!strpos($line, '=')) {
                continue;
            }
            list($name, $value) = array_map('trim', explode('=', $line, 2));
            if ($name !== '' && getenv($name) === false) {
                putenv("{$name}={$value}");
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
        break;
    }
}

?>
