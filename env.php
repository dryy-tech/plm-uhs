<?php
// ============================================================
// UHS - .env Loader
// File: includes/env.php
// ============================================================

function load_env(string $path): void
{
    if (!file_exists($path)) {
        error_log('[ENV] .env file not found at: ' . $path);
        return; // Don't die — fallbacks in db.php will handle it
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Skip comments
        if (str_starts_with(trim($line), '#')) {
            continue;
        }

        // Must contain =
        if (!str_contains($line, '=')) {
            continue;
        }

        [$key, $value] = explode('=', $line, 2);

        $key   = trim($key);
        $value = trim($value);

        // Strip surrounding quotes
        if (
            (str_starts_with($value, '"') && str_ends_with($value, '"')) ||
            (str_starts_with($value, "'") && str_ends_with($value, "'"))
        ) {
            $value = substr($value, 1, -1);
        }

        // Always overwrite so .env changes take effect
        putenv("{$key}={$value}");
        $_ENV[$key] = $value;
    }
}

// Try multiple possible root locations for the .env file
$possible_paths = [
    dirname(__DIR__) . '/.env',          // one level up from includes/
    dirname(__DIR__, 2) . '/.env',       // two levels up
    dirname(__DIR__, 3) . '/.env',       // three levels up
    'C:/xampp/htdocs/plm_uhs/.env',     // absolute XAMPP path fallback
];

$loaded = false;
foreach ($possible_paths as $path) {
    if (file_exists($path)) {
        load_env($path);
        $loaded = true;
        break;
    }
}

if (!$loaded) {
    error_log('[ENV] Could not locate .env file. Using hardcoded fallbacks in db.php.');
}