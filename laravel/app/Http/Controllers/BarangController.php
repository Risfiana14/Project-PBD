<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewBarang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\ViewDetailPenerimaan;

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

    public function getBarangByPengadaan($idpengadaan)
    {

    $barang = DB::table('view_detail_pengadaan')
                ->where('idpengadaan', $idpengadaan)
                ->join('view_barang', 'view_detail_pengadaan.idbarang', '=', 'view_barang.idbarang')
                ->join('view_satuan', 'view_barang.idsatuan', '=', 'view_satuan.idsatuan')
                ->select('view_barang.idbarang', 'view_barang.nama', 'view_satuan.nama_satuan')
                ->get();

    return response()->json($barang);
    }
    public function getMaxJumlahByIdBarang($idbarang)
    {
        // Mengambil total jumlah yang sudah ada berdasarkan idbarang
        $jumlah = DB::table('detail_pengadaan')
                    ->where('idbarang', $idbarang)
                    ->sum('jumlah');  // Menjumlahkan nilai dari kolom jumlah

        return response()->json(['max' => $jumlah]);
    }
    public function getBarangPenerimaan(){
        $barang = DB::table('detail_penerimaan')
        ->join('view_barang', 'detail_penerimaan.idbarang', '=', 'view_barang.idbarang')
        ->select('view_barang.idbarang', 'view_barang.nama', DB::raw('SUM(detail_penerimaan.jumlah_terima) as total_diterima'))
        ->groupBy('view_barang.idbarang', 'view_barang.nama')
        ->get();
        return response()->json($barang);
    }
    public function getMaxJumlahBarangPenerimaan($idbarang){
        $totalDiterima = DB::table('detail_penerimaan')
        ->where('idbarang', $idbarang)
        ->sum('jumlah');  
        return response()->json(['max' => $totalDiterima]);
    }
    public function getBarangByPenerimaan($idpenerimaan){
    $barang = DB::table('detail_penerimaan')
                ->join('view_barang', 'detail_penerimaan.idbarang', '=', 'view_barang.idbarang')
                ->where('detail_penerimaan.idpenerimaan', $idpenerimaan)
                ->select('view_barang.idbarang', 'view_barang.nama')
                ->get();
    return response()->json($barang); 
    }
    public function getBarangCount(Request $request)
    {
        $idbarang = $request->get('idbarang'); 
        $stok = ViewDetailPenerimaan::where('idbarang', $idbarang)
            ->sum('jumlah_terima'); 
        return response()->json([
            'status' => 'success',
            'available_stock' => $stok
        ]);
    }
};