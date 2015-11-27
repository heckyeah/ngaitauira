<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="utf-8">

<title>Ngai Tauira</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"></link>
<link rel="stylesheet" type="text/css" href="/src/bootstrap-wysihtml5.css"></link>
<link rel="stylesheet" type="text/css" href="/css/main.css"></link>

</head>
<body id="post">
	<div id="navigation">
		<nav>
			<dl class="accordion">
				<dt><a href="">Event</a></dt>
				<dd>
					<ul>
						<li><a href="/admin/event/create">Create Event</a></li>
						<li><a href="/admin/event/">Edit Event</a></li>
					</ul>
				</dd>
				<dt><a href="">Pages</a></dt>
				<dd>
					<ul>
						<li><a href="/admin/page/">Static Pages</a></li>
						<li><a href="/admin/staff/">Staff Page</a></li>
						<li><a href="/admin/video/">Video Page</a></li>
					</ul>
				</dd>
				<dt><a href="">Other</a></dt>
				<dd>
					<ul>
						<li><a href="/">Back Home</a></li>
						<li><a href="/auth/logout">Log Out</a></li>
					</ul>
				</dd>
			</dl>
		</nav>
	</div>
	@yield('main_content')
</body>
</html>