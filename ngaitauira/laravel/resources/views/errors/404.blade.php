Error Page not found
You will be redirected in 5 seconds
@if( Auth::check() )
<?php header( "refresh:5;url=/admin/" ); ?>
@else
<?php header( "refresh:5;url=/" ); ?>
@endif