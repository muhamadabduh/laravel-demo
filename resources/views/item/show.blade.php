@extends('adminlte.master')

@section('content')
    <div class="ml-3 mt-3">
      <h3>Detail Item</h3>
      <p> Item's name : {{ $item->name }} </p>
      <p> Description : {{ $item->description }} </p>
      <p> Price : {{ $item->price }} </p>
      <p> Stock : {{ $item->stock }} </p>
      @foreach($item->tags as $tag) 
        <button class="btn btn-default btn-sm"> {{$tag->tag_name}} </button>
      @endforeach
    </div>
@endsection