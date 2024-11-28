@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Satuan</h4>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Satuan</th>
                        <th>Nama Satuan</th>
                        <th>Status</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableSatuan as $value )
                    <tr>
                            <td>
                             {{ $value->idsatuan }}
                            </td>
                            <td>
                             {{ $value->nama_satuan }}
                            </td>
                            <td>
                             {{ $value->status }}
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