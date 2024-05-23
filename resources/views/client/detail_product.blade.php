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
                                    <img class="variant-image " src="{{ Storage::url($variant->image) }}" alt=""
                                        data-variant-id="{{ $variant->id }}">
                                </a>
                            @endforeach
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                @foreach ($product->variants as $index => $variant)
                                    <img data-hash="product-{{ $numbers[$index] }}" class="product__big__img "
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
                        <!-- <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span>( 138 đánh giá )</span>
                                </div> -->
                        <div class="product__details__price">
                            {{ str_replace(',', '.', number_format($product->price_reduced)) }}
                            đ@if ($product->price > 0)
                                <span>{{ str_replace(',', '.', number_format($product->price)) }} đ</span>
                            @endif
                        </div>

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
                        <div id="notificationError" class="notificationError hidden">
                            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">

                                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                <g id="SVGRepo_iconCarrier">
                                    <path d="M9 9L15 15" stroke="#ff0a0a" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M15 9L9 15" stroke="#ff0a0a" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <circle cx="12" cy="12" r="9" stroke="#ff0a0a" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </g>

                            </svg>
                            Vượt quá số lượng hiện có
                        </div>
                        <div id="notificationError2" class="notificationError hidden">
                            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">

                                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                <g id="SVGRepo_iconCarrier">
                                    <path d="M9 9L15 15" stroke="#ff0a0a" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M15 9L9 15" stroke="#ff0a0a" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <circle cx="12" cy="12" r="9" stroke="#ff0a0a" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </g>

                            </svg>
                            Số lượng trong giỏ hàng vượt quá số lượng hiện có
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Khả dụng còn :</span>
                                    <div id="avalibale_quantity" class="stock__checkbox">
                                        0
                                    </div>
                                </li>
                                <!-- <li>
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
                                                        name="color" value="{{ $color->id }}"
                                                        data-color-id="{{ $color->id }}">
                                                    {{ $color->color }}
                                                </label>
                                                @php
                                                    $uniqueColors[] = $color->color;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </div>

                                </li> -->

                                
                                <li>
    <span>Màu sẵn có:</span>
    <div class="color__btn">
        @php
            $uniqueColors = [];
            function getTextColor($bgColor) {
                // Chuyển đổi màu thành chữ thường để dễ so sánh
                $bgColor = strtolower($bgColor);
                // Các màu nền tối cần đổi màu chữ thành trắng
                $darkColors = ['black', 'navy', 'purple', 'maroon', 'darkgreen', 'darkblue', 'darkred'];
                if (in_array($bgColor, $darkColors)) {
                    return '#fff';
                }
                return '#000';
            }
        @endphp
        @foreach ($product->variants->pluck('colors') as $color)
            @if (!in_array($color->color, $uniqueColors))
                @php
                    $textColor = getTextColor($color->color);
                @endphp
                <input class="color" type="radio" id="{{ $color->color }}-btn"
                    name="color" value="{{ $color->id }}"
                    data-color-id="{{ $color->id }}">
                <label for="{{ $color->color }}-btn" style="background-color: {{ $color->color }}; color: {{ $textColor }};">
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
                                        @foreach ($product->variants->pluck('sizes') as $size)
                                            @if (!in_array($size->size, $uniqueSizes))
                                                <label for="{{ $size->size }}-btn">
                                                    <input class="size" type="radio" id="{{ $size->size }}-btn"
                                                        name="size" value="{{ $size->id }}"
                                                        data-size-id="{{ $size->id }}">
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
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Bình luận (
                                    {{ $commentCount }} )</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Mô tả</h6>
                                <p>{{ $product->description }}
                                </p>
                            </div>

                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <h6>Bình luận( {{ $commentCount }} )</h6>
                                <div class="px-2">
                                    @if ($comments->count() > 0)
                                        @foreach ($firstFiveComments as $comment)
                                            <div class="py-2 my-3 d-flex">
                                                {{-- @if (Auth::user()->role = 0)
                                                    <img src="img/administrator-avatar-icon-vector-32095490.jpg"
                                                    alt="" style="width: 30px; height: 30px;">
                                                @else --}}

                                                {{-- @endif --}}

                                                {{-- <img src="img/tải xuống.jpg" alt=""> --}}
                                                <img src="img/tải xuống.jpg" alt=""
                                                    style="width: 50px; height: 50px; border-radius: 10px;">
                                                <div>
                                                    <small class="name_cmt">{{ $comment->user->name }} <span
                                                            class="ml-2">({{ $comment->created_at->format('d/m/Y') }})</span></small>
                                                    <p class="text_comment">{{ $comment->content }}</p>
                                                </div>

                                            </div>
                                        @endforeach
                                        @if ($comments->count() > 5)
                                            <p class="More_cmt" id="showMoreComments">Hiển thị thêm <i
                                                    class="fa-solid fa-angles-right"></i></p>
                                        @endif

                                        <div id="remainingComments" style="display: none;">
                                            @foreach ($remainingComments as $comment)
                                                <div class="py-2 d-flex my-3">

                                                    <img src="img/tải xuống.jpg" alt=""
                                                        style="width: 50px; height: 50px; border-radius: 10px;">
                                                    <div>
                                                        <small class="name_cmt">{{ $comment->user->name }} <span
                                                                class="ml-2">({{ $comment->created_at->format('d/m/Y') }})</span></small>
                                                        <p class="text_comment">{{ $comment->content }}</p>
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="notification_cmt">Chưa có nhận xét nào cho sản phẩm này!</p>
                                    @endif
                                    <form action="{{ route('comments.create') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        @if (Auth::check())
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        @endif
                                        {{-- <textarea class="" name="content" rows="3"></textarea> --}}
                                        <input class="input_cmt " name="content" type="text"
                                            placeholder="Nhập bình luận của bạn vào đây">
                                        <button type="submit" class="btn btn-danger"
                                            @if (!Auth::check()) disabled title="Vui lòng đăng nhập để đăng nhận xét" @endif>
                                            Bình luận
                                        </button>
                                    </form>

                                    @if (!Auth::check())
                                        <p class="notification_signin">Vui lòng <a class="signin_cmt"
                                                href="{{ route('login') }}">đăng nhập</a> để đăng nhận xét.</p>
                                    @endif
                                </div>

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
                    {{-- @php
                    dd($Prd_type);
                @endphp --}}
                    @if ($Prd_type->id != $product->id)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg "
                                    @if (isset($Prd_type->variants[0]->image)) data-setbg="{{ Storage::url($Prd_type->variants[0]->image) }}" @endif>
                                    <ul class="product__hover">
                                        @if (isset($Prd_type->variants[0]->image))
                                            <li><a class="d-flex justify-content-center align-items-center"
                                                    href="{{ Storage::url($Prd_type->variants[0]->image) }}"
                                                    class="image-popup"><span class="arrow_expand"></span></a></li>
                                        @endif
                                        {{-- <li><a class="d-flex justify-content-center align-items-center"
                                                href=""><span class="icon_heart_alt"></span></a></li> --}}

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
                @endforeach -->
                
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

    <style>
        .name_cmt {
            font-weight: 700;
            margin-left: 15px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .text_comment {
            margin-left: 15px;
            font-weight: 500;
            font-size: 18px;
        }

        .notification_cmt {
            text-align: center;
            font-size: 20px;
            font-weight: 600;

        }

        .notification_signin {
            font-size: 20px;
            font-weight: 400;
            margin-top: 10px;
        }

        .input_cmt {
            border-radius: 10px;
            padding: 6px 0px;
            width: 290px;
            margin-top: 40px;
        }

        .signin_cmt {
            color: #e9250b;

        }

        .signin_cmt:hover {
            /* color: #d2d609; */
            color: #000
        }

        .More_cmt {
            font-weight: 600;
            font-size: 19px;
            margin-top: 10px;
        }

        .More_cmt:hover {
            color: #000;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const debounce = (callback, wait = 500) => {
            let timeoutId = null;
            return (...args) => {
                window.clearTimeout(timeoutId);
                timeoutId = window.setTimeout(() => {
                    callback(...args);
                }, wait);
            };
        };

        var newTotal = sessionStorage.getItem('newtotal');
        console.log(newTotal + 'newTotal');
        document.getElementById('showMoreComments').addEventListener('click', function() {
            document.getElementById('remainingComments').style.display = 'block';
            this.style.display = 'none'; // Ẩn nút "Hiển thị thêm" sau khi nhấp vào
        });

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

        function showErrorMessage() {
            document.getElementById('notificationError').classList.remove('hidden');

            // Tự động ẩn hộp thông báo sau một khoảng thời gian
            setTimeout(function() {
                document.getElementById('notificationError').classList.add('hidden');
            }, 2000); // 3000 miliseconds = 3 seconds
        }

        function showErrorMessage2() {
            document.getElementById('notificationError2').classList.remove('hidden');

            // Tự động ẩn hộp thông báo sau một khoảng thời gian
            setTimeout(function() {
                document.getElementById('notificationError2').classList.add('hidden');
            }, 2000); // 3000 miliseconds = 3 seconds
        }

        function addToCart() {
            var formData = $('#addtocart').serialize();
            $.ajax({
                type: 'POST',
                url: '{{ route('cart.store') }}',
                data: formData,
                success: function(response) {
                    showSuccessMessage();
                    sessionStorage.clear();
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
                    showSuccessMessage();
                    sessionStorage.clear();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Hiển thị thông báo lỗi nếu có
                }
            });
        }
        const product = <?php echo json_encode($product); ?>;
        const cart = <?php echo json_encode($cartContent); ?>;

        const attribute = {
            color: null,
            size: null
        }
        const colors = document.querySelectorAll('.color')
        const sizes = document.querySelectorAll('.size')

        colors.forEach(color => {
            color.onclick = (event) => {
                attribute.color = event.target.value
                const variant1 = product.variants.filter(p => p.color_id == attribute.color);
                variant1.forEach(variant => {
                    // console.log(variant.size_id);
                    // console.log(variant.quantity);
                });
                sizes.forEach(size => {
                    const sizeId = size.getAttribute('data-size-id');

                    if (sizeId) {
                        const isValidSize = variant1.some(variant => variant.size_id == sizeId);
                        if (!isValidSize) {
                            size.parentNode.style.display = 'none';
                        } else {
                            size.parentNode.style.display = '';

                        }

                    }

                });
                getVariant();
            }
        });

        sizes.forEach(size => {
            size.onclick = (event) => {
                attribute.size = event.target.value;

                // Gọi hàm getVariant() sau khi người dùng chọn một kích thước
                getVariant();
            }
        });

        
        function getVariant() {
            // console.log(addToCart);
            // console.log(product.variants.find(p => p.size_id == attribute.color && p.size_id == attribute.size));
            if (attribute.color !== null && attribute.size !== null) {
                const variant = product.variants.find(p => p.color_id == attribute.color && p.size_id == attribute.size)
                console.log(variant.id.toString());
                for (let key in cart) {
                    if (cart.hasOwnProperty(key) && cart[key].id === variant.id.toString()) {
                        console.log('qty: ', cart[key].qty);
                        var qtyCart = parseInt(cart[key].qty, 10);
                    }
                }

                let qty = document.querySelector('#qty').value;
                console.log(parseFloat(qty) + qtyCart);
                if (variant) {
                    // console.log(variant);
                    document.querySelector('#avalibale_quantity').innerText = variant.quantity
                    const addToCart = document.querySelector('#addToCart')
                    addToCart.disabled = false
                    document.querySelector('#variant_id').value = variant.id
                    
                    document.querySelector('#addToCart').onclick = debounce((event)=>  {
        //                 var app = {{ Js::from(Cart::instance('cart')->content()) }};
        // console.log(Object.values(app));
                        if (document.querySelector('#qty').value > variant.quantity) {
                            showErrorMessage();
                        } else if (parseFloat(qty) + qtyCart > variant.quantity) {
                            showErrorMessage2();
                        } else {
                            this.addToCart()
                            // setTimeout(() => window.location.reload(), 500) // load lại trạng thì bỏ comment này 
                            // qtyCart = parseFloat(qty) + qtyCart;
                            // console.log('qtyCart'+qtyCart);
                            // sessionStorage.setItem('cart',qtyCart)
                        }
                    })
                } else {
                    document.querySelector('#avalibale_quantity').innerText = "0"
                    const addToCart = document.querySelector('#addToCart')
                    addToCart.disabled = true
                    document.querySelector('#variant_id').value = null
                    document.querySelector('#addToCart').onclick = null
                }
            }
        }

        // hiển thị sl khi thêm giỏ hàng 
        document.addEventListener("DOMContentLoaded", function() {
        var addToCartBtn = document.querySelector(".cart-btn");
        addToCartBtn.addEventListener("click", function(event) {
            event.preventDefault(); 
            updateCartQuantity();
        });

        function updateCartQuantity() {

            var cartQuantityElement = document.querySelector(".tip");
            var currentQuantity = parseInt(cartQuantityElement.textContent);
            cartQuantityElement.textContent = currentQuantity + 1;
        }
    });
    </script>
@endsection
