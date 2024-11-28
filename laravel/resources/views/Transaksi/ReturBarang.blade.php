@extends('index')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
        <div class="d-flex justify-content-between align-items-center ">
            <h4 class="card-title mb-0">Table Retur</h4>
            <a href="{{ route('detail-retur.index') }}"><button type="button" class="btn btn-success btn-rounded btn-fw">Detail Retur</button></a>
        </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Retur</th>
                        <th>ID User</th>
                        <th>ID Penerimaan</th>
                        <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableRetur as $value )
                         <tr>
                            <td>
                             {{ $value->idretur }}
                            </td>
                            <td>
                             {{ $value->iduser }}
                            </td>
                            <td>
                             {{ $value->idpenerimaan }}
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