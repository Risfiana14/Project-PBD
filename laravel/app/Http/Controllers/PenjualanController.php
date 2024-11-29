<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewPenjualan;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Transaksi/PenjualanBarang',[
            "TablePenjualan" => ViewPenjualan::all()
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
        DB::statement("CALL insert_penjualan($request->sub_total_nilai,$request->ppn,$request->total_nilai,$request->iduser,$request->idvendor)");
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
        DB::statement("CALL update_penjualan($id, $request->sub_total_nilai,$request->ppn,$request->total_nilai,$request->iduser,$request->idvendor)");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::statement("CALL delete_penjualan($id)");
        return redirect()->back();
    }
}
