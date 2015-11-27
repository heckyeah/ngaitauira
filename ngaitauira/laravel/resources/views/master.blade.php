<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@if (isset($event))
		@if ( $event->type == 'event' || $event->type == 'page' )
		<title>Ngai Tauira | {{ $event->title }}</title>
		<meta name="description" content="<?php echo strip_tags($event->content); ?>">
		@endif
	@else
	<title>Ngai Tauira</title>
	<meta name="description" content="VICTORIA UNIVERSITY OF WELLINGTON MĀORI STUDENTS' ASSOCIATION">
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/main.css">
	
	@if ( isset($event) && $event->type == 'event' )
	<meta property="og:url"           content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $event->title}}" />
    <meta property="og:description"   content="@if ($event->content) {{ $event->content }} @endif" />
    <meta property="og:image"         content="
	<?php $first = true; ?>
	@foreach ($event->images as $image )
    	<?php echo "http://$_SERVER[HTTP_HOST]/img/site/thumbnail/$image->image" ?>
		<?php $first = false; ?>    
	@endforeach
    " />
    @endif
</head>
<body>
	@if ( isset($event) && $event->type == 'event')
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1447461632244895";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	@endif
	<div class="wrapper" id="top">
		<div class="container" id="mobile">
			<nav>
				<div id="site-name">
					<h1><a href="/">Ngāi Tauira</a></h1>
				</div>
				<ul id="menu-links">
					<li><a href="/">Kainga</a></li>
					<li><a href="/event/">Whakangahau</a></li>
					<li><a href="/page/a-matou-mahi">A Matou Mahi</a>
					<ul>
						<li><a href="/page/video">Whitiahua</a></li>
						<li><a href="/page/gallery">Whakahua</a></li>
					</ul>
					</li>
					<li><a href="/page/staff">Komiti</a></li>
					<li><a href="/page/ko-wai-matou">Ko wai?</a>
					<ul>
						<li><a href="/page/whanonga-pono">Whanonga Pono</a></li>
					</ul>
					</li>
					<li><a href="/page/te-ao-marama">Te Ao Marama</a></li>
				</ul>
				<div class="menu-icon">
					<a id="menu"><i class="fa fa-bars"></i></a>
				</div>
			</nav>
	
	@yield('main_content')

	<footer class="wrapper" id="bottom">
		<div class="container">
			<div class="col-four">
				<h3>Haere Mai</h3>
				<hr>
				<p>Room 102-103, 42-44 Kelburn Parade</p>
				<p>Victoria University of Wellington, Wellington, NZ</p>
			</div>
			<div class="col-four">
				<h3>Nama Waea</h3>
				<hr>
				<p><i class="fa fa-phone"></i>04-463-9762</p>
				<p><i class="fa fa-phone"></i>04-463-6978</p>
			</div>
			<div class="col-four">
				<h3>Hononga</h3>
				<hr>
				<a href="#" class="social-network"><i class="fa fa-instagram"></i></a>
				<a href="#" class="social-network"><i class="fa fa-youtube"></i></a>
				<a href="https://www.facebook.com/ngaitauiraVUW" class="social-network"><i class="fa fa-facebook"></i></a>
			</div>
			<div class="col-four">
				<img src="/img/layout/logo.jpg" alt="">
			</div>
			<div class="col-one">
				<p>© 2015 by Te Kōmiti Whakahaere o Ngāi Tauira. </p>
			</div>
		</div>
	</footer>

	<script src="/js/jquery-1.11.3.min.js"></script>
	<script src="/js/menu.js"></script>
	<script src="/js/slider.js"></script>
	<script src="/js/gallery.js"></script>
</body>
</html>