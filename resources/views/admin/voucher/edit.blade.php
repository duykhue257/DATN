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
                        <form action="{{ route('voucher.update',$voucher->id) }}" class="max-w-md mx-auto" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="code" class="form-label">code</label>
                                <input type="text" name="code" id="code" value="{{ $voucher->code }}"
                                    class="form-control" placeholder="" />
                            </div>
                            {{-- @error('code')
                                <p style="color: red">{{ $message }}</p>
                            @enderror --}}
                            <div class="mb-3">
                                <label for="percent" class="form-label">percent</label>
                                <input type="text" name="percent" id="percent" value="{{ $voucher->code }}"
                                    class="form-control" placeholder="" />
                            </div>
                        
                            <div class="mb-3">
                                <label for="min_price" class="form-label">giá tối thiểu</label>
                                <input type="text" name="min_price" id="min_price" value="{{ $voucher->min_price }}"
                                    class="form-control" placeholder="" />
                            </div>

                            <div class="mb-3">
                                <label for="start_at" class="form-label">Thời gian bắt đầu</label>
                                <input type="date" name="start_at" id="start_at" value="{{ \Carbon\Carbon::parse($voucher->start_at)->format('Y-m-d') }}" class="form-control" placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="end_at" class="form-label">Thời gian kết thúc</label>
                                <input type="date" name="end_at" id="end_at" value="{{ \Carbon\Carbon::parse($voucher->end_at)->format('Y-m-d') }}" class="form-control" placeholder="" />
                            </div>
                            
                            <div class="mb-3">
                                <label for="quantity" class="form-label">só lượng</label>
                                <input type="number" name="quantity" id="quantity" value="{{ $voucher->quantity }}"
                                    class="form-control" placeholder="" />
                            </div>


                            <button type="submit" class="btn btn-success">cập nhật</button>
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
