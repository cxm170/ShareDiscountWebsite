<?php

session_start();


$username=$_SESSION["loginMember"];
$content = $_POST["comment_content"];
$date=date("Y-m-d H:i:s");
$post = $_POST["post"];

//Terence Add flickr
$flickrimg = "";

 
 //initial connecition
$con=mysqli_connect("localhost","root","polyu","project");
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql_mID = "SELECT * FROM memberdata WHERE m_username = '" . $username. "'";

$result_mID = mysqli_query($con,$sql_mID);

$user = mysqli_fetch_array($result_mID);


$post_userID=$user['m_id'];


$sql="INSERT INTO m_comments (comment_post, user_id, comment_date, comment_content,comment_flickr)
VALUES
('".$post."','".$post_userID."','".$date."','".$content."','".$flickrimg."')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }


$sql_comment="SELECT * FROM memberdata m, m_comments c WHERE c.comment_post = '".$post."' and c.user_id = m.m_id  ORDER BY c.comment_ID DESC";

$result_comment = mysqli_query($con,$sql_comment);

$comment = mysqli_fetch_array($result_comment);

//echo "<div class='post_comment'><p><span><span>Author: " . $row1['m_firstname'] . "<br>Date: " . $row1['comment_date'] . "<br>Comment: " . $row1['comment_content'] . "</span></span></p></div>";

echo "<div class='post_comment' id='comment-". $comment["comment_ID"]."'><p><span><span><strong>" . $comment['m_firstname'] . " " .$comment['m_name']. "</strong> commented at " . $comment['comment_date'] . "<br><span>" . $comment['comment_content'] . "</span>";
  if ($comment['comment_flickr']!=null ){  
echo "<img enlarge='false' width='180' src='".$comment['comment_flickr']."'></img>";}

  if ($_SESSION["loginMember"]== $comment["m_username"])
{ 
  echo "<br><button id='deleteComment-".$comment['comment_ID']."'  onclick='deleteComment(".$comment['comment_ID'].")'>Delete</button>";
  //echo "<button id='editComment-".$row1['comment_ID']."'  onclick='editComment(".$row1['comment_ID'].")'>Edit</button>";
}

echo "</span></span></p></div>";

//close connection
mysqli_close($con);
header('Location: m_readPost.php?id='.$post);
?>