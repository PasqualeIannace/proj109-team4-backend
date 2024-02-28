@extends('layouts.admin')

@section('content')

<div class="container">
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h2>ATTENZIONE! DATI A CAZZO DI CANE - È RICHIESTO UN FIX</h2>
    <h1>Elenco degli ordini</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data Ordine</th>
                <th>Quantità</th>
                <!-- Aggiungi altre colonne secondo necessità -->
            </tr>
        </thead>
        <tbody>

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
            </tr>
        </tbody>
    </table>
</div>

@endsection