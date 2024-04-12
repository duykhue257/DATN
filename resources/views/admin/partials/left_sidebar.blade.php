{{-- @extends('layouts.layout_admin')

@section('') --}}

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">ClassicMan</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        {{-- <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li> --}}

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        {{-- <div class="sidebar-heading">
            Interface
        </div> --}}

        <!-- Nav Item - Pages Collapse Menu -->
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-folder"></i>
                <span>Danh mục sản phẩm</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header" data-toggle="collapse" data-target="#manageProduct" aria-expanded="true"
                        aria-controls="manageProduct">Quản lý sản phẩm </h6>
                    <div id="manageProduct" class="collapse" aria-labelledby="manageProduct" data-parent="#collapseTwo">
                        <a class="collapse-item" href="{{ route('product.index') }}">Hiển thị sản phẩm</a>
                        <a class="collapse-item" href="{{ route('productVariant.index') }}">Hiển thị biến thể</a>
                    </div>
                    <h6 class="collapse-header" data-toggle="collapse" data-target="#manageCategory"
                        aria-expanded="true" aria-controls="manageCategory">Quản lý loại hàng </h6>
                    <div id="manageCategory" class="collapse" aria-labelledby="manageCategory"
                        data-parent="#collapseTwo">
                        <a class="collapse-item" href="{{ route('category.index') }}">Loại sản phẩm</a>
                        <a class="collapse-item" href="{{ route('size.index') }}">Kích cỡ</a>
                        <a class="collapse-item" href="{{ route('color.index') }}">Màu sắc</a>
                    </div>
                </div>
            </div>
        </li> --}}

        <!-- Nav Item - product Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseproduct"
                aria-expanded="true" aria-controls="collapseproduct">
                <i class="fas fa-fw fa-folder"></i>
                <span>Quản lý sản phẩm</span>
            </a>
            
            <div id="collapseproduct" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('product.index') }}">Hiển thị sản phẩm</a>
                    {{-- <a class="collapse-item" href="{{ route('productVariant.index') }}">Hiển thị biến thể</a> --}}
                </div>

            </div>
        </li>
        <!-- Nav Item - categories Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecate"
                aria-expanded="true" aria-controls="collapsecate">
                <i class="fas fa-fw fa-folder"></i>
                <span>Quản lý loại hàng</span>
            </a>
            <div id="collapsecate" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('category.index') }}">Thể loại</a>
                    <a class="collapse-item" href="{{ route('size.index') }}">Kích cỡ</a>
                    <a class="collapse-item" href="{{ route('color.index') }}">Màu sắc</a>
                </div>

            </div>
        </li>


        <!-- Nav Item - users Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fa-solid fa-users"></i>
                <span>Tài khoản</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('listUser') }}">Danh sách user</a>
                    <a class="collapse-item" href="{{ route('listAdmin') }}">Danh sách admin</a>
                </div>

            </div>
        </li>

        <!-- Divider -->
        {{-- <hr class="sidebar-divider"> --}}

        {{-- <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div> --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#orderUtilies"
                aria-expanded="true" aria-controls="orderUtilies">
                <i class="fa-solid fa-basket-shopping"></i>
                <span>Đơn hàng</span>
            </a>
            <div id="orderUtilies" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('orderAdmin') }}">Danh sách đặt hàng</a>
                    {{-- <a class="collapse-item" href="{{ route('listAdmin') }}">Danh sách admin</a> --}}
                </div>

            </div>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#voucherUtilies"
                aria-expanded="true" aria-controls="voucherUtilies">
                <i class="fa-solid fa-basket-shopping"></i>
                <span>Mã Giảm Giá</span>
            </a>
            <div id="voucherUtilies" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('voucher.index') }}">Danh sách mã giảm giá</a>
                    {{-- <a class="collapse-item" href="{{ route('listAdmin') }}">Danh sách admin</a> --}}
                </div>

            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('chart') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item active">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->

            <!-- End of Topbar -->

            <!-- Begin Page Content -->

            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

</div>
