@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Thêm Sản phẩm</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="m-8">
                        <form action="{{ route('product.store') }}" class="max-w-md mx-auto" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" id="description" class="form-control"
                                    placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Image</label>
                                <div class="input-group">
                                    <input type="file" name="image" id="image" class="form-control file-input"
                                        placeholder="" aria-describedby="inputGroupFileAddon" onchange="previewImage(event)">
                                </div>
                            </div>
                            <div class="mb-3">
                                <img id="preview" src="#" alt=""
                                    style="max-width: 100%; max-height: 200px;">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select id="category_id" name="category_id" class="form-select">
                                    @foreach ($categories as $ct)
                                        <option value="{{ $ct->id }}">{{ $ct->name_cate }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <button class="btn btn-primary"><a class="text-white text-decoration-none" href="{{ route('product.index') }}">List</a></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/image_preview.js') }}"></script>

    <!-- /.row (main row) -->
@endsection
