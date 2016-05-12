$(document).on("click",".submitComment",function(){		


		var d = new Date();		
			var month = d.getMonth()+1;
			var day = d.getDate();
			var hour = d.getHours();
			var minute = d.getMinutes();
			var second = d.getSeconds();
			var output_date = d.getFullYear() + '-'  + month + '-' + day;
			
			var output_time=hour+":"+minute+":"+second;



			var date_val=output_date+" "+output_time;
		
		
			var content_val=$("#comment_content").val();	

			var post_val=$("#submitComment").val();
			
			/*Terence add one more variable for flickr image address*/
			var flicklink_val =$("#id_link").val();	

			var comment_count="commentcount-"+post_val;
			var comment_display=$("#"+comment_count).text();
			var current_commentcount=parseInt(comment_display.replace("Comment (","").replace(")",""));
			var next_commentcount=current_commentcount+1;
			$.post("createComment.php",
						{
						date:date_val,
						content:content_val,
						post:post_val,
						flickrimg:flicklink_val
						},
						function(data){
					
							   $(data).hide().insertBefore("div.post_comment:first").fadeIn();


							 $("#comment_content").val("");
				
							 $("#"+comment_count).text("Comment ("+next_commentcount+")");
							 $("#results").text("");
							 $("#searchterm").val("");
							 $("#id_link").val("");
					
							});
				});
				

				

			

