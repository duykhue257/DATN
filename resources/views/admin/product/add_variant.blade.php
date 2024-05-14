@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Thêm Sản phẩm biến thể cho {{ $product->name }}</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="m-8">
                        <form action="{{ route('productVariant.store') }}" class="max-w-md mx-auto" method="post"
                            enctype="multipart/form-data">
                            @csrf
                       
                            <div hidden class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text"  id="product_id" class="form-control" value="{{ $product->name }}">
                                <input  type="text" name="product_id" id="product_id" class="form-control" value="{{ $product->id }}">
                                {{-- <select id="product_id" name="product_id" class="form-select">
                       
                                        <option value="{{ $product->id }}">{{ $product->name }} </option>
                                 
                                </select> --}}
                            </div>
                            {{-- <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="price_reduced" class="form-label">Price reduced</label>
                                <input type="text" name="price_reduced" id="price_reduced" class="form-control" placeholder="" />
                            </div> --}}
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="color_id" class="form-label">Color</label>
                                <select id="color_id" name="color_id" class="form-select form-control">
                                    @foreach ($color as $cl)
                                        <option value="{{ $cl->id }}">{{ $cl->color }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="size_id" class="form-label">size</label>
                                <select id="size_id" name="size_id" class="form-select form-control">
                                    @foreach ($size as $sz)
                                        <option value="{{ $sz->id }}">{{ $sz->size }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Image</label>
                                <div class="input-group">
                                    <input type="file" name="image" id="image" class="form-control file-input"
                                        placeholder="" aria-describedby="inputGroupFileAddon"
                                        onchange="previewImage(event)">
                                </div>
                            </div>
                            <div class="mb-3">
                                <img id="preview" src="#" alt=""
                                    style="max-width: 100%; max-height: 200px;">
                            </div>
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <button class="btn btn-primary"><a class="text-white text-decoration-none"
                                    href="{{ route('product.show',$product->id) }}">List</a></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/image_preview.js') }}"></script>

    <!-- /.row (main row) -->
@endsection
