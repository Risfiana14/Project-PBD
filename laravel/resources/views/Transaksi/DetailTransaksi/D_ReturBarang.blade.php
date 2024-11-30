@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center ">
                <h4 class="card-title mb-0">Detail Retur Barang</h4>
                <button type="button" class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target=".bd-example-modal-lg">+ Tambah</button>
            </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Detail Retur</th>
                        <th>ID Retur</th>
                        <th>ID Detail Penerimaan</th>
                        <th>Jumlah</th>
                        <th>Alasan</th>
                        <th></th>
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
                            <td class="d-flex">
                            <form action="{{ route('detail-retur.destroy', $value->iddetail_retur) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Detail Retur ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->iddetail_retur }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->iddetail_retur }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit Detail Retur</h4>
                                                    <form class="forms-sample" action="{{ route('detail-retur.update', $value->iddetail_retur) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                       
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">ID Retur</label>
                                                            <select name="id_retur" class="form-control" id="exampleSelectGender">
                                                                @foreach ( DB::table('view_returs')->get() as $values)
                                                                @if ( $values->idretur == $value->idretur )
                                                                    <option value="{{ $values->idretur }}">{{ $values->idretur }} - ID User ( {{ $values->iduser }} ) - ID Penerimaan ( {{ $values->idpenerimaan }} )</option>
                                                                @endif
                                                                @endforeach
                                                                @foreach ( DB::table('view_returs')->get() as $values)
                                                                @if ( $values->idretur !== $value->idretur )
                                                                    <option value="{{ $values->idretur }}">{{ $values->idretur }} - ID User ( {{ $values->iduser }} ) - ID Penerimaan ( {{ $values->idpenerimaan }} )</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">ID Detail Penerimaan</label>
                                                            <select name="id_detail_penerimaan" class="form-control" id="exampleSelectGender">
                                                        
                                                                @foreach ( DB::table('view_detail_penerimaan')->get() as $values)
                                                                @if ( $values->iddetail_penerimaan == $value->iddetail_penerimaan )
                                                                    <option value="{{ $values->iddetail_penerimaan }}">{{ $values->iddetail_penerimaan }} - ID Penerimaan ( {{ $values->idpenerimaan }} ) - ID Barang ( {{ $values->idbarang }} )</option>
                                                                @endif
                                                                @endforeach

                                                                @foreach ( DB::table('view_detail_penerimaan')->get() as $values)
                                                                @if ( $values->iddetail_penerimaan !== $value->iddetail_penerimaan )
                                                                    <option value="{{ $values->iddetail_penerimaan }}">{{ $values->iddetail_penerimaan }} - ID Penerimaan ( {{ $values->idpenerimaan }} ) - ID Barang ( {{ $values->idbarang }} )</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="exampleInputUsername1">Jumlah</label>
                                                        <input value="{{ $value->jumlah }}" type="number" class="form-control" name="jumlah" Required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="exampleInputUsername1">Alasan</label>
                                                        <input value="{{ $value->alasan }}" type="text" class="form-control" name="alasan" Required>
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

                  <h4 class="card-title">Tambah Detail Retur</h4>
                  <form class="forms-sample" action="{{ route('detail-retur.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleSelectGender">ID Retur</label>
                        <select name="id_retur" class="form-control" id="exampleSelectGender">
                        <option value=""></option>
                            @foreach ( DB::table('view_returs')->get() as $value)
                                <option value="{{ $value->idretur }}">{{ $value->idretur }} - ID User ( {{ $value->iduser }} ) - ID Penerimaan ( {{ $value->idpenerimaan }} )</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">ID Detail Penerimaan</label>
                        <select name="id_detail_penerimaan" class="form-control" id="exampleSelectGender">
                        <option value=""></option>
                            @foreach ( DB::table('view_detail_penerimaan')->get() as $value)
                                <option value="{{ $value->iddetail_penerimaan }}">{{ $value->iddetail_penerimaan }} - ID Penerimaan ( {{ $value->idpenerimaan }} ) - ID Barang ( {{ $value->idbarang }} )</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Jumlah</label>
                      <input type="number" class="form-control" name="jumlah" Required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Alasan</label>
                      <input type="text" class="form-control" name="alasan" Required>
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
