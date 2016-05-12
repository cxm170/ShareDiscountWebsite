<?php
session_start();

$post_image=$_SESSION["image"];
// Once $_SESSION["image"] is used, it is initialized to null.
$_SESSION["image"]=null;


$post_username=$_SESSION["loginMember"];
$post_date=$_POST["date"];
$post_title=$_POST["title1"];
$post_content=$_POST["content"];
$post_category=$_POST["category"];
$user_level=$_SESSION["memberLevel"];

//Added by Terence 
$post_flickrimg =$_POST["flickrimg"];

$post_flickrflag = 0;

if($post_flickrimg!=null)
{
  $sql_img_val=$post_flickrimg;
  $post_flickrflag=1;
}
else
{
  $sql_img_val=$post_image;
}

$con=mysqli_connect("localhost","root","polyu","project");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Get the m_id for the m_username
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


// Insert new entry in m_posts table
$sql="INSERT INTO m_posts (category, post_author, post_date, post_content, post_title ,post_image,post_flickrimg)
VALUES
('".$post_category."','".$post_userID."','".$post_date."','".mysql_real_escape_string($post_content)."','".mysql_real_escape_string($post_title)."','".$sql_img_val."','".$post_flickrflag."')";

// check whether insertion is successful
$createnewpost = mysqli_query($con, $sql) or die (mysqli_error($con));


// Show newly inserted post
$sql_display="SELECT * FROM m_posts p1, m_category c1 where p1.category=c1.CID AND p1.ID = (select max(p2.ID) From m_posts p2, m_category c2 WHERE p2.category=c2.CID)";
$result = mysqli_query($con,$sql_display);

$row = mysqli_fetch_array($result);

echo "<article id='post-".$row['ID']."'><p><span><span>";
echo "<a target='_blank' font href='readPost.php?id=".$row['ID']."'><strong class='title2' id='title-".$row['ID']."'>" . $row['post_title'] . "</strong></a>";
echo "<span id='authorname'>".$row1['m_firstname']." ".$row1['m_name'] . "</span>" ;
echo "<span class='article1' id='content-".$row['ID']."'>" . $row['post_content'] . "</span>";

//check whether to show images uploaded to our server or images on our flickr server  
if ($row['post_image']!=null && $row['post_flickrimg']==0){  
  echo "<img enlarge='false' width='180' src='uploads/".$row['post_image']."'></img>";}
if ($row['post_image']!=null && $row['post_flickrimg']==1){  
  echo "<img enlarge='false' width='180' src='".$row['post_image']."'></img>";}
 
echo "<span style='padding:0;margin-top:5px;background:transparent;color: #6699FF; font-size: 12px'>".$row['post_date']."&nbsp;&nbsp;";
echo "<a href='".$row['cname'].".php'>".$row['cname']."</a>";


// The following statements count the number of comments in current post.
$sql_commentcount="SELECT COUNT(*) as count FROM  m_comments WHERE comment_post = '" . $row['ID'] . "'";
$result_commentcount = mysqli_query($con,$sql_commentcount);
$commentcount = mysqli_fetch_assoc($result_commentcount);

echo "<a style='float:right; margin-right: 2px;' target='_blank' id='commentcount-".$row['ID']."'  
    href='readPost.php?id=".$row['ID']."'>Comment (" . $commentcount['count'] . ")</a>";
 
// If the user has logined, the post operation buttions are shown. 
if ($post_username== $row1['m_username'])
{ 
  echo "<a style='float:right; ' href='javascript:deletePost(".$row['ID'].")' id='delete-".$row['ID']."' class='delete'>Delete&nbsp;&nbsp;&nbsp;&nbsp;</a>";
  echo "<a style='float:right; ' href='javascript:editPost(".$row['ID'].")' id='edit-".$row['ID']."' class='edit'>Edit&nbsp;&nbsp;&nbsp;&nbsp;</a>";
}

echo "</span></span></span></p></article>";

mysqli_close($con);

?>