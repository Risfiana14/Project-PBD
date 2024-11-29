@extends('index')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center ">
                <h4 class="card-title mb-0">Table User</h4>
                <button type="button" class="btn btn-info btn-rounded btn-fw" data-toggle="modal" data-target=".bd-example-modal-lg">+ Tambah</button>
            </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID User</th>
                    <th>ID Role</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                   
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableUser as $value )
                    <tr>
                            <td>
                             {{ $value->id }}
                            </td>
                            <td> {{ $value->role_id }} </td>
                            <td>
                             {{ $value->name }}
                            </td>
                            <td>
                             {{ $value->email }}
                            </td>
                            <td class="d-flex">
                            <form action="{{ route('user.destroy', $value->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus User {{ $value->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->id }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit User</h4>
                                                    <form class="forms-sample" action="{{ route('user.update', $value->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Name</label>
                                                            <input value="{{ $value->name }}" type="text" class="form-control" name="name" Required>
                                                            </div>
                                                            <div class="form-group">
                                                            <label for="exampleInputUsername1">Email</label>
                                                            <input value="{{ $value->email }}" type="email" class="form-control" name="email" Required>
                                                            </div>
                                                            <div class="form-group">
                                                            <label for="exampleInputUsername1">Password</label>
                                                            <input type="password" class="form-control" name="password" Required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleSelectGender">ID Role</label>
                                                                    <select name="idrole" class="form-control" id="exampleSelectGender">
                                                                    @foreach ( DB::table('view_role')->get() as $value)
                                                                        <option value="{{ $value->idrole }}">{{ $value->idrole }} - {{ $value->nama_role }}</option>
                                                                    @endforeach
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
                  <h4 class="card-title">Tambah User</h4>
                  <form class="forms-sample" action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" name="name" Required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Email</label>
                      <input type="email" class="form-control" name="email" Required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Password</label>
                      <input type="password" class="form-control" name="password" Required>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">ID Role</label>
                            <select name="idrole" class="form-control" id="exampleSelectGender">
                            @foreach ( DB::table('view_role')->get() as $value)
                                <option value="{{ $value->idrole }}">{{ $value->idrole }} - {{ $value->nama_role }}</option>
                            @endforeach
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