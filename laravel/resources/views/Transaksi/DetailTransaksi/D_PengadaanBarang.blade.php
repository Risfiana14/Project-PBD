@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center ">
                <h4 class="card-title mb-0">Detail Pengadaan Barang</h4>
                <button type="button" class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target=".bd-example-modal-lg">+ Tambah</button>
            </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Detail Pengadaan</th>
                        <th>ID Pengadaan</th>
                        <th>ID Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                        <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableDetailPengadaan as $value )
                         <tr>
                            <td>
                             {{ $value->iddetail_pengadaan }}
                            </td>
                            <td>
                             {{ $value->idpengadaan }}
                            </td>
                            <td>
                             {{ $value->idbarang }}
                            </td>
                            <td>
                             {{ $value->harga_satuan }}
                            </td>
                            <td>
                             {{ $value->jumlah }}
                            </td>
                            <td>
                             {{ $value->sub_total }}
                            </td>
                            <td class="d-flex">
                            <form action="{{ route('detail-pengadaan.destroy', $value->iddetail_pengadaan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Detail Pengadaan ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->iddetail_pengadaan }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->iddetail_pengadaan }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit Detail Pengadaan</h4>
                                                    <form class="forms-sample" action="{{ route('detail-pengadaan.update', $value->iddetail_pengadaan) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                       
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">ID Pengadaan</label>
                                                            <select name="id_pengadaan" class="form-control" id="exampleSelectGender">
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
                                                            <label for="exampleSelectGender">ID Barang</label>
                                                            <select name="id_barang" class="form-control" id="exampleSelectGender">
                                                                @foreach ( DB::table('view_barang')->get() as $values)
                                                                @if ( $values->idbarang == $value->idbarang )
                                                                    <option value="{{ $values->idbarang }}">{{ $values->idbarang }} -  {{ $values->nama }}</option>
                                                                @endif
                                                                @endforeach
                                                                @foreach ( DB::table('view_barang')->get() as $values)
                                                                @if ( $values->idbarang !== $value->idbarang )
                                                                    <option value="{{ $values->idbarang }}">{{ $values->idbarang }} -  {{ $values->nama }}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="exampleInputUsername1">Harga Satuan</label>
                                                        <input type="number" class="form-control" name="harga_satuan" Required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="exampleInputUsername1">Jumlah</label>
                                                        <input type="number" class="form-control" name="jumlah" Required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="exampleInputUsername1">Sub Total</label>
                                                        <input type="number" class="form-control" name="sub_total" Required>
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

                  <h4 class="card-title">Tambah Detail Pengadaan</h4>
                  <form class="forms-sample" action="{{ route('detail-pengadaan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleSelectGender">ID Pengadaan</label>
                        <select name="id_pengadaan" class="form-control" id="exampleSelectGender">
                        <option value=""></option>
                            @foreach ( DB::table('view_pengadaan')->get() as $value)
                                <option value="{{ $value->idpengadaan }}">{{ $value->idpengadaan }} - ID User ( {{ $value->user_iduser }} ) - ID Vendor ( {{ $value->vendor_idvendor }} ) - Status ( {{ $value->status }} )</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">ID Barang</label>
                        <select name="id_barang" class="form-control" id="exampleSelectGender">
                        <option value=""></option>
                            @foreach ( DB::table('view_barang')->get() as $value)
                                <option value="{{ $value->idbarang }}">{{ $value->idbarang }} -  {{ $value->nama }} - 
                                    @foreach( DB::table('view_satuan')->get() as $item)
                                        @if( $item->idsatuan == $value->idsatuan )
                                            {{ $item->nama_satuan }}
                                        @endif
                                    @endforeach
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Jumlah</label>
                      <input type="number" class="form-control" name="jumlah" Required>
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
