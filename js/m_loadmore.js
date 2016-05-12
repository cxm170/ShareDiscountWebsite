function loadMore(PostID,CategoryID){


	var lastPostID=PostID;
	var showCategory=CategoryID;
	// var showCategory="all";
	// switch(CategoryID){
	// 	case 0: showCategory = "others";break;
	// 	case 1: showCategory = "food";break;
	// 	case 2: showCategory = "electronics";break;
	// 	case 3: showCategory = "clothes";break;
	// 	case 4: showCategory = "travelling";break;
	// 	case 5: showCategory = "all";break;
	// }

	$.post("m_loadmore.php",
	{
		lastPostID:lastPostID,
		showCategory:showCategory
	},
	function(data){

			$("#loadmore").remove();
			$(data).hide().insertAfter("article:last").fadeIn();


	});



}


// function loadMore(PostID){

// 		 var lastPostID=PostID;

// if (window.XMLHttpRequest)
//   {// code for IE7+, Firefox, Chrome, Opera, Safari
//   xmlhttp=new XMLHttpRequest();
//   }
// else
//   {// code for IE6, IE5
//   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//   }
// xmlhttp.onreadystatechange=function()
//   {
//   if (xmlhttp.readyState==4 && xmlhttp.status==200)
//     {

//     	//post_div.parentNode.removeChild(post_div);

// 			$("#loadmore").remove();
// 			alert(xmlhttp.responseText);
// 			$(xmlhttp.responseXML).hide().insertBefore("article:first").fadeIn();
//     }
//   }
// xmlhttp.open("POST","loadMore.php",true);
// xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
// xmlhttp.send("lastPostID="+lastPostID);

// }

   
