<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use App\DataTables\SizeDataTable;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SizeDataTable $dataTable)
    {
        $sizes = Size::all();
        /* return view('admin.size.index', compact('sizes')); */
        return $dataTable->render('admin.size.index', compact('sizes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.size.add');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|unique:sizes|max:255',

        // ]);

        $size = Size::create($request->all());

        return redirect()->route('size.index');
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
        $size = Size::findOrFail($id);
        return view('admin.size.edit', compact('size'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        // $validatedData = $request->validate([
        //     'size' => 'required|unique:sizes|max:255',
        //     //Thêm các quy tắc kiểm tra dữ liệu cần thiết khác ở đây
        // ]);

        $size = Size::findOrFail($id);
        $size->update($request->all());

        return redirect()->route('size.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = Size::findOrFail($id);
        $size->delete();

        return back();
    }
}
