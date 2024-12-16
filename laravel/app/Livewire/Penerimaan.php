<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\ViewPengadaan;
use App\Models\ViewPenerimaan;
use App\Models\ViewDetailPengadaan;

class Penerimaan extends Component
{
    public $idpengadaan;
    public $penerimaan = []; // Variabel untuk menyimpan nilai penerimaan

    public function render()
    {
        // Ambil data pengadaan untuk dropdown
        $pengadaan = ViewPengadaan::all();
        $TablePenerimaan = ViewPenerimaan::all();

        // Ambil barang yang terkait dengan idpengadaan jika ada
        $barang = [];
        if ($this->idpengadaan) {
            $barang = ViewDetailPengadaan::where('idpengadaan', $this->idpengadaan)
                        ->with('barang.satuan') // Menambahkan eager loading untuk barang dan satuan
                        ->get();
        }

        return view('livewire.penerimaan', compact('pengadaan', 'barang','TablePenerimaan'));
    }
}
