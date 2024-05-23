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

    public function index(int $id)
    {

        // Truy vấn biến thể sản phẩm theo ID sản phẩm
        // dd($id);

        $products = ProductVariants::with('product', 'sizes', 'colors')
            ->where('product_id', $id) // Lọc theo ID sản phẩm
            ->latest()
            ->get();
        $productId = $id;
        return view('admin.product.list_variant', compact('products', 'productId'));
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
        return view('admin.product.add_variant', compact('categories', 'product', 'color', 'size', 'key'));
    }

    public function store(Request $request)
    {
        // Lấy dữ liệu từ request
        $data = $request->all();

        $existingVariant = ProductVariants::where('product_id', $data['product_id'])
            ->where('color_id', $data['color_id'])
            ->where('size_id', $data['size_id'])
            ->first();

        $existingVariantSameColor = ProductVariants::where('product_id', $data['product_id'])
            ->where('color_id', $data['color_id'])
            ->first();

        if ($existingVariant) {
            return redirect()->back()->withErrors(['error' => 'Biến thể sản phẩm đã tồn tại.']);
        }

        $productVariant = new ProductVariants();
        $productVariant->product_id = $data['product_id'];
        $productVariant->quantity = $data['quantity'];
        $productVariant->color_id = $data['color_id'];
        $productVariant->size_id = $data['size_id'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('imgProduct', 'public');
            $productVariant->image = $imagePath;
        } elseif ($existingVariantSameColor) {
            $productVariant->image = $existingVariantSameColor->image;
        }

        try {
            $productVariant->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Không thể lưu biến thể sản phẩm. Vui lòng thử lại.']);
        }

        return redirect()->route('product.show', $productVariant->product_id)->with('success', 'Biến thể sản phẩm đã được tạo thành công.');
    }



    public function edit(String $id)
    {

        $product = ProductVariants::with('product', 'sizes', 'colors')->find($id);
        $products = Products::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.product.edit_variant', compact('product', 'products', 'colors', 'sizes'));
    }



    public function update(Request $request, $id)
    {
        $productVariant = ProductVariants::findOrFail($id);

        $request->validate([
            'quantity' => 'required|numeric|min:0|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
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

        // if ($productVariant->image) {
        //     Storage::disk('public')->delete($productVariant->image);
        // }

        $productId = $productVariant->product_id;
        $productVariant->delete();

        return redirect()->route('product.show', $productId);
    }

    public function restore($id)
    {
        $product = ProductVariants::withTrashed()->findOrFail(114);
        $product->restore();

        return redirect()->back()->with('success', 'Sản phẩm đã được khôi phục thành công.');
    }
}
