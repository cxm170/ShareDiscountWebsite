<?php 
	$db_host = "localhost";
	$db_table = "project";
	$db_username = "root";
	$db_password = "polyu";
	if (!@mysql_connect($db_host, $db_username, $db_password)) die("Connection Failed！");
	if (!@mysql_select_db($db_table)) die("Failed to select database！");
	mysql_query("SET NAMES 'utf8'");
?>

