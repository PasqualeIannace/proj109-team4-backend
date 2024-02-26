@extends('layouts.admin')

@section('content')
<div class="container-sm text-black rounded p-5">

    <h2 class="text-center">I Miei Ordini</h2>

    {{-- <ul>
        @foreach ($orders as $order)
        <li>
            <p>{{$order->message}}</p>
            <p>{{$order->total_price}}</p>
        </li>
        @endforeach
    </ul> --}}

    <ol class="list-group list-group-numbered">
        @foreach ($orders as $order)
        <li class="list-group-item d-flex justify-content-between align-items-start m-4">
            <div class="ms-2 me-auto">
                <div class="fw-bold">{{$order->message}}</div>
                {{$order->total_price}}
            </div>
            <span class="badge text-bg-primary rounded-pill">1</span>
        </li>
        @endforeach
    </ol>
</div>

@endsection