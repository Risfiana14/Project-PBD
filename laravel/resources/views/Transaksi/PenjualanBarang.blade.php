@extends('index')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
        <div class="d-flex justify-content-between align-items-center ">
            <h4 class="card-title mb-0">Table Penjualan</h4>
            <a href="{{ route('detail-penjualan.index') }}"><button type="button" class="btn btn-success btn-rounded btn-fw">Detail Penjualan</button></a>
        </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Penjualan</th>
                        <th>ID User</th>
                        <th>ID Margin Penjualan</th>
                        <th>Sub Total Nilai</th>
                        <th>PPN</th>
                        <th>Total Nilai</th>
                        <th>Created At</th>
                    
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TablePenjualan as $value )
                         <tr>
                            <td>
                             {{ $value->idpenjualan }}
                            </td>
                            <td>
                             {{ $value->iduser }}
                            </td>
                            <td>
                             {{ $value->idmargin_penjualan }}
                            </td>
                            <td>
                             {{ $value->subtotal_nilai }}
                            </td>
                            <td>
                             {{ $value->ppn }}
                            </td>
                            <td>
                             {{ $value->total_nilai }}
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