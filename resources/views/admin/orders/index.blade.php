@extends('layouts.admin')

@section('content')
<div class="container-sm text-black rounded p-5">

    <h2>I Miei Ordini</h2>
     
    <ul>
        @foreach ($orders as $order)
            <li>
                <p>{{$order->message}}</p>
                <p>{{$order->total_price}}</p>
            </li>
        @endforeach
    </ul>
    
</div>

@endsection