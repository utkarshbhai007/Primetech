<?php
/**
 * Site configuration for Primetech Industries (PHP / cPanel).
 */

define('SITE_NAME', 'Primetech Industries');
define('SITE_DEFAULT_TITLE', 'Plastic Processing Machinery Manufacturers, Exporters in India at Ahmedabad | Primetech Industries');
define('SITE_DEFAULT_DESC', 'Primetech is one of the leading Plastic Processing Machinery (Equipments) Manufacturers in India at Ahmedabad that manufactured High Speed Mixer, Granulators, Pulverizer, Spiral Conveyor, Screw Conveyor, Gyro Vibrating Screen. Also we Export of Plastic Processing Machinery (Equipments) all over the world.');

// Base path if hosted in a subdirectory (leave '' for domain root on cPanel)
if (!defined('BASE_PATH')) {
    define('BASE_PATH', '');
}

// Enquiry email settings (used by api/enquiries.php)
define('ENQUIRY_TO_EMAIL', 'siddharth@primetechmixer.com, naren@primetechmixer.com');
define('ENQUIRY_FROM_EMAIL', 'noreply@primetechmixer.com');
define('ENQUIRY_FROM_NAME', 'Primetech Industries Website');

/**
 * Build an application URL relative to BASE_PATH.
 */
function url(string $path = '/'): string
{
    if (preg_match('#^(https?://|mailto:|tel:)#i', $path)) {
        return $path;
    }
    $path = '/' . ltrim($path, '/');
    return BASE_PATH . $path;
}

/**
 * HTML escape helper.
 */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
