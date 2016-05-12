<!DOCTYPE html>
<?php
session_start();
?>

<html>
<head>

      <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
	<title>Discount Information Sharing</title>


<link rel="stylesheet" href="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.css">
  
  <!-- Extra Codiqa features -->
  <link rel="stylesheet" href="login/themes/codiqa.ext.css">
  

      <link rel="stylesheet" type="text/css" href="css/mobilestyle.css" />
  <!-- jQuery and jQuery Mobile -->
  <script src="https://d10ajoocuyu32n.cloudfront.net/jquery-1.9.1.min.js"></script>


  <!-- Extra Codiqa features -->
  
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	

	<script src="js/editPost.js"></script>

	<script src="js/updatePost.js"></script> 
	<script src="js/deletePost.js"></script>
	<script src="js/deleteComment.js"></script>


	<script src="js/m_loadMore.js"></script> 

<script src="js/m_submitPost.js"></script> 


<script type="text/javascript">
$(document).bind("mobileinit", function () {
    $.mobile.ajaxEnabled = false;
});
</script>
	
  <script src="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>


	</head>
	
	<body>

<div data-role="page" id="demo-page" id="page1">
    <div data-theme="b" data-role="header">
        <a data-role="button" href="m_index.php" data-icon="arrow-l" data-iconpos="left"
        class="ui-btn-left">
            Back
        </a>
        <h3>
            Discount Sharing
        </h3>
    </div>


 <div data-role="content">
	    <?php
		if(isset($_SESSION["loginMember"]))
		$username=$_SESSION["loginMember"];
		else
		$username="";
		$con = mysql_connect('localhost', 'root', 'polyu');
		if (!$con)
  		{
  			die('Could not connect: ' . mysql_error());
  		}

		mysql_select_db("project", $con);

		$sql="SELECT * FROM m_posts p, memberdata m, m_category c WHERE p.ID = '".$_GET["id"]."' and p.post_author = m.m_id AND p.category=c.CID ";

		$result = mysql_query($sql);

		$row = mysql_fetch_array($result);

  		echo "<article id='post-".$row['ID']."'><p><span><span>";
 		echo "<a font href='readPost.php?id=".$row['ID']."'><strong class='title2' id='title-".$row['ID']."'>" . $row['post_title'] . "</strong></a>";
  echo "<span id='authorname'>".$row['m_firstname']." ".$row['m_name'] ."&nbsp;&nbsp;".$row['post_date']."</span>" ;
  		echo "<span class='article1' id='content-".$row['ID']."'>" . $row['post_content'] . "</span>";
  
		if ($row['post_image']!=null && $row['post_flickrimg']==0){  
			echo "<img enlarge='false' width='100%' src='uploads/".$row['post_image']."'></img>";}
		if ($row['post_image']!=null && $row['post_flickrimg']==1){  
			echo "<img enlarge='false' width='100%' src='".$row['post_image']."'></img>";}
 
 		echo "<span style='padding:0;margin-top:5px;background:transparent;color: #6699FF; font-size: 12px'>";
  		echo "<a href='".$row['cname'].".php'>".$row['cname']."</a>";



		$sql_commentcount="SELECT COUNT(*) as count FROM  m_comments WHERE comment_post = '" . $row['ID'] . "'";
		$result_commentcount = mysql_query($sql_commentcount);
		$commentcount = mysql_fetch_assoc($result_commentcount);

		echo "<a style='float:right; margin-right: 2px;' id='commentcount-".$row['ID']."'  
		    href='readPost.php?id=".$row['ID']."'>Comment (" . $commentcount['count'] . ")</a>";
		 
		if ($username== $row['m_username'])
		{ 
		  echo "<a style='float:right; ' href='javascript:deletePost(".$row['ID'].")' id='delete-".$row['ID']."' class='delete'>Delete&nbsp;&nbsp;&nbsp;&nbsp;</a>";
		  echo "<a style='float:right; ' href='javascript:editPost(".$row['ID'].")' id='edit-".$row['ID']."' class='edit'>Edit&nbsp;&nbsp;&nbsp;&nbsp;</a>";
		}

		echo "</span></span></p>";
		
		
		
		?>

		<?php
		if(isset($_SESSION["loginMember"])) {

		echo '<div class="postForm" style="text-align: center;"><form action="m_createComment.php" method="post">';
		echo  '<textarea id="comment_content" name="comment_content" type="text" cols="70" rows="3" placeholder="Write your comment."></textarea>';
		echo  '<input type="hidden" id="submitComment" name="post" value="'.$_GET["id"]. '">';
		echo  '<input id="commentsubmit" type="submit" class="submitComment" value="Comment">';

		echo "</form>";


		echo "</div>";
		}

		$sql_comment="SELECT * FROM memberdata m, m_comments c WHERE c.comment_post = '".$_GET["id"]."' and c.user_id = m.m_id  ORDER BY c.comment_ID DESC";
		$result_comment = mysql_query($sql_comment);
		
		// Shown all comments that belong to this post.
		while($row1 = mysql_fetch_array($result_comment))
		{
		echo "<div class='post_comment' id='comment-". $row1["comment_ID"]."'><p><span><span><strong>" . $row1['m_firstname'] . " " .$row1['m_name']. "</strong> commented at " . $row1['comment_date'] . "<br><span>" . $row1['comment_content'] . "</span>";
		 
		if ($row1['comment_flickr']!=null ){  
		echo "<img enlarge='false' width='180' src='".$row1['comment_flickr']."'></img>";}
		echo "";

		if ((isset($_SESSION["loginMember"])) && ($_SESSION["loginMember"]== $row1["m_username"]))
		{ 
		  echo "<a style='float:right' id='deleteComment-".$row1['comment_ID']."'  href='javascript:deleteComment(".$row1['comment_ID'].")'>Delete</a>";
		}

		echo "</span></span></p></div>";

		}
		
		// The following blank div is used by jQuery to find the first div.post_comment
		echo "<div class='post_comment'></div>";

		mysql_close($con);
		?>

</div>
<div data-theme="b" data-role="footer">
        <h2>
            2013 PolyU COMP 5322 Group 1 All Rights Reserved.
        </h2>
    </div>
</div>

	</body>
</html>




