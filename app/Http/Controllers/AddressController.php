<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    //
    public function OrderHistory()
    {
        $user_id = Auth::id();
        // dd($user_id);   
        $orders = Order::with('detail_order', 'status', 'payment')->where('user_id', $user_id)->get();
       
        return view('client.account.order_history', compact('orders'));
    }
    public function orderDetailHome(string $id)
    {
        $orders = Order::with('detail_order', 'status', 'payment')->findOrFail($id);
        // dd($orders);
        return view('client.account.detail_order_account', compact('orders'));
    }

    public function showAccount()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        // dd($user);
        return view('client.account.info_account', compact('user'));
    }
    public function cancelOrder($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Đơn hàng không tồn tại.'], 404);
        }

        $order->status_id = '7';
        $order->save();

        return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công.');
    }
}
