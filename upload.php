<?php
session_start();

foreach ($_FILES["images"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $name = iconv("UTF-8","GBK", $_FILES["images"]["name"][$key]);
        if (file_exists("uploads/".$name)){
        	move_uploaded_file( $_FILES["images"]["tmp_name"][$key], "uploads/others/" . $name);
        	$_SESSION["image"]="others/" . $name;
        }
        else{
        move_uploaded_file( $_FILES["images"]["tmp_name"][$key], "uploads/" . $name);
        $_SESSION["image"]=$name;}
    }
}
        



