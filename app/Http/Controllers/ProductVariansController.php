<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\ProductVariants;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductVariansController extends Controller
{

    public function index()
    {
        // $products = Products::join('categories', 'products.category_id', '=', 'categories.id')
        //     ->select('products.*', 'categories.name_cate', 'products.id as id_prd')
        //     ->get();
        // dd($products->id_prd);
        $products = ProductVariants::with('product', 'sizes', 'colors')->latest()->get();
       
  
        return view('admin.product.list_variant', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $product = Products::all();
        $color = Color::all();
        $size = Size::all();
        // dd($product);
        return view('admin.product.add_variant', compact('categories','product','color','size'));
    }

    public function store(Request $request, ProductVariants $product)
    {
        $product->product_id = $request->product_id;
    
        $product->quantity = $request->quantity;
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        $imagePath = $request->file('image')->store('imgProduct', 'public');
        $product->image = $imagePath;
        $product->save();

        return redirect()->route('productVariant.index');
    }

    public function edit(String $id)
    {
        $product = ProductVariants::with('product', 'sizes', 'colors')->find($id);
        $products = Products::all(); // Sử dụng Product thay vì Products
        $colors = Color::all(); // Đổi tên biến color thành colors để phù hợp với mục đích
        $sizes = Size::all(); // Đổi tên biến size thành sizes để phù hợp với mục đích
        return view('admin.product.edit_variant', compact('product', 'products', 'colors', 'sizes'));
    }
    


    public function update(Request $request, ProductVariants $product,$id)
    {
        $product = ProductVariants::findOrFail($id);
        $product->product_id = $request->product_id;
        $product->quantity = $request->quantity;
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        if ($request->hasFile(('image'))) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imgPath = $request->file('image')->store('imgProduct', 'public');
            $product->image = $imgPath;
        }
        $product->save();
        return redirect()->route('productVariant.index');
    }
    public function destroy($id)
    {
        $product = ProductVariants::findOrFail($id);
    
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        
        return back();
    }
    
}
