$(document).ready(function(){

	$("button").click(function(){
		var id = this.id;

		if (id == 'quick-edit') {
			var modal = 1;
		} else if (id = 'cover-edit') {
			var modal = 0;
		}

		$('.modal-background:eq( '+modal+' )').addClass('modal-afx');
		$("body, html").addClass('overflow');

		$('.close-modal:eq( '+modal+' ), .modal-background:eq( '+modal+' )').click(function() {
			$('.modal-background:eq( '+modal+' )').removeClass('modal-afx');
			$("body, html").removeClass('overflow');
		});
	});

	$(".button-modal").click( function( event ) {
    	event.stopPropagation();
	});
});