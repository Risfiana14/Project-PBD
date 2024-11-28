@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Pengadaan Barang</h4>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Detail Pengadaan</th>
                        <th>ID Pengadaan</th>
                        <th>ID Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableDetailPengadaan as $value )
                         <tr>
                            <td>
                             {{ $value->iddetail_pengadaan }}
                            </td>
                            <td>
                             {{ $value->idpengadaan }}
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
                             {{ $value->sub_total }}
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
