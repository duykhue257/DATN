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
                    {{-- sidebar --}}
                    @include('layouts.client.sidebar_account')
                </div>
                <!-- RIGHT -->
                <div class="col-md-9">

                    <div class="pt-4 ">
                        <h6 style="font-weight: 500;">Địa chỉ giao hàng</h6>
                        <p>Quản lý thông tin địa chỉ giao hàng</p>
                    </div>
                    <hr>
                    {{-- address --}}
                    <div class="row border-bottom mb-4">
                        <div class="col-md-2">
                            <h6 style="font-weight: 500;">Nguyễn A</h6>
                        </div>
                        <div class="col-md-6">
                            <p>Tòa nhà FPT Polytechnic., Cổng số 2, 13 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam</p>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <input class="form-check-input" type="checkbox" id="toggleFormCheckbox" name="default">
                                    <p>Mặc định</p>
                                </div>
                                <div>
                                    <a href="" style="font-size: 12px; color:black">Chỉnh sửa</a>
                                    <a href="" style="color: black"><span class="icon_close"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark btn-block mb-4">
                        THÊM ĐỊA CHỈ MỚI
                    </button>

                </div>
            </div>
    </div>
</section>
@endsection