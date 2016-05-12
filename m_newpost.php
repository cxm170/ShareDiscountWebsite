<!DOCTYPE html>
<?php session_start();

?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <title>Publish New Post</title>
  <link rel="stylesheet" href="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.css">
  
  <!-- Extra Codiqa features -->
  <link rel="stylesheet" href="login/themes/codiqa.ext.css">
  <link rel="stylesheet" type="text/css" href="css/mobilestyle.css" />

  
  <!-- jQuery and jQuery Mobile -->
  <script src="https://d10ajoocuyu32n.cloudfront.net/jquery-1.9.1.min.js"></script>


  <!-- Extra Codiqa features -->

  <script src="js/editPost.js"></script>

  <script src="js/updatePost.js"></script> 
  <script src="js/deletePost.js"></script>


  <script src="js/m_submitPost.js"></script> 
  <script src="js/m_loadMore.js"></script> 

<script type="text/javascript">
$(document).bind("mobileinit", function () {
    $.mobile.ajaxEnabled = false;
});
</script>

    <script src="https://d10ajoocuyu32n.cloudfront.net/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

</head>
<body>
<!-- Home -->
<div data-role="page" id="page1">
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
    	<div class="postForm" >

            
          <form action="m_createPost.php" method="post" id="formpost">
					Please choose category: 
					<select name="category" id="category">
					<option value="0"></option>
					<option value="1">Food</option>
					<option value="2">Electronics</option>
					<option value="3">Clothes</option>
					<option value="4">Travelling</option>
					<option value="0">Others</option>
					</select>
				    <textarea class="title1" id="title1" name="title1" type="text"  rows="1" placeholder="Title:"></textarea>
				    
				    <textarea class="title1" id="content" name="content" type="text" rows="5" placeholder="You can start to share your discount information here."></textarea>
					<input  class="submitPost" type="submit" value="Post">
					</form>  
					       <div id="main" class="postForm">
          <form method="post" id="uploading_form" enctype="multipart/form-data"  action="upload.php">
          <input type="file" name="images" id="images"/>
      <!--       <button type="submit" id="btn">Upload Files!</button> -->
            </form>
            <div id="response"></div>
          <ul id="image-list"></ul>
        </div>
				</div>	

    </div>
<div data-theme="b" data-role="footer" data-position="fixed">
        <h2>
            2013 PolyU COMP 5322 Group 1 All Rights Reserved.
        </h2>
    </div>
</div>

   <script src="js/m_upload.js"></script>
</body>
 
</html>
