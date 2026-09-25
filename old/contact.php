<?
	#  START COPY HERE   #
	# COPY ALL THE PHP CODE AND PASTE IN YOUR PAGE AT TOP  #
?>
<?
	if(isset($_POST["Submit"]) && $_POST["Submit"]=="Submit")
	{
		$verif_box = $_POST["vcode"];
		$wrong_code=0;
		if(md5($verif_box).'a4xn' == $_COOKIE['verycode'])
		{
		
		#-------------------------------------------------------------------#
		######   MAKE CHANGE ONLY IN FOLLOWING 5 ITEMS ####################
		
		
			$domainname="primetechmixer.com";  // Change here domain name
			$mailtype="Real Web Inquiry";  // Inquiry Information type etc..
		
			$to="primetechind@gmail.com";   // change this where to send
			
			$cc="primetechindustries@yahoo.co.in"; // Here you can add Cc
			$Bcc="info@webmarketindia.com"; // Here you can Bcc
			
			$subject = "Real Web Inquiry";  // change subject
			
			$thank="thanks.htm";   // Give here path of page thankyou etc
		
		#-------------------------------------------------------------------#
			
		#################  Don't Disturb Following Code ###################
			
			$mailbody='<html>
<head>
 <style type="text/css">
 	#maindiv{
		width:700px;
		height:auto;
		border:2px solid #BBBBBB;
	}
	.title{
		color:#FFFFFF;
		font-size:36px;
		padding:10px;
		font-family:Verdana, Arial, Helvetica, sans-serif;
	}
	.fontgreybig{
		color:#666666;
		font-size:12px;
		font-weight:bold;
		font-family:Verdana, Arial, Helvetica, sans-serif;
	}
	.fontgreysmall{
		color:#666666;
		font-size:11px;
		font-family:Verdana, Arial, Helvetica, sans-serif;
	}
 </style>
</head>

<body>
	<center>
	<div id="maindiv">
	<table width="100%" border="0">
	  <tr>
		<td>
		<table width="100%" border="0" bgcolor="#BBBBBB">
          <tr >
            <td width="61%" height="100" class="title">'.$domainname.'</td>
            <td width="39%" height="100">&nbsp;</td>
          </tr>
        </table>		</td>
	  </tr>
	  <tr>
		<td><table width="100%" border="0">
          <tr>
            <td width="61%" class="fontgreybig">'.$mailtype.' </td>
            <td width="39%" class="fontgreybig">Date : '.date('Y-m-d').' </td>
          </tr>
        </table></td>
	  </tr>
	  <tr>
		<td align="center"><table width="98%" border="1" cellpadding="2" cellspacing="2" bordercolor="#BBBBBB" style="border-collapse:collapse;">
          <tr>
            <td width="32%" class="fontgreybig">Company Name : </td>
            <td width="68%" class="fontgreysmall">'.$_POST["company_name"].'</td>
          </tr>
          <tr>
            <td class="fontgreybig">Contact Person : </td>
            <td class="fontgreysmall">'.$_POST["contact_person"].'</td>
          </tr>
		   <tr>
            <td class="fontgreybig">Designation : </td>
            <td class="fontgreysmall">'.$_POST["designation"].'</td>
          </tr>
		   <tr>
            <td class="fontgreybig">Address : </td>
            <td class="fontgreysmall">'.$_POST["address"].'</td>
          </tr>
		   <tr>
            <td class="fontgreybig">City : </td>
            <td class="fontgreysmall">'.$_POST["city"].'</td>
          </tr>
		   <tr>
            <td class="fontgreybig">Pin-code : </td>
            <td class="fontgreysmall">'.$_POST["pincode"].'</td>
          </tr>
		   <tr>
            <td class="fontgreybig">State : </td>
            <td class="fontgreysmall">'.$_POST["state"].'</td>
          </tr>
		   <tr>
            <td class="fontgreybig">Country : </td>
            <td class="fontgreysmall">'.$_POST["country"].'</td>
          </tr>
		   <tr>
            <td class="fontgreybig">Telephone : </td>
            <td class="fontgreysmall">'.$_POST["telephone"].'</td>
          </tr>
		   <tr>
            <td class="fontgreybig">E-mail : </td>
            <td class="fontgreysmall">'.$_POST["email"].'</td>
          </tr>
		   <tr>
            <td class="fontgreybig">Website : </td>
            <td class="fontgreysmall">'.$_POST["website"].'</td>
          </tr>
		   <tr>
            <td class="fontgreybig">Message : </td>
            <td class="fontgreysmall">'.$_POST["message"].'</td>
          </tr>
		  </table></td>
	  </tr>
	  <tr>
	    <td align="right" class="fontgreysmall">All Right Reserve '.$domainname.' </td>
      </tr>
	</table>
	</div>
	</center>
</body>
</html>

';
				
				$headers  = "MIME-Version: 1.0;\r\n"; 
				$headers .= "Content-type: text/html; charset=iso-8859-1;\r\n"; 
				$headers .="From: ".$_POST["email"]."\r\n";
				$headers .="Return-path: ".$_POST["email"]."\r\n";
				$headers .= "Cc: ".$cc."\r\n";
				$headers .= "Bcc: ".$Bcc."\r\n";
				$body = $mailbody;
				mail($to,$subject,$body,$headers); 
				header("Location: ".$thank);
		}
		else
		{
			$wrong_code=1;
		}
	
	}
?>
<?
	# END COPY - COPY ABOVE CODE AND PASTE AT THE TOP OF THE PAGE.  #
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contact Us</title>


<? # COPY FOLLOWING STYLE AND JAVASCRIPT AND PASTE IN <HEAD> </HEAD>  TAG ?>

<style type="text/css" >
.redtext
{
	font-family: tahoma;
	font-size: 11px;
	color: Red;
	text-decoration: none;
	font-weight:bold;
}
.texttitle
{ 	
	font-family:Tahoma;
	font-size:12px;
	text-decoration:none;
	color:#575757;
	line-height:15px;
	text-align:right;
}
.textarea {
	border:1px solid #CCCCCC;
	width:250px;
	height:60px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#000000;
}	
.newbox {
	border:1px solid #CCCCCC;
	width:250px;
	height:15px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#000000;
	}
.buttonlink {
	background-color:#e5e5e5;
	border:1px solid #575757;
	font-family:tahoma;
	font-size:11px;
	color:#000000;
	line-height:12px;
	font-weight:bold;
	padding:2px 5px 2px 5px;
	text-decoration:none;
	}
</style>
<script type="text/javascript" src="validation.js"></script>
<script type="text/javascript">
	var nb="&nbsp;";	
	function verify()
	{
	
		// HELP : iN THE FOLLOWING LIST MAKE ACTIVE THAT MANY FIELDS YOU WANT TO FILL COMPULSORY..  DEFAULT ALL ACTIVE  For Eg :  website and message are in comment now for will not ask to fill these fields.  
		
		var arrTmp=new Array();
		//arrTmp[0]=checkcompanyname();   
		//arrTmp[1]=checkcontactperson();
		//arrTmp[2]=checkdesignation();
		//arrTmp[3]=checkaddress();
		//arrTmp[4]=checkcity();
		//arrTmp[5]=checkpincode();
		//arrTmp[6]=checkstate();
		//arrTmp[7]=checkcountry();
		//arrTmp[8]=checktelephone();
		arrTmp[9]=checkemail();
		//arrTmp[10]=checkwebsite();
		//arrTmp[11]=checkmessage();
		arrTmp[12]=checkVerify();
		
	// PLEASE DON'T DISTURB FOLLOWING CODE.	
		var i;
        for(i=0;i<arrTmp.length;i++)
        {
            if(arrTmp[i]==false)
            {
                return false;
            }
        }
        return true;
	}
	
	// PLEASE DON'T DISTURB ABOVE CODE.	
</script>

<? # END ?>
</head>

<body>

		<? #  FORM START - COPY FORM TO FORM AND PASTE AT YOU USUAALY DO  ?>
			
           <form action="contact.php"  name="frmcontact" method="post" onsubmit="return verify();">
             

              <table border="0" cellpadding="3" cellspacing="0" width="100%">
                <tr>
                  <td width="29%" align="right" class="texttitle">Company Name :</td>
                  <td width="71%"><input name="company_name" type="text"  class="newbox" value="<?=$_POST["company_name"]?>">
				  <br><span class="redtext" id="lblcompany"></span>
				  </td>
                </tr>
                <tr>
                  <td width="29%" align="right" class="texttitle">Contact Person :</td>
                  <td width="71%"><input name="contact_person" type="text" class="newbox" value="<?=$_POST["contact_person"]?>">
				  <br><span class="redtext" id="lblcontactperson"></span>
				  </td>
                </tr>
                <tr>
                  <td width="29%" align="right" class="texttitle">Designation :</td>
                  <td width="71%"><input name="designation" type="text" class="newbox" value="<?=$_POST["designation"]?>">
				  <br><span class="redtext" id="lbldesignation"></span>
				  </td>
                </tr>
                <tr>
                  <td width="29%" align="right" class="texttitle" valign="top">Address :</td>
                  <td width="71%"><textarea name="address"  class="textarea"><?=$_POST["address"]?></textarea>
				  <br><span class="redtext" id="lbladdress"></span>
				  </td>
                </tr>
                <tr>
                  <td width="29%" align="right" class="texttitle">City :</td>
                  <td width="71%"><input name="city" type="text" class="newbox" value="<?=$_POST["city"]?>">
				   <br><span class="redtext" id="lblcity"></span>
				  </td>
                </tr>
                <tr>
                  <td width="29%" align="right" class="texttitle">Pin Code :</td>
                  <td width="71%"><input name="pincode" type="text" class="newbox" onkeypress="return funnum(event)" value="<?=$_POST["pincode"]?>">
				   <br><span class="redtext" id="lblpincode"></span>
				  </td>
                </tr>
                <tr>
                  <td width="29%" align="right" class="texttitle">State :</td>
                  <td width="71%"><input name="state" type="text" class="newbox" value="<?=$_POST["state"]?>">
				   <br><span class="redtext" id="lblstate"></span>
				  </td>
                </tr>
                <tr>
                  <td width="29%" align="right" class="texttitle">Country :</td>
                  <td width="71%" ><input name="country" type="text" class="newbox" value="<?=$_POST["country"]?>">
				   <br><span class="redtext" id="lblcountry"></span>
				  </td>
                </tr>
                <tr>
                  <td width="29%" align="right" class="texttitle">Telephone :</td>
                  <td width="71%"><input name="telephone" type="text" class="newbox" onkeypress="return funnum(event)"  value="<?=$_POST["telephone"]?>">
				  <br><span class="redtext" id="lbltelephone"></span>
				  </td>
                </tr>
                <tr>
                  <td width="29%" align="right" class="texttitle"><span class="redtext">*</span> E mail :</td>
                  <td width="71%"><input name="email" type="text" class="newbox" value="<?=$_POST["email"]?>">
				  <br><span class="redtext" id="lblemail"></span>
				  </td>
                </tr>
                <tr>
                  <td width="29%" align="right" class="texttitle">Website :</td>
                  <td width="71%"><input name="website" type="text" class="newbox" value="<?=$_POST["website"]?>">
				  <br><span class="redtext" id="lblwebsite"></span>
				  </td>
                </tr>
                <tr>
                  <td width="29%" align="right" class="texttitle" valign="top">Message :</td>
                  <td width="71%"><textarea name="message"  class="textarea" ><?=$_POST["message"]?></textarea>
				 <br><span class="redtext" id="lblmessage"></span>
				  </td>
                </tr>
				 <tr>
                  <td width="29%" align="right" class="texttitle">Verification Code:</td>
                  <td width="71%"><input name="vcode" type="text" class="newbox" id="vcode" size="31" /><img src="verificationimage.php?<?php echo rand(0,9999);?>" alt="verification image, type it in the box" width="50" height="24" align="absmiddle"/>
							<br>
										<?
											if($wrong_code==1)
											{
												echo '<span class="redtext" id="lblVcode">Verification code not correct</span>';
											}
											else
											{	
												echo '<span class="redtext" id="lblVcode"></span>';
											}
										?></td>
                </tr>
				<tr>
				  <td colspan="2" height="5"></td>
			    </tr>
				<tr>
                  <td width="29%">&nbsp;</td>
                  <td width="71%"><input type="Submit" name="Submit" value="Submit" class="buttonlink">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="Reset" value="Reset" name="Reset" class="buttonlink"></td>
                </tr>
              </table>
                
      </form>        
           <? #  FORM END - COPY ABOVE FORM TO FORM AND PASTE AT YOU USUAALY DO  ?>   
</body>
</html>
