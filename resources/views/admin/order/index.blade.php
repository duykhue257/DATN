@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->

    <div class="row">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Danh sách đơn hàng</h6>
                </div>

                <div class="card-body">
                    {{-- <button class="btn btn-success"><a class="text-white text-decoration-none" href="">Thêm
                            mới</a></button>
                    <br><br> --}}
                    <div class="table-responsive">
                        <table class="table table-bordered" id="order" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>sdt</th>
                                    <th>số lượng</th>
                                    <th>trạng thái</th>
                                    <th>thời gian đặt hàng</th>
                                    <th>Hoạt Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <form class="order-form"
                                            action="{{ route('admin.update_order_status', ['order' => $order->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('POST')

                                            <th>{{ $order->id }}</th>
                                            <th>{{ $order->order_code }}</th>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->phone }}</td>
                                            <td>{{ count($order->detail_order) }} sản phẩm</td>
                                            {{-- <td>{{ $order->status->status }}</td> --}}
                                            <td>
                                                <!-- Thêm id và data-order-id cho select -->
                                                <select name="status_id">
                                                    @php
                                                        $firstOptionId = $order->status->id; // Lưu id của option đầu tiên
                                                    @endphp
                                                    <option hidden value="{{ $firstOptionId }}">{{ $order->status->status }}
                                                    </option>
                                                    @foreach ($status as $stt)
                                                        <option value="{{ $stt->id }}"
                                                            @if ($stt->id < $firstOptionId) hidden @endif>
                                                            {{ $stt->status }}</option>
                                                    @endforeach
                                                </select>
                                                <button class="btn btn-success" type="submit">Cập nhật </button>
                                            </td>

                                            <td>{{ $order->created_at }}</td>

                                            <td>
                                                <a class=" btn btn-primary px-2"
                                                    href="{{ route('order_detail', $order->id) }}">Chi Tiết</a>

                                            </td>

                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row (main row) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        @if (Session::has('success'))
            alert('{{ Session::get('success') }}');
        @endif

        $(document).ready(function() {
            $('.order-form').submit(function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định của form

                var form = $(this); // Chọn form được submit
                var formData = form.serialize(); // Lấy dữ liệu từ form

                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: formData,
                    success: function(response) {
                        // Xử lý phản hồi từ server, có thể cập nhật giao diện tương ứng
                        alert('Cập nhật trạng thái đơn hàng thành công!');
                    },
                    error: function(xhr, status, error) {
                        // Xử lý lỗi nếu có
                        console.error(error);
                        alert('Đã xảy ra lỗi khi cập nhật trạng thái đơn hàng.');
                    }
                });
            });
        });
    </script>
@endsection
