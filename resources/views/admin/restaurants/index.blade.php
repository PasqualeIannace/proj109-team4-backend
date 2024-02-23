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
          <img src="{{ $food->image }}" class="card-img-top" alt="...">
        </div>
        <div class="flip-card-back">
         <p> {{ $food->ingredients }}</p>
         <p> {{ $food->description }}</p>
         <p> {{ $food->price }}</p>
         <p> {{ $food->visible }}</p>
        </div>
      </div>
   </div>
   @endforeach
</div>
@endsection