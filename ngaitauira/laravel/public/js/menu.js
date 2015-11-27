// Make sure the document is loaded
$(document).ready(function(){
	// When the button is clicked activate function
	$('#menu').click(function() {
		// Switch between menu hide and menu show
		$('#menu-links').toggle();
	});
	$('#menu, #menu-links').click( function( event ) {
    	event.stopPropagation();
	});
});