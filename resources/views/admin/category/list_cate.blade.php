 
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
                                    <th>Tên Loại</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tên loại</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    
                                    <td>
                                       
                                        <a href="/admin/cate/edit"> <button  class="btn btn-warning">Sửa</button></a>
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
