<?php

namespace App\Http\Controllers;

use App\DataTables\ProductVariansDataTable;
use App\Models\Products;
use App\Models\ProductVariants;
use App\Models\Category;
// use App\Models\Color;
// use App\Models\Size;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\DataTables\ProductsDataTable;

class ProductsController extends Controller
{

    public function index(ProductsDataTable $dataTable)
    {


        $products = Products::withTrashed()
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name_cate', 'products.id as id')
            ->latest()
            ->get();

        return $dataTable->render('admin.product.list_prd', compact('products'));
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

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'price_reduced' => 'required|numeric|min:0',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);


        $product->name = $request->name;
        $product->price = $request->price;
        $product->price_reduced = $request->price_reduced;
        $product->description = $request->description;
        $product->category_id = $request->category_id;


        $product->save();


        return redirect()->route('product.index');
    }



    public function show(int $id, ProductVariansDataTable $dataTable)
    {


        $products = ProductVariants::withTrashed()
            ->with('product', 'sizes', 'colors')
            ->where('product_id', $id) // Lọc theo ID sản phẩm
            ->latest()
            ->get();

        $productId = $id;
        // dd($products);
        /* return view('admin.product.list_variant', compact('products','productId')); */
        return $dataTable->with('id', $productId)->render('admin.product.list_variant', compact('products', 'productId'));
    }


    public function edit(int $id)
    {
        $categories = Category::all();
        $product = Products::with('category')->find($id);
        return view('admin.product.edit_prd', compact('product', 'categories'));
    }

    public function update(Request $request, Products $product)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'price_reduced' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        
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
        return redirect()->back()->with('success', 'Sản phẩm đã được khôi phục thành công.');
        // return back();
    }
    public function restore($id)
    {
        $product = Products::withTrashed()->findOrFail(50);
        $product->restore();

        return redirect()->back()->with('success', 'Sản phẩm đã được khôi phục thành công.');
    }
}
