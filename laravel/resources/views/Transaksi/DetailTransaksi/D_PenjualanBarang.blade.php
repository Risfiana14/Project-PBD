@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center ">
                <h4 class="card-title mb-0">Detail Penjualan Barang</h4>
                <button type="button" class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target=".bd-example-modal-lg">+ Tambah</button>
            </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Detail Pengadaan</th>
                        <th>ID Penjualan</th>
                        <th>ID Barang</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                        <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableDetailPenjualan as $value )
                         <tr>
                            <td>
                             {{ $value->iddetail_penjualan }}
                            </td>
                            <td>
                             {{ $value->penjualan_idpenjualan }}
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
                             {{ $value->subtotal }}
                            </td>
                            <td class="d-flex">
                            <form action="{{ route('detail-penjualan.destroy', $value->iddetail_penjualan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Detail Penjualan ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->iddetail_penjualan }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->iddetail_penjualan }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit Detail Pengadaan</h4>
                                                    <form class="forms-sample" action="{{ route('detail-penjualan.update', $value->iddetail_penjualan) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')                                                      
                                                       
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">ID Penjualan</label>
                                                            <select name="id_penjualan" class="form-control" id="exampleSelectGender">
                                                            <option value=""></option>
                                                                @foreach ( DB::table('view_penjualan')->get() as $value)
                                                                    <option value="{{ $value->idpenjualan }}">{{ $value->idpenjualan }} - ID User ( {{ $value->iduser }} ) - ID Margin Penjualan ( {{ $value->idmargin_penjualan }} )</option>
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
                  <form class="forms-sample" action="{{ route('detail-penjualan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleSelectGender">ID Penjualan</label>
                        <select name="id_penjualan" class="form-control" id="exampleSelectGender">
                        <option value=""></option>
                            @foreach ( DB::table('view_penjualan')->get() as $value)
                                <option value="{{ $value->idpenjualan }}">{{ $value->idpenjualan }} - ID User ( {{ $value->iduser }} ) - ID Margin Penjualan ( {{ $value->idmargin_penjualan }} )</option>
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
@endsection
