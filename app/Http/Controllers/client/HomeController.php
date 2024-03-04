<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductVariants;

class HomeController extends Controller
{
    //
    public function home(){
          $products = Products::all();
          return view('client.homepage', compact('products'));
    }
    public function shop(){
        $products = Products::with('variants')->get();
        return view('client.shop', compact('products'));
    }
    public function ProductDetail(Request $request) {
        $productId = $request->input('id');
        $product = Products::with('variants','colors','sizes')->find($productId);
        
        // Lấy danh sách sản phẩm có cùng category_id
        $categoryProducts = Products::where('category_id', $product->category_id)->with('variants')->get();
        // dd($categoryProducts);
        
        // Tạo mảng chứa các số từ 1 đến 4
        $numbers = range(1, 4);
        
        return view('client.detail_product', compact('product', 'categoryProducts', 'numbers'));
    }
    
    
    
}
