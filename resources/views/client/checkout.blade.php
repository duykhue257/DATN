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
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#"> Có phiếu giảm giá?</a>
                        Nhấn vào đây để nhập mã của bạn.</h6>
                </div>
            </div>
            <form id="checkout-form" action="" method="POST" class="checkout__form">

                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <h5>CHI TIẾT THANH TOÁN</h5>
                        <div class="row">


                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Họ Tên <span>*</span></p>
                                    <input type="text" name="name" required>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Điện thoại <span>*</span></p>
                                    <input type="tel" name="phone" required>
                                </div>

                                <div class="checkout__form__input">
                                    <p>Thị trấn/Thành phố <span>*</span></p>
                                    <select required class="form-control" id="province" name="province"></select>

                                </div>
                                <div class="checkout__form__input">
                                    <p>Quận/Huyện <span>*</span></p>
                                    <select required class="form-control" id="district" name="district"></select>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Phường/Xã <span>*</span></p>
                                    <select required class="form-control" id="ward" name="ward"></select>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Địa chỉ <span>*</span></p>
                                    <input type="text" name="detail"
                                        placeholder="Số nhà, căn hộ, tòa nhà... ( tùy chọn )" required>
                                </div>
                            </div>


                            <div class="col-lg-12">


                                <div class="checkout__form__input">
                                    <p>Ghi chú đơn hàng <span>*</span></p>
                                    <input type="text"
                                        placeholder="Lưu ý về đơn đặt hàng của bạn, ví dụ: thông báo đặc biệt về giao hàng"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5>ĐƠN HÀNG CỦA BẠN</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">Product</span>
                                        <span class="top__text__right">Total</span>
                                    </li>
                                    @forelse ($cartItems as $item)
                                        <li>{{ $item->name }}-[{{ $item->size }}-{{ $item->color }}] x
                                            {{ $item->quantity }} <span>{{ $item->quantity * $item->price }}</span></li>

                                        <input type="hidden" name="detail_order[{{ $item->id }}][product_variant_id]"
                                            value="{{ $item->id }}">
                                        <input type="hidden" name="detail_order[{{ $item->id }}][price]"
                                            value="{{ $item->price }}">
                                        <input type="hidden" name="detail_order[{{ $item->id }}][name]"
                                            value="{{ $item->name }}">
                                        <input type="hidden" name="detail_order[{{ $item->id }}][quantity]"
                                            value="{{ $item->quantity }}">
                                    @empty
                                        chưa có sản phẩm
                                    @endforelse

                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Tổng tạm tính. <span>{{ Cart::instance('cart')->subtotal() }}</span></li>
                                    <li>Phí vận chuyển. <span>{{ Cart::instance('cart')->tax() }}</span></li>

                                    <li>Tổng cộng <span>{{ Cart::instance('cart')->total() }}</span></li>
                                    <input type="hidden" name="total" value="{{ Cart::instance('cart')->total() }}">
                                    <input type="hidden" name="code" value="{{ $orderNumber }}">
                                    <p>Giao hàng bởi : GIAO HÀNG NHANH</p>
                                    <input type="hidden" name="shipping_by" value="giào hàng nhanh">
                                </ul>
                            </div>
                            <div class="checkout__order__widget">
                                <label for="o-acc">
                                    Tạo một tài khoản?
                                    <input type="checkbox" id="o-acc">
                                    <span class="checkmark"></span>
                                </label>
                                <p>Tạo tài khoản am bằng cách nhập thông tin bên dưới.
                                    Nếu bạn là khách hàng thường xuyên đăng nhập ở đầu trang.</p>

                                @foreach ($payments as $payment)
                                    <label for="{{ $payment->method }}">
                                        {{ $payment->method }}
                                        <input type="radio" name="payment" id="{{ $payment->method }}"
                                            value="{{ $payment->id }}"
                                            @if ($payment->method === 'Thanh toán qua VNpay') required="required" @endif>
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach

                            </div>

                            <button type="submit" class="site-btn">Thanh Toán</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
{{-- {{ asset('js/vietnamelocalselector.js') }}
{{ asset('js/vietnamelocalselector.min.js') }}
{{ asset('js/vietnamelocalselector.nonoop.js') }} --}}
@push('scripts')
    <script>
        async function getProvince() {
            const response = await fetch("https://online-gateway.ghn.vn/shiip/public-api/master-data/province", {
                headers: {
                    token: "d5cd01a3-e11b-11ee-b290-0e922fc774da"
                }
            });
            const province = await response.json();
            //   console.log(province);


            if (province.code == 200) {
                const option = `<option value="">Chọn Tỉnh Thành</option>`;
                document.querySelector("#province").innerHTML = option + province.data.map((p) => {
                    return `<option value="${p.ProvinceID}">${p.ProvinceName}</option>`
                }).join("")
            }
        }

        getProvince();
        async function getDistrict(province_id) {
            const params = {
                province_id: province_id
            };

            const response = await fetch("https://online-gateway.ghn.vn/shiip/public-api/master-data/district", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'token': 'd5cd01a3-e11b-11ee-b290-0e922fc774da', // Thêm token nếu cần thiết
                },
                body: JSON.stringify(params)
            });

            const province = await response.json();
            // console.log(province);
            if (province.code == 200) {
                const option = `<option value="">Chọn Quận/Huyện</option>`;
                document.querySelector("#district").innerHTML = option + province.data.map((p) => {
                    return `<option value="${p.DistrictID}">${p.DistrictName}</option>`
                }).join("")
            }
        }

        async function getWard(district_id) {
            const params = {
                district_id: district_id
            };

            const response = await fetch("https://online-gateway.ghn.vn/shiip/public-api/master-data/ward", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'token': 'd5cd01a3-e11b-11ee-b290-0e922fc774da', // Thêm token nếu cần thiết
                },
                body: JSON.stringify(params)
            });

            const province = await response.json();
            // console.log(province);
            if (province.code == 200) {
                const option = `<option value="">Chọn Phường/Xã</option>`;
                document.querySelector("#ward").innerHTML = option + province.data.map((p) => {
                    return `<option value="${p.WardCode}">${p.WardName}</option>`
                }).join("")
            }
        }
    </script>
    <script>
        document.querySelector('#province').addEventListener('change', (event) => {
            // console.log(event.target.value);
            if (event.target.value) {
                getDistrict(Number(event.target.value))
            }
        })
        document.querySelector('#district').addEventListener('change', (event) => {
            // console.log(event.target.value);
            if (event.target.value) {
                getWard(Number(event.target.value))
            }
        })

        document.addEventListener('DOMContentLoaded', function() {
            var checkoutForm = document.getElementById('checkout-form');
            var paymentRadios = document.querySelectorAll('input[name="payment"]');

            paymentRadios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    if (this.value === '2') {
                        checkoutForm.setAttribute('action', '{{ route('vnpay_payment') }}');
                    } else {
                        checkoutForm.setAttribute('action', '{{ route('checkout') }}');
                    }
                });
            });
        });
    </script>
@endpush
