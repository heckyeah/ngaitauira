<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="utf-8">

<title>Ngai Tauira | Edit: {{ $event->title }}</title>
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"></link>
<link rel="stylesheet" type="text/css" href="/src/bootstrap-wysihtml5.css"></link>
<link rel="stylesheet" type="text/css" href="/css/main.css"></link>

</head>
<body id="post">
	<form method="POST" action="/admin/event/{{ $event->id }}/edit">
	    {!! csrf_field() !!}
		<div id="event_container">
			<div class="full">
				<input type="text" name="title" id="title" value="{{ $event->title }}">
			</div>

		    <div class="full">
				<textarea class="textarea" id="content" name="content" style="width: 100%; height: 400px">{{ $event->content }}</textarea>
			</div>

			<div class="full">
				<p>Upload Images:</p>
				<label for="image" class="image-icon"><i class="fa fa-plus"></i></label>
				<input type="file" name="image" id="image">
				<input type="hidden" value="{{ csrf_token() }}">
			</div>

		    <div class="half">
				<label for="start_date">Start Date: </label>
				<input type="date" name="start_date" id="start_date" value="{{ $event->start_date }}">
			</div>
			<div class="half">
				<label for="end_date">End Date: </label>
				<input type="date" name="end_date" id="end_date" value="{{ $event->end_date }}">
			</div>

			<div class="half">
				<label for="time">Start Time: </label>
				<input type="time" name="start_time" id="start-time" value="{{ $event->start_time }}">
			</div>
			<div class="half">
				<label for="time">End Time: </label>
				<input type="time" name="end_time" id="end-time" value="{{ $event->end_time }}">
			</div>
			<div class="quater">
				<label for="number">Number</label>
				<input type="text" name="number" id="number" value="{{ $location->number }}">
			</div>
			<div class="quater">
				<label for="street">Street</label>
				<input type="text" name="street" id="street" value="{{ $location->street }}">
			</div>
			<div class="quater">
				<label for="suburb">Suburb</label>
				<input type="text" name="suburb" id="suburb" value="{{ $location->suburb }}">
			</div>
			<div class="quater">
				<label for="area">City</label>
				<input type="text" name="area" id="area" value="{{ $location->area }}">
			</div>
			<div class="quater">
				<label for="country">Country</label>
				<input type="text" name="country" id="country" value="{{ $location->country }}">
			</div>

		    <div class="full">
		        <button type="submit">Make Changes</button>
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