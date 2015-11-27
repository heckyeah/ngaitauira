@extends('master')

@section('main_content')

			<div id="banner">
				<!-- Image holder for banner -->
				<div id="slider">
					<h1>Te Komiti</h1>
					<p></p>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper" id="middle">
		<div class="staff container">
			<article class="page-article staff-page">
					@foreach ($events as $event )
					<div class="staff-display">
						<img src="/img/site/staff/{{ $event->image }}" alt="">
						<h5>{{ $event->title }}</h5>
						<p>{{ $event->name }}</p>
					</div>
					@endforeach
			</article>
		</div>
	</div>
	@if(Auth::check())
	<div class="edit-panel">
		<a href="/admin/staff/" id="full-edit"><i class="fa fa-pencil"></i><p>Edit Staff</p></a>
	</div>
	@endif

@endsection