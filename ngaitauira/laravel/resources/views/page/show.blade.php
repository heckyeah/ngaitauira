@extends('master')

@section('main_content')

			<div id="banner">
				<!-- Image holder for banner -->
				<div id="slider">
					@if ( $gallery == null )
						<h1>{{ $event->title }}</h1>
						<p></p>
					@else
					<a class="control_next"><i class="fa fa-chevron-right"></i></a>
					<a class="control_prev"><i class="fa fa-chevron-left"></i></a>
					<ul>
						@foreach( $slider as $image)
							<li><img src="/img/site/slider/{{ $image->images->image }}" alt="Photo"></li>
						@endforeach
					</ul>
					@endif  
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper" id="middle">
		<div class="container">
			<article class="page-article">
				<h2>{{ $event->title }}</h2>
				<hr>
				<?php echo htmlspecialchars_decode( $event->content ); ?>
			</article>
		</div>
	</div>
	@if(Auth::check())
		<div class="edit-panel">
			<a href="/admin/{{ $event->type }}/{{ $event->slug }}/edit" id="full-edit"><i class="fa fa-pencil"></i><p>Edit pages</p></a>
			<a href="/admin/{{ $event->type }}/" id="full-edit"><i class="fa fa-pencil"></i><p>Show pages</p></a>
			<a href="/admin/" id="full-edit"><i class="fa fa-pencil"></i><p>Admin Panel</p></a>
		</div>
	@endif

@endsection