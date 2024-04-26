@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->
    <div class="row">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
                </div>

                <div class="card-body">
                    <button class="btn btn-primary"><a class="text-white text-decoration-none"
                            href="{{ route('product.create') }}">Thêm mới</a></button>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Giá</th>
                                    <th>Giảm Giá</th>
                                    <th>Mô Tả</th>
                                    <th>Tên loại</th>
                                    <th>Hoạt Động</th>
                                </tr>
                            </thead>
                            <tfoot>
                                @foreach ($products as $prd)
                                    <tr>
                                        <th>{{ $prd->id }}</th>
                                        <td>{{ $prd->name }}</td>
                                        <td>{{ number_format($prd->price, 0, ',', '.') }}</td>
                                        <td>{{ number_format($prd->price_reduced, 0, ',', '.') }}</td>
                                        {{-- @php
                                            dd($prd->price);
                                        @endphp --}}
                                        <td class="col-3">{{ $prd->description }}</td>
                                        <td>{{ $prd->name_cate }}</td>
                                        <td >
                                            <form class="d-flex" action="{{ route('product.destroy', $prd->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class=" btn btn-primary mx-2"
                                                    href="{{ route('product.edit', $prd->id) }}">Cập nhật</a>
                                                <a class=" btn btn-primary mr-2"
                                                    href="{{ route('product.show', $prd->id) }}">Chi tiết</a>
                                                <button onclick="return confirm('are you sure?')" class="btn btn-danger"
                                                    type="submit">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row (main row) -->
@endsection
