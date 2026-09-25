<?php

class Common {

    const DATATYPE_URI = 100;
    const DATATYPE_REAL = 200;
    const DATATYPE_DATE = 300;
    const DATATYPE_TIME = 400;
    const DATATYPE_EMAIL = 500;
    const DATATYPE_STRING = 600;
    const DATATYPE_INTEGER = 700;
    const DATATYPE_DATETIME = 800;
    const DATATYPE_ALPHABETIC = 900;
    const DATATYPE_ALPHANUMERIC = 1000;

    public static function IsValidData($data, $type = self::DATATYPE_STRING, $minLen = -1, $maxLen = -1, $minVal = -1, $maxVal = -1, $field = "", &$errDesc) {
        $data = trim($data);
        $field = strtoupper($field);

        if (strlen($data) == $minLen && $minLen == 0)
            return true;

        switch ($type) {
            case self::DATATYPE_URI :
            case self::DATATYPE_DATE :
            case self::DATATYPE_TIME :
            case self::DATATYPE_EMAIL :
            case self::DATATYPE_STRING :
            case self::DATATYPE_DATETIME :
            case self::DATATYPE_ALPHABETIC :
            case self::DATATYPE_ALPHANUMERIC :

                if (strlen($data) < $minLen) {
                    $errDesc .= "$field must have minimum of $minLen characters. It has only " . strlen($data) . " characters.";
                    return false;
                }

                if (strlen($data) == 0)
                    return true;

                if ($maxLen > -1)
                    if (strlen($data) > $maxLen) {
                        $errDesc .= "$field cannot have more than $maxLen characters. It has " . strlen($data) . " characters.";
                        return false;
                    }

                if ($type == self::DATATYPE_EMAIL)
                    if (!self::IsValidEmail($data)) {
                        $errDesc .= "Invalid $field.";
                        return false;
                    }

                if ($type == self::DATATYPE_DATETIME || $type == self::DATATYPE_DATE || $type == self::DATATYPE_TIME) {
                    if (strtotime($data) == -1) {
                        $errDesc .= "Invalid $field.";
                        return false;
                    }
                }

                break;

            case self::DATATYPE_REAL :
            case self::DATATYPE_INTEGER :

                if ($minLen == -1 && strlen($data) == 0)
                    return true;

                if (strlen($data) < $minLen) {
                    $errDesc .= "$field must have minimum of $minLen characters. It has only " . strlen($data) . " characters.";
                    return false;
                }
                if (!is_numeric($data)) {
                    $errDesc .= "Please specify numeric value for $field.";
                    return false;
                }

                if ($type == self::DATATYPE_INTEGER) {
                    if (strpos($data, ".") > 0) {
                        $errDesc .= "Please specify integer value for $field.";
                        return false;
                    }
                }

                if ($data < $minVal) {
                    $errDesc .= "$field value can not be less than $minVal.";
                    return false;
                }
                if ($maxVal > -1)
                    if ($data > $maxVal) {
                        $errDesc .= "$field value can not exceed $maxVal.";
                        return false;
                    }
                break;
        }

        return true;
    }

    public static function getFormattedFileSize($pSize)
	{
		if($pSize>=1024*1024*1024*1024) return round($pSize/(1024*1024*1024*1024), 2) . " TB";
		if($pSize>=1024*1024*1024) return round($pSize/(1024*1024*1024), 2) . " GB";
		if($pSize>=1024*1024) return round($pSize/(1024*1024), 2) . " MB";
		if($pSize>=1024) return round($pSize/1024, 2) . " KB";
		if($pSize<1024)
		{
			if($pSize==1) return "1 Byte";
			else return $pSize . " Bytes";
		}
	}
    public static function GetSchema() {
        return $_SERVER['SERVER_PORT'] == '443' ? 'https:' : 'http:';
    }

    public static function GetHost() {
        return strlen($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
    }

    public static function GetHostURL() {
        return self::GetSchema() . "//" . self::GetHost();
    }

    public static function Redirect($to) {
        if (headers_sent())
            return false;

        header("HTTP/1.1 301 Moved Permanently");
//		header("Location: " . self::GetHostURL() . "/" . $to);
        header("Location: " . $to);
        exit();
    }

    private static function IsValidEmail($data) {

        $Addresses = preg_split('![\n\r]+!', $data);

        foreach ($Addresses as $Address) {
            $IsValid = !(preg_match('!@.*@|\.\.|\,|\;!', $Address) ||
                    !preg_match('!^.+\@(\[?)[a-zA-Z0-9\.\-]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$!', $Address));

            if (!$IsValid)
                return false;
        }

        /* 		if(eregi("^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$]", $data)) return false;
          list($username, $domain) = split("@", $data);
          if(!self::getmxrrW($domain, $MXHost)) if(!fsockopen($domain, 25, $errno, $errstr, 30)) return false; */

        return true;
    }

    private static function getmxrrW($hostname, &$mxhosts) {
        $mxhosts = array();
        exec('nslookup -type=mx ' . $hostname, $result_arr);
        foreach ($result_arr as $line) {
            if (preg_match("/.*mail exchanger = (.*)/", $line, $matches))
                $mxhosts[] = $matches[1];
        }
        return( count($mxhosts) > 0 );
    }

    public static function GetCurrentRecords($pRw, $pSt, $pInc, $pTotal) {
        $vRw = "";
        $vData = "";

        $vRw = $pRw;
        $vRw = str_replace("%start%", ($pSt + 1), $vRw);
        $vRw = str_replace("%total%", $pTotal, $vRw);
        if (($pSt + $pInc) < $pTotal)
            $vRw = str_replace("%end%", ($pSt + $pInc), $vRw);
        else
            $vRw = str_replace("%end%", $pTotal, $vRw);
        $vData .= $vRw;

        return $vData;
    }

    public static function GenerateNavigation($pRw, $pSt, $pInc, $pTotal, $pPoints) {
        $vRw = "";
        $vData = "";

        if ($pTotal < 1)
            return $vData;

        if ($pSt >= ($pInc * $pPoints)) {
            $vRw = $pRw;
            $vRw = str_replace("%page%", "...", $vRw);
            $vRw = str_replace("%tip%", "Prev...", $vRw);
            $vRw = str_replace("%start%", ((int) ($pSt / ($pInc * $pPoints)) * $pPoints * $pInc - $pInc), $vRw);

            $vData .= $vRw;
        }

        $j = 1;

        for ($i = (int) ($pSt / ($pInc * $pPoints)) * $pPoints; $i < ($pTotal / $pInc); $i++) {
            if ($j > $pPoints)
                break;

//			if(($i*$pInc)==$pSt) continue;

            $vRw = $pRw;
            $vRw = str_replace("%tip%", ($i + 1), $vRw);
            $vRw = str_replace("%page%", ($i + 1), $vRw);
            $vRw = str_replace("%start%", ($i * $pInc), $vRw);
            $vRw = str_replace("%current%", (($i * $pInc == $pSt) ? "current" : ""), $vRw);

            $j += 1;
            $vData .= $vRw;
        }

        if (($i * $pInc) <= $pTotal) {
            $vRw = $pRw;
            $vRw = str_replace("%page%", "...", $vRw);
            $vRw = str_replace("%tip%", "Next...", $vRw);
            $vRw = str_replace("%start%", ($i * $pInc), $vRw);

            $vData .= $vRw;
        }

        return $vData;
    }

    public static function FormatTimeLeft($tl) {
        $result = "";
        $vTime = explode(":", $tl);
        $vTtlSec = $vTime[2] + ($vTime[1] * 60) + ($vTime[0] * 60 * 60);

        if ($vTtlSec > 86400) {
            $result = (int) ($vTtlSec / 86400) . "D ";
            $vTtlSec %= 86400;
        }

        if ($vTtlSec > 3600) {
            $result .= (int) ($vTtlSec / 3600) . "H ";
            $vTtlSec %= 3600;
        }

        if ($vTtlSec > 60) {
            $result .= (int) ($vTtlSec / 60) . "M ";
            $vTtlSec %= 60;
        }

        return $result;
    }

    public function SetMailObject($Id, $obj) {
        $objConfig = new Config();
        $s = serialize($obj);
        $fp = fopen($objConfig->GetMailObjectPath() . $Id, "w");
        fwrite($fp, $s);
        fclose($fp);
        $objConfig = NULL;
    }

    public function GetMailObject($Id) {
        $objConfig = new Config();
        $s = implode("", @file($objConfig->GetMailObjectPath() . $Id));
        $obj = unserialize($s);
        $objConfig = NULL;
        return $obj;
    }

    public static function FormatFileSize($sz) {
        if ($sz < 1024) {
            if ($sz == 1)
                return "1 Byte";
            else
                return $sz . " Bytes";
        }
        elseif ($sz >= 1024)
            return round($sz / 1024, 2) . " KB";
        elseif ($sz >= 1024 * 1024)
            return round($sz / 1024 * 1024, 2) . " MB";
        elseif ($sz >= 1024 * 1024 * 1024)
            return round($sz / 1024 * 1024 * 1024, 2) . " GB";

        return $result;
    }
    
    public static function inverseReverseDateTime($pDateTime)
	{
		$i = 0;
		$vDateTime = '';
		
		$pDateTime = trim($pDateTime);
		if($pDateTime=='') return $vDateTime;
		$pDateTime = str_replace(" ", "|", $pDateTime);
		
		$vTDateTime[0] = strtok($pDateTime, "-/|");
		
		while($vTDateTime[$i] !== false) $vTDateTime[++$i] = strtok("-/|");
		
		$vDateTime = $vTDateTime[2] . '-' . $vTDateTime[1] . '-' . $vTDateTime[0];
		
		$vTotal = count($vTDateTime)-1;
		
		if($vTotal) $vDateTime .= ' ' . $vTDateTime[3];
		
		return trim($vDateTime);
	}

}

?>