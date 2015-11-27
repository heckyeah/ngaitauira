@extends('admin_master')

@section('main_content')
	<div id="module">
		<div id="event_container">
			<form action="/admin/footer" method="post">
				<div class="full space">
					<h3>First Section:</h3>
					<label for="heading-1">Heading</label>
					<input type="text" name="heading-1" id="heading-1">
					<textarea name="heading-1-content" id="heading-1-content" cols="30" rows="10"></textarea>
				</div>
				<div class="half">
					<h3>Second Section:</h3>
					<input type="text" name="heading-2" id="heading-2">
					<label for="section-one">Options</label>
					<input type="text" name="section-one" id="section-one">
					<input type="text" name="section-two" id="section-two">
					<input type="text" name="section-three" id="section-three">
				</div>
				<div class="half">
					<h3>Three Section:</h3>
					<input type="text" name="heading-3" id="heading-3">
					<label for="social-1">Social Network</label>
					<input type="text" name="social-1" id="social-1">
					<input type="text" name="social-2" id="social-2">
					<input type="text" name="social-3" id="social-3">
				</div>
			</form>
		</div>
	</div>
<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/accordian.js"></script>
@endsection