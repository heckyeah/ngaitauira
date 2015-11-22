@extends('admin_master')

@section('main_content')
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
				<dt><a href="">Page</a></dt>
				<dd>
					<ul>
						<li><a href="/admin/page/create">Create Page</a></li>
						<li><a href="/admin/page/">Edit Page</a></li>
					</ul>
				</dd>
				<dt><a href="">Dynamic Content</a></dt>
				<dd>
					<ul>
						<li><a href="/admin/splash/">Splash Page</a></li>
						<li><a href="/admin/navigation/">Navigation</a></li>
						<li><a href="/admin/footer/">Footer</a></li>
					</ul>
				</dd>
				<dt><a href="">Account Settings</a></dt>
				<dd>
					<ul>
						<li><a href="/admin/account/create">Create Account</a></li>
						<li><a href="/admin/account/modify">Modify Account</a></li>
						<li><a href="/admin/account/delete">Delete User</a></li>
					</ul>
				</dd>
			</dl>
		</nav>
	</div>

<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/accordian.js"></script>
@endsection