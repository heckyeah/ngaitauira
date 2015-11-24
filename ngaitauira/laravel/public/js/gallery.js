$(document).ready(function ($) {
  
	var slideCount = $('#gallery-disp ul li').length;
	var slideWidth = $('#gallery-disp ul li').width();
	var slideHeight = $('#gallery-disp ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	
    if (slideCount > 1 ) {
	$('#gallery-disp').css({ width: slideWidth, height: slideHeight });
	$('#gallery-disp ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
    $('#gallery-disp ul li:last-child').prependTo('#gallery-disp ul');
    
    function moveLeft() {
        $('#gallery-disp ul').animate({
            left: + slideWidth
        }, 500, function () {
            $('#gallery-disp ul li:last-child').prependTo('#gallery-disp ul');
            $('#gallery-disp ul').css('left', '');
        });
    };

    function moveRight() {
        $('#gallery-disp ul').animate({
            left: - slideWidth
        }, 500, function () {
            $('#gallery-disp ul li:first-child').appendTo('#gallery-disp ul');
            $('#gallery-disp ul').css('left', '');
        });
    };

    $('a.gallery_prev').click(function () {
        clearInterval(interval);
        moveLeft();
    });

    $('a.gallery_next').click(function () {
        clearInterval(interval);
        moveRight();
    });

    } else {
        $('a.gallery_next').hide();
        $('a.gallery_prev').hide();
    }

    $("button").click(function(){
        var id = this.id;

        if (id == 'gallery-button') {
            var modal = 0;
        } else if (id == 'map-button') {
            var modal = 1;
        } else {

        }

        $('.modal-background:eq( '+modal+' )').addClass('modal-afx');
        $("body, html").addClass('overflow');

        $('.modal-background:eq( '+modal+' )').click(function() {
            $('#middle .modal-background:eq( '+modal+' )').removeClass('modal-afx');
            $("body, html").removeClass('overflow');
        });
    });

    $(".modal").click( function( event ) {
        event.stopPropagation();
    });

});