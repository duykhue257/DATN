<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::with('category')->get();
        $categories = Category::with('products')->get();
        
        return view('product.index', compact('products', 'categories'));
    }
//     public function index()
// {
   
//     $products = Products::select('products.id', 'products.name', 'products.price','products.id_cate', 'categories.name_cate as catename')
//         ->Join('categories', 'products.id_cate', '=', 'categories.id')
//         ->get();

//     return view('Product.index', compact('products'));
// }
}
