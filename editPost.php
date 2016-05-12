<script src="js/imageChangeSize.js"></script>

<?php
session_start();

$post_username=$_SESSION["loginMember"];
$post_date=$_POST["date"];
$post_ID=$_POST["postID"];
$post_title=$_POST["title2"];
$post_content=$_POST["content2"];
$user_level=$_SESSION["memberLevel"];

$con=mysqli_connect("localhost","root","polyu","project");

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


$sql="UPDATE m_posts SET post_date='".$post_date."', post_title='".mysql_real_escape_string($post_title)."', post_content='".mysql_real_escape_string($post_content)."' WHERE ID=".$post_ID;

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error());
  }

$sql="SELECT * FROM m_posts p, m_category c where p.category = c.cid AND p.ID =".$post_ID;

$result = mysqli_query($con,$sql);


$row = mysqli_fetch_array($result);
echo "<article id='post-".$row['ID']."'><p><span><span>";
echo "<a target='_blank' font href='readPost.php?id=".$row['ID']."'><strong class='title2' id='title-".$row['ID']."'>" . $row['post_title'] . "</strong></a>";
echo "<span id='authorname'>".$row1['m_firstname']." ".$row1['m_name'] . "</span>" ;
echo "<span class='article1' id='content-".$row['ID']."'>" . $row['post_content'] . "</span>";
  
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