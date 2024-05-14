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
                        <div class="card">
                            <div class="card-body">
                                {{ $dataTable->table() }}
                            </div>
                        </div>
                     </div>
                 </div>
             </div>
         </div>

     </div>
     <!-- /.row (main row) -->
 @endsection

 @push('scripts')
    {{ $dataTable->scripts() }}
@endpush