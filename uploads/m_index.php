
<!DOCTYPE html>
<?php session_start();?>
<html>
   
<head>
    <meta charset="UTF-8" />
	<title>Discount Information Sharing</title>
	<link rel="stylesheet" type="text/css" href="css/jquery.mobile.custom.structure.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.mobile.custom.structure.min.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.mobile.custom.theme.css" />
    <link rel="stylesheet" type="text/css" href="css/m_style.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
	<script src="js/editPost.js"></script>
	<script src="js/m_submitPost.js"></script> 
	<script src="js/updatePost.js"></script> 
	<script src="js/deletePost.js"></script>
	<script src="js/imageChangeSize.js"></script>
	<script src="js/script_searchsite.js"></script>
    <script src="js/categoryStyle.js"></script>
	<script src="js/m_loadmore.js"></script> 
	<script src="js/jquery.mobile-1.3.1.min.js"></script> 
</head>
	
<body>
	<div data-role="page" id="demo-page" data-theme="d">
	
	<div data-role="header" data-theme="f" data-position="fixed">
	<table border="0" width="100%" class="header">
    <tr>
    <td width="5%" align="center"><a href="#left-panel" data-icon="bars" data-iconpos="notext" data-shadow="false" data-iconshadow="false">Menu</a></td>
	<td width="90%" align="center"><b>Sharing Life</b><br>
   <b>Share Your Discount With Your Friends</b></td>
	<td width="5%"><a href="search/search.html">Search</a></td>
    </tr>
     
	</table>
	</div>
	
    
	<div data-role="content">
    <table border="0" width="100%">
    <tr>
    <td>
    <?php require 'm_showPost.php'; ?>
    </td>
    </tr>
    
    <tr class="footer">
    <td>
    © 2013 PolyU COMP 5322 Group 1 All Rights Reserved.
    </td>
    </tr>
    </table>
    </div>
	
	<div data-role="panel" id="left-panel" data-theme="c">
   	
        <div data-role="collapsible" data-iconpos="right" data-theme="d" data-content-theme="d" data-inset="false">
          <h1>Categories</h1>
          <div data-role="collapsible-set" data-iconpos="right" data-theme="b" data-content-theme="d" data-inset="false">
            <div><a href="m_index.php">All</a></div>
            <div><a href="m_food.php">Food</a></div>
            <div><a href="m_electronics.php">Electronics</a></div>
            <div><a href="m_clothes.php">Clothes</a></div>
            <div><a href="m_travelling.php">Travelling</a></div>
            <div><a href="m_others.php">others</a></div>
          </div><!-- /collapsible-set -->
        </div><!-- /collapsible -->
   
   
   
   
   
    <!--<div data-role="collapsible" data-iconpos="right" data-theme="d" data-content-theme="d" data-inset="false">
    <div>menu</div>
    <div data-role="collapsible">
    <ul>
    <li><a href="#m_index.php" data-rel="back">All</a></li>
    </ul>
    </div>
    </div>-->
	
	<div data-role="collapsible" data-iconpos="right" data-theme="d" data-content-theme="d" data-inset="false">
          <h1 class="panel-content">Post</h1>
          <div data-role="collapsible-set" data-iconpos="right" data-theme="b" data-content-theme="d" data-inset="false">
          
	<?php if(isset($_SESSION["loginMember"])){ ?>
	<div class="postForm"  style="text-align: center;">
	<form>
	<span>You login as <?php echo $_SESSION["loginMember"] ?>. <a class="logoutlink" href="/Dropbox/project/login/m_index.php?logout=true">Logout</a>.</span><br>		
	</form>
    
    
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
      
    <textarea class="title1" id="title1" name="title1" type="text"  rows="1" placeholder="Title:"></textarea><br>
    <textarea class="title1" id="content" name="content" type="text" rows="5" placeholder="You can start to share your discount information here."></textarea>


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
	</div>	
	<script src="js/upload.js"></script>
    
    <?php } else {?>
		<div align="center"><a class="loginlink" href="/Dropbox/project/login/m_index.php">Please login to post.</a></div>
	<?php	} ?>
    
    </div><!-- /collapsible-set -->
        </div><!-- /collapsible -->
    
    </div>
    </div>
	</body>
</html>
	