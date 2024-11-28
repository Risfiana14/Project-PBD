@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Penjualan Barang</h4>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Detail Pengadaan</th>
                        <th>ID Penjualan</th>
                        <th>ID Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableDetailPenjualan as $value )
                         <tr>
                            <td>
                             {{ $value->iddetail_penjualan }}
                            </td>
                            <td>
                             {{ $value->penjualan_idpenjualan }}
                            </td>
                            <td>
                             {{ $value->idbarang }}
                            </td>
                            <td>
                             {{ $value->harga_satuan }}
                            </td>
                            <td>
                             {{ $value->jumlah }}
                            </td>
                            <td>
                             {{ $value->subtotal }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
@endsection
