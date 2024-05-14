@extends('layouts.client.layout_base')
@section('main')
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg" data-setbg="img/categories/category-1.jpg">
                        <div class="categories__text">
                            <h1>ClassicMan</h1>
                            <p>“Thời trang là một phần của không khí hàng ngày và nó luôn thay đổi,
                                chuyển động cùng với mọi sự kiện diễn ra.
                                Bạn thậm chí có thể nhận biết sự đến gần của một cuộc cách mạng trong trang phục.
                                Bạn có thể nhìn và cảm nhận mọi điều thông qua trang phục.”</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/category-2.jpg">
                                <div class="categories__text">
                                    <h4>Phong cách Classic</h4>
                                   

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/category-3.jpg">
                                <div class="categories__text">
                                    <h4>Phong cách Casual</h4>
                                   

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/category-4.jpg">
                                <div class="categories__text">
                                    <h4>Phong cách Streetwear</h4>
                               

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="img/categories/category-5.jpg">
                                <div class="categories__text">
                                    <h4>Phong cách Business</h4>
                               

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
    @include('layouts.notify')
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
                        @foreach ($categories as $ct)
                            <li data-filter=".{{ $ct->name_cate }}">{{ $ct->name_cate }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row property__gallery">
                @foreach ($products as $product)
                    @if ($product->category && $product->variants->isNotEmpty())
                        <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $product->category->name_cate }}">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ Storage::url($product->variants[0]->image) }}">
                                    <div class="label"></div>
                                    <ul class="product__hover">
                                        <li><a href="{{ Storage::url($product->variants[0]->image) }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        {{-- <li><a href="#"><span class="icon_bag_alt"></span></a></li> --}}
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{ route('detail_product', ['id' => $product->id]) }}">{{ $product->name }}</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">{{ number_format($product->price_reduced, 0, ',', '.') }}đ</div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
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

                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>ClassicMan</span>
                                <h1>Chào mừng xuân tới</h1>

                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>ClassicMan</span>
                                <h1>Mua càng nhiều sale càng nhiều</h1>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Trend Section Begin -->
   
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
