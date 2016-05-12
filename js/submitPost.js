$(document).on("click",".submitPost",function(){		


		var d = new Date();		
			var month = d.getMonth()+1;
			var day = d.getDate();
			var hour = d.getHours();
			var minute = d.getMinutes();
			var second = d.getSeconds();
			var output_date = d.getFullYear() + '-'  + month + '-' + day;
			
			var output_time=hour+":"+minute+":"+second;



			var date_val=output_date+" "+output_time;
		
		
			var title_val=$("#title1").val();	
			var content_val=$("#content").val();

			

			var category_val=$("#category").val();

			
			/*Terence add one more variable for flickr image address*/
			var flicklink_val =$("#id_link").val();
			
			$.post("createPost.php",
						{
						date:date_val,
						title1:title_val, 
						content:content_val,
						category:category_val,
						flickrimg:flicklink_val
						},
						function(data){
							 //alert("Successful!");
							   $(data).hide().insertBefore("article:first").fadeIn();


							 $("#title1").val("");
							 $("#content").val("");
							 $("#images").val("");
							 $("#response").text("");
							 $("#image-list").text("");
							 $("#results").text("");
							 $("#searchterm").val("");
							 $("#id_link").val("");
							 $("#normalPost").slideToggle();
					
							});
				});
				

$(document).on("click","#showPostButton",function(){	
	$("#normalPost").slideToggle("slow");
	

});
			
$(document).on("click","#useFlickr",function(){
	$("#flickrsearch").slideToggle("fast");

});

$(document).on("keyup","textarea",function(e){


    while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
        $(this).height($(this).height()+1);
    };
});




$(document).ready(function(){
	var footer='<div align="center"  class="trademark">© 2013 PolyU COMP 5322 Group 1 All Rights Reserved.</div>'
	$("body").append(footer);


});




// $(document).ready(function() {
//   var $window = $(window),
//   $navigation = $(".floatPost");

//   $window.scroll(function() {
//     if (!$navigation.hasClass("fixed") && ($window.scrollTop() > $navigation.offset().top)) {
//         $navigation.addClass("fixed").data("top", $navigation.offset().top);
//     }
//     else if ($navigation.hasClass("fixed") && ($window.scrollTop() < $navigation.data("top"))) {
//         $navigation.removeClass("fixed");
//     }
//   }); 
// });