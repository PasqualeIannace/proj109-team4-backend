@extends('layouts.app')

@section('content')
<div class="container bg-white text-black rounded p-5">
    <div class="row">
        <h2>{{ $food->name }}</h2>
    </div>
    <div class="row">
        <h2>{{ $food->ingredients }}</h2>
    </div>
    <div class="row">
        <p>{{ $food->description }}</p>
    </div>
</div>
@endsection