<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\DataTables\OrderDataTable;
use App\Models\ProductVariants;

class OrderController extends Controller
{
    //
    // public function index()
    // {
    //     $orders = Order::with('detail_order', 'status')->get();
    //     $status = OrderStatus::all();
    //     // dd($orders);
    //     return view('admin.order.index', compact('orders', 'status'));
    // }
    public function index(OrderDataTable $dataTable)
    {
        $orders = Order::with('detail_order', 'status')->get();
        $status = OrderStatus::all();
        session(['status_data' => $status]);
        // dd($orders);
        /* return view('admin.order.index', compact('orders', 'status')); */
        return $dataTable->render('admin.order.index', compact('orders', 'status'));
    }
    public function updateStatusOrder(Request $request, Order $order)
    {  
        // dd($order->detail_order);
        $validatedData = $request->validate([
            'status_id' => 'required|exists:order_status,id',

        ]);
        // dd($order->status_id,(int)$validatedData['status_id']);
        if ($order->status_id > (int)$validatedData['status_id']) {
            return redirect()->back()->with('error', "Cập nhật trạng thái đơn hàng thất bại, đơn hàng hiện ".$order->status->status);
        }
        $order->status_id = $validatedData['status_id'];
        $order->save();
        if($order->detail_order){
            foreach($order->detail_order as $detail){
                $variant = ProductVariants::find($detail['product_variant_id']);
                if($variant){
                    $variant->quantity = $variant->quantity + $detail['quantity'];
                    $variant->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Cập nhật trạng thái đơn hàng thành công');
    }
    public function orderDetail(string $id)
    {
        $order = Order::with('detail_order', 'status', 'payment')->find($id);

        return view('admin.order.order_detail', compact('order'));
    }
}
