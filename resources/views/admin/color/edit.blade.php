@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-warning">Sửa màu sắc</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="m-8">
                        <form class="max-w-md mx-auto" action="{{ route('color.update', $color->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="color" class="form-label">Tên màu sắc</label>
                                <input type="text" name="color" id="color" class="form-control" placeholder=""
                                    value="{{ $color->color }}" />
                            </div>
                            <button type="submit" class="btn btn-warning">Sửa</button>
                            <button class="btn btn-primary"><a class="text-white text-decoration-none"
                                    href="{{ route('color.index') }}">List</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection
