<?php

namespace App\Http\Controllers;

use App\Models\ProductVariants;
use App\Models\Products;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index()
    {  
        // $cartItems = Cart::instance('cart')->content();
        // return view('client.cart', ['cartItems'=> $cartItems]);
        $cartItems = Cart::instance('cart')->content();
    foreach ($cartItems as $item) {
        $productVariant = ProductVariants::find($item->id);
        $productVariant->load('product'); // Load thông tin sản phẩm liên quan
        // Gán thông tin sản phẩm vào mỗi item trong giỏ hàng
        $item->product_image = $productVariant->product->image;
        $item->product_name = $productVariant->product->name;
        $item->product_price = $productVariant->product->price;
    }
    return view('client.cart', ['cartItems'=> $cartItems]);
    }

    public function addToCart( Request $request)
    {
        $product = ProductVariants::find($request->id);
        Cart::instance('cart')->add(
            $product->id,
            $product->image,
            $request->quantity,
            $product->product_id,
        )->associate('App\Models\ProductVariants');
        return redirect()->back()->with('message','success');
    }

    //  public function updateCart(Request $request)
    //  {
    // Cart::instance('cart')->update($request->rowId,$request->quantity);
    // return redirect()->route('cart.index');
    //  } 
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

        return redirect()->route('cart.index');
    }

    return response()->json(['success' => false]);
}

   
    public function removeItem(Request $request)
     {
      $rowId = $request->rowId;
      Cart::instance('cart')->remove($rowId);
       return redirect()->route('cart.index');
    }      
public function clearCart()
{
    Cart::instance('cart')->destroy();
    return redirect()->route('cart.index');
}
}
