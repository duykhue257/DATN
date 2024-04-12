@extends('layouts.client.layout_account')
@section('title', 'Lịch sử mua hàng')
@section('content')
    <section>
        <div class="pt-4">
            <h6 style="font-weight: 500;">Lịch sử mua hàng</h6>
            <p>Bạn có thể xem lịch sử mua hàng và trạng thái đơn hàng trực tuyến của ClassicMan tại đây.</p>
        </div>
        <hr>
        <div class="mb-4 d-flex flex-row-reverse">

            <form action="">
                <select class="form-select pl-1 pr-4" aria-label="Default select example">
                    <option value="1">Tất cả</option>
                    <option value="2">Đã thanh toán</option>
                    <option value="3">Đang giao</option>
                </select>
            </form>
            <h6 class="pr-2">Đơn hàng: </h6>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Đơn hàng#</th>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Sản phẩm</th>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Ngày</th>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Số lượng</th>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Giá trị đơn hàng</th>
                    <th scope="col" style="font-weight: 500; font-size: 14px">Tình trạng thanh toán</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" style="font-weight: 500;font-size: 12px;">A1BC2XZ</th>
                    <td
                        style="font-size: 12px; max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        <a href="/detail_product">Áo Blazer Nam Dài Form Rộng NPV OFFCIAL phong cách Hàn Quốc</a></td>
                    <td style="font-size: 14px">1/1/2024</td>
                    <td style="font-size: 14px">
                        <fieldset disabled><input type="number" id="disabledTextInput"
                                class="border border-0 w-25 text-center" placeholder="1">
                    </td>
                    <td style="font-size: 14px">100.000<span>đ</span></td>
                    <td style="font-size: 14px">Đã thanh toán</td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection