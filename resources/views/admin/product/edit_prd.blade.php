@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Thêm Sản phẩm biến thể</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="m-8">
                        <form action="{{ route('product.update',$product->id) }}" class="max-w-md mx-auto" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên sản phẩm</label>
                                <input type="text" name="name" id="name" value="{{$product->name }}"
                                    class="form-control" placeholder="" />
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Giá</label>
                                <input type="text" name="price" id="price" value="{{$product->price }}"
                                    class="form-control" placeholder="" />
                            </div>

                            <div class="mb-3">
                                <label for="price_reduced" class="form-label">Giảm giá</label>
                                <input type="text" name="price_reduced" id="price_reduced" value="{{$product->price_reduced }}" 
                                class="form-control" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Mô tả</label>
                                <input type="text" name="description" id="price_reduced"
                                value="{{$product->description }}"  class="form-control" placeholder="" />
                            </div>
                           

                            <div class="mb-3">
                                <label class="form-label">Tên loại</label>
                                <select id="category_id" name="category_id" class="form-select form-control">
                                    <option hidden value="{{$product->category_id }}">{{$product->category->name_cate }}</option>
                                    @foreach ($categories as $ct)
                                        <option value="{{ $ct->id }}">{{ $ct->name_cate }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                            <button class="btn btn-primary"><a class="text-white text-decoration-none"
                                    href="{{ route('product.index') }}">Danh sách sản phẩm</a></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/image_preview.js') }}"></script>

    <!-- /.row (main row) -->
@endsection
