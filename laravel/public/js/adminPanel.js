$(document).ready(function(){

	var liCount = $('#admin-panel > li').length;

		$('#admin-panel > li > ul').each(function(i){
			$(this).attr('id', 'sub-menu'+i);
		});

		$('#admin-panel > li').each(function(i){
			$(this).attr('id', 'menu'+i);
		});


		$('#admin-panel > li#menu'+i).click(function(){
				$('#admin-panel > li > ul#sub-menu'+i).toggle();
		});	

		for ( var i = 0; i < liCount; i++ ) {
	
		}


});