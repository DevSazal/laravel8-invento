<!--  -->

@extends('layouts.app2')

@section('title', 'Category - App Dashboard')


@section('content2')


<div class="">
    <h3>Category</h3>
    <p>Lorem ipsum dolor..</p>


<table class="table table-dark table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Category Title</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
    <tr>
      <td>#{{ $category->id }}</td>
      <td>{{ $category->name }}</td>
      <td>
        <button onclick="$(this).parent().find('#edit').submit()" class="btn btn-outline-info">Info</button>
        <button onclick="$(this).parent().find('#delete').submit()" class="btn btn-outline-danger">Danger</button>

              <form id="edit" method="POST" action="{{ route('app.category.edit', $category->id) }}">
                    @method('GET')
                    @csrf
              </form>
              <form id="delete" method="POST" action="{{ route('app.category.destroy', $category->id) }}">
                    @method('DELETE')
                    @csrf
              </form>

      </td>
    </tr>
    @endforeach

  </tbody>

</table>
  {{ $categories->links() }}


</div>



@endsection
