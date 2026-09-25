// JavaScript Document

function trim(str) 
		{    
			 if (str != null) 
			 {        
			 	var i;        
			    for (i=0; i<str.length; i++) 
				{           
					 if (str.charAt(i)!=" ") 
					 {               
					   str=str.substring(i,str.length);                 
					   break;            
					 }        
				}            
					  
					 for (i=str.length-1; i>=0; i--)
					 {            
					 	if (str.charAt(i)!=" ") 
						{                
							str=str.substring(0,i+1);                
						     break;            
						}         
					 }                 
					if (str.charAt(0)==" ") 
					{            
						return "";         
					} 
					else 
					{            
					    return str;         
					}    
				}
			}
function checkcompanyname()
	{
		if(trim(document.frmcontact.company_name.value)=="")
		{
			document.getElementById('lblcompany').innerHTML=nb+"Please enter company name.";
			return false; 
		}
		else
		{
			document.getElementById('lblcompany').innerHTML="";  
			return true; 
		}
	}
	function checkcontactperson()
	{
		if(trim(document.frmcontact.contact_person.value)=="")
		{
			document.getElementById('lblcontactperson').innerHTML=nb+"Please enter contact person.";
			return false; 
		}
		else
		{
			document.getElementById('lblcontactperson').innerHTML="";  
			return true; 
		}
	}
	function checkdesignation()
	{
		if(trim(document.frmcontact.designation.value)=="")
		{
			document.getElementById('lbldesignation').innerHTML=nb+"Please enter designation.";
			return false; 
		}
		else
		{
			document.getElementById('lbldesignation').innerHTML="";  
			return true; 
		}
	}
	function checkaddress()
	{
		if(trim(document.frmcontact.address.value)=="")
		{
			document.getElementById('lbladdress').innerHTML=nb+"Please enter address.";
			return false; 
		}
		else
		{
			document.getElementById('lbladdress').innerHTML="";  
			return true; 
		}
	}
	function checkcity()
	{
		if(trim(document.frmcontact.city.value)=="")
		{
			document.getElementById('lblcity').innerHTML=nb+"Please enter city.";
			return false; 
		}
		else
		{
			document.getElementById('lblcity').innerHTML="";  
			return true; 
		}
	}
	function checkpincode()
	{
		if(trim(document.frmcontact.pincode.value)=="")
		{
			document.getElementById('lblpincode').innerHTML=nb+"Please enter pincode.";
			return false; 
		}
		else
		{
		
			if(isNaN(document.frmcontact.pincode.value))
			{
				document.getElementById('lblpincode').innerHTML=nb+"Pincode must be numeric.";
			return false; 
			}
			else
			{
				document.getElementById('lblpincode').innerHTML="";  
				return true; 
			}
		}
	}
	function checkstate()
	{
		if(trim(document.frmcontact.state.value)=="")
		{
			document.getElementById('lblstate').innerHTML=nb+"Please enter state.";
			return false; 
		}
		else
		{
			document.getElementById('lblstate').innerHTML="";  
			return true; 
		}
	}
	function checkcountry()
	{
		if(trim(document.frmcontact.country.value)=="")
		{
			document.getElementById('lblcountry').innerHTML=nb+"Please enter country.";
			return false; 
		}
		else
		{
			document.getElementById('lblcountry').innerHTML="";  
			return true; 
		}
	}
	function checktelephone()
	{
		if(trim(document.frmcontact.telephone.value)=="")
		{
			document.getElementById('lbltelephone').innerHTML=nb+"Please enter telephone number.";
			return false; 
		}
		else
		{
		
			if(isNaN(document.frmcontact.telephone.value))
			{
				document.getElementById('lbltelephone').innerHTML=nb+"Telephone number must be numeric.";
			return false; 
			}
			else
			{
				document.getElementById('lbltelephone').innerHTML="";  
				return true; 
			}
		}
	}
	function checkemail()
	{
		var _blkmail=true;
		if(document.frmcontact.email.value=="")
		{
			document.getElementById('lblemail').innerHTML=nb+"Please enter email. ";
			_blkmail=false; 
		}
		else
		{	
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   			var address = document.frmcontact.email.value;
			if(reg.test(address) == false)
			{
				document.getElementById('lblemail').innerHTML=nb+"Please enter valid email."; 
				_blkmail=false;  
			}
			else
			{
				_blkmail=true;
				document.getElementById('lblemail').innerHTML="";  
			}
		}
		if(_blkmail==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function checkwebsite()
	{
		if(trim(document.frmcontact.website.value)=="")
		{
			document.getElementById('lblwebsite').innerHTML=nb+"Please enter website.";
			return false; 
		}
		else
		{
			document.getElementById('lblwebsite').innerHTML="";  
			return true; 
		}
	}
	function checkmessage()
	{
		if(trim(document.frmcontact.message.value)=="")
		{
			document.getElementById('lblmessage').innerHTML=nb+"Please enter message.";
			return false; 
		}
		else
		{
			document.getElementById('lblmessage').innerHTML="";  
			return true; 
		}
	}
	function checkVerify()
	{
		if(trim(document.frmcontact.vcode.value)=="")
		{
			document.getElementById('lblVcode').innerHTML=nb+"Please enter verification code";
			return false;				
		}
		else
		{
			document.getElementById('lblVcode').innerHTML="";
			return true;		
		}
	}
	function funnum(e)
	{
	
		if(window.event)
		{
			if((event.keyCode>=65 && event.keyCode<=122))
			{
				event.keyCode=0;
			}
			else
			{
				
			}
		}
		else
		{
			if((e.which>=65 && e.which<=122))
			{
				return false;
			}
			else
			{
				
			}
		}
	}