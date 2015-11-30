@extends('layouts.master')


@section('style')
    body { background-image: url('img/vill-2.jpg');
			-webkit-background-size: cover;
  			-moz-background-size: cover;
  			-o-background-size: cover;
  			background-size: cover;
     }
@stop

@section('content')

<h1>Search for a specific place</h1>
<hr>

@include('partials.alerts.errors')


<form method="POST" action="/questions" enctype="multipart/form-data" class="col-md-6">

 {{ csrf_field() }}
<div class="form-group">
    {!! Form::label('search', 'Enter city name', ['class' => 'control-label']) !!}
    {!! Form::text('search', null, ['class' => 'form-control']) !!}
</div>


{!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}

</form>


@stop
