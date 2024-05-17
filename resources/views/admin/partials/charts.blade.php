@extends('layouts.layout_admin')
@section('body')
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (Annual)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div id="wrapper">

        <!-- Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">THỐNG KÊ</h1>
                    {{-- <p class="mb-4">Chart.js is a third party plugin that is used to generate the charts in this theme.
                    The charts below have been customized - for further customization options, please visit the <a
                        target="_blank" href="https://www.chartjs.org/docs/latest/">official Chart.js
                        documentation</a>.</p> --}}

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-8 col-lg-7">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h4 class="m-0 font-weight-bold text-dark">Doanh thu</h4>
                                    <select name="" class="select-css" id="doanhThu">
                                        <option value="day">Ngày</option>
                                        <option value="week">Tuần</option>
                                        <option value="month">Tháng</option>
                                        <option value="year">Năm</option>
                                    </select>
                                </div>

                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                    <hr>

                                </div>
                            </div>

                            <!-- Bar Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between">
                                    <h4 class="m-0 font-weight-bold text-dark">Số lượng đơn hàng</h4>
                                    <select name="" class="select-css" id="donHang">
                                        <option value="day">Ngày</option>
                                        <option value="week">Tuần</option>
                                        <option value="month">Tháng</option>
                                        <option value="year">Năm</option>
                                    </select>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    <hr>

                                </div>
                            </div>

                        </div>


                        <!-- Donut Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h4 class="m-0 font-weight-bold text-dark ">Tổng quan</h4>
                                </div>
                                <!-- Card Body -->

                                <div class="card-body ">
                                    <div class="h-100 ">
                                        <div class="d-flex gap-2 ">
                                            <p class="font-weight-bold">Sản phẩm </p>
                                            <p class="text-danger">: {{ $ProductQty }}</p>
                                        </div>
                                        <hr>
                                        <div class="d-flex gap-2 flex-column ">
                                            <p class="font-weight-bold">Sản phẩm bán chạy</p>
                                            <table border="" class="text-center">
                                                <thead>
                                                    <th class="font-weight-bold">STT</th>
                                                    <th class="font-weight-bold">Sản phẩm</th>
                                                    <th class="font-weight-bold"> Đã bán</th>
                                                </thead>
                                                <tbody>
                                                    @forelse ($ProductBestSeller as $index => $prd)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $prd->name }}</td>
                                                            <td class="text-danger">{{ $prd->Total }}</td>
                                                        </tr>
                                                    @empty
                                                        <p>Không có dữ liệu</p>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="d-flex gap-2 flex-column">
                                            <p class="font-weight-bold">Top khách hàng</p>
                                            <table border="" class="text-center">
                                                <thead >
                                                    <th>STT</th>
                                                    <th>Khách hàng</th>
                                                    <th>Đơn hàng</th>
                                                </thead>
                                                <tbody>
                                                    @forelse ($TopUser as $index => $prd)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $prd->user->name }}</td>
                                                            <td>{{ $prd->UserCount }}</td>
                                                        </tr>
                                                    @empty
                                                        <p>Không có dữ liệu</p>
                                                    @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- <canvas id="myPieChart"></canvas> --}}
                                    </div>
                                    <hr>

                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Loại sản phẩm</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <hr>

                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>


    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <style>
        .select-css {
	display: block;
	font-size: 16px;
	font-family: sans-serif;
	font-weight: 700;
	color: #444;
	line-height: 1.1;
	padding: .6em 1.4em .5em .8em;
	width: 100px;
	box-sizing: border-box;
	margin: 0;
	border: 1px solid #aaa;
	box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
	border-radius: .5em;
	-moz-appearance: none;
	-webkit-appearance: none;
	appearance: none;
	background-color: #fff;
	background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
	  linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
	background-repeat: no-repeat, repeat;
	background-position: right .7em top 50%, 0 0;
	background-size: .65em auto, 100%;
}
.select-css::-ms-expand {
	display: none;
}
.select-css:hover {
	border-color: #888;
}
.select-css:focus {
	border-color: #aaa;
	box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
	box-shadow: 0 0 0 3px -moz-mac-focusring;
	color: #222; 
	outline: none;
}
.select-css option {
	font-weight:normal;
}

    </style>
@endsection
