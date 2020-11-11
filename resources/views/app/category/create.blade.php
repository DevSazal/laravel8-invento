<!--  -->

@extends('layouts.app2')

@section('title', 'Category - App Dashboard')


@section('content2')


<div class="">
    <h3>Category</h3> <a href="{{ url('app/category/create') }}" class="btn btn-secondary"><i class="fas fa-plus-circle"></i> Create </a>
    <p>Lorem ipsum dolor..</p>

    <form action="{{ route('app.category.store') }}" method="POST">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="inputName">Category Title</label>
          <input type="text" name="name" class="form-control" id="inputName">
        </div>
      </div>

      <div class="form-group">
        <div class="form-check">

        </div>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>


</div>



@endsection
