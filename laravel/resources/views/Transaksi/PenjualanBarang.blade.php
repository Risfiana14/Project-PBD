@extends('index')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Penjualan</h4>
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