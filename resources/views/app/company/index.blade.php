<!--  -->

@extends('layouts.app2')

@section('title', 'List | Company - App Dashboard')


@section('content2')


<div class="">
    <h3>Company</h3> <a href="{{ url('app/company/create') }}" class="btn btn-secondary"><i class="fas fa-plus-circle"></i> Create </a>
    <p>Lorem ipsum dolor..</p>


<table class="table table-dark table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Company Title</th>
      <th>Category</th>
      <th>email</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($companies as $company)
    <tr>
      <td>#{{ $company->id }}</td>
      <td>{{ $company->name }}</td>
      <td>{{ $company->category->name }}</td>
      <td>{{ $company->email }}</td>
      <td>
        <button onclick="$(this).parent().find('#edit').submit()" class="btn btn-outline-info">Edit</button>
        <button onclick="$(this).parent().find('#delete').submit()" class="btn btn-outline-danger">Delete</button>

              <form id="edit" method="POST" action="{{ route('app.company.edit', $company->id) }}">
                    @method('GET')
                    @csrf
              </form>
              <form id="delete" method="POST" action="{{ route('app.company.destroy', $company->id) }}">
                    @method('DELETE')
                    @csrf
              </form>

      </td>
    </tr>
    @endforeach

  </tbody>

</table>
  {{ $companies->links() }}


</div>



@endsection
