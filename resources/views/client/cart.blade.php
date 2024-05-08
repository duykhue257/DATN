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
                                            {{-- <p>{{ $item->quanty }}</p> --}}
                                            <td><input @if ($item->is_checked) {{ 'checked' }} @endif
                                                    type="checkbox">

                                            </td>
                                            <td class="cart__product__item">
                                                <img src="{{ Storage::url($item->product_image) }}"
                                                    alt="{{ $item->product_name }}">
                                                <div class="cart__product__item__title">
                                                    <h6>{{ $item->name }}</h6>
                                                </div>
                                            </td>
                                            <td class="cart__price">
                                                {{ str_replace(',', '.', number_format($item->price)) }}đ</td>

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
                                                    <input class="quantity" data-rowid="{{ $item->rowId }}" name="quantity"
                                                        type="number" min="1" max="{{ $item->quanty }}"
                                                        onchange="updateQuantity(this)" value="{{ $item->qty }}">
                                                </div>
                                            </td>




                                            {{-- <td class="cart__total">{{ str_replace(',', '.', $item->subtotal()) }}đ</td> --}}
                                            <td class="cart__total" data-product-id="{{ $item->variant_id }}">
                                                {{ str_replace(',', '.', $item->subtotal()) }}đ</td>


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
                <div id="notification" class="notification hidden">
                    <svg id='svgsuccess' class="hidden" width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">

                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                        <g id="SVGRepo_iconCarrier">
                            <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#47be37" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </g>

                    </svg>

                    <svg class="hidden" width="64px" height="64px" id="svgError" viewBox="0 0 24 24" fill="none"
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
                    <p id="notificationContent"></p>
                </div>
                <div id="notificationError" class="notificationError hidden">
                    <svg  width="64px" height="64px"  viewBox="0 0 24 24" fill="none"
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
                   Bạn đang nhập quá số lượng hiện có
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="discount__content">

                            <h6>CHỌN MÃ GIẢM GIÁ (chỉ có thể áp dụng một mã)</h6>

                            <form id="applyDiscountForm" action="{{ route('apply.discount') }}" method="POST">
                                @csrf
                                <input class="text-center" type="text" name="discount_code" id="discount_code"
                                    readonly>
                                <button type="button" class="site-btn btn btn-danger" onclick="cancelDiscount()"><span
                                        style="white-space: nowrap;">&nbsp&nbspHủy&nbsp&nbsp</span></button>


                                {{-- <button class="site-btn btn btn-danger" type="submit" onclick="cancelDiscount()">Hủy mã giảm giá</button> --}}
                            </form><br>




                            <h6>MÃ CÓ THỂ DÙNG</h6><br>
                            @foreach ($discount as $dis)
                                <form action="#" class="discount-form">
                                    <input class="text-center discount-code border-1 rounded-lg input-hover" type="text" name="selected_discount_code"
                                        value="{{ $dis->code }}({{ $dis->percent }}%)" readonly>
                                    <button type="button" class="button_voucher site-btn choose-discount"
                                        data-discount="{{ $dis->code }}">&nbspdùng
                                    </button>
                                </form>
                            @endforeach




                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-2">
                        <div class="cart__total__procced">
                            <h6>TỔNG SỐ GIỎ HÀNG</h6>
                            <ul>
                                <li>Tổng tạm tính:
                                    <span
                                        id="subtotal">{{ str_replace(',', '.', Cart::instance('cart')->subtotal()) }}đ</span>
                                </li>
                                <li>Giảm giá: <span id="discountAmount">0đ</span></li>
                                <li>Phí giao hàng: <span>{{ str_replace(',', '.', Cart::instance('cart')->tax()) }}đ</span>
                                </li>
                                <li>Tổng cộng: <span
                                        id="total">{{ str_replace(',', '.', Cart::instance('cart')->total()) }}đ</span>
                                    {{-- <p id="percent">percent</p> --}}
                                </li>

                                <input type="hidden" id="checkoutTotalInput" name="checkoutTotalInput"
                                    value="{{ Cart::instance('cart')->total() }}">
                            </ul>


                            <a href="/checkout" class="primary-btn">TIẾN HÀNH THANH TOÁN</a>
                        </div>
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
    </section>
    <style>
        .input-hover{
            font-size: 20px;
            font-weight: 600;
            transition: background-color 0.3s;
            background-color: black;
            color: #ffffff;
            margin: 7px 0px;
        }
        /* .input-hover:hover {
            background-color: #ffffff;  
        } */
        .button_voucher{
            background-color: #000;
            border: none;
            color: white;
            margin: 7px 0px;
        }
        .button_voucher:hover{
            color: red;
        }
    </style>
    
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
    @php
        // $numProducts = count($cartItems);
        // dd($numProducts);
    @endphp

@endsection

@push('scripts')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script>
        //  var numProducts = $('tbody').children('tr').length;
        // var percent;
        // console.log('percent :' + percent);
        var discountStr = sessionStorage.getItem('discount');
        var discount = parseFloat(discountStr);

        if (!isNaN(discount)) {
            console.log("Discount:", discount);
            // Sử dụng giá trị discount ở đây nếu nó là một số hợp lệ
            if (discount === 0) {
                $('#discountAmount').text(discount + 'đ');
            } else {
                $('#discountAmount').text('-' + parseFloat(discount).toLocaleString('vi-VN') + 'đ');
            }
        } else {
            console.log("Giá trị không hợp lệ trong sessionStorage.");
            var discountText = $('#discountAmount').text();
            var totalNumber = discountText.replace(/\D/g, '');
            console.log(totalNumber);
            sessionStorage.setItem('discount', totalNumber);
        }

        var total = sessionStorage.getItem('newtotal');
        var totalNumber = parseFloat(total);

        if (!isNaN(totalNumber)) {
            var formattedTotal = totalNumber.toLocaleString('vi-VN', {
                minimumFractionDigits: 0
            });
            $('#total').text(formattedTotal + 'đ');
            console.log('Tổng: ' + formattedTotal);
        } else {
            console.log('Giá trị không hợp lệ trong sessionStorage.');
            var totalText = $('#total').text();
            var totalNumber = totalText.replace(/\D/g, '');
            console.log(totalNumber);
            sessionStorage.setItem('newtotal', totalNumber);
        }



        function updateQuantity(qty) {
            var rowId = $(qty).data('rowid');
            var quantity = $(qty).val();

            $.ajax({
                url: "{{ route('cart.update') }}",
                type: "PUT",
                data: {

                    rowId: rowId,
                    quantity: quantity,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    if (response.success) {
                        // var numberOfItems = $('.shop__cart__table tbody tr').length;
                        var productId = $(qty).closest('tr').find('.cart__total').data('product-id');
                        var cartTotalElement = $('.cart__total[data-product-id="' + productId + '"]');
                        cartTotalElement.text(response.newSubTotal.toLocaleString('vi-VN') + 'đ');

                        var newTotalSum = 0;

                        $('.shop__cart__table tbody tr').each(function() {
                            var productId = $(this).find('.cart__total').data('product-id');
                            var cartTotalElement = $('.cart__total[data-product-id="' + productId +
                                '"]');
                            var newTotalString = cartTotalElement.text().replace('đ', '').replace('.',
                                '').trim();
                            var subTotal = parseFloat(newTotalString);
                            if (!isNaN(subTotal)) {
                                newTotalSum += subTotal;
                            }
                        });
                        //  console.log(newTotalSum);
                        sessionStorage.setItem('totalSum', newTotalSum);
                        var loggedValue = sessionStorage.getItem('totalSum');
                        // console.log('Giá trị đã lưu trong sessionStorage: ' + loggedValue);

                        var taxString = "{{ Cart::instance('cart')->tax() }}";
                        var taxNumber = parseFloat(taxString.replace(',', ''));


                        $('#subtotal').text(newTotalSum.toLocaleString('vi-VN') + 'đ');

                        // var discount = $('#discountAmount').text();
                        // var subtotalNumber = discount.replace(/\D/g, '');
                        // console.log(discount + 'cccoc');
                        console.log('sum :' + newTotalSum);
                        var percent = sessionStorage.getItem('percent');
                        var discountAmountNumber = parseInt(newTotalSum * (percent / 100));
                        var discountAmount = discountAmountNumber / 1000;
                        console.log(discountAmount + 'mount');
                        sessionStorage.setItem('discount', discountAmount);

                        if (discountAmountNumber == 0) {
                            $('#discountAmount').text(parseFloat(discountAmountNumber).toLocaleString(
                                'vi-VN') + 'đ');
                        } else {
                            $('#discountAmount').text('-' + parseFloat(discountAmountNumber).toLocaleString(
                                'vi-VN') + 'đ');
                        }


                        // console.log('voucher' + discountAmount);
                        // console.log('newTotalSum' + newTotalSum);
                        //   console.log(savedPercent);
                        var newtotal = newTotalSum - taxNumber - discountAmountNumber;
                        newtotal = parseInt(newtotal);
                        console.log('newtotal :' + newtotal);
                        // console.log('response :'+response.discountAmount);
                        sessionStorage.setItem('newtotal', newtotal);
                        //                         var newTotal = sessionStorage.getItem('newtotal');
                        // console.log(newTotal+'hạdkasjhk');
                        $('#total').text(newtotal.toLocaleString('vi-VN') + 'đ');
                        // console.log('Tổng mới: ' + newtotal.toLocaleString('vi-VN') + 'đ');
                    } else {
                        // Cập nhật thất bại
                        console.log('Cập nhật số lượng thất bại!');
                        // Hiển thị thông báo lỗi nếu cần
                    }
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi nếu có
                    console.error('Lỗi: ' + error);
                    // Hiển thị thông báo lỗi nếu cần
                }
            });
        }


        // function updateQuantity(qty) {
        //     $('#rowId').val($(qty).data('rowid'));
        //     $('#quantity').val($(qty).val());
        //     $('#updateCartQty').submit();
        // }



        const chooseButtons = document.querySelectorAll('.choose-discount');
        chooseButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Lấy giá trị mã giảm giá từ thuộc tính data
                const discountCode = button.getAttribute('data-discount');

                // Đặt giá trị của trường nhập ở form áp dụng mã
                document.getElementById('discount_code').value = discountCode;

                // // Gửi form áp dụng mã
                // document.getElementById('applyDiscountForm').submit();

                $('#applyDiscountForm').submit();
            });
        });

        const variant = <?php echo json_encode($cartItems); ?>;

        document.querySelectorAll('.quantity').forEach(element => {
            let defaultquantity = element.value;
            let rowId = element.dataset.rowid; 
            let maxQuantity = parseFloat(element.getAttribute('max'));

            console.log('defaultquantity' + defaultquantity);
            console.log('maxQuantity' + maxQuantity);
            let originalValue = element.value;

            element.onchange = () => {
                if (element.value > maxQuantity) {
                    element.value = maxQuantity;
                    if(element.value == maxQuantity){
                        updateQuantity(element);
                    }
                    alert('Số lượng hàng vượt quá có sẵn');
                }else if(element.value == 0){
                    element.value = originalValue;
                    alert('Số lượng không hợp lệ');
                }else {
                    updateQuantity(element);
                }
            };
        });





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
                        percent = response.percent;
                        sessionStorage.setItem('percent', percent);
                        // abc();
                        // Chuyển đổi số thành chuỗi với dấu phẩy ngăn cách hàng nghìn và không có số thập phân
                        var discountAmountFormatted = response.discountAmount.toLocaleString(
                            'vi-VN');
                        sessionStorage.setItem('discount', discountAmountFormatted);

                        // Hiển thị giá trị giảm giá trên giao diện
                        $('#discountAmount').text('-' + discountAmountFormatted + 'đ');

                        // Lấy giá trị subtotal() từ blade template và chuyển đổi nó thành số dấu phẩy động
                        // var subtotalString = "{{ Cart::instance('cart')->subtotal() }}";
                        // var subtotalNumber = parseFloat(subtotalString.replace(',', ''));

                        var subtotalText = $('#subtotal').text();

                        // Loại bỏ ký tự không mong muốn từ chuỗi và chỉ giữ lại số
                        var subtotalNumber = subtotalText.replace(/\D/g, '');

                        // Chuyển đổi chuỗi số sang dạng số nguyên
                        subtotalNumber = parseInt(subtotalNumber);

                        // Lấy giá trị tax() từ blade template và chuyển đổi nó thành số dấu phẩy động
                        var taxString = "{{ Cart::instance('cart')->tax() }}";
                        var taxNumber = parseFloat(taxString.replace(',', ''));
                        sessionStorage.setItem('totalSum', taxNumber);
                        // Lấy giá trị giảm giá từ response và chuyển đổi nó thành số dấu phẩy động
                        var discountNumber = parseFloat(response.discountAmount);


                        var discount = sessionStorage.getItem('discount');
                        console.log('abc :' + discount);
                        // $('#discountAmount').text('-' + discount.toLocaleString('vi-VN') + 'đ');

                        // Tính toán tổng cộng mới
                        var newTotal = subtotalNumber + taxNumber - discountNumber;
                        console.log(newTotal + 'new');
                        sessionStorage.setItem('newtotal', newTotal);
                        $('#checkoutTotalInput').val(
                            newTotal); // Gán giá trị newTotal vào input ẩn

                        // Hiển thị tổng cộng mới trên giao diện
                        $('#total').text(newTotal.toLocaleString('vi-VN') + 'đ');

                        // Hiển thị thông báo thành công
                        // alert('Áp dụng mã giảm giá thành công');
                        showNotification(response.message, false);


                    },
                    error: function(error) {
                        // Hiển thị thông báo lỗi
                        // alert('Có lỗi xảy ra: ' + error.responseJSON.message);
                        showNotification(error.responseJSON.message, true);
                    }
                });
            });
        });


        //         var global; // Biến toàn cục

        // function abc() {
        //     global = percent; // Gán giá trị của percent cho biến toàn cục global
        // }

        // abc(); // Gọi hàm abc để gán giá trị
        // console.log('ll'+global); // Log giá trị của biến toàn cục global

        $(document).ready(function() {
            // Kiểm tra session để hiển thị thông tin giảm giá khi trang được load lại
            var discountAmount = "{{ session('discountAmount') }}";
            if (discountAmount) {
                var discountAmountFormatted = parseFloat(discountAmount).toLocaleString('vi-VN');
                $('#discountAmount').text('-' + discountAmountFormatted + 'đ');

                // Cập nhật tổng cộng mới sau khi áp dụng giảm giá
                var newTotal = parseFloat($('#checkoutTotalInput').val().replace(',', '')) - parseFloat(
                    discountAmount);
                $('#total').text(newTotal.toLocaleString('vi-VN') + 'đ');
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
                    $('#selectedDiscount').val('');
                    var discount = 0;
                    sessionStorage.setItem('discount', discount);
                    // Cập nhật tổng cộng mới sau khi hủy giảm giá
                    var subtotalText = $('#subtotal').text();

                    // Loại bỏ ký tự không mong muốn từ chuỗi và chỉ giữ lại số
                    var subtotalNumber = subtotalText.replace(/\D/g, '');

                    // Chuyển đổi chuỗi số sang dạng số nguyên
                    subtotalNumber = parseInt(subtotalNumber);

                    var taxString = "{{ Cart::instance('cart')->tax() }}";
                    var taxNumber = parseFloat(taxString.replace(',', ''));

                    var newTotal = subtotalNumber + taxNumber;
                    console.log(newTotal);
                    $('#total').text(newTotal.toLocaleString('vi-VN') + 'đ');
                    sessionStorage.setItem('newtotal', newTotal);
                    var percent = 0;
                    sessionStorage.setItem('percent', percent);

                    // Gửi giá trị total mới lên server để lưu vào session
                    // updateCartTotal(newTotal);
                    // console.log(response.message);
                    // Hiển thị thông báo thành công
                    showNotification(response.message, false);
                },
                error: function(error) {
                    // Hiển thị thông báo lỗi
                    showNotification(error.responseJSON.message, true);
                }
            });
        }
        // thong bao
        function showNotification(message, isError) {
            $('#notification').removeClass('hidden');
            $('#notificationContent').text(message);
            // $('#notificationContent').text(message);
            if (isError) {
                $('#svgError').removeClass('hidden');
            } else {
                $('#svgsuccess').removeClass('hidden');
            }
            // Tự động ẩn hộp thông báo sau một khoảng thời gian
            setTimeout(function() {
                $('#notification').addClass('hidden');
                $('#svgError').addClass('hidden');
                $('#svgsuccess').addClass('hidden');
            }, 3000); // 3000 miliseconds = 3 seconds
        }
        function showErrorMessage() {
            document.getElementById('notificationError').classList.remove('hidden');

            // Tự động ẩn hộp thông báo sau một khoảng thời gian
            setTimeout(function() {
                document.getElementById('notificationError').classList.add('hidden');
            }, 2600); // 3000 miliseconds = 3 seconds
        }
    </script>
@endpush

