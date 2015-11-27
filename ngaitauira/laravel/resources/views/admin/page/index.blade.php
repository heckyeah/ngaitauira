@extends('admin_master')

@section('main_content')
	<div id="module">
		<div class="container_full" id="event_container">
			@if ( Session::get('delete') )
		  	<p class="success">{{ Session::get('delete') }} <a href="" class="clear-message"><i class="fa fa-times"></i></a></p>
			@endif
			<table>
				<tr>
					<td><p>Title</p></td> 
					<td><p>Modify</p></td>
				</tr>
  
				@foreach ($events as $event)
				<tr>
					<td>
						<a href="/page/{{ $event->slug }}">{{ $event->title }}</a>
						<p>
							<?php echo strip_tags( substr($event->content, 0, 200) ); ?>...						
						</p>
					</td>
					<td>
						<a href="{{ $event->slug }}/edit" class="edit">Edit</a>
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