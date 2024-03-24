@extends('layouts.client.layout_base')
@section('main')
 <div class="thank">
    <div class="thank-you-container ">
        <div class="thank-item">
            <h1 class="mb-3">
                <svg width="64px" height="64px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none">
    
                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    
                    <g id="SVGRepo_iconCarrier"> <path fill="#19d749" fill-rule="evenodd" d="M3 10a7 7 0 019.307-6.611 1 1 0 00.658-1.889 9 9 0 105.98 7.501 1 1 0 00-1.988.22A7 7 0 113 10zm14.75-5.338a1 1 0 00-1.5-1.324l-6.435 7.28-3.183-2.593a1 1 0 00-1.264 1.55l3.929 3.2a1 1 0 001.38-.113l7.072-8z"/> </g>
                    
                    </svg> <span class="ml-3">Cảm ơn bạn đã mua hàng!</span> 
            </h1>
            <p>Đơn hàng của bạn đã được nhận và đang được xử lý.</p>
            <p>Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</p>
        </div>
        <div class="thank-item2 p-4">
            <h4 class="my-4">Thông tin khách hàng</h4>
            <p class="font-weight-normal">Tên khách hàng: <span>Nguyễn Văn A</span></p>
            {{-- <label class="font-weight-bold" for="">Tên khách hàng:<span>Nguyễn Văn A</span></label> --}}
            <p class="font-weight-normal">Số điện thoại : <span>0986625323</span></p>
            <p class="font-weight-normal">Địa chỉ : <span> Cống 7 Miễn, Vĩnh Hoà Hưng Nam, Gò Quao, Kiên Giang, Việt Nam</span></p>
            <p class="font-weight-normal">Phương thức thanh toán: <span>Thanh toán sau khi lấy hàng</span></p>
            
        </div>
        <div>
            <div class="d-flex justify-content-between mt-4">
                <p><i class="fa-solid fa-circle-question"></i><span class="ml-3">Cần hộ trợ liên hệ chúng tôi : 09290219312</span></p>
                <div class="">
                    <div class="cart__btn">
                        <a href="/shop">TIẾP TỤC MUA SẮM</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <img src="https://khuevipro.sirv.com/Images/hinh-nen-powerpoint-cam-on_021545174.jpg" alt="" width="900px" height="300px"> --}}
    </div>
 </div>

@endsection