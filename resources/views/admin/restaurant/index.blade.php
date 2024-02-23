@extends('layouts.admin')

@section('content')
 <div class="container-sm d-flex flex-wrap p-5">
    @foreach($foods->id as $food)   
     <div class="bg-dark text-light mycard">
       <div class="card-title">
        <h3><em class="grey">{{ $eventIt->name }}</em></h3>
        <h2><em class="grey">{{ $eventIt->artist }}</em></h2>
        <h5><em class="grey">{{ $eventIt->date }}</em></h5>
      </div>
       <img src="{{ $eventIt->poster }}" class="card-img-top" alt="...">
       <div class="card-body">
         <p> {{ $eventIt->location }}</p>
         <p> {{ $eventIt->city }}</p>
         <p> {{ $eventIt->address }}</p>

         @foreach($eventIt->tags as $tag)
         
          <p> {{$tag->name}} </p>
         
         @endforeach
         
         <div class="d-flex justify-content-between">
          <div>
            <p> {{ $eventIt->price }}</p>
          </div>
          <div>
            <p> {{ $eventIt->tickets }}</p>
          </div>
         </div>
         {{-- <p> {{ $eventIt->type ? $eventIt->type->name : 'no category' }}</p>
         {{-- <p>{{ $eventIt->technology->name }}</p> --}}
         {{-- @foreach($eventIt->technologies as $tech)
           <p>{{$tech->name}}</p>
         @endforeach --}}
        <a href="{{ route('admin.events.edit', $eventIt->id) }}" class="btn btn-outline-secondary">Edit</a>
        <a href="{{ route('admin.events.show', $eventIt->id) }}" class="btn btn-outline-secondary">Show Details</a>
        <form action="{{route('admin.events.destroy', $eventIt->id)}}" onsubmit="" method="POST" class="d-inline-block">
          @csrf
          @method('DELETE')
          <input type="submit" value="&#9249;" class="btn btn-outline-danger" id="sure">
        </form>
       </div>
   </div>
   @endforeach
</div>
@endsection