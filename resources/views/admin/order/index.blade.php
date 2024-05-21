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
                    <div class="table-responsive">
                        <div class="card">
                                <div class="card-body">
                                    <!-- Bắt đầu DataTables -->
                                    {{ $dataTable->table() }}
                                    <!-- Kết thúc DataTables -->
                                </div>
                        </div>
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
        @if (Session::has('error'))
            alert('{{ Session::get('error') }}');
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

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
