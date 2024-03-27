<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(){
        $orders = Order::with('detail_order', 'status')->get();
    
        return view('admin.order.index', compact('orders'));
    }
}
