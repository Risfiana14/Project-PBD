@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Table Role</h4>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID Role</th>
                    <th>Nama Role</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableRole as $value )
                    <tr>
                            <td>
                             {{ $value->idrole }}
                            </td>
                            <td>
                             {{ $value->nama_role }}
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