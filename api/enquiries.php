<?php
/**
 * Enquiry submission endpoint (replaces FastAPI POST /api/enquiries).
 * Accepts JSON or form-encoded POST, validates fields, logs to data/enquiries.json,
 * and sends an email notification via PHP mail() on cPanel.
 */
require_once __DIR__ . '/../includes/config.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(['message' => 'Primetech Industries API']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
    exit;
}

$raw = file_get_contents('php://input');
$data = json_decode($raw ?: '', true);
if (!is_array($data)) {
    $data = $_POST;
}

$clean = static function ($v): string {
    return trim(preg_replace('/\s+/', ' ', (string) ($v ?? '')));
};

$name = $clean($data['name'] ?? '');
$company = $clean($data['company'] ?? '');
$email = trim((string) ($data['email'] ?? ''));
$phone = $clean($data['phone'] ?? '');
$country = $clean($data['country'] ?? '');
$product = $clean($data['product'] ?? '');
$message = trim((string) ($data['message'] ?? ''));

$errors = [];
if (mb_strlen($name) < 2 || mb_strlen($name) > 120) {
    $errors['name'] = 'Please enter your full name.';
}
if (mb_strlen($company) > 160) {
    $errors['company'] = 'Company name is too long.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address.';
}
if (mb_strlen($phone) < 6 || mb_strlen($phone) > 30 || !preg_match('/^[0-9+()\-\s.]+$/', $phone)) {
    $errors['phone'] = 'Please enter a valid phone number.';
}
if (mb_strlen($country) < 2 || mb_strlen($country) > 80) {
    $errors['country'] = 'Please select your country.';
}
if (mb_strlen($product) < 2 || mb_strlen($product) > 120) {
    $errors['product'] = 'Please select a product.';
}
if (mb_strlen($message) < 10 || mb_strlen($message) > 4000) {
    $errors['message'] = 'Please describe your requirement (min. 10 characters).';
}

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'errors' => $errors]);
    exit;
}

$id = bin2hex(random_bytes(12));
$record = [
    'id' => $id,
    'name' => $name,
    'company' => $company,
    'email' => $email,
    'phone' => $phone,
    'country' => $country,
    'product' => $product,
    'message' => $message,
    'created_at' => gmdate('c'),
    'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
];

$dataDir = __DIR__ . '/../data';
if (!is_dir($dataDir)) {
    @mkdir($dataDir, 0755, true);
}

$jsonFile = $dataDir . '/enquiries.json';
$existing = [];
if (file_exists($jsonFile)) {
    $decoded = json_decode((string) file_get_contents($jsonFile), true);
    if (is_array($decoded)) {
        $existing = $decoded;
    }
}
$existing[] = $record;
@file_put_contents($jsonFile, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);

// Send email notification (cPanel PHP mail)
$subject = 'New Website Enquiry: ' . $product . ' — ' . $name;
$bodyLines = [
    '<h2>New Enquiry from Primetech Industries Website</h2>',
    '<table cellpadding="8" cellspacing="0" border="1" style="border-collapse:collapse;font-family:Arial,sans-serif;font-size:14px;">',
    '<tr><td><strong>Name</strong></td><td>' . e($name) . '</td></tr>',
    '<tr><td><strong>Company</strong></td><td>' . e($company ?: '-') . '</td></tr>',
    '<tr><td><strong>Email</strong></td><td>' . e($email) . '</td></tr>',
    '<tr><td><strong>Phone</strong></td><td>' . e($phone) . '</td></tr>',
    '<tr><td><strong>Country</strong></td><td>' . e($country) . '</td></tr>',
    '<tr><td><strong>Product</strong></td><td>' . e($product) . '</td></tr>',
    '<tr><td><strong>Message</strong></td><td>' . nl2br(e($message)) . '</td></tr>',
    '<tr><td><strong>Submitted At (UTC)</strong></td><td>' . e($record['created_at']) . '</td></tr>',
    '</table>',
];
$headers = [
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=UTF-8',
    'From: ' . ENQUIRY_FROM_NAME . ' <' . ENQUIRY_FROM_EMAIL . '>',
    'Reply-To: ' . $name . ' <' . $email . '>',
];

@mail(ENQUIRY_TO_EMAIL, $subject, implode("\r\n", $bodyLines), implode("\r\n", $headers));

http_response_code(201);
echo json_encode(['ok' => true, 'id' => $id]);
