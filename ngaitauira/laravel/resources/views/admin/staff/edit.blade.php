@extends('admin_master')

@section('main_content')	
	<div id="module">
		<form method="POST" action="/admin/staff/{{ $event->slug }}/edit" enctype="multipart/form-data">
		    {!! csrf_field() !!}
			<div id="event_container">
				
				<div class="full center">
						<label for="choose" class="staff-member"><img src="/img/site/staff/{{ $event->image }}"  alt=""></label>
						<input type="file" name="photo" id="choose" multiple="multiple">
						<input type="hidden" value="{{ csrf_token() }}">
					<!-- @if ( $errors->first('image') )<p class="error message" style="clear:both;">{{ $errors->first('image') }}</p>@endif	 -->
				</div>

				<div class="half">
					<label for="title">Position: </label>
					<input type="text" name="title" id="title" value="{{ $event->title }}">
				</div>
				<div class="half">
					<label for="name">Name: </label>
					<input type="text" name="name" id="name" value="{{ $event->name }}">
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