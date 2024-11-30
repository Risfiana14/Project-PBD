<?php

namespace App\Http\Controllers;

use App\Models\ViewDetailPenerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class D_PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Transaksi/DetailTransaksi/D_PenerimaanBarang',[
            "TableDetailPenerimaan" => ViewDetailPenerimaan::all()
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
        DB::statement("CALL insert_detail_penerimaan($request->id_penerimaan,$request->id_barang,$request->jumlah_terima,$request->harga_satuan_terima,$request->sub_total_terima)");
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
        DB::statement("CALL update_detail_penerimaan($id,$request->id_penerimaan,$request->id_barang,$request->jumlah_terima,$request->harga_satuan_terima,$request->sub_total_terima)");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::statement("CALL delete_detail_penerimaan($id)");
        return redirect()->back();
    }
}
