<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Products::join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name_cate', 'products.id as id_prd')
            ->get();
        // dd($products->id_prd);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $product = Products::all();
        // dd($product);
        return view('admin.product.add', compact('categories','product'));
    }

    public function store(Request $request, Products $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        // dd($request->categori_id);
        $imagePath = $request->file('image')->store('imgProduct', 'public');
        $product->image = $imagePath;
        $product->save();

        return redirect()->route('product.index');
    }

    public function edit(Products $product)
    {
        $product = Products::join('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.id', '=', $product->id)
            ->select('products.*', 'products.id as id_prd', 'categories.name_cate')
            ->first();
    
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }


    public function update(Request $request, Products $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;
        if ($request->hasFile(('image'))) {
            Storage::disk('public')->delete($product->image);
            $imgPath = $request->file('image')->store('imgProduct', 'public');
            $product->image = $imgPath;
        }
        $product->save();
        return redirect()->route('product.index');
    }
    public function destroy(Products $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return back();
    }
}
