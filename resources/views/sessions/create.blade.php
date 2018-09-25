@extends('layouts.layout')


@section('content')
	
	<div class="col-md-8">
		
		<h1>Sign In</h1>

		<form method="POST" action="/login">
			
			{{ csrf_field() }}

			<div class="form-group">

				<label for="email" class="form-control" id="email" name="email">Email Adress:</label>
				<input type="email" class="form-control" id="email" name="email">

			</div>

			<div class="form-group">

				<label for="password" class="form-control" id="password" name="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password">

			</div>

			<div class="form-group">

				<button type="submit" class="btn btn-primary">Sign In</button>
				
			</div>

			@include('layouts.errors')

		</form>

	</div>

@endsection