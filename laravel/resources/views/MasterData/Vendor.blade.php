@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Vendor</h4>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    @foreach ( DB::getSchemaBuilder()->getColumnListing('view_vendor') as $value )
                        <th>
                            {{ $value }}
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableVendor as $value )
                        <tr>
                            <td>
                             {{ $value->idvendor }}
                            </td>
                            <td>
                             {{ $value->nama_vendor }}
                            </td>
                            <td>
                             {{ $value->badan_hukum }}
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