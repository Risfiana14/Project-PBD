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
        <div class="d-flex justify-content-between align-items-center ">
            <h4 class="card-title mb-0">Table Retur</h4>
            <div class="d-flex align-items-center mt-2 mt-md-0">
                
                <button type="button" class="btn btn-info btn-rounded btn-sm me-2" data-toggle="modal" data-target=".bd-example-modal-lg">
                    + Tambah
                </button>
            
                <a class="ml-3" href="{{ route('detail-retur.index') }}">
                    <button type="button" class="btn btn-dark btn-rounded btn-sm">
                        Detail Retur
                    </button>
                </a>
            </div>
        </div>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                        <th>ID Retur</th>
                        <th>ID User</th>
                        <th>ID Penerimaan</th>
                        <th>Created At</th>
                        <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ( $TableRetur as $value )
                         <tr>
                            <td>
                             {{ $value->idretur }}
                            </td>
                            <td>
                             {{ $value->iduser }}
                            </td>
                            <td>
                             {{ $value->idpenerimaan }}
                            </td>
                            <td>
                             {{ $value->created_at }}
                            </td>
                            <td class="d-flex">
                            <button data-target=".bd-example-modal-lg-detail-{{ $value->idretur }}" data-toggle="modal" type="button" class="btn btn-secondary btn-sm">Detail</button>
                                <div class="modal fade bd-example-modal-lg-detail-{{ $value->idretur }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Detail Retur</h4>
                                                        <div class="table-responsive mt-3">                                                        
                                                            <div class="custom-table-container">
                                                                <table class="custom-table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>ID Detail Retur</th>
                                                                            <th>ID Detail Penerimaan</th>
                                                                            <th>Jumlah</th>
                                                                            <th>Alasan</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                    
                                                                            @foreach(DB::table('view_detail_retur')->where('idretur', $value->idretur)->get() as $item)
                                                                                <tr>
                                                                                    <td>{{ $item->iddetail_retur }}</td>
                                                                                    <td>{{ $item->iddetail_penerimaan }}</td>
                                                                                    <td>{{ $item->jumlah }}</td>
                                                                                    <td>{{ $item->alasan }}</td>
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
                                
                            <form action="{{ route('retur.destroy', $value->idretur) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Retur ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-3">Hapus</button>
                            </form>
                            <button data-target=".bd-example-modal-lg-{{ $value->idretur }}" data-toggle="modal" type="button" class="btn btn-success btn-sm ml-3">Edit</button>
                                <div class="modal fade bd-example-modal-lg-{{ $value->idretur }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="col-md-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                    <h4 class="card-title">Edit Retur</h4>
                                                    <form class="forms-sample" action="{{ route('retur.update', $value->idretur) }}" method="POST">
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
                                                            <label for="exampleSelectGender">ID Penerimaan</label>
                                                            <select name="idpenerimaan" class="form-control" id="exampleSelectGender">

                                                                @foreach ( DB::table('view_penerimaan')->get() as $values)
                                                                @if ( $values->idpenerimaan == $value->idpenerimaan)
                                                                    <option value="{{ $values->idpenerimaan }}">{{ $values->idpenerimaan }} - ID Pengadaan ( {{ $values->idpengadaan }} ) - ID User ( {{ $values->iduser }} ) - Status ( {{ $values->status }} )</option>
                                                                @endif
                                                                @endforeach
                                                                @foreach ( DB::table('view_penerimaan')->get() as $values)
                                                                @if ( $values->idpenerimaan !== $value->idpenerimaan)
                                                                    <option value="{{ $values->idpenerimaan }}">{{ $values->idpenerimaan }} - ID Pengadaan ( {{ $values->idpengadaan }} ) - ID User ( {{ $values->iduser }} ) - Status ( {{ $values->status }} )</option>
                                                                @endif
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
                  <h4 class="card-title">Tambah Retur</h4>
                  <form class="forms-sample" action="{{ route('retur.store') }}" method="POST">
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
                        <label for="exampleSelectGender">ID Penerimaan</label>
                        <select name="idpenerimaan" class="form-control" id="idPenerimaan">
                        <option value=""></option>
                            @foreach ( DB::table('view_penerimaan')->get() as $value)
                                <option value="{{ $value->idpenerimaan }}">{{ $value->idpenerimaan }} - ID Pengadaan ( {{ $value->idpengadaan }} ) - ID User ( {{ $value->iduser }} ) - Status ( {{ $value->status }} )</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="dynamicFields">
                        <div class="form-row dynamic-item">
                            <div class="form-group col-md-4">
                                <label for="idBarang">ID Barang</label>
                                <select name="idbarang[]" class="form-control idBarang" id="idBarang">
                                    <option value="">Pilih Barang</option>
                                    <!-- Barang akan dimuat di sini melalui AJAX -->
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="jumlah">Jumlah Barang yang di Retur</label>
                                <input type="number" class="form-control jumlah" name="jumlah[]" placeholder="Masukkan jumlah retur">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="alasan">Alasan</label>
                                <input type="text" class="form-control alasan" name="alasan[]" placeholder="Masukkan alasan retur">
                                <div class="d-flex mt-3 justify-content-end">
                                    <button type="button" class="btn btn-danger mr-2 remove-item"> - </button>
                                    <button type="button" class="btn btn-info add-item"> + </button>
                                </div>
                            </div>
                        </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
    // Menambahkan item baru
    $('#dynamicFields').on('click', '.add-item', function() {
        var newItem = $('.dynamic-item:first').clone(); // Menyalin elemen pertama
        newItem.find('input, select').val(''); // Mengosongkan nilai input dan select
        $('#dynamicFields').append(newItem); // Menambahkannya ke form
    });

    // Menghapus item
    $('#dynamicFields').on('click', '.remove-item', function() {
        if ($('.dynamic-item').length > 1) {
            $(this).closest('.dynamic-item').remove(); // Menghapus item jika lebih dari 1
        } else {
            alert('Tidak dapat menghapus semua item!');
        }
    });

    // Memuat barang berdasarkan ID Penerimaan
    $('#idPenerimaan').change(function() {
        var idpenerimaan = $(this).val(); // Ambil ID Penerimaan yang dipilih
        if (idpenerimaan) {
            $.ajax({
                url: '/get-barang-by-penerimaan/' + idpenerimaan, // Panggil route untuk mendapatkan barang
                type: 'GET',
                success: function(data) {
                    var options = '<option value="">Pilih Barang</option>';
                    $.each(data, function(index, item) {
                        options += `<option value="${item.idbarang}">${item.idbarang} - ${item.nama}</option>`;
                    });
                    $('#dynamicFields .idBarang').html(options); // Mengisi select dengan data barang
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ': ' + error);
                    alert('Terjadi kesalahan saat memuat data barang.');
                }
            });
        } else {
            $('#dynamicFields .idBarang').html('<option value="">Pilih Barang</option>'); // Reset select jika tidak ada ID Penerimaan
        }
    });

    // Handle when the barang ID is selected
    $('#dynamicFields').on('change', '.idBarang', function() {
        var selectedIdBarang = $(this).val(); // Get selected ID barang
        var jumlahInput = $(this).closest('.form-row').find('.jumlah'); // Get related jumlah input field
        
        if (selectedIdBarang) {
            // Call AJAX to get the available stock for this ID barang
            $.ajax({
                url: '/get-barang-count', // Update with your server endpoint
                type: 'GET',
                data: { idbarang: selectedIdBarang },
                success: function(response) {
                    if (response.status === 'success') {
                        // Update the placeholder with available stock
                        var availableStock = response.available_stock;
                        jumlahInput.attr('placeholder', 'Jumlah barang yang tersedia: ' + availableStock);
                    } else {
                        jumlahInput.attr('placeholder', 'Tidak ada data stok');
                    }
                },
                error: function() {
                    jumlahInput.attr('placeholder', 'Terjadi kesalahan');
                }
            });
        } else {
            jumlahInput.attr('placeholder', 'Masukkan jumlah retur');
        }
    });
});

</script>
@endsection