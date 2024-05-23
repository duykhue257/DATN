@extends('layouts.layout_admin')
@section('body')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Main row -->
    <div class="row">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Sản phẩm</h6>
                </div>

                <div class="card-body">
                    <button class="btn btn-success"><a class="text-white text-decoration-none"
                            href="{{ route('product.create') }}">Thêm mới</a></button>
                    <br><br>
                    <div class="table-responsive">
                        <div class="card">
                            <div class="card-body">
                                {{ $dataTable->table() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row (main row) -->
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
    <script>
       $(document).ready(function() {
    $('.delete-product-btn').click(function() {
        var productId = $(this).data('id');
        var productElement = $('#product-' + productId);

        if (confirm('Are you sure?')) {
            $.ajax({
                url: '/products/' + productId,
                type: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    _method: 'DELETE'
                },
                success: function(response) {
                    productElement.find('.restore-product').show();
                    productElement.find('.delete-product-form').hide();
                    alert('Sản phẩm đã được xóa thành công!');
                },
                error: function(xhr) {
                    alert('Đã xảy ra lỗi! Vui lòng thử lại sau.');
                }
            });
        }
    });

    $('.restore-product').click(function() {
        var productId = $(this).data('id');
        var productElement = $('#product-' + productId);

        $.ajax({
            url: '/products/restore/' + productId,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                productElement.find('.restore-product').hide();
                productElement.find('.delete-product-form').show();
                alert('Sản phẩm đã được khôi phục thành công!');
            },
            error: function(xhr) {
                alert('Đã xảy ra lỗi! Vui lòng thử lại sau.');
            }
        });
    });
});
    </script>
@endpush
