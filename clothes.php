<!DOCTYPE html>
<?php
session_start();
$_SESSION["category"]=3;
?>
<html>
	<head>
		 <meta charset="UTF-8" />
		 <title>Discount Information Sharing</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		    <link rel="stylesheet" href="css/style_upload.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 


		<script src="js/editPost.js">
		</script>
		<script src="js/submitPost.js">
		</script>
		<script src="js/updatePost.js">
		</script>
		<script src="js/deletePost.js">
		</script>
        <script src="js/categoryStyle.js">
		</script>
		<script src="js/script_searchsite.js">
		</script>




	</head>
	<body>

	 <div class="welcome">
		<div><img src="./images/welcome2.gif" width="149" height="77"><br>
        <?php if(isset($_SESSION["loginMember"])){ ?><a href="login/member_center.php">
		<?php echo $_SESSION["loginMember"] ?></a><br>

	   	<br><br>&nbsp; &nbsp; &nbsp;&nbsp;<a  class="logoutlink" href="login/member_center.php?logout=true">Logout</a>
        
<?php } else {	?>	Have discount<br>to share?<br><a class="loginlink" href="login/index.php">Login now!</a><?php } ?>
</div></div>
<a href="search/search.html"><div class="searchlink"></div></a>
<a href="upload2flickr.php"><div class="flickrup"></div></a>

<!-- Terence Add Autocomplete search!-->
<div align="Left"><form action="search/search_quick.php" method="get" >
Quick Search<input id="quicksearch" name = "quicksearch" type="text" /> 
<input type="submit" value="Go"><form></div>

    <div>
	<a href="index.php"><img class="img-title" src="images/title1.gif" width="526" height="86"></a>
    <img class="img-title2" src="images/title2.gif" width="698" height="37">
    </div>



		<div id="header">



		<ul>
			<li><img src="images/all.png"><a href="index.php">All</a></li>
            
			<li><img src="images/food.png"><a href="food.php">Food</a></li>
			<li><img src="images/electronics.png"><a href="electronics.php">Electronics</a></li>
			<li class="selected"><img src="images/clothes.png"><a href="clothes.php">Clothes</a></li>
			<li><img src="images/travelling.png"><a href="travelling.php">Travelling</a></li>
			<li><img src="images/others.png"><a href="others.php">Others</a></li>
		</ul>

		</div>



	  <?php if(isset($_SESSION["loginMember"])){ ?>

 <div id="showPostButton" class="click"></div><br>
<div id="normalPost" style="display:none;">

	  <div class="postForm">
	   

	  <form>
	  		Pleaase choose category: 
	<select name="category" id="category">
	  <option value="0"></option>
	  <option value="1">Food</option>
	  <option value="2">Electronics</option>
	  <option value="3">Clothes</option>
	  <option value="4">Travelling</option>
	  <option value="0">Others</option>
	  </select><br>
      <textarea id="title1" name="title1" type="text"  rows="1" placeholder="Title:"></textarea>
      <br>
      <textarea id="content" name="content" type="text" rows="5" placeholder="You can start to share your discount information here."></textarea>


	  <input  class="submitPost" type="button" value="Post">
    	</form>

		</div>	
        <button id="useFlickr">Use Flickr instead</button>
	

	<div id="main" class="postForm">

		<form method="post" id="uploading_form" enctype="multipart/form-data"  action="upload.php">
		<input type="file" name="images" id="images"/>
    	<button type="submit" id="btn">Upload Files!</button>
    	</form>


  		<div id="response"></div>
		
		<ul id="image-list"></ul>

	</div>
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

		
	<div id="main" class="postForm" style="display:none">

		<form method="post" id="uploading_form" enctype="multipart/form-data"  action="upload.php">
		<input type="file" name="images" id="images"/>
    	<button type="submit" id="btn">Upload Files!</button>
    	</form>

  	<div id="response"></div>
		
	<ul id="image-list">
		</ul>

	</div>
	
		  <script src="js/upload.js"></script>
		
<?php } ?>



	<?php require 'showCategory.php'; ?>

	</body>
</html>




