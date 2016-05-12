function deleteComment(ID){
if(confirm("Do you really want to delete this comment?")){
		 var commentID="comment-"+ID;

	 var comment_div=document.getElementById(commentID);

       	$("#"+commentID).fadeOut("slow");
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
      var post_val=$("#submitComment").val();
        

      var comment_count="commentcount-"+post_val;
      var comment_display=$("#"+comment_count).text();
      var current_commentcount=parseInt(comment_display.replace("Comment (","").replace(")",""));
      var next_commentcount=current_commentcount-1; 

      $("#"+comment_count).text("Comment ("+next_commentcount+")");
    }
  }
xmlhttp.open("POST","deleteComment.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("ID="+ID);
}
}

   
