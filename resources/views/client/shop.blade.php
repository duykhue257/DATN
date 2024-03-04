@extends('layouts.client.layout_base')
@section('main')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
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
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-heading active">
                                            <a data-toggle="collapse" data-target="#collapseOne"> Đồ thể thao</a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Áo khoác</a></li>
                                                    <li><a href="#">Áo thun</a></li>
                                                    <li><a href="#">Áo Polo</a></li>
                                                    <li><a href="#">Áo jacket </a></li>
                                                    <li><a href="#">Áo đá bóng</a></li>
                                                    <li><a href="#">Áo gió</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseTwo">Set</a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Bộ vest nam</a></li>
                                                    <li><a href="#">Đồ mùa hè</a></li>
                                                    <li><a href="#">Đồ đi biển</a></li>
                                                    <li><a href="#">Đồ mùa đông</a></li>
                                                    <li><a href="#">Đồ ngủ</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseThree">Áo sơ mi</a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Sơ mi nam classic fit</a></li>
                                                    <li><a href="#">Áo sơ mi nam slim fit</a></li>
                                                    <li><a href="#">Áo sơ mi nam regular fit</a></li>
                                                    <li><a href="#">Áo sơ mi nam tay ngắn</a></li>
                                                    <li><a href="#">Áo sơ mi nam cổ cuban</a></li>
                                                    <li><a href="#">Áo sơ mi nam vải linen</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFour">Áo phông</a>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Áo phông cổ tròn</a></li>
                                                    <li><a href="#">Áo phông cổ V</a></li>
                                                    <li><a href="#">Áo phông cổ polo</a></li>
                                                    <li><a href="#">Áo phông henley</a></li>
                                                    <li><a href="#">Áo phông raglan</a></li>
                                                    <li><a href="#">Áo phông oversized</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFive">Áo blazer</a>
                                        </div>
                                        <div id="collapseFive" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Áo khoác blazer basic</a></li>
                                                    <li><a href="#">Áo khoác blazer dáng dài</a></li>
                                                    <li><a href="#">Áo khoác blazer nam cộc tay - sát nách</a></li>
                                                    <li><a href="#">Áo khoác blazer Châu Âu cổ điển</a></li>
                                                    <li><a href="#">Áo khoác blazer kẻ sọc</a></li>
                                                    <li><a href="#">Áo khoác blazer dáng ôm</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
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
                                <label for="xxs">
                                    xxs
                                    <input type="checkbox" id="xxs">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xs">
                                    xs
                                    <input type="checkbox" id="xs">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xss">
                                    xs-s
                                    <input type="checkbox" id="xss">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="s">
                                    s
                                    <input type="checkbox" id="s">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="m">
                                    m
                                    <input type="checkbox" id="m">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="ml">
                                    m-l
                                    <input type="checkbox" id="ml">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="l">
                                    l
                                    <input type="checkbox" id="l">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="xl">
                                    xl
                                    <input type="checkbox" id="xl">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__color">
                            <div class="section-title">
                                <h4>Màu sắc</h4>
                            </div>
                            <div class="size__list color__list">
                                <label for="black">
                                    Đen
                                    <input type="checkbox" id="black">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="whites">
                                    Trắng
                                    <input type="checkbox" id="whites">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="reds">
                                    Đỏ
                                    <input type="checkbox" id="reds">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="greys">
                                    Xám
                                    <input type="checkbox" id="greys">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="blues">
                                    Xanh lam
                                    <input type="checkbox" id="blues">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="beige">
                                    Be
                                    <input type="checkbox" id="beige">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="greens">
                                    Xanh lục
                                    <input type="checkbox" id="greens">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="yellows">
                                    Vàng
                                    <input type="checkbox" id="yellows">
                                    <span class="checkmark"></span>
                                </label>
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
                                                        class="image-popup"><span class="arrow_expand"></span></a></li>
                                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                            </ul>

                                        </div>
                                    @endif


                                    <div class="product__item__text">
                                        <h6><a href="{{ route('detail_product') }}?id={{ $product->id }}">{{ $product->name }}</a></h6>

                                        <!-- Tên sản phẩm -->
                                        <div class="rating">
                                            <!-- Đánh giá sản phẩm -->
                                        </div>
                                        <div class="product__price">{{ $product['price'] }}</div> <!-- Giá sản phẩm -->
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
