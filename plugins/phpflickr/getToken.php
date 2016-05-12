<?php
    /* Last updated with phpFlickr 1.4
     *
     * If you need your app to always login with the same user (to see your private
     * photos or photosets, for example), you can use this file to login and get a
     * token assigned so that you can hard code the token to be used.  To use this
     * use the phpFlickr::setToken() function whenever you create an instance of 
     * the class.
     */
    
    
    require_once("phpFlickr.php");
 
$apiflickrKey = "0195e186e74603021dc5b413e7b8e024";
$pwkey =  "a9a05c85c2090215";
$userlevel = "write";
 
$f = new phpFlickr($apiflickrKey, $pwkey);
 
//Redirect to flickr for authorization
if(!$_GET['frob']){
$f->auth($userlevel);
}else {
//If authorized, print the token
$tokenArgs = $f->auth_getToken($_GET['frob']);
echo "<pre>"; var_dump($tokenArgs); echo "</pre>";
}
 
    
?>