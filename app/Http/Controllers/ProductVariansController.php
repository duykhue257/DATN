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

    public function index(int $id){
        // Truy vấn biến thể sản phẩm theo ID sản phẩm
        $products = ProductVariants::with('product', 'sizes', 'colors')
                                    ->where('product_id', $id) // Lọc theo ID sản phẩm
                                    ->latest()
                                    ->get();
        return view('admin.product.list_variant', compact('products'));
    }
    

    public function create(Request $request)
    {
        $productId = $request->all(); 
        $keys = array_keys($productId); 
        // dd($keys[0]);
        $key = $keys[0]; 
        $product = Products::findOrFail($key);
      

        $categories = Category::all();
    
        $color = Color::all();
        $size = Size::all();
        // dd($product);
        return view('admin.product.add_variant', compact('categories','product','color','size','key'));
    }

    public function store(Request $request, ProductVariants $product)
    {
    //  dd($request->all());
        $product->product_id = $request->product_id;
        $product->quantity = $request->quantity;
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('imgProduct', 'public');
            $product->image = $imagePath;
        }
    
        $product->save();
    
        return redirect()->route('product.show', $product->product_id);
    }
    

    public function edit(String $id)
    {
        $product = ProductVariants::with('product', 'sizes', 'colors')->find($id);
        $products = Products::all(); // Sử dụng Product thay vì Products
        $colors = Color::all(); // Đổi tên biến color thành colors để phù hợp với mục đích
        $sizes = Size::all(); // Đổi tên biến size thành sizes để phù hợp với mục đích
        return view('admin.product.edit_variant', compact('product', 'products', 'colors', 'sizes'));
    }
    


    public function update(Request $request, $id)
    {
        $productVariant = ProductVariants::findOrFail($id);
    
        $productVariant->fill($request->all());
    
        if ($request->hasFile('image')) {
            if ($productVariant->image) {
                Storage::disk('public')->delete($productVariant->image);
            }
            $productVariant->image = $request->file('image')->store('imgProduct', 'public');
        }
    
        $productVariant->save();
    
        return redirect()->route('product.show', $productVariant->product_id);
    }
    public function destroy($id)
    {
        $productVariant = ProductVariants::findOrFail($id);
    
        if ($productVariant->image) {
            Storage::disk('public')->delete($productVariant->image);
        }
        
        $productId = $productVariant->product_id;
        $productVariant->delete();
        
        return redirect()->route('product.show', $productId);
    }
    
    
}
