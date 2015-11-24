<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ngai Tauira | Event Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/main.css">
</head>
<body>
	<div class="wrapper" id="top">
		<div class="container" id="mobile">
			<nav>
				<div id="site-name">
					<h1><a href="/">Ngāi Tauira</a></h1>
				</div>
				<ul id="menu-links">
					<li><a href="/">Kainga</a></li>
					<li><a href="/event/">Whakangahau</a></li>
					<li><a href="#">Nga Mahi</a>
					<ul>
						<li><a href="#">Whitiahua</a></li>
						<li><a href="#">Whakahua</a></li>
					</ul>
					</li>
					<li><a href="#">Komiti</a></li>
					<li><a href="#">Ko wai?</a>
					<ul>
						<li><a href="#">Whanonga Pono</a></li>
					</ul>
					</li>
					<li><a href="#">Whakapa mai</a></li>
				</ul>
				<div class="menu-icon">
					<button id="menu"><i class="fa fa-bars"></i></button>
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