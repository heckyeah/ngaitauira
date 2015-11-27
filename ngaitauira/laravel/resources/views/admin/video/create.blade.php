@extends('admin_master')

@section('main_content')
	<div id="module">
		<form method="POST" action="/admin/video/">
		    {!! csrf_field() !!}
			<div id="event_container">
				<div class="half">
					<label for="video">Video: </label>
					<input type="text" name="video" id="video" value="{{ $event->video }}">
				</div>
				<div class="half">
					<label for="player">Player: </label>
					<select name="player" id="player">
						<option value="youtube">Youtube</option>
						<option value="vimeo">Vimeo</option>
					</select>
				</div>
				<div class="full">
					<label for="title">Title: </label>
					<input type="text" name="title" id="title" value="{{ $event->title }}">
				</div>
				<div class="full">
					<label for="description">Description: </label>
					<textarea name="description" id="description" cols="30" rows="10"></textarea>
				</div>
			</div>
			<div id="post-module">
				<div class="post-module-container">
				    <div class="full">
				        <button type="submit">Make Changes</button>
				    </div>
				</div>
			</div>
		</form>
	</div>
<script src="/js/wysihtml5-0.3.0.js"></script>
<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/images.js"></script>
<script src="/js/accordian.js"></script>
<script src="/src/bootstrap-wysihtml5.js"></script>
<script>$('.textarea').wysihtml5();</script>
@endsection