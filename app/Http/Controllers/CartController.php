<?php

namespace App\Http\Controllers;

use App\Models\ProductVariants;
use App\Models\Products;

use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Cart;
// use Hardevine\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function index(Request $request)
    {
        // Lấy mã giảm giá từ session nếu có
        $discountCode = $request->session()->get('discount_code');
        $currentDateTime = Carbon::now();
        $discount = Voucher::where('start_at', '<=', $currentDateTime)
            ->where('end_at', '>=', $currentDateTime)
            ->get();
        // dd($discount);
        $cartItems = Cart::instance('cart')->content();
        $cartItemIds = $cartItems->pluck('id');
        // dd($cartItemIds);
        // dd(Cart::instance('cart')->total());
        $subtotal = Cart::instance('cart')->subtotal();
        $subtotal = str_replace(',', '', $subtotal);
        $subtotal = floatval($subtotal);
        // dd($cartItems['id']);
        $orderNumber = session('order_number');
        // dd($orderNumber);
        $productVariant = null;
        foreach ($cartItems as $item) {
            // $sum += $item->price;
            $productVariant = ProductVariants::with('sizes', 'colors')->find($item->id);
            $item->variant_id = $productVariant->id;
            // dd($productVariant->quantity);
            $productVariant->load('product');
            // Gán thông tin sản phẩm vào mỗi item trong giỏ hàng
            $item->is_checked = true;
            $item->product_image = $productVariant->image;
            $item->name = $productVariant->product->name;
            $item->price = $productVariant->product->price_reduced;
            $item->size = $productVariant->sizes->size;
            $item->color = $productVariant->colors->color;
            $item->quantity = (int)$item->qty;
        }
        return view('client.cart', compact('cartItems', 'orderNumber', 'productVariant', 'discount', 'cartItemIds'));
    }

    public function addToCart(Request $request)
    {

        $productId = $request->id;
        $variantId = $request->variant_id;
        //  dd($request->id);
        // Tìm sản phẩm chính và biến thể tương ứng
        $product = Products::find($productId);
        $productVariant = ProductVariants::find($variantId);

        // Kiểm tra xem sản phẩm và biến thể có tồn tại hay không
        if (!$product || !$productVariant) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        // Tạo mã đơn hàng
        $orderNumber = uniqid();

        $cartItem = Cart::instance('cart')->add(
            $variantId,
            $productVariant->image,
            $request->quantity,
            $product->price
        )->associate('App\Models\ProductVariants');

        // Lưu order_number vào session
        session(['order_number' => $orderNumber]);

        // Lấy mảng giỏ hàng ra khỏi session
        $cartContent = session('cart');
        // Thêm order_number vào mục giỏ hàng mới thêm vào
        $cartContent[$cartItem->rowId]['order_number'] = $orderNumber;
        // Đặt lại giỏ hàng vào session
        session(['cart' => $cartContent]);
        // dd($orderNumber);
        return redirect()->back()->with('message', 'Sản phẩm đã được thêm vào giỏ hàng');
    }

    public function updateCart(Request $request)
    {
        // $newTotalSum = $request->input('newTotalSum');
        $rowId = $request->input('rowId');
        $quantity = $request->input('quantity');
        // $numProducts = $request->input('numProducts');
        // $all = $request->all();
        // $discountAmount = $request->session()->get('discountAmount', 0);

        $cartItem = Cart::instance('cart')->get($rowId);

        if ($cartItem) {
            $cartItem->quantity = $quantity;
            Cart::instance('cart')->update($rowId, $quantity);

            // Tính toán giá mới
            $newsubtotal = $cartItem->price * $quantity;
            
            // $newPrice = $newsubtotal * $numProducts;
            // $request->session()->put('newTotal', $newPrice);
            return response()->json(['success' => true, 'newSubTotal' => $newsubtotal ]);
        }

        return response()->json(['success' => false]);
    }


    public function removeItem(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart.show');
    }
    public function clearCart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->route('cart.show');
    }

    public function applyDiscount(Request $request)
    {
        // Lấy mã giảm giá từ yêu cầu
        $discountCode = $request->discount_code;

        // Kiểm tra xem mã giảm giá có tồn tại trong cơ sở dữ liệu không
        $voucher = Voucher::where('code', $discountCode)
            ->where('start_at', '<=', now())
            ->where('end_at', '>=', now())
            ->where('quantity', '>', 0)
            ->first();

        if ($voucher) {
            // Chuyển đổi trường percent thành số
            $percent = (int) $voucher->percent;
            $subtotal = Cart::instance('cart')->subtotal();
            $subtotal = str_replace(',', '', $subtotal); // Loại bỏ dấu phẩy
            $subtotal = floatval($subtotal); // Chuyển đổi thành số
            // Tính toán giảm giá theo phần trăm hoặc số tiền cố định
            $discountAmount = intval(($percent / 100) * $subtotal);

            // Lưu thông tin giảm giá vào session
            // $request->session()->put('discountAmount', $discountAmount);
            $request->session()->put('discount_code', $discountCode);
            // Tính toán và lưu total mới vào session
            // $totalAfterDiscount = $subtotal - $discountAmount;
            // $request->session()->put('newTotal', $totalAfterDiscount);

            return response()->json([
                'success' => true,
                'percent' => $percent,
                'discountAmount' => $discountAmount,
                'message' => 'Áp dụng mã giảm giá thành công.'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Mã giảm giá không hợp lệ hoặc đã hết hạn.'
            ], 422);
        }
    }


    public function cancelDiscount(Request $request)
    {

        if ($request->session()->has('discount_code')) {
            // Xóa session 'discountAmount' và 'discount_code'
            $request->session()->forget(['discount_code']);

            // Lấy tổng tạm tính ban đầu từ giỏ hàng
            $subtotal = str_replace(',', '', Cart::instance('cart')->subtotal());

            // Tính toán và lưu total mới vào session
            // $request->session()->put('newTotal', $subtotal);

            return response()->json([
                'success' => true,
                'message' => 'Đã hủy mã giảm giá thành công.'
            ]);
        } else {
            // Nếu không tồn tại session 'discountAmount', không cần thực hiện gì cả
            return response()->json([
                'success' => false,
                'message' => 'Không có mã giảm giá để hủy.'
            ], 422);
        }
    }
}
