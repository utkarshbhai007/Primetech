<?php

class Validator
{
	private $vControlName = '';
	private $vControlType = '';
	private $vControlLabel = '';
	private $vDataType = '';
	private $vIsOptional = '';
	private $vMin = '';
	private $vMax = '';
	private $vErrorBoxId = '';
	private $vErrorClassName = '';
	private $vCustomError = '';
	private $vErrorDesc = '';

	public function __construct($pControlName, $pControlType, $pControlLabel='', $pDataType, $pIsOptional=false, $pMin='', $pMax='', $pErrorBoxId='', $pErrorClassName='', $pCustomError='')
	{
		$this->vControlName = $pControlName;
		$this->vControlType = $pControlType;
		$this->vControlLabel = $pControlLabel;
		$this->vDataType = $pDataType;
		$this->vIsOptional = $pIsOptional;
		$this->vMin = $pMin;
		$this->vMax = $pMax;
		$this->vErrorBoxId = $pErrorBoxId;
		$this->vErrorClassName = $pErrorClassName;
		$this->vCustomError = $pCustomError;
		$this->vErrorDesc = '';
	}

	public function getControlName()
	{
		return $this->vControlName;
	}

	public function getControlType()
	{
		return $this->vControlType;
	}

	public function getControlLabel()
	{
		return $this->vControlLabel;
	}

	public function getDataType()
	{
		return $this->vDataType;
	}

	public function getIsOptional()
	{
		return $this->vIsOptional;
	}

	public function getMin()
	{
		return $this->vMin;
	}

	public function getMax()
	{
		return $this->vMax;
	}

	public function getErrorBoxId()
	{
		return $this->vErrorBoxId;
	}

	public function getErrorClassName()
	{
		return $this->vErrorClassName;
	}

	public function getCustomError()
	{
		return $this->vCustomError;
	}

	public function getError()
	{
		return $this->vErrorDesc;
	}

	public function setError($pValue)
	{
		$this->vErrorDesc = $pValue;
	}
        
        public function getErrorJavaScript()
	{            
		if($this->vCustomError!='' || $this->vErrorDesc!='')  $this->vErrorJS = "$('[name=" . $this->vControlName . "]').addClass('error').attr('data-error', '" . ($this->vCustomError ? $this->vCustomError : $this->vErrorDesc) . "');\n";
		return $this->vErrorJS;
	}
}

class DataValidator
{
	const CONTROL_TEXTBOX = 1002;
	const CONTROL_CHECKBOX = 2002;
	const CONTROL_MULTICHECKBOX = 3002;
	const CONTROL_RADIOBUTTON = 4002;
	const CONTROL_COMBOBOX = 5002;
	const CONTROL_LISTBOX = 6002;
	const CONTROL_FILE = 7002;
	const CONTROL_HIDDEN = 8002;

	const DATATYPE_URI = 1001;
	const DATATYPE_FAX = 2001;
	const DATATYPE_FAX_ISD = 3001;
	const DATATYPE_REAL = 4001;
	const DATATYPE_DATE = 5001;
	const DATATYPE_TIME = 6001;
	const DATATYPE_HTML = 7001;
	const DATATYPE_PHONE = 8001;
	const DATATYPE_PHONE_ISD = 9001;
	const DATATYPE_EMAIL = 10001;
	const DATATYPE_MOBILE = 11001;
	const DATATYPE_MOBILE_ISD = 12001;
	const DATATYPE_STRING = 13001;
	const DATATYPE_PINZIP = 14001;
	const DATATYPE_INTEGER = 15001;
	const DATATYPE_LOGINID = 16001;
	const DATATYPE_PASSWORD = 17001;
	const DATATYPE_DATETIME = 18001;
	const DATATYPE_ALPHABETIC = 19001;
	const DATATYPE_ALPHANUMERIC = 20001;

	const MESSAGE_REQUIRED_VALUE = "Please enter the value for %s";
	const MESSAGE_VALID_CHECK_FAILED = "Please provide valid %s";
	const MESSAGE_MAXLEN_CHECK_FAILED = "%s cannot have more than %s characters. It has %s characters.";
	const MESSAGE_MINLEN_CHECK_FAILED = "%s must have minimum of %s characters. It has only %s characters.";
	const MESSAGE_MAXVAL_CHECK_FAILED = "%s cannot be greater than %s.";
	const MESSAGE_MINVAL_CHECK_FAILED = "%s must have minimum value of %s.";
	const MESSAGE_NUM_CHECK_FAILED = "Please specify numeric value for %s.";
	const MESSAGE_INTEGER_CHECK_FAILED = "Please specify integer value for %s.";
	const MESSAGE_ALPHA_CHECK_FAILED = "Please provide alphabetic input for %s";
	const MESSAGE_LESSTHAN_CHECK_FAILED = "%s value can not be less than %s.";
	const MESSAGE_GREATERTHAN_CHECK_FAILED = "%s value can not exceed %s.";
	const MESSAGE_SELMIN_CHECK_FAILED = "Please select minimum %d options for %s";
	const MESSAGE_SELONE_CHECK_FAILED = "Please select an option for %s";
	const MESSAGE_EQELMNT_CHECK_FAILED = "Value of %s should be same as that of %s";
	const MESSAGE_NEELMNT_CHECK_FAILED = "Value of %s should not be same as that of %s";
	const MESSAGE_DONTSEL_CHECK_FAILED = "Wrong option selected for %s";
	const MESSAGE_ALPHA_S_CHECK_FAILED = "Please provide alphabetic input for %s";
	const MESSAGE_ALNUM_CHECK_FAILED = "Please provide an alpha-numeric input for %s";
	const MESSAGE_ALNUM_S_CHECK_FAILED = "Please provide an alpha-numeric input for %s";
	const MESSAGE_REGEXP_CHECK_FAILED = "Please provide a valid input for %s";
	const MESSAGE_PHONE_CHECK_FAILED = "%s must be in this format 11-66666666";
	const MESSAGE_PHONE_ISD_CHECK_FAILED = "%s must be in this format +91-11-66666666";
	const MESSAGE_MOBILE_CHECK_FAILED = "%s must be in this format 1111111111";
	const MESSAGE_MOBILE_ISD_CHECK_FAILED = "%s must be in this format +91-1111111111";
	
	const DIGITS = '0123456789';
	const LETTERSU = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	const LETTERSL = 'abcdefghijklmnopqrstuvwxyz';
	const SPCHARS = '~!#$%^&*()_+{}[]|\:��"\'<>?`@,-';

	private $vFormName = '';
	private $vIsJavaScript = false;
	private $vValidators = Array();

	public function __construct($pFormName='', $pIsJavaScript=false)
	{
		$this->vFormName = $pFormName;
		$this->vIsJavaScript = $pIsJavaScript;
	}

	public function addValidator($pControlName, $pControlType=self::CONTROL_TEXTBOX, $pControlLabel='', $pDataType=self::DATATYPE_STRING, $pIsOptional=false, $pMin='', $pMax='', $pErrorBoxId='', $pErrorClassName='', $pCustomError='')
	{
		$objValidator = new Validator($pControlName, $pControlType, $pControlLabel, $pDataType, $pIsOptional, $pMin, $pMax, $pErrorBoxId, $pErrorClassName, $pCustomError);
		array_push($this->vValidators, $objValidator);
		return $objValidator;
	}

	public function clearValidator()
	{
		unset($this->vValidators);
	}

	public function validateAllData()
	{
		$vIsError = false;

		for($i=0;$i<count($this->vValidators);$i++)
		{
			if(!$this->isValidData($i)) $vIsError = true;
		}

		return !$vIsError;
	}

	public function getValidators()
	{
		return $this->vValidators;
	}

	private function isValidData($pItem)
	{
		$objValidator = $this->vValidators[$pItem];

		$controlName = $objValidator->getControlName();
		$controlValue = (isset($_REQUEST[$controlName]) ? $_REQUEST[$controlName] : "");
		$controlType = $objValidator->getControlType();
		$controlLabel = $objValidator->getControlLabel();
		$dataType = $objValidator->getDataType();
		$IsOptional = $objValidator->getIsOptional();
		$min = $objValidator->getMin();
		$max = $objValidator->getMax();
		$errorBoxId = $objValidator->getErrorBoxId();
		$errorClassName = $objValidator->getErrorClassName();
		$customError = $objValidator->getCustomError();
		
		if(!is_array($controlValue)) $controlValue = trim($controlValue);

		if(!is_array($controlValue)) $controlValueLength = strlen($controlValue);

		if($IsOptional && $controlValueLength==0) return true;
		
		switch ($controlType)
		{
			case self::CONTROL_TEXTBOX:

				switch($dataType)
				{
					case self::DATATYPE_DATE:
					case self::DATATYPE_TIME:
					case self::DATATYPE_HTML:
					case self::DATATYPE_STRING:
					case self::DATATYPE_EMAIL:
					case self::DATATYPE_URI:
					case self::DATATYPE_PINZIP:
					case self::DATATYPE_LOGINID:
					case self::DATATYPE_PASSWORD:
					case self::DATATYPE_DATETIME:
					case self::DATATYPE_ALPHABETIC:
					case self::DATATYPE_ALPHANUMERIC:
						
						if($dataType==self::DATATYPE_DATE) { $min = 6; $max = 10; }
						elseif($dataType==self::DATATYPE_TIME) { $min = 3; $max = 5; }
						elseif($dataType==self::DATATYPE_PINZIP) { $min = 6; $max = 6; }
						elseif($dataType==self::DATATYPE_DATETIME) { $min = 10; $max = 16; }
						
						if($controlValueLength < $min)
						{
							$objValidator->setError(sprintf(self::MESSAGE_MINLEN_CHECK_FAILED,$controlLabel,$min,$controlValueLength));
							return false;
						}

						if($max!=-1 && $controlValueLength > $max)
						{
							$objValidator->setError(sprintf(self::MESSAGE_MAXLEN_CHECK_FAILED,$controlLabel,$max,$controlValueLength));
							return false;
						}

						if($dataType==self::DATATYPE_URI)
						{
							if(!self::isValidUrl($controlValue))
							{
								$objValidator->setError(sprintf(self::MESSAGE_VALID_CHECK_FAILED,$controlLabel));
								return false;
							}
						}

						if($dataType==self::DATATYPE_ALPHABETIC)
						{
							if(!self::isValidAlphabetic($controlValue))
							{
								$objValidator->setError(sprintf(self::MESSAGE_VALID_CHECK_FAILED,$controlLabel));
								return false;
							}
						}

						if($dataType==self::DATATYPE_ALPHANUMERIC)
						{
							if(!self::isValidAlphaNumeric($controlValue))
							{
								$objValidator->setError(sprintf(self::MESSAGE_VALID_CHECK_FAILED,$controlLabel));
								return false;
							}
						}

						if($dataType==self::DATATYPE_EMAIL)
						{
							if(!self::isValidEmail($controlValue))
							{
								$objValidator->setError(sprintf(self::MESSAGE_VALID_CHECK_FAILED,$controlLabel));
								return false;
							}
						}

						if($dataType==self::DATATYPE_PINZIP)
						{
							if(!is_numeric($controlValue))
							{
								$objValidator->setError(sprintf(self::MESSAGE_NUM_CHECK_FAILED,$controlLabel));
								return false;
							}
						}

						if($dataType==self::DATATYPE_DATE)
						{
							if(!self::isValidDate($controlValue))
							{
								$objValidator->setError(sprintf(self::MESSAGE_VALID_CHECK_FAILED,$controlLabel));
								return false;
							}
						}

						if($dataType==self::DATATYPE_TIME)
						{
							if(!self::isValidTime($controlValue))
							{
								$objValidator->setError(sprintf(self::MESSAGE_VALID_CHECK_FAILED,$controlLabel));
								return false;
							}
						}
						
						if($dataType==self::DATATYPE_DATETIME)
						{
							if(!self::isValidDateTime($controlValue))
							{
								$objValidator->setError(sprintf(self::MESSAGE_VALID_CHECK_FAILED,$controlLabel));
								return false;
							}
						}
						
						if($dataType==self::DATATYPE_LOGINID)
						{
							if(!self::isValidLoginId($controlValue))
							{
								$objValidator->setError(sprintf(self::MESSAGE_VALID_CHECK_FAILED,$controlLabel));
								return false;
							}
						}

						if($dataType==self::DATATYPE_PASSWORD)
						{
							if(!self::isValidPassword($controlValue))
							{
								$objValidator->setError(sprintf(self::MESSAGE_VALID_CHECK_FAILED,$controlLabel));
								return false;
							}
						}

						break;

					case self::DATATYPE_REAL:
					case self::DATATYPE_INTEGER:

						if(!is_numeric($controlValue))
						{
							$objValidator->setError(sprintf(self::MESSAGE_NUM_CHECK_FAILED,$controlLabel));
							return false;
						}

						if($controlValue < $min)
						{
							$objValidator->setError(sprintf(self::MESSAGE_MINVAL_CHECK_FAILED,$controlLabel,$min,$controlValueLength));
							return false;
						}

						if($controlValue > $max)
						{
							$objValidator->setError(sprintf(self::MESSAGE_MAXVAL_CHECK_FAILED,$controlLabel,$max,$controlValueLength));
							return false;
						}


						if($dataType==self::DATATYPE_INTEGER)
						{
							if(strpos($controlValue, ".") > 0)
							{
								$objValidator->setError(sprintf(self::MESSAGE_INTEGER_CHECK_FAILED ,$controlLabel));
								return false;
							}
						}
						break;

					case self::DATATYPE_PHONE_ISD:
					case self::DATATYPE_FAX_ISD:
						if (!preg_match("/^([+]{0,1})([0-9]{2,3})-([0-9]{2,5})-([0-9]{5,8})$/", $controlValue)) {
							$objValidator->setError(sprintf(self::MESSAGE_PHONE_ISD_CHECK_FAILED ,$controlLabel));
							return false;
						}
						break;

					case self::DATATYPE_PHONE:
					case self::DATATYPE_FAX:
						if (!preg_match("/^([0-9]{2,5})-([0-9]{5,8})$/", $controlValue)) {
							$objValidator->setError(sprintf(self::MESSAGE_PHONE_CHECK_FAILED ,$controlLabel));
							return false;
						}
						break;
						
					case self::DATATYPE_MOBILE_ISD:
						if (!preg_match("/^([+]{0,1})([0-9]{2,3})-([0-9]{10})$/", $controlValue)) {
							$objValidator->setError(sprintf(self::MESSAGE_MOBILE_ISD_CHECK_FAILED ,$controlLabel));
							return false;
						}
						break;

					case self::DATATYPE_MOBILE:
						if (!preg_match("/^([0-9]{10})$/", $controlValue)) {
							$objValidator->setError(sprintf(self::MESSAGE_MOBILE_CHECK_FAILED ,$controlLabel));
							return false;
						}
						break;

				}
				break;

			case self::CONTROL_RADIOBUTTON:
				if ($controlValueLength==0)
				{
					$objValidator->setError(sprintf(self::MESSAGE_SELMIN_CHECK_FAILED,1,$controlLabel));
					return false;
				}
				break;

			case self::CONTROL_CHECKBOX:
				if($controlValueLength==0)
				{
					$objValidator->setError(sprintf(self::MESSAGE_SELMIN_CHECK_FAILED,1,$controlLabel));
					return false;
				}
				break;

			case self::CONTROL_MULTICHECKBOX:
				if(!is_array($controlValue) || count($controlValue)==0)
				{
					$objValidator->setError(sprintf(self::MESSAGE_SELMIN_CHECK_FAILED,1,$controlLabel));
					return false;
				}
				break;
				
			case self::CONTROL_COMBOBOX:
				if ($controlValueLength==0)
				{
					$objValidator->setError(sprintf(self::MESSAGE_SELONE_CHECK_FAILED,$controlLabel));
					return false;
				}
				break;

			case self::CONTROL_LISTBOX:
				if ($controlValueLength==0)
				{
					$objValidator->setError(sprintf(self::MESSAGE_SELONE_CHECK_FAILED,$controlLabel));
					return false;
				}
				break;

			case self::CONTROL_HIDDEN:
				if ($controlValueLength==0)
				{
					$objValidator->setError(sprintf(self::MESSAGE_REQUIRED_VALUE,$controlLabel));
					return false;
				}
				break;

			case self::CONTROL_FILE:
				break;
		}
		
		return true;
	}

	private static function isValidAlphabetic($data)
	{
		$isValid = !(preg_match('/[^a-zA-Z ]/', $data));
		if(!$isValid) return false;
		return true;
	}

	private static function isValidUrl($data)
	{
//		$isValid = (preg_match("/^((http(s?):\\/\\/|ftp:\\/\\/){0,1})((\w+\.)+)\w{2,}(\/?)$/i", $data));
		$isValid = (preg_match("/^((http(s?):\\/\\/|ftp:\\/\\/){0,1})((\w+\.)+)[A-Za-z0-9\.\-]{2,}(\/?)$/i", $data));
		if(!$isValid) return false;
		return true;
	}

	private static function isValidAlphaNumeric($data)
	{
		$isValid = !(preg_match('/[^a-zA-Z0-9]/', $data));
		if(!$isValid) return false;
		return true;
	}

	private static function isValidLoginId($data)
	{
		$isValid = !(preg_match('/[^a-zA-Z0-9_.\-]/', $data));
		if(!$isValid) return false;
		return true;
	}

	private static function isValidPassword($data)
	{
		$isValid = !(preg_match('/[^a-zA-Z0-9$%^&*#@!~\-]/', $data)); if(!$isValid) return false;
		return true;
	}

	private static function isValidString($data)
	{
		$isValid = !(preg_match('/[^a-zA-Z0-9$%^&*#@!~":;.,?]/', $data));
		if(!$isValid) return false;
		return true;
	}

	private static function isValidEmail($data)
	{
		//return preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/", $data);
		$Addresses = preg_split('![\n\r]+!', $data);

		foreach($Addresses as $Address)
		{
			$isValid = !(preg_match('!@.*@|\.\.|\,|\;!', $Address) ||
			!preg_match('!^.+\@(\[?)[a-zA-Z0-9\.\-]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$!', $Address));

			if(!$isValid) return false;
		}

		return true;
	}

	private static function isValidDate($data)
	{
		$i = 0;
		$data = trim($data);
		if($data=='') return false;
	
		$vTDate[0] = strtok($data, "-/");
		while($vTDate[$i] !== false) $vTDate[++$i] = strtok("-/");
		
		if(count($vTDate)!=4) return false;
		
		return checkdate($vTDate[1], $vTDate[0], $vTDate[2]);
	}

	private static function isValidTime($data)
	{
		return preg_match('/^\d\d(:[0-5]\d){1,2}$/', $data);
	}

	private static function isValidDateTime($data)
	{
		$i = 0;
		$data = trim($data);
		if($data=='') return false;
		$data = str_replace(" ", "|", $data);
		
		$vTDate[0] = strtok($data, "-/|:");
		while($vTDate[$i] !== false) $vTDate[++$i] = strtok("-/|");
		
		if(count($vTDate)!=5) return false;
		
		return (checkdate($vTDate[1], $vTDate[0], $vTDate[2]) && self::isValidTime($vTDate[3]));
	}
}

?>