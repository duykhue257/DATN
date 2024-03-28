@extends('layouts.client.layout_account')
@section('title', 'Địa chỉ giao hàng')
@section('content')
    <section>

        <div class="pt-4">
            <h6 style="font-weight: 500;">Thêm địa chỉ</h6>
        </div>
        <hr>
        <form class="row g-3">
            <div class="col-12 mb-4">
                <label for="inputFirstName" class="form-label">Họ và tên<span style="color: red;"> *</span></label>
                <input type="text" class="form-control" id="inputFirstName" placeholder="Nguyễn Văn A">
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
                    <option selected>Chọn tỉnh/thành phố</option>
                </select>
            </div>
            <div class="col-12 mb-4">
                <label for="inputAddress" class="form-label">Quận/Huyện<span style="color: red;"> *</span></label>
                <select class="form-select form-control" aria-label="Default select example">
                    <option selected></option>
                </select>
            </div>
            <div class="col-12 mb-4">
                <label for="inputAddress" class="form-label">Phường/xã<span style="color: red;"> *</span></label>
                <select class="form-select form-control" aria-label="Default select example">
                    <option selected></option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-dark btn-block">
                    XÁC NHẬN ĐỊA CHỈ
                </button>
            </div>
        </form>
    </section>
@endsection