<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewDetailRetur;
use Illuminate\Support\Facades\DB;

class D_ReturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Transaksi/DetailTransaksi/D_ReturBarang',[
            "TableDetailRetur" => ViewDetailRetur::all()
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
        DB::statement("CALL insert_detail_retur($request->jumlah,'$request->alasan',$request->id_retur,$request->id_detail_penerimaan)");
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
        DB::statement("CALL update_detail_retur($id,$request->jumlah,'$request->alasan',$request->id_retur,$request->id_detail_penerimaan)");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::statement("CALL delete_detail_retur($id)");
        return redirect()->back();
    }
}
