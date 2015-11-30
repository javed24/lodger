@extends('layouts.master')

@section('style')
    body { background-image: url('img/vill-1.jpg');
			-webkit-background-size: cover;
  			-moz-background-size: cover;
  			-o-background-size: cover;
  			background-size: cover;
  			background-repeat: no-repeat;
     }
@stop

@section('content')

<div class = "myHome">
	<h1>Explore the world</h1>
	<p class="lead">Find hosts with extra rooms, entire homes, and unique accommodations like castles and igloos. Be it the Himalayas, 
    or the Bay of Bengal, our unique system will help you find your desired lodging. Try us!</p>
	<hr>
	
	<a href="{{ route('tasks.index') }}" class="btn btn-info">View Tasks</a>
	<a href="{{ route('tasks.create') }}" class="btn btn-primary">Add New Task</a>

	<!-- test grids -->
		<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12 box">
          	<h2>Book a stay</h2>
          	<p>Connect with hosts, confirm travel dates, and pay—all through 
              Lodeger’s trusted services. Our system is secure than most of the existing ones.
              We encourage you to share all kinds of spaces on Airbnb! Whether 
              you’re offering a seaside villa or an air mattress in the corner of your 
              living room, it’s free to list your space. When you’re ready 
              to start welcoming guests, you can publish your listing for the world to see.
              We encourage you to share all kinds of spaces on Airbnb! Whether you’re offering 
              a seaside villa or an air mattress in the corner of your living room, it’s free to 
              list your space. When you’re ready to start welcoming guests, you can publish your listing for the world to see.
            </p>
          	<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-12 box">
          <h2>Travel</h2>
          <p>Feel at home, anywhere you go in the world. Learn more about how to 
            travel on Lodger's travel wing. Once you have a confirmed reservation, 
            it’s time to prepare for your guests! From tidying your space and coordinating 
            key exchange to greeting your guests and giving them neighborhood tips, 
            hosting on Airbnb is an artform. Guests who love your space will want to book it! 
            On Airbnb, you have the option to require guests to send a reservation request or 
            allow certain guests to book your space instantly through Instant Book.
          </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
      </div>
	<!-- test grids -->


</div>
@stop
