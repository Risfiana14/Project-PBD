@extends('index')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
        <div class="d-flex justify-content-between align-items-center ">
            <h4 class="card-title mb-0">Table Penerimaan</h4>
            <div class="d-flex align-items-center mt-2 mt-md-0">
                
                <button type="button" class="btn btn-info btn-rounded btn-sm me-2" data-toggle="modal" data-target=".bd-example-modal-lg">
                    + Tambah
                </button>
            
                <a class="ml-3" href="{{ route('detail-penerimaan.index') }}">
                    <button type="button" class="btn btn-dark btn-rounded btn-sm">
                        Detail Penerimaan
                    </button>
                </a>
            </div>
        </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Penerimaan</th>
                        <th>ID Pengadaan</th>
                        <th>ID User</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TablePenerimaan as $value )
                         <tr>
                            <td>
                             {{ $value->idpenerimaan }}
                            </td>
                            <td>
                             {{ $value->idpengadaan }}
                            </td>
                            <td>
                             {{ $value->iduser }}
                            </td>
                            <td>
                             {{ $value->status }}
                            </td>
                            <td>
                             {{ $value->created_at }}
                            </td>
                            <td class="d-flex">
                            <form action="{{ route('penerimaan.destroy', $value->idpenerimaan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Penerimaan {{ $value->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->idpenerimaan }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->idpenerimaan }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit Penerimaan</h4>
                                                    <form class="forms-sample" action="{{ route('penerimaan.update', $value->idpenerimaan) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                       
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">ID Pengadaan</label>
                                                                <select name="idpengadaan" class="form-control" id="exampleSelectGender">
        
                                                                    @foreach ( DB::table('view_pengadaan')->get() as $values)
                                                                        @if ( $values->idpengadaan == $value->idpengadaan )
                                                                        <option value="{{ $values->idpengadaan }}">{{ $values->idpengadaan }} - ID User ( {{ $values->user_iduser }} ) - ID Vendor ( {{ $values->vendor_idvendor }} ) - Status ( {{ $values->status }} )</option>
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ( DB::table('view_pengadaan')->get() as $values)
                                                                        @if ( $values->idpengadaan !== $value->idpengadaan )
                                                                        <option value="{{ $values->idpengadaan }}">{{ $values->idpengadaan }} - ID User ( {{ $values->user_iduser }} ) - ID Vendor ( {{ $values->vendor_idvendor }} ) - Status ( {{ $values->status }} )</option>
                                                                        @endif
                                                                    @endforeach

                                                                </select>
                                                            </div>
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
                                                                <label for="exampleSelectGender">Status</label>
                                                                <select name="status" class="form-control" id="exampleSelectGender">
                                                                <option value=""></option>
                                                                        <option value="P">P - Pending</option>
                                                                        <option value="S">S - Selesai</option>
                                                                        <option value="R">R - Rejected</option>
                                                                        <option value="C">C - Cancelled</option>    
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
                  <h4 class="card-title">Tambah Penerimaan</h4>
                  <form class="forms-sample" action="{{ route('penerimaan.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="exampleSelectGender">ID Pengadaan</label>
                        <select name="idpengadaan" class="form-control" id="exampleSelectGender">
                        <option value=""></option>
                            @foreach ( DB::table('view_pengadaan')->get() as $value)
                                <option value="{{ $value->idpengadaan }}">{{ $value->idpengadaan }} - ID User ( {{ $value->user_iduser }} ) - ID Vendor ( {{ $value->vendor_idvendor }} ) - Status ( {{ $value->status }} )</option>
                            @endforeach
                        </select>
                    </div>
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
                        <label for="exampleSelectGender">Status</label>
                        <select name="status" class="form-control" id="exampleSelectGender">
                        <option value=""></option>
                                <option value="P">P - Pending</option>
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