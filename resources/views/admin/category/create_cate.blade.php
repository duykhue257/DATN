@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->    
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Thêm loại</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="m-8">
                        <form action="{{ route('category.store') }}" class="max-w-md mx-auto" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên loại</label>
                                <input type="text" name="name_cate" id="name_cate" class="form-control" placeholder="" />
                            </div>
                           
                            <button type="submit" class="btn btn-success">Thêm</button>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection