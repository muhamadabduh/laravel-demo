@extends('adminlte.master')

@section('content')
  <div class="ml-3 mt-3">
    <form action="/categories" method="post">
      @csrf
      <div class="form-group">
        <label for="name">Category Name</label>
        <input class="form-control" type="text" name="name" placeholder="Isi Nama Kategori">

        <input class="btn btn-primary mt-2" type="submit" value="Create Category">
      </div>
    </form>
  </div>
@endsection