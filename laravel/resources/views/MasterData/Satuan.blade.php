@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center ">
                <h4 class="card-title mb-0">Table Satuan</h4>
                <button type="button" class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target=".bd-example-modal-lg">+ Tambah</button>
            </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Satuan</th>
                        <th>Nama Satuan</th>
                        <th>Status</th>
                        <th></th>

                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableSatuan as $value )
                    <tr>
                            <td>
                             {{ $value->idsatuan }}
                            </td>
                            <td>
                             {{ $value->nama_satuan }}
                            </td>
                            <td>
                             {{ $value->status }}
                            </td>
                            <td class="d-flex">
                            <form action="{{ route('satuan.destroy', $value->idsatuan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Satuan {{ $value->nama_satuan }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->idsatuan }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->idsatuan }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit Satuan</h4>
                                                    <form class="forms-sample" action="{{ route('satuan.update', $value->idsatuan) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Nama Satuan</label>
                                                            <input type="text" class="form-control" value="{{ $value->nama_satuan }}" name="nama_satuan" Required>
                                                        </div>
                                                        <div class="form-group">
                                                        <label for="exampleSelectGender">Status</label>
                                                            <select name="status" class="form-control" id="exampleSelectGender">
                                                            <option value="1">Aktif</option>
                                                            <option value="0">Non-aktif</option>
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
                  <h4 class="card-title">Tambah Satuan</h4>
                  <form class="forms-sample" action="{{ route('satuan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Nama Satuan</label>
                      <input type="text" class="form-control" name="nama_satuan" Required>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Status</label>
                            <select name="status" class="form-control" id="exampleSelectGender">
                            <option value="1">Aktif</option>
                            <option value="0">Non-aktif</option>
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