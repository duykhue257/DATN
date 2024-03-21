<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(){
        $order = Order::with('detail_order')->get();
        // dd($order);
        return view('admin.order.index',compact('order'));
    }
}
