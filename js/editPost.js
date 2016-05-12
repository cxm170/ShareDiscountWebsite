	function editPost(ID){
	
	var editID ="edit-"+ID;
	 var postID="post-"+ID;
	 var titleID="title-"+ID;
	 var contentID="content-"+ID;
	 var post_div=document.getElementById(postID);
   var post_title=document.getElementById(titleID);
   var post_content=document.getElementById(contentID);
	
	 post_div.innerHTML="<span><span><br><form align='center'><textarea id='title2' name='title2' type='text' rows='1' cols='70'>"+post_title.innerHTML+"</textarea><br><textarea id='content2' name='content2' type='text' rows='5' cols='70'>"+post_content.innerHTML+"</textarea><br><input class='updatePost' type='button' value='Update'><br><br><input type='hidden' id='updatePost' value='"+ID+"'></form></span></span>";





	//$("#"+postID).html().append("<span><span><br><form align='center'><textarea id='title2' name='title2' type='text' rows='1' cols='70'>"+post_title.innerText+"</textarea><br>");
	//$("#"+postID).append("<textarea id='content2' name='content2' type='text' rows='5' cols='70'>"+post_content.innerHTML+"</textarea><br>");
	//$("#"+postID).append("<input class='updatePost' type='button' value='Update'><br><br><input type='hidden' id='updatePost' value='"+editID+"'></form></span></span>");
	
	// $("#"+postID).html().append("<form align='center'><textarea id='title2' name='title2' type='text' rows='1' cols='70'></textarea>");
	// $("#"+postID).append("<textarea id='content2' name='content2' type='text' rows='5' cols='70'></textarea>");
	// $("#"+postID).append("<input id="" class='updatePost' type='button' value='Update'><br><br><input type='hidden' id='updatePost' value=''></form>");

	
	}
	