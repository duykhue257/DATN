<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Voucher;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $voucher = Voucher::all();
        // dd($voucher);
        return view('admin.voucher.index', compact('voucher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.voucher.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $request->validate([
        //     'code'=>'required|min:5|max:10|unique:voucher',
        //     'present'=>'required|min:1|max:100',
        //     'min_price'=>'required',
        //     'start_at'=>'required',
        //     'end_at'=>'required',
        //     'quantity'=>'required|min:1',
        // ]);
        $voucher = $request->only("code", 'percent', 'min_price', 'start_at', 'end_at', 'quantity');
        // dd($voucher);
        Voucher::create($voucher);
        return redirect()->route('voucher.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $voucher = Voucher::find($id);
        if ($voucher) {
            return view('admin.voucher.edit', compact('voucher'));
        } else {
            return  "voucher loi";
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $voucher = Voucher::find($id);
        if ($voucher) {
            $voucher->update($request->all());
            return back();
        } else {
            return 0;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $voucher = Voucher::find($id);
        if ($voucher) {
            $voucher->delete();
            return redirect()->route('voucher.index');
        }
    }
    public function applyDiscount(Request $request)
    {
        // Kiểm tra mã giảm giá trong database hoặc bất kỳ cơ sở dữ liệu nào bạn lưu trữ
        $discount = Voucher::where('code', $request->discount_code)->first();

        if ($discount) {
            // Tính toán giảm giá dựa trên giá trị của từng mục trong giỏ hàng
            foreach(Cart::instance('cart')->content() as $item) {
                $itemPrice = $item->price * (1 - $discount->value / 100); // Tính giá mới sau khi áp dụng giảm giá
                Cart::instance('cart')->update($item->rowId, [
                    'price' => $itemPrice,
                    'discount' => $discount->value, // Lưu giá trị giảm giá vào mục
                ]);
            } 
    
            return redirect()->back()->with('success', 'Đã áp dụng mã giảm giá thành công.');
        } else {
            return redirect()->back()->with('error', 'Mã giảm giá không hợp lệ.');
        }
    }
}
