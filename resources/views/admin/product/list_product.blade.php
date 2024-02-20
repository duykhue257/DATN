 
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
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Mô tả</th>
                                    <th>Ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Loại</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Mô tả</th>
                                    <th>Ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Loại</th>
                                    <th>Giá sản phẩm</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td><img src="https://picsum.photos/70/70" alt=""></td>
                                    <td>61</td>
                                    <td>iphone</td>
                                    <td>$320,800</td>
                                    <td>
                                        <a href="/admin/product/edit"> <button class="btn btn-warning">Sửa</button></a>
                                        <button class="btn btn-danger">Xóa</button>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
         
    </div>
    <!-- /.row (main row) -->
@endsection
