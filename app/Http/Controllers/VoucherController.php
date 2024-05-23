<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Voucher;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\DataTables\VoucherDataTable;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VoucherDataTable $dataTable)
    {
        //
        $voucher = Voucher::all();
        // dd($voucher);
        /* return view('admin.voucher.index', compact('voucher')); */
        return $dataTable->render('admin.voucher.index', compact('voucher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $randomCode = strtoupper(Str::random(6));
        // dd($randomCode);
        return view('admin.voucher.add', ['randomCode' => $randomCode]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|unique:voucher',
            'percent' => 'required|numeric|min:0|max:100',
            'min_price' => 'required|numeric|min:0',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'quantity' => 'required|integer|min:1',
        ]);
        // $voucher = $request->only("code", 'percent', 'min_price', 'start_at', 'end_at', 'quantity');
        // dd($voucher);
        Voucher::create($validatedData);
        return redirect()->route('voucher.index')->with('success', 'Voucher đã được tạo thành công.');
    
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
        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'code' => 'required|string|unique:voucher,code,' . $id,
            'percent' => 'required|numeric|min:0|max:100',
            'min_price' => 'required|numeric|min:0',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'quantity' => 'required|integer|min:1',
        ]);
    
        $voucher = Voucher::find($id);
        if ($voucher) {
            // Cập nhật voucher với dữ liệu đã xác thực
            $voucher->update($validatedData);
            return redirect()->route('voucher.index');
        } else {
            return redirect()->route('voucher.index');
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
