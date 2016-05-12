<?php
session_start();

$post_image=$_SESSION["image"];
$_SESSION["image"]=null;

$con=mysqli_connect("localhost","root","polyu","project");
$post_username=$_SESSION["loginMember"];
$post_date=date("Y-m-d H:i:s");


$post_title=$_POST["title1"];

$post_content=$_POST["content"];


$post_category=$_POST["category"];


$user_level=$_SESSION["memberLevel"];




//Added by Terence 


//$sql_img_val; //use this to insert to image column instead.

$post_flickrflag = 0;





// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if($user_level == "fb")
{
  $sql_mID="SELECT * FROM memberdata WHERE m_id = ".$_SESSION["fbid"];
}
else
{

  $sql_mID="SELECT * FROM memberdata WHERE m_username = '" . $post_username. "'";
}

$result_mID=mysqli_query($con,$sql_mID);

$row1 = mysqli_fetch_array($result_mID);


$post_userID=$row1['m_id'];

$sql="INSERT INTO m_posts (category, post_author, post_date, post_content, post_title ,post_image,post_flickrimg)
VALUES
('".$post_category."','".$post_userID."','".$post_date."','".mysql_real_escape_string($post_content)."','".mysql_real_escape_string($post_title)."','".$post_image."','".$post_flickrflag."')";


$creatnewpost = mysqli_query($con, $sql) or die (mysqli_error($con));

// if (!mysqli_query($con,$sql))
//   {
//   die('Error: ' . mysqli_error());
//   }

echo "success";

 





mysqli_close($con);
header('Location: m_index.php');
?>