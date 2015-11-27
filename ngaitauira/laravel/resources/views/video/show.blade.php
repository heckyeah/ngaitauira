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
					@if ($event->player == 'youtube')
						<div class="video-container">
							<iframe src="https://www.youtube.com/embed/{{ $event->video}}" frameborder="0" allowfullscreen></iframe>
						</div>
					@elseif ($event->player == 'vimeo')
						<div class="video-container">

							<iframe height="100%" width="100%" allowfullscreen="" frameborder="0" src="//player.vimeo.com/video/{{ $event->video }}?autoplay=false&amp;loop=false&amp;byline=false&amp;portrait=false&amp;title=false" ></iframe>
							
						</div>
					@endif
					@endforeach
			</article>
		</div>
	</div>
	@if(Auth::check())
		<div class="edit-panel">
			<a href="/admin/video/" id="full-edit"><i class="fa fa-pencil"></i><p>Edit Videos</p></a>
			<a href="/admin/" id="full-edit"><i class="fa fa-pencil"></i><p>Admin Panel</p></a>
		</div>
	@endif

@endsection