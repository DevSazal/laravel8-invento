<!--  -->

@extends('layouts.app')

@section('title', 'App Dashboard')


@section('content')


<div class="jumbotron text-center">
  <h1>Welcome</h1>
  <p></p>
</div>



<div class="row">
  <div class="col-md-4">
      <a href="{{ url('/register') }}"> Go to Register page ...</a>
      <div class="">
        <a href="{{ url('/logout') }}"> @ Logout</a>
      </div>
  </div>
  <div class="col-sm-8">
      <h3>Column 2</h3>
      <p>Lorem ipsum dolor..</p>
  </div>

</div>


@endsection
