 @extends('layouts.layout_admin')
 @section('body')
     <!-- Main row -->
     <div class="row">
         <div class="container-fluid">
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-dark">Sản phẩm biến thể</h6>
                 </div>

                 <div class="card-body">
                     <button class="btn btn-success"><a class="text-white text-decoration-none"
                             href="{{ route('productVariant.create',$productId) }}">Thêm mới</a></button>
                            
                        <br><br>
                     <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th>ID</th>
                                     <th>Tên</th>
                                     <th>Ảnh</th>
                                     {{-- <th>Giá</th>
                                     <th>Giảm Giá</th> --}}
                                     <th>Màu</th>
                                     <th>Kích Cỡ</th>
                                     <th>Số Lượng</th>
                                     <th>Hoạt Động</th>
                                 </tr>
                             </thead>
                             <tfoot>
                                 @foreach ($products as $prd)
                                     <tr>
                                         <th>{{ $prd->id }}</th>
                                         <td>{{ $prd->product->name }}</td>
                                         <td style="width:150px">
                                             <img style="width:100%" src="{{ Storage::url($prd->image) }}" alt="">
                                         </td>
                                         {{-- <td>{{ $prd->price }}</td>
                                         <td>{{ $prd->product->price_reduced }}</td> --}}
                                         <td>{{ $prd->colors->color }}</td>
                                         <td>{{ $prd->sizes->size }}</td>
                                         <td>{{ $prd->quantity }}</td>
                                         <td>
                                             <form action="{{ route('productVariant.destroy', $prd->id) }}" method="POST">
                                                 @csrf
                                                 @method('DELETE')
                                                 <a class="btn btn-warning"
                                                     href="{{ route('productVariant.edit', $prd->id) }}">Cập Nhật</a>
                                                 <button onclick="return confirm('are you sure?')" class="btn btn-danger"
                                                     type="submit"><i class="fa-solid fa-trash"></i></button>
                                             </form>
                                         </td>
                                     </tr>
                                 @endforeach
                             </tfoot>

                         </table>
                     </div>
                 </div>
             </div>
         </div>

     </div>
     <!-- /.row (main row) -->
 @endsection
