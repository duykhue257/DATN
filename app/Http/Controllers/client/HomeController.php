<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductVariants;
use App\Models\Size;
use Cart;
class HomeController extends Controller
{
    //
    public function home()
{
    $products = Products::with(['category', 'variants'])->get();
    // dd($products->name_cate);
    $categories = Category::all();
    return view('client.homepage', compact('products', 'categories'));
}

    
    
    
    public function shop( Request $request){
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        $product= ProductVariants::find($request->id);
        $products = Products::with('variants')->get();
        // dd($products);
        return view('client.shop', compact('products','colors','sizes','categories'));
    }
    public function ProductDetail(Request $request) {
        $productId = $request->input('id');
        $product = Products::with('variants','colors','sizes')->find($productId);
   
        $categoryProducts = Products::where('category_id', $product->category_id)->with('variants')->get();

        $numbers = range(1, 4);
        
        return view('client.detail_product', compact('product', 'categoryProducts', 'numbers'));
    }

    public function showHome(){
        $categories = Category::all();
        // dd($category);
        return view('client.homepage',compact('categories'));
   
    }
    
    
    
}
