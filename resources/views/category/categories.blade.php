
@extends('layout.main')

@section('content')
   
     <!-- DataTales Example -->
     <div class="container-fluid">
        
        <div class="row clearfix page-header">
            <div class="col-md-6">
                <h2>Categories</h2>
            </div>     
            <div class="col-md-6 text-right">
                 <a href="{{route('categories.create')}}" class="btn btn-info"><i class="fa fa-plus"> New Category </i></a>
             </div>     
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Categories Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th class="text-right">Actions</th>
                                
                            </tr>
                        </thead>
                        <tfoot> 
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th class="text-right">Actions</th>
                                
                            </tr>          
                        </tfoot>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    <td class="text-right">
                                        
                                        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                                            {{-- <a href="{{ route('categories.show', ['category'=>$category->id]) }}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"> Show </i> </a> --}}
                                            <a href="{{ route('categories.edit', ['category'=>$category->id]) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"> Edit </i> </a>
                                            
                                            @csrf
                                            @method('DELETE')
                                            <BUtton type="submit" onclick="return confirm('Are You Sure ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete</i></BUtton>
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

@endsection
