<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ngai Tauira | Admin Panel</title>
	<link rel="stylesheet" href="font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/admin-panel.css">
</head>
	<body>
		<nav id="navigation">
			<ul id="admin-panel">
				<li><a href="#">Pages <i class="fa fa-caret-down"></i></a>
					<ul>
						<li><a href="#">Create Page</a></li>
						<li><a href="#">Edit Page</a></li>
						<li><a href="#">Re-arrange Pages</a></li>
					</ul>
				</li>
				<li><a href="#">Events <i class="fa fa-caret-down"></i></a>
					<ul>
						<li><a href="#">Create Event</a></li>
						<li><a href="#">Edit Event</a></li>
					</ul>
				</li>
				<li><a href="#">Dynamic Content <i class="fa fa-caret-down"></i></a>
					<ul>
						<li><a href="#">Splash Page</a></li>
						<li><a href="#">Navigation</a></li>
						<li><a href="#">Footer</a></li>
					</ul>
				</li>
				<li><a href="#">Settings <i class="fa fa-caret-down"></i></a>
					<ul>
						<li><a href="#">Create Account</a></li>
						<li><a href="#">Change Password</a></li>
						<li><a href="#">Delete User</a></li>
					</ul>
				</li>
			</ul>
		</nav>
		<div class="container">
			<div class="page">
				<div class="contents">
					@yield('main_content')
				</div>
			</div>
		</div>
		
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/adminPanel.js"></script>
	</body>
</html>