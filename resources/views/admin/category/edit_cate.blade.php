@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Sửa loại</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="m-8">
                        <form class="max-w-md mx-auto" action="{{ route('category.update', $category->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên sản phẩm</label>
                                <input type="text" name="name_cate" id="name_cate" class="form-control" placeholder=""
                                    value="{{ $category->name_cate }}" />
                            </div>
                            <button type="submit" class="btn btn-warning">Sửa</button>
                            <button class="btn btn-primary"><a class="text-white text-decoration-none"
                                    href="{{ route('category.index') }}">List</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
