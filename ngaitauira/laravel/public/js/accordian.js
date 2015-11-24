$(document).ready(function(){
    
  var deselected = $('.accordion dd').hide();
  var selected = $('.active').show();
    
	$('.accordion > dt > a').click(function() {
    	$(this).slideDown(500);
    	$(this).parent().next().slideToggle();
    	return false;
	});

});