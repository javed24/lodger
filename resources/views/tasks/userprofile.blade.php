@extends('layouts.master')

@section('content')

<link rel="stylesheet" href="style.css">


	<div class="panel panel-primary">
		<div class="panel-heading">Your Profile</div>
		<div class="panel-body">
			<h4>Username: {{ Auth::user()->name }}</h4>
			<h4>Email: {{ Auth::user()->email }}</h4>
			<h4>Joined since: {{ Auth::user()->created_at }}</h4>
			<hr>
			<h4>Your Posts:</h4>
			@foreach($posts as $post)
			<h4>
				<li>{{ $post->title }}</li>
			</h4>
			@endforeach
		</div>
	</div>


@stop