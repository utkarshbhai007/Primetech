<?php

session_start();
error_reporting(0);

include("./classes/Filter.php");
include("./classes/Captcha.php");

if (isset($_GET["pg"]))
    $vPage = trim($_GET["pg"]);

$objCaptcha = new Captcha();

$_SESSION[$vPage . '_captcha'] = $objCaptcha->getCaptchaString();
?>