<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::with('detail_order', 'status')->get();
        $status = OrderStatus::all();
        // dd($orders);
        return view('admin.order.index', compact('orders', 'status'));
    }
    public function updateStatusOrder(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'status_id' => 'required|exists:order_status,id',
        ]);
    
        $order->status_id = $validatedData['status_id'];
        $order->save();
    
        return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công');
    }
    public function orderDetail(string $id)
    {
        $order = Order::with('detail_order', 'status','payment')->find($id);
    
        return view('admin.order.order_detail', compact('order'));
    }
    
}
