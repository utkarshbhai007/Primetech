<?php

error_reporting(0);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!empty($_GET) && is_array($_GET))
    recurse_escape_mysql($_GET);
if (!empty($_POST) && is_array($_POST))
    recurse_escape_mysql($_POST);
if (!empty($_COOKIE) && is_array($_COOKIE))
    recurse_escape_mysql($_COOKIE);

$GLBRoot = dirname(__DIR__) . '/';
include_once($GLBRoot . "classes/Error.php");
include_once($GLBRoot . "classes/Common.php");

$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
if ($scriptDir === '/' || $scriptDir === '.' || $scriptDir === '') {
    $basePath = '/';
} else {
    $basePath = '/' . trim($scriptDir, '/') . '/';
}
$GLBHost = '//' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . $basePath;

$rURL = "";
$sURL = $_SERVER['PHP_SELF'] ?? '';
if (isset($_POST["rURL"]))
    $rURL = $_POST["rURL"];
elseif (isset($_GET["rURL"]))
    $rURL = urldecode($_GET["rURL"]);

if ($rURL == "" && isset($_SERVER['HTTP_REFERER']))
    $rURL = $_SERVER['HTTP_REFERER'];
if ($rURL == "")
    $rURL = "main.php";

function setReferer() {
    if (isset($_SERVER['HTTP_REFERER']))
        $rURL = $_SERVER['HTTP_REFERER'];
    if ($rURL = "")
        $rURL = "main.php";
}

function getURLParameters($pOmit) {
    $vURL = "";
    foreach ($_GET as $vKey => $vVal)
        if (strpos(",$pOmit,", ",$vKey,") === false)
            $vURL .= "&$vKey=$vVal";
    return $vURL;
}

function recurse_escape_mysql(&$var, $key = NULL) {
    if (function_exists('array_walk_recursive')) {
        if (is_array($var)) {
            array_walk_recursive($var, 'recurse_escape_mysql');
        } else {
            if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
                $var = stripslashes($var);
            }

            $var = strip_tags($var, '<p><b><u><i><strong><sup><sub><ol><ul><li><del><br><br/><img><table><tbody><tr><td><strong><a><h1><h2><h3><h4><h5><span><font><div>');
        }
    } else {
        if (is_array($var)) {
            $var = array_map('recurse_escape_mysql', $var);
        } else {
            if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
                $var = stripslashes($var);
            }

            $var = strip_tags($var, '<p><b><u><i><strong><sup><sub><ol><ul><li><del><br><br/><img><table><tbody><tr><td><strong><a><h1><h2><h3><h4><h5><span><font><div>');
        }
        return $var;
    }
}

?>