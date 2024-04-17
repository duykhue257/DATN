@extends('layouts.client.layout_account')
@section('title', 'Sản phẩm yêu thích')
@section('content')
    <section>
        <div class="pt-4">
            <h6 style="font-weight: 500;">Sản phẩm yêu thích</h6>
        </div>
        <hr>
        {{-- product --}}
        <div class="row border-bottom py-4">

            <div class="col-md-3 col-3">
                <a href=""><img src="../img/shop/shop-1.jpg" class="img-fluid rounded" alt="" style=""></a>
            </div>

            <div class="col-md-9 col-9">
                <div class="row">

                    <div class="col-md-7">
                        <div class="mb-3">
                            <h6>Áo sơ mi tay ngắn nam nữ unisex form rộng</h6>
                        </div>
                        <form action="" class="mb-3">
                            <select class="form-select border border-0 pr-2" aria-label="Default select example">
                                <option selected>Màu sắc</option>
                                <option value="1">White</option>
                            </select>
                            <select class="form-select border border-0 pr-2" aria-label="Default select example">
                                <option selected>Size</option>
                                <option value="1">S</option>
                            </select>
                        </form>
                        <div class="pro-qty">
                            <input type="text" value="1">
                        </div>
                        <div><span tyle="font-weight: 500;">100.000</span><span>đ</span></div>
                    </div>

                    <div class="col-md-5">
                        <div class="d-flex flex-column justify-content-start align-items-end mb-2" style="height: 100%;">
                            <span class="icon_close"></span>
                            <button type="submit" class="btn btn-dark btn-block mt-auto">THÊM VÀO GIỎ HÀNG</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        {{-- product --}}
        <div class="row border-bottom py-4">

            <div class="col-md-3 col-3">
                <a href=""><img src="../img/shop/shop-1.jpg" class="img-fluid rounded" alt="" style=""></a>
            </div>

            <div class="col-md-9 col-9">
                <div class="row">

                    <div class="col-md-7">
                        <div class="mb-3">
                            <h6>Áo sơ mi tay ngắn nam nữ unisex form rộng</h6>
                        </div>
                        <form action="" class="mb-3">
                            <select class="form-select border border-0 pr-2" aria-label="Default select example">
                                <option selected>Màu sắc</option>
                                <option value="1">White</option>
                            </select>
                            <select class="form-select border border-0 pr-2" aria-label="Default select example">
                                <option selected>Size</option>
                                <option value="1">S</option>
                            </select>
                        </form>
                        <div class="pro-qty">
                            <input type="text" value="1">
                        </div>
                        <div><span tyle="font-weight: 500;">100.000</span><span>đ</span></div>
                    </div>

                    <div class="col-md-5">
                        <div class="d-flex flex-column justify-content-start align-items-end mb-2" style="height: 100%;">
                            <span class="icon_close"></span>
                            <button type="submit" class="btn btn-dark btn-block mt-auto">THÊM VÀO GIỎ HÀNG</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection