@extends('layouts.client.layout_base')
@section('main')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                        <th>Chọn</th>
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
                                            <td><input @if ($item->is_checked)
                                                {{ 'checked' }}
                                            @endif type="checkbox">
                                                
                                            </td>
                                            <td class="cart__product__item">
                                                <img src="{{ Storage::url($item->product_image) }}"
                                                    alt="{{ $item->product_name }}">
                                                <div class="cart__product__item__title">
                                                    <h6>{{ $item->name }}</h6>
                                                </div>
                                            </td>
                                            <td class="cart__price">{{ Number_format($item->price) }}đ</td>
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
                                                    <input class="quantity" data-rowid="{{ $item->rowId }}" name="quantity" type="number"
                                                        min="1" max="{{ $productVariant->quantity }}" onchange="updateQuantity(this)"
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
                    <a href="javascript:void(0)" onclick="clearCart()">XÓA TOÀN BỘ GIỎ HÀNG</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">

                    <h6>NHẬP MÃ GIẢM GIÁ</h6>
                    <form id="applyDiscountForm" action="{{ route('apply.discount') }}" method="POST">
                        @csrf
                        <input type="text" name="discount_code" id="discount_code"
                            placeholder="Nhập mã giảm giá của bạn">
                        <button type="submit" class="site-btn">apply</button>
                    </form>
                    <div class="cancel-discount-btn">
                        <button type="button" onclick="cancelDiscount()">Hủy mã giảm giá</button>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>TỔNG SỐ GIỎ HÀNG</h6>
                    <ul>
                        <li>Tổng tạm tính: <span>{{ Cart::instance('cart')->subtotal() }}đ</span></li>
                        <li>Giảm giá: <span id="discountAmount">0đ</span></li>
                        <li>Phí giao hàng: <span>{{ Cart::instance('cart')->tax() }}đ</span></li>
                        <li>Tổng cộng: <span id="total">{{ Cart::instance('cart')->total() }}đ</span></li>
                        <input type="hidden" id="checkoutTotalInput" name="checkoutTotalInput"
                            value="{{ Cart::instance('cart')->total() }}">
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
        const variant = <?php echo json_encode($productVariant); ?>;
        
        document.querySelectorAll('.quantity').forEach(element => {
            let defaultquantity = element.value
            element.onchange = () => {
                // console.log(element.value)
                if(element.value > variant.quantity){
                    element.value = variant.quantity
                    alert('số lượng hàng vượt quá có sẵn')
                }else{
                    updateQuantity(element)
                }
            }
        });

        function updateQuantity(qty) {
            $('#rowId').val($(qty).data('rowid'));
            $('#quantity').val($(qty).val());
            $('#updateCartQty').submit();
        }


        function removeItemFromCart(rowId) {
            $('#rowId_D').val(rowId);
            $('#deleteFromCart').submit();
        }

        function clearCart() {
            $('#clearCart').submit();
        }

        $(document).ready(function() {
            $('#applyDiscountForm').submit(function(event) {
                event.preventDefault(); // Ngăn chặn form submit mặc định

                // Gửi yêu cầu AJAX
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response) {
                        // Chuyển đổi số thành chuỗi với dấu phẩy ngăn cách hàng nghìn và không có số thập phân
                        var discountAmountFormatted = response.discountAmount.toLocaleString(
                            'en-US');

                        // Cập nhật giá trên view với giá mới từ kết quả trả về
                        $('#discountAmount').text('-' + discountAmountFormatted + 'đ');

                        // Lấy giá trị subtotal() từ blade template và chuyển đổi nó thành số dấu phẩy động
                        var subtotalString = "{{ Cart::instance('cart')->subtotal() }}";
                        var subtotalNumber = parseFloat(subtotalString.replace(',', ''));

                        // Lấy giá trị tax() từ blade template và chuyển đổi nó thành số dấu phẩy động
                        var taxString = "{{ Cart::instance('cart')->tax() }}";
                        var taxNumber = parseFloat(taxString.replace(',', ''));

                        // Lấy giá trị giảm giá từ response và chuyển đổi nó thành số dấu phẩy động
                        var discountNumber = parseFloat(response.discountAmount);

                        // Tính toán tổng cộng mới
                        var newTotal = subtotalNumber + taxNumber - discountNumber;
                        // Sau khi tính toán newTotal
                        $('#checkoutTotalInput').val(
                            newTotal); // Gán giá trị newTotal vào input ẩn

                        // Hiển thị tổng cộng mới trên giao diện
                        $('#total').text(newTotal.toLocaleString('en-US') + 'đ');

                        // Hiển thị thông báo thành công
                        alert('Áp dụng mã giảm giá thành công');

                    },
                    error: function(error) {
                        // Hiển thị thông báo lỗi
                        alert('Có lỗi xảy ra: ' + error.responseJSON.message);
                    }
                });
            });
        });

        $(document).ready(function() {
            // Kiểm tra session để hiển thị thông tin giảm giá khi trang được load lại
            var discountAmount = "{{ session('discountAmount') }}";
            if (discountAmount) {
                var discountAmountFormatted = parseFloat(discountAmount).toLocaleString('en-US');
                $('#discountAmount').text('-' + discountAmountFormatted + 'đ');

                // Cập nhật tổng cộng mới sau khi áp dụng giảm giá
                var newTotal = parseFloat($('#checkoutTotalInput').val().replace(',', '')) - parseFloat(
                    discountAmount);
                $('#total').text(newTotal.toLocaleString('en-US') + 'đ');
            }
        });
        function cancelDiscount() {
            $.ajax({
                type: 'POST',
                url: "{{ route('cancel.discount') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    // Xóa thông tin giảm giá trên giao diện
                    $('#discountAmount').text('0đ');

                    // Cập nhật tổng cộng mới sau khi hủy giảm giá
                    var subtotalString = "{{ Cart::instance('cart')->subtotal() }}";
                    var subtotalNumber = parseFloat(subtotalString.replace(',', ''));

                    var taxString = "{{ Cart::instance('cart')->tax() }}";
                    var taxNumber = parseFloat(taxString.replace(',', ''));

                    var newTotal = subtotalNumber + taxNumber;
                    $('#total').text(newTotal.toLocaleString('en-US') + 'đ');

                    // Gửi giá trị total mới lên server để lưu vào session
                    updateCartTotal(newTotal);

                    // Hiển thị thông báo thành công
                    alert(response.message);
                },
                error: function(error) {
                    // Hiển thị thông báo lỗi
                    alert( error.responseJSON.message);
                }
            });
        }
    </script>
@endpush
