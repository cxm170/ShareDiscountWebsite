
<!DOCTYPE html>
<?php session_start();
$_SESSION["image"]=null;
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
	<div data-role="page" id="demo-page" data-theme="d">
	
    <div data-theme="b" data-role="header">
    	
    	<?php if(isset($_SESSION["loginMember"])){ ?>
    	 <a data-role="button" href="login/m_index.php?logout=true" class="ui-btn-left">
            Logout
        </a>
                <a data-role="button" href="m_newpost.php" class="ui-btn-right">
            Post
        </a>
        <?php } else {?>

        <a data-role="button" href="login/m_index.php" class="ui-btn-left">
            Login
        </a>
        <?php	} ?>


        <h3>
            Discount Sharing
        </h3>
    </div>
	
    
	<div data-role="content">

    <?php require 'm_showPost.php'; ?>
   
    

    
    </div><!-- /collapsible-set -->
       
<div data-theme="b" data-role="footer">
        <h2>
            2013 PolyU COMP 5322 Group 1 All Rights Reserved.
        </h2>
    </div>

       </div><!-- /collapsible -->

	</body>
</html>
	