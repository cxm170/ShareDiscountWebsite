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
        <td class="tdrline"><p class="title">Welcome to our website</p>
          <p>Thank you for visiting our website, in order to use all membership functions you must be approved by the Login System action in the right window.</p>
          <p class="heading"> The membership system has the following functions:</p>
          <ol>
            <li>Free to Join.</li>
            <li>Members can modify the data by themselves.</li>
            <li>If the password is forgotten, the members can be issued by the system for electronic mail notification.</li>
            <li>The administrator can modify, delete members' information.</li>
          </ol>
          <p class="heading">Please be aware of the PRIVACY POLICY:</p>
          <ol>
            <li> What you say on this website may be viewed all around the world instantly.</li>
            <li> We collect and use your information below to provide our Services and to measure and improve them over time.</li>
			<li> We do not disclose your private personal information except in the limited circumstances described here.</li>
          </ol></td>
        <td width="200">
        <div class="boxtl"></div><div class="boxtr"></div>
<div class="regbox">
          <p class="heading"><strong>Membership Management System</strong></p>
          
            <p>Hello, Dear <strong><?php echo $row_RecMember["m_name"];?></strong></p>
            <p>You have been here for <?php echo $row_RecMember["m_login"];?> times。<br>
            Time for this LOGIN is:<br>
            <?php echo $row_RecMember["m_logintime"];?></p>
            <p align="center"><a href="member_update.php">Modify</a>|<a href="member_admin.php">Supervise</a>|<a href="?logout=true">LogOut</a></p>
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
