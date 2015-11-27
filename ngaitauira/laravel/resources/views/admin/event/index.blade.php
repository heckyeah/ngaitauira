@extends('admin_master')

@section('main_content')
	<div id="module">
		<div class="container_full" id="event_container">
			@if ( Session::get('delete') )
		  	<p class="success">{{ Session::get('delete') }} <a href="" class="clear-message"><i class="fa fa-times"></i></a></p>
			@endif
			<table>
				<tr>
					<td><p>Image</p></td>
					<td><p>Title</p></td> 
					<td><p>Status</p></td>
					<td><p>Modify</p></td>
				</tr>
  
				@foreach ($events as $event)
				<tr>
					<td>
						<div class="thumb">
							<?php $first = true; ?>
							@foreach ( $event->images as $image )
								@if ( $first )
								<img src="/img/site/gallery/thumbnail/{{ $image->image }}" alt="">
								<?php $first = false; ?>
								@else
								@endif
							@endforeach
						</div>
					</td>
					<td>
						<a href="{{ $event->slug }}/edit">{{ $event->title }}</a>
						<p>
							<?php echo strip_tags( substr($event->content, 0, 200) ); ?>...						
						</p>
					</td>
					<td>
						@if ( $event->status == 0 )
						<p class="red">Draft</p>
						@elseif ( $event->status == 1 )
						<p class="green">Active</p>
						@endif
					</td>
					<td>
						<a href="/admin/event/{{ $event->slug }}/edit" class="edit">Edit</a>
						<button id="delete">Delete</button>
						<div class="modal-background">
							<div class="button-modal small">
								<div class="modal-heading">
									<h3>Are you sure you want to delte this event?</h3>
									<a href="#" class="close-modal"><i class="fa fa-times"></i></a>
								</div>
								<div class="modal-field">
									<div class="section">
										<form action="/admin/event/{{ $event->slug }}/delete" method="POST">
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