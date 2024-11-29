@extends('index')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center ">
                <h4 class="card-title mb-0">Table Barang</h4>
                <button type="button" class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target=".bd-example-modal-lg">+ Tambah</button>
            </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Barang</th>
                        <th>ID Satuan</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Harga</th>
                        <th></th>
                    
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableBarang as $value )
                        <tr>
                            <td>
                             {{ $value->idbarang }}
                            </td>
                            <td>
                             {{ $value->idsatuan }}
                            </td>
                            <td>
                             {{ $value->jenis }}
                            </td>
                            <td>
                             {{ $value->nama }}
                            </td>
                            <td>
                             {{ $value->status }}
                            </td>
                            <td>
                             {{ $value->harga }}
                            </td>
                            <td class="d-flex">
                            <form action="{{ route('barang.destroy', $value->idbarang) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Barang {{ $value->nama }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->idbarang }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->idbarang }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit Barang</h4>
                                                    <form class="forms-sample" action="{{ route('barang.update', $value->idbarang) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Nama Barang</label>
                                                            <input value="{{ $value->nama }}" type="text" class="form-control" name="nama" Required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">ID Satuan</label>
                                                                <select name="idsatuan" class="form-control" id="exampleSelectGender">
                                                                    @foreach ( DB::table('view_satuan')->get() as $value)
                                                                        <option value="{{ $value->idsatuan }}">{{ $value->idsatuan }} - {{ $value->nama_satuan }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">Jenis</label>
                                                                <select name="jenis" class="form-control" id="exampleSelectGender">
                                                                        <option value="A">A - Barang Aktif</option>
                                                                        <option value="B">B - Barang Bekas</option>
                                                                        <option value="C">C - Barang Konsumsi</option>
                                                                        <option value="M">M - Barang Mentah</option>
                                                                        <option value="P">P - Barang Produksi</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">Status</label>
                                                                <select name="status" class="form-control" id="exampleSelectGender">
                                                                        <option value="1">1 - Tersedia</option>
                                                                        <option value="0">0 - Tidak Tersedia (Habis)</option>
                                                                        <option value="2">2 - Dalam Proses Pengadaan</option>
                                                                        <option value="3">3 - Tidak Dijual</option>
                                                                        <option value="4">4 - Tidak Aktif (Tidak Digunakan)</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                            <label for="exampleInputUsername1">Harga</label>
                                                            <input type="number" class="form-control" name="harga" Required>
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
                  <h4 class="card-title">Tambah Barang</h4>
                  <form class="forms-sample" action="{{ route('barang.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Barang</label>
                      <input type="text" class="form-control" name="nama" Required>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">ID Satuan</label>
                        <select name="idsatuan" class="form-control" id="exampleSelectGender">
                            @foreach ( DB::table('view_satuan')->get() as $value)
                                <option value="{{ $value->idsatuan }}">{{ $value->idsatuan }} - {{ $value->nama_satuan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Jenis</label>
                        <select name="jenis" class="form-control" id="exampleSelectGender">
                                <option value="A">A - Barang Aktif</option>
                                <option value="B">B - Barang Bekas</option>
                                <option value="C">C - Barang Konsumsi</option>
                                <option value="M">M - Barang Mentah</option>
                                <option value="P">P - Barang Produksi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Status</label>
                        <select name="status" class="form-control" id="exampleSelectGender">
                                <option value="1">1 - Tersedia</option>
                                <option value="0">0 - Tidak Tersedia (Habis)</option>
                                <option value="2">2 - Dalam Proses Pengadaan</option>
                                <option value="3">3 - Tidak Dijual</option>
                                <option value="4">4 - Tidak Aktif (Tidak Digunakan)</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Harga</label>
                      <input type="number" class="form-control" name="harga" Required>
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