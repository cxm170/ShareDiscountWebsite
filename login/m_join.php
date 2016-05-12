<!DOCTYPE html>
<?php 
error_reporting(0); 
session_start();
require_once("connMysql.php");
if(isset($_POST["action"])&&($_POST["action"]=="join")){
	$query_RecFindUser = "SELECT `m_username` FROM `memberdata` WHERE `m_username`='".$_POST["m_username"]."'";
	$RecFindUser=mysql_query($query_RecFindUser);
	if (mysql_num_rows($RecFindUser)>0){
		header("Location: m_join.php?errMsg=1&username=".$_POST["m_username"]);
	}else{
		$query_insert = "INSERT INTO `memberdata` (`m_firstname` ,`m_name` ,`m_username` ,`m_passwd`  ,`m_email`,`m_url`,`m_phone`,`m_address`,`m_jointime`) VALUES (";
		$query_insert .= "'".ucwords($_POST["m_firstname"])."',";
		$query_insert .= "'".ucwords($_POST["m_name"])."',";
		$query_insert .= "'".$_POST["m_username"]."',";
		$query_insert .= "'".md5($_POST["m_passwd"])."',";
		$query_insert .= "'".$_POST["m_email"]."',";
		$query_insert .= "'".$_POST["m_url"]."',";	
		$query_insert .= "'".$_POST["m_phone"]."',";
		$query_insert .= "'".$_POST["m_address"]."',";	
		$query_insert .= "NOW())";
		mysql_query($query_insert);
		$_SESSION["loginMember"]=$_POST["m_username"];
		header("Location: m_redirect.php");
	}
}
?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>Membership Management System</title>
  <link rel="stylesheet" href="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.css">
  
  <!-- Extra Codiqa features -->
  <link rel="stylesheet" href="themes/codiqa.ext.css">
  

  
  <!-- jQuery and jQuery Mobile -->
  <script src="https://d10ajoocuyu32n.cloudfront.net/jquery-1.9.1.min.js"></script>




<script language="javascript">

function checkForm(){
	if(document.formJoin.m_username.value==""){		
		alert("Please fill in your username!");
		document.formJoin.m_username.focus();
		return false;
	}else{
		uid=document.formJoin.m_username.value;
		if(uid.length<8 || uid.length>12){
			alert( "The length of username can only be 8-12 letters!" );
			document.formJoin.m_username.focus();
			return false;
		}
		if(!(uid.charAt(0)>='a' && uid.charAt(0)<='z')){
			alert("Sorry, the first character of your account can only be a lowercase letter!" );
			document.formJoin.m_username.focus();
			return false;
		}
		for(idx=0;idx<uid.length;idx++){
			if(uid.charAt(idx)>='A'&&uid.charAt(idx)<='Z'){
				alert("Sorry, the account number can not contain uppercase characters!" );
				document.formJoin.m_username.focus();
				return false;
			}
			if(!(( uid.charAt(idx)>='a'&&uid.charAt(idx)<='z')||(uid.charAt(idx)>='0'&& uid.charAt(idx)<='9')||( uid.charAt(idx)=='_'))){
				alert( "囧 Your account can only be formed with NUMBERS, LETTERS and SYMBOLS '_', the other characters are not allowed!" );
				document.formJoin.m_username.focus();
				return false;
			}
			if(uid.charAt(idx)=='_'&&uid.charAt(idx-1)=='_'){
				alert( "囧 '_' symbols cannot be connected!\n" );
				document.formJoin.m_username.focus();
				return false;				
			}
		}
	}
	if(!check_passwd(document.formJoin.m_passwd.value,document.formJoin.m_passwdrecheck.value)){
		document.formJoin.m_passwd.focus();
		return false;
	}	
	if(document.formJoin.m_firstname.value==""){
		alert("Please fill in your Firstname!");
		document.formJoin.m_name.focus();
		return false;
	}
	if(document.formJoin.m_name.value==""){
		alert("Please fill in your Lastname!");
		document.formJoin.m_name.focus();
		return false;
	}
	if(document.formJoin.m_email.value==""){
		alert("We need your Email address!");
		document.formJoin.m_email.focus();
		return false;
	}
	if(!checkmail(document.formJoin.m_email)){
		document.formJoin.m_email.focus();
		return false;
	}
	return confirm('Sure to send out?');
}
function check_passwd(pw1,pw2){
	if(pw1==''){
		alert("Hey, password should not be NULL!");
		return false;
	}
	for(var idx=0;idx<pw1.length;idx++){
		if(pw1.charAt(idx) == ' ' || pw1.charAt(idx) == '\"'){
			alert("The password can not contain blank or double quotes!\n");
			return false;
		}
		if(pw1.length<8 || pw1.length>10){
			alert( "The length of password can only be 8-10 letters!\n" );
			return false;
		}
		if(pw1!= pw2){
			alert("The second input is not the same with the first time, please re-enter!\n");
			return false;
		}
	}
	return true;
}
function checkmail(myEmail) {
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(filter.test(myEmail.value)){
		return true;
	}
	alert("The e-mail format is incorrect!");
	return false;
}
</script>

<script type="text/javascript">
$(document).bind("mobileinit", function () {
    $.mobile.ajaxEnabled = false;
});
</script>

    <script src="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>


</head>

<body>
<?php if(isset($_GET["loginStats"]) || ($_GET["loginStats"]=="1")){?>
<script language="javascript">
alert('Account created successfully! :)\nPlease login with the registered username and password.');
window.location.href='index.php';		  
</script>
<?php }?>
<table border="0" align="center" cellpadding="4" cellspacing="0">

  <tr>
    <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td class="tdrline"><form action="" method="POST" name="formJoin" id="formJoin" onSubmit="return checkForm();">
          <p class="title">Create Your OWN Account</p>
		  <?php if(isset($_GET["errMsg"]) || ($_GET["errMsg"]=="1")){?>
          <div class="errDiv">Account <?php echo $_GET["username"];?> Has already been occupied!</div>
          <?php }?>
          <div class="dataDiv">
            <hr size="1" />
            <p class="heading">Account Information</p>
            <p><strong>Account No.:</strong> <font color="#FF0000">*</font><input name="m_username" type="text" class="normalinput" id="m_username" placeholder="Username">
               
                <span class="smalltext">Please fill in 8 to 12 characters with lowercase letters, numbers, and '_' symbols.</span></p>
            <p><strong>Password in use:</strong><font color="#FF0000">*</font>
                <input name="m_passwd" type="password" class="normalinput" id="m_passwd" placeholder="Password">
                
                <span class="smalltext">Please fill in 8 to 10 characters with English alphabets, numbers, and a variety of combination of symbols.</span></p>
            <p><strong>Confirm Password:</strong><font color="#FF0000">*</font>
                <input name="m_passwdrecheck" type="password" class="normalinput" id="m_passwdrecheck" placeholder="Re-enter Password">
                 
                <span class="smalltext">Please type in your password again.</span></p>
            <hr size="1" />
            <p class="heading">Personal Information</p>
            <p><strong>Real Name:</strong></p><p>Firstname<font color="#FF0000">*</font>
			    <input name="m_firstname" type="text" class="normalinput" id="m_firstname" value="<?php echo $row_RecMember["m_firstname"];?>" placeholder="Firstname of Real Name">
                </p>
			                              <p>Lastname<font color="#FF0000">*</font>
                <input name="m_name" type="text" class="normalinput" id="m_name" value="<?php echo $row_RecMember["m_name"];?>" placeholder="Lastname of Real Name">
                </p>
            <p><strong>E-mail:</strong><font color="#FF0000">*</font>
                <input name="m_email" type="text" class="normalinput" id="m_email" placeholder="E-mail Address">
                 </p>
            <p class="smalltext">Make sure that this e-mail is available for our system.</p>
            <p><strong>Personal website:</strong>
                <input name="m_url" type="text" class="normalinput" id="m_url" value="http://" placeholder="Your own website">
                <br>
                <span class="smalltext">Please start with 'http://'.</span> </p>
            <p><strong>Contact No.:</strong>
                <input name="m_phone" type="text" class="normalinput" id="m_phone" placeholder="Your phone number">
            </p>
            <p><strong>Address:</strong><font color="#FF0000">*
                <input name="m_address" type="text" class="normalinput" id="m_address" size="40" placeholder="Your address">
            </p>
            <p> </font>Expressed as a required field.</p>
          </div>
          <hr size="1" />
          <p align="center">
            <input name="action" type="hidden" id="action" value="join">
            <input type="submit" name="Submit2" value="Confirm">
            <!-- <input type="reset" name="Submit3" value="Reset"> -->
            <input type="button" name="Submit" value="Back" onClick="window.history.back();">
          </p>
        </form></td>
       
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" background="images/album_r2_c1.jpg" class="trademark">© 2013 PolyU COMP 5322 Group 1 All Rights Reserved.</td>
  </tr>
</table>
</body>
</html>
