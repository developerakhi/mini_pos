
@extends('layout.main')

@section('content')
   
     <!-- DataTales Example -->
     <div class="container-fluid">
        
        <div class="row clearfix page-header">
            <div class="col-md-4">
                <a href="{{route('products.index')}}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back </i></a>
            </div> 
            {{-- <div class="col-md-8 text-right">
                 <a href="{{url('users/create')}}" class="btn btn-info"><i class="fa fa-plus"> New Sale </i></a>
                 <a href="{{url('users/create')}}" class="btn btn-info"><i class="fa fa-plus"> New Purchase </i></a>
                 <a href="{{url('users/create')}}" class="btn btn-info"><i class="fa fa-plus"> New Payment </i></a>
                 <a href="{{url('users/create')}}" class="btn btn-info"><i class="fa fa-plus"> New Receipt </i></a>
            </div>      --}}
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$product->product_title}}</h6>
            </div>
            <div class="card-body">
                <div class="row clearfix justify-content-md-center">
                    <div class="col-md-12">
                        <table class="table table-borderless table-striped">
                            <tr>
                               <th class="text-right">CategoriesTitle :</th>
                                <td>{{$product->cat_title}}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Title :</th>
                                <td>{{$product->product_title}}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Description :</th>
                                <td>{{$product->description}}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Cost Price :</th>
                                <td>{{$product->cost_price}}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Price :</th>
                                <td>{{$product->price}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection
