<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function Payment(Request $request)
    {
        $orderData = $request->only('name', 'phone', 'province', 'district', 'ward', 'detail', 'shipping_by', 'total', 'code');
        $total = is_numeric(str_replace(',', '', $orderData['total'])) ? (int) str_replace(',', '', $orderData['total']) * 100 : 0;
        
        $order = [
            'name' => $orderData['name'],
            'phone' => $orderData['phone'],
            'province' => $orderData['province'],
            'district' => $orderData['district'],
            'ward' => $orderData['ward'],
            'detail' => $orderData['detail'],
            'shipping_by' => $orderData['shipping_by'],
            'total' => $total,
            'code' => $orderData['code']
        ];
        
        // Lấy giá trị payment_id từ request và kiểm tra tồn tại
        $paymentId = $request->payment;
        $paymentMethod = Payment::find($paymentId);
        if ($paymentMethod) {
            $order['payment_id'] = $paymentId;
        } else {
            // Xử lý khi không tìm thấy phương thức thanh toán
        }
        
        // Tạo một đối tượng Order và gán giá trị status_id
        $orderObject = new Order();
        $orderObject->status_id = ($paymentId == 1) ? 2 : 3;
        
        // Lưu thông tin đơn hàng vào session
        $request->session()->put('order', $order);

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('vnpay.return');
        $vnp_TmnCode = "TVB87HF4"; //Mã website tại VNPAY 
        $vnp_HashSecret = "SRGQHBUYYDMODMSKOHLDLBNIROJNENQL"; //Chuỗi bí mật

        $vnp_TxnRef = $orderData['code']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán online";
        $vnp_OrderType = "oke";
        $vnp_Amount = $total;
        $vnp_Locale = 'VN';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];


        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        // }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect()->away($vnp_Url);
        // $returnData = array(
        //     'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        // );
        // if (isset($_POST['redirect'])) {
        //     header('Location: ' . $vnp_Url);
        //     die();
        // } else {
        //     echo json_encode($returnData);
        // }
        

    }
    public function vnpayReturn(Request $request)
    {
        // Kiểm tra xem kết quả trả về từ VNPay có hợp lệ không
        if ($request->has('vnp_ResponseCode') && $request->vnp_ResponseCode == '00') {
            // Lấy thông tin đơn hàng từ session
            $order = session()->get('order');
            
            // Tạo đơn hàng trong cơ sở dữ liệu
            $newOrder = new Order();
            $newOrder->name = $order['name'];
            $newOrder->phone = $order['phone'];
            $newOrder->province = $order['province'];
            $newOrder->district = $order['district'];
            $newOrder->ward = $order['ward'];
            $newOrder->detail = $order['detail'];
            $newOrder->shipping_by = $order['shipping_by'];
            // $newOrder->total = $order['total'];
            // $newOrder->code = $order['code'];
    
            // Lấy phương thức thanh toán từ session
            if (isset($order['payment_id'])) {
                $newOrder->payment_id = $order['payment_id'];
            } else {
                // Xử lý khi không tìm thấy phương thức thanh toán trong session
            }
    
            // Thiết lập trạng thái của đơn hàng dựa trên phương thức thanh toán
            $newOrder->status_id = ($newOrder->payment_id == 1) ? 2 : 3;
            $newOrder->save();
    
            // Tạo các chi tiết đơn hàng
            if ($request->detail_order) {
                foreach ($request->detail_order as $detail) {
                    $detail['order_id'] = $newOrder->id;
                    OrderDetail::create($detail);
                }
            }
    
            // Xóa thông tin đơn hàng khỏi session sau khi đã lưu vào cơ sở dữ liệu
            session()->forget('order');
            return redirect()->route('homePage');
            // Tiếp tục xử lý các công việc khác sau khi tạo đơn hàng thành công
        }
    }
    
    
}
