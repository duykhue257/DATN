<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductVariants;
use App\Models\Category;
// use App\Models\Color;
// use App\Models\Size;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Products::join('categories', 'products.category_id', '=', 'categories.id')
        ->select('products.*', 'categories.name_cate','products.id as id')
        ->latest()
        ->get();
        // $products = Products::latest()->get();
        return view('admin.product.list_prd', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $product = Products::all();

        // dd($product);
        return view('admin.product.add_prd', compact('categories', 'product'));
    }

    public function store(Request $request, Products $product)
    {

        $product->name = $request->name;
        $product->price = $request->price;
        $product->price_reduced = $request->price_reduced;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('product.index');
    }

    public function show(int $id){
        // Truy vấn biến thể sản phẩm theo ID sản phẩm
        $products = ProductVariants::with('product', 'sizes', 'colors')
                                    ->where('product_id', $id) // Lọc theo ID sản phẩm
                                    ->latest()
                                    ->get();
                                    $productId = $id;
                                    // dd($productId);
        return view('admin.product.list_variant', compact('products','productId'));
    }
    

    public function edit(int $id)
    {
        $categories = Category::all();
        $product = Products::with('category')->find($id);
        return view('admin.product.edit_prd', compact('product','categories'));
    }

    public function update(Request $request, Products $product)
    {
        // dd($request->all());
        $product->name = $request->name;
        $product->price = $request->price;
        $product->price_reduced = $request->price_reduced;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect()->route('product.index');
    }
    public function destroy(Products $product)
    {
        $product->delete();
        return back();
    }
}
