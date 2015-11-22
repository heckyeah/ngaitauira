@extends('master')

@section('main_content')

			<div id="banner">
				<!-- Image holder for banner -->
				<div id="slider">
					<a href="#" class="control_next"><i class="fa fa-chevron-right"></i></a>
					<a href="#" class="control_prev"><i class="fa fa-chevron-left"></i></a>
					<ul>
						@if ( $gallery == null )
								<li><img src="/img/site/slider/default.png" alt="Photo">
						@else
							@foreach( $slider as $image)
								<li><img src="/img/site/slider/{{ $image->images->image }}" alt="Photo">
							@endforeach
						@endif
					</ul>  
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper" id="middle">
		<div class="container">
			<article>
				<h2>{{ $event->title }}</h2>
				<hr>
				<?php echo htmlspecialchars_decode( $event->content ); ?>
			</article>
			<aside>
				@if ( $location->number != '' || $location->street != '' || $location->suburb != '' || $location->area != '' || $location->country != '')
				<div class="widget widget-default">
					<h2>Location & Time</h2>
					<hr>
					<picture>
					<source 
					media="(min-width: 1020px)"
					srcset="https://maps.googleapis.com/maps/api/staticmap?size=315x150&amp;maptype=roadmap\&amp;markers=size:mid%7Ccolor:red%7C{{ $location->location_map }}&amp;zoom=15&amp;key=AIzaSyCWbvxqrJ3bZsQpCtETsUXVjwOqESXpAbA">
					<source 
					media="(min-width: 775px)"
					srcset="https://maps.googleapis.com/maps/api/staticmap?size=710x260&amp;maptype=roadmap\&amp;markers=size:mid%7Ccolor:red%7C{{ $location->location_map }}&amp;zoom=15&amp;key=AIzaSyCWbvxqrJ3bZsQpCtETsUXVjwOqESXpAbA">
					<source 
					media="(min-width: 520px)"
					srcset="https://maps.googleapis.com/maps/api/staticmap?size=460x200&amp;maptype=roadmap\&amp;markers=size:mid%7Ccolor:red%7C{{ $location->location_map }}&amp;zoom=15&amp;key=AIzaSyCWbvxqrJ3bZsQpCtETsUXVjwOqESXpAbA">
					<source 
					media="(min-width: 320px)"
					srcset="https://maps.googleapis.com/maps/api/staticmap?size=400x190&amp;maptype=roadmap\&amp;markers=size:mid%7Ccolor:red%7C{{ $location->location_map }}&amp;zoom=15&amp;key=AIzaSyCWbvxqrJ3bZsQpCtETsUXVjwOqESXpAbA">
					<img 
					src="https://maps.googleapis.com/maps/api/staticmap?size=315x150&amp;maptype=roadmap\&amp;markers=size:mid%7Ccolor:red%7C{{ $location->location_map }}&amp;zoom=15&amp;key=AIzaSyCWbvxqrJ3bZsQpCtETsUXVjwOqESXpAbA" 
					alt="a cute kitten">
					</picture>
					<table>
						<tr>
							<td>Date:</td>
							<td>{{ $event->start_date }} - {{ $event->end_date }}</td>
						</tr>
						<tr>
							<td>Time:</td>
							<td>{{ $event->start_time }} - {{ $event->end_time }}</td>
						</tr>
						<tr>
							<td>Place:</td>
							<td>
							<?php
								if ( $location->number != '') {
									 echo $location->number.' ';
								}

								if ( $location->street != '' ) {
									 echo $location->street;
									if ( $location->suburb != ''|| $location->area != '' || $location->country != '' ) {
										echo ', ';
									}
								}

								if ( $location->suburb != '') {
									 echo $location->suburb;
									if ( $location->area != '' || $location->country != '' ) {
										echo ', ';
									}
								}

								if ( $location->area != '') {
									 echo $location->area;
									if ( $location->country != '' ) {
										echo ', ';
									}
								}

								if ( $location->country != '') {
									 echo $location->country;
								}
							?>
							</td>
						</tr>
					</table>
				</div>
				@endif
				@if ( $gallery != null )
				<div class="widget widget-default">
					<h2>Gallery</h2>
					<hr>
					<ul id="gallery">
					@foreach( $event->images as $image)
						<li><img src="/img/site/gallery/thumbnail/{{ $image->image }}" alt="">
					@endforeach
					</ul>
				</div>
				@endif
			</aside>
		</div>
	</div>
	@if(Auth::check())
	<div class="edit-panel">
		<a href="/admin/event/{{ $event->id }}/edit" id="full-edit"><i class="fa fa-pencil"></i><p>Edit Event</p></a>
	</div>
	@endif

@endsection