@extends('admin_master')

@section('main_content')
	<div id="module">
		<div class="container_full" id="event_container">
			<div class="full">
				<a href="/admin/video/create" class="create-button">Post a Video</a>
				<a href="/page/video/" class="create-button">View Video Gallery</a>

			</div>
			<table>
				<tr>
					<td><p>Title</p></td> 
					<td><p>Modify</p></td>
				</tr>
  
				@foreach ($events as $video)
				<tr>
					<td>
						{{ $video->title }}
						<p>
							{{ $video->description }}
							<a href="https://www.youtube.com/watch?v={{ $video->video }}">{{ $video->video }}</a>
						</p>
					</td>
					<td>
						<a href="/admin/video/{{ $video->slug }}/edit" class="edit">Edit</a>
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