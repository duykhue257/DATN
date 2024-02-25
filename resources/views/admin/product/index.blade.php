 @extends('layouts.layout_admin')
 @section('body')
     <!-- Main row -->
     <div class="row">
         <div class="container-fluid">
             <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                             <thead>
                                 <tr>
                                     <th>ID</th>
                                     <th>Name</th>
                                     <th>Description</th>
                                     <th>Image</th>
                                     <th>Quantity</th>
                                     <th>Category</th>
                                     <th>Price</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tfoot>
                                 @foreach ($products as $prd)
                                     <tr>
                                         <th>{{ $prd->id }}</th>
                                         <td>{{ $prd->name }}</td>
                                         <td>{{ $prd->description }}</td>
                                         <td style="width:150px">
                                             <img style="width:100%" src="{{ Storage::url($prd->image) }}" alt="">
                                         </td>
                                         <td>{{ $prd->quantity }}</td>
                                         <td>{{ $prd->name_cate }}</td>
                                         <td>{{ $prd->price }}</td>
                                         <td>
                                            <form action="{{ route('product.destroy', $prd->id_prd) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary" href="{{ route('product.edit', $prd->id_prd) }}">EDIT</a>
                                                <button onclick="return confirm('are you sure?')"  class="btn btn-danger" type="submit">DELETE</button>
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
