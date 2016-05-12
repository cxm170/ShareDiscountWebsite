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
	header("Location: ../index.php");
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
</head>

<body>
<table width="780" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr>
    <td class="tdbline"><img src="images/mlogo.png" alt="Membership Management System" width="164" height="67"></td>
  </tr>
  <tr>
    <td class="tdbline"><table width="100%" border="0" cellspacing="0" cellpadding="10">
      <tr valign="top">
        <td align="center" class="tdrline"><p class="title">Welcome to our website</p>
           <p><a href="../index.php"><img src="images/share.png" alt="Membership Management System" width="500" height="250"></a></p>
          <p class="heading"><a href="../index.php">Enjoy your sharing tour!</p></td>
        <td width="200">
        <div class="boxtl"></div><div class="boxtr"></div>
<div class="regbox">
          <p class="heading"><strong>Membership Management System</strong></p>
          
            <p>Hello, <br>Dear Facebook User</p>
            <p class="smalltext">Register as our website user to enjoy <font color="#FF0000">FULL</font> function!</p>
            <p align="center"><a href="member_update.php">Sign up RIGHT NOW!</a></p>
            <p align="center"><a href="?logout=true">Log Out</a></p>
            <p align="center"><a href="../index.php"><img src="images/start_here.png" alt="Membership Management System" width="70" height="78"></a></p>
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
