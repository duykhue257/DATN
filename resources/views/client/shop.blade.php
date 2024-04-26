@extends('layouts.client.layout_base')
@section('main')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('homePage') }}"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>THỂ LOẠI</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion">
                                    @foreach ($categories as $ct)
                                        <div class="card ">
                                            <div class="card-heading">
                                                <a class="">{{ $ct->name_cate }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Shop by price</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="0" data-max="9000000"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Giá:</p>
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <a href="#">Lọc</a>
                        </div>
                        <div class="sidebar__sizes">
                            <div class="section-title">
                                <h4>Kích cỡ</h4>
                            </div>

                            <div class="size__list">
                                @foreach ($sizes as $size)
                                    <label for="{{ $size->size }}">
                                        {{ $size->size }}
                                        <input type="checkbox" id="{{ $size->size }}">
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="sidebar__color">
                            <div class="section-title">
                                <h4>Màu sắc</h4>
                            </div>
                            <div class="colorList">
                                @foreach ($colors as $cl)
                                    <label for="{{ $cl->color }}">
                                        <input class="variant_color" type="checkbox" id="{{ $cl->color }}">
                                        {{ $cl->color }}

                                        {{-- <span class="checkmark"></span> --}}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6">
                                <div class="product__item">

                                    @if ($product->variants->isNotEmpty())
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ $product->variants ? Storage::url($product->variants[0]->image) : '' }}">

                                            <!-- Hiển thị hình ảnh sản phẩm -->
                                            <ul class="product__hover">
                                                <li><a href="{{ $product->variants ? Storage::url($product->variants[0]->image) : '' }}"
                                                        class="image-popup"><span class="arrow_expand "></span></a></li>
                                                <li><a href="#"><span class="icon_heart_alt "></span></a></li>

                                            </ul>
                                        </div>
                                    @endif


                                    <div class="product__item__text">


                                        <div class="color_detail">
                                            <ul>
                                                @php
                                                    $uniqueColors = $product->variants->pluck('colors')->unique('color');
                                                @endphp
                                                @foreach ($uniqueColors as $color)
                                                    <li class="li" style="background-color: {{ $color->color }}"></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        
                                        <div class="size_detail">
                                            <ul>
                                                @php
                                                    $uniqueSizes = $product->variants->pluck('sizes')->unique('size');
                                                @endphp
                                                @foreach ($uniqueSizes as $size)
                                                    <li>{{ $size->size }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        
                                        <!-- Tên sản phẩm -->
                                        <h6>
                                            <a class="product_name"
                                                href="{{ route('detail_product') }}?id={{ $product->id }}">{{ $product->name }}</a>
                                        </h6>


                                        <div class="rating">
                                            <!-- Đánh giá sản phẩm -->
                                        </div>
                                        <div class="product__price">{{ Number_format($product['price_reduced']) }} đ</div>
                                        <!-- Giá sản phẩm -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection
