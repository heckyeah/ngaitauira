@extends('admin_master')

@section('main_content')
	<div id="navigation">
		<nav>
			<dl class="accordion">
				<dt><a href="/admin/event/">Event</a></dt>
				<dd class="active">
					<ul>
						<li><a href="/admin/event/create">Create Event</a></li>
						<li><a href="/admin/event/">Edit Event</a></li>
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

	<div id="module">
		<div id="event_container">
			@if ( Session::get('delete') )
		  	<p class="success">{{ Session::get('delete') }} <a href="" class="clear-message"><i class="fa fa-times"></i></a></p>
			@endif
			<table>
				<tr>
					<td>Image</td>
					<td>Title</td> 
					<td>Select</td>
				</tr>
  
				@foreach ($events as $event)
				<tr>
					<td>
						<div style="width:100px;display: block;">
							<img src="http://placehold.it/50x50/333/eee" alt=""><img src="http://placehold.it/50x50/eee/333" alt="">
						</div>
						<div style="width:100px;display: block;">
							<img src="http://placehold.it/50x50/eee/333" alt=""><img src="http://placehold.it/50x50/333/eee" alt="">
						</div>
					</td>
					<td>
						<a href="/admin/event/{{ $event->id }}/edit">{{ $event->title }}</a>
						<p>
							<?php echo strip_tags( substr($event->content, 0, 350) ); ?>...						
						</p>
					</td> 
					<td>
						<button id="cover-edit">Delete</button>
						<div class="modal-background">
							<div class="button-modal small">
								<div class="modal-heading">
									<h3>Are you sure you want to delte this event?</h3>
									<a href="#" class="close-modal"><i class="fa fa-times"></i></a>
								</div>
								<div class="modal-field">
									<div class="section">
										<form action="/admin/event/{{ $event->id }}/delete" method="POST">
											<input type="hidden" name="_method" value="PUT">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="submit" value="Delete">
										</form>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>				
				@endforeach
			</table>
		</div>
	</div>

<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/accordian.js"></script>
<script src="/js/modal.js"></script>
@endsection