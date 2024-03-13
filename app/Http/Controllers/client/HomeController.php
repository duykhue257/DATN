<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductVariants;
use Cart;
class HomeController extends Controller
{
    //
    public function home(){
          $products = Products::all();
          return view('client.homepage', compact('products'));
    }
    public function shop( Request $request){
        $product= ProductVariants::find($request->id);
        $products = Products::with('variants')->get();
        return view('client.shop', compact('products'));
    }
    public function ProductDetail(Request $request) {
        $productId = $request->input('id');
        $product = Products::with('variants','colors','sizes')->find($productId);
   
        $categoryProducts = Products::where('category_id', $product->category_id)->with('variants')->get();

        $numbers = range(1, 4);
        
        return view('client.detail_product', compact('product', 'categoryProducts', 'numbers'));
    }
    
    
    
}
