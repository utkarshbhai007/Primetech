<?php

$vName = "";
$vEmail = "";
$vMobile = "";
$vMobileCode = "";
$vFax = "";
$vCity = "";
$vPincode = "";
$vState = "";
$vCountry = "";
$vProductsInterest = "";
$vDetails = "";
$vCaptcha = "";

$vErrorJS = "";
$vErrorDesc = "";
$vIsError = false;
$vIsPostBack = false;
$vIsMailSendError = false;
$vMailErrorDesc = "";

include("./classes/PHPMailer.php");

function getFormData() {
    global $vName, $vEmail, $vMobile, $vMobileCode, $vFax, $vCity, $vPincode, $vState, $vCountry, $vProductsInterest, $vDetails, $vCaptcha, $vIsPostBack;

    if (!$_POST) return;
    $vIsPostBack = true;

    if (isset($_POST['txtName'])) $vName = trim($_POST['txtName']);
    if (isset($_POST['txtEmail'])) $vEmail = trim($_POST['txtEmail']);
    if (isset($_POST['txtMobile'])) $vMobile = trim($_POST['txtMobile']);
    if (isset($_POST['cmbMobile'])) $vMobileCode = trim($_POST['cmbMobile']);
    if (isset($_POST['txtFax'])) $vFax = trim($_POST['txtFax']);
    if (isset($_POST['txtCity'])) $vCity = trim($_POST['txtCity']);
    if (isset($_POST['txtPincode'])) $vPincode = trim($_POST['txtPincode']);
    if (isset($_POST['txtState'])) $vState = trim($_POST['txtState']);
    if (isset($_POST['cmbCountry'])) $vCountry = trim($_POST['cmbCountry']);
    if (isset($_POST["cmbProductsInterest"])) $vProductsInterest = $_POST["cmbProductsInterest"];
    
    if (isset($_POST['txtDetails'])) $vDetails = trim($_POST['txtDetails']);
    if (isset($_POST["txtCaptcha"])) $vCaptcha = trim($_POST["txtCaptcha"]);
}

function isValidData() {
    global $vProductsInterest, $vCaptcha, $vIsError, $vErrorJS, $GLBRoot;

    include($GLBRoot . "classes/DataValidator.php");

    $objDataValidator = new DataValidator();

    $objDataValidator->addValidator("txtName", DataValidator::CONTROL_TEXTBOX, "NAME", DataValidator::DATATYPE_STRING, false, 1, 100);
    $objDataValidator->addValidator("txtEmail", DataValidator::CONTROL_TEXTBOX, "EMAIL", DataValidator::DATATYPE_EMAIL, false, 6, 100);
    $objDataValidator->addValidator("cmbMobile", DataValidator::CONTROL_COMBOBOX, "MOBILE CODE", DataValidator::DATATYPE_STRING, false, 1, 4);
    $objDataValidator->addValidator("txtMobile", DataValidator::CONTROL_TEXTBOX, "PHONE / MOBILE", DataValidator::DATATYPE_STRING, false, 7, 12);
    $objDataValidator->addValidator("txtFax", DataValidator::CONTROL_TEXTBOX, "FAX", DataValidator::DATATYPE_STRING, true, 8, 20);
    $objDataValidator->addValidator("txtCity", DataValidator::CONTROL_TEXTBOX, "CITY", DataValidator::DATATYPE_STRING, false, 1, 20);
    $objDataValidator->addValidator("txtPincode", DataValidator::CONTROL_TEXTBOX, "PINCODE", DataValidator::DATATYPE_STRING, true, 2, 20);
    //$objDataValidator->addValidator("txtState", DataValidator::CONTROL_TEXTBOX, "STATE", DataValidator::DATATYPE_STRING, true, 3, 20);
    $objDataValidator->addValidator("cmbCountry", DataValidator::CONTROL_COMBOBOX, "COUNTRY", DataValidator::DATATYPE_STRING, false, 2, 30);
    
    if(!is_array($vProductsInterest) || count($vProductsInterest) == 0) {                    
        $vIsError = true;
        $vErrorJS .= "$('#cmbProductsInterest').addClass('error').attr('data-error', 'Please select minimum 1 options');";
    }
    
    $objDataValidator->addValidator("txtDetails", DataValidator::CONTROL_TEXTBOX, "DETAILS", DataValidator::DATATYPE_STRING, false, 3, 1000);

    $vIsError = (!$objDataValidator->validateAllData());

    if ($vIsError) {
        $vValidators = $objDataValidator->getValidators();
        foreach ($vValidators as $objValidator) {
            $vErrorJS .= $objValidator->getErrorJavaScript();
        }
    }

    if ($vCaptcha != $_SESSION['enquiry_captcha']) {
        $vIsError = true;
        $vErrorJS .= "$('#txtCaptcha').addClass('error').attr('data-error', 'Invalid Captcha');";
    }

    $objDataValidator = null;
    return !$vIsError;
}

getFormData();

if ($vIsPostBack) {
    $vIsError = !isValidData();

    if (!$vIsError) {
        $result = sendMail();
        if (!$result) {
            $vIsError = true;
            $vErrorDesc = "Failed to send mail. Reason: " . $vErrorDesc;
        }
    }
}

function sendMail() {
    global $vName, $vEmail, $vMobile, $vMobileCode, $vFax, $vPincode, $vCity, $vCountry, $vState, $vProductsInterest, $vDetails, $vErrorDesc, $GLBHost;

    
    $vMessage = '<table width="450" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #780f12; font-size:11px; color:#2d303a;">';
    $vMessage .= '<tr><td align="center" valign="top" style="background-color:#FFFFFF;"><img src="http:' . $GLBHost . 'images/logo.jpg" border="0" style="padding:15px; height: 100px;" /></td></tr>';
    $vMessage .= '<tr><td align="center" valign="middle" height="30" style="background: #780f12; color: #fff; text-transform: uppercase; font-weight: bold; font-size: 13px;">Enquiry Form</td></tr>';
    $vMessage .= '<tr><td align="left" valign="top"><table width="450" border="0" cellpadding="0" cellspacing="0" align="center" style="font-size:110%; padding:10px;">';
    $vMessage .= '<tr><td align="left" valign="top" colspan="2" height="10"></td></tr>';
    $vMessage .= '<tr><td align="left" valign="top" colspan="2" style="font-size:12px; padding:5px; background:#c5cfdb; font-weight:bold; color:#780f12;">Personal Details</td></tr>';
    $vMessage .= '<tr><td align="left" valign="top" colspan="2" height="15"></td></tr>';

    $vMessage .= '<tr><td align="right" valign="top" width="35%" height="30" style="color:#780f12;">Full Name</td><td align="left" valign="top" width="65%" style="padding:0 10px;">' . $vName . '</td></tr>';
    $vMessage .= '<tr><td align="right" valign="top" height="30" style="color:#780f12;">E-mail</td><td align="left" valign="top" style="padding:0 10px;">' . $vEmail . '</td></tr>';
    $vMessage .= '<tr><td align="right" valign="top" height="30" style="color:#780f12;">Phone / Mobile</td><td align="left" valign="top" style="padding:0 10px;">+' . $vMobileCode . '-' . $vMobile . '</td></tr>';
    if ($vFax != '') $vMessage .= '<tr><td align="right" valign="top" height="30" style="color:#780f12;">Fax</td><td align="left" valign="top" style="padding:0 10px;">' . $vFax . '</td></tr>';
    $vMessage .= '<tr><td align="right" valign="top" height="30" style="color:#780f12;">City</td><td align="left" valign="top" style="padding:0 10px;">' . $vCity . '</td></tr>';
    if ($vPincode != '') $vMessage .= '<tr><td align="right" valign="top" height="30" style="color:#780f12;">Pincode</td><td align="left" valign="top" style="padding:0 10px;">' . $vPincode . '</td></tr>';
    if ($vState != '') $vMessage .= '<tr><td align="right" valign="top" height="30" style="color:#780f12;">State</td><td align="left" valign="top" style="padding:0 10px;">' . $vState . '</td></tr>';
    $vMessage .= '<tr><td align="right" valign="top" height="30" style="color:#780f12;">Country</td><td align="left" valign="top" style="padding:0 10px;">' . $vCountry . '</td></tr>';
    $vMessage .= '<tr><td align="right" valign="top" height="30" style="color:#780f12;">Product Interest</td><td align="left" valign="top" style="padding:0 10px;">' . implode(', ', $vProductsInterest) . '</td></tr>';
    $vMessage .= '<tr><td align="right" valign="top" height="30" style="color:#780f12;">Details</td><td align="left" valign="top" style="padding:0 10px;">' . $vDetails . '</td></tr>';
    $vMessage .= '<tr><td align="left" valign="top" colspan="2" height="10"></td></tr>';
    $vMessage .= '<tr><td align="left" valign="top" colspan="2" style="font-size:12px; padding:5px; background:#c5cfdb; font-weight:bold; color:#780f12;">Technical Details</td></tr>';
    $vMessage .= '<tr><td align="left" valign="top" colspan="2" height="15"></td></tr>';
    $vMessage .= '<tr><td align="right" valign="top" height="30" style="color:#780f12;">IP Address</td><td align="left" valign="top" style="padding:0 10px;">' . $_SERVER["REMOTE_ADDR"] . '</td></tr>';
    $vMessage .= '<tr><td align="right" valign="top" height="30" style="color:#780f12;">User Agent</td><td align="left" valign="top" style="padding:0 10px;">' . $_SERVER["HTTP_USER_AGENT"] . '</td></tr>';
    $vMessage .= '<tr><td align="left" valign="top" colspan="2" height="20"></td></tr>';
    $vMessage .= '</table></td></tr></table>';
    
    $objMail = new PHPMailer();

    $objMail->setHTML(true);
    $objMail->setFromName('Primetech Industries');
    $objMail->setFromEmail('naren@primetechmixer.com');
    $objMail->setMessage($vMessage);
    $objMail->setSubject('Enquiry from Primetech Industries');
    $objMail->addAddress('naren@primetechmixer.com', 'Primetech Industries');
    
    $objMail->addReplyTo($vEmail, $vName);

    $objMail->setMailer(PHPMailer::MAILER_Mail);

    $result = $objMail->send();
    $vErrorDesc = $objMail->getError();

    $objMail = null;

  $headers = "From: naren@primetechmixer.com\n";
  $headers  .= 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail('info@witsolution.in', 'Primetechmixer Inqueary Mail', $vMessage, $headers);

mail('siddharth@primetechmixer.com', 'Primetechmixer Inqueary Mail', $vMessage, $headers);

return $result;
    
    
    
}

?>