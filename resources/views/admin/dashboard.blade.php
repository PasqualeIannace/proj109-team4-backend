@extends('layouts.admin')

@section('content')
<div class="container-sm m-4 text-black">
    <div class="row justify-content-center myDiv m-auto">
        <img class="m-4 text-center fs-2" src="{{ $user->logo_activity }}" alt="{{ $user->activity_name }}">
        {{-- {{ddd($user->activity_name);}} --}}
    </div>
    <div class="types">
        {{-- <p><strong>Your Restaurant Types:</strong></p> --}}
        @if (Auth::user()->types->count() > 0)
        <ul>
            @foreach (Auth::user()->types as $type)
            <li>{{ $type->name }}</li>
            @endforeach
        </ul>
        @else
        <p>No restaurant types associated with your account.</p>
        @endif
    </div>
    <div class="d-flex justify-content-around">
        <div class="plateLf mybg">
            <p class="text-center fs-4 pt-3 text-white dash-menu-width">Il Tuo Menù</p>
            <ol class="overflow-y-scroll h-85 mt-3">
                @foreach ($foods as $food)
                <li class="d-flex p-3 menu-item">
                    <a href="{{ route('admin.foods.edit', $food->id) }}" class="btn d-flex text-white">
                        <div class="small_img">
                            <div class="img-container">
                                <img src="{{ $food->image }}" class="cerchio">
                                <div class="edit-btn"><i class="fa-regular fa-pen-to-square fa-2xl"></i></div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center p-3">
                            <b class="text-center">{{ $food->name }}</b>
                        </div>
                    </a>
                </li>
                @endforeach
            </ol>
        </div>
        <div class="statistic mt-6">
            <p class="text-center fs-4">Le tue Statistiche</p>
            <img src="https://s.tmimgcdn.com/scr/1200x750/137800/elementi-di-infografica-statistica-economica-del-grafico_137852-original.jpg"
                class="w-100 d-flex align-items-center">
        </div>
    </div>

</div>
@endsection