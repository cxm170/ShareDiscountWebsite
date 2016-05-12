<!DOCTYPE html>
<?php
session_start();
?>

<html xmlns:fb="http://ogp.me/ns/fb#">
	<head>
		<meta charset="UTF-8" />
		<title>Discount Information Sharing</title>
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" href="style.css" />
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 

		<script src="js/comment.js">
		</script>
		<script src="js/editPost.js">
		</script>
		<script src="js/submitPost.js">
		</script>
		<script src="js/updatePost.js">
		</script>
		<script src="js/deletePost.js">
		</script>
		<script src="js/deleteComment.js">
		</script>
        <script src="js/imageChangeSize.js">
        </script>
		<script src="js/script_searchsite.js">
		</script>

		<!-- Google Track script -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-40713174-1', 'sharediscount.tk');
		  ga('send', 'pageview');

		</script>


	</head>
	
	<body>
    	<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=431801373576005";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>

		<div>
			<a href="index.php"><img class="img-title" src="images/title1.gif" width="526" height="86"></a>
    		<img class="img-title2" src="images/title2.gif" width="698" height="37">
    	</div>


		<?php if(isset($_SESSION["loginMember"])){ ?>
		<div class="postForm"  style="text-align: center;">
     		<span>Hi <a href="login/member_center.php"><?php echo $_SESSION["loginMember"] ?></a>. <a  class="logoutlink" href="login/member_center.php?logout=true">Logout</a>.</span><br>		
     	</div>	
		
		<?php } else {?>
		<div align="center"><a class="loginlink" href="login/index.php">Please login to post.</a></div>
		<?php	} ?>

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
 		echo "<a target='_blank' font href='readPost.php?id=".$row['ID']."'><strong class='title2' id='title-".$row['ID']."'>" . $row['post_title'] . "</strong></a>";
 		echo "<span id='authorname'>".$row['m_firstname']." ".$row['m_name'] . "</span>" ;
  		echo "<span class='article1' id='content-".$row['ID']."'>" . $row['post_content'] . "</span>";
  
		if ($row['post_image']!=null && $row['post_flickrimg']==0){  
			echo "<img enlarge='false' width='180' src='uploads/".$row['post_image']."'></img>";}
		if ($row['post_image']!=null && $row['post_flickrimg']==1){  
			echo "<img enlarge='false' width='180' src='".$row['post_image']."'></img>";}
 
 		echo "<span style='padding:0;margin-top:5px;background:transparent;color: #6699FF; font-size: 12px'>".$row['post_date']."&nbsp;&nbsp;";
  		echo "<a href='".$row['cname'].".php'>".$row['cname']."</a>";



		$sql_commentcount="SELECT COUNT(*) as count FROM  m_comments WHERE comment_post = '" . $row['ID'] . "'";
		$result_commentcount = mysql_query($sql_commentcount);
		$commentcount = mysql_fetch_assoc($result_commentcount);

		echo "<a style='float:right; margin-right: 2px;' target='_blank' id='commentcount-".$row['ID']."'  
		    href='readPost.php?id=".$row['ID']."'>Comment (" . $commentcount['count'] . ")</a>";
		 
		if ($username== $row['m_username'])
		{ 
		  echo "<a style='float:right; ' href='javascript:deletePost(".$row['ID'].")' id='delete-".$row['ID']."' class='delete'>Delete&nbsp;&nbsp;&nbsp;&nbsp;</a>";
		  echo "<a style='float:right; ' href='javascript:editPost(".$row['ID'].")' id='edit-".$row['ID']."' class='edit'>Edit&nbsp;&nbsp;&nbsp;&nbsp;</a>";
		}

		echo "</span></span></p>";
		
		// Display the Facebook Like button
		echo "<fb:like send='true' width='450' show_faces='true'></fb:like></article>";
		?>

		<?php
		if(isset($_SESSION["loginMember"])) {

		echo '<div class="postForm" style="text-align: center;"><form>';
		echo  '<textarea id="comment_content" name="comment_content" type="text" cols="70" rows="3" placeholder="Write your comment."></textarea>';
		echo  '<input  class="submitComment" type="button" value="Comment">';
		echo  '<input type="hidden" id="submitComment" value="'.$_GET["id"]. '">';

		//Terence Add flickr search below.
		echo "</form>";
		echo '<button id="useFlickr">Attach Flickr Image</button>';
		echo  '<br><br><div id="flickrsearch" class="postForm" style="display:none;"><table><tbody> <tr><td><label for="flickr_image">Flickr Image Link:</label></td><td><input id="id_link" type="text"></td></tr> <tr><td><label for="search_flickr">Search Flickr!:</label></td><td><input id="searchterm" type="text"></td></tr> </tbody> </table></center>';
		echo  '<center><button id="search">search</button><button id="id_reset">Reset Select</button><br><br></div>';
		echo  '<div id="results"  style="text-align: center;"></div>';

		echo "</div><br>";
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
		  echo "<br><button id='deleteComment-".$row1['comment_ID']."'  onclick='deleteComment(".$row1['comment_ID'].")'>Delete</button>";
		}

		echo "</span></span></p></div>";

		}
		
		// The following blank div is used by jQuery to find the first div.post_comment
		echo "<div class='post_comment'></div>";

		mysql_close($con);
		?>

	</body>
</html>




