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
                                     <th>Action</th>
                                 </tr>
                             </thead>

                             <tbody>
                                 @foreach ($categoris as $ct)
                                     <tr>
                                         <td>{{ $ct->id }}</td>
                                         <td>{{ $ct->name_cate }}</td>
                                         <td>
                                             <form action="{{ route('category.destroy', $ct->id) }}" method="POST">
                                                 @csrf
                                                 @method('DELETE')
                                                 <a class="btn btn-primary"
                                                     href="{{ route('category.edit', $ct->id) }}">EDIT</a>
                                                 <button onclick="return confirm('are you sure?')" class="btn btn-danger" type="submit">DELETE</button>
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
