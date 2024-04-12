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



   
    
    
}
