@extends('layouts.app')

@section('content')
<div class="container-sm text-black rounded p-5">

    <div class="card myShowBg myM" style="max-width: 1040px;">
        <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center">
                @if ($food->image)
                @if (filter_var($food->image, FILTER_VALIDATE_URL))
                <img src="{{ $food->image }}" class="w-100" alt="">
                @else
                <img src="{{ asset('storage/' . $food->image) }}" class="w-100" alt="">
                @endif
                @else
                <p>No image available</p>
                @endif
            </div>
            <div class="col-md-8 text-light">
                <div class="card-body">
                    <h5 class="card-title">{{ $food->name }}</h5>
                    <p class="card-text">{{ $food->description }}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-light myShowBg"><strong>Ingredienti:</strong>
                            {{ $food->ingredients }}</li>
                        <li class="list-group-item text-light myShowBg"><strong>Prezzo: </strong>{{ $food->price }}
                            &euro;</li>
                        <li class="list-group-item text-light myShowBg"><strong>Visibile:</strong>
                            @if ($food->visible = 1)
                            Si
                            @else
                            No
                            @endif
                        </li>
                    </ul>
                    <div class="card-body">

                        <a href="{{ route('admin.foods.index') }}" class="btn btn-outline-secondary text-light">I Tuoi
                            Piatti</a>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary text-light">Home</a>

                    </div>
                    {{-- <p class="card-text"><small class="text-muted">Last updated 'vorrei tamestamp last mod' mins
                            ago</small></p> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection