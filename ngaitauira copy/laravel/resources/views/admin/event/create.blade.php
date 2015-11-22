<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="utf-8">

<title>bootstrap-wysihtml5</title>
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"></link>
<link rel="stylesheet" type="text/css" href="/src/bootstrap-wysihtml5.css"></link>
<link rel="stylesheet" type="text/css" href="/css/main.css"></link>

</head>
<body id="post">
	<form method="POST" action="/admin/event">
	    {!! csrf_field() !!}
		<div id="event_container">
			<div class="full">
				<input type="text" name="title" id="title" placeholder="Title here..." value="{{ old('content') }}">
			</div>

		    <div class="full">
				<textarea class="textarea" id="content" name="content" style="width: 100%; height: 400px">{{ old('content') }}</textarea>
			</div>

		    <div class="half">
				<label for="start_date">Start Date: </label>
				<input type="date" name="start_date" id="start_date" placeholder="Content here..." value="{{ old('content') }}">
			</div>
			<div class="half">
				<label for="end_date">End Date: </label>
				<input type="date" name="end_date" id="end_date" value="{{ old('content') }}">
			</div>

			<div class="half">
				<label for="time">Start Time: </label>
				<input type="time" name="start_time" id="start-time" value="{{ old('content') }}">
			</div>
			<div class="half">
				<label for="time">End Time: </label>
				<input type="time" name="end_time" id="end-time" value="{{ old('content') }}">
			</div>
			<div class="quater">
				<label for="number">Number</label>
				<input type="text" name="number" id="number" value="{{ old('content') }}">
			</div>
			<div class="quater">
				<label for="street">Street</label>
				<input type="text" name="street" id="street" value="{{ old('content') }}">
			</div>
			<div class="quater">
				<label for="suburb">Suburb</label>
				<input type="text" name="suburb" id="suburb" value="{{ old('content') }}">
			</div>
			<div class="quater">
				<label for="area">City</label>
				<input type="text" name="area" id="area" value="{{ old('content') }}">
			</div>
			<div class="quater">
				<label for="country">Country</label>
				<input type="text" name="country" id="country" value="{{ old('content') }}">
			</div>

		    <div class="full">
		        <button type="submit">Post Event</button>
		    </div>
		</div>
	</form>
<script src="/js/wysihtml5-0.3.0.js"></script>
<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/src/bootstrap-wysihtml5.js"></script>
<script>$('.textarea').wysihtml5();</script>

</body>
</html>