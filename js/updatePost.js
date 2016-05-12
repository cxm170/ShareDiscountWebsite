$(document).on("click",".updatePost",function(){				
if(confirm("Do you want to update this post now?")){				
	var d = new Date();		
			var month = d.getMonth()+1;
			var day = d.getDate();
			var hour = d.getHours();
			var minute = d.getMinutes();
			var second = d.getSeconds();
			var output_date = d.getFullYear() + '-'  + month + '-' + day;
			
			var output_time=hour+":"+minute+":"+second;



			var date_val=output_date+" "+output_time;

				var postID_val=$("#updatePost").val();
				var title2_val=$("#title2").val();
				var content2_val=$("#content2").val();


				
			$.post("editPost.php",
						{
						postID:postID_val,	
						date:date_val,
						title2:title2_val, 
						content2:content2_val},
						function(data){
							 $("#post-"+postID_val).html(data);
							});				
}
			});