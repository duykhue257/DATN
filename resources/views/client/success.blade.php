@extends('layouts.client.layout_base')
@section('main')
<div class="main">
        <div class="left">
            <div id="logo">
                <img src="img/LogoCM.png" alt="Dumemay">
            </div>

            

            <div class="information">
                <h1>Thông tin đơn hàng</h1>
                <div id="order-details">
                    <p><strong>Tên:</strong> Tuấn image</p>
                    <p><strong>Số điện thoại:</strong> 0862114048</p>
                    <p><strong>Địa chỉ:</strong> Hà Nội, Quận Bắc Từ Liêm</p>
                    <p><strong>Thành phố:</strong> Hà Nội</p>
                    <p><strong>Quốc gia:</strong> Vietnam</p>
                    <p><strong>Phương thức thanh toán:</strong> Thanh toán khi giao hàng (COD)</p>
                </div>
            </div>
            <div class="suport">
                <div>
                    <p>Cần hỗ trợ ? <a href="#">Liên hệ với chúng tôi</a></p>
                </div>
                <input type="button" value="Tiếp tục mua hàng" class="continue-shopping">
            </div>
        </div>
        <div class="vertical-line"></div>

        <div class="right">
            <div id="right-child">
                <div>
                    <img src="https://picsum.photos/100/100" alt="">
                </div>
                <div id="product">
                    <p id="p">Áo khoác da lộn báic cổ cao <br>
                        EWCL002 <br>
                        <span>Đen/S</span>
                    </p>
                    <p id="price">1.500.000&#8363</p>
                </div>
            </div>
            <hr/>
            <div id="bill">
                <div class="left-column">
                    <p>Tạm tính</p>
                    <p>1.500.000&#8363</p>
                </div>
                <div class="right-column">
                    <p>Phí vận chuyển</p>
                    <p>Miễn phí</p> 
                </div>
            </div>
            <hr/>
            <div class="total-all">
                <div class="left-total">
                    <p>tổng cộng</p>
                </div>
                <div class="right-total">
                    <p class="currency">VND</p>
                    <p class="total-total">1.500.000</p>
                    <p class="currency">&#8363</p>
                </div>
            </div>
            
            </div>
            
        </div>
    </div>
@endsection