<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/style.css" rel="stylesheet" type="text/css" />
<title>Book Shop</title>
<script type="text/javascript">
function copyInfo(){
  var fullname;
  var email;
  var address;
 
 var city;
 var state;
 var country;
 var zipcode;
 var phone;
    
  fullname = document.getElementById('fname').value;
  email = document.getElementById('email').value;
  address = document.getElementById('address').value;
  
  city = document.getElementById('city').value;
  state= document.getElementById('state').value;
  country = document.getElementById('country').value;
  zipcode = document.getElementById('zipcode').value;
  phone = document.getElementById('phone').value;
  
  
  document.getElementById('sfname').value = fullname;
  document.getElementById('semail').value = email;
  document.getElementById('saddress').value = address;
  
  document.getElementById('scity').value = city;
  document.getElementById('sstate').value = state;
  document.getElementById('scountry').value = country;
  document.getElementById('szipcode').value = zipcode;
  document.getElementById('sphone').value = phone;
  
}
</script>
</head>
<?php 
error_reporting(~E_NOTICE);

require_once("datastore.php");
require_once("classes/cart.php"); 
 
if($_POST['sub']){
 //billing
 /*$name = mysql_real_escape_string($_POST['user']);*/
 
 $fullname = trim($_POST['fullname']);
 
  $fullname = mysql_real_escape_string($fullname);
  
  
 $email = trim($_POST['email']);
 $email = mysql_real_escape_string($email);
 
 $address = trim($_POST['address']);
 $address = mysql_real_escape_string($address);
 
 
 $city = trim($_POST['city']);
  $city = mysql_real_escape_string($city);
  
 $state = trim($_POST['state']);
  $state = mysql_real_escape_string($state);
  
 $country = trim($_POST['country']);
  $country = mysql_real_escape_string($country);
  
 $zipcode = trim($_POST['zipcode']);
  $zipcode = mysql_real_escape_string($zipcode);
  
 $phone = trim($_POST['phone']);
  $phone = mysql_real_escape_string($phone);
  
 
 //shipping
 $sfullname = trim($_POST['sfullname']);
  $sfullname = mysql_real_escape_string($sfullname);
 
 $semail = trim($_POST['semail']);
  $semail = mysql_real_escape_string($semail);
 
 $saddress = trim($_POST['saddress']);
  $saddress = mysql_real_escape_string($saddress);
 
 $scity = trim($_POST['scity']);
  $scity = mysql_real_escape_string($scity);
 
 $sstate = trim($_POST['sstate']);
  $sstate= mysql_real_escape_string($sstate);
 
 $scountry = trim($_POST['scountry']);
  $scountry = mysql_real_escape_string($scountry);
 
 $szipcode = trim($_POST['szipcode']);
  $szipcode = mysql_real_escape_string($szipcode);
 
 $sphone = trim($_POST['sphone']);
  $sphone= mysql_real_escape_string($sphone);
 
  $error = "";
  
 
 //validation Billing Information
 
  if(!$fullname || !$email ||!$address || !$city || !$state ||!$country ||!$zipcode|| !$phone || !$sfullname || !$semail ||!$saddress || !$scity || !$sstate ||!$scountry ||!$szipcode|| !$sphone)
  {
    $error .="&nbsp;All Fields are Mandatory !<br>";
  }
  
 else
 {
 if (!preg_match("/^[A-Za-z ]{3,15}$/",$fullname))
{

$error .="&nbsp;Please enter correct name for Billing Information (Atleast 5 characters name )<br>";
}

 

 /*if(!$address){
    $error .="&nbsp;Please enter your address for Billing Information<br>";
 
 }
 */


if(!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/', $email)) {
  
$error .="&nbsp;Invalid email address for Billing Information <br>";
}

 if (!preg_match('/^[A-Za-z]{3,20}$/',$city))
{

$error .="&nbsp;Please enter your city for Billing Information <br>";
}

 if (!preg_match('/^[A-Za-z]{3,20}$/',$state))
{

$error .="&nbsp;Please enter your state for Billing Information <br>";
}

 
if (!preg_match("/^[A-Za-z ]{3,15}$/",$country))
{

$error .="&nbsp;Please enter your country for Billing Information<br>";
}


if (!preg_match("/^[\d]{5}$/",$zipcode))
{

$error .="&nbsp;Please enter correct zip code for Billing Information(5 character zipcode like 44000)<br>";
}


if (!preg_match("/^[\d]{3}-[\d]{7}$/",$phone))
{

$error .="&nbsp;Please enter phone Number for Billing Information(10 character phone number like 051-5589734)<br>";
}

//----***End***Validation Billing Information---



 //validation Shipping Information
 
 if (!preg_match("/^[A-Za-z ]{3,15}$/",$sfullname))
{

$error .="&nbsp;Please enter you full name for shipping Information<br>";
}

 if(!$saddress){
    $error .="&nbsp;Please enter you address for shipping Information<br>";
 
 }
 
if(!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/', $semail)) {
  
$error .="&nbsp;Invalid email address for shipping Information<br>";
}

 if (!preg_match('/^[A-Za-z]{3,20}$/',$scity))
{

$error .="&nbsp;Please enter your city for shipping Information<br>";
}

 if (!preg_match('/^[A-Za-z]{3,20}$/',$sstate))
{

$error .="&nbsp;Please enter your state for shipping Information <br>";
}

 
if (!preg_match("/^[A-Za-z ]{3,15}$/",$scountry))
{

$error .="&nbsp;Please enter your country for shipping Information<br>";
}


if (!preg_match("/^[\d]{5}$/",$szipcode))
{

$error .="&nbsp;Please enter your zip code for shipping Information<br>";
}


if (!preg_match("/^[\d]{3}-[\d]{7}$/",$sphone))
{

$error .="&nbsp;Please enter your phone Number for shipping Information<br>";
}

 }
//----***End***Validation Shipping Information---
 /*if(!$email){
    $error .="&nbsp;Please enter your email<br>";
 
 }*/
 

 if(!$error){
 
  	$_SESSION['fullname'] = $fullname;
 	$_SESSION['email'] = $email;
 	$_SESSION['address'] = $address;
 	$_SESSION['city'] = $city;
 	$_SESSION['state'] = $state;
 	$_SESSION['country'] = $country;
 	$_SESSION['zipcode'] = $zipcode;
 	$_SESSION['phone'] = $phone;
	
	$_SESSION['sfullname'] = $sfullname;
 	$_SESSION['semail'] = $semail;
 	$_SESSION['saddress'] = $saddress;
 	$_SESSION['scity'] = $scity;
 	$_SESSION['sstate'] = $sstate;
 	$_SESSION['scountry'] = $scountry;
 	$_SESSION['szipcode'] = $szipcode;
 	$_SESSION['sphone'] = $sphone;
   
    header("Location: confirmCheckout.php");
	exit; 
 }
}
?>
<body>

<!-- Header -->
<div id="header">
<div id="page_header">
	<div id="page_title">
	<h1>
	<img src="images/header_logo.gif" width="25" height="26" alt="" />
	<span>Books Forever</span>
	</h1>
	</div>
    
	<div id="header_search">
		<form method="post" action="http://www.freewebsitetemplates.com">
		<div>
		<h3><span>Find:</span></h3>  
		<input type="text" />
		<input type="image" src="images/search_button.gif" class="submit" />
       <a href="admin/index.php" > <img src="images/admin button.gif" height="25" align="right" /> </a>
       
		</div>
        
	  </form>
	</div>
 
</div></div>
<!-- Menu -->
<div id="menucontainer">
<div id="menunav">
<?php require("include/header.php");?>	
</div>
</div>


<div id="page_wrapper">
	<!-- BEGIN :: LEFT SIDEBAR -->
	<div id="page_leftcol">
		
      <?php require("leftcontents.php");?>  
  </div>
	</div>
	
    <div id="main_confirm">
	<h1 class="heading_style">Checkout</h1>     
    
        	<div id="stylized" class="myform">
                <form name="form1" method="post" action="checkOut.php" >               
                <table align="center" cellspacing="2" width="60%" >
                <tr>
                <td colspan="2"><em>Please Enter your Billing and Shipping Information.</em></td>                
                </tr>
                
                <?php if($error){ ?>
                <tr>
                <td colspan="2" style="padding:10px"><div style="background-color:#339999; width:400px; height:auto; color:#FFFFFF; border:1px solid #33FFCC; padding:5px;"><?php echo $error; ?></div></td>                
                </tr>
                <?php } ?>
                <tr>
                <td colspan="2" align="left"><strong>Billing Information</strong></td>                
                </tr>
                
                <tr>
                <td align="left">Full Name</td>
                <td align="left"><input type="text" name="fullname" id="fname" value="<?php echo $fullname; ?>" /></td> 
                               
                </tr>
                
                <tr>
                <td align="left">Email</td>
                <td align="left"><input type="text" name="email" id="email" value="<?php echo $email; ?>" /></td>                
                </tr>
                
                <tr>
                <td align="left">Address</td>
                <td align="left"><input type="text" name="address" id="address" value="<?php echo $address; ?>"/></td>                
                </tr>
                
                <tr>
                <td align="left">City</td>
                <td align="left"><input type="text" name="city" id="city"  value="<?php echo $city; ?>" /></td>                
                </tr>
                
                <tr>
                <td align="left">State</td>
                <td align="left"><input type="text" name="state" id="state" value="<?php echo $state; ?>" /></td>                
                </tr>
                
                <tr>
                <td align="left">Country</td>
                <td align="left"><input type="text" name="country" id="country" value="<?php echo $country; ?>" /></td>                
                </tr>
                
                
                <tr>
                <td align="left">Zip Code</td>
                <td align="left"><input type="text" name="zipcode" id="zipcode" value="<?php echo $zipcode; ?>" /></td>                
                </tr>
                
                <tr>
                <td align="left">Phone</td>
                <td align="left"><input type="text" name="phone" id="phone" value="<?php echo $phone; ?>" /></td>                
                </tr>
                
                 <tr align="left">
                <td colspan="2"><strong>Shipping Information</strong><br />
                <input type="checkbox" name="same" value="1" onclick="copyInfo();" />&nbsp;Same as above</td>                
                </tr>
                
                <tr>
                <td align="left">Full Name</td>
                <td align="left"><input type="text" name="sfullname" id="sfname" value="<?php echo $sfullname; ?>" /></td>                
                </tr>
                
                <tr>
                <td align="left">Email</td>
                <td align="left"><input type="text" name="semail" id="semail" value="<?php echo $semail; ?>" /></td>                
                </tr>
                
                <tr>
                <td align="left">Address</td>
                <td align="left"><input type="text" name="saddress" id="saddress" value="<?php echo $saddress; ?>" /></td>                
                </tr>
                
                <tr>
                <td align="left">City</td>
                <td align="left"><input type="text" name="scity" id="scity" value="<?php echo $scity; ?>" /></td>
                
                </tr>
                <tr>
                <td align="left">State</td>
                <td align="left"><input type="text" name="sstate" id="sstate" value="<?php echo $sstate; ?>" /></td>
                
                </tr>
                <tr>
                <td align="left">Country</td>
                <td align="left"><input type="text" name="scountry" id="scountry" value="<?php echo $scountry; ?>" /></td>
                
                </tr>
                
                
                <tr>
                <td align="left">Zip Code</td>
                <td align="left"><input type="text" name="szipcode" id="szipcode" value="<?php echo $szipcode; ?>" /></td>
                
                </tr>
                
                <tr>
                <td align="left">Phone</td>
                <td align="left"><input type="text" name="sphone" id="sphone" value="<?php echo $sphone; ?>" /></td>
                
                </tr>
                <tr>
               <td></td>
               
                <td><input type="submit" name="sub"  class="submit_button" value="Confirm Order" />&nbsp;<input type="button" name="sub" class="submit_button" value="Back" onclick="window.location='viewCart.php'" /></td>
                
                </tr>
                </table>
      </form>   
      </div>
      
              
</div>
<!--</div>-->


<div id="links"><?php require_once("include/footer.php");?>
</div>

</body>
</html>