<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Braintree\Gateway;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
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
                'success' => true,
                'message' => 'Transaction successful'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'Transaction failed'
            ];
            return response()->json($data, 401);
        }
    }

    public function createOrder(Request $request)
    {
        try {
            $order = new Order();
            $order->message = $request->input('message');
            $order->payment_status = true; // Assuming payment is successful
            $order->order_date = now(); // Set the order date to the current date and time
            $order->total_price = $request->input('totalPrice');
            $order->name_surname = $request->input('nameSurname');
            $order->address = $request->input('address');
            $order->phone_number = $request->input('phoneNumber');
            $order->email = $request->input('email');
            // Add other fields as needed
            $order->save();
            Log::info('Order created successfully');

            $data = [
                'success' => true,
                'message' => 'Order created successfully'
            ];

            return response()->json($data, 200);
        } catch (\Exception $e) {
            Log::error('Error creating order: ' . $e->getMessage());

            $data = [
                'success' => false,
                'message' => 'Internal Server Error'
            ];

            return response()->json($data, 500);
        }
    }
}
