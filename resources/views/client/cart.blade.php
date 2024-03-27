@extends('layouts.client.layout_base')
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

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        @if ($cartItems->Count() > 0)
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shop__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>SẢN PHẨM</th>
                                        <th>GIÁ</th>
                                        <th>Kích Thước</th>
                                        <th>Màu Sắc</th>
                                        <th>SỐ LƯỢNG</th>
                                        <th>TỔNG CỘNG</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($cartItems as $item)
                                        <tr>

                                            <td class="cart__product__item">
                                                <img src="{{ Storage::url($item->product_image) }}"
                                                    alt="{{ $item->product_name }}">
                                                <div class="cart__product__item__title">
                                                    <h6>{{ $item->name }}</h6>
                                                </div>
                                            </td>
                                            <td class="cart__price">{{ $item->price }}đ</td>
                                            <td class="cart__price">
                                             <div class="cart__product__item__title ">
                                                    <h6>{{ $item->size }}</h6>
                                              </div>
                                            </td>
                                            <td class="cart__price">
                                                <div class="cart__product__item__title">
                                                       <h6>{{ $item->color }}</h6>
                                                   </div>
                                               </td>
                                            <td class="cart__quantity">
                                                <div class="pro-qty">
                                                    <input data-rowid="{{ $item->rowId }}" name="quantity" type="number"
                                                        min="1" onchange="updateQuantity(this)"
                                                        value="{{ $item->qty }}">
                                                </div>
                                            </td>

                                            <script>
                                                function updateQuantity(input) {
                                                    var rowId = $(input).data('rowid');
                                                    var newQuantity = $(input).val();
                                                    var price = parseFloat("{{ $item->product_price }}"); // Lấy giá của sản phẩm từ blade template

                                                    // Tính toán giá mới
                                                    var newTotal = price * newQuantity;

                                                    // Cập nhật giá mới vào ô tương ứng
                                                    $(input).closest('tr').find('.cart__total').text(newTotal.toFixed(2) + 'đ');
                                                }
                                            </script>

                                            <td class="cart__total">{{ $item->subtotal() }}đ
                                                {{-- @php
                                                    dd($item->subtotal());
                                                @endphp --}}
                                            </td>
                                            <!-- Tính tổng giá trị sản phẩm bằng cách nhân giá và số lượng -->

                                            <td class="cart__close">
                                                <a href="javascript:void(0)"
                                                    onclick="removeItemFromCart('{{ $item->rowId }}')">
                                                    <span class="icon_close"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            @else
                <div class="row mb-5">
                    <div class="col-md-12 text-center ">
                        <h2>Giỏ hàng trống !</h2>
                        <h5>Thêm sản phẩm ngay</h5>
                        <a href="/shop" class="btn btn-dark mt-5">Về trang sản phẩm</a>
                    </div>
                </div>
        @endif
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="/shop">TIẾP TỤC MUA SẮM</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                     <a href="javascript:void(0)" onclick="clearCart()" >XÓA TOÀN BỘ GIỎ HÀNG</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">
                    <h6>NHẬP MÃ GIẢM GIÁ</h6>
                    <form id="applyDiscountForm" action="{{ route('apply.discount') }}" method="POST">
                        @csrf
                        <input type="text" name="discount_code" id="discount_code" placeholder="Nhập mã giảm giá của bạn">
                        <button type="submit" class="site-btn">apply</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>TỔNG SỐ GIỎ HÀNG</h6>
                    <ul>
                        <li>Tổng tạm tính <span>{{ Cart::instance('cart')->subtotal() }}đ</span></li>
                        <li>Giảm giá 
                            <span>
                                @php
                                    $totalDiscount = 0;
                                    foreach(Cart::instance('cart')->content() as $item) {
                                        $totalDiscount += $item->discount * $item->qty;
                                    }
                                    echo $totalDiscount . 'đ';
                                @endphp
                            </span>
                        </li>
                        <li>Phí giao hàng <span>{{ Cart::instance('cart')->tax() }}đ</span></li>
                        <li>Tổng cộng <span>{{ Cart::instance('cart')->total() - $totalDiscount }}đ</span></li>
                    </ul>
                    
                    <a href="/checkout" class="primary-btn">TIẾN HÀNH THANH TOÁN</a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->
    <form id="updateCartQty" action="{{ route('cart.update') }}" method="POST">
        @csrf
        @method('put')
        <input type="hidden" id="rowId" name="rowId" />
        <input type="hidden" id="quantity" name="quantity" />
    </form>
    <form id="deleteFromCart" action="{{ route('cart.remove') }}" method="post">
        @csrf
        @method('delete')
        <input type="hidden" id="rowId_D" name="rowId" />
    </form>
    <form id="clearCart" action="{{ route('cart.clear') }}" method="post">
        @csrf
        @method('delete')
    </form>
@endsection

@push('scripts')
    <script>
        function updateQuantity(qty) {
            $('#rowId').val($(qty).data('rowid'));
            $('#quantity').val($(qty).val());
            $('#updateCartQty').submit();
        }

        var selectedColor = null;

        // Hàm xử lý khi người dùng thay đổi lựa chọn
        function updateColor(color) {
            selectedColor = $(color).val();
            $('#rowId').val($(color).data('rowid'));
            $('#updateCartQty').submit();
        }

        // Sự kiện xảy ra khi trang được tải lại
        $(document).ready(function() {
            // Đặt lại giá trị mặc định cho select box
            if (selectedColor !== null) {
                $('#color_id').val(selectedColor);
            }
        });

        function removeItemFromCart(rowId) {
            $('#rowId_D').val(rowId);
            $('#deleteFromCart').submit();
        }

        function clearCart() {
            $('#clearCart').submit();
        }
    </script>
@endpush
