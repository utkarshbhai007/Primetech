<?php
http_response_code(404);
$pageTitle = 'Page not found';
require_once __DIR__ . '/includes/header.php';

$actions = '<div class="mt-10 flex flex-wrap gap-3">'
    . render_btn(['to' => '/', 'label' => 'Back to Home', 'class' => 'min-w-[185px]', 'testid' => 'nf-home'])
    . render_btn(['to' => '/products', 'label' => 'View Products', 'variant' => 'outline-light', 'class' => 'min-w-[185px]', 'testid' => 'nf-products'])
    . '</div>';

echo render_page_hero([
    'lines' => ['This page has', 'moved on.'],
    'intro' => "The page you are looking for doesn't exist. Explore our products or head back home.",
    'children' => $actions,
    'testid' => 'not-found',
]);

require_once __DIR__ . '/includes/footer.php';
