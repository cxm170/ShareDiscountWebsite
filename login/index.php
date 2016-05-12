<?php 
error_reporting(0);
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
session_start();


//Fb login

if(isset($_GET["fbid"]) && isset($_GET["fbname"]) && $_GET["fbid"]!="")
{
	$sql = "replace into memberdata (m_id, m_firstname, m_username, m_level) values (".$_GET["fbid"].", '".$_GET["fbname"]."', '".$_GET["fbname"]."', 'fb')";
	mysql_query($sql);
	$_SESSION["loginMember"]=$_GET["fbname"];
	$_SESSION["memberLevel"]="fb";
	$_SESSION["fbid"]=$_GET["fbid"];
	header("Location: member_fbcenter.php");
}

//Fb lgoin end
else {

if(isset($_SESSION["loginMember"]) && ($_SESSION["loginMember"]!="")){
	if($_SESSION["memberLevel"]=="member"){
		header("Location: member_center.php");
	}
	else if($_SESSION["memberLevel"]=="fb"){
		header("Location: member_fbcenter.php");
	}
	else{
		header("Location: member_admin.php");	
	}
}
if(isset($_POST["username"]) && isset($_POST["passwd"])){		
	$query_RecLogin = "SELECT * FROM `memberdata` WHERE `m_username`='".$_POST["username"]."'";
	$RecLogin = mysql_query($query_RecLogin);		
	$row_RecLogin= mysql_fetch_assoc($RecLogin);
	$username = $row_RecLogin["m_username"];
	$passwd = $row_RecLogin["m_passwd"];
	$level = $row_RecLogin["m_level"];
	if(md5($_POST["passwd"])==$passwd){
		$query_RecLoginUpdate = "UPDATE `memberdata` SET `m_login`=`m_login`+1, `m_logintime`=NOW() WHERE `m_username`='".$_POST["username"]."'";	
		mysql_query($query_RecLoginUpdate);
		$_SESSION["loginMember"]=$username;
		$_SESSION["memberLevel"]=$level;
		if(isset($_POST["rememberme"])&&($_POST["rememberme"]=="true")){
			setcookie("remUser", $_POST["username"], time()+365*24*60);
			setcookie("remPass", $_POST["passwd"], time()+365*24*60);
		}else{
			if(isset($_COOKIE["remUser"])){
				setcookie("remUser", $_POST["username"], time()-100);
				setcookie("remPass", $_POST["passwd"], time()-100);
			}
		}
		if($_SESSION["memberLevel"]=="member"){
			header("Location: member_center.php");
		}
		else if($_SESSION["memberLevel"]=="fb"){
		    header("Location: member_fbcenter.php");
	    }
		else{
			header("Location: member_admin.php");	
		}
	}else{
		header("Location: index.php?errMsg=1");
	}
}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Membership Management System</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<script>
  // Additional JS functions here
  window.fbAsyncInit = function() {
	  
    FB.init({
      appId      : '431801373576005', // App ID
      channelUrl : '//www2.comp.polyu.edu.hk/~12125269g/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    // Additional init code here

  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
   
   function login() {
    FB.login(function(response) {
        if (response.authResponse) {
            // connected
			logged_in();
        } else {
            // cancelled
        }
    });
	}
	
	function logged_in() {
		FB.api('/me?fields=id,name,picture', function(response) {
			
			location.href = "./index.php?fbid=" + response.id + "&fbname=" + response.name;
			
		});
	}
	
$(function(){
			$('input, textarea').placeholder();
		});
</script>

<body>
<table width="780" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td class="tdbline"><img src="images/mlogo.png" alt="Membership Management System" width="164" height="67"></td>
  </tr>
  <tr>
    <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td align="center" class="tdrline"><p class="title">Welcome to our website</p>
		  <p><a href="../index.php"><img src="images/sharing-life-logo1.png" alt="Membership Management System" width="358" height="250"></a></p>
          <p class="heading"><a href="../index.php">Sharing is Caring, Sharing is Achieving.</p>
        <td>&nbsp;</td>
          
        <td width="200">
        <div class="boxtl"></div><div class="boxtr"></div>
<div class="regbox"><?php if(isset($_GET["errMsg"]) || ($_GET["errMsg"]=="1")){?>
          <div class="errDiv"> We gotta check... INCORRECT, Dear!</div>
          <?php }?>
          <p class="heading">LOG IN</p>
          <form name="form1" method="post" action="">
            <p><input name="username" type="text" class="logintextbox" id="username" value="<?php echo $_COOKIE["remUser"];?>" placeholder="Username">
            </p>
            <p><input name="passwd" type="password" class="logintextbox" id="passwd" value="<?php echo $_COOKIE["remPass"];?>" placeholder="Password">
            </p>
            <p>
              <input name="rememberme" type="checkbox" id="rememberme" value="true" checked>
Remember me</p>
            <p align="center">
             <input class="login" type="submit" name="button" id="button" value=" ">
             </p>
             <p align="center">
             <!--<img src="images/facebook.png" onClick="login()" width="150px" height="30px">-->
             <input class="facebook" type="button" value=" " onClick="login()"/>
            </p>
            </form>
          <hr size="1" />
          <p class="heading">New to here?</p>
          <p align="center"><a href="member_join.php"><img src="images/get-started-btn.png" alt="Membership Management System" width="136" height="44"></a></p>
</div>
        <div class="boxbl"></div><div class="boxbr"></div>
        
        </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" background="images/album_r2_c1.jpg" class="trademark">© 2013 PolyU COMP 5322 Group 1 All Rights Reserved.</td>
  </tr>
</table>
</body>
</html>
