@extends('index')

@section('content')
    <style>
        .open-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 20px;
        }

        .open-button:hover {
            background-color: #0056b3;
        }

        .modal {
            display: none; 
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8); 
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal img {
            max-width: 100%;  
            max-height: 100%; 
            object-fit: contain; 
        }

        .close {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 30px;
            color: #fff;
            cursor: pointer;
            background-color: rgba(0,0,0,0.5); 
            border-radius: 50%;
            padding: 10px;
        }

        .close:hover {
            color: #ff0000;
            background-color: rgba(0,0,0,0.7);
        }
    </style>
            
    <div class="col-md-12 grid-margin">
        <div class="row justify-content-center">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0 text-center">
            <h3 class="font-weight-bold">Welcome R</h3>
            <h6 class="font-weight-normal mb-0">Project Praktikum Basis Data 2024 ! <span class="text-primary"><button class="open-button" id="openModalBtn">Lihat Desain Tabel</button></span></h6>
            </div>
        </div>
    </div>


    <div class="col-md-6 grid-margin stretch-card">
    <div class="card tale-bg">
        <div class="card-people mt-auto">
        <img src="images/dashboard/people.svg" alt="people">
        <div class="weather-info">
            <div class="d-flex">
            <div>
                <h2 class="mb-0 font-weight-normal">
                <i class="icon-sun mr-2"></i>31<sup>C</sup>
                </h2>
            </div>
            <div class="ml-2">
                <h4 class="location font-weight-normal">Gubeng</h4>
                <h6 class="font-weight-normal">Surabaya</h6>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>


    <div class="col-md-6 grid-margin transparent">
        <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
            <div class="card-body">
                <p class="mb-4">Total Pengadaan Barang</p>
                <p class="fs-30 mb-2">{{ $totalPengadaan }}</p>
                <p>0 Pending - 1 Approved <br> 0 Completed - 1 Cancelled</p>
            </div>
            </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
            <div class="card-body">
                <p class="mb-4">Total Penerimaan Barang</p>
                <p class="fs-30 mb-2">{{ $totalPenerimaan }}</p>
                <p>1 Pending - 0 Approved <br> 1 Completed - 0 Cancelled</p>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
            <div class="card-body">
                <p class="mb-4">Total Penjualan Barang</p>
                <p class="fs-30 mb-2">{{ $totalPenjualan }}</p>
                
            </div>
            </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
            <div class="card-body">
                <p class="mb-4">Total Retur Barang</p>
                <p class="fs-30 mb-2">{{ $totalRetur }}</p>
                
            </div>
            </div>
        </div>
        </div>
    </div>


    <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
        <div class="card-body">
            <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                    <div class="ml-xl-4 mt-3">
                        <h1 class="text-primary">5</h1>
                        <h3 class="font-weight-500 mb-xl-4 text-primary">Master Data</h3>
                        <p class="mb-2 mb-xl-0">Tabel yang digunakan untuk menyimpan data dasar atau data utama dalam suatu sistem. </p>
                    </div>  
                    </div>
                    <div class="col-md-12 col-xl-9">
                    <div class="row">
                        <div class="col-md-6 border-right">
                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                            <table class="table table-borderless report-table">
                            <tr>
                                <td class="text-muted">Barang</td>
                                <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" 
                                        style="width: {{ $totalBarang }}%" 
                                        aria-valuenow="{{ $totalBarang }}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="20">
                                    </div>
                                    </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">{{ $totalBarang }}</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Vendor</td>
                                <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-warning" role="progressbar" 
                                        style="width: {{ $totalVendor }}%" 
                                        aria-valuenow="{{ $totalVendor }}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="20">
                                    </div>
                                    </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">{{ $totalVendor }}</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">User</td>
                                <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-danger" role="progressbar" 
                                        style="width: {{ $totalUser }}%" 
                                        aria-valuenow="{{ $totalUser }}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="20">
                                    </div>
                                    </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">{{ $totalUser }}</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Satuan</td>
                                <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-dark" role="progressbar" 
                                        style="width: {{ $totalSatuan }}%" 
                                        aria-valuenow="{{ $totalSatuan }}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="20">
                                    </div>
                                    </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">{{ $totalSatuan }}</h5></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Role</td>
                                <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-success" role="progressbar" 
                                        style="width: {{ $totalRole }}%" 
                                        aria-valuenow="{{ $totalRole }}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="20">
                                    </div>
                                    </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">{{ $totalRole }}</h5></td>
                            </tr>

                            
                            </table>
                        </div>
                        </div>
                        <div class="col-md-6 mt-3">
                        <canvas style="width: 50%; margin: auto;;" id="myPieChart1"></canvas>   
                        <div id="north-america-legend"></div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>


    <div class="col-md-12 grid-margin stretch-card">
        <div class="card position-relative">
        <div class="card-body">
            <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <div class="row">
                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                    <div class="ml-xl-4 mt-3">
                
                        <h1 class="text-primary">4</h1>
                        <h3 class="font-weight-500 mb-xl-4 text-primary">Detail Transaksi</h3>
                        <p class="mb-2 mb-xl-0">Jumlah tabel yang berisikan detail pada tabel transaksi</p>
                    </div>  
                    </div>
                    <div class="col-md-12 col-xl-9">
                    <div class="row">
                        <div class="col-md-6 border-right">
                        <div class="table-responsive mb-3 mb-md-0 mt-3">
                            <table class="table table-borderless report-table">
                            <tr>
                                <td class="text-muted">Detail Pengadaan Barang</td>
                                <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-primary" role="progressbar" 
                                        style="width: {{ $totalDetailPengadaan }}%" 
                                        aria-valuenow="{{ $totalDetailPengadaan }}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="20">
                                    </div>
                                    </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">{{ $totalDetailPengadaan }}</h5></td>
                            </tr>

                                <tr>
                                <td class="text-muted">Detail Penerimaan Barang</td>
                                <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-warning" role="progressbar" 
                                        style="width: {{ $totalDetailPenerimaan }}%" 
                                        aria-valuenow="{{ $totalDetailPenerimaan }}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="20">
                                    </div>
                                    </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">{{ $totalDetailPenerimaan }}</h5></td>
                                </tr>

                                <tr>
                                <td class="text-muted">Detail Penjualan Barang</td>
                                <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-danger" role="progressbar" 
                                        style="width: {{ $totalDetailPenjualan }}%" 
                                        aria-valuenow="{{ $totalDetailPenjualan }}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="20">
                                    </div>
                                    </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">{{ $totalDetailPenjualan }}</h5></td>
                                </tr>

                                <tr>
                                <td class="text-muted">Detail Retur Barang</td>
                                <td class="w-100 px-0">
                                    <div class="progress progress-md mx-4">
                                    <div class="progress-bar bg-info" role="progressbar" 
                                        style="width: {{ $totalDetailRetur }}%" 
                                        aria-valuenow="{{ $totalDetailRetur }}" 
                                        aria-valuemin="0" 
                                        aria-valuemax="20">
                                    </div>
                                    </div>
                                </td>
                                <td><h5 class="font-weight-bold mb-0">{{ $totalDetailRetur }}</h5></td>
                                </tr>
                            </table>
                        </div>
                        </div>
                        <div class="col-md-6 mt-3">
                        <canvas style="width: 50%; margin: auto;;" id="myPieChart"></canvas>       
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>

    

    
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie', 
            data: {
                labels: @json($data['labels']), 
                datasets: [{
                    data: @json($data['data']), 
                    backgroundColor: [
                        '#007bff', 
                        '#ffc107', 
                        '#dc3545', 
                        '#17a2b8'  
                    ], 
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom' 
                    }
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myPieChart1').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie', 
            data: {
                labels: @json($data1['labels']), 
                datasets: [{
                    data: @json($data1['data']), 
                    backgroundColor: [
                        '#007bff',   
                        '#ffc107',   
                        '#dc3545',  
                        '#000000',   
                        '#28a745'
                    ], 
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom' 
                    }
                }
            }
        });
    </script>
    <script>
        var modal = document.getElementById('imageModal');
        var openModalBtn = document.getElementById('openModalBtn');
        var closeModalBtn = document.getElementById('closeModalBtn');
        openModalBtn.onclick = function() {
            modal.style.display = 'flex';
        }
        closeModalBtn.onclick = function() {
            modal.style.display = 'none';
        }
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
@endsection