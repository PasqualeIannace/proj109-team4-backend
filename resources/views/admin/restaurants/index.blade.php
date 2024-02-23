@extends('layouts.admin')

@section('content')
 <div class="container-sm d-flex flex-wrap p-5">
    @foreach($foods as $food)   
     <div class="bg-dark text-light mycard flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <div class="card-title">
           <h3><em class="grey">{{ $food->name }}</em></h3>
          </div>
          <img src="{{ $food->image }}" class="card-img-top myimg" alt="...">
        </div>
        <div class="flip-card-back">
         <p> {{ $food->ingredients }}</p>
         <p> {{ $food->description }}</p>
         <p> {{ $food->price }}</p>
         <p> {{ $food->visible }}</p>
        </div>
      </div>
      <a href="{{ route('admin.restaurants.edit', $food->id) }}" class="btn btn-secondary">Edit</a>
      <a href="{{ route('admin.restaurants.show', $food->id) }}" class="btn btn-secondary">Show Details</a>
      <form action="{{route('admin.restaurants.destroy', $food->id)}}" onsubmit="" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')
        <input type="submit" value="&#9249;" class="btn btn-outline-danger" id="sure">
      </form>
   </div>
   @endforeach
</div>
@endsection