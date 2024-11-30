@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center ">
                <h4 class="card-title mb-0">Table Margin Penjualan</h4>
                <button type="button" class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target=".bd-example-modal-lg">+ Tambah</button>
            </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Margin Penjualan</th>
                        <th>ID User</th>
                        <th>Persen</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $TableMarginPenjualan as $value )
                         <tr>
                            <td>
                             {{ $value->idmargin_penjualan }}
                            </td>
                            <td>
                             {{ $value->iduser }}
                            </td>
                            <td>
                             {{ $value->persen }}
                            </td>
                            <td>
                             {{ $value->status }}
                            </td>
                            <td>
                             {{ $value->created_at }}
                            </td>
                            <td>
                             {{ $value->updated_at }}
                            </td>
                            <td class="d-flex">
                            <form action="{{ route('margin.destroy', $value->idmargin_penjualan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Margin Penjualan ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->idmargin_penjualan }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->idmargin_penjualan }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit Margin Penjualan</h4>
                                                    <form class="forms-sample" action="{{ route('margin.update', $value->idmargin_penjualan) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                       
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
                                                        <label for="exampleInputUsername1">Persen</label>
                                                        <input type="number" class="form-control" name="persen" Required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">Status</label>
                                                            <select name="status" class="form-control" id="exampleSelectGender">
                                                                <option value=""></option>
                                                                    <option value="1">1 - Aktif</option>
                                                                    <option value="0">0 - TIdak Aktif</option>
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

                  <h4 class="card-title">Tambah Margin Penjualan</h4>
                  <form class="forms-sample" action="{{ route('margin.store') }}" method="POST">
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
                      <label for="exampleInputUsername1">Persen</label>
                      <input type="number" class="form-control" name="persen" Required>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Status</label>
                        <select name="status" class="form-control" id="exampleSelectGender">
                            <option value=""></option>
                                <option value="1">1 - Aktif</option>
                                <option value="0">0 - TIdak Aktif</option>
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

