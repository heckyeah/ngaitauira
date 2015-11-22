@extends('master')

@section('main_content')

			<div id="banner">
				<!-- Image holder for banner -->
				<div id="slider">
					<a href="#" class="control_next"><i class="fa fa-chevron-right"></i></a>
					<a href="#" class="control_prev"><i class="fa fa-chevron-left"></i></a>
					<ul>
						@foreach( $event->images as $image)
							<li><img src="/img/gallery/{{ $image->image }}" alt="">
						@endforeach
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
				<div class="widget-3 widget-default">
					<h2>Location & Time</h2>
					<hr>
					<img src="https://maps.googleapis.com/maps/api/staticmap?center={{ $location->location_map }}&amp;zoom=15&amp;size=315x158&amp;maptype=roadmap&amp;key=AIzaSyCWbvxqrJ3bZsQpCtETsUXVjwOqESXpAbA" alt="">
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
							<td>{{ $location->number }} {{ $location->street }}, {{ $location->suburb }}, {{ $location->area }}</td>
						</tr>
					</table>
				</div>
			</aside>
		</div>
	</div>

	<div class="edit-panel">
		<a href="/admin/event/{{ $event->id }}/edit" id="full-edit"><i class="fa fa-pencil"></i><p>Edit Event</p></a>
	</div>

@endsection