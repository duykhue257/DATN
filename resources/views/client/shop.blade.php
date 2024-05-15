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
                                <div id="price-range-slider" class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="0" data-max="9000000"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Giá:</p>
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <a href="#" id="filter-btn">Lọc</a>
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

                    <div class="row mb-3">
                       
                        <div class="col"><span class="mr-1"
                                style="font-weight: 500">{{ $products->total() }}</span><span>Sản phẩm</span></div>
                        <div class="col d-flex align-items-center">
                            <label for="sort ">Sắp xếp:</label>
                            <select class="custom-select w-75 ml-4"  id="sortBySelect" aria-label="Default select example">
                                <option value="default" {{ Request::input('sort') == 'default' ? 'selected' : '' }}>Mặc định
                                </option>
                                <option value="asc_price" {{ Request::input('sort') == 'asc_price' ? 'selected' : '' }}>Giá
                                    tăng dần</option>
                                <option value="desc_price" {{ Request::input('sort') == 'desc_price' ? 'selected' : '' }}>
                                    Giá giảm dần</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($products as $product)
                            @if ($product->category && $product->variants->isNotEmpty())
                                <div class="col-lg-4 col-md-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{ Storage::url($product->variants[0]->image) }}">
                                            <ul class="product__hover">
                                                <li><a href="{{ Storage::url($product->variants[0]->image) }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                            </ul>
                                        </div>
                    
                                        <div class="product__item__text">
                                            <div class="hidden">
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
                                            </div>
                    
                                            <!-- Tên sản phẩm -->
                                            <h6>
                                                <a class="product_name" href="{{ route('detail_product', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                            </h6>
                    
                                            <div class="rating">
                                                <!-- Đánh giá sản phẩm -->
                                            </div>
                                            <div class="product__price">
                                                {{ number_format($product->price_reduced, 0, ',', '.') }} đ
                                            </div>
                                            <!-- Giá sản phẩm -->
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    
                    <div class="pagination">
                        {{ $products->links() }}
                    </div>
                    <style>
                        .pagination {
                            display: flex;
                            justify-content: center;
                            margin-top: 20px;
                        }

                        .pagination .page-item {
                            margin: 0 3px;
                            list-style: none;
                        }

                        .pagination .page-link {
                            padding: 5px 10px;
                            border: 1px solid #ccc;
                            border-radius: 3px;
                            color: #333;
                            text-decoration: none;
                        }

                        .pagination .page-link:hover {
                            background-color: #f0f0f0;
                        }

                        .pagination .page-item.active .page-link {
                            background-color: white;
                            color: black;
                            border-color: red;
                        }
                    </style>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection
@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
$(function() {
    $("#price-range-slider").slider({
        range: true,
        min: 0,
        max: 9000000,
        values: [0, 9000000],
        slide: function(event, ui) {
            $("#minamount").val(ui.values[0]);
            $("#maxamount").val(ui.values[1]);
        }
    });
    $("#minamount").val($("#price-range-slider").slider("values", 0));
    $("#maxamount").val($("#price-range-slider").slider("values", 1));

    $("#filter-btn").on("click", function(e) {
        e.preventDefault();
        var minPrice = $("#minamount").val();
        var maxPrice = $("#maxamount").val();
        // Gửi yêu cầu lọc tới máy chủ với minPrice và maxPrice
        // Xử lý kết quả trả về và cập nhật giao diện người dùng
    });
});


        $(document).ready(function() {
            $('#sortBySelect').change(function() {
                var sortBy = $(this).val();
                window.location.href = '{{ route('shop') }}?sort=' + sortBy;
            });
        });

        $('.pagination a').on('click', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            var url = '{{ route('shop') }}?sort={{ Request::input('sort') }}&page=' + page;
            window.location.href = url;
        });
    </script>
@endpush
