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
		
		<!-- Modals Start -->

		<div class="modal-background">
			<div class="modal">
				<div class="modal-field">
					<div class="section-1">
						<div id="gallery-disp">
							<a class="gallery_next"><i class="fa fa-chevron-right"></i></a>
							<a class="gallery_prev"><i class="fa fa-chevron-left"></i></a>
							<ul>
								@foreach( $event->images as $image)
									<li><img src="/img/site/gallery/preview/{{ $image->image }}" alt="">
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Modals End -->

		<div class="container">
			<article>
				<h2>{{ $event->title }}</h2>
				<div class="fb-share-button" data-href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" data-layout="button"></div>
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
							alt="A map of {{ str_replace('+',' ', $location->location_map) }}">
						</picture>
					<table>
						<tr>
							<td>Date:</td>
							<td>{{ $event->start_date }} - {{ $event->end_date }}</td>
						</tr>
						@if ( $event->start_time && $event->end_time )
						<tr>
							<td>Time:</td>
							<td>{{ $event->start_time }} - {{ $event->end_time }}</td>
						</tr>
						@endif
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
					<button id="gallery-button">View Photos</button>
				</div>
				@endif
			</aside>
		</div>
	</div>

	@if(Auth::check())
		<div class="edit-panel">
			<a href="/admin/{{ $event->type }}/{{ $event->slug }}/edit" id="full-edit"><i class="fa fa-pencil"></i><p>Edit Page</p></a>
			<a href="/admin/{{ $event->type }}/" id="full-edit"><i class="fa fa-pencil"></i><p>Show {{ $event->type }}s</p></a>
			<a href="/admin/" id="full-edit"><i class="fa fa-pencil"></i><p>Admin Panel</p></a>
		</div>
	@endif



@endsection