@extends('layouts.client.layout_base')
@section('main')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('homePage') }}"><i class="fa fa-home"></i> Trang chủ</a>
                        <a href="/shop">Sản phẩm </a>
                        <span class="">{{ $product->name }}</span>
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
                            @foreach ($product->variants as $index => $variant)
                                <a class="pt" href="#product-{{ $numbers[$index] }}">
                                    <img class="variant-image" src="{{ Storage::url($variant->image) }}" alt=""
                                        data-variant-id="{{ $variant->id }}">
                                </a>
                            @endforeach
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                @foreach ($product->variants as $index => $variant)
                                    <img data-hash="product-{{ $numbers[$index] }}" class="product__big__img"
                                        src="{{ Storage::url($variant->image) }}" alt=""
                                        data-variant-id="{{ $variant->id }}">
                                @endforeach
                            </div>
                        </div>
                    </div>




                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{ $product->name }}<span>Thương Hiệu: ClassicMan</span></h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( 138 đánh giá )</span>
                        </div>
                        <div class="product__details__price">{{ Number_format($product->price_reduced) }}
                            đ<span>{{ Number_format($product->price) }} đ</span></div>
                        - Hình ảnh sản phẩm là ảnh thật, các hình hoàn toàn do shop tự thiết kế.</br>
                        - Kiểm tra cẩn thận trước khi gói hàng giao cho Quý Khách</br>
                        - Hàng có sẵn, giao hàng ngay khi nhận được đơn </br>
                        - Hoàn tiền nếu sản phẩm không giống với mô tả</br>
                        - Chấp nhận đổi hàng khi size không vừa trong 3 ngày.
                        </p>
                        <div class="product__details__button">
                            <form id="addtocart" method="post" action="{{ route('cart.store') }}">
                                @csrf
                                <div class="quantity mt-2">
                                    <span>Số lượng:</span>
                                    <div class="pro-qty">
                                        <input type="text" name="quantity" id="qty" value="1" min="1"
                                            max="{{ $product->variants->max('quantity') }}">
                                    </div>
                                </div>
                                <button id="addToCart" disabled type="button"
                                    class=" btn btn-solid hover-solid btn-animation">
                                    <span class="cart-btn button_detail"><i class="fa fa-shopping-cart mr-2"></i>Thêm vào
                                        giỏ hàng</span>
                                </button>
                                <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                                <input type="hidden" name="variant_id" id="variant_id">
                            </form>

                            <div id="notification" class="notification hidden">
                                <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">

                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#47be37" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </g>

                                </svg>
                                Thêm vào giỏ hàng thành công
                            </div>
                        </div>

                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Khả dụng còn :</span>
                                    <div id="avalibale_quantity" class="stock__checkbox">
                                        0
                                    </div>
                                </li>
                                <li>
                                    <span>Màu sẵn có:</span>
                                    {{-- @foreach ($product->variants->pluck('colors') as $color)
                                          <span>{{ $color->color }} </span>
                                    @endforeach --}}
                                    <div class="color__btn">
                                        @php
                                            $uniqueColors = [];
                                        @endphp
                                        @foreach ($product->variants->pluck('colors') as $color)
                                            @if (!in_array($color->color, $uniqueColors))
                                                <label for="{{ $color->color }}-btn">
                                                    <input class="color" type="radio" id="{{ $color->color }}-btn"
                                                        name="color" value="{{ $color->id }}">
                                                    {{ $color->color }}
                                                </label>
                                                @php
                                                    $uniqueColors[] = $color->color;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </div>

                                </li>
                                <li>
                                    <span>Kích thước sẵn có:</span>
                                    <div class="size__btn">
                                        @php
                                            $uniqueSizes = [];
                                        @endphp
                                        {{-- @foreach ($product->sizes as $size)
                                            @if (!in_array($size->size, $uniqueSizes))
                                                <label for="{{ $size->size }}-btn">
                                                    <input  class="size" type="radio" id="{{ $size->size }}-btn"
                                                        value="{{ $size->id }}">
                                                    {{ $size->size }}
                                                </label>
                                                @php
                                                    $uniqueSizes[] = $size->size;
                                                @endphp
                                            @endif
                                        @endforeach --}}
                                        @foreach ($product->sizes as $size)
                                        @if (!in_array($size->size, $uniqueSizes))
                                            <label for="{{ $size->size }}-btn" data-color="{{ $size->color_id }}">
                                                <input class="size" type="radio" id="{{ $size->size }}-btn" value="{{ $size->id }}" data-color="{{ $size->color_id }}">
                                                {{ $size->size }}
                                            </label>
                                            @php
                                                $uniqueSizes[] = $size->size;
                                            @endphp
                                        @endif
                                    @endforeach
                                    
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
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Đánh giá ( 2 )</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Mô tả</h6>
                                <p>{{ $product->description }}
                                </p>
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
                @foreach ($categoryProducts as $Prd_type)
                    @if ($Prd_type->id != $product->id)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    @if (isset($Prd_type->variants[0]->image)) data-setbg="{{ Storage::url($Prd_type->variants[0]->image) }}" @endif>
                                    <ul class="product__hover">
                                        @if (isset($Prd_type->variants[0]->image))
                                            <li><a class="d-flex justify-content-center align-items-center"
                                                    href="{{ Storage::url($Prd_type->variants[0]->image) }}"
                                                    class="image-popup"><span class="arrow_expand"></span></a></li>
                                        @endif
                                        <li><a class="d-flex justify-content-center align-items-center"
                                                href=""><span class="icon_heart_alt"></span></a></li>

                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a
                                            href="{{ route('detail_product') }}?id={{ $Prd_type->id }}">{{ $Prd_type->name }}</a>
                                    </h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">{{ Number_format($Prd_type->price_reduced) }}đ
                                        <span>{{ Number_format($Prd_type->price) }}đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Lắng nghe sự kiện khi ảnh biến thể được chọn
            $('.variant-image').on('click', function() {
                // Lấy giá trị variant_id từ data-attribute của ảnh đã chọn
                var variantId = $(this).data('variant-id');

                // Cập nhật giá trị của input hidden variant_id trong form
                $('input[name="variant_id"]').val(variantId);
            });
        });
        document.getElementById('cartEffect').addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
            document.getElementById('addtocart').submit(); // Gửi biểu mẫu
            showSuccessMessage(); // Hiển thị thông báo
        });
        // Hàm hiển thị thông báo
        function showSuccessMessage() {
            document.getElementById('notification').classList.remove('hidden');

            // Tự động ẩn hộp thông báo sau một khoảng thời gian
            setTimeout(function() {
                document.getElementById('notification').classList.add('hidden');
            }, 2000); // 3000 miliseconds = 3 seconds
        }

        function addToCart() {
            var formData = $('#addtocart').serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route('cart.store') }}',
                data: formData,
                success: function(response) {
                    showSuccessMessage(); // Hiển thị thông báo thành công
                    // Thực hiện các hành động khác sau khi thêm vào giỏ hàng thành công
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Hiển thị thông báo lỗi nếu có
                }
            });
        }


        $(document).ready(function() {
            $('li').click(function() {
                $(this).toggleClass('selected');
            });
        });
    </script>
    <script>
        function addToCart() {
            var formData = $('#addtocart').serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route('cart.store') }}',
                data: formData,
                success: function(response) {
                    showSuccessMessage(); // Hiển thị thông báo thành công
                    // Thực hiện các hành động khác sau khi thêm vào giỏ hàng thành công
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Hiển thị thông báo lỗi nếu có
                }
            });
        }
        const product = <?php echo json_encode($product); ?>;

        const attribute = {
            color: null,
            size: null
        }
        const colors = document.querySelectorAll('.color')
        const sizes = document.querySelectorAll('.size')

        colors.forEach(color => {

            color.onclick = (event) => {
                attribute.color = event.target.value
                getVariant()
            }
        });

        sizes.forEach(size => {

            size.onclick = (event) => {
                attribute.size = event.target.value
                getVariant() 
            }
        });

        function getVariant() {
            // console.log(addToCart);
            // console.log(product.variants.find(p => p.color_id == attribute.color && p.size_id == attribute.size));
            if (attribute.color !== null && attribute.size !== null) {
                const variant = product.variants.find(p => p.color_id == attribute.color && p.size_id == attribute.size)
                if (variant) {
                    // console.log(variant);
                    document.querySelector('#avalibale_quantity').innerText = variant.quantity
                    const addToCart = document.querySelector('#addToCart')
                    addToCart.disabled = false
                    document.querySelector('#variant_id').value = variant.id

                    document.querySelector('#addToCart').onclick = () => {
                        if (document.querySelector('#qty').value > variant.quantity) {
                            alert('vượt quá số lượng hiện có')
                        } else {
                            this.addToCart()
                        }
                    }
                } else {
                    document.querySelector('#avalibale_quantity').innerText = "0"
                    const addToCart = document.querySelector('#addToCart')
                    addToCart.disabled = true
                    document.querySelector('#variant_id').value = null
                    document.querySelector('#addToCart').onclick = null
                }
            }
        }
       

    </script>
@endsection
