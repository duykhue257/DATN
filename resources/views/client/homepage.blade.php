@extends('layouts.layout_base')
@section('main')
<section class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="categories__item categories__large__item set-bg"
                data-setbg="img/categories/category-1.jpg">
                <div class="categories__text">
                    <h1>ClassicMan</h1>
                    <p>“Thời trang là một phần của không khí hàng ngày và nó luôn thay đổi, 
                        chuyển động cùng với mọi sự kiện diễn ra. 
                        Bạn thậm chí có thể nhận biết sự đến gần của một cuộc cách mạng trong trang phục. 
                        Bạn có thể nhìn và cảm nhận mọi điều thông qua trang phục.”</p>
                    <a href="#">Mua Ngay</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                    <div class="categories__item set-bg" data-setbg="img/categories/category-2.jpg">
                        <div class="categories__text">
                            <h4>Phong cách Classic</h4>
                            <p>10 items</p>
                            <a href="#">Mua Ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                    <div class="categories__item set-bg" data-setbg="img/categories/category-3.jpg">
                        <div class="categories__text">
                            <h4>Phong cách Casual</h4>
                            <p>10 items</p>
                            <a href="#">Mua Ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                    <div class="categories__item set-bg" data-setbg="img/categories/category-4.jpg">
                        <div class="categories__text">
                            <h4>Phong cách Streetwear</h4>
                            <p>10 items</p>
                            <a href="#">Mua Ngay</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                    <div class="categories__item set-bg" data-setbg="img/categories/category-5.jpg">
                        <div class="categories__text">
                            <h4>Phong cách Business</h4>
                            <p>10 items</p>
                            <a href="#">Mua Ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="section-title">
                <h4>SẢN PHẨM MỚI</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <ul class="filter__controls">
                <li class="active" data-filter="*">Tất cả</li>
                <li data-filter=".women">Đồ thể thao</li>
                <li data-filter=".men">Set</li>
                <li data-filter=".kid">Áo sơ mi</li>
                <li data-filter=".accessories">Áo phông</li>
                <li data-filter=".cosmetic">Áo blazer</li>
            </ul>
        </div>
    </div>
    <div class="row property__gallery">
        <div class="col-lg-3 col-md-4 col-sm-6 mix women">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                    <div class="label new">New</div>
                    <ul class="product__hover">
                        <li><a href="img/product/product-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="#">Áo Thun Sơmi Dài Tay FVNXY Phom Slim-fit Màu Trắng</a></h6>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product__price">279.000đ</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mix men">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                    <ul class="product__hover">
                        <li><a href="img/product/product-2.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="#">Áo thể thao VUNC sát nách cotton thấm hút mồ hôi thời trang mùa hè</a></h6>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product__price">23.000đ</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mix accessories">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                    <div class="label stockout">out of stock</div>
                    <ul class="product__hover">
                        <li><a href="img/product/product-3.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="#">Áo thun PLEASURE / Preference Cream Tee</a></h6>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product__price">209.000đ</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mix cosmetic">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="img/product/product-4.jpg">
                    <ul class="product__hover">
                        <li><a href="img/product/product-4.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="#">Áo Blazer Dài Tay Unisex Form Rộng</a></h6>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product__price">259.000đ</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mix kid">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="img/product/product-5.jpg">
                    <ul class="product__hover">
                        <li><a href="img/product/product-5.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="#">Set Đồ bộ nam dài tay thể thao gió siêu cấp</a></h6>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product__price">219.000đ</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mix women men kid accessories cosmetic">
            <div class="product__item sale">
                <div class="product__item__pic set-bg" data-setbg="img/product/product-6.jpg">
                    <div class="label sale">Sale</div>
                    <ul class="product__hover">
                        <li><a href="img/product/product-6.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="#">Áo thun JIEBANGREN Áo phông nam form rộng tay lỡ oversize</a></h6>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product__price">97.000đ<span>170.000đ</span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mix women men kid accessories cosmetic">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                    <ul class="product__hover">
                        <li><a href="img/product/product-7.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="#">Áo khoác nỉ Cardigan Lesavril de Vetements Witch - Light Beige</a></h6>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product__price">399.000đ</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mix women men kid accessories cosmetic">
            <div class="product__item sale">
                <div class="product__item__pic set-bg" data-setbg="img/product/product-8.jpg">
                    <div class="label">Sale</div>
                    <ul class="product__hover">
                        <li><a href="img/product/product-8.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="#">Áo sơ mi nam chất nhung tăm VICENZO phong cách trẻ trung basic</a></h6>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product__price">159.000đ <span>200.000đ</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="img/banner/banner-4.jpg">
<div class="container">
    <div class="row">
        <div class="col-xl-7 col-lg-8 m-auto">
            <div class="banner__slider owl-carousel">
                <div class="banner__item">
                    <div class="banner__text">
                        <span>ClassicMan</span>
                        <h1>Tưng bừng sắm đồ đón xuân</h1>
                        <a href="#">Mua Ngay</a>
                    </div>
                </div>
                <div class="banner__item">
                    <div class="banner__text">
                        <span>ClassicMan</span>
                        <h1>Chào mừng xuân tới</h1>
                        <a href="#">Mua Ngay</a>
                    </div>
                </div>
                <div class="banner__item">
                    <div class="banner__text">
                        <span>ClassicMan</span>
                        <h1>Mua càng nhiều sale càng nhiều</h1>
                        <a href="#">Mua Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Banner Section End -->

<!-- Trend Section Begin -->
<section class="trend spad">
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="trend__content">
                <div class="section-title">
                    <h4>Hot Trend</h4>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/ht-1.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Áo Sweater The Bad God Signature Monogram</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">200.000đ</div>
                    </div>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/ht-2.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Áo Khoác Bomber Varsity Jacket The Bad God Iconic Leather</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">650.000đ</div>
                    </div>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/ht-3.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Áo Bomber Varsity Jacket The Bad God B Flow</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">479.000đ</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="trend__content">
                <div class="section-title">
                    <h4>Best seller</h4>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/bs-1.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Áo polo Mỏng Dáng Rộng Phong Cách Mỹ Cổ Điển</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">123.000đ</div>
                    </div>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/bs-2.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Áo Thun polo Dệt Kim Tay Ngắn <br />Phong Cách Nhật Bản</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">132.000đ</div>
                    </div>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/bs-3.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Áo Sơ Mi Nam Ngắn Tay Phong Cách retro</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">155.000đ</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="trend__content">
                <div class="section-title">
                    <h4>Feature</h4>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/f-1.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Áo Thun Raglan SAIGONESE Cotton Phối Line Unisex 4 Màu</h6>
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
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/f-2.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Áo Thun Phông Nam Local Brand Form Rộng Something AT Urban</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">159.599đ</div>
                    </div>
                </div>
                <div class="trend__item">
                    <div class="trend__item__pic">
                        <img src="img/trend/f-3.jpg" alt="">
                    </div>
                    <div class="trend__item__text">
                        <h6>Áo Thun Nam Cổ Lọ 6 Phân Tay Dài</h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">165.000đ</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Trend Section End -->

<!-- Discount Section Begin -->
<section class="discount">
<div class="container">
    <div class="row">
        <div class="col-lg-6 p-0">
            <div class="discount__pic">
                <img src="img/discount.jpg" alt="">
            </div>
        </div>
        <div class="col-lg-6 p-0">
            <div class="discount__text">
                <div class="discount__text__title">
                    <span>Giảm giá</span>
                    <h2>Mùa xuân 2024</h2>
                    <h5><span>Sale</span> 50%</h5>
                </div>
                <div class="discount__countdown" id="countdown-time">
                    <div class="countdown__item">
                        <span>22</span>
                        <p>Days</p>
                    </div>
                    <div class="countdown__item">
                        <span>18</span>
                        <p>Hour</p>
                    </div>
                    <div class="countdown__item">
                        <span>46</span>
                        <p>Min</p>
                    </div>
                    <div class="countdown__item">
                        <span>05</span>
                        <p>Sec</p>
                    </div>
                </div>
                <a href="#">Mua Ngay</a>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
                <i class="fa fa-car"></i>
                <h6>Miễn phí vận chuyển</h6>
                <p>Đối với các đơn hàng trên 350k</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
                <i class="fa fa-money"></i>
                <h6>Cam kết hoàn trả tiền</h6>
                <p>cam kết hoàn trả nếu có lỗi hoặc vấn đề</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
                <i class="fa fa-support"></i>
                <h6>Hỗ trợ trực tuyến 24/7</h6>
                <p>Hỗ trợ và tư vấn trực tuyến </p>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="services__item">
                <i class="fa fa-headphones"></i>
                <h6>Thanh toán an toàn</h6>
                <p>Thanh toán an toàn 100%</p>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Services Section End -->
@endsection