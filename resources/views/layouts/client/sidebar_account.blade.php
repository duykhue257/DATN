<ul class="list-group ">
    {{-- <li class="list-group-item py-4 d-flex justify-content-between">
        <h6 style="font-weight: 500;">Nguyễn văn A</h6>
    </li> --}}

    <li class="list-group ">
        <div class="py-2 px-2 item_sidebar"><i class="fa-solid fa-user-tie"></i><a class="" href="{{ route('account') }}" >Thông tin tài khoản</a><i class=""></i></div>
        <!-- <div class="py-2 px-2 my-2 item_sidebar"><i class="fa-solid fa-book"></i><a href="/address" >Địa chỉ giao hàng</a><i class=""></i></div> -->
        <div class="py-2 px-2 mt-2 item_sidebar"><i class="fa-solid fa-book-open"></i><a href="{{ route('order_history') }}" >Lịch sử mua hàng</a><i class=""></i></div>
        {{-- <div class="py-2"><a href="/wishlist" style="color: black;">Sản phẩm yêu thích</a></div> --}}
        {{-- <div class="py-2"><a href="/promotion" style="color: black;">Ưu đãi của bạn</a></div> --}}
    </li>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <li class="item_sidebar mt-4 py-2 px-2">
            <i class="fa-solid fa-right-from-bracket"></i>
            {{-- <a href="" style="color: black; font-weight: 500;"> --}}
            <a class=""   type="submit">
                <button class="btnlog" type="submit">Đăng xuất</button>
            </a>
            <i class=""></i>
            {{-- </a> --}}
        </li>
    </form>
</ul>

<style>
    .btnlog {
        background-color: transparent;
        border: none;
        font-weight: 500;
    }

    .list-group-item a {
        text-decoration: none;
        color: black;
        transition: border-bottom 0.3s ease;
        border-bottom: 2px solid transparent;
    }

    .list-group-item a:hover {
        border-bottom: 1px solid black;
    }
    .item_sidebar{
        border: 1px solid black;
        border-radius: 10px;
        font-weight: 500;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .item_sidebar {
        transition: background-color 0.3s;
    }

    .item_sidebar a {
        color: black;
        transition: color 0.3s;
    }

    .item_sidebar:hover {
        background-color: black;
    }

    .item_sidebar:hover a {
        color: white;
    }
    .item_sidebar:hover i {
        color: white;
    }
    .item_sidebar:hover a button {
        color: white;
    }
</style>
