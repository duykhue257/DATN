<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Payment;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // Lấy total mới từ session nếu có
        $newTotal = $request->session()->get('newTotal');
        $discountAmount = $request->session()->get('discountAmount');
        // $request->session()->get('discountAmount');

        if (!$newTotal) {
            $total = Cart::instance('cart')->total();
            $total = str_replace(',', '', $total); // Loại bỏ dấu phẩy
            $total = floatval($total); // Chuyển đổi thành số
            $checkoutTotal =  $total;
            // Lưu thông tin giảm giá vào session
            $request->session()->put('oldTotal', $checkoutTotal);
            // dd(session('oldTotal'));
        } else {
            $checkoutTotal = $newTotal;
            // dd($checkoutTotal);
        }

        if (!$discountAmount) {
            $discountAmount = 0;
        } else {
            // Nếu có giá trị 'discountAmount' trong session, sử dụng giá trị đó
        }

        $orderNumber = session('order_number');
        $cartItems = Cart::instance('cart')->content();
        $payments = Payment::all();

        return view('client.checkout', compact('cartItems', 'payments', 'orderNumber', 'checkoutTotal','discountAmount'));
    }

    public function store(CheckoutRequest  $request)
    {
        // dd($request->all());
        $total = intval($request->total);
        $order = $request->only('user_id', 'order_code', 'name', 'phone', 'province', 'district', 'ward', 'detail', 'shipping_by', 'note', 'address');
        $paymentId = $request->payment;
        // check phone
        // $phoneIsValid = $this->checkPhoneNumber($order['phone']);
        // if (!$phoneIsValid) {
        //     return response()->json(['error' => 'Số điện thoại không hợp lệ.'], 400);
        // }

        $paymentMethod = Payment::find($paymentId);
        if ($paymentMethod) {
            $order['payment_id'] = $paymentId;
        } else {
        }
        $order['total'] = $total;
        // Xác định status_id dựa trên payment_id
        $order['status_id'] = $paymentId == 1 ? 2 : 3;

        // Tạo đơn hàng mới và lưu vào cơ sở dữ liệu
        $newOrder = Order::create($order);
        // dd($newOrder);
        // Tạo các chi tiết đơn hàng
        if ($request->detail_order) {
            foreach ($request->detail_order as $detail) {
                $detail['order_id'] = $newOrder->id;
                OrderDetail::create($detail);
            }
        }



        // Xóa session order sau khi tạo đơn hàng thành công
        session()->forget('order');

        // Chuyển hướng đến trang cảm ơn
        return redirect()->route('thanks');
    }
    // private function checkPhoneNumber($phoneNumber)
    // {
    //     // Biểu thức chính quy để kiểm tra số điện thoại di động của Việt Nam
    //     $regexPattern = '/^((\+84)|0)?(3[0-9]\d{8}|9[0-8]\d{8}|81\d{8}|82\d{8}|83\d{8}|84\d{8}|85\d{8}|86\d{8}|87\d{8}|88\d{8}|89\d{8}|70\d{8}|76\d{8}|77\d{8}|78\d{8}|79\d{8}|99\d{8}|96\d{8}|97\d{8}|98\d{8})$/';
    
    //     // Kiểm tra xem số điện thoại khớp với biểu thức chính quy hay không
    //     return preg_match($regexPattern, $phoneNumber);
    // }
    
}
