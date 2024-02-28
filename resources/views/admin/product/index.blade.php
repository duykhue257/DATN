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
                                     <th>Image</th>
                                     <th>Price</th>
                                     <th>Price Reduced</th>
                                     <th>color</th>
                                     <th>Size</th>
                                     <th>Quantity</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tfoot>
                                 @foreach ($products as $prd)
                                     <tr>
                                         <th>{{ $prd->id }}</th>
                                         <td>{{ $prd->products->name }}</td>
                                         <td style="width:150px">
                                            <img style="width:100%" src="{{ Storage::url($prd->image) }}" alt="">
                                        </td>
                                         <td>{{ $prd->price }}</td>
                                         <td>{{ $prd->price_reduced }}</td>
                                         <td>{{ $prd->colors->color }}</td>
                                         <td>{{ $prd->sizes->size }}</td>
                                         <td>{{ $prd->quantity }}</td>
                                         <td>
                                            <form action="{{ route('product.destroy', $prd->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary" href="{{ route('product.edit', $prd->id) }}">EDIT</a>
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
