<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductVariants;
use App\Models\Size;
use Illuminate\Pagination\Paginator;
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
    $productsQuery = Products::with('variants');
    // dd($productsQuery);

    // Sắp xếp sản phẩm theo giá (giảm dần hoặc tăng dần)
    $sort = $request->input('sort');
    if ($sort == 'desc_price') {
    $productsQuery->orderBy('price_reduced', 'desc');
    } elseif ($sort == 'asc_price') {
        $productsQuery->orderBy('price_reduced', 'asc');
    }

    // Tìm kiếm theo danh mục
    if ($request->has('category')) {
        $selectedCategories = explode(',', $request->input('category'));
        $productsQuery->whereIn('category_id', $selectedCategories);
    }

    // Lọc theo khoảng giá
    if ($request->has('min_price') && $request->has('max_price')) {
        $minPrice = $request->min_price;
        $maxPrice = $request->max_price;
        $productsQuery->whereBetween('price_reduced', [$minPrice, $maxPrice]);
    }

    // Lọc sản phẩm theo size
    if ($request->has('size')) {
        $selectedSizes = explode(',', $request->input('size'));
        $productsQuery->whereHas('variants', function ($query) use ($selectedSizes) {
            $query->whereIn('size_id', $selectedSizes);
        });
    }

    // Lọc sản phẩm theo màu sắc
    if ($request->has('color')) {
        $selectedColors = explode(',', $request->input('color'));
        $productsQuery->whereHas('variants', function ($query) use ($selectedColors) {
            $query->whereIn('color_id', $selectedColors);
        });
    }

    //Phân trang và đếm
    $products = $productsQuery->paginate(9)->appends($request->query());
    $totalProducts = $products->total();

    Paginator::useBootstrap();

    return view('client.shop', compact('products','colors','sizes','categories'));
}

public function ProductDetail(Request $request) {
       
        $productId = $request->input('id') ?? $request->query('id');
        
        $product = Products::with('variants')->find($productId);
        $comments = $product->comments;
        $commentCount = $product->comments->count();
        $firstFiveComments = $comments->take(5);
        $remainingComments = $comments->slice(5);
        $categoryProducts = Products::where('category_id', 2)->with('variants')->get();

    $numbers = range(1, 6);
        
        return view('client.detail_product', compact('firstFiveComments','remainingComments','product', 'categoryProducts', 'numbers','comments','commentCount'));
    }

    public function createComment(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_id' => 'required',
            'content' => 'required',
        ]);

        Comments::create($request->all());

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

public function showHome(){
    $categories = Category::all();
    // dd($category);
    return view('client.homepage',compact('categories'));
   
} 
    
}
