<?php
include('./includes/include.inc.php');

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);
    exit;
}

$name = isset($_POST['lead_name']) ? trim($_POST['lead_name']) : '';
$email = isset($_POST['lead_email']) ? trim($_POST['lead_email']) : '';
$phone = isset($_POST['lead_phone']) ? trim($_POST['lead_phone']) : '';
$company = isset($_POST['lead_company']) ? trim($_POST['lead_company']) : '';
$brochureTitle = isset($_POST['lead_brochure']) ? trim($_POST['lead_brochure']) : 'Product Brochure';
$brochureFile = isset($_POST['lead_file']) ? trim($_POST['lead_file']) : '';

// Validation
$errors = [];
if (empty($name) || strlen($name) < 2) {
    $errors[] = 'Please provide your full name.';
}   
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please provide a valid email address.';
}
if (empty($phone) || strlen(preg_replace('/[^0-9]/', '', $phone)) < 7) {
    $errors[] = 'Please provide a valid phone/mobile number.';
}

// Brochure file mapping
$brochureFileMap = [
    'heater-cooler-mixer' => 'pdf/corporate.pdf',
    'high-speed-mixer' => 'pdf/corporate.pdf',
    'cooler-mixer' => 'pdf/mixer.pdf',
    'horizontal-cooler' => 'pdf/horizontal-cooler.pdf',
    'laboratory-mixer' => 'pdf/laboratory-mixer.pdf',
    'pulverizer' => 'pdf/pulverizer.pdf',
    'spiral-conveyor' => 'pdf/spiral-conveyor.pdf',
    'screw-conveyor' => 'pdf/screw-conveyor.pdf',
    'rotary-air-lock-valve' => 'pdf/rotary-air-lock-valve.pdf',
    'gyro-vibrating-sieve' => 'pdf/gyro-vibrating-sieve.pdf',
    'granulator' => 'pdf/granulator.pdf',
    'shredder' => 'pdf/shredder.pdf',
    'corporate' => 'pdf/corporate.pdf',
];

if (empty($brochureFile)) {
    $key = isset($_POST['brochure_key']) ? trim($_POST['brochure_key']) : '';
    if (isset($brochureFileMap[$key])) {
        $brochureFile = $GLBHost . $brochureFileMap[$key];
    } else {
        $brochureFile = $GLBHost . 'pdf/corporate.pdf';
    }
}

if (!empty($errors)) {
    echo json_encode([
        'success' => false,
        'message' => implode(' ', $errors)
    ]);
    exit;
}

// Format Email HTML Notification
$logoUrl = $GLBHost . 'images/logo.jpg';
$ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
$timestamp = date('Y-m-d H:i:s T');

$emailBody = '<table width="560" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #780f12; font-family: Arial, sans-serif; font-size:12px; color:#2d303a; margin: 0 auto; background:#fff;">';
$emailBody .= '<tr><td align="center" valign="top" style="padding:15px; border-bottom:2px solid #780f12; background:#fafafa;"><img src="' . $logoUrl . '" border="0" style="height: 70px; max-width: 100%;" alt="Primetech Industries" /></td></tr>';
$emailBody .= '<tr><td align="center" valign="middle" height="36" style="background:#ad171e; color:#ffffff; text-transform:uppercase; font-weight:bold; font-size:14px; letter-spacing:0.5px;">New Brochure Download Request</td></tr>';
$emailBody .= '<tr><td style="padding:20px;">';
$emailBody .= '<p style="font-size:13px; margin:0 0 15px; color:#333;">A visitor has requested to download a product brochure from the Primetech website:</p>';
$emailBody .= '<table width="100%" border="0" cellpadding="8" cellspacing="0" style="font-size:12px; border-collapse:collapse;">';
$emailBody .= '<tr style="background:#f4f4f4;"><td width="35%" style="font-weight:bold; color:#780f12; border:1px solid #e0e0e0;">Brochure Requested</td><td style="font-weight:bold; border:1px solid #e0e0e0;">' . htmlspecialchars($brochureTitle) . '</td></tr>';
$emailBody .= '<tr><td style="font-weight:bold; color:#780f12; border:1px solid #e0e0e0;">Full Name</td><td style="border:1px solid #e0e0e0;">' . htmlspecialchars($name) . '</td></tr>';
$emailBody .= '<tr style="background:#f4f4f4;"><td style="font-weight:bold; color:#780f12; border:1px solid #e0e0e0;">Email Address</td><td style="border:1px solid #e0e0e0;"><a href="mailto:' . htmlspecialchars($email) . '">' . htmlspecialchars($email) . '</a></td></tr>';
$emailBody .= '<tr><td style="font-weight:bold; color:#780f12; border:1px solid #e0e0e0;">Phone / Mobile</td><td style="border:1px solid #e0e0e0;"><a href="tel:' . htmlspecialchars($phone) . '">' . htmlspecialchars($phone) . '</a></td></tr>';
$emailBody .= '<tr style="background:#f4f4f4;"><td style="font-weight:bold; color:#780f12; border:1px solid #e0e0e0;">Company Name</td><td style="border:1px solid #e0e0e0;">' . (!empty($company) ? htmlspecialchars($company) : '<em>Not specified</em>') . '</td></tr>';
$emailBody .= '<tr><td style="font-weight:bold; color:#780f12; border:1px solid #e0e0e0;">Download URL</td><td style="border:1px solid #e0e0e0;"><a href="' . htmlspecialchars($brochureFile) . '" target="_blank">' . htmlspecialchars($brochureFile) . '</a></td></tr>';
$emailBody .= '<tr style="background:#f4f4f4;"><td style="font-weight:bold; color:#780f12; border:1px solid #e0e0e0;">Date & Time</td><td style="border:1px solid #e0e0e0;">' . $timestamp . '</td></tr>';
$emailBody .= '<tr><td style="font-weight:bold; color:#780f12; border:1px solid #e0e0e0;">IP Address</td><td style="border:1px solid #e0e0e0;">' . htmlspecialchars($ipAddress) . '</td></tr>';
$emailBody .= '</table></td></tr>';
$emailBody .= '<tr><td style="padding:12px; background:#f5f5f5; font-size:11px; color:#777; text-align:center; border-top:1px solid #eee;">This is an automated inquiry from the brochure download system at Primetech Industries.</td></tr>';
$emailBody .= '</table>';

// Log lead capture entry
$logEntry = date('Y-m-d H:i:s') . " | Lead: " . $name . " | Email: " . $email . " | Phone: " . $phone . " | Company: " . $company . " | Brochure: " . $brochureTitle . " (" . $brochureFile . ")\n";
@file_put_contents(__DIR__ . '/lead_submissions.log', $logEntry, FILE_APPEND);

// Check if running on localhost
$isLocalhost = (isset($_SERVER['HTTP_HOST']) && (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false));

// Send Email (in production or if mail server is present)
$targetEmail = 'Marketing-3@primetechmixer.com';
$emailSubject = 'Brochure Download Request: ' . $brochureTitle . ' - ' . $name;

if (!$isLocalhost) {
    // Try sending with PHPMailer or mail()
    @include_once('./classes/PHPMailer.php');
    $mailSent = false;

    if (class_exists('PHPMailer')) {
        try {
            $mail = new PHPMailer();
            $mail->setHTML(true);
            $mail->setFromName('Primetech Brochure Lead');
            $mail->setFromEmail('naren@primetechmixer.com');
            $mail->setMessage($emailBody);
            $mail->setSubject($emailSubject);
            $mail->addAddress($targetEmail, 'Primetech Marketing');
            $mail->addAddress('siddharth@primetechmixer.com', 'Siddharth Patel');
            $mail->addReplyTo($email, $name);
            $mail->setMailer(PHPMailer::MAILER_Mail);
            $mailSent = @$mail->send();
        } catch (Exception $e) {
            $mailSent = false;
        }
    }

    if (!$mailSent) {
        $headers = "From: Primetech Industries <naren@primetechmixer.com>\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Cc: siddharth@primetechmixer.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        @mail($targetEmail, $emailSubject, $emailBody, $headers);
    }
}


// Set session flag so user is verified for brochure downloads
if (session_status() == PHP_SESSION_NONE) {
    @session_start();
}
$_SESSION['brochure_lead_verified'] = true;
$_SESSION['brochure_lead_name'] = $name;
$_SESSION['brochure_lead_email'] = $email;
$_SESSION['brochure_lead_phone'] = $phone;
$_SESSION['brochure_lead_company'] = $company;

echo json_encode([
    'success' => true,
    'message' => 'Thank you, ' . htmlspecialchars($name) . '! Your download will start now.',
    'downloadUrl' => $brochureFile
]);
exit;
