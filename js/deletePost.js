function deletePost(ID){
if(confirm("Do you really want to delete this post?")){
		 var postID="post-"+ID;
	 var titleID="title-"+ID;
	 var contentID="content-"+ID;
	 var post_div=document.getElementById(postID);
   var post_title=document.getElementById(titleID);
   var post_content=document.getElementById(contentID);
       	$("#"+postID).fadeOut("slow");
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

    	//post_div.parentNode.removeChild(post_div);
	
    }
  }
xmlhttp.open("POST","deletePost.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("ID="+ID);

}
}


