<?php 
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
session_start();

if(!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"]=="")){
	header("Location: index.php");
}

if($_SESSION["memberLevel"]=="member"){
	header("Location: member_center.php");
}

if($_SESSION["memberLevel"]=="fb"){
	header("Location: member_center.php");
}

if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
	unset($_SESSION["loginMember"]);
	unset($_SESSION["memberLevel"]);
	header("Location: index.php");
}

if(isset($_GET["action"])&&($_GET["action"]=="delete")){	
	$query_delMember = "DELETE FROM `memberdata` WHERE `m_id`=".$_GET["id"];
	mysql_query($query_delMember); 

	header("Location: member_admin.php");
}

$query_RecAdmin = "SELECT * FROM `memberdata` WHERE `m_username`='".$_SESSION["loginMember"]."'";
$RecAdmin = mysql_query($query_RecAdmin);	
$row_RecAdmin=mysql_fetch_assoc($RecAdmin);


$pageRow_records = 5;

$num_pages = 1;

if (isset($_GET['page'])) {
  $num_pages = $_GET['page'];
}
$startRow_records = ($num_pages -1) * $pageRow_records;
$query_RecMember = "SELECT * FROM `memberdata` WHERE `m_level`<>'admin' ORDER BY `m_jointime` DESC";
$query_limit_RecMember = $query_RecMember." LIMIT ".$startRow_records.", ".$pageRow_records;
$RecMember = mysql_query($query_limit_RecMember);
$all_RecMember = mysql_query($query_RecMember);
$total_records = mysql_num_rows($all_RecMember);
$total_pages = ceil($total_records/$pageRow_records);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Membership Management System</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function deletesure(){
    if (confirm('\nAre you sure to delete this Member?\nThis can not be recovered!\n')) return true;
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
        <td class="tdrline"><p class="title">Member List</p>
          <table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#F0F0F0">
            <tr>
              <th width="10%" bgcolor="#CCCCCC">&nbsp;</th>
              <th width="20%" bgcolor="#CCCCCC"><p>Name</p></th>
              <th width="20%" bgcolor="#CCCCCC"><p>Account</p></th>
              <th width="20%" bgcolor="#CCCCCC"><p>History</p></th>
              <th width="20%" bgcolor="#CCCCCC"><p>Last Login</p></th>
              <th width="10%" bgcolor="#CCCCCC"><p>Times</p></th>
            </tr>
			<?php	while($row_RecMember=mysql_fetch_assoc($RecMember)){ ?>
            <tr>
              <td width="10%" align="center" bgcolor="#FFFFFF"><p><a href="member_adminupdate.php?id=<?php echo $row_RecMember["m_id"];?>">Modify</a><br>
                <a href="?action=delete&id=<?php echo $row_RecMember["m_id"];?>" onClick="return deletesure();">Delete</a></p></td>
              <td width="20%" align="center" bgcolor="#FFFFFF"><p><?php echo $row_RecMember["m_name"];?></p></td>
              <td width="20%" align="center" bgcolor="#FFFFFF"><p><?php echo $row_RecMember["m_username"];?></p></td>
              <td width="20%" align="center" bgcolor="#FFFFFF"><p><?php echo $row_RecMember["m_jointime"];?></p></td>
              <td width="20%" align="center" bgcolor="#FFFFFF"><p><?php echo $row_RecMember["m_logintime"];?></p></td>
              <td width="10%" align="center" bgcolor="#FFFFFF"><p><?php echo $row_RecMember["m_login"];?></p></td>
            </tr>
			<?php }?>
          </table>          
          <hr size="1" />
          <table width="98%" border="0" align="center" cellpadding="4" cellspacing="0">
            <tr>
              <td valign="middle"><p>Number of Users:<?php echo $total_records;?></p></td>
              <td align="right"><p>
                  <?php if ($num_pages > 1) {  ?>
                  <a href="?page=1">To the Start</a> | <a href="?page=<?php echo $num_pages-1;?>">Last</a> |
                <?php }?>
                  <?php if ($num_pages < $total_pages) {  ?>
                  <a href="?page=<?php echo $num_pages+1;?>">Next</a> | <a href="?page=<?php echo $total_pages;?>">To the End</a>
                  <?php }?>
              </p></td>
            </tr>
          </table>          <p>&nbsp;</p>
          </td>
        <td width="200">
        <div class="boxtl"></div><div class="boxtr"></div>
<div class="regbox">
          <p class="heading"><strong>Membership Management System</strong></p>
          
            <p>Hello, Dear <strong><?php echo $row_RecAdmin["m_name"];?></strong></p>
            <p>            Time for this LOGIN is:<br>
            <?php echo $row_RecAdmin["m_logintime"];?></p>
            <p align="center"><a href="member_adminupdate.php?id=<?php echo $row_RecAdmin["m_id"];?>">Modify</a> | <a href="?logout=true">Log Out</a></p>
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
