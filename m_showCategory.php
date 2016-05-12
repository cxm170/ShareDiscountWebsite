      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />

      <script src="js/imageChangeSize.js">
		  </script>
      <script src="js/loadmore.js">
      </script>
      <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
      
      <script>
      $(function() {
      $( "#quicksearch" ).autocomplete({source:'search_suggest.php',minLength:2})
        });
      </script>



<?php
$displayedPostID=0;


if(isset($_SESSION["loginMember"]))

$username=$_SESSION["loginMember"];

else
$username="";



$category=$_SESSION["category"];

$con = mysql_connect('localhost', 'root', 'polyu');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("project", $con);

$sql="SELECT * FROM m_posts p, memberdata m, m_category c WHERE p.post_author = m.m_id AND p.category=c.CID AND c.CID = '" . $category . " ' ORDER BY p.ID DESC ";

$result = mysql_query($sql);

//echo "<table align='center' id='postTable' class='reference'>";

$i=20;
/*
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>".  $row['ID'] . "</td>";
  echo "<td>" . $row['post_author'] . "</td>";
  echo "<td>" . $row['post_date'] . "</td>";
  echo "<td>" . $row['post_title'] . "</td>";
  echo "<td>" . $row['post_content'] . "</td>";
  echo "<td>" . $row['comment_count'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
*/




while(($row = mysql_fetch_array($result))&&($i>0))
  {$i--;
  echo "<article id='post-".$row['ID']."'><p><span><span>";
 
echo "<a target='_blank' font href='m_readPost.php?id=".$row['ID']."'><strong class='title2' id='title-".$row['ID']."'>" . $row['post_title'] . "</strong></a><br>";
 echo "by <span id='authorname'>".$row['m_firstname']." ".$row['m_name'] . "</span><br>" ;

  echo "<span class='article1' id='content-".$row['ID']."'>" . $row['post_content'] . "</span><br>";
  
if ($row['post_image']!=null && $row['post_flickrimg']==0){  
echo "<img enlarge='false' width='180' src='uploads/".$row['post_image']."'></img><br>";}
if ($row['post_image']!=null && $row['post_flickrimg']==1){  
echo "<img enlarge='false' width='180' src='".$row['post_image']."'></img><br>";}
 echo "<span style='padding:0;margin-top:5px;background:transparent;color: #6699FF; font-size: 12px'>".$row['post_date']."&nbsp;&nbsp;";
  echo "<a href='m_".$row['cname'].".php'>".$row['cname']."</a></span>";



$sql_commentcount="SELECT COUNT(*) as count FROM  m_comments WHERE comment_post = '" . $row['ID'] . "'";

$result_commentcount = mysql_query($sql_commentcount);

$commentcount = mysql_fetch_assoc($result_commentcount);

echo "<span style='padding:0;margin-top:5px;background:transparent;color: #6699FF; font-size: 30px'><a style='float:right; margin-right: 2px;' target='_blank' id='commentcount-".$row['ID']."'  
    href='m_readPost.php?id=".$row['ID']."'>Comment (" . $commentcount['count'] . ")</a></span>";
 
  if ($username== $row['m_username'])
{ 
  echo "<span style='padding:0;margin-top:5px;background:transparent;color: #6699FF; font-size: 30px'>
		<a style='float:right; ' href='javascript:deletePost(".$row['ID'].")' id='delete-".$row['ID']."' class='delete'>Delete&nbsp;&nbsp;&nbsp;&nbsp;</a>";
  echo "<a style='float:right; ' href='javascript:m_editPost(".$row['ID'].")' id='edit-".$row['ID']."' class='edit'>Edit&nbsp;&nbsp;&nbsp;&nbsp;</a></span>";

}

 echo "</span></span></p></article><hr>";
    $displayedPostID=$row['ID'];
  }

echo '<div id="loadmore"> <a  href="javascript:loadMore('.$displayedPostID.','.$category.')">Load more ...</a></div>';


mysql_close($con);
?>