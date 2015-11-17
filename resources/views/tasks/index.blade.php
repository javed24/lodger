@extends('layouts.master')

@section('content')

<h1>Task List</h1>
<p class="lead">Here's a list of all your posts. <a href="{{ route('tasks.create') }}">Post a new ad</a></p>
<hr>

@foreach($tasks as $task)
    <h3>{{ $task->title }}</h3>
    <p>{{ $task->description}}</p>
    <p>
        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">View Ad Post</a>
        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit Post</a>
    </p>
    <hr>
@endforeach

@stop