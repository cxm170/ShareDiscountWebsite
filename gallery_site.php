<HTML>
<?php
session_start();
 
  
	?>
 <head>
		 <meta charset="UTF-8" />
		 <title>Discount Information Sharing</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		    <link rel="stylesheet" href="css/style_upload.css" />
		    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
	
	
<script type="text/javascript">
            function showImgLarge(imgName) {
                document.getElementById('IDImgLarge').src = imgName;
                showPanelImgOverlay();
                LeavePanel();
            }
            function showPanelImgOverlay() {
                document.getElementById('PanelImgOverlay').style.visibility = 'visible';
            }
            function LeavePanel() {
                if(document.selection) document.selection.empty();
                if(window.getSelection) window.getSelection().removeAllRanges();
            }
            function hideMe(obj) {
                obj.style.visibility = 'hidden';
            }
        </script>
 
        <style type="text/css">
            #PanelImgOverlay {
                text-align: center;
                visibility: hidden;
                position: fixed;
                z-index: 100;
                top: 0; left: 0; width: 100%; height: 100%;
                background-color: rgba(100,100,100, 0.5);
            }
        </style>
	
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

    <div>
	<a href="index.php"><img class="img-title" src="images/title1.gif" width="526" height="86"></a>
    <img class="img-title2" src="images/title2.gif" width="698" height="37">
    </div>
	

<center>
<?php
require_once("plugins/phpflickr/phpFlickr.php");; // path to phpFlickr

$user_id  = '94923549@N02';
$per_page = 10;


$apiflickrKey = "0195e186e74603021dc5b413e7b8e024";




$xml      = 'http://api.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&api_key='.$apiflickrKey.'&user_id='.$user_id.'&per_page='.$per_page;

$flickr   = simplexml_load_file($xml);
$count = 0;
foreach($flickr->photos->photo as $p) {
    /*echo '<a href="http://www.flickr.com/photos/'.$p['owner'].'/'.$p['id'].'">';*/
    /*echo '<img width="120px" src="http://farm'.$p['farm'].'.static.flickr.com/'.$p['server'].'/'.$p['id'].'_'.$p['secret'].'_s.jpg">';*/
    /*echo '<img width="520px" src="http://farm'.$p['farm'].'.static.flickr.com/'.$p['server'].'/'.$p['id'].'_'.$p['secret'].'_b.jpg">';*/
	  
   $imgsrc = "http://farm".$p['farm'].".static.flickr.com/".$p['server']."/".$p['id']."_".$p['secret']."_s.jpg";
   $imgsrc_l = "'http://farm".$p['farm'].".static.flickr.com/".$p['server']."/".$p['id']."_".$p['secret']."_b.jpg'";
   /*echo $imgsrc.'<br>';*/
   echo '<img width="120px" src="'.$imgsrc.'" onclick="showImgLarge('.$imgsrc_l.');">'; 
    echo '</a>';
    echo $p['tag'];
	$count=$count+1;
	if($count==5) echo '<br>';
}

?>
</center>
</body>

<div id="PanelImgOverlay" onclick="hideMe(this);">
            <img id="IDImgLarge" style="height: 100%; margin: 0; padding: 0;" />
</div>
</HTML>