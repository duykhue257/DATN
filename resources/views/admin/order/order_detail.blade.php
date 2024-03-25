@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->
    <div class="row">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="order_detail" width="100%" cellspacing="0">
                            {{-- Thông tin khách hàng --}}
                            <thead>
                                <tr>
                                    <th>Tên khách hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>Điện thoại</th>
                                    <th>Ghi chú</th>
                                    <th>Hình thức thanh toán</th>
                                </tr>
                            </thead>

                            <tbody>
                                <td>Nguyễn văn A</td>
                                <td>Tòa nhà FPT Polytechnic., Cổng số 2, 13 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà
                                    Nội, Việt Nam</td>
                                <td>0987654321</td>
                                <td></td>
                                <td>Chuyển khoản</td>
                            </tbody>
                        </table>
                        {{-- Thong tin sản phẩm --}}
                        <table class="table table-bordered" id="order" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th></th>
                                    <th>Số lượng</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Áo sơ mi tay ngắn nam nữ unisex form rộng</td>
                                    <th>màu đỏ, L</th>
                                    <td>2</td>
                                    <td>100.000<span>đ</span></td>
                                    <td>200.000</td>
                                </tr>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th colspan="4" rowspan="3"></th>
                                    <th colspan="2">Tổng tạm tính: <span>100.000đ</span></th>
                                </tr>
                                <tr>
                                    <th colspan="2">Giảm giá: <span>10.000đ</span></th>
                                </tr>
                                <tr>
                                    <th colspan="2">Tổng cộng: <span>90.000đ</span></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
