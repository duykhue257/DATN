@extends('layouts.layout_admin')
@section('body')
    <!-- Main row -->
    <div class="row">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Màu sắc</h6>
                </div>
                <div class="card-body">
                   <button class="btn btn-primary"><a class="text-white text-decoration-none"
                       href="{{ route('color.create') }}">Thêm mới</a></button>
                  <br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Màu sắc</th> 
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($colors as $ct)
                                    <tr>
                                        <td>{{ $ct->id }}</td>
                                        <td>{{ $ct->color }}</td>
                                        <td>
                                            <form action="{{ route('color.destroy', $ct->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary"
                                                    href="{{ route('color.edit', $ct->id) }}">sửa</a>
                                                <button onclick="return confirm('are you sure?')" class="btn btn-danger" type="submit">xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row (main row) -->
@endsection
