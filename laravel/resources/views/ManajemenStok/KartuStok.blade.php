@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Kartu Stok</h4>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Kartu Stok</th>
                        <th>ID Barang</th>
                        <th>ID Transaksi</th>
                        <th>Jenis Transaksi</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Stok</th>
                        <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableKartuStok as $value )
                    <tr>
                            <td>
                             {{ $value->idkartu_stok }}
                            </td>
                            <td>
                             {{ $value->idbarang }}
                            </td>
                            <td>
                             {{ $value->idtransaksi }}
                            </td>
                            <td>
                             {{ $value->jenis_transaksi }}
                            </td>
                            <td>
                             {{ $value->masuk }}
                            </td>
                            <td>
                             {{ $value->keluar }}
                            </td>
                            <td>
                             {{ $value->stok }}
                            </td>
                            <td>
                             {{ $value->created_at }}
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