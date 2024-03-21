@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->    
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Thêm màu sắc</h6>
            </div>
            <div class="card-body">
                <div class="">
                    <div class="m-8">
                        <form action="{{ route('color.store') }}" class="max-w-md mx-auto" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="color" class="form-label">Tên màu sắc</label>
                                <input type="text" name="color" id="color" class="form-control" placeholder="" />
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