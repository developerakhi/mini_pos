
@extends('layout.main')

@section('content')
   
        <!-- DataTales Example -->
        <div class="container-fluid">
            
            <div class="row clearfix page-header">
                <div class="col-md-6">
                    <h2>Products</h2>
                </div>     
                <div class="col-md-6 text-right">
                    <a href="{{route('products.create')}}" class="btn btn-info"><i class="fa fa-plus"> New Products </i></a>
                </div>     
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Products Table</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Categories Title</th>
                                    <th>Title</th>
                                    <th>Cost Price</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th class="text-right">Actions</th>
                                    
                                </tr>
                            </thead>
                            <tfoot> 
                                <tr>
                                    <th>ID</th>
                                    <th>Categories Title</th>
                                    <th>Title</th>
                                    <th>Cost Price</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th class="text-right">Actions</th>
                                    
                                </tr>       
                            </tfoot>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->cat_title}}</td>
                                        <td>{{$product->product_title}}</td>
                                        <td>{{$product->cost_price}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->description}}</td>
                                        <td class="text-right">
                                            
                                            <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
                                                <a href="{{ route('products.show', ['product'=>$product->id]) }}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"> Show </i> </a> 
                                                <a href="{{ route('products.edit', ['product'=>$product->id]) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"> Edit </i> </a>
                                                
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
