@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center ">
                <h4 class="card-title mb-0">Detail Penerimaan Barang</h4>
                <button type="button" class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target=".bd-example-modal-lg">+ Tambah</button>
            </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Detail Penerimaan</th>
                        <th>ID Penerimaan</th>
                        <th>ID Barang</th>
                        <th>Jumlah Terima</th>
                        <th>Harga Satuan Terima</th>
                        <th>Sub Total Terima</th>
                        <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableDetailPenerimaan as $value )
                         <tr>
                            <td>
                             {{ $value->iddetail_penerimaan }}
                            </td>
                            <td>
                             {{ $value->idpenerimaan }}
                            </td>
                            <td>
                             {{ $value->idbarang }}
                            </td>
                            <td>
                             {{ $value->jumlah_terima }}
                            </td>
                            <td>
                             {{ $value->harga_satuan_terima }}
                            </td>
                            <td>
                             {{ $value->sub_total_terima }}
                            </td>
                            <td class="d-flex">
                            <form action="{{ route('detail-penerimaan.destroy', $value->iddetail_penerimaan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Detail Penerimaan ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->iddetail_penerimaan }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->iddetail_penerimaan }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit Barang</h4>
                                                    <form class="forms-sample" action="{{ route('detail-penerimaan.update', $value->iddetail_penerimaan) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">ID Penerimaan</label>
                                                            <select name="id_penerimaan" class="form-control" id="exampleSelectGender">
                                                           
                                                                @foreach ( DB::table('view_penerimaan')->get() as $values)
                                                                @if ( $values->idpenerimaan == $value->idpenerimaan )
                                                                    <option value="{{ $values->idpenerimaan }}">{{ $values->idpenerimaan }} - ID Pengadaan ( {{ $values->idpengadaan }} ) - ID User ( {{ $values->iduser }} ) - Status ( {{ $values->status }} )</option>
                                                                @endif
                                                                @endforeach
                                                                @foreach ( DB::table('view_penerimaan')->get() as $values)
                                                                @if ( $values->idpenerimaan !== $value->idpenerimaan )
                                                                    <option value="{{ $values->idpenerimaan }}">{{ $values->idpenerimaan }} - ID Pengadaan ( {{ $values->idpengadaan }} ) - ID User ( {{ $values->iduser }} ) - Status ( {{ $values->status }} )</option>
                                                                @endif
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">ID Barang</label>
                                                            <select name="id_barang" class="form-control" id="exampleSelectGender">
                                                                @foreach ( DB::table('view_barang')->get() as $values)
                                                                @if ( $values->idbarang ==  $value->idbarang )
                                                                    <option value="{{ $values->idbarang }}">{{ $values->idbarang }} -  {{ $values->nama }}</option>
                                                                @endif
                                                                @endforeach
                                                                @foreach ( DB::table('view_barang')->get() as $values)
                                                                @if ( $values->idbarang !==  $value->idbarang )
                                                                    <option value="{{ $values->idbarang }}">{{ $values->idbarang }} -  {{ $values->nama }}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="exampleInputUsername1">Jumlah Terima</label>
                                                        <input value="{{ $value->jumlah_terima }}" type="number" class="form-control" name="jumlah_terima" Required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="exampleInputUsername1">Harga Satuan Terima</label>
                                                        <input value="{{ $value->harga_satuan_terima }}" type="number" class="form-control" name="harga_satuan_terima" Required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="exampleInputUsername1">Sub Total Terima</label>
                                                        <input value="{{ $value->sub_total_terima }}" type="number" class="form-control" name="sub_total_terima" Required>
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

                  <h4 class="card-title">Tambah Detail Pnerimaan</h4>
                  <form class="forms-sample" action="{{ route('detail-penerimaan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleSelectGender">ID Penerimaan</label>
                        <select name="id_penerimaan" class="form-control" id="exampleSelectGender">
                        <option value=""></option>
                            @foreach ( DB::table('view_penerimaan')->get() as $value)
                                <option value="{{ $value->idpenerimaan }}">{{ $value->idpenerimaan }} - ID Pengadaan ( {{ $value->idpengadaan }} ) - ID User ( {{ $value->iduser }} ) - Status ( {{ $value->status }} )</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">ID Barang</label>
                        <select name="id_barang" class="form-control" id="exampleSelectGender">
                        <option value=""></option>
                            @foreach ( DB::table('view_barang')->get() as $value)
                                <option value="{{ $value->idbarang }}">{{ $value->idbarang }} -  {{ $value->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Jumlah Terima</label>
                      <input type="number" class="form-control" name="jumlah_terima" Required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Harga Satuan Terima</label>
                      <input type="number" class="form-control" name="harga_satuan_terima" Required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Sub Total Terima</label>
                      <input type="number" class="form-control" name="sub_total_terima" Required>
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
