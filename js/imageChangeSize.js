$(document).on("click",'article img',function(){
	
	// Jiwei changes ready() to on(), so that newly created posts can be traced.
		if($(this).attr('enlarge') == 'true')
		{
			$(this).attr('enlarge', 'false');
			$(this).attr('width', '180');
		}
		else
		{
			$(this).attr('enlarge', 'true');
			$(this).attr('width', '440');
		}
		
		});
	
	
$(document).on("click",'.post_comment img',function(){
	
	// Jiwei changes ready() to on(), so that newly created posts can be traced.
		if($(this).attr('enlarge') == 'true')
		{
			$(this).attr('enlarge', 'false');
			$(this).attr('width', '180');
		}
		else
		{
			$(this).attr('enlarge', 'true');
			$(this).attr('width', '440');
		}
		
		});