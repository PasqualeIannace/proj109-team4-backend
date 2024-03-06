<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Food;
use Braintree\Gateway;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'succes' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {
        $food = Food::find($request->food);

        $result = $gateway->transaction()->sale([
            'amount' => $food->price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $data = [
                'succes' => true,
                'message' => 'Transazione eseguita con successo'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'succes' => false,
                'message' => 'Transazione fallita!!'
            ];
            return response()->json($data, 401);
        }
        return 'make payment';
    }
}
