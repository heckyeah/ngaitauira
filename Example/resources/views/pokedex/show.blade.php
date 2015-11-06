@extends('master')

@section('content')

<div class="row">
	<div class="columns">
		<h1><small>Pokemon #{{ $pokemon->id }}:</small> {{ $pokemon->name }}</h1>

		@foreach( $pokemon->capture as $capture )
		<figure>
			<img src="/img/captures/{{ $capture->photo }}" alt="">
			<figcaption>
				Caught by {{ $capture->user->name }}
				@if( \Auth::check() && $capture->user_id == \Auth::user()->id )

				<a href="/pokecentre/captures/{{$capture->id}}/edit">Edit your {{ $capture->pokemon->name }}</a>

				@endif
				<ul>
					<li>Found in {{ $capture->location }}</li>
					<li>Attack level {{ $capture->attack }}</li>
					<li>Defense level {{ $capture->defense }}</li>
				</ul>
			</figcaption>

			<h2>Votes</h2>
			<ul>
				<li>Upvotes: {{ $capture->vote->where('vote', 'true')->count() }}</li>
				<li>Downvotes: {{ $capture->vote->where('vote', 'false')->count() }}</li>
			</ul>


			@if( \Auth::check() )

			<a href="/pokedex/vote/{{ $capture->id }}/up">Upvote</a>
			<a href="/pokedex/vote/{{ $capture->id }}/down">Downvote</a>


			@endif
		</figure>
		@endforeach
	</div>
</div>

@endsection