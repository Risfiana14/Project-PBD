@extends('index')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
        <div class="d-flex justify-content-between align-items-center ">
            <h4 class="card-title mb-0">Table Penjualan</h4>
            <div class="d-flex align-items-center mt-2 mt-md-0">
                
                <button type="button" class="btn btn-info btn-rounded btn-sm me-2" data-toggle="modal" data-target=".bd-example-modal-lg">
                    + Tambah
                </button>
            
                <a class="ml-3" href="{{ route('detail-penjualan.index') }}">
                    <button type="button" class="btn btn-dark btn-rounded btn-sm">
                        Detail Penjualan
                    </button>
                </a>
            </div>
        </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Penjualan</th>
                        <th>ID User</th>
                        <th>ID Margin Penjualan</th>
                        <th>Sub Total Nilai</th>
                        <th>PPN</th>
                        <th>Total Nilai</th>
                        <th>Created At</th>
                        <th></th>
                    
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TablePenjualan as $value )
                         <tr>
                            <td>
                             {{ $value->idpenjualan }}
                            </td>
                            <td>
                             {{ $value->iduser }}
                            </td>
                            <td>
                             {{ $value->idmargin_penjualan }}
                            </td>
                            <td>
                             {{ $value->subtotal_nilai }}
                            </td>
                            <td>
                             {{ $value->ppn }}
                            </td>
                            <td>
                             {{ $value->total_nilai }}
                            </td>
                            <td>
                             {{ $value->created_at }}
                            </td>
                            <td class="d-flex">
                            <form action="{{ route('penjualan.destroy', $value->idpenjualan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Penjualan ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->idpenjualan }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->idpenjualan }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit Penjualan</h4>
                                                    <form class="forms-sample" action="{{ route('penjualan.update', $value->idpenjualan) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                       
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">ID User</label>
                                                            <select name="iduser" class="form-control" id="exampleSelectGender">

                                                                    @foreach ( DB::table('view_user')->get() as $values)
                                                                        @if ( $values->id == $value->iduser )
                                                                        <option value="{{ $values->id }}">{{ $values->id }} - {{ $values->name }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                    @foreach ( DB::table('view_user')->get() as $values)
                                                                        @if ( $values->id !== $value->iduser )
                                                                        <option value="{{ $values->id }}">{{ $values->id }} - {{ $values->name }}</option>
                                                                        @endif
                                                                    @endforeach

                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">ID Margin Penjualan</label>
                                                            <select name="idvendor" class="form-control" id="exampleSelectGender">
                                                                <option value=""></option>

                                                                @foreach ( DB::table('view_margin_penjualan')->get() as $values)                             
                                                                    <option value="{{ $values->idmargin_penjualan }}">{{ $values->idmargin_penjualan }} - ID User ( {{ $values->iduser }} ) - Persen ( {{ $values->persen }} ) - Status ( {{ $values->status }} )</option>                              
                                                                @endforeach

                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Sub Total Nilai</label>
                                                            <input type="number" class="form-control" name="sub_total_nilai" Required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">PPN</label>
                                                            <input type="number" class="form-control" name="ppn" Required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Total Nilai</label>
                                                            <input type="number" class="form-control" name="total_nilai" Required>
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
                  <h4 class="card-title">Tambah Penjualan</h4>
                  <form class="forms-sample" action="{{ route('penjualan.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="exampleSelectGender">ID User</label>
                        <select name="iduser" class="form-control" id="exampleSelectGender">
                            <option value=""></option>
                            
                            @foreach ( DB::table('view_user')->get() as $values)                             
                                <option value="{{ $values->id }}">{{ $values->id }} - {{ $values->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectGender">ID Margin Penjualan</label>
                        <select name="idvendor" class="form-control" id="exampleSelectGender">
                            <option value=""></option>

                            @foreach ( DB::table('view_margin_penjualan')->get() as $values)                             
                                <option value="{{ $values->idmargin_penjualan }}">{{ $values->idmargin_penjualan }} - ID User ( {{ $values->iduser }} ) - Persen ( {{ $values->persen }} ) - Status ( {{ $values->status }} )</option>                              
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Sub Total Nilai</label>
                        <input type="number" class="form-control" name="sub_total_nilai" Required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">PPN</label>
                        <input type="number" class="form-control" name="ppn" Required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Total Nilai</label>
                        <input type="number" class="form-control" name="total_nilai" Required>
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