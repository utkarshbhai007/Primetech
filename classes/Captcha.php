<?php

class Captcha {

    var $vFonts;
    var $vLength;
    var $vFontPath;
    var $vCaptchaString;

    function __construct($pLength = 6) {
        header('Content-type: image/png');

        $this->vLength = ($pLength ? $pLength : 6);

        $this->vFontPath = "./fonts/captcha/";

        $this->vFonts = $this->getFonts();

        $this->generateString();
        $this->makeCaptcha();
    }

    private function getFonts() {
        $vFonts = array();

        $objHandle = @opendir($this->vFontPath);

        if (!$objHandle)
            return false;

        while (($vFile = readdir($objHandle)) !== false) {
            $vExtension = strtolower(substr($vFile, strlen($vFile) - 3, 3));
            if ($vExtension == 'ttf')
                $vFonts[] = $vFile;
        }

        closedir($objHandle);

        if (!count($vFonts))
            return false;

        return $vFonts;
    }

    private function getRandomFont() {
        return $this->vFontPath . $this->vFonts[mt_rand(0, count($this->vFonts) - 1)];
    }

    private function generateString() {
        $vNumeric = range(0, 9);
        $vUpperCase = range('A', 'Z');
        $vLowerCase = range('a', 'z');

        //$vCharPool = array_merge($vNumeric, $vUpperCase, $vLowerCase);
        $vCharPool = array_merge($vUpperCase);
        $vPoolLength = count($vCharPool) - 1;

        for ($i = 0; $i < $this->vLength; $i++)
            $this->vCaptchaString .= $vCharPool[mt_rand(0, $vPoolLength)];

        return $this->vCaptchaString;
    }

    private function makeCaptcha() {
        $vImageHeight = 40;
        $vImageLength = $this->vLength * 25 + 16;

        $objImage = imagecreate($vImageLength, $vImageHeight);
        $vBgColor = imagecolorallocate($objImage, 245, 245, 245);
        $vStringColor = imagecolorallocate($objImage, 0, 0, 0);

        $objFilter = new Filter($objImage);

        //$objImage = $objFilter->signs($this->getRandomFont());

        for ($i = 0; $i < strlen($this->vCaptchaString); $i++)
            imagettftext($objImage, 17, mt_rand(-15, 15), $i * 25 + 10, mt_rand(30, 30), $vStringColor, $this->getRandomFont(), $this->vCaptchaString[$i]);

        //$objImage = $objFilter->noise(10);
        //$objImage = $objFilter->blur(6);

        imagepng($objImage);
        imagedestroy($objImage);
    }

    public function getCaptchaString() {
        return $this->vCaptchaString;
    }

}

?>