<!--  -->

@extends('layouts.app')

@section('title', 'Register')


@section('content')

<div class="jumbotron text-center">
  <h1>Register</h1>
  <p></p>
</div>

<form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputName">Name</label>
      <input type="text" name="name" class="form-control" id="inputName">
    </div>
    <div class="form-group col-md-6">
      <label for="inputUserName">Username</label>
      <input type="text" name="username" class="form-control" id="inputUserName">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail">
    </div>
    <div class="form-group col-md-6">
      <label for="inputDate">Date of Birth</label>
      <input type="date" name="date_of_birth" class="form-control" id="inputDate">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPhoto">Upload Your Photo</label>
      <!-- <input type="file" class="form-control" id="inputEmail"> -->
      <div class="custom-file">
        <input type="file" name="image" class="custom-file-input" id="customFile" accept="image/*">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
    </div>
  </div>


  <div class="form-group">
    <div class="form-check">

    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
@endsection
