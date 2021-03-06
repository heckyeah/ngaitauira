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
						<h3>Cover Edit Post</h3>
						<a href="#" class="close-modal"><i class="fa fa-times"></i></a>
					</div>
					<div class="modal-field">
						<form action="index.html" method="post" novalidate>
							<div class="section">
								<fieldset>
									<legend>Gallery</legend>
									<div class="section-split">
										<label for="image" class="image-upload"><i class="fa fa-plus"></i></label>
										<input type="file" name="image" id="image">
									</div>
								</fieldset>
							</div>
						</form>
					</div>
				</div>
			</div>
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
				<h2>Te Taitara</h2>
				<hr>
				<p>Kāore i ārikarika ngā tino tutukinga a Ngāi Tauira i tēnei tau. Heoi anō, ahakoa ngā painga, me he toka tū i te rere o te awa, he taupā hoki kua tō i te rere o ngā mahi mō te tau. Hei tīmatanga korero pea, ahakoa ngā piki me ngā heke, kua kino tonu te rere o ngā wai o te awa o Ngāi Tauira. Ko tētahi o ngā tino whakatutukitanga ia tau, ia tau ko Te Ao Marama, koia rā te mata ō te akonga ki te ao e mārama ai ngā āhuatanga o tōna anō ao. Me mihi ka tika ki a Te Pō me ngā ringa kākā e whakairo ana i ngā paetara o tēnei māheni ā tātou. Otirā ki ngā kaiwhakaniko o ngā kupu, ngā kaitārai i ngā korero, koutou akonga mā, tēnā koutou. Nō reira, e Te Pō Mārie o Te Ao Mārama, tēnā rawa atu koe, otirā tēnā tātou katoa.</p>

				<p>The year so far has brought many significant triumphs. These triumphs have been the result of reactive and proactive responses to many significant challenges that have laid before us. We cannot commend enough our extensive whānau across VUW that have aided us in our journey thus far. We would like to take this opportunity to thank our Pipitea whānau, Nga Rangahautira (Law) and Ngā Taura Ūmanga (Commerce) and also Te Rōpu Āwhina (Architecture) for holding the fort down the hill, as these relationships have been one of the main focuses for our respective Executives, it is awesome to see, the kotahitanga that has developed between our campuses.</p>

				<p>The first task that we decided to push came well before we began our term as Tumuaki Takirua (I bet Te Wehi didn’t know that he wa s about to lay out a wero that he would go on to partake in). This task came in the form of an idea called ‘Ngā uaratanga o Te Huinga Tauira’. This idea stemmed from the premise that not enough tauira were acknowledging tikanga and te reo Māori at Te Huinga Tauira. The idea was intended to uplift and encourage the use of our mother tongue and customs by remembering and celebrating the many feats of our many Māori ambassadors that shared a similar desire—their passion for things Māori. The major aspects of this taonga would encompass; te reo, ngā tikanga, ngā whanonga, which would ultimately create that perception known as wairua Māori, and help with waiaro Māori.</p>

				<p>Although this task was intended for Te Mana Ākonga, it also turned out to be a task that we needed to address internally as well. Therefore, everything we have done so far this year has been in line with ‘Ngā Uaratanga o Te Huinga Tauira’.</p>

				<p>This new found lease on life has been the driving force behind our desire to re-ignite the flames of connection with all the Māori Departments here at VUW. This has led to many collaborations and events with Te Herenga Waka Marae and Toihuarewa, as well as Te Pūthi Atawhai. These relationships have all been influential in many of our successes this year, and to some extent have been the reason for our success. Not enough can be said about the staff at the Marae! We realise now that we are only one of the many strings in the web of Māori development here at VUW.</p>

				<p>To our Executive, our squad leaders, our waka paddlers. Your mahi so far this year has been massive! (keep it up) at times stressful (yeah… let’s stop that) but mostly massive!. You are what keeps us going when times get tough! As the saying goes “he uru kāhika ki te ngāhere, he uru tāngata ki te pā”.</p>

				<p>As professional hui-goers, critics, mentors, inspirational speakers (as Te Wehi would like to think), consultation document writers, negotiators, zombies (with those long hours without a decent moe), event planners and in our spare time, tauira, we’ve been blessed with a contingent of tauira that uphold our cultural identity that celebrates those who have gone before us, which in turn celebrates us as an Association. It is these small acts of recognition of our culture within a foreign space that oozes inspiration and instils our passion to be the best Tumuaki we can be. The focus on things Māori is essentially what our tauira yearn for and is what sets us apart, after all, everything we do is for our tauira.</p>

				<p>“He muka tuitui i te korowai whakamarumaru i te hunga e whanake ana”.</p>
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

@endsection