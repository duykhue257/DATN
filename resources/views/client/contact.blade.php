@extends('layouts.layout_base')
@section('main')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Liên Hệ</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__content">
                    <div class="contact__address">
                        <h5>THÔNG TIN LIÊN LẠC</h5>
                        <ul>
                            <li>
                                <h6><i class="fa fa-map-marker"></i> Địa chỉ</h6>
                                <p>Tòa nhà FPT Polytechnic.
                                    Tòa nhà FPT Polytechnic, P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội 100000</p>
                            </li>
                            <li>
                                <h6><i class="fa fa-phone"></i> Phone</h6>
                                <p><span>0362889950</span><span>19004375</span></p>
                            </li>
                            <li>
                                <h6><i class="fa fa-headphones"></i> Hỗ trợ</h6>
                                <p>caodangfpt.hn@fpt.edu.vn</p>
                            </li>
                        </ul>
                    </div>
                    <div class="contact__form">
                        <h5>GỬI TIN NHẮN</h5>
                        <form action="#">
                            <input type="text" placeholder="Tên">
                            <input type="text" placeholder="Email">
                            <input type="text" placeholder="Website">
                            <textarea placeholder="Tin nhắn"></textarea>
                            <button type="submit" class="site-btn">Gửi tin nhắn</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__map">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8627177447597!2d105.74373408991936!3d21.038178321203084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455305afd834b%3A0x17268e09af37081e!2sT%C3%B2a%20nh%C3%A0%20FPT%20Polytechnic.!5e0!3m2!1svi!2s!4v1706181786097!5m2!1svi!2s"
                    height="780" style="border:0" allowfullscreen="">
                </iframe>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Contact Section End -->
@endsection