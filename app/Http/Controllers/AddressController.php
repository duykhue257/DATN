<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\DataTables\OrderHistoryDataTable;
use App\Models\ProductVariants;

class AddressController extends Controller
{
    //
    public function OrderHistory(OrderHistoryDataTable $dataTable)
    {
        $user_id = Auth::id();
        // dd($user_id);   
        $orders = Order::with('detail_order', 'status', 'payment')->where('user_id', $user_id)->get();
       
        /* return view('client.account.order_history', compact('orders')); */
        return $dataTable->render('client.account.order_history', compact('orders'));
    }
    public function orderDetailHome(string $id)
    {
        $orders = Order::with('detail_order', 'status', 'payment')->findOrFail($id);
        // dd($orders);
        return view('client.account.detail_order_account', compact('orders'));
    }

    
    public function cancelOrder($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return redirect()->back()->with('message', 'Đơn hàng không tồn tại.');
        }
        if($order->status_id > 4){
            return redirect()->back()->with('error', "đơn hàng".$order->status->status);
        }

        $order->status_id = '7';
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
        return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công.');
    }

    public function showAccount()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);

        return view('client.account.info_account', compact('user'));
    }

    public function updateProfile(Request $request, User $user){
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
       
       
        $user->save();
        return redirect()->route('account')->with('success', 'Profile updated successfully.');
    
    }

  
}
