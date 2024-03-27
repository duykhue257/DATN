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
        $orderNumber = session('order_number');
        $cartItems = Cart::instance('cart')->content();
        $payments = Payment::all();
        // dd($payments);
        return view('client.checkout',compact('cartItems','payments','orderNumber'));
    }
    public function store(Request $request) {
        // dd($request->all());
        $order = $request->only('name', 'phone', 'province', 'district', 'ward', 'detail', 'shipping_by');
        
        // Kiểm tra giá trị của $request->payment và gán giá trị tương ứng cho $order['payment_id']
        $paymentId = $request->payment;
        // dd($paymentId);
        $paymentMethod = Payment::find($paymentId);
        if ($paymentMethod) {
            $order['payment_id'] = $paymentId;
        } else {
            // Xử lý khi không tìm thấy phương thức thanh toán
        }
    
        // Gán giá trị cho $order['status_id'] dựa trên $request->payment
        $order['status_id'] = $paymentId == 1 ? 2 : 3;
    
        // Tạo đơn hàng mới
        $newOrder = new Order($order);
        $newOrder->save();
    
        // Tạo các chi tiết đơn hàng
        if ($request->detail_order) {
            foreach ($request->detail_order as $detail) {
                $detail['order_id'] = $newOrder->id;
                OrderDetail::create($detail);
            }
        }
    }
    
    
}

