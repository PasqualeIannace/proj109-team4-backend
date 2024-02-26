@extends('layouts.admin')

@section('content')
<div class="container-sm m-4 text-black">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row justify-content-center">
        <h2 class="text-center m-4">{{ $user->activity_name }}</h2>
        {{-- {{ddd($user->activity_name);}} --}}
    </div>
    <div class="d-flex justify-content-around">
        <div class="plateLf mybg">
            <p class="text-center fs-4">Il Tuo Menù</p>
            <ol class="overflow-y-scroll h-75">
                @foreach($foods as $food)
                <li class="d-flex p-3">
                    <div class="small_img">
                        <div class="img-container">
                            <img src="{{$food->image}}" class="cerchio">
                            <a href="{{ route('admin.foods.edit', $food->id) }}"
                                class="btn btn-secondary edit-btn">Edit</a>
                        </div>
                    </div>

                    <div class="d-flex align-items-center p-3">
                        <b class="text-center">{{$food->name}}</b>
                    </div>
                </li>
                @endforeach
            </ol>
        </div>
        <div class="statistic mt-6">
            <p class="text-center fs-4">Le tue Statistiche</p>
            <img src="https://s.tmimgcdn.com/scr/1200x750/137800/elementi-di-infografica-statistica-economica-del-grafico_137852-original.jpg"
                class="w-100">
        </div>
    </div>

</div>
@endsection