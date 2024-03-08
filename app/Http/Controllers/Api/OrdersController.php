<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Food;
use App\Models\Order;
use App\Models\FoodOrder;
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

            Log::info('Order created successfully with ID: ' . $order->id);

            $data = [
                'success' => true,
                'message' => 'Order created successfully',
                'orderId' => $order->id,
            ];

            return response()->json($data, 200);
        } catch (\Exception $e) {
            Log::error('Error creating order: ' . $e->getMessage());
            Log::error('Exception Stack Trace: ' . $e->getTraceAsString());

            $data = [
                'success' => false,
                'message' => 'Internal Server Error'
            ];

            return response()->json($data, 500);
        }
    }

    public function addFoodOrder(Request $request)
    {
        try {
            // Log the request data for debugging
            Log::info('Food Order Request Data: ' . json_encode($request->all()));

            // Retrieve order details from the request
            $orderId = $request->input('orderId');
            $foodId = $request->input('foodId');
            $quantity = $request->input('quantity');

            // Log the retrieved data for debugging

            Log::info('Order ID: ' . $orderId);
            Log::info('Food ID: ' . $foodId);
            Log::info('Quantity: ' . $quantity);

            // Insert record into food_order table
            $foodOrder = new FoodOrder();
            $foodOrder->order_id = $orderId;
            $foodOrder->food_id = $foodId;
            $foodOrder->quantity = $quantity;
            $foodOrder->save();

            Log::info('Food Order Created: ' . json_encode($foodOrder->toArray()));

            $data = [
                'success' => true,
                'message' => 'Food order added successfully'
            ];

            return response()->json($data, 200);
        } catch (\Exception $e) {
            Log::error('Error adding food order: ' . $e->getMessage());

            $data = [
                'success' => false,
                'message' => 'Internal Server Error'
            ];

            return response()->json($data, 500);
        }
    }
}
