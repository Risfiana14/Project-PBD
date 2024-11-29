@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center ">
                <h4 class="card-title mb-0">Table Vendor</h4>
                <button type="button" class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target=".bd-example-modal-lg">+ Tambah</button>
            </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                  <th>ID Vendor</th>
                  <th>Nama Vendor</th>
                  <th>Badan Hukum</th>
                  <th>Status</th>
                  <th></th>
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
                            <td class="d-flex">
                            <form action="{{ route('vendor.destroy', $value->idvendor) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Vendor {{ $value->nama_vendor }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->idvendor }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->idvendor }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit Vendor</h4>
                                                    <form class="forms-sample" action="{{ route('vendor.update', $value->idvendor) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                        <label for="exampleInputUsername1">Nama Vendor</label>
                                                        <input value="{{ $value->nama_vendor }}" type="text" class="form-control" name="nama_vendor" Required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">Badan Hukum</label>
                                                                <select name="badan_hukum" class="form-control" id="exampleSelectGender">
                                                                <option value="P">P - Perseroan Terbatas (PT)</option>
                                                                <option value="C">C - Commanditaire Vennootschap (CV)</option>
                                                                <option value="F">F - Firma</option>
                                                                <option value="K">K - Koperasi</option>
                                                                <option value="B">B - Badan Usaha Milik Negara (BUMN)</option>
                                                                <option value="L">L - Lainnya</option>
                                                                </select>
                                                            </div>
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">Status</label>
                                                                <select name="status" class="form-control" id="exampleSelectGender">
                                                                <option value="1">1 - Aktif</option>
                                                                <option value="0">0 - Non-Aktif</option>
                                                                <option value="2">2 - Dalam Peninjauan</option>
                                                                <option value="3">3 - Diblokir (Tidak Dapat Digunakan)</option>
                                                                <option value="4">4 - Sementara Tidak Aktif</option>
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
                  <h4 class="card-title">Tambah Vendor</h4>
                  <form class="forms-sample" action="{{ route('vendor.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Vendor</label>
                      <input type="text" class="form-control" name="nama_vendor" Required>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Badan Hukum</label>
                            <select name="badan_hukum" class="form-control" id="exampleSelectGender">
                            <option value="P">P - Perseroan Terbatas (PT)</option>
                            <option value="C">C - Commanditaire Vennootschap (CV)</option>
                            <option value="F">F - Firma</option>
                            <option value="K">K - Koperasi</option>
                            <option value="B">B - Badan Usaha Milik Negara (BUMN)</option>
                            <option value="L">L - Lainnya</option>
                            </select>
                        </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Status</label>
                            <select name="status" class="form-control" id="exampleSelectGender">
                            <option value="1">1 - Aktif</option>
                            <option value="0">0 - Non-Aktif</option>
                            <option value="2">2 - Dalam Peninjauan</option>
                            <option value="3">3 - Diblokir (Tidak Dapat Digunakan)</option>
                            <option value="4">4 - Sementara Tidak Aktif</option>
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