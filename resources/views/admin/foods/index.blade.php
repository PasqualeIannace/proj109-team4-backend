@extends('layouts.admin')

@section('content')
    <div class="container-sm d-flex flex-wrap p-5">
        @foreach ($foods as $food)
            <div class="bg-dark bg-opacity-50 text-light flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front d-flex flex-column justify-content-center align-items-center">
                        <div class="card-title">
                            <h3><em class="grey">{{ $food->name }}</em></h3>
                        </div>
                        <div class="myImg">
                            <img src="{{ $food->image }}" class="w-100" alt="...">
                        </div>
                    </div>
                    <div class="flip-card-back d-flex flex-column justify-content-center align-items-center">
                        <p> {{ $food->ingredients }}</p>
                        <p> {{ $food->description }}</p>
                        <p> {{ $food->price }}</p>
                        {{-- <p> {{ $food->visible }}</p> --}}
                    </div>
                </div>
                <a href="{{ route('admin.foods.edit', $food->id) }}" class="btn btn-secondary">Edit</a>
                <a href="{{ route('admin.foods.show', $food->id) }}" class="btn btn-secondary">Show Details</a>
                <form action="{{ route('admin.foods.destroy', $food->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="&#9249;" class="btn btn-outline-danger" id="sure">
                </form>
            </div>
        @endforeach
    </div>
@endsection
