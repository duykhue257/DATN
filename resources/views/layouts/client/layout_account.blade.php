@extends('layouts.client.layout_base')
@section('title', 'Thông tin tài khoản')
@section('main')

    <section class="shop spad" style="padding-top: 35px;">
        <div class="container">
            <div class="breadcrumb__links mb-4">
                <a href="/home"><i class="fa fa-home"></i> Trang chủ</a>
                <a>Tài khoản</a>
                <span>@yield('title')</span>
            </div>
            <h3 class="pb-4" style="font-weight: 500; font-size: 22px"><i class="fa-regular fa-user mr-3"></i>Tài khoản của bạn</h3>
            <div class="row px-4">
                <!-- sidebar -->
                <div class="col-md-3 d-md-none d-lg-block">
                    @include('layouts.client.sidebar_account')
                </div>
                {{-- content --}}
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

@endsection