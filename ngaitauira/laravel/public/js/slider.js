$(document).ready(function ($) {
  
	var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
	var slideHeight = $('#slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	
    // Only show the slider if there is more then one banner photo
    if (slideCount > 1 ) {
    	$('#slider').css({ width: slideWidth, height: slideHeight });
    	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
        $('#slider ul li:last-child').prependTo('#slider ul');
        function moveLeft() {
            $('#slider ul').animate({
                left: + slideWidth
            }, 500, function () {
                $('#slider ul li:last-child').prependTo('#slider ul');
                $('#slider ul').css('left', '');
            });
        };
        function do_slide(){
            interval = setInterval(function(){
                moveRight();
            }, 4000);
        }
        do_slide();

        $('ul li').hover(function(){
            clearInterval(interval);
        });
        $('ul li').mouseleave(function(){
            do_slide();
        });

        function moveRight() {
            $('#slider ul').animate({
                left: - slideWidth
            }, 500, function () {
                $('#slider ul li:first-child').appendTo('#slider ul');
                $('#slider ul').css('left', '');
            });
        };

        $('a.control_prev').click(function () {
            clearInterval(interval);
            moveLeft();
            do_slide();
        });

        $('a.control_next').click(function () {
            clearInterval(interval);
            moveRight();
            do_slide();
        });
    } else {
        $('a.control_prev').hide();
        $('a.control_next').hide();
    }

});  