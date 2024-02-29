@extends('layouts.client.layout_base')
@section('main')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <a href="#">Sản Phẩm </a>
                    <span>ÁO KHOÁC DÀI CỔ VEST, FORM RỘNG, CHẤT FLANNEL CAO CẤP</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">
                        <a class="pt active" href="#product-1">
                            <img src="img/product/details/thumb-1.jpg" alt="">
                        </a>
                        <a class="pt" href="#product-2">
                            <img src="img/product/details/thumb-2.jpg" alt="">
                        </a>
                        <a class="pt" href="#product-3">
                            <img src="img/product/details/thumb-3.jpg" alt="">
                        </a>
                        <a class="pt" href="#product-4">
                            <img src="img/product/details/thumb-4.jpg" alt="">
                        </a>
                    </div>
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-hash="product-1" class="product__big__img" src="img/product/details/product-1.jpg" alt="">
                            <img data-hash="product-2" class="product__big__img" src="img/product/details/product-3.jpg" alt="">
                            <img data-hash="product-3" class="product__big__img" src="img/product/details/product-2.jpg" alt="">
                            <img data-hash="product-4" class="product__big__img" src="img/product/details/product-4.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3>ÁO KHOÁC DÀI CỔ VEST, FORM RỘNG, CHẤT FLANNEL CAO CẤP <span>Thương Hiệu: ClassicMan</span></h3>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span>( 138 đánh giá  )</span>
                    </div>
                    <div class="product__details__price">250.000đ <span>500.000đ</span></div>
                    <br>- Sản phẩm áo khoác dài cổ Vest Form rộng cao cấp giống mô tả 100% </br>
                        - Hình ảnh sản phẩm là ảnh thật, các hình hoàn toàn do shop tự thiết kế.</br>
                        - Kiểm tra  cẩn thận trước khi gói hàng giao cho Quý Khách</br>
                        - Hàng có sẵn, giao hàng ngay khi nhận được đơn </br>
                        - Hoàn tiền nếu sản phẩm không giống với mô tả</br>
                        - Chấp nhận đổi hàng khi size không vừa trong 3 ngày.
                    </p>
                    <div class="product__details__button">
                        <div class="quantity">
                            <span>Số lượng:</span>
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                        <a href="#" class="cart-btn"><span class="icon_bag_alt"></span> Thêm vào giỏ hàng</a>
                        <ul>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__details__widget">
                        <ul>
                            <li>
                                <span>Khả dụng:</span>
                                <div class="stock__checkbox">
                                    <label for="stockin">
                                        Trong kho
                                        <input type="checkbox" id="stockin">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <span>Màu có sẵn:</span>
                                <div class="color__checkbox">
                                    <label for="red">
                                        <input type="radio" name="color__radio" id="red" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="black">
                                        <input type="radio" name="color__radio" id="black">
                                        <span class="checkmark black-bg"></span>
                                    </label>
                                    <label for="grey">
                                        <input type="radio" name="color__radio" id="grey">
                                        <span class="checkmark grey-bg"></span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <span>Kích thước sẵn có:</span>
                                <div class="size__btn">
                                    <label for="xs-btn" class="active">
                                        <input type="radio" id="xs-btn">
                                        xs
                                    </label>
                                    <label for="s-btn">
                                        <input type="radio" id="s-btn">
                                        s
                                    </label>
                                    <label for="m-btn">
                                        <input type="radio" id="m-btn">
                                        m
                                    </label>
                                    <label for="l-btn">
                                        <input type="radio" id="l-btn">
                                        l
                                    </label>
                                </div>
                            </li>
                            <li>
                                <span>Khuyến mãi:</span>
                                <p>Miễn phí vận chuyển</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Mô tả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Thông số kỹ thuật</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Đánh giá ( 2 )</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h6>Mô tả</h6>
                            <p>
                                Áo khoác dài cổ Vest, form rộng, chất Flannel cao cấp là một item thời trang đa năng, 
                                phù hợp với cả nam và nữ. Áo có thiết kế form rộng thoải mái, cổ áo vest lịch sự, 
                                chất liệu Flannel cao cấp mềm mại, ấm áp. Áo khoác có thể kết hợp với nhiều loại trang phục khác nhau, 
                                từ quần jeans, quần kaki, quần âu đến váy, đầm. </p>
                            <p>Một số ưu điểm của áo khoác dài cổ Vest, form rộng, chất Flannel cao cấp: </br>

                                - Thiết kế form rộng thoải mái, tạo cảm giác dễ chịu khi mặc.</br>
                                - Cổ áo vest lịch sự, phù hợp với nhiều phong cách thời trang.</br>
                                - Chất liệu Flannel cao cấp mềm mại, ấm áp.</br>
                                - Đa dạng về màu sắc và họa tiết.</br>
                                Nếu bạn đang tìm kiếm một chiếc áo khoác dài vừa thời trang, 
                                vừa ấm áp, thì áo khoác dài cổ Vest, form rộng, chất Flannel cao cấp là một lựa chọn tuyệt vời.</p>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <h6>Thông số kỹ thuậ</h6>
                            <p> - Chất liệu: Vải Flannel cao cấp 100%, co giãn 4 chiều, vải mềm, mịn, thoáng mát, không xù lông.</br>
                                - Kiểu dáng: Form rộng thoải mái.</br>
                                - Chiều dài: Dài qua đầu gối.</br>
                                - Cổ áo: Cổ áo vest lịch sự.</br>
                                - Màu sắc: Đa dạng, phù hợp với nhiều phong cách thời trang.</br>
                                - Họa tiết: Đa dạng, phù hợp với nhiều phong cách thời trang.</br>
                                - Kích thước: Full size nam nữ: 40 - 85 kg.</p>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <h6>Đánh giá ( 2 )</h6>
                            <p> - Có thể hơi dày và cồng kềnh khi mặc trong những ngày hè nóng bức.</br>
                                - Giá thành có thể cao hơn so với một số loại áo khoác khác.</p>
                            <p>Áo khoác dài cổ Vest, form rộng, chất Flannel cao cấp là một
                                 lựa chọn tuyệt vời cho những ai đang tìm kiếm một chiếc áo 
                                 khoác vừa thời trang, vừa ấm áp. Áo có thiết kế đa năng, phù 
                                 hợp với nhiều phong cách thời trang và có thể kết hợp với 
                                 nhiều loại trang phục khác nhau. Tuy nhiên, áo có thể hơi dày 
                                 và cồng kềnh khi mặc trong những ngày hè nóng bức, và giá 
                                 thành có thể cao hơn so với một số loại áo khoác khác.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="related__title">
                    <h5>NHỮNG SẢM PHẨM TƯƠNG TỰ</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/product/related/rp-1.jpg">
                        <div class="label new">New</div>
                        <ul class="product__hover">
                            <li><a href="img/product/related/rp-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Áo sơ mi túi basic chất kaki cao cấp</a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">159.000đ</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/product/related/rp-2.jpg">
                        <ul class="product__hover">
                            <li><a href="img/product/related/rp-2.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Áo sơ mi Khóa kéo tay ngắn nam nữ unisex form rộng</a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">139.000đ</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/product/related/rp-3.jpg">
                        <div class="label stockout">Hết hàng</div>
                        <ul class="product__hover">
                            <li><a href="img/product/related/rp-3.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">áo Unisex - In 5D chữ No War phông tay lỡ cực đẹp</a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">149.000đ</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="img/product/related/rp-4.jpg">
                        <ul class="product__hover">
                            <li><a href="img/product/related/rp-4.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">Áo sơ mi tay ngắn nam nữ unisex form rộng</a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">119.000đ</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection