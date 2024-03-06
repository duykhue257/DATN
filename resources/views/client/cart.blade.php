@extends('layouts.client.layout_base')
@section('main')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/home"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Giỏ hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>SẢN PHẨM</th>
                                <th>GIÁ</th>
                                <th>SỐ LƯỢNG</th>
                                <th>TỔNG CỘNG</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    <td class="cart__product__item">
                                        {{-- <img src="{{ $item['image'] }}" alt=""> --}}
                                        <div class="cart__product__item__title">
                                            <h6>{{ $item['name'] }}</h6>
                                            <!-- Đây là nơi bạn có thể hiển thị các thông tin khác về sản phẩm, như mô tả, đánh giá, vv -->
                                        </div>
                                    </td>
                                    <td class="cart__price">{{ number_format($item['price']) }}đ</td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="{{ $item['quantity'] }}">
                                        </div>
                                    </td>
                                    <td class="cart__total">{{ number_format($item['price'] * $item['quantity']) }}đ</td>
                                    <td class="cart__close"><a href="{{ route('removeItemFromCart', $item['id']) }}"><span class="icon_close"></span></a></td>
                                    <!-- Nút 'Xóa' có thể gửi yêu cầu đến một route để xóa sản phẩm khỏi giỏ hàng -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="#">TIẾP TỤC MUA SẮM</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                    <a href="#"><span class="icon_loading"></span>CẬP NHẬT GIỎ HÀNG</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">
                    <h6>NHẬP MÃ GIẢM GIÁ</h6>
                    <form action="#">
                        <input type="text" placeholder="Nhập mã phiếu giảm giá của bạn">
                        <button type="submit" class="site-btn">Apply</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>TỔNG SỐ GIỎ HÀNG</h6>
                    <ul>
                        <li>Tổng tạm tính <span>646.000đ</span></li>
                        <li>Tổng cộng <span>646.000đ</span></li>
                    </ul>
                    <a href="/checkout" class="primary-btn">TIẾN HÀNH THANH TOÁN</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Cart Section End -->
@endsection