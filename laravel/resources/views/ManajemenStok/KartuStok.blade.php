@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center ">
                <h4 class="card-title mb-0">Table Kartu Stok</h4>
                <button type="button" class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target=".bd-example-modal-lg">+ Tambah</button>
            </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Kartu Stok</th>
                        <th>ID Barang</th>
                        <th>ID Transaksi</th>
                        <th>Jenis Transaksi</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Stok</th>
                        <th>Created At</th>
                        <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableKartuStok as $value )
                    <tr>
                            <td>
                             {{ $value->idkartu_stok }}
                            </td>
                            <td>
                             {{ $value->idbarang }}
                            </td>
                            <td>
                             {{ $value->idtransaksi }}
                            </td>
                            <td>
                             {{ $value->jenis_transaksi }}
                            </td>
                            <td>
                             {{ $value->masuk }}
                            </td>
                            <td>
                             {{ $value->keluar }}
                            </td>
                            <td>
                             {{ $value->stok }}
                            </td>
                            <td>
                             {{ $value->created_at }}
                            </td>
                            <td class="d-flex">
                            <form action="{{ route('kartustok.destroy', $value->idkartu_stok) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Kartu Stok ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->idkartu_stok }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->idkartu_stok }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit Penerimaan</h4>
                                                    <form class="forms-sample" action="{{ route('kartustok.update', $value->idkartu_stok) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                       
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">ID Barang</label>
                                                            <select name="id_barang" class="form-control" id="exampleSelectGender">
                                                                <option value=""></option>
                                                                @foreach ( DB::table('view_barang')->get() as $value)
                                                                    <option value="{{ $value->idbarang }}">{{ $value->idbarang }} - {{ $value->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="exampleInputUsername1">ID Transaksi</label>
                                                        <input type="text" class="form-control" name="id_transaksi" Required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">Jenis Transaksi</label>
                                                            <select name="jenis_transaksi" class="form-control" id="exampleSelectGender">
                                                                <option value=""></option>
                                                                    <option value="M">M - Masuk</option>
                                                                    <option value="K">K - Keluar</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="exampleInputUsername1">Masuk</label>
                                                        <input type="number" class="form-control" name="masuk" Required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="exampleInputUsername1">Keluar</label>
                                                        <input type="number" class="form-control" name="keluar" Required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="exampleInputUsername1">Stok</label>
                                                        <input type="number" class="form-control" name="stok" Required>
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
                  <h4 class="card-title">Tambah Kartu Stok</h4>
                  <form class="forms-sample" action="{{ route('kartustok.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleSelectGender">ID Barang</label>
                        <select name="id_barang" class="form-control" id="exampleSelectGender">
                            <option value=""></option>
                            @foreach ( DB::table('view_barang')->get() as $value)
                                <option value="{{ $value->idbarang }}">{{ $value->idbarang }} - {{ $value->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">ID Transaksi</label>
                      <input type="text" class="form-control" name="id_transaksi" Required>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Jenis Transaksi</label>
                        <select name="jenis_transaksi" class="form-control" id="exampleSelectGender">
                            <option value=""></option>
                                <option value="M">M - Masuk</option>
                                <option value="K">K - Keluar</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Masuk</label>
                      <input type="number" class="form-control" name="masuk" Required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Keluar</label>
                      <input type="number" class="form-control" name="keluar" Required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Stok</label>
                      <input type="number" class="form-control" name="stok" Required>
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