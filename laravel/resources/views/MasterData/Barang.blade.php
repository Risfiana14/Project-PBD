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
                        <th>ID Satuan</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Harga</th>
                        
                    
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableBarang as $value )
                        <tr>
                            <td>
                             {{ $value->idbarang }}
                            </td>
                            <td>
                             {{ $value->idsatuan }}
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
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
@endsection