<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="/home"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu align-items-center">
                    <ul>
                        <li class=""><a href="/home">Trang chủ</a></li>

                       
                        <li><a href="/shop">Sản phẩm</a></li>
                        {{-- <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="/product-details.html">Thông tin chi tiết sản phẩm</a></li>
                                <li><a href="/cart">Giỏ hàng</a></li>
                                <li><a href="/checkout.html">Thanh toán</a></li>
                                <li><a href="/blog-details.html">Chi tiết Blog</a></li>
                            </ul>
                        </li> --}}
                        <li><a href="/blog">Tin tức</a></li>
                        <li><a href="/contact">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">

                    <!-- Hiển thị nút đăng nhập và đăng ký nếu người dùng chưa đăng nhập -->
                    <div class="header__right__auth">
                        {{-- @if (Auth::check())
                            <!-- Hiển thị nút đăng xuất nếu người dùng đã đăng nhập -->
                            <form action="{{ route('logout') }}"
                                method="POST">
                                @csrf
                                <a  type="submit"><a href="">Đăng xuất</a></a>
                            </form>
                        @else --}}
                        @if (Auth::check())
                         <a class="fs-6">Xin chào, {{ Auth::user()->name }}</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a><button class="btn fs-6 btn-borderless" type="submit">Đăng xuất</button></a>
                            </form>
                            @else
                                <a href="{{ route('login') }}">Đăng nhập</a>
                                <a href="{{ route('signup') }}">Đăng ký</a>
                        @endif
                    </div>
                    {{-- @endif --}}
                    <ul class="header__right__widget">
                        <li><i class="fa-regular fa-user"></i></li>
                        <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                        <li><a href="/cart"><span class="icon_bag_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>