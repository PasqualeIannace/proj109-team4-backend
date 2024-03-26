@extends('layouts.admin')

@section('content')

<div class="container mybg p-5 mt-5 br-2em">
    <header class="d-flex justify-content-between mt-4 mb-4 text-white">
        <img src="/txt-logo.png" alt="" class="txt-logo">
        <h2>Conferma d'ordine</h2>
    </header>

    <table class="table mt-5 mb-5">
        <thead>
            <tr>
                <th scope="col">Destinatario</th>
                <th scope="col">Indirizzo di consegna</th>
                <th scope="col">Contatto telefonico</th>
                <th scope="col">Email</th>
                <th scope="col">Data di consegna</th>
                <th scope="col">Messaggio rilasciato (facoltativo)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->name_surname }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->phone_number }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->message }}</td>
            </tr>
        </tbody>
    </table>

    <div class="text-white">
        <div>Gentile cliente {{ $order->name_surname }},</div>
        <div>la ringraziamo per aver effettuato l'ordine presso il nostro ristorante. Ci auguriamo che il nostro pasto
            sia
            stato apprezzato.</div>
        <div>Saluti dallo staff!</div>
    </div>



    <table class="table mt-5 mb-5">
        <thead>
            <tr>
                <th scope="col">Numero dell'ordine</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Quantità</th>
                <th scope="col">Prezzo al pezzo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    <ul class="noBullet">
                        @foreach ($order->foods as $food)
                        <li>{{ $food->name }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="noBullet">
                        @foreach ($order->foods as $food)
                        <li>{{ $food->pivot->quantity }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="noBullet">
                        @foreach ($order->foods as $food)
                        <li>€ {{ $food->price }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>

    <hr class="text-white">
    <div class="text-white">
        <h3>Prezzo totale da pagare: € {{ $totalOrderPrice }}</h3>
        <div>
            @if ($order->payment_status = 1)
            Il pagamento è avvenuto con successo
            @else
            Il pagamento deve ancora essere effettuato
            @endif
        </div>
    </div>

</div>

@endsection