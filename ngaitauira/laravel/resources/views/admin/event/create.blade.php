@extends('admin_master')

@section('main_content')
	<div id="navigation">
		<nav>
			<dl class="accordion">
				<dt><a href="">Event</a></dt>
				<dd class="active">
					<ul>
						<li><a href="/admin/event/create">Create Event</a></li>
						<li><a href="/admin/event/">Edit Event</a></li>
					</ul>
				</dd>

				<dt><a href="">Page</a></dt>
				<dd>
					<ul>
						<li><a href="/admin/page/create">Create Page</a></li>
						<li><a href="/admin/page/">Edit Page</a></li>
					</ul>
				</dd>

				<dt><a href="">Dynamic Content</a></dt>
				<dd>
					<ul>
						<li><a href="/admin/splash/">Splash Page</a></li>
						<li><a href="/admin/navigation/">Navigation</a></li>
						<li><a href="/admin/footer/">Footer</a></li>
					</ul>
				</dd>
				<dt><a href="">Account Settings</a></dt>
				<dd>
					<ul>
						<li><a href="/admin/account/create">Create Account</a></li>
						<li><a href="/admin/account/modify">Modify Account</a></li>
						<li><a href="/admin/account/delete">Delete User</a></li>
					</ul>
				</dd>

			</dl>
		</nav>
	</div>

	<div id="module">
		<form method="POST" action="/admin/event" enctype="multipart/form-data">
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
					<input type="date" name="start_date" id="start_date" value="<?php echo $dmy; ?>">
				</div>
				<div class="half">
					<label for="end_date">End Date: </label>
					<input type="date" name="end_date" id="end_date" value="<?php echo $dmy; ?>">
				</div>

				<div class="half">
					<label for="time">Start Time: </label>
					<input type="time" name="start_time" id="start-time" value="{{ old('start_time') }}">
				</div>
				<div class="half">
					<label for="time">End Time: </label>
					<input type="time" name="end_time" id="end-time" value="{{ old('end_time') }}">
				</div>
				<div class="quater">
					<label for="number">Number</label>
					<input type="text" name="number" id="number" value="{{ old('number') }}">
				</div>
				<div class="quater">
					<label for="street">Street</label>
					<input type="text" name="street" id="street" value="{{ old('street') }}">
				</div>
				<div class="quater">
					<label for="suburb">Suburb</label>
					<input type="text" name="suburb" id="suburb" value="{{ old('suburb') }}">
				</div>
				<div class="quater">
					<label for="area">City</label>
					<input type="text" name="area" id="area" value="{{ old('area') }}">
				</div>
				<div class="quater">
					<label for="country">Country</label>
					<input type="text" name="country" id="country" value="{{ old('country') }}">
				</div>

				<div class="full no-space">
					<p class="full">Gallery Images:</p>
					<ul class="uploaded">
						@foreach( $event->images as $image)
						<li class="image">
							<input type="checkbox" class="checkbox" value="{{ $image->id }}" name="currentImage[]" id="currentImage">
							<img src="/img/site/gallery/thumbnail/{{ $image->image }}"  alt="">
						</li>
						@endforeach
						<li id="uploadPreview">
							<label for="choose" class="image-icon"><i class="fa fa-plus"></i></label>
							<input type="file" name="image[]" id="choose" multiple="multiple">
							<input type="hidden" value="{{ csrf_token() }}">
						</li>
					</ul>
				</div>
			</div>
			<div id="post-module">
					<div class="post-module-container">
						<div class="full">
							<select name="status">
								<option selected value="1">Active</option>
								<option value="0">Draft</option>
								<option value="2">Delete</option>
							</select>
						</div>
						<div class="full label-padding">
					    	<input type="checkbox" name="preview" id="preview">
							<label for="preview" class="checkbox">Check to view changes</label>
						</div>
					    <div class="full">
					    	<input type="hidden" name="type" value="event">
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