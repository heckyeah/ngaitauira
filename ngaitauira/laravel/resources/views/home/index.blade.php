@extends('master')

@section('main_content')

			<div id="banner">
				<div id="cover">
					<button id="cover-edit"><i class="fa fa-picture-o"></i><p>Change Cover</p></button>
				</div>
				<!-- Image holder for banner -->
				<div id="slider">
					<a href="#" class="control_next"><i class="fa fa-chevron-right"></i></a>
					<a href="#" class="control_prev"><i class="fa fa-chevron-left"></i></a>
					<ul>
						<li><img src="img/banner/matarere-ball2.jpg" alt="">
						<li><img src="img/banner/matarere-ball.jpg" alt="">
						<li><img src="img/banner/matarere-ball2.jpg" alt="">
						<li><img src="img/banner/matarere-ball.jpg" alt="">
					</ul>  
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper" id="middle">
		<div id="modals-test" class="container">
			
			<div class="modal-background">
				<div class="modal">
					<div class="modal-heading">
						<h3>Quick Edit Post</h3>
						<a href="#" class="close-modal"><i class="fa fa-times"></i></a>
					</div>
					<div class="modal-field">
						<form action="index.html" method="post" novalidate>
							<div class="section">
								<fieldset>
									<legend>Details</legend>
									<input type="text" class="full" name="title" id="title" placeholder="Enter event title">
									<textarea name="content" id="content" cols="30" rows="10"></textarea>
								</fieldset>
							</div>
							<div class="section">
								<fieldset>
									<legend>Location</legend>
									<div class="section-split">
										<div class="options">
											<label for="start-date">Start Date: </label>
											<input type="date" name="start-date" id="start-date">
										</div>
										<div class="options">
											<label for="end-date">End Date: </label>
											<input type="date" name="end-date" id="end-date">
										</div>
									</div>
									<div class="section-split">
										<div class="options">
											<label for="time">Start Time: </label>
											<input type="time" name="start-time" id="start-time">
										</div>
										<div class="options">
											<label for="time">End Time: </label>
											<input type="time" name="end-time" id="end-time">
										</div>
									</div>
									<div class="section-split">
										<label for="date">Place: </label>
										<input type="text" name="title" id="title" placeholder="Enter event title">
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2997.927492654269!2d174.7449935154227!3d-41.2886824792733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d38b04ed3259b1f%3A0xe39054302dbd24d4!2s56+Duthie+St%2C+Karori%2C+Wellington+6012!5e0!3m2!1sen!2snz!4v1446016233152" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
									</div>
								</fieldset>
							</div>
						</form>
					</div>
				</div>
			</div>
			<article>
				<h2>To do list</h2>
				<hr>
				


			</article>
			<aside>
				
				<div class="widget-3 widget-default">
					<h2>Location & Time</h2>
					<hr>
					<img src="http://placehold.it/315x180/e2cd00/222" alt="">
					<table>
						<tr>
							<td>Date:</td>
							<td>03/02/2016</td>
						</tr>
						<tr>
							<td>Time:</td>
							<td>9:00AM - 10:00PM</td>
						</tr>
						<tr>
							<td>Place:</td>
							<td>56 Duthie Street, Karori, Wellington</td>
						</tr>
					</table>
				</div>

				<div class="widget-2 widget-default">
					<h2>Next Event</h2>
					<hr>
					<img src="http://placehold.it/220x315/e2cd00/222" alt="">
				</div>
			</aside>
		</div>
	</div>

	@if(Auth::check())
	<div class="edit-panel">
		<a href="/admin/" id="full-edit"><i class="fa fa-pencil"></i><p>Admin Panel</p></a>
	</div>
	@endif

@endsection