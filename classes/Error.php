<?php 

class CustomAppError
{
	var $vNo;
	var $vDesc;
	
	const NONE = 0;
	const QUERY_FAILED = 1001;
	const USER_LOGIN_FAILED = 2001;
	const MEMBER_LOGIN_FAILED = 3001;
	const DATA_FETCH_FAILED = 4001;
	const CONNECTION_FAILED = 5001;
	const DATABASE_NOT_FOUND = 6001;
	const USER_LOGIN_INACTIVE = 7001;
	const MEMBER_LOGIN_INACTIVE = 8001;
	const INVALID_INPUT_VALUES = 9001;

	const USER_NOT_FOUND = 10001;
	const PRODUCT_CATEGORY_NOT_FOUND = 11001;
	const PRODUCT_NOT_FOUND = 12001;
	const PHOTO_NOT_FOUND = 13001;
	const VIDEO_NOT_FOUND = 14001;
	const NEWS_NOT_FOUND = 15001;
	const NETWORK_NOT_FOUND = 16001;
	const NETWORK_CATEGORY_NOT_FOUND = 17001;
	const COUNTRY_NOT_FOUND = 18001;
	const STATE_NOT_FOUND = 19001;
	const CLIENTELE_NOT_FOUND = 20001;
	const DOWNLOAD_NOT_FOUND = 21001;
	const VACANCY_NOT_FOUND = 22001;
	
	const DUPLICATE_NEWS = 23001;
	const DUPLICATE_USER_EMAIL = 24001;
	const DUPLICATE_USER_LOGINID = 25001;
    const DUPLICATE_MEMBER_LOGINID = 26001;
    const DUPLICATE_MEMBER_EMAIL = 27001;
    const DUPLICATE_COUNTRY = 28001;
    const DUPLICATE_NETWORK_CATEGORY = 29001;
        
    const ALBUM_HAS_PHOTOS = 30001;
    const ALBUM_HAS_VIDEOS = 31001;
    const ALBUM_HAS_ALBUM = 32001;
	
    const MAIL_LIST_NOT_FOUND = 33001;
    const DUPLICATE_MAIL_LIST_EMAIL = 34001;
    
    const DUPLICATE_REGISTRATION_EMAIL = 35001;
        
	const CAPTCHA_NO_FONT = 61001;
	const FAILED_RIGHT_ASSIGN = 62001;
	const CAPTCHA_NO_TEXT_SUPPORT = 63001;
	
	function __construct($pNo=self::NONE)
	{
		$this->setError($pNo);
	}
	
	public function reset()
	{
		$this->setError(self::NONE);
	}
	
	public function isError()
	{
		return ($this->vNo!=self::NONE);
	}
		
	public function getError()
	{
		return $this->vNo;
	}

	public function setError($pNo)
	{
		$this->vNo = $pNo;
		$this->setDescription();
	}
		
	public function getDescription()
	{
		return $this->vDesc;
	}
	
	private function setDescription()
	{
		switch($this->vNo)
		{
			case self::QUERY_FAILED:
				$this->vDesc = "QUERY FAILED.";
				break;
			case self::DATA_FETCH_FAILED:
				$this->vDesc = "DATA FETCH FAILED.";
				break;
			case self::CONNECTION_FAILED:
				$this->vDesc = "CONNECTION FAILED.";
				break;
			case self::INVALID_INPUT_VALUES:
				$this->vDesc = "INVALID INPUT VALUES.";
				break;
			case self::USER_LOGIN_FAILED:
				$this->vDesc = "INVALID LOGIN ID OR PASSWORD.";
				break;
			case self::USER_LOGIN_INACTIVE:
				$this->vDesc = "ACCOUNT LOGIN HAS BEEN DISABLED.";
				break;
			case self::MEMBER_LOGIN_FAILED:
				$this->vDesc = "INVALID LOGIN ID OR PASSWORD.";
				break;
			case self::MEMBER_LOGIN_INACTIVE:
				$this->vDesc = "ACCOUNT LOGIN HAS BEEN DISABLED.";
				break;
			case self::DATABASE_NOT_FOUND:
				$this->vDesc = "DATABASE NOT FOUND.";
				break;
			case self::USER_NOT_FOUND:
				$this->vDesc = "USER NOT FOUND.";
				break;
			case self::PRODUCT_CATEGORY_NOT_FOUND:
				$this->vDesc = "PRODUCT CATEGORY NOT FOUND.";
				break;
			case self::PHOTO_NOT_FOUND:
				$this->vDesc = "PHOTO NOT FOUND.";
				break;
			case self::VIDEO_NOT_FOUND:
				$this->vDesc = "VIDEO NOT FOUND.";
				break;
			case self::NEWS_NOT_FOUND:
				$this->vDesc = "NEWS NOT FOUND.";
				break;
			case self::NETWORK_NOT_FOUND:
				$this->vDesc = "NETWORK NOT FOUND.";
				break;
			case self::NETWORK_CATEGORY_NOT_FOUND:
				$this->vDesc = "NETWORK CATEGORY NOT FOUND.";
				break;
			case self::COUNTRY_NOT_FOUND:
				$this->vDesc = "COUNTRY NOT FOUND.";
				break;
			case self::STATE_NOT_FOUND:
				$this->vDesc = "STATE NOT FOUND.";
				break;
			case self::DOWNLOAD_NOT_FOUND:
				$this->vDesc = "DOWNLOAD NOT FOUND.";
				break;
			case self::CLIENTELE_NOT_FOUND:
				$this->vDesc = "CLIENTELE NOT FOUND.";
				break;
			case self::VACANCY_NOT_FOUND:
				$this->vDesc = "VACANCY NOT FOUND.";
				break;
			case self::DUPLICATE_USER_LOGINID:
				$this->vDesc = "USER WITH SAME LOGIN ID ALREADY EXIST.";
				break;
			case self::DUPLICATE_USER_EMAIL:
				$this->vDesc = "USER WITH SAME EMAIL ALREADY EXIST.";
				break;
			case self::DUPLICATE_MEMBER_LOGINID:
				$this->vDesc = "MEMBER WITH SAME LOGIN ID ALREADY EXIST.";
				break;
			case self::DUPLICATE_MEMBER_EMAIL:
				$this->vDesc = "MEMBER WITH SAME EMAIL ALREADY EXIST.";
				break;
			case self::DUPLICATE_COUNTRY:
				$this->vDesc = "COUNTRY WITH SAME NAME ALREADY EXIST.";
				break;
			case self::DUPLICATE_NETWORK_CATEGORY:
				$this->vDesc = "NETWORK CATEGORY WITH SAME NAME ALREADY EXIST.";
				break;
            case self::ALBUM_HAS_PHOTOS:
				$this->vDesc = "THE ALBUM CONTAINS PHOTOS AND HENCE MUST BE FINAL.";
				break;
            case self::ALBUM_HAS_ALBUM:
				$this->vDesc = "THE ALBUM CONTAINS ALBUM AND HENCE CAN NOT BE FINAL.";
				break;    
            case self::ALBUM_HAS_VIDEOS:
				$this->vDesc = "THE ALBUM CONTAINS VIDEOS AND HENCE MUST BE FINAL.";
				break;    
			case self::CAPTCHA_NO_FONT:
				$this->vDesc = "CAPTCHA FONT DOES NOT EXIST.";
				break;
			case self::CAPTCHA_NO_TEXT_SUPPORT:
				$this->vDesc = "CAPTCHA TEXT NOT SUPPORTED.";
				break;
            case self::MAIL_LIST_NOT_FOUND:
				$this->vDesc = "MAIL LIST NOT FOUND.";
				break;    
        	case self::DUPLICATE_MAIL_LIST_EMAIL:
				$this->vDesc = "MEMBER WITH SAME EMAIL ALREADY EXIST.";
				break;      
            case self::DUPLICATE_REGISTRATION_EMAIL:
				$this->vDesc = "MEMBER WITH SAME EMAIL ALREADY EXIST.";
				break;    
			default:
				$this->vDesc = "";
				break;
		}
	}
}

?>