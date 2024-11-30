<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewKartuStok;
use Illuminate\Support\Facades\DB;

class KartuStokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ManajemenStok/KartuStok',[
            "TableKartuStok" => ViewKartuStok::all()
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
        DB::statement("CALL insert_kartu_stok('$request->jenis_transaksi',$request->masuk,$request->keluar,$request->stok,$request->id_transaksi,$request->id_barang)");
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
        DB::statement("CALL update_kartu_stok($id,'$request->jenis_transaksi',$request->masuk,$request->keluar,$request->stok,$request->id_transaksi,$request->id_barang)");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::statement("CALL delete_kartu_stok($id)");
        return redirect()->back();
    }
}
