@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Detail Retur Barang</h4>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Detail Retur</th>
                        <th>ID Retur</th>
                        <th>ID Detail Penerimaan</th>
                        <th>Jumlah</th>
                        <th>Alasan</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableDetailRetur as $value )
                         <tr>
                            <td>
                             {{ $value->iddetail_retur }}
                            </td>
                            <td>
                             {{ $value->idretur }}
                            </td>
                            <td>
                             {{ $value->iddetail_penerimaan }}
                            </td>
                            <td>
                             {{ $value->jumlah }}
                            </td>
                            <td>
                             {{ $value->alasan }}
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
