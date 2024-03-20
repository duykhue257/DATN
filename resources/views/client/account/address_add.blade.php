@extends('layouts.layout_base')
@section('main')
<section class="shop spad" style="padding-top: 35px;">
    <div class="container">
        <div class="breadcrumb__links mb-4">
            <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
            <a>Tài khoản</a>
            <span>Địa chỉ</span>
        </div>
            <h3 class="pb-4">Tài khoản của bạn</h3>
            <div class="row px-4">
                <!-- LEFT -->
                <div class="col-md-3">
                    @include('layouts.client.sidebar_account')
                </div>
                <!-- RIGHT -->
                <div class="col-md-9">

                    <div class="pt-4">
                        <h6 style="font-weight: 500;">Thêm địa chỉ</h6>
                    </div>
                    <hr>
                        <form class="row g-3">
                                <div class="col-md-6 mb-4">
                                    <label for="inputFirstName" class="form-label">Họ<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="inputFirstName" placeholder="Nguyễn">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="inputLastName" class="form-label">Tên<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="inputLastName" placeholder="A">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="inputNumber" class="form-label">Số điện thoại<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="inputNumber" placeholder="0123456789">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="inputAddress" class="form-label">Địa chỉ<span style="color: red;"> *</span></label>
                                    <input type="text" class="form-control" id="inputAddress">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="inputAddress" class="form-label">Tỉnh/Thành phố<span style="color: red;"> *</span></label>
                                    <select class="form-select form-control" aria-label="Default select example">
                                        <option selected >Chọn tỉnh/thành phố</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="inputAddress" class="form-label">Quận/Huyện<span style="color: red;"> *</span></label>
                                    <select class="form-select form-control" aria-label="Default select example">
                                        <option selected ></option>
                                    </select>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="inputAddress" class="form-label">Phường/xã<span style="color: red;"> *</span></label>
                                    <select class="form-select form-control" aria-label="Default select example">
                                        <option selected ></option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-dark btn-block">
                                        XÁC NHẬN ĐỊA CHỈ
                                    </button>
                                </div>
                        </form>
                </div>
            </div>
    </div>
</section>
@endsection