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
                    <button class="btn btn-primary"><a class="text-white text-decoration-none" href="{{ route('voucher.create') }}">Thêm
                            mới</a></button>
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>mã</th>
                                    <th>phần trăm</th>
                                    <th>giá tối thiểu</th>
                                    <th>ngày bắt đầu</th>
                                    <th>ngày kết thúc</th>
                                    <th>số lượng</th>
                                    <th>Hoạt Động</th>
                                </tr>
                            </thead>
                            <tfoot>
                                @foreach ($voucher as $voucher)
                                    <tr>
                                        <th>{{ $voucher->id }}</th>
                                        <td>{{ $voucher->code }}</td>
                                        <td>{{ $voucher->percent }}%</td>
                                        <td>{{ $voucher->min_price }}</td>
                                        <td>{{ $voucher->start_at }}</td>
                                        <td>{{ $voucher->end_at }}</td>
                                        <td>{{ $voucher->quantity }}</td>
                                        <td>
                                            <form class="d-flex" action="{{ route('voucher.destroy', $voucher->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <a class=" btn btn-primary px-2" href="{{ route('voucher.edit',$voucher->id) }}">sửa</a>
                                            <button class="btn btn-danger px-2" type="submit">xóa</button>
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
