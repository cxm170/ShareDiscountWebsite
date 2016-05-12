<?php

$post_ID=$_POST["ID"];

$con=mysqli_connect("localhost","root","polyu","project");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$sql="DELETE FROM m_posts WHERE ID=" . $post_ID;

mysqli_query($con,$sql);

echo 'success!';

?>