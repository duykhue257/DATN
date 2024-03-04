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

    // public function show(Products $product){
    //     $categories = Category::all();
    //     return view('client.templates.home.detailPrd',compact('product','categories'));
    // }

    public function edit(String $id)
    {
        $product = Products::with('products')->find($id);
        $products = Products::all(); // Sử dụng Product thay vì Products
        return view('admin.product.edit', compact('product', 'products'));
    }

    public function update(Request $request, Products $product)
    {
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
