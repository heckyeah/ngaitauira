@extends('admin_master')

@section('main_content')
	<div id="module">
		<form method="POST" action="/admin/page/{{ $event->slug }}/edit/" >
		    {!! csrf_field() !!}
			<div id="event_container">

			    <div class="full">
					<textarea class="textarea" id="content" name="content" style="width: 100%; height: 400px">{{ $event->content }}</textarea>
					@if ( $errors->first('content') )<p class="error message">{{ $errors->first('content') }}</p>@endif
				</div>
				
			</div>
			<div id="post-module">
				<div class="post-module-container">

					@if ( $event->status == 1 )
					<div class="full label-padding">
				    	<input type="checkbox" name="preview" id="preview">
						<label for="preview" class="checkbox">Check to view changes</label>
					</div>
					@endif

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