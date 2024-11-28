@extends('index')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
        <div class="d-flex justify-content-between align-items-center ">
            <h4 class="card-title mb-0">Table Pengadaan</h4>
            <a href="{{ route('detail-pengadaan.index') }}"><button type="button" class="btn btn-success btn-rounded btn-fw" >Detail Pengadaan</button></a>
        </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Pengadaan</th>
                        <th>ID User</th>
                        <th>ID Vendor</th>
                        <th>Sub Total Nilai</th>
                        <th>PPN</th>
                        <th>Total Nilai</th>
                        <th>Status</th>
                        <th>Timestamp</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TablePengadaan as $value )
                        <tr>
                            <td>
                             {{ $value->idpengadaan }}
                            </td>
                            <td>
                             {{ $value->user_iduser }}
                            </td>
                            <td>
                             {{ $value->vendor_idvendor }}
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
                             {{ $value->status }}
                            </td>
                            <td>
                             {{ $value->timestamp }}
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