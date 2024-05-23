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
                                <div class="size__list">
                                    @foreach ($categories as $ct)
                                        <div class="card">
                                            <div class="card-heading">
                                                <label for="category-{{ $ct->id }}">
                                                    <input class="category-filter" type="checkbox" id="category-{{ $ct->id }}" value="{{ $ct->id }}">
                                                    {{ $ct->name_cate }}
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Lọc theo giá</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div id="price-range-slider"
                                    class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="{{ $price_range['min_price'] }}" data-max="{{ $price_range['max_price'] }}"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Giá:</p>
                                       
                                        <input type="text" id="minamount" value="{{ $price_range['min_price'] }}">
                                        <input type="text" id="maxamount" value="{{ $price_range['max_price'] }}">
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
                                        <input class="size-filter" type="checkbox" id="{{ $size->size }}"
                                            value="{{ $size->id }}">
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="sidebar__color">
                            <div class="section-title">
                                <h4>Màu sắc</h4>
                            </div>
                            <div class="colorList text-uppercase">
                                @foreach ($colors as $cl)
                                    <label for="{{ $cl->color }}">
                                        <input class="variant_color color-filter " type="checkbox" id="{{ $cl->color }}"
                                            value="{{ $cl->id }}">
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
                            <select class="custom-select w-75 ml-4" id="sortBySelect" aria-label="Default select example">
                                <option value="default" {{ Request::input('sort') == 'default' ? 'selected' : '' }}>Mặc
                                    định
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
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ Storage::url($product->variants[0]->image) }}">
                                            <ul class="product__hover">
                                                <li><a href="{{ Storage::url($product->variants[0]->image) }}"
                                                        class="image-popup"><span class="arrow_expand"></span></a></li>
                                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                            </ul>
                                        </div>

                                        <div class="product__item__text">
                                            <div class="">
                                                <div class="color_detail">
                                                    <ul>
                                                        @php
                                                            $uniqueColors = $product->variants
                                                                ->pluck('colors')
                                                                ->unique('color');
                                                        @endphp
                                                        @foreach ($uniqueColors as $color)
                                                            <li class="li"
                                                                style="background-color: {{ $color->color }}"></li>
                                                        @endforeach
                                                    </ul>
                                                </div>

                                                <div class="size_detail">
                                                    <ul>
                                                        @php
                                                            $uniqueSizes = $product->variants
                                                                ->pluck('sizes')
                                                                ->unique('size');
                                                        @endphp
                                                        @foreach ($uniqueSizes as $size)
                                                            <li>{{ $size->size }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Tên sản phẩm -->
                                            <h6>
                                                <a class="product_name"
                                                    href="{{ route('detail_product', ['id' => $product->id]) }}">{{ $product->name }}</a>
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
        /* Lọc theo khoảng giá */
        $(document).ready(function() {
            $("#filter-btn").click(function(e) {
                e.preventDefault();
                var minPrice = $("#minamount").val();
                var maxPrice = $("#maxamount").val();
                console.log(minPrice);
                console.log(maxPrice);
                var categoryId = $('#category-filter').val();
                var sortBy = $('#sortBySelect').val();
                var url = '{{ route('shop') }}?min_price=' + minPrice + '&max_price=' + maxPrice;
                window.location.href = url;
            });
        });

        $(document).ready(function() {
    // Preserve current filter states
    var currentCategoryFilter = getUrlParam('category');
    var currentColorFilter = getUrlParam('color');
    var currentSizeFilter = getUrlParam('size');
    var currentSort = getUrlParam('sort');

    // Set initial filter states
    if (currentCategoryFilter) {
        var selectedCategories = currentCategoryFilter.split(',');
        selectedCategories.forEach(function(category) {
            $('input.category-filter[value="' + category + '"]').prop('checked', true);
        });
    }

    if (currentColorFilter) {
        var selectedColors = currentColorFilter.split(',');
        selectedColors.forEach(function(color) {
            $('input.color-filter[value="' + color + '"]').prop('checked', true);
        });
    }

    if (currentSizeFilter) {
        var selectedSizes = currentSizeFilter.split(',');
        selectedSizes.forEach(function(size) {
            $('input.size-filter[value="' + size + '"]').prop('checked', true);
        });
    }

    if (currentSort) {
        $('#sortBySelect').val(currentSort);
    }

    // Handle filter changes
    $('.category-filter, .color-filter, .size-filter').change(function() {
        filterProducts();
    });

    // Handle sort changes
    $('#sortBySelect').change(function() {
        filterProducts();
    });

    // Function to filter products
    function filterProducts() {
        var selectedCategories = [];
        var selectedColors = [];
        var selectedSizes = [];
        var selectedSort = $('#sortBySelect').val();

        $('.category-filter:checked').each(function() {
            selectedCategories.push($(this).val());
        });

        $('.color-filter:checked').each(function() {
            selectedColors.push($(this).val());
        });

        $('.size-filter:checked').each(function() {
            selectedSizes.push($(this).val());
        });

        var url = '{{ route('shop') }}';
        var params = [];

        if (selectedCategories.length > 0) {
            params.push('category=' + selectedCategories.join(','));
        }

        if (selectedColors.length > 0) {
            params.push('color=' + selectedColors.join(','));
        }

        if (selectedSizes.length > 0) {
            params.push('size=' + selectedSizes.join(','));
        }

        if (selectedSort && selectedSort !== 'default') {
            params.push('sort=' + selectedSort);
        }

        if (params.length > 0) {
            url += '?' + params.join('&');
        }

        window.location.href = url;
    }

    // Phân trang
    $('.pagination a').on('click', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var url = updateUrlParam(window.location.href, 'page', page);
        window.location.href = url;
    });

    function updateUrlParam(url, param, value) {
        var re = new RegExp("([?&])" + param + "=.*?(&|$)", "i");
        var separator = url.indexOf('?') !== -1 ? "&" : "?";
        if (url.match(re)) {
            url = url.replace(re, '$1' + param + "=" + value + '$2');
        } else {
            url = url + separator + param + "=" + value;
        }
        return url;
    }

    function getUrlParam(param) {
        var result = new RegExp('[?&]' + param + '=([^&#]*)').exec(window.location.search);
        return result ? result[1] : '';
    }
});

    </script>
@endpush
