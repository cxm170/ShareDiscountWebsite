<HTML>
<head>
 <meta charset="UTF-8" />
		 <title>Discount Information Sharing</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<?php
//Include phpFlickr
require_once("plugins/phpflickr/phpFlickr.php");
$error=0;
$f = null;
if($_POST){
if(!$_POST['name'] || !$_FILES["file"]["name"]){
$error=1;
}else{
if ($_FILES["file"]["error"] > 0){
echo "Error: " . $_FILES["file"]["error"] . "<br />";
}else if($_FILES["file"]["type"] != "image/jpg" && $_FILES["file"]["type"] != "image/jpeg" && $_FILES["file"]["type"] != "image/png" && $_FILES["file"]["type"] != "image/gif"){
$error = 3;
}else if(intval($_FILES["file"]["size"]) > 525000){
$error = 4;
}else{
$dir= dirname($_FILES["file"]["tmp_name"]);
$newpath=$dir."/".$_FILES["file"]["name"];
rename($_FILES["file"]["tmp_name"],$newpath);
//Instantiate phpFlickr
$status = uploadPhoto($newpath, $_POST["name"]);
if(!$status) {
$error = 2;
}
}
}
}
 
function uploadPhoto($path, $title) {
$apiflickrKey = "0195e186e74603021dc5b413e7b8e024";
$pwkey = "a9a05c85c2090215";
$userlevel = "write";
$token = "72157633242244466-bcd7fb0f47765269";
 
$f = new phpFlickr($apiflickrKey, $pwkey, true);
$f->setToken($token);
return $f->async_upload($path, $title);
}
?>



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

    <div>
	<a href="index.php"><img class="img-title" src="images/title1.gif" width="526" height="86"></a>
    <img class="img-title2" src="images/title2.gif" width="698" height="37">
    </div>

	
<div id="doc" class="yui-t7">
<div id="hd" role="banner"><h1>Flickr uploader</h1></div>
<div id="bd" role="main">
<div id="mainbar" class="yui-b">
<center>
<?php
 
if (isset($_POST['name']) && $error==0) {
echo " <h2>UPLOAD Success! find the photo in our flick:<a href='http://www.flickr.com/photos/94923549@N02/' target='_blank'>Our photo stream</a></h2> <Br> <a href='http://sharediscount.tk:25000/upload2flickr.php' target='_blank'>Back to upload page</a>";
}else {
if($error == 1){
echo " <font color='red'>Missing name or please select a file!</font>";
}else if($error == 2) {
echo " <font color='red'>Server Error, please upload again!</font>";
}else if($error == 3){
echo " <font color='red'>Format errorr! Allowed format:JPG, JPEG, PNG or GIF</font>";
}else if($error == 4){
echo " <font color='red'>File too large! Please select a file smaller than 512KB</font>";
}
?>
<a href='index.php'> <h2>Main Page</h2> </a>
<br>
<a href='gallery_site.php'> <h2>View All photo of our flickr!!</h2> </a>
<h2>Upload your Pic!</h2>
<form method="post" accept-charset="utf-8" enctype='multipart/form-data'>
<p>Picuture Name: &nbsp; <input type="text" name="name" value="" ></p>
<p>Select Picture: <input type="file" name="file"/></p>
<p><input type="submit" value="Upload!!"></p>
</form>
<?php
}
?>
</div>
</div>
<div id="ft"></div>
</div>
</center>
</body>
</HTML>