<?php
// router.php for PHP built-in web server

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$file = __DIR__ . $uri;

// If the requested URI corresponds to an existing physical file, serve it directly
if ($uri !== '/' && file_exists($file) && !is_dir($file)) {
    return false;
}

// Clean trailing slashes or normalize
$path = trim($uri, '/');

// Match captcha rewrite rule: RewriteRule ^captcha/([^/]+) generatecaptcha.php?pg=$1 [NC]
if (preg_match('#^captcha/([^/]+)$#i', $path, $matches)) {
    $_GET['pg'] = $matches[1];
    require __DIR__ . '/generatecaptcha.php';
    exit;
}

// Rewrite rules from .htaccess
$routes = [
    'the-company/about-us' => 'page-about-us.php',
    'the-company/why-primetech' => 'page-about-us.php',
    'the-company/quality-achievements' => 'page-about-us.php',
    'about-us' => 'page-about-us.php',
    'why-primetech' => 'page-about-us.php',
    'quality-achievements' => 'page-about-us.php',
    'products/mixer/high-speed-mixer' => 'page-high-speed-mixer.php',
    'products/mixer/cooler-mixer' => 'page-cooler-mixer.php',
    'products/high-speed-heater-cooler-mixer' => 'page-high-speed-heater-cooler-mixer.php',
    'products/high-speed-mixer' => 'page-high-speed-mixer.php',
    'products/gyro-vibrating-screen' => 'page-gyro-vibrating-screen.php',
    'products/lab-mixer' => 'page-lab-mixer.php',
    'products/horizontal-cooler' => 'page-horizontal-cooler.php',
    'products/rotary-air-lock-valve' => 'page-rotary-air-lock-valve.php',
    'products/screw-conveyor' => 'page-screw-conveyor.php',
    'products/pulverizer' => 'page-pulverizer.php',
    'products/granulators' => 'page-granulator.php',
    'products/shredder' => 'page-shredder.php',
    'products/spiral-conveyor' => 'page-spiral-conveyor.php',
    'products/mixing-plant-automation' => 'page-mixing-plant-automation.php',
    'products' => 'page-products.php',
    'infrastructure' => 'page-infrastructure.php',
    'enquiry' => 'page-enquiry.php',
    'contact' => 'page-contact.php',
    'downloads' => 'page-downloads.php',
    '' => 'index.php',
];

if (isset($routes[$path])) {
    require __DIR__ . '/' . $routes[$path];
    exit;
}

// Check if direct file exists
if (file_exists(__DIR__ . '/' . $path) && is_file(__DIR__ . '/' . $path)) {
    require __DIR__ . '/' . $path;
    exit;
}

if (file_exists(__DIR__ . '/' . $path . '.php')) {
    require __DIR__ . '/' . $path . '.php';
    exit;
}

// Fallback to index.php
require __DIR__ . '/index.php';
