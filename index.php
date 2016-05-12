<!DOCTYPE html>
<?php
session_start();
//The $_SESSION["image"] is initialized to null. Any image uploading behavior would assign value to this variable.
$_SESSION["image"]=null;
?>

<html>
	<head>
		 <meta charset="UTF-8" />
		 <title>Discount Information Sharing</title>
		 <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

		 <link rel="stylesheet" type="text/css" href="css/style.css" />
		 <link rel="stylesheet" type="text/css" href="css/style_upload.css" />
		 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
	
		 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
		 <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

		 <!-- The following scripts provide functions specified by their names. -->
		<script src="js/editPost.js">
		</script>
		<script src="js/submitPost.js">
		</script>
		<script src="js/updatePost.js">
		</script>
		<script src="js/deletePost.js">
		</script>
        <script src="js/imageChangeSize.js">
		</script>
		<script src="js/script_searchsite.js">
		</script>
        <script src="js/categoryStyle.js">
		</script>
		<script src="js/loadmore.js">
		</script>
		
		<!-- Instant Search script -->
		<script>
		$(function() {
			$( "#quicksearch" ).autocomplete({source:'search_suggest.php',minLength:2})
			});
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

	  	<!-- Welcome - it changes to specific user info. as the user logins. -->
		<div class="welcome">
			<div><img src="./images/welcome2.gif" width="130" height="60"><br>
        		<?php if(isset($_SESSION["loginMember"])){ ?><a href="login/member_center.php">
				<?php echo $_SESSION["loginMember"] ?></a><br>
	   			<br>&nbsp; &nbsp;&nbsp;<a  class="logoutlink" href="login/member_center.php?logout=true">Logout</a>
       			<?php } else {	?>	Share <br>discount?<br><a class="loginlink" href="login/index.php">Login now!</a><?php } ?>
			</div>
		</div>

		<a href="search/search.html"><div class="searchlink"></div></a>
		<a href="upload2flickr.php"><div class="flickrup"></div></a>

		<!-- instant search -->
		<div align="Left">
			<form action="search/search_quick.php" method="get">
			Quick Search<input id="quicksearch" name = "quicksearch" type="text" /> 
			<input type="submit" value="Go"><form>
		</div>

    	<div>
			<a href="index.php"><img class="img-title" src="images/title1.gif" width="526" height="86"></a>
    		<img class="img-title2" src="images/title2.gif" width="698" height="37">
    	</div>

    	<!-- Category navigation bar -->
		<div id="header">
			<ul class="cate_link">
        		<li class="selected"><img src="images/all.png"><a href="index.php">All</a></li>
            	<li><img src="images/food.png"><a href="food.php">Food</a></li>
				<li><img src="images/electronics.png"><a href="electronics.php">Electronics</a></li>
				<li><img src="images/clothes.png"><a href="clothes.php">Clothes</a></li>
				<li><img src="images/travelling.png"><a href="travelling.php">Travelling</a></li>
				<li><img src="images/others.png"><a href="others.php">Others</a></li>
			</ul>
		</div>

		<!-- A php statement checks whether the user has logined. -->
	  	<!-- If the user logins, the user can see the form that publishs posts. -->
	  	<?php if(isset($_SESSION["loginMember"])){ ?>
	    <div class="floatPost">
			
	    	<!-- Click the following texts, the post form will be shown. -->
			<div id="showPostButton" class="click"></div><br>
			<div id="normalPost" style="display:none;">
				
				<!-- In this form, users can specify category, title and content. -->
				<div class="postForm" >
					<form>
					Please choose category: 
					<select name="category" id="category">
					<option value="0"></option>
					<option value="1">Food</option>
					<option value="2">Electronics</option>
					<option value="3">Clothes</option>
					<option value="4">Travelling</option>
					<option value="0">Others</option>
					</select><br>
				    <textarea class="title1" id="title1" name="title1" type="text"  rows="1" placeholder="Title:"></textarea>
				    <br>
				    <textarea class="title1" id="content" name="content" type="text" rows="5" placeholder="You can start to share your discount information here."></textarea>
					<input  class="submitPost" type="button" value="Post">
					</form>  
				</div>	

				<!-- Click the following button, the upload form will be shown. -->
				<button id="useFlickr">Use Flickr instead</button>
				
				<!-- In this form, users can choose one local image to upload to our server. -->
				<div id="main" class="postForm">
					<form method="post" id="uploading_form" enctype="multipart/form-data"  action="upload.php">
					<input type="file" name="images" id="images"/>
			    	<button type="submit" id="btn">Upload Files!</button>
			    	</form>
  					<div id="response"></div>
					<ul id="image-list"></ul>
				</div>

				<!-- In this form, users can search images in our Flickr server and choose one to publish with their posts. -->
				<div id="flickrsearch" class="postForm" style="display:none;">	
				    <table>
				        <tbody>
				            <tr><td><label for="flickr_image">Flickr Image Link:</label></td><td><input id="id_link" type="text"></td></tr>
				            <tr><td><label for="search_flickr">Search Flickr!:</label></td><td><input id="searchterm" type="text"></td></tr>
				                    </tbody>
				    </table>
     				<button id="search">search</button>
	  				<button id="id_reset">Reset Select</button><br><br>
	 				<!-- <br> <a id="togglebutton" href="javascript:showhideflickrimg();">show</a>  -->
    				<div id="results" style="display: block"></div>
				</div>

			</div>

		</div>	
		
		<!-- image upload script -->
		<script src="js/upload.js"></script>
		
		<!-- showPost.php is imported, which shows the latest posts in our database server. -->
		<?php } require 'showPost.php'; ?>

	</body>
</html>




