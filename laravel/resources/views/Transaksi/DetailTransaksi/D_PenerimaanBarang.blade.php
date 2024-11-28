@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Penerimaan Barang</h4>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Detail Penerimaan</th>
                        <th>ID Penerimaan</th>
                        <th>ID Barang</th>
                        <th>Jumlah Terima</th>
                        <th>Harga Satuan Terima</th>
                        <th>Sub Total Terima</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableDetailPenerimaan as $value )
                         <tr>
                            <td>
                             {{ $value->iddetail_penerimaan }}
                            </td>
                            <td>
                             {{ $value->idpenerimaan }}
                            </td>
                            <td>
                             {{ $value->idbarang }}
                            </td>
                            <td>
                             {{ $value->jumlah_terima }}
                            </td>
                            <td>
                             {{ $value->harga_satuan_terima }}
                            </td>
                            <td>
                             {{ $value->sub_total_terima }}
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
