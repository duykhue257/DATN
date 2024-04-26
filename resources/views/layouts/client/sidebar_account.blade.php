<ul class="list-group">
    <li class="list-group-item py-4 d-flex justify-content-between">
        <h6 style="font-weight: 500;">Nguyễn văn A</h6>
    </li>

    <li class="list-group-item">
        <div class="py-2"><a href="{{ route('account') }}" style="color: black;">Thông tin tài khoản</a></div>
        <div class="py-2"><a href="/address" style="color: black;">Địa chỉ giao hàng</a></div>
        <div class="py-2"><a href="{{ route('order_history') }}" style="color: black;">Lịch sử mua hàng</a></div>
        {{-- <div class="py-2"><a href="/wishlist" style="color: black;">Sản phẩm yêu thích</a></div> --}}
        {{-- <div class="py-2"><a href="/promotion" style="color: black;">Ưu đãi của bạn</a></div> --}}
    </li>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <li class="list-group-item py-4"><a href="" style="color: black; font-weight: 500;"><button
                 class="list-group-item "   type="submit">Đăng xuất</button></a></li>
    </form>
</ul>

<style>
    <style>.list-group-item a {
        text-decoration: none;
        color: black;
        transition: border-bottom 0.3s ease;
        border-bottom: 1px solid transparent;
    }

    .list-group-item a:hover {
        border-bottom: 1px solid black;
    }
</style>
