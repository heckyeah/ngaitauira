@extends('master')

@section('main_content')
			<div id="banner">
				<div id="slider">
					<a href="#" class="control_next"><i class="fa fa-chevron-right"></i></a>
					<a href="#" class="control_prev"><i class="fa fa-chevron-left"></i></a>
					<ul>
						@foreach ( $images as $image)
						<li><img src="/img/site/slider/{{ $image->image }}" alt="">
						@endforeach
					</ul>  
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper" id="middle">
		<div class="category_container">
			<article class="category">
				<h2>Events</h2>
				<div class="tabs_container">
				@foreach ( $events as $event )
					<a class="tab" href="/page/{{ $event->slug }}">
						<span class="button">View Event</span>
							<?php $first = true; ?>
							@foreach ( $event->images as $image )
								@if ( $first )
								<img src="/img/site/thumbnail/{{ $image->image }}" alt="">
								<?php $first = false; ?>
								@else
								@endif
							@endforeach
						<h3><?php echo substr(strip_tags($event->title), 0, 19); ?>...</h3>
						<hr>
						<p><?php echo substr(strip_tags($event->content), 0, 200); ?>...</p>
					</a>
				@endforeach
				</div>
			</article>
		</div>
	</div>
@endsection