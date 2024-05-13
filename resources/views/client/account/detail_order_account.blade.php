@extends('layouts.client.layout_account')
@section('content')
<section class="border shadow rounded-custom py-2 px-4">
    <div class="">
        <div class="">
            <div class="">
                <h1>Thông tin đơn hàng</h1>
                   <hr>
                <div id="order-details">
                    <p><strong>Mã đơn hàng:</strong> {{ $orders->order_code }}</p>
                    <p><strong>Tên người nhận:</strong> {{ $orders->name }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $orders->phone }}</p>
                    <p><strong>Địa chỉ:</strong> {{ $orders->detail }},{{ $orders->address }}</p>

                    <p><strong>Phương thức thanh toán:</strong> {{ $orders->payment->method }}</p>
                </div>

            </div>
            <hr>
            {{-- <div class="suport">
            <div>
                <p>Cần hỗ trợ ? <a href="#">Liên hệ với chúng tôi</a></p>
            </div>
            <input type="button" value="Tiếp tục mua hàng" class="continue-shopping">
        </div> --}}
        </div>
        {{-- <div class="vertical-line"></div> --}}

        <div class="">
            @foreach ($orders->detail_order as $detail)
                @foreach ($detail->variants as $variant)
                    <div id="right-child">
                        <div>
                            <img style="max-width: 100px; border-radius: 10px;" src="{{ $variant->image ? Storage::url($variant->image) : '' }}"
                                alt="">
                        </div>
                        <div id="product">
                            <p id="p"><span class="text_pro">Tên sản phẩm:{{ $variant->product->name }}</span> <br>
                            <span class="text_pro">Kích cỡ:</span> <span class="text_pro1">{{ $variant->sizes->size }} </span><br>
                            <span class="text_pro">Màu:</span> <span>{{ $variant->colors->color }}</span><br>
                            <span class="text_pro">Số lượng:</span> <span>{{ $detail->quantity }} </span>
                            {{-- <p id="price">{{ $detail->price }}</p> --}}
                        </p>
                        </div>
                        <p></p>
                    </div><br>
                @endforeach
            @endforeach
            {{-- <hr />
            <div id="bill">
                <div class="left-column">
                    <p>Tạm tính</p>
                    <p>1.500.000&#8363</p>
                </div>
                <div class="right-column">
                    <p>Phí vận chuyển</p>
                    <p>Miễn phí</p>
                </div>
            </div> --}}
            <hr />
            <div class="total-all">
                <div class="-total">
                    <p>Tổng tiền thanh toán:
                        <span class="total-total">{{ number_format(intval($orders->total), 0, ',', '.') }} VNĐ</span>
                    </p>

                </div>

            </div>

        </div>

    </div>
    <a href="{{ route('order_history') }}" class="btn btn-dark ">Trở về</a>
    </div>
</section>
<style>
    .rounded-custom{
        border-radius: 20px;
    }
    #p {
        font-family: Arial, sans-serif;
        font-size: 16px;
        color: #333333;
        line-height: 1.5;
        
    }
    .text_pro{
        font-weight: 600;
        margin-right: 5px;
    }

</style>
@endsection
