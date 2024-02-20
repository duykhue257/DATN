@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->    
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Sửa sản phẩm</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="m-8">
                        <form class="max-w-md mx-auto" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên sản phẩm</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Giá sản phẩm</label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Số lượng</label>
                                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Mô tả</label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Ảnh</label>
                                <div class="input-group">
                                    <input type="file" name="img" id="img" class="form-control file-input" placeholder="" aria-describedby="inputGroupFileAddon">
                                </div>
                            </div>
                             <div class="mb-3">
                                <label  class="form-label">Loại</label>
                                <select id="cate" name="id_cate"  class="form-select">
                                   <option value="iphone">iphone</option>
                                   <option value="samsung">samsung</option>
                                   <option value="xiaomi">xiaomi</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-warning">Sửa</button>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection