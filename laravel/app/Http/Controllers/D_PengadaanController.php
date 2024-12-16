<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewDetailPengadaan;
use Illuminate\Support\Facades\DB;

class D_PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Transaksi/DetailTransaksi/D_PengadaanBarang',[
            "TableDetailPengadaan" => ViewDetailPengadaan::all()
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
        DB::statement("CALL insert_detail_pengadaan($request->id_pengadaan,$request->id_barang,$request->jumlah)");
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
        DB::statement("CALL update_detail_pengadaan($id,$request->harga_satuan,$request->jumlah,$request->sub_total,$request->id_pengadaan,$request->id_barang)");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::statement("CALL delete_detail_pengadaan($id)");
        return redirect()->back();
    }
}
