<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        $payments = Payment::all();
        return view('client.checkout',compact('cartItems','payments'));
    }
    public function store(Request $request){
     
        // dd($request->all());
        $order = $request->only('name','phone','province','district','ward','detail','shipping_by');
        $order['status_id'] = $request->payment == 1 ? 2 : 1 ;
        $order['payment_id'] = $request->payment ;
        // dd($order);
        $newOrder = Order::create($order);
        if($request->detail_order){
            // dd($request->detail_order);
            foreach($request->detail_order as $detail){
                $detail['order_id'] = $newOrder->id;
                // dd($detail);
                OrderDetail::create($detail);
            }
        }
        
    }
}

