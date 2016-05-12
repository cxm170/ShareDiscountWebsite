<?php 
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
session_start();

if(!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"]=="")){
	header("Location: index.php");
}

if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
	unset($_SESSION["loginMember"]);
	unset($_SESSION["memberLevel"]);
	header("Location: index.php");
}

$redirectUrl="member_center.php";

if(isset($_POST["action"])&&($_POST["action"]=="update")){	
	$query_update = "UPDATE `memberdata` SET ";

	if(($_POST["m_passwd"]!="")&&($_POST["m_passwd"]==$_POST["m_passwdrecheck"])){
		$query_update .= "`m_passwd`='".md5($_POST["m_passwd"])."',";
	}	
	$query_update .= "`m_firstname`='".ucwords($_POST["m_firstname"])."',";
    $query_update .= "`m_name`='".ucwords($_POST["m_name"])."',";	
	$query_update .= "`m_email`='".$_POST["m_email"]."',";
	$query_update .= "`m_url`='".$_POST["m_url"]."',";
	$query_update .= "`m_phone`='".$_POST["m_phone"]."',";
	$query_update .= "`m_address`='".$_POST["m_address"]."' ";
	$query_update .= "WHERE `m_id`=".$_POST["m_id"];	
	mysql_query($query_update);

	if(($_POST["m_passwd"]!="")&&($_POST["m_passwd"]==$_POST["m_passwdrecheck"])){
		unset($_SESSION["loginMember"]);
		unset($_SESSION["memberLevel"]);
		$redirectUrl="index.php";
	}		

	header("Location: $redirectUrl");
}


$query_RecMember = "SELECT * FROM `memberdata` WHERE `m_username`='".$_SESSION["loginMember"]."'";
$RecMember = mysql_query($query_RecMember);	
$row_RecMember=mysql_fetch_assoc($RecMember);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Membership Management System</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript">
$(function(){
			$('input, textarea').placeholder();
		});
function checkForm(){
	if(document.formJoin.m_passwd.value!="" || document.formJoin.m_passwdrecheck.value!=""){
		if(!check_passwd(document.formJoin.m_passwd.value,document.formJoin.m_passwdrecheck.value)){
			document.formJoin.m_passwd.focus();
			return false;
		}
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
	return confirm('Send out?');
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
</head>

<body>
<table width="780" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td class="tdbline"><img src="images/mlogo.png" alt="Membership Management System" width="164" height="67"></td>
  </tr>
  <tr>
    <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td class="tdrline"><form action="" method="POST" name="formJoin" id="formJoin" onSubmit="return checkForm();">
          <p class="title">Modification</p>
          <div class="dataDiv">
            <hr size="1" />
            <p class="heading">Account Information</p>
            <p><strong>Account No.:</strong><?php echo $row_RecMember["m_username"];?></p>
            <p><strong>Password in use:</strong>
              <input name="m_passwd" type="password" class="normalinput" id="m_passwd" placeholder="Password">
              <br></p>
            <p><strong>Confirm Password:</strong>
              <input name="m_passwdrecheck" type="password" class="normalinput" id="m_passwdrecheck" placeholder="Re-enter Password">
              <br>
              <span class="smalltext">If you do not want to change your password, please do not fill in.<br>To modify, please enter the password</span><span class="smalltext"> for two times.<br>
              After the password changed, please use your new password re-login.</span></p>
            <hr size="1" />
            <p class="heading">Personal Information</p>
            <p><strong>Real Name:</strong></p><p>Firstname
			    <input name="m_firstname" type="text" class="normalinput" id="m_firstname" value="<?php echo $row_RecMember["m_firstname"];?>" placeholder="Firstname of Real Name">
                <font color="#FF0000">*</font></p>
			                              <p>Lastname
                <input name="m_name" type="text" class="normalinput" id="m_name" value="<?php echo $row_RecMember["m_name"];?>" placeholder="Lastname of Real Name">
                <font color="#FF0000">*</font>
			</p>
            <p><strong>E-mail:</strong>
                <input name="m_email" type="text" class="normalinput" id="m_email" value="<?php echo $row_RecMember["m_email"];?>" placeholder="E-mail Address">
                <font color="#FF0000">*</font> </p>
            <p class="smalltext">Make sure that this e-mail is available for our system.</p>
            <p><strong>Personal website:</strong>
                <input name="m_url" type="text" class="normalinput" id="m_url" value="<?php echo $row_RecMember["m_url"];?>" placeholder="Your own website">
                <br>
                <span class="smalltext">Please start with 'http://'.</span> </p>
            <p><strong>Contact No.:</strong>
                <input name="m_phone" type="text" class="normalinput" id="m_phone" value="<?php echo $row_RecMember["m_phone"];?>" placeholder="Your phone number">
            </p>
            <p><strong>Address:</strong>
                <input name="m_address" type="text" class="normalinput" id="m_address" value="<?php echo $row_RecMember["m_address"];?>" placeholder="Address">
            </p>
            <p> <font color="#FF0000">*</font>Expressed as a required field.</p>
          </div>
          <hr size="1" />
          <p align="center">
            <input name="m_id" type="hidden" id="m_id" value="<?php echo $row_RecMember["m_id"];?>">
            <input name="action" type="hidden" id="action" value="update">
            <input type="submit" name="Submit2" value="Modify">
            <input type="reset" name="Submit3" value="Reset">
            <input type="button" name="Submit" value="Back" onClick="window.history.back();">
          </p>
        </form></td>
        <td width="200">
        <div class="boxtl"></div><div class="boxtr"></div>
<div class="regbox">
          <p class="heading"><strong>Membership Management System</strong></p>
          
            <p>Hello, Dear <strong><?php echo $row_RecMember["m_name"];?></strong></p>
            <p>You have been here for <?php echo $row_RecMember["m_login"];?> times.<br>
            Time for this LOGIN is:<br>
            <?php echo $row_RecMember["m_logintime"];?></p>
            <p align="center"><a href="../index.php">Home</a> | <a href="?logout=true">Log Out</a></p>
</div>
        <div class="boxbl"></div><div class="boxbr"></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" background="images/album_r2_c1.jpg" class="trademark">© 2013 PolyU COMP 5322 Group 1 All Rights Reserved.</td>
  </tr>
</table>
</body>
</html>
