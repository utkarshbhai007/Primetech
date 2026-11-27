<?php
/**
 * Local router for PHP built-in server:
 *   php -S localhost:8000 router.php
 */
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$file = __DIR__ . $uri;

// Serve existing static files directly (except /data/)
if ($uri !== '/' && strpos($uri, '/data/') !== 0 && is_file($file)) {
    return false;
}

// Redirects
if ($uri === '/about' || $uri === '/about/' || $uri === '/the-company' || $uri === '/the-company/') {
    header('Location: /the-company/about-us', true, 301);
    exit;
}
if ($uri === '/products/mixer/high-speed-mixer' || $uri === '/products/mixer/high-speed-mixer/') {
    header('Location: /products/high-speed-mixer', true, 301);
    exit;
}

$trimmed = rtrim($uri, '/') ?: '/';

switch ($trimmed) {
    case '/':
        require __DIR__ . '/index.php';
        break;
    case '/the-company/about-us':
    case '/about-us':
        require __DIR__ . '/page-about-us.php';
        break;
    case '/products':
        require __DIR__ . '/page-products.php';
        break;
    case '/applications':
        require __DIR__ . '/page-applications.php';
        break;
    case '/infrastructure':
        require __DIR__ . '/page-infrastructure.php';
        break;
    case '/why-primetech':
        header('Location: /the-company/about-us#why-primetech', true, 301);
        exit;
    case '/downloads':
        require __DIR__ . '/page-downloads.php';
        break;
    case '/contact':
    case '/enquiry':
        require __DIR__ . '/page-contact.php';
        break;
    case '/api/enquiries':
        require __DIR__ . '/api/enquiries.php';
        break;
    default:
        if (preg_match('#^/products/([^/]+)$#', $trimmed, $m)) {
            $_GET['slug'] = $m[1];
            require __DIR__ . '/page-product-detail.php';
        } else {
            require __DIR__ . '/404.php';
        }
        break;
}
