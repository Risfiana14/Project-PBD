@extends('index')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Barang</h4>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Barang</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Harga</th>
                        <th>Id Satuan</th>
                    
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableBarang as $value )
                        <tr>
                            <td>
                             {{ $value->idbarang }}
                            </td>
                            <td>
                             {{ $value->jenis }}
                            </td>
                            <td>
                             {{ $value->nama }}
                            </td>
                            <td>
                             {{ $value->status }}
                            </td>
                            <td>
                             {{ $value->harga }}
                            </td>
                            <td>
                             {{ $value->idsatuan }}
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