@extends('layouts.master')




@section('content')
<link rel="stylesheet" href="style.css">

<div class="panel panel-default">
  <div class = "panel-heading">Post Information</div>
  <ul class="list-group">
    <li class="list-group-item">
      <h1>{{ $task->title }}</h1>
    </li>  
    
      <li class="list-group-item">
        <p class="lead">Price: {{ $task->price }}</p>
      </li>
    
      <li class="list-group-item">
        <p class="lead">Country: {{ $task->country }}</p>
      </li>
      
      <li class="list-group-item">
        <p class="lead">City: {{ $task->city }}</p>
      </li>

      <li class="list-group-item">
        <h3>Details: </h3><p class="lead">{{ $task->description }}</p>
      </li>
  
  </ul>
</div>

    

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('tasks.index') }}" class="btn btn-info">Back to all tasks</a>
        <a href="#myModal" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Place a booking</a>
       
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

    <!-- Modal content-->
                <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Book a Lodge</h4>
                      </div>
                      <div class="modal-body">
                        
                            <div class="form-group">
                                <label for="name">Your Name:</label> 
                                <input type="text" id="owner" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Owner Email:</label> 
                                <input type="text" id="ownerEmail" class="form-control">
                            </div>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                      </div>
                </div>

             </div>
        </div>        


        @if(Auth::user()->id==$task->user_id)
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit Task</a>
        @endif
    </div>



   <div class="col-md-6 text-right">
       @if(Auth::user()->id==$task->user_id)
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['tasks.destroy', $task->id]
        ]) !!}
            {!! Form::submit('Delete this task?', ['class' => 'btn btn-danger']) !!}
       @endif
        {!! Form::close() !!}
    </div>
</div>


<div class="myRow">
  <div class="panel panel-info">
    <div class = "panel-heading">User Ratings</div>
       <div class ="panel-body">
        <form method="POST" action="/like/<?php echo urlencode($task->id)?>" enctype="multipart/form-data">
           {{ csrf_field() }}
           <button type="submit" class ="btn btn-success">Recommendations: {{$task->upvote}}</button>
         </form>
         
         <form method="POST" action="/dislike/<?php echo urlencode($task->id)?>" enctype="multipart/form-data">
           {{ csrf_field() }}
           <button type="submit" class ="btn btn-warning">Dislike: {{$task->downvote}}</button>
         </form>
         
         
          </div>
     </div>
</div>



@stop