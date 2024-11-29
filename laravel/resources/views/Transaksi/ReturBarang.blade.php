@extends('index')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
        <div class="d-flex justify-content-between align-items-center ">
            <h4 class="card-title mb-0">Table Retur</h4>
            <div class="d-flex align-items-center mt-2 mt-md-0">
                
                <button type="button" class="btn btn-info btn-rounded btn-sm me-2" data-toggle="modal" data-target=".bd-example-modal-lg">
                    + Tambah
                </button>
            
                <a class="ml-3" href="{{ route('detail-retur.index') }}">
                    <button type="button" class="btn btn-dark btn-rounded btn-sm">
                        Detail Retur
                    </button>
                </a>
            </div>
        </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Retur</th>
                        <th>ID User</th>
                        <th>ID Penerimaan</th>
                        <th>Created At</th>
                        <th></th>
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
                            <td class="d-flex">
                            <form action="{{ route('retur.destroy', $value->idretur) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Retur ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->idretur }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->idretur }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit Retur</h4>
                                                    <form class="forms-sample" action="{{ route('retur.update', $value->idretur) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                       
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">ID User</label>
                                                            <select name="iduser" class="form-control" id="exampleSelectGender">
                                                                @foreach ( DB::table('view_user')->get() as $values)
                                                                @if ( $values->id == $value->iduser )
                                                                    <option value="{{ $values->id }}">{{ $values->id }} - {{ $values->name }}</option>
                                                                @endif
                                                                @endforeach
                                                                @foreach ( DB::table('view_user')->get() as $values)
                                                                @if ( $values->id !== $value->iduser )
                                                                    <option value="{{ $values->id }}">{{ $values->id }} - {{ $values->name }}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">ID Penerimaan</label>
                                                            <select name="idpenerimaan" class="form-control" id="exampleSelectGender">

                                                                @foreach ( DB::table('view_penerimaan')->get() as $values)
                                                                @if ( $values->idpenerimaan == $value->idpenerimaan)
                                                                    <option value="{{ $values->idpenerimaan }}">{{ $values->idpenerimaan }} - ID Pengadaan ( {{ $values->idpengadaan }} ) - ID User ( {{ $values->iduser }} ) - Status ( {{ $values->status }} )</option>
                                                                @endif
                                                                @endforeach
                                                                @foreach ( DB::table('view_penerimaan')->get() as $values)
                                                                @if ( $values->idpenerimaan !== $value->idpenerimaan)
                                                                    <option value="{{ $values->idpenerimaan }}">{{ $values->idpenerimaan }} - ID Pengadaan ( {{ $values->idpengadaan }} ) - ID User ( {{ $values->iduser }} ) - Status ( {{ $values->status }} )</option>
                                                                @endif
                                                                @endforeach

                                                            </select>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                        <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Retur</h4>
                  <form class="forms-sample" action="{{ route('retur.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="exampleSelectGender">ID User</label>
                        <select name="iduser" class="form-control" id="exampleSelectGender">
                        <option value=""></option>
                            @foreach ( DB::table('view_user')->get() as $value)
                                <option value="{{ $value->id }}">{{ $value->id }} - {{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectGender">ID Penerimaan</label>
                        <select name="idpenerimaan" class="form-control" id="exampleSelectGender">
                        <option value=""></option>
                            @foreach ( DB::table('view_penerimaan')->get() as $value)
                                <option value="{{ $value->idpenerimaan }}">{{ $value->idpenerimaan }} - ID Pengadaan ( {{ $value->idpengadaan }} ) - ID User ( {{ $value->iduser }} ) - Status ( {{ $value->status }} )</option>
                            @endforeach
                        </select>
                    </div>
                  
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="button" data-dismiss="modal" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div>
@endsection