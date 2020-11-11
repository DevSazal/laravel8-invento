<!--  -->

@extends('layouts.app2')

@section('title', 'Edit | Company - App Dashboard')


@section('content2')


<div class="">
    <h3>Company</h3> <a href="{{ url('app/company/create') }}" class="btn btn-secondary"><i class="fas fa-plus-circle"></i> Create </a>
    <p>Lorem ipsum dolor..</p>

    <form action="{{ route('app.company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="input">Company Title:</label>
          <input type="text" name="name" class="form-control" id="input" value="{{ $company->name }}">
        </div>
        <div class="form-group col-md-6">
          <label for="input">Select Category:</label>
          <select name="category_id" class="form-control" id="inputSelect">
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="input">No of Employee</label>
          <input type="number" name="no_of_employee" class="form-control" id="input"  value="{{ $company->no_of_employee }}">
        </div>
        <div class="form-group col-md-6">
          <label for="input">Website</label>
          <input type="text" name="website" class="form-control" id="input" value="{{ $company->website }}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="input">Phone Number</label>
          <input type="text" name="phone" class="form-control" id="input" value="{{ $company->phone }}">
        </div>
        <div class="form-group col-md-6">
          <label for="input">Email</label>
          <input type="text" name="email" class="form-control" id="input" value="{{ $company->email }}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="input">Address:</label>
          <input type="text" name="address" class="form-control" id="input" value="{{ $company->address }}">
        </div>
        <div class="form-group col-md-6">
          <label for="input">Company Logo:</label>
          <div class="custom-file">
            <input type="file" name="logo" class="custom-file-input" id="customFile" accept="image/*">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="form-check">

        </div>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>


</div>



@endsection
