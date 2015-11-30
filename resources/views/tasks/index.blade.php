@extends('layouts.master')


@section('style')
    body { background-image: url('img/bg-index.jpg');
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-attachment:fixed;
     }
@stop


@section('content')
<div class="myHome">
    <p class="lead">Following are the available places for lodging. <a href="{{ route('tasks.create') }}">Post a new ad</a> 
        Or <a href= "tasks/search">search specifically</a></p>
    <!--  "tasks/search" -->
    <hr>
    
    @foreach($tasks as $task)
        <h3>Post Title: {{ $task->title }}</h3>
        <p>Description: {{ $task->description}}</p>
        <p>Price: {{ $task->price }}</p>
        <p>
            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">View Ad Post</a>
            @if(Auth::user()->id==$task->user_id)
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit Post</a>
            @endif
            posted by: {{ $task->user_id }}   
        </p>
        <hr>
    @endforeach
</div>

@stop




