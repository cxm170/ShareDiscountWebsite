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
	header("Location: m_redirect.php");
}

//Fb lgoin end
else {

if(isset($_SESSION["loginMember"]) && ($_SESSION["loginMember"]!="")){
	if($_SESSION["memberLevel"]=="member"){
		header("Location: m_redirect.php");
	}
	else if($_SESSION["memberLevel"]=="fb"){
		header("Location: m_redirect.php");
	}
	else{
		header("Location: m_index.php");	
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
			header("Location: m_redirect.php");
		}
		else if($_SESSION["memberLevel"]=="fb"){
		    header("Location: m_redirect.php");
	    }
		else{
			header("Location: m_index.php");	
		}
	}else{
		header("Location: m_index.php?errMsg=1");
	}
}
}
/*if(!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"]=="")){
	header("Location: m_index.php");
}*/

if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
	unset($_SESSION["loginMember"]);
	unset($_SESSION["memberLevel"]);
	header("Location: m_redirect.php");
}

/*$query_RecMember = "SELECT * FROM `memberdata` WHERE `m_username`='".$_SESSION["loginMember"]."'";
$RecMember = mysql_query($query_RecMember);	
$row_RecMember=mysql_fetch_assoc($RecMember);*/
?>

<!DOCTYPE html>
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
 

  <!-- Extra Codiqa features -->

   
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
			
			location.href = "./m_index.php?fbid=" + response.id + "&fbname=" + response.name;
			

			
		});
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
<!-- Home -->
<div data-role="page" id="page1">
    <div data-theme="b" data-role="header">
        <a data-role="button" href="../m_index.php" data-icon="arrow-l" data-iconpos="left"
        class="ui-btn-left">
            Back
        </a>
        <h3>
            Login in
        </h3>
    </div>
    <div data-role="content">
    	<div class="postForm" >
					<form name="form1" method="post" action="">
            <label for="username">Username:</label>
            <input name="username" type="text" id="username" value="<?php echo $_COOKIE["remUser"];?>">
            
            <label for="passwd">Password:</label>
           <input name="passwd" type="password" id="passwd" value="<?php echo $_COOKIE["remPass"];?>">
            <label for="rememberme">Remember me</label>       
            <input name="rememberme" type="checkbox" id="rememberme" value="true" checked>
            
            <input class="login" type="submit" name="button" id="button" value="LOGIN">
   
            <input class="facebook" type="button" value="FACEBOOK LOGIN" onClick="login()"/>

            </form>
					
				</div>	
				<p align="center"><a href="m_join.php"><img src="images/get-started-btn.png" alt="Membership Management System" width="100%"></a></p>
    </div>
<div data-theme="b" data-role="footer">
        <h2>
            2013 PolyU COMP 5322 Group 1 All Rights Reserved.
        </h2>
    </div>
</div>




</body>
</html>

