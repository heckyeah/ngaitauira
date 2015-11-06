@extends('master')

@section('content')

<div class="row">
	<div class="columns">
		<h1>Upload your capture</h1>

		<form action="/pokecentre/capture" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

			<label for="pokemon">Who's that Pokemon?</label>
			<select name="pokemon" id="pokemon">
				@foreach($allPokemon as $pokemon)

				<option value="{{ $pokemon->id }}">{{ $pokemon->name }}</option>

				@endforeach
			</select>
			{{ $errors->first('pokemon') }}

			<label for="location">Location: </label>
			<select name="location" id="location">
				<option>Where did you capture this Pokemon?</option>
				<option>Kanto</option>
				<option>Johto</option>
				<option>Hoenn</option>
				<option>Sinnoh</option>
				<option>Unova</option>
				<option>Kalos</option>
			</select>
			{{ $errors->first('location') }}

			<label for="photo">Photo: </label>
			<input type="file" name="photo" class="button">
			{{ $errors->first('photo') }}

			<input type="submit" value="Add to collection" class="tiny button">
			
		</form>
	</div>
</div>

@endsection