<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewBarang;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('MasterData/Barang',[
            "TableBarang" => ViewBarang::all()
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
        DB::statement("CALL insert_barang('$request->jenis' ,'$request->nama', $request->status, $request->harga, $request->idsatuan)");
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
        DB::statement("CALL update_barang($id, '$request->jenis' ,'$request->nama', $request->status, $request->harga, $request->idsatuan)");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::statement("CALL delete_barang($id)");
        return redirect()->back();
    }
}
