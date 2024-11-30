<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewMarginPenjualan;
use Illuminate\Support\Facades\DB;

class MarginPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Laporan/MarginPenjualan',[
            "TableMarginPenjualan" => ViewMarginPenjualan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::statement("CALL insert_margin_penjualan($request->persen,$request->status,$request->iduser)");
        return redirect()->back();
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::statement("CALL update_margin_penjualan($id,$request->persen,$request->status,$request->iduser)");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::statement("CALL delete_margin_penjualan($id)");
        return redirect()->back();
    }
}
