@extends('layouts.master')



@section('content')



<div class="page-header"><h1>Here are your results</h1></div>

@foreach($tasks as $task)
    <h3>Post Name: {{ $task->title }}</h3>
    <p>Details: {{ $task->description}}</p>
    <p>Price: {{ $task->price }}</p>
    <p>Price: {{ $task->city }}</p>
    <p>Number of people who liked this place: {{ $task->upvote }}</p>
    <p>Number of people who disliked this place: {{ $task->downvote }}</p>
    <hr>
@endforeach

@stop