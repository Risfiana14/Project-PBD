<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViewPenerimaan;
use Illuminate\Support\Facades\DB;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Transaksi/PenerimaanBarang',[
            "TablePenerimaan" => ViewPenerimaan::all()
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
        try {

            $request->validate([
                'idpengadaan' => 'required|integer',
                'iduser' => 'required|integer',
                'status' => 'required|string|in:P,A',
                'idbarang' => 'required|array',
                'idbarang.*' => 'required|integer',
                'jumlah' => 'required|array',
                'jumlah.*' => 'required|integer|min:1',
            ]);
    
            $barangDetail = [];
            foreach ($request->idbarang as $index => $idbarang) {
                $barangDetail[] = [
                    'idbarang' => $idbarang,
                    'jumlah' => $request->jumlah[$index]
                ];
            }
            $barangDetailJson = json_encode($barangDetail);
    
            DB::statement('CALL insert_penerimaan_dengan_detail(?, ?, ?, ?)', [
                $request->idpengadaan,
                $request->iduser,
                $request->status,
                $barangDetailJson
            ]);
    
            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
        DB::statement("CALL update_penerimaan($id, '$request->status',$request->idpengadaan,$request->iduser)");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::statement("CALL delete_penerimaan($id)");
        return redirect()->back();
    }
}
