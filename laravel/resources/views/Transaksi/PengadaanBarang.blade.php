@extends('index')

@section('content')
<style>
    .custom-table-container {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        font-size: 14px;
        color: #333;
    }
    .custom-table thead tr {
        background-color: #4CAF50;
        color: #fff;
        text-align: left;
    }
    .custom-table thead th {
        padding: 12px 15px;
        border-bottom: 2px solid #ddd;
        color: #000; 
    }
    .custom-table tbody tr {
        border-bottom: 1px solid #ddd;
        transition: background-color 0.2s ease;
    }
    .custom-table tbody tr:nth-child(odd) {
        background-color: #f2f2f2;
    }
    .custom-table tbody tr:hover {
        background-color: #dff0d8;
    }
    .custom-table tbody td {
        padding: 12px 15px;
        text-align: left;
    }
    .custom-table tbody td:first-child,
    .custom-table thead th:first-child {
        font-weight: bold;
    }
@foreach( DB::table('view_detail_pengadaan')->get() as $item)
    .custom-table .hover-id-{{ $item->iddetail_pengadaan }} {
        position: relative;
    }

    .custom-table .hover-id-{{ $item->iddetail_pengadaan }}:hover .tooltip-text-{{ $item->iddetail_pengadaan }} {
        visibility: visible;
        opacity: 1;
        transform: translateX(10px); 
    }

    .tooltip-text-{{ $item->iddetail_pengadaan }} {
        visibility: hidden;
        position: absolute;
        left: 10%;
        top: 20%;
        background-color: #4CAF50;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
        transition: visibility 0.3s, opacity 0.3s, transform 0.3s;
        opacity: 0;
        white-space: nowrap;
    }
@endforeach
</style>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <h4 class="card-title mb-0">Table Pengadaan</h4>
                <div class="d-flex align-items-center mt-2 mt-md-0">
                
                    <button type="button" class="btn btn-info btn-rounded btn-sm me-2" data-toggle="modal" data-target=".bd-example-modal-lg">
                        + Tambah
                    </button>
                
                    <a class="ml-3" href="{{ route('detail-pengadaan.index') }}">
                        <button type="button" class="btn btn-dark btn-rounded btn-sm">
                            Detail Pengadaan
                        </button>
                    </a>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Pengadaan</th>
                            <th>ID User</th>
                            <th>ID Vendor</th>
                            <th>Sub Total Nilai</th>
                            <th>PPN</th>
                            <th>Total Nilai</th>
                            <th>Status</th>
                            <th>Timestamp</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $TablePengadaan as $value )
                            <tr>
                                <td>{{ $value->idpengadaan }}</td>
                                <td>{{ $value->user_iduser }}</td>
                                <td>{{ $value->vendor_idvendor }}</td>
                                <td>{{ $value->subtotal_nilai }}</td>
                                <td>{{ $value->ppn }}</td>
                                <td>{{ $value->total_nilai }}</td>
                                <td>{{ $value->status }}</td>
                                <td>{{ $value->timestamp }}</td>
                                <td class="d-flex">
                            
                                    <button data-target=".bd-example-modal-lg-detail-{{ $value->idpengadaan }}" data-toggle="modal" type="button" class="btn btn-secondary btn-sm">Detail</button>
                                        <div class="modal fade bd-example-modal-lg-detail-{{ $value->idpengadaan }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="col-md-12 grid-margin stretch-card">
                                                        <div class="card">
                                                            <div class="card-body">
                                                            <h4 class="card-title">Detail Pengadaan</h4>
                                                                <div class="table-responsive mt-3">                                                        
                                                                    <div class="custom-table-container">
                                                                        <table class="custom-table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>ID Detail Pengadaan</th>
                                                                                    <th>ID Barang</th>
                                                                                    <th>Harga Satuan</th>
                                                                                    <th>Jumlah</th>
                                                                                    <th>Sub Total</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                            
                                                                                    @foreach(DB::table('view_detail_pengadaan')->where('idpengadaan', $value->idpengadaan)->get() as $item)
                                                                                        <tr>
                                                                                            <td>{{ $item->iddetail_pengadaan }}</td>
                                                                                            <td class="hover-id-{{ $item->iddetail_pengadaan }}" data-name="Nama Barang 1">
                                                                                                <span class="tooltip-text">{{ $item->idbarang }}</span>
                                                                                            </td>
                                                                                            <td>{{ $item->harga_satuan }}</td>
                                                                                            <td>{{ $item->jumlah }}</td>
                                                                                            <td>{{ $item->sub_total }}</td>
                                                                                        </tr>
                                                                                    @endforeach
                                                            
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <form action="{{ route('pengadaan.destroy', $value->idpengadaan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Pengadaan ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ml-3">Hapus</button>
                                    </form>
                                    
                                    <button data-target=".bd-example-modal-lg-{{ $value->idpengadaan }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                        <div class="modal fade bd-example-modal-lg-{{ $value->idpengadaan }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="col-md-12 grid-margin stretch-card">
                                                        <div class="card">
                                                            <div class="card-body">
                                                            <h4 class="card-title">Edit Pengadaan</h4>
                                                            <form class="forms-sample" action="{{ route('pengadaan.update', $value->idpengadaan) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                            
                                                                <div class="form-group">
                                                                    <label for="exampleSelectGender">ID User</label>
                                                                    <select name="iduser" class="form-control" id="exampleSelectGender">

                                                                            @foreach ( DB::table('view_user')->get() as $values)
                                                                                @if ( $values->id == $value->user_iduser )
                                                                                <option value="{{ $values->id }}">{{ $values->id }} - {{ $values->name }}</option>
                                                                                @endif
                                                                            @endforeach
                                                                            @foreach ( DB::table('view_user')->get() as $values)
                                                                                @if ( $values->id !== $value->user_iduser )
                                                                                <option value="{{ $values->id }}">{{ $values->id }} - {{ $values->name }}</option>
                                                                                @endif
                                                                            @endforeach

                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleSelectGender">ID Vendor</label>
                                                                    <select name="idvendor" class="form-control" id="exampleSelectGender">

                                                                            @foreach ( DB::table('view_vendor')->get() as $values )
                                                                                @if ( $values->idvendor == $value->vendor_idvendor )
                                                                                <option value="{{ $values->idvendor }}">{{ $values->idvendor }} - Nama Vendor ( {{ $values->nama_vendor }} ) - Badan Hukum ( {{ $values->badan_hukum }} ) - Status ( {{ $values->status }} )</option>
                                                                                @endif
                                                                            @endforeach
                                                                            @foreach ( DB::table('view_vendor')->get() as $values )
                                                                                @if ( $values->idvendor !== $value->vendor_idvendor )
                                                                            <option value="{{ $values->idvendor }}">{{ $values->idvendor }} - Nama Vendor ( {{ $values->nama_vendor }} ) - Badan Hukum ( {{ $values->badan_hukum }} ) - Status ( {{ $values->status }} )</option>
                                                                                @endif
                                                                            @endforeach

                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1">Sub Total Nilai</label>
                                                                    <input value="{{ $value->subtotal_nilai }}" type="number" class="form-control" name="sub_total_nilai" Required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1">PPN</label>
                                                                    <input value="{{ $value->ppn }}" type="number" class="form-control" name="ppn" Required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1">Total Nilai</label>
                                                                    <input value="{{ $value->total_nilai }}"  type="number" class="form-control" name="total_nilai" Required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleSelectGender">Status</label>
                                                                    <select name="status" class="form-control" id="exampleSelectGender">
                                                                    <option value=""></option>
                                                                            <option value="P">P - Pending</option>
                                                                            <option value="A">A - Approved</option>
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
                  <h4 class="card-title">Tambah Pengadaan</h4>

                  <form class="forms-sample" action="{{ route('pengadaan.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="exampleSelectGender">ID User</label>
                        <select name="iduser" class="form-control" id="exampleSelectGender">
                            <option value=""></option>
                            @foreach (DB::table('view_user')->get() as $values)
                                <option value="{{ $values->id }}">{{ $values->id }} - {{ $values->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectGender">ID Vendor</label>
                        <select name="idvendor" class="form-control" id="exampleSelectGender">
                            <option value=""></option>
                            @foreach (DB::table('view_vendor')->get() as $values)
                                <option value="{{ $values->idvendor }}">{{ $values->idvendor }} - Nama Vendor ( {{ $values->nama_vendor }} ) - Badan Hukum ( {{ $values->badan_hukum }} ) - Status ( {{ $values->status }} )</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelectGender">Status</label>
                        <select name="status" class="form-control" id="exampleSelectGender">
                            <option value=""></option>
                            <option value="P">P - Pending</option>
                            <option value="A">A - Approved</option>
                        </select>
                    </div>

                    <div id="dynamicFields">
                        <div class="form-row dynamic-item">
                            <div class="form-group col-md-6">
                                <label for="idBarang">ID Barang</label>
                                <select name="idbarang[]" class="form-control idBarang">
                                    <option value=""></option>
                                    @foreach (DB::table('view_barang')->get() as $values)
                                        <option value="{{ $values->idbarang }}">{{ $values->idbarang }} - Nama Barang ( {{ $values->nama }} ) -
                                            @foreach (DB::table('view_satuan')->get() as $item)
                                                @if ($item->idsatuan == $values->idsatuan)
                                                    Satuan ( {{ $item->nama_satuan }} )
                                                @endif
                                            @endforeach
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="jumlah">Jumlah Pengadaan</label>
                                <input type="number" class="form-control jumlah" name="jumlah[]">
                                <div class="d-flex mt-3 justify-content-end">
                                    <button type="button" class="btn btn-danger mr-2 remove-item"> - </button>
                                    <button type="button" class="btn btn-info add-item"> + </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2 mt-3">Submit</button>
                    <button type="button" data-dismiss="modal" class="btn btn-light mt-3">Cancel</button>
                </form>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const dynamicFields = document.getElementById('dynamicFields');

                        dynamicFields.addEventListener('click', function (event) {
                            if (event.target.classList.contains('add-item')) {
                                const newItem = document.querySelector('.dynamic-item').cloneNode(true);
                                newItem.querySelectorAll('input, select').forEach(element => {
                                    element.value = '';
                                });
                                dynamicFields.appendChild(newItem);
                            }

                            if (event.target.classList.contains('remove-item')) {
                                const items = document.querySelectorAll('.dynamic-item');
                                if (items.length > 1) {
                                    event.target.closest('.dynamic-item').remove();
                                } else {
                                    alert('Tidak dapat menghapus semua item!');
                                }
                            }
                        });
                    });
                </script>



                </div>
              </div>
            </div>
            </div>
        </div>
    </div>
@endsection