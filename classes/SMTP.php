<?php 

class SMTP
{
    private $SMTP_PORT = 25;
    private $CRLF = "\r\n";
    private $do_debug;

    private $objConnection;
    private $vError;
    private $helo_rply;

    function __construct()
    {
        $this->objConnection = 0;
        $this->vError = null;
        $this->helo_rply = null;

        $this->do_debug = 0;
    }

    function connect($host, $port=0, $tval=30)
    {
        $this->vError = null;

        if($this->isConnected())
        {
            $this->vError = array("error" => "Already connected to a server");
            return false;
        }

        if(empty($port)) $port = $this->SMTP_PORT;

        $this->objConnection = fsockopen($host, $port, $errno, $errstr, $tval);
        
        if(empty($this->objConnection))
        {
            $this->vError = array("error" => "Failed to connect to server", "errno" => $errno, "errstr" => $errstr);
            if($this->do_debug >= 1) echo "SMTP -> ERROR: " . $this->vError["error"] . ": $errstr ($errno)" . $this->CRLF;
            return false;
        } 
        
        if(substr(PHP_OS, 0, 3) != "WIN") socket_set_timeout($this->objConnection, $tval, 0);

        $announce = $this->getLines();

        if($this->do_debug >= 2) echo "SMTP -> FROM SERVER:" . $this->CRLF . $announce;
        
        return true;
    }

    function authenticate($username, $password)
    {
        fputs($this->objConnection, "AUTH LOGIN" . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($vCode != 334)
        {
            $this->vError =
                array("error" => "AUTH not accepted from server",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }

        // Send encoded username
        fputs($this->objConnection, base64_encode($username) . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($vCode != 334) {
            $this->vError =
                array("error" => "Username not accepted from server",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }


        // Send encoded password
        fputs($this->objConnection, base64_encode($password) . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($vCode != 235) {
            $this->vError =
                array("error" => "Password not accepted from server",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }

        return true;
    }

    /**
     * Returns true if connected to a server otherwise false
     * @access private
     * @return bool
     */
    function isConnected()
    {
        if(empty($this->objConnection)) return false;
        $sock_status = socket_get_status($this->objConnection);
        if(!$sock_status["eof"]) return true;

        if($this->do_debug >= 1) echo "SMTP -> NOTICE:" . $this->CRLF . "EOF caught while checking if connected";
        
        $this->close();
        return false;
    }

    function close()
    {
        $this->vError = null;
        $this->helo_rply = null;
        
        if(empty($this->objConnection)) return;
        
        fclose($this->objConnection);
        $this->objConnection = 0;
    }


    /***************************************************************
     *                        SMTP COMMANDS                       *
     *************************************************************/

    /**
     * Issues a data command and sends the msg_data to the server
     * finializing the mail transaction. $msg_data is the message
     * that is to be send with the headers. Each header needs to be
     * on a single line followed by a <CRLF> with the message headers
     * and the message body being seperated by and additional <CRLF>.
     *
     * Implements rfc 821: DATA <CRLF>
     *
     * SMTP CODE INTERMEDIATE: 354
     *     [data]
     *     <CRLF>.<CRLF>
     *     SMTP CODE SUCCESS: 250
     *     SMTP CODE FAILURE: 552,554,451,452
     * SMTP CODE FAILURE: 451,554
     * SMTP CODE ERROR  : 500,501,503,421
     * @access public
     * @return bool
     */
    function data($msg_data) {
        $this->vError = null; # so no confusion is caused

        if(!$this->isConnected()) {
            $this->vError = array(
                    "error" => "Called Data() without being connected");
            return false;
        }

        fputs($this->objConnection,"DATA" . $this->CRLF);


        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($this->do_debug >= 2) {
            echo "SMTP -> FROM SERVER:" . $this->CRLF . $vReply;
        }

        if($vCode != 354) {
            $this->vError =
                array("error" => "DATA command not accepted from server",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }


        # the server is ready to accept data!
        # according to rfc 821 we should not send more than 1000
        # including the CRLF
        # characters on a single line so we will break the data up
        # into lines by \r and/or \n then if needed we will break
        # each of those into smaller lines to fit within the limit.
        # in addition we will be looking for lines that start with
        # a period '.' and append and additional period '.' to that
        # line. NOTE: this does not count towards are limit.

        # normalize the line breaks so we know the explode works
        $msg_data = str_replace("\r\n","\n",$msg_data);
        $msg_data = str_replace("\r","\n",$msg_data);
        $lines = explode("\n",$msg_data);

        # we need to find a good way to determine is headers are
        # in the msg_data or if it is a straight msg body
        # currently I'm assuming rfc 822 definitions of msg headers
        # and if the first field of the first line (':' sperated)
        # does not contain a space then it _should_ be a header
        # and we can process all lines before a blank "" line as
        # headers.
        $field = substr($lines[0],0,strpos($lines[0],":"));
        $in_headers = false;
        if(!empty($field) && !strstr($field," ")) {
            $in_headers = true;
        }

        $max_line_length = 998; # used below; set here for ease in change

        while(list(,$line) = @each($lines)) {
            $lines_out = null;
            if($line == "" && $in_headers) {
                $in_headers = false;
            }
            # ok we need to break this line up into several
            # smaller lines
            while(strlen($line) > $max_line_length) {
                $pos = strrpos(substr($line,0,$max_line_length)," ");

                # Patch to fix DOS attack
                if(!$pos) {
                    $pos = $max_line_length - 1;
                }

                $lines_out[] = substr($line,0,$pos);
                $line = substr($line,$pos + 1);
                # if we are processing headers we need to
                # add a LWSP-char to the front of the new line
                # rfc 822 on long msg headers
                if($in_headers) {
                    $line = "\t" . $line;
                }
            }
            $lines_out[] = $line;

            # now send the lines to the server
            while(list(,$line_out) = @each($lines_out)) {
                if(strlen($line_out) > 0)
                {
                    if(substr($line_out, 0, 1) == ".") {
                        $line_out = "." . $line_out;
                    }
                }
                fputs($this->objConnection,$line_out . $this->CRLF);
            }
        }

        # ok all the message data has been sent so lets get this
        # over with aleady
        fputs($this->objConnection, $this->CRLF . "." . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($this->do_debug >= 2) {
            echo "SMTP -> FROM SERVER:" . $this->CRLF . $vReply;
        }

        if($vCode != 250) {
            $this->vError =
                array("error" => "DATA not accepted from server",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }
        
        
        return true;
    }

    /**
     * Expand takes the name and asks the server to list all the
     * people who are members of the _list_. Expand will return
     * back and array of the result or false if an error occurs.
     * Each value in the array returned has the format of:
     *     [ <full-name> <sp> ] <path>
     * The definition of <path> is defined in rfc 821
     *
     * Implements rfc 821: EXPN <SP> <string> <CRLF>
     *
     * SMTP CODE SUCCESS: 250
     * SMTP CODE FAILURE: 550
     * SMTP CODE ERROR  : 500,501,502,504,421
     * @access public
     * @return string array
     */
    function expand($name) {
        $this->vError = null; # so no confusion is caused

        if(!$this->isConnected()) {
            $this->vError = array(
                    "error" => "Called Expand() without being connected");
            return false;
        }

        fputs($this->objConnection,"EXPN " . $name . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($this->do_debug >= 2) {
            echo "SMTP -> FROM SERVER:" . $this->CRLF . $vReply;
        }

        if($vCode != 250) {
            $this->vError =
                array("error" => "EXPN not accepted from server",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }

        # parse the reply and place in our array to return to user
        $entries = explode($this->CRLF,$vReply);
        while(list(,$l) = @each($entries)) {
            $list[] = substr($l,4);
        }

        return $list;
    }

    /**
     * Sends the HELO command to the smtp server.
     * This makes sure that we and the server are in
     * the same known state.
     *
     * Implements from rfc 821: HELO <SP> <domain> <CRLF>
     *
     * SMTP CODE SUCCESS: 250
     * SMTP CODE ERROR  : 500, 501, 504, 421
     * @access public
     * @return bool
     */
    function hello($host="") {
        $this->vError = null; # so no confusion is caused

        if(!$this->isConnected()) {
            $this->vError = array(
                    "error" => "Called Hello() without being connected");
            return false;
        }

        # if a hostname for the HELO wasn't specified determine
        # a suitable one to send
        if(empty($host)) {
            # we need to determine some sort of appopiate default
            # to send to the server
            $host = "localhost";
        }

        // Send extended hello first (RFC 2821)
        if(!$this->SendHello("EHLO", $host))
        {
            if(!$this->SendHello("HELO", $host))
                return false;
        }

        return true;
    }

    /**
     * Sends a HELO/EHLO command.
     * @access private
     * @return bool
     */
    function sendHello($hello, $host) {
        fputs($this->objConnection, $hello . " " . $host . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($this->do_debug >= 2) {
            echo "SMTP -> FROM SERVER: " . $this->CRLF . $vReply;
        }

        if($vCode != 250) {
            $this->vError =
                array("error" => $hello . " not accepted from server",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }

        $this->helo_rply = $vReply;
        
        return true;
    }

    /**
     * Gets help information on the keyword specified. If the keyword
     * is not specified then returns generic help, ussually contianing
     * A list of keywords that help is available on. This function
     * returns the results back to the user. It is up to the user to
     * handle the returned data. If an error occurs then false is
     * returned with $this->vError set appropiately.
     *
     * Implements rfc 821: HELP [ <SP> <string> ] <CRLF>
     *
     * SMTP CODE SUCCESS: 211,214
     * SMTP CODE ERROR  : 500,501,502,504,421
     * @access public
     * @return string
     */
    function help($keyword="") {
        $this->vError = null; # to avoid confusion

        if(!$this->isConnected()) {
            $this->vError = array(
                    "error" => "Called Help() without being connected");
            return false;
        }

        $extra = "";
        if(!empty($keyword)) {
            $extra = " " . $keyword;
        }

        fputs($this->objConnection,"HELP" . $extra . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($this->do_debug >= 2) {
            echo "SMTP -> FROM SERVER:" . $this->CRLF . $vReply;
        }

        if($vCode != 211 && $vCode != 214) {
            $this->vError =
                array("error" => "HELP not accepted from server",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }

        return $vReply;
    }

    /**
     * Starts a mail transaction from the email address specified in
     * $from. Returns true if successful or false otherwise. If True
     * the mail transaction is started and then one or more Recipient
     * commands may be called followed by a Data command.
     *
     * Implements rfc 821: MAIL <SP> FROM:<reverse-path> <CRLF>
     *
     * SMTP CODE SUCCESS: 250
     * SMTP CODE SUCCESS: 552,451,452
     * SMTP CODE SUCCESS: 500,501,421
     * @access public
     * @return bool
     */
    function mail($pFrom)
    {
        $this->vError = null;

        if(!$this->isConnected())
        {
            $this->vError = array("error" => "Called Mail() without being connected");
            return false;
        }

        fputs($this->objConnection, "MAIL FROM:<" . $pFrom . ">" . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply, 0, 3);

        if($vCode != 250)
        {
            $this->vError = array("error" => "MAIL not accepted from server", "smtp_code" => $vCode, "smtp_msg" => substr($vReply, 4));
            if($this->do_debug >= 1) echo "SMTP -> ERROR: " . $this->vError["error"] . ": " . $vReply . $this->CRLF;
            return false;
        }
        
        return true;
    }

    /**
     * Sends the command NOOP to the SMTP server.
     *
     * Implements from rfc 821: NOOP <CRLF>
     *
     * SMTP CODE SUCCESS: 250
     * SMTP CODE ERROR  : 500, 421
     * @access public
     * @return bool
     */
    function noop() {
        $this->vError = null; # so no confusion is caused

        if(!$this->isConnected()) {
            $this->vError = array(
                    "error" => "Called Noop() without being connected");
            return false;
        }

        fputs($this->objConnection,"NOOP" . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($this->do_debug >= 2) {
            echo "SMTP -> FROM SERVER:" . $this->CRLF . $vReply;
        }

        if($vCode != 250) {
            $this->vError =
                array("error" => "NOOP not accepted from server",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }
        return true;
    }

    /**
     * Sends the quit command to the server and then closes the socket
     * if there is no error or the $close_on_error argument is true.
     *
     * Implements from rfc 821: QUIT <CRLF>
     *
     * SMTP CODE SUCCESS: 221
     * SMTP CODE ERROR  : 500
     * @access public
     * @return bool
     */
    function quit($close_on_error=true) {
        $this->vError = null; # so there is no confusion

        if(!$this->isConnected()) {
            $this->vError = array(
                    "error" => "Called Quit() without being connected");
            return false;
        }

        # send the quit command to the server
        fputs($this->objConnection,"quit" . $this->CRLF);

        # get any good-bye messages
        //$byemsg = $this->getLines();

        if($this->do_debug >= 2) {
            echo "SMTP -> FROM SERVER:" . $this->CRLF . $byemsg;
        }

        $rval = true;
        $e = null;

        /*$vCode = substr($byemsg,0,3);
        if($vCode != 221) {
            # use e as a tmp var cause Close will overwrite $this->vError
            $e = array("error" => "SMTP server rejected quit command",
                       "smtp_code" => $vCode,
                       "smtp_rply" => substr($byemsg,4));
            $rval = false;
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $e["error"] . ": " .
                         $byemsg . $this->CRLF;
            }
        }*/

        if(empty($e) || $close_on_error) {
            $this->Close();
        }

        return $rval;
    }

    /**
     * Sends the command RCPT to the SMTP server with the TO: argument of $to.
     * Returns true if the recipient was accepted false if it was rejected.
     *
     * Implements from rfc 821: RCPT <SP> TO:<forward-path> <CRLF>
     *
     * SMTP CODE SUCCESS: 250,251
     * SMTP CODE FAILURE: 550,551,552,553,450,451,452
     * SMTP CODE ERROR  : 500,501,503,421
     * @access public
     * @return bool
     */
    function recipient($to) {
        $this->vError = null; # so no confusion is caused



        if(!$this->isConnected()) {
            $this->vError = array(
                    "error" => "Called Recipient() without being connected");
            return false;
        }

        fputs($this->objConnection,"RCPT TO:<" . $to . ">" . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);


        if($this->do_debug >= 2) {
            echo "SMTP -> FROM SERVER:" . $this->CRLF . $vReply;
        }

        if($vCode != 250 && $vCode != 251) {
            $this->vError =
                array("error" => "RCPT not accepted from server",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }
        return true;
    }

    /**
     * Sends the RSET command to abort and transaction that is
     * currently in progress. Returns true if successful false
     * otherwise.
     *
     * Implements rfc 821: RSET <CRLF>
     *
     * SMTP CODE SUCCESS: 250
     * SMTP CODE ERROR  : 500,501,504,421
     * @access public
     * @return bool
     */
    function reset() {
        $this->vError = null; # so no confusion is caused

        if(!$this->isConnected()) {
            $this->vError = array(
                    "error" => "Called Reset() without being connected");
            return false;
        }

        fputs($this->objConnection,"RSET" . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($this->do_debug >= 2) {
            echo "SMTP -> FROM SERVER:" . $this->CRLF . $vReply;
        }

        if($vCode != 250) {
            $this->vError =
                array("error" => "RSET failed",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }

        return true;
    }

    /**
     * Starts a mail transaction from the email address specified in
     * $from. Returns true if successful or false otherwise. If True
     * the mail transaction is started and then one or more Recipient
     * commands may be called followed by a Data command. This command
     * will send the message to the users terminal if they are logged
     * in.
     *
     * Implements rfc 821: SEND <SP> FROM:<reverse-path> <CRLF>
     *
     * SMTP CODE SUCCESS: 250
     * SMTP CODE SUCCESS: 552,451,452
     * SMTP CODE SUCCESS: 500,501,502,421
     * @access public
     * @return bool
     */
    function send($from) {
        $this->vError = null; # so no confusion is caused

        if(!$this->isConnected()) {
            $this->vError = array(
                    "error" => "Called Send() without being connected");
            return false;
        }

        fputs($this->objConnection,"SEND FROM:" . $from . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($this->do_debug >= 2) {
            echo "SMTP -> FROM SERVER:" . $this->CRLF . $vReply;
        }

        if($vCode != 250) {
            $this->vError =
                array("error" => "SEND not accepted from server",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }
        return true;
    }

    /**
     * Starts a mail transaction from the email address specified in
     * $from. Returns true if successful or false otherwise. If True
     * the mail transaction is started and then one or more Recipient
     * commands may be called followed by a Data command. This command
     * will send the message to the users terminal if they are logged
     * in and send them an email.
     *
     * Implements rfc 821: SAML <SP> FROM:<reverse-path> <CRLF>
     *
     * SMTP CODE SUCCESS: 250
     * SMTP CODE SUCCESS: 552,451,452
     * SMTP CODE SUCCESS: 500,501,502,421
     * @access public
     * @return bool
     */
    function sendAndMail($from) {
        $this->vError = null; # so no confusion is caused

        if(!$this->isConnected()) {
            $this->vError = array(
                "error" => "Called SendAndMail() without being connected");
            return false;
        }

        fputs($this->objConnection,"SAML FROM:" . $from . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($this->do_debug >= 2) {
            echo "SMTP -> FROM SERVER:" . $this->CRLF . $vReply;
        }

        if($vCode != 250) {
            $this->vError =
                array("error" => "SAML not accepted from server",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }
        return true;
    }

    /**
     * Starts a mail transaction from the email address specified in
     * $from. Returns true if successful or false otherwise. If True
     * the mail transaction is started and then one or more Recipient
     * commands may be called followed by a Data command. This command
     * will send the message to the users terminal if they are logged
     * in or mail it to them if they are not.
     *
     * Implements rfc 821: SOML <SP> FROM:<reverse-path> <CRLF>
     *
     * SMTP CODE SUCCESS: 250
     * SMTP CODE SUCCESS: 552,451,452
     * SMTP CODE SUCCESS: 500,501,502,421
     * @access public
     * @return bool
     */
    function sendOrMail($from)
    {
        $this->vError = null; # so no confusion is caused

        if(!$this->isConnected())
        {
            $this->vError = array("error" => "Called SendOrMail() without being connected");
            return false;
        }

        fputs($this->objConnection,"SOML FROM:" . $from . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($this->do_debug >= 2) {
            echo "SMTP -> FROM SERVER:" . $this->CRLF . $vReply;
        }

        if($vCode != 250) {
            $this->vError =
                array("error" => "SOML not accepted from server",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }
        return true;
    }

    /**
     * This is an optional command for SMTP that this class does not
     * support. This method is here to make the RFC821 Definition
     * complete for this class and __may__ be implimented in the future
     *
     * Implements from rfc 821: TURN <CRLF>
     *
     * SMTP CODE SUCCESS: 250
     * SMTP CODE FAILURE: 502
     * SMTP CODE ERROR  : 500, 503
     * @access public
     * @return bool
     */
    function turn()
    {
        $this->vError = array("error" => "This method, TURN, of the SMTP is not implemented");
        if($this->do_debug >= 1) echo "SMTP -> NOTICE: " . $this->vError["error"] . $this->CRLF;
        return false;
    }

    /**
     * Verifies that the name is recognized by the server.
     * Returns false if the name could not be verified otherwise
     * the response from the server is returned.
     *
     * Implements rfc 821: VRFY <SP> <string> <CRLF>
     *
     * SMTP CODE SUCCESS: 250,251
     * SMTP CODE FAILURE: 550,551,553
     * SMTP CODE ERROR  : 500,501,502,421
     * @access public
     * @return int
     */
    public function verify($name)
    {
        $this->vError = null; # so no confusion is caused

        if(!$this->isConnected()) {
            $this->vError = array("error" => "Called Verify() without being connected");
            return false;
        }

        fputs($this->objConnection,"VRFY " . $name . $this->CRLF);

        $vReply = $this->getLines();
        $vCode = substr($vReply,0,3);

        if($this->do_debug >= 2) {
            echo "SMTP -> FROM SERVER:" . $this->CRLF . $vReply;
        }

        if($vCode != 250 && $vCode != 251) {
            $this->vError =
                array("error" => "VRFY failed on name '$name'",
                      "smtp_code" => $vCode,
                      "smtp_msg" => substr($vReply,4));
            if($this->do_debug >= 1) {
                echo "SMTP -> ERROR: " . $this->vError["error"] .
                         ": " . $vReply . $this->CRLF;
            }
            return false;
        }
        return $vReply;
    }

    private function getLines() 
    {
        $vData = "";
        
        while($vString = fgets($this->objConnection, 515))
        {
            $vData .= $vString;
            if(substr($vString, 3, 1) == " ") break;
        }
        
        return $vData;
    }

}


 ?>
