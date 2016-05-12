<?php

// Initialize the post ID that is displayed.
$displayedPostID=0;

// Check whether the user has logined.
if(isset($_SESSION["loginMember"])) $username=$_SESSION["loginMember"];
else $username="";

// Connect to mysql server and check whether the connection is successful.
$con = mysql_connect('localhost', 'root', 'polyu');
if (!$con) die('Could not connect: ' . mysql_error());

// Connect to the 'project' database
mysql_select_db("project", $con);

$sql="SELECT * FROM m_posts p, memberdata m, m_category c WHERE p.post_author = m.m_id AND p.category=c.CID ORDER BY p.ID DESC ";

$result = mysql_query($sql);

// Specify the number of posts to load for one time.
$i=10;

// The following while loop iteratively outputs the post-related HTML to the user.
while(($row = mysql_fetch_array($result))&&($i>0)){
  $i--;
  
  echo "<article id='post-".$row['ID']."'><p><span><span>";
  echo "<a target='_blank' font href='readPost.php?id=".$row['ID']."'><strong class='title2' id='title-".$row['ID']."'>" . $row['post_title'] . "</strong></a>";
  echo "<span id='authorname'>".$row['m_firstname']." ".$row['m_name'] . "</span>" ;
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
  $result_commentcount = mysql_query($sql_commentcount);
  $commentcount = mysql_fetch_assoc($result_commentcount);

  echo "<a style='float:right; margin-right: 2px;' target='_blank' id='commentcount-".$row['ID']."'  
        href='readPost.php?id=".$row['ID']."'>Comment (" . $commentcount['count'] . ")</a>";
  
  // If the user has logined, the post operation buttions are shown.
  if ($username== $row['m_username'])
  { 
  echo "<a style='float:right; ' href='javascript:deletePost(".$row['ID'].")' id='delete-".$row['ID']."' class='delete'>Delete&nbsp;&nbsp;&nbsp;&nbsp;</a>";
  echo "<a style='float:right; ' href='javascript:editPost(".$row['ID'].")' id='edit-".$row['ID']."' class='edit'>Edit&nbsp;&nbsp;&nbsp;&nbsp;</a>";
  }

  echo "</span></span></span></p></article>";
  
  // Keep record of the current post ID 
  $displayedPostID=$row['ID'];
  }



echo '<div id="loadmore"> <a  href="javascript:loadMore('.$displayedPostID.',5)">Load more ...</a></div>';

mysql_close($con);
?>