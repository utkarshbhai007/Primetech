<?php 

class PHPMailer
{
    private $vPriority          = 3;
    private $vCharSet           = "iso-8859-1";
    private $vContentType        = "text/html";
    private $vEncoding          = "8bit";
    private $vErrorInfo         = "";
    private $vFrom               = "root@localhost";
    private $vFromName           = "Root User";
    private $vSender            = "";
    private $vSubject           = "";
    private $vBody               = "";
    private $vAltBody           = "";
    private $vIsWordWrap          = 0;
    private $vMailer            = "smtp";
    private $vSendmail          = "/usr/sbin/sendmail";
    private $vPluginDir         = "";
    private $vVersion           = "1.73";
    private $vConfirmReadingTo  = "";
    private $vHostName          = "";
    private $vAuthor          = "";

    private $vHost        = "localhost";
    private $vPort        = 25;
    private $vHello        = "";
    private $vIsSMTPAuth     = false;
    private $vUserName     = "";
    private $vPassword     = "";
    private $vTimeout      = 10;
    private $vIsSMTPKeepAlive = false;

    private $objSMTP            = NULL;
    private $vTo              = array();
    private $vCC              = array();
    private $vBCC             = array();
    private $vReplyTo         = array();
    private $vAttachment      = array();
    private $vCustomHeader    = array();
    private $vMessageType    = "";
    private $vBoundary        = array();
    private $vLanguage        = array();
    private $vErrorCount     = 0;
    private $LE              = "\n";
    
    const MAILER_Mail = "qmail";
    const MAILER_SMTP = "smtp";
    const MAILER_QMail = "mail";
    const MAILER_SendMail = "sendmail";

    const CONTENTTYPE_HTML = "text/html";
    const CONTENTTYPE_Plain = "text/plain";

	function __construct()
	{
		$this->vVersion = "1.0";
		$this->vAuthor = "Chetan Chavda";
		$this->vPluginDir = dirname(__FILE__) . "/";

		$this->vPriority = 3;
		$this->vCharSet = "iso-8859-1";
		$this->vContentType = "text/html";
		$this->vEncoding = "8bit";
		$this->vErrorInfo = "";
		$this->vMailer = self::MAILER_Mail;

		$this->vFrom = "root@localhost";
		$this->vFromName = "Root User";
		$this->vSender = "";
		$this->vSubject = "";
		$this->vBody = "";
		$this->vAltBody = "";
		$this->vIsWordWrap = 0;
		$this->vQMail = "/var/qmail/bin/sendmail";
		$this->vSendMail = "/usr/sbin/sendmail";
		$this->vConfirmReadingTo = "";
		$this->vHostName = "";
		
		$this->vHost = "localhost";
		$this->vPort = 25;
		$this->vUserName = "";
		$this->vPassword = "";
		$this->vIsSMTPAuth = false;

		$this->vHello = "";
		$this->vTimeout = 10;
		$this->vIsSMTPKeepAlive = false;
	}
	
    public function getVersion() { return $this->vVersion; }
    public function getError() { return $this->vErrorInfo; }

    public function getAuthor() { return $this->vAuthor; }
    public function setAuthor($value) { $this->vAuthor = $value; }

    public function isHTML() { return ($this->vContentType=="text/html" ? true : false); }
    public function setHTML($value) { $this->vContentType = ($value ? "text/html" : "text/plain"); }

    public function getPriority() { return $this->vPriority; }
    public function setPriority($value) { $this->vPriority = $value; }

    public function getCharacterSet() { return $this->vCharSet; }
    public function setCharacterSet($value) { $this->vCharSet = $value; }

    public function getEncoding() { return $this->vEncoding; }
    public function setEncoding($value) { $this->vEncoding = $value; }

    public function getMailer() { return $this->vMailer; }
    public function setMailer($value) { $this->vMailer = $value; }

    public function getFromEmail() { return $this->vFrom; }
    public function setFromEmail($value) { $this->vFrom = $value; }

    public function getFromName() { return $this->vFromName; }
    public function setFromName($value) { $this->vFromName = $value; }

    public function getSubject() { return $this->vSubject; }
    public function setSubject($value) { $this->vSubject = $value; }

    public function getMessage() { return $this->vBody; }
    public function setMessage($value) { $this->vBody = $value; }

    public function getAlternateMessage() { return $this->vAltBody; }
    public function setAlternateMessage($value) { $this->vAltBody = $value; }

    public function getHost() { return $this->vHost; }
    public function setHost($value) { $this->vHost = $value; }

    public function getPort() { return $this->vPort; }
    public function setPort($value) { $this->vPort = $value; }

    public function getUserName() { return $this->vUserName; }
    public function setUserName($value) { $this->vUserName = $value; }

    public function getPassword() { return $this->vPassword; }
    public function setPassword($value) { $this->vPassword = $value; }

    public function isSMTPRequireAuthentication() { return $this->vIsSMTPAuth; }
    public function setSMTPRequireAuthentication($value) { $this->vIsSMTPAuth = $value; }

    public function addAddress($pEmail, $pName="")
    {
        $vCurrent = count($this->vTo);
        $this->vTo[$vCurrent][0] = trim($pEmail);
        $this->vTo[$vCurrent][1] = trim($pName);
    }
    
    public function addCC($pEmail, $pName="")
    {
        $vCurrent = count($this->vCC);
        $this->vCC[$vCurrent][0] = trim($pEmail);
        $this->vCC[$vCurrent][1] = trim($pName);
    }

    public function addBCC($pEmail, $pName="")
    {
        $vCurrent = count($this->vBCC);
        $this->vBCC[$vCurrent][0] = trim($pEmail);
        $this->vBCC[$vCurrent][1] = trim($pName);
    }

    public function addReplyTo($pEmail, $pName="")
    {
        $vCurrent = count($this->vReplyTo);
        $this->vReplyTo[$vCurrent][0] = trim($pEmail);
        $this->vReplyTo[$vCurrent][1] = trim($pName);
    }

    public function send()
    {
        $vBody = "";
        $vHeader = "";
        $vResult = true;

        if((count($this->vTo) + count($this->vCC) + count($this->vBCC)) < 1)
        {
            $this->setError($this->lang("provide_address"));
            return false;
        }

        if(!empty($this->vAltBody)) $this->vContentType = "multipart/alternative";

        $this->vErrorCount = 0;
        $this->setMessageType();
        
        $vHeader .= $this->createHeader();
        $vBody = $this->createBody();

        if($vBody=="") return false;

        switch($this->vMailer)
        {
            case self::MAILER_Mail:
                $vResult = $this->mailSend($vHeader, $vBody);
                break;
            case self::MAILER_SMTP:
                $vResult = $this->smtpSend($vHeader, $vBody);
                break;
            case self::MAILER_QMail:
            case self::MAILER_SendMail:
                $vResult = $this->sendMailSend($vHeader, $vBody);
                break;
            default:
	            $this->setError($this->vMailer . $this->lang("mailer_not_supported"));
                $vResult = false;
                break;
        }

        return $vResult;
    }
    
    private function sendMailSend($vHeader, $vBody)
    {
        if($this->vSender != "")
        {
            $vSendMail = sprintf("%s -oi -f %s -t", ($this->vMailer==self::MAILER_QMail ? $this->vQMail : $this->vSendMail), $this->vSender);
        }
        else
        {
            $vSendMail = sprintf("%s -oi -t", ($this->vMailer==self::MAILER_QMail ? $this->vQMail : $this->vSendMail));
        }

        if(!@$objMail = popen($vSendMail, "w"))
        {
            $this->setError($this->lang("execute") . ($this->vMailer==self::MAILER_QMail ? $this->vQMail : $this->vSendMail));
            return false;
        }

        fputs($objMail, $vHeader);
        fputs($objMail, $vBody);
        
        $objResult = pclose($objMail) >> 8 & 0xFF;
        
        if($objResult != 0)
        {
            $this->setError($this->lang("execute") . ($this->vMailer==self::MAILER_QMail ? $this->vQMail : $this->vSendMail));
            return false;
        }

        return true;
    }

    private function mailSend($vHeader, $vBody)
    {
        $vTo = "";
        
        for($i=0; $i<count($this->vTo); $i++)
        {
            if($i != 0) $vTo .= ", ";
            $vTo .= $this->vTo[$i][0];
        }

        if($this->vSender!="" && strlen(ini_get("safe_mode"))< 1)
        {
            $vOldFrom = ini_get("sendmail_from");
            ini_set("sendmail_from", $this->vSender);
            $vParams = sprintf("-oi -f %s", $this->vSender);
            $objResult = @mail($vTo, $this->encodeHeader($this->vSubject), $vBody, $vHeader, $vParams);
        }
        else
        {
            $objResult = @mail($vTo, $this->encodeHeader($this->vSubject), $vBody, $vHeader);
        }

        if (isset($vOldFrom)) ini_set("sendmail_from", $vOldFrom);

        if(!$objResult)
        {
            $this->setError($this->lang("instantiate"));
            return false;
        }

        return true;
    }

    function smtpSend($vHeader, $vBody)
    {
        include_once($this->vPluginDir . "SMTP.php");
        
        $error = "";
        $vBadRecipients = array();

        if(!$this->smtpConnect()) return false;

        $vFrom = ($this->vSender ? $this->vSender : $this->vFrom);
        
        if(!$this->objSMTP->mail($vFrom))
        {
            $error = $this->lang("from_failed") . $vFrom;
            $this->setError($error);
            $this->objSMTP->reset();
            return false;
        }

        for($i=0; $i<count($this->vTo); $i++)
        {
            if(!$this->objSMTP->recipient($this->vTo[$i][0])) $vBadRecipients[] = $this->vTo[$i][0];
        }
        for($i = 0; $i < count($this->vCC); $i++)
        {
            if(!$this->objSMTP->recipient($this->vCC[$i][0])) $vBadRecipients[] = $this->vCC[$i][0];
        }
        for($i = 0; $i < count($this->vBCC); $i++)
        {
            if(!$this->objSMTP->recipient($this->vBCC[$i][0])) $vBadRecipients[] = $this->vBCC[$i][0];
        }

        if(count($vBadRecipients) > 0) // Create error message
        {
            for($i = 0; $i < count($vBadRecipients); $i++)
            {
                if($i != 0) $error .= ", ";
                $error .= $vBadRecipients[$i];
            }
            
            $error = $this->lang("recipients_failed") . $error;
            $this->setError($error);
            $this->objSMTP->reset();
            return false;
        }


        if(!$this->objSMTP->data($vHeader . $vBody))
        {
            $this->setError($this->lang("data_not_accepted"));
            $this->objSMTP->reset();
            return false;
        }


        if($this->vIsSMTPKeepAlive) $this->objSMTP->reset();
        else $this->smtpClose();

        return true;
    }

    function smtpConnect()
    {
        if(!$this->objSMTP) $this->objSMTP = new SMTP();

        $vIndex = 0;
        $vHosts = explode(";", $this->vHost);
        $vIsConnected = $this->objSMTP->isConnected(); 

        while($vIndex < count($vHosts) && !$vIsConnected)
        {
            $vHost = $vHosts[$vIndex];
            $vPort = $this->vPort;

            if($this->objSMTP->connect($vHost, $vPort, $this->vTimeout))
            {
                if ($this->vHello) $this->objSMTP->hello($this->vHello);
                else $this->objSMTP->hello($this->getServerHostName());
        
                if($this->vIsSMTPAuth)
                {
                    if(!$this->objSMTP->authenticate($this->vUserName, $this->vPassword))
                    {
                        $this->setError($this->lang("authenticate"));
                        $this->objSMTP->reset();
                        $vIsConnected = false;
                    }
                }
                
                $vIsConnected = true;
            }
            
            $vIndex++;
        }
        
        if(!$vIsConnected) $this->setError($this->lang("connect_host"));

        return $vIsConnected;
    }

    private function smtpClose()
    {
        if(!$this->objSMTP) return;
        if(!$this->objSMTP->isConnected()) return;
        $this->objSMTP->quit();
    }

    function setLanguage($lang_type, $lang_path = "")
    {
        $lang_path = $this->vPluginDir.$lang_path;
        
        if(file_exists($lang_path.'phpmailer.lang-en.php'))
        {
            include($lang_path.'phpmailer.lang-en.php');
        }
        else
        {
            $this->SetError("Could not load language file");
            return false;
        }
        
        $this->vLanguage = $PHPMAILER_LANG;
    
        return true;
    }

    private function appendAddress($pType, $pAddress)
    {
        $vAddress = $pType . ": ";
        $vAddress .= $this->formatAddress($pAddress[0]);
        
        if(count($pAddress)>1)
        	for($i=1; $i<count($pAddress); $i++)
        		$vAddress .= ", " . $this->formatAddress($pAddress[$i]);

        $vAddress .= $this->LE;

        return $vAddress;
    }
    
    private function formatAddress($pAddress)
    {
        if(empty($pAddress[1])) $vFormatted = $pAddress[0];
        else $vFormatted = $this->encodeHeader($pAddress[1], 'phrase') . " <" . $pAddress[0] . ">";

        return $vFormatted;
    }

    private function wrapText($message, $length, $qp_mode = false)
    {
        $soft_break = ($qp_mode) ? sprintf(" =%s", $this->LE) : $this->LE;

        $message = $this->fixEOL($message);
        
        if (substr($message, -1) == $this->LE) $message = substr($message, 0, -1);

        $line = explode($this->LE, $message);
        $message = "";
        
        for ($i=0 ;$i < count($line); $i++)
        {
          $line_part = explode(" ", $line[$i]);
          $buf = "";
          for ($e = 0; $e<count($line_part); $e++)
          {
              $word = $line_part[$e];
              if ($qp_mode and (strlen($word) > $length))
              {
                $space_left = $length - strlen($buf) - 1;
                if ($e != 0)
                {
                    if ($space_left > 20)
                    {
                        $len = $space_left;
                        
                        if (substr($word, $len - 1, 1) == "=") $len--;
                        elseif (substr($word, $len - 2, 1) == "=") $len -= 2;
                        
                        $part = substr($word, 0, $len);
                        $word = substr($word, $len);
                        $buf .= " " . $part;
                        $message .= $buf . sprintf("=%s", $this->LE);
                    }
                    else
                    {
                        $message .= $buf . $soft_break;
                    }
                    $buf = "";
                }
                
                while (strlen($word) > 0)
                {
                    $len = $length;
                    if (substr($word, $len - 1, 1) == "=")
                        $len--;
                    elseif (substr($word, $len - 2, 1) == "=")
                        $len -= 2;
                    $part = substr($word, 0, $len);
                    $word = substr($word, $len);

                    if (strlen($word) > 0)
                        $message .= $part . sprintf("=%s", $this->LE);
                    else
                        $buf = $part;
                }
              }
              else
              {
                $buf_o = $buf;
                $buf .= ($e == 0) ? $word : (" " . $word); 

                if (strlen($buf) > $length and $buf_o != "")
                {
                    $message .= $buf_o . $soft_break;
                    $buf = $word;
                }
              }
          }
          $message .= $buf . $this->LE;
        }

        return $message;
    }
    
    private function setWordWrap()
    {
        if($this->vIsWordWrap < 1) return;
            
        switch($this->vMessageType)
        {
           case "alt":
           case "alt_attachments":
              $this->vAltBody = $this->wrapText($this->vAltBody, $this->vIsWordWrap);
              break;
           default:
              $this->vBody = $this->wrapText($this->vBody, $this->vIsWordWrap);
              break;
        }
    }

    private function createHeader()
    {
        $vResult = "";
        
        $vUniqueId = md5(uniqid(time()));
        
        $this->vBoundary[1] = "b1_" . $vUniqueId;
        $this->vBoundary[2] = "b2_" . $vUniqueId;

        $vResult .= $this->headerLine("Date", $this->getRFCDate());
        
        if($this->vSender == "") $vResult .= $this->headerLine("Return-Path", trim($this->vFrom));
        else $vResult .= $this->headerLine("Return-Path", trim($this->vSender));
        
        if($this->vMailer != self::MAILER_Mail)
        {
            if(count($this->vTo) > 0) $vResult .= $this->appendAddress("To", $this->vTo);
            else if (count($this->vCC) == 0) $vResult .= $this->headerLine("To", "undisclosed-recipients:;");
            
            if(count($this->vCC) > 0) $vResult .= $this->appendAddress("Cc", $this->vCC);
        }

        $vFrom = array();
        $vFrom[0][0] = trim($this->vFrom);
        $vFrom[0][1] = $this->vFromName;
        $vResult .= $this->appendAddress("From", $vFrom); 

        if((($this->vMailer == "sendmail") || ($this->vMailer == "mail")) && (count($this->vBCC) > 0)) $vResult .= $this->appendAddress("Bcc", $this->vBCC);
        if(count($this->vReplyTo) > 0) $vResult .= $this->appendAddress("Reply-to", $this->vReplyTo);
        if($this->vMailer != self::MAILER_Mail) $vResult .= $this->headerLine("Subject", $this->encodeHeader(trim($this->vSubject)));

        $vResult .= sprintf("Message-ID: <%s@%s>%s", $vUniqueId, $this->getServerHostName(), $this->LE);
        $vResult .= $this->headerLine("X-Priority", $this->vPriority);
        $vResult .= $this->headerLine("X-Mailer", "PHPMailer [version " . $this->vVersion . "]");
        $vResult .= $this->headerLine("X-Author", $this->vAuthor);
        
        if($this->vConfirmReadingTo != "")
        {
            $vResult .= $this->headerLine("Disposition-Notification-To", "<" . trim($this->vConfirmReadingTo) . ">");
        }

        for($index=0; $index<count($this->vCustomHeader); $index++)
        {
            $vResult .= $this->headerLine(trim($this->vCustomHeader[$index][0]), $this->vEncodeHeader(trim($this->vCustomHeader[$index][1])));
        }
        
        $vResult .= $this->headerLine("MIME-Version", "1.0");

        switch($this->vMessageType)
        {
            case "plain":
                $vResult .= $this->headerLine("Content-Transfer-Encoding", $this->vEncoding);
                $vResult .= sprintf("Content-Type: %s; charset=\"%s\"", $this->vContentType, $this->vCharSet);
                break;
            case "attachments":
            case "alt_attachments":
                if($this->isInlineImageExists())
                {
                    $vResult .= sprintf("Content-Type: %s;%s\ttype=\"text/html\";%s\tboundary=\"%s\"%s", "multipart/related", $this->LE, $this->LE, $this->vBoundary[1], $this->LE);
                }
                else
                {
                    $vResult .= $this->headerLine("Content-Type", "multipart/mixed;");
                    $vResult .= $this->textLine("\tboundary=\"" . $this->vBoundary[1] . '"');
                }
                break;
            case "alt":
                $vResult .= $this->headerLine("Content-Type", "multipart/alternative;");
                $vResult .= $this->textLine("\tboundary=\"" . $this->vBoundary[1] . '"');
                break;
        }

        if($this->vMailer != self::MAILER_Mail) $vResult .= $this->LE . $this->LE;

        return $vResult;
    }

    private function createBody()
    {
        $vResult = "";

        $this->setWordWrap();

        switch($this->vMessageType)
        {
            case "alt":
                $vResult .= $this->getBoundary($this->vBoundary[1], "", "text/plain", "");
                $vResult .= $this->encodeString($this->vAltBody, $this->vEncoding);
                $vResult .= $this->LE . $this->LE;
                $vResult .= $this->getBoundary($this->vBoundary[1], "", "text/html", "");
                $vResult .= $this->encodeString($this->vBody, $this->vEncoding);
                $vResult .= $this->LE . $this->LE;
                $vResult .= $this->endBoundary($this->vBoundary[1]);
                break;
            case "plain":
                $vResult .= $this->encodeString($this->vBody, $this->vEncoding);
                break;
            case "attachments":
                $vResult .= $this->getBoundary($this->vBoundary[1], "", "", "");
                $vResult .= $this->encodeString($this->vBody, $this->vEncoding);
                $vResult .= $this->LE;
                $vResult .= $this->attachAll();
                break;
            case "alt_attachments":
                $vResult .= sprintf("--%s%s", $this->vBoundary[1], $this->LE);
                $vResult .= sprintf("Content-Type: %s;%s" . "\tboundary=\"%s\"%s", "multipart/alternative", $this->LE, $this->vBoundary[2], $this->LE . $this->LE);
                $vResult .= $this->getBoundary($this->vBoundary[2], "", "text/plain", "") . $this->LE;
                $vResult .= $this->encodeString($this->vAltBody, $this->vEncoding);
                $vResult .= $this->LE . $this->LE;
                $vResult .= $this->getBoundary($this->vBoundary[2], "", "text/html", "") . $this->LE;
                $vResult .= $this->encodeString($this->vBody, $this->vEncoding);
                $vResult .= $this->LE . $this->LE;
                $vResult .= $this->endBoundary($this->vBoundary[2]);
                $vResult .= $this->attachAll();
                break;
        }
        
        if($this->isError()) $vResult = "";

        return $vResult;
    }

    private function getBoundary($pBoundary, $pCharSet, $pContentType, $pEncoding)
    {
        $vResult = "";
        
        if($pCharSet == "") { $pCharSet = $this->vCharSet; }
        if($pContentType == "") { $pContentType = $this->vContentType; }
        if($pEncoding == "") { $pEncoding = $this->vEncoding; }

        $vResult .= $this->textLine("--" . $pBoundary);
        $vResult .= sprintf("Content-Type: %s; charset = \"%s\"", $pContentType, $pCharSet);
        $vResult .= $this->LE;
        $vResult .= $this->headerLine("Content-Transfer-Encoding", $pEncoding);
        $vResult .= $this->LE;
       
        return $vResult;
    }

    private function endBoundary($pBoundary) { return $this->LE . "--" . $pBoundary . "--" . $this->LE; }
    
    private function setMessageType()
    {
        if(count($this->vAttachment) < 1 && strlen($this->vAltBody) < 1)
        {
            $this->vMessageType = "plain";
        }
        else
        {
            if(count($this->vAttachment) > 0) $this->vMessageType = "attachments";
            if(strlen($this->vAltBody) > 0 && count($this->vAttachment) < 1) $this->vMessageType = "alt";
            if(strlen($this->vAltBody) > 0 && count($this->vAttachment) > 0) $this->vMessageType = "alt_attachments";
        }
    }

    private function headerLine($pName, $pValue) { return $pName . ": " . $pValue . $this->LE; }
    private function textLine($pValue) { return $pValue . $this->LE; }

    public function addAttachment($pPath, $pName = "", $pEncoding = "base64", $pType = "application/octet-stream")
    {
        if(!@is_file($pPath))
        {
            $this->setError($this->lang("file_access") . $pPath);
            return false;
        }

        $vFileName = basename($pPath);
        if($pName == "") $pName = $vFileName;

        $vCurrent = count($this->vAttachment);
        $this->vAttachment[$vCurrent][0] = $pPath;
        $this->vAttachment[$vCurrent][1] = $vFileName;
        $this->vAttachment[$vCurrent][2] = $pName;
        $this->vAttachment[$vCurrent][3] = $pEncoding;
        $this->vAttachment[$vCurrent][4] = $pType;
        $this->vAttachment[$vCurrent][5] = false;
        $this->vAttachment[$vCurrent][6] = "attachment";
        $this->vAttachment[$vCurrent][7] = 0;

        return true;
    }
    
    private function attachAll()
    {
        $mime = array();

        for($i=0; $i<count($this->vAttachment); $i++)
        {
            $bString = $this->vAttachment[$i][5];
            
            if($bString) $string = $this->vAttachment[$i][0];
            else $path = $this->vAttachment[$i][0];

            $filename    = $this->vAttachment[$i][1];
            $name        = $this->vAttachment[$i][2];
            $encoding    = $this->vAttachment[$i][3];
            $type        = $this->vAttachment[$i][4];
            $disposition = $this->vAttachment[$i][6];
            $cid         = $this->vAttachment[$i][7];
            
            $mime[] = sprintf("--%s%s", $this->vBoundary[1], $this->LE);
            $mime[] = sprintf("Content-Type: %s; name=\"%s\"%s", $type, $name, $this->LE);
            $mime[] = sprintf("Content-Transfer-Encoding: %s%s", $encoding, $this->LE);

            if($disposition == "inline") $mime[] = sprintf("Content-ID: <%s>%s", $cid, $this->LE);

            $mime[] = sprintf("Content-Disposition: %s; filename=\"%s\"%s", $disposition, $name, $this->LE.$this->LE);

            if($bString)
            {
                $mime[] = $this->encodeString($string, $encoding);
                if($this->isError()) { return ""; }
                $mime[] = $this->LE.$this->LE;
            }
            else
            {
                $mime[] = $this->encodeFile($path, $encoding);                
                if($this->isError()) { return ""; }
                $mime[] = $this->LE.$this->LE;
            }
        }

        $mime[] = sprintf("--%s--%s", $this->vBoundary[1], $this->LE);

        return join("", $mime);
    }
    
    private function encodeFile($pPath, $pEncoding = "base64")
    {
        if(!@$objHandle = fopen($pPath, "rb"))
        {
            $this->setError($this->lang("file_open") . $pPath);
            return "";
        }
        
        $vMagicQuotes = get_magic_quotes_runtime();
        set_magic_quotes_runtime(0);
        
        $vFileBuffer = fread($objHandle, filesize($pPath));
        $vFileBuffer = $this->EncodeString($vFileBuffer, $pEncoding);
        fclose($objHandle);
        
        set_magic_quotes_runtime($vMagicQuotes);

        return $vFileBuffer;
    }

    private function encodeString($pString, $pEncoding = "base64")
    {
        $vEncoded = "";
        
        switch(strtolower($pEncoding))
        {
        	case "base64":
				$vEncoded = chunk_split(base64_encode($pString), 76, $this->LE);
              	break;
          	case "7bit":
          	case "8bit":
              	$vEncoded = $this->fixEOL($pString);
              	if(substr($vEncoded, -(strlen($this->LE))) != $this->LE) $vEncoded .= $this->LE;
              	break;
          	case "binary":
              	$vEncoded = $pString;
              	break;
          	case "quoted-printable":
              	$vEncoded = $this->encodeQP($pString);
              	break;
          	default:
              	$this->setError($this->lang("encoding") . $encoding);
              	break;
        }
        
        return $vEncoded;
    }

    private function encodeHeader($pString, $pPosition = 'text')
    {
		$x = 0;
      
      	switch(strtolower($pPosition))
      	{
        	case 'phrase':
          		if(!preg_match('/[\200-\377]/', $pString))
          		{
            		$vEncoded = addcslashes($pString, "\0..\37\177\\\"");
            		
            		if (($pString == $vEncoded) && !preg_match('/[^A-Za-z0-9!#$%&\'*+\/=?^_`{|}~ -]/', $pString)) return ($vEncoded);
            		else return ("\"$vEncoded\"");
          		}
          		$x = preg_match_all('/[^\040\041\043-\133\135-\176]/', $pString, $vMatches);
          		break;
        	case 'comment':
          		$x = preg_match_all('/[()"]/', $pString, $vMatches);
        	case 'text':
        	default:
          		$x += preg_match_all('/[\000-\010\013\014\016-\037\177-\377]/', $pString, $vMatches);
          		break;
      	}

		if($x == 0) return ($pString);
		
		$vMaxLen = 75 - 7 - strlen($this->vCharSet);
		
		if(strlen($pString)/3 < $x)
		{
			$vEncoding = 'B';
			$vEncoded = base64_encode($pString);
			$vMaxLen -= $vMaxLen % 4;
			$vEncoded = trim(chunk_split($vEncoded, $vMaxLen, "\n"));
		}
		else
		{
			$vEncoding = 'Q';
			$vEncoded = $this->encodeQ($pString, $pPosition);
			$vEncoded = $this->wrapText($vEncoded, $vMaxLen, true);
			$vEncoded = str_replace("=". $this->LE, "\n", trim($vEncoded));
		}
		
		$vEncoded = preg_replace('/^(.*)$/m', " =?" . $this->vCharSet . "?$vEncoding?\\1?=", $vEncoded);
		$vEncoded = trim(str_replace("\n", $this->LE, $vEncoded));
		
		return $vEncoded;
    }
    
    private function encodeQP($pString)
    {
        $vEncoded = $this->fixEOL($pString);
        
        if(substr($vEncoded, -(strlen($this->LE))) != $this->LE) $vEncoded .= $this->LE;

        $vEncoded = preg_replace('/([\000-\010\013\014\016-\037\075\177-\377])/e', "'='.sprintf('%02X', ord('\\1'))", $vEncoded);
        $vEncoded = preg_replace("/([\011\040])".$this->LE."/e", "'='.sprintf('%02X', ord('\\1')).'".$this->LE."'", $vEncoded);
        $vEncoded = $this->WrapText($vEncoded, 74, true);

        return $vEncoded;
    }

    private function encodeQ($pString, $pPosition = "text")
    {
        $vEncoded = preg_replace("[\r\n]", "", $pString);

        switch (strtolower($pPosition))
        {
			case "phrase":
				$vEncoded = preg_replace("/([^A-Za-z0-9!*+\/ -])/e", "'='.sprintf('%02X', ord('\\1'))", $vEncoded);
            	break;
          	case "comment":
            	$vEncoded = preg_replace("/([\(\)\"])/e", "'='.sprintf('%02X', ord('\\1'))", $vEncoded);
          	case "text":
          	default:
            	$vEncoded = preg_replace('/([\000-\011\013\014\016-\037\075\077\137\177-\377])/e', "'='.sprintf('%02X', ord('\\1'))", $vEncoded);
            	break;
        }
        
        $vEncoded = str_replace(" ", "_", $vEncoded);

        return $vEncoded;
    }

    public function addStringAttachment($pString, $pFileName, $pEncoding = "base64", $pType = "application/octet-stream")
    {
        $vCurrent = count($this->vAttachment);
        
        $this->vAttachment[$vCurrent][0] = $pString;
        $this->vAttachment[$vCurrent][1] = $pFileName;
        $this->vAttachment[$vCurrent][2] = $pFileName;
        $this->vAttachment[$vCurrent][3] = $pEncoding;
        $this->vAttachment[$vCurrent][4] = $pType;
        $this->vAttachment[$vCurrent][5] = true;
        $this->vAttachment[$vCurrent][6] = "attachment";
        $this->vAttachment[$vCurrent][7] = 0;
    }
    
    public function addEmbeddedImage($pPath, $pCId, $pName="", $pEncoding = "base64", $pType = "application/octet-stream")
    {
        if(!@is_file($pPath))
        {
            $this->setError($this->lang("file_access") . $pPath);
            return false;
        }

        $vFileName = basename($pPath);
        if($pName=="") $pName = $vFileName;

        $vCurrent = count($this->vAttachment);
        
        $this->vAttachment[$vCurrent][0] = $pPath;
        $this->vAttachment[$vCurrent][1] = $pFileName;
        $this->vAttachment[$vCurrent][2] = $pName;
        $this->vAttachment[$vCurrent][3] = $pEncoding;
        $this->vAttachment[$vCurrent][4] = $pType;
        $this->vAttachment[$vCurrent][5] = false;
        $this->vAttachment[$vCurrent][6] = "inline";
        $this->vAttachment[$vCurrent][7] = $pCId;
    
        return true;
    }
    
    private function isInlineImageExists()
    {
        $vResult = false;
        
        for($i=0; $i<count($this->vAttachment); $i++)
        {
            if($this->vAttachment[$i][6] == "inline")
            {
                $vResult = true;
                break;
            }
        }
        
        return $vResult;
    }

    public function clearAddresses() { $this->vTo = array(); }
    public function clearCCs() { $this->vCC = array(); }
    public function clearBCCs() { $this->vBCC = array(); }
    public function clearReplyTos() { $this->vReplyTo = array(); }
	public function clearAllRecipients() { $this->vTo = array(); $this->vCC = array(); $this->vBCC = array(); }
    public function clearAttachments() { $this->vAttachment = array(); }
    public function clearCustomHeaders() { $this->vCustomHeader = array(); }

    private function setError($pMessage)
    {
        $this->vErrorCount++;
        $this->vErrorInfo = $pMessage;
    }

    private function getRFCDate()
    {
        $vTZ = date("Z");
        $vTZs = ($vTZ < 0) ? "-" : "+";
        $vTZ = abs($vTZ);
        $vTZ = ($vTZ/3600)*100 + ($vTZ%3600)/60;
        
        $vResult = sprintf("%s %s%04d", date("D, j M Y H:i:s"), $vTZs, $vTZ);

        return $vResult;
    }
    
    private function getServerVariable($pVarName)
    {
        global $HTTP_ENV_VARS;
        global $HTTP_SERVER_VARS;

        if(!isset($_SERVER))
        {
            $_SERVER = $HTTP_SERVER_VARS;
            if(!isset($_SERVER["REMOTE_ADDR"])) $_SERVER = $HTTP_ENV_VARS;
        }
        
        if(isset($_SERVER[$pVarName])) return $_SERVER[$pVarName];
        else return "";
    }

    private function getServerHostName()
    {
        if($this->vHostName != "") $vResult = $this->vHostName;
        elseif($this->getServerVariable('SERVER_NAME') != "") $vResult = $this->getServerVariable('SERVER_NAME');
        else $vResult = "localhost.localdomain";

        return $vResult;
    }

    private function lang($pKey)
    {
        if(count($this->vLanguage) < 1) $this->setLanguage("en");
    
        if(isset($this->vLanguage[$pKey])) return $this->vLanguage[$pKey];
        else return "Language string failed to load: " . $pKey;
    }
    
    public function isError()
    {
        return ($this->vErrorCount > 0);
    }

    private function fixEOL($pString)
    {
        $pString = str_replace("\r\n", "\n", $pString);
        $pString = str_replace("\r", "\n", $pString);
        $pString = str_replace("\n", $this->LE, $pString);
        
        return $pString;
    }

    public function addCustomHeader($pCustomHeader)
    {
        $this->vCustomHeader[] = explode(":", $pCustomHeader, 2);
    }
}

?>