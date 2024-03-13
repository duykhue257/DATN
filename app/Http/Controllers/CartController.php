<?php

namespace App\Http\Controllers;

use App\Models\ProductVariants;
use App\Models\Products;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Http\Request;
// use Cart;
// use Hardevine\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        $size = Size::all();
        // $sum = 0;
        $color = Color::all();
        foreach ($cartItems as $item) {
            // $sum += $item->price;
            $productVariant = ProductVariants::with('sizes','colors')->find($item->id);
            // dd($productVariant->name);
            $productVariant->load('product'); // Load thông tin sản phẩm liên quan
            // Gán thông tin sản phẩm vào mỗi item trong giỏ hàng
            $item->product_image = $productVariant->image;
            $item->name = $productVariant->product->name;
            $item->price = $productVariant->product->price_reduced;
            $item->size = $productVariant->sizes->size;
            $item->color = $productVariant->colors->color;
        //  dd( $item->product_price);
        
        }
        // dd($sum);
        return view('client.cart', compact('cartItems', 'size', 'color'));

    }

    public function addToCart(Request $request)
    {
        // Lấy id của sản phẩm chính và biến thể từ yêu cầu
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
    
        // Thêm sản phẩm vào giỏ hàng
        Cart::instance('cart')->add(
            $variantId, // id của biến thể
            $productVariant->image, // ảnh của biến thể
            $request->quantity, // số lượng
            $product->price, // giá của sản phẩm
        )->associate('App\Models\ProductVariants'); // Liên kết với model ProductVariants
    
        return redirect()->back()->with('message', 'Sản phẩm đã được thêm vào giỏ hàng');
    }
    
    
    
    


    public function updateCart(Request $request)
    {
        $rowId = $request->input('rowId');
        $quantity = $request->input('quantity');

        $cartItem = Cart::instance('cart')->get($rowId);

        if ($cartItem) {
            $cartItem->quantity = $quantity;
            Cart::instance('cart')->update($rowId, $quantity);

            // Tính toán giá mới
            $newPrice = $cartItem->price * $quantity;

            return redirect()->route('cart.show');
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
}
