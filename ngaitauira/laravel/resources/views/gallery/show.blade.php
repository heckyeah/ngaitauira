@extends('master')

@section('main_content')

			<div id="banner">
				<div id="slider">
					<h1>Whitiahua</h1>
					<p></p>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper" id="middle">
		<div class="staff container">
			<article class="page-article">
					@foreach ($events as $event )
					
					<img src="/img/site/gallery/preview/{{ $event->image }}" alt="Photo">
					@endforeach
			</article>
		</div>
	</div>
	@if(Auth::check())
		<div class="edit-panel">
			<a href="/admin/" id="full-edit"><i class="fa fa-pencil"></i><p>Admin Panel</p></a>
		</div>
	@endif

@endsection