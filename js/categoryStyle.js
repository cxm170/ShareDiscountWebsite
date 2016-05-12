$(document).ready(function(){
	$('#header li').mouseenter(function(){
		
		if($(this).hasClass('selected') == false)
		{
			$(this).addClass('selected');
			$(this).data('mark', 'yes');
		}
		
	});
	
	$('#header li').mouseleave(function(){
		
		if($(this).data('mark') == 'yes')
		{
			$(this).removeClass('selected');
			$(this).data('mark', 'no');
		}
		
	});
	
});
