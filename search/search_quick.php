<?php 
$search =null;

 if(isset($_GET['quicksearch']))
{
$search = $_GET['quicksearch']; 
  }
if(strlen($search)<=1)
echo "Search term too short";
else{
echo "You searched for <b>$search</b> <hr size='1'></br>";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Google Powered Site Search | Tutorialzine Demo</title>

<link rel="stylesheet" type="text/css" href="styles.css" />


</head>
<body>
<input type="hidden" name="quickterm" id="quickterm" value="<?php echo $search; ?>" />

<div id="page">

    <div>
	<p align="center"><a href="../index.php"><img class="img-title" src="../images/title1.gif" width="526" height="86"></a></p>
    <p align="center"><img class="img-title2" src="../images/title2.gif" width="698" height="37"></p>
    </div>

    <form id="searchForm" method="post" style="display:none"  >
        <fieldset>
            <input id="s" type="text" />

            <input type="submit" value="Submit" id="submitButton" />

            <div id="searchInContainer">
                <input type="radio" name="check" value="site" id="searchSite" checked />
                <label for="searchSite" id="siteNameLabel">Search</label>

                <input type="radio" name="check" value="web" id="searchWeb" />
                <label for="searchWeb">Search The Web</label>
            </div>

            <ul class="icons">
                <li class="web" title="Web Search" data-searchType="web">Web</li>
                <li class="images" title="Image Search" data-searchType="images">Images</li>
                <li class="news" title="News Search" data-searchType="news">News</li>
                <li class="videos" title="Video Search" data-searchType="video">Videos</li>
            </ul>
	
        </fieldset>
    </form>
	<input type="button" value="Start New Search" onclick="self.location.href='search.html'"/>
    <div id="resultsDiv">	</div>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<!-- <script src="script.js"></script> -->
<script src="script_test_quick.js"></script>
</body>
</html>