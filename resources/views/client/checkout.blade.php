@extends('layouts.layout_base')
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

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#"> Có phiếu giảm giá?</a>
                     Nhấn vào đây để nhập mã của bạn.</h6>
            </div>
        </div>
        <form action="#" class="checkout__form">
            <div class="row">
                <div class="col-lg-8">
                    <h5>CHI TIẾT THANH TOÁN</h5>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Tên <span>*</span></p>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Họ <span>*</span></p>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Quốc gia <span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__form__input">
                                <p>Địa chỉ <span>*</span></p>
                                <input type="text" placeholder="Địa chỉ đường phố của bạn">
                                <input type="text" placeholder="Số nhà, căn hộ, tòa nhà... ( tùy chọn )">
                            </div>
                            <div class="checkout__form__input">
                                <p>Thị trấn/Thành phố <span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__form__input">
                                <p>Tỉnh/Thành phố <span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__form__input">
                                <p>Mã bưu điện <span>*</span></p>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Điện thoại <span>*</span></p>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Email <span>*</span></p>
                                <input type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__checkbox">
                                <label for="acc">
                                    Tạo một tài khoản?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Tạo tài khoản am bằng cách nhập thông tin bên dưới. 
                                    Nếu bạn là khách hàng thường xuyên đăng nhập ở <br />đầu trang</p>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Mật khẩu tài khoản <span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__form__checkbox">
                                    <label for="note">
                                        Lưu ý về đơn đặt hàng của bạn, ví dụ: thông báo đặc biệt về giao hàng
                                        <input type="checkbox" id="note">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Ghi chú đơn hàng <span>*</span></p>
                                    <input type="text"
                                    placeholder="Lưu ý về đơn đặt hàng của bạn, ví dụ: thông báo đặc biệt về giao hàng">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5>ĐƠN HÀNG CỦA BẠN</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">Product</span>
                                        <span class="top__text__right">Total</span>
                                    </li>
                                    <li>01. Áo Game  <span>$ 300.0</span></li>
                                    <li>02. Hoodie zip<br /> tote briefcase <span>$ 170.0</span></li>
                                    <li>03. Áo phông trơn <span>$ 170.0</span></li>
                                    <li>04. Áo thun lạnh <span>$ 110.0</span></li>
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Tổng tạm tính. <span>$ 750.0</span></li>
                                    <li>Tổng cộng <span>$ 750.0</span></li>
                                </ul>
                            </div>
                            <div class="checkout__order__widget">
                                <label for="o-acc">
                                    Tạo một tài khoản?
                                    <input type="checkbox" id="o-acc">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Tạo tài khoản am bằng cách nhập thông tin bên dưới. 
                                    Nếu bạn là khách hàng thường xuyên đăng nhập ở đầu trang.</p>
                                <label for="check-payment">
                                    Thanh toán khi nhận hàng
                                    <input type="checkbox" id="check-payment">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="paypal">
                                    PayPal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">Place oder</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection