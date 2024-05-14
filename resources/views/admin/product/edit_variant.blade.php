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
                        <form class="max-w-md mx-auto" action="{{ route('productVariant.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <select id="product_id" name="product_id" class="form-select form-control ">
                                    <option hidden  value="{{ $product->product->id }}">{{ $product->product->name }} </option>
                                    @foreach ($products as $prd)
                                        <option value="{{ $prd->id }}">{{ $prd->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                       
                            <div class="mb-3">
                                <label for="color" class="form-label">Color</label>
                             
                                <select id="color_id" name="color_id" class="form-select form-control ">
                                    <option hidden value="{{ $product->colors->id }}">{{ $product->colors->color }} </option>
                                    @foreach ($colors as $cl)
                                        <option value="{{ $cl->id }}">{{ $cl->color }} </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Size</label>
                                <div class="col-sm-9">
                                   
                                    <select id="size_id" name="size_id" class="form-select form-control  ">
                                        <option hidden value="{{ $product->sizes->id }}">{{ $product->sizes->size }} </option>
                                        @foreach ($sizes as $sz)
                                            <option value="{{ $sz->id }}">{{ $sz->size }} </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">quantity</label>
                                <input type="text" name="quantity" id="quantity" class="form-control" placeholder=""
                                    value="{{ $product->quantity }}" />
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">Image</label>
                                <div class="input-group">
                                    <input type="file" name="image" id="image" class="form-control file-input"
                                        placeholder="" aria-describedby="inputGroupFileAddon"
                                        onchange="previewImage(event)">
                                </div>
                                <br>
                                <img id="preview" style="max-width:100px"
                                    src="{{ $product->image ? Storage::url($product->image) : '' }}" alt="">
                            </div>

                            <button type="submit" class="btn btn-warning">Sửa</button>
                            <a class=" btn btn-primary text-white text-decoration-none"
                                    href="{{ route('product.show',$product->product->id) }}">List</a>
                        </form> 
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/image_preview.js') }}"></script>
    <!-- /.row (main row) -->
@endsection
