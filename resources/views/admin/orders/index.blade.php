@extends('layouts.admin')

@section('content')
{{-- <div class="container-sm text-black rounded p-5">

    <h2 class="text-center">I Miei Ordini</h2>

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
</div> --}}
<!-- admin/orders/index.blade.php -->

<div class="container">
    <h1 class="mb-5 text-center">Elenco degli ordini</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data Ordine</th>
                <th>Quantità</th>
                <th>Dettaglio</th>
                <!-- Aggiungi altre colonne secondo necessità -->
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_date }}</td> <!-- Assumo che 'order_date' sia un campo della tua tabella Order -->
                <td>
                    <ul>
                        @foreach ($order->foods as $food)
                        <li>{{ $food->name }} - Quantità: {{ $food->pivot->quantity }}</li>
                        @endforeach
                    </ul>
                </td>
                <!-- Aggiungi altre colonne secondo necessità -->
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-secondary">Show Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection