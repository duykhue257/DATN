@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Thêm voucher</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="m-8">
                        <form action="{{ route('voucher.store') }}" class="max-w-md mx-auto" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="code" class="form-label">Mã giảm</label>
                                <input type="text" name="code" id="code" value="{{ old('code') }}"
                                    class="form-control" placeholder="" />
                            </div>
                            {{-- @error('code')
                                <p style="color: red">{{ $message }}</p>
                            @enderror --}}
                            <div class="mb-3">
                                <label for="percent" class="form-label">Phần trăm</label>
                                <input type="number" name="percent" id="percent" value="{{ old('percent') }}"
                                    class="form-control" placeholder="" />
                            </div>
                        
                            <div class="mb-3">
                                <label for="min_price" class="form-label">giá tối thiểu</label>
                                <input type="number" name="min_price" id="min_price" value="{{ old('min_price') }}"
                                    class="form-control" placeholder="" />
                            </div>

                            <div class="mb-3">
                                <label for="start_at" class="form-label">thời gian bắt đầu</label>
                                <input type="date" name="start_at" id="start_at" value="{{ old('start_at') }}"
                                    class="form-control" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="end_at" class="form-label">thời gian kết thúc</label>
                                <input type="date" name="end_at" id="end_at" value="{{ old('end_at') }}"
                                    class="form-control" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">só lượng</label>
                                <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}"
                                    class="form-control" placeholder="" />
                            </div>


                            <button type="submit" class="btn btn-success">Thêm</button>
                            <button class="btn btn-primary"><a class="text-white text-decoration-none"
                                    href="{{ route('voucher.index') }}">danh sách</a></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/image_preview.js') }}"></script>

    <!-- /.row (main row) -->
@endsection
