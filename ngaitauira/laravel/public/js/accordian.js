$(document).ready(function(){
 
    
	$('.accordion > dt > a').click(function() {
    	$(this).slideDown(500);
    	$(this).parent().next().slideToggle();
    	return false;
	});

});