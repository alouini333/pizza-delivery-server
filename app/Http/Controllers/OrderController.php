<?php

namespace App\Http\Controllers;

use Auth;
use JWTAuth;
use App\Http\Requests\Orders\StoreOrder;
use App\Order;
use App\OrderLine;
use App\Product;
use App\Setting;
use App\Utils\Utils;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {   
        try {
            $currentUser = JWTAuth::parseToken()->authenticate();
            $orders = Order::without(['lines'])->where('user_id', $currentUser->id)->get();
            return Utils::returnData($orders);
        } catch (\Exception $e) {  
            return Utils::handleException($e);
        }
    }

    public function show($id)
    {   
        try {
            $currentUser = JWTAuth::parseToken()->authenticate();
            $order = Order::with(['lines'])->findOrFail($id);
            if ($order->user_id !== $currentUser->id) {
                return Utils::returnError('You can only see your own orders', 403);
            }
            return Utils::returnData($order);
        } catch (\Exception $e) {  
            return Utils::handleException($e);
        }
    }

    public function store(StoreOrder $request)
    {
            try {
                $token = JWTAuth::getToken();
                if ($token) {
                    $currentUser = JWTAuth::parseToken()->authenticate();
                    if ($currentUser && $currentUser->address === null) {
                        $currentUser->address = $request->address;
                        $currentUser->save();
                    }
                };
                $deliveryFee = Setting::first()->delivery_fees;

                $filteredRequest = $request->only([
                    'name', 'last_name', 'additional_notes', 'phone', 'address'
                ]);

                $order = new Order;
                $order->fill($filteredRequest);
                $order->delivery_fees = $deliveryFee;
                $order->total = $deliveryFee;
                $order->user_id = isset($currentUser) ? $currentUser->id : null;
                $order->save();
                $order->refresh();
                
                $total = 0;

                foreach($request->items as $item) {
                    $product = Product::find($item['id']);
                    $orderLine = new OrderLine();
                    $orderLine->name = $product->name;
                    $orderLine->unit_price = $product->price;
                    $orderLine->quantity = $item['quantity'];
                    $orderLine->total_price = $orderLine->unit_price * $orderLine->quantity;
                    $orderLine->product_id = $product->id;
                    $orderLine->order_id = $order->id;
                    $orderLine->save();
                    $total = $total + $orderLine->total_price;
                }
                $order->sub_total = $total;
                $order->total = $order->sub_total + $deliveryFee;
                $order->save();
                return Utils::returnSuccess('Your order has been registered with success');
            } catch (\Exception $e) {
                return Utils::handleException($e);
            }
    }
}
