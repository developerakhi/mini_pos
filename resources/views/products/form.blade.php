@extends('layout.main')

@section('content')
   
    <!-- DataTales Example -->
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>{{$headline}}</h2>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$headline}}</h6>
            </div>
            <div class="card-body">
                <div class="row justify-content-md-center">
                    <div class="col-md-10">
                        @if($mode == 'edit')
                            {!! Form::model($product, [ 'route' => ['products.update', $product->id], 'method' => 'put' ]) !!}
                        @else
                            {!! Form::open([ 'route' => 'products.store', 'method' => 'post' ]) !!}	
                        @endif
                       
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 text-right col-form-label">Title<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                  {{Form::text('title', Null, ['class'=>'form-control', 'id'=>'title', 'placeholder'=>'Enter title']);}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 text-right col-form-label">Description<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                  {{Form::textarea('description', Null, ['class'=>'form-control', 'id'=>'description', 'placeholder'=>'Enter Description']);}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="catagories_id" class="col-sm-2 text-right col-form-label">Category<span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                   {{Form::select('catagories_id', $categories, NULL, ['class'=>'form-control', 'id'=>'catagories_id', 'placeholder'=>'Enter category']);}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cost_price" class="col-sm-2 text-right col-form-label">Cost Price</label>
                                <div class="col-sm-5">
                                  {{Form::text('cost_price', Null, ['class'=>'form-control', 'id'=>'cost_price', 'placeholder'=>'Enter Cost Price']);}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-2 text-right col-form-label">Sale Price</label>
                                <div class="col-sm-5">
                                  {{Form::text('price', Null, ['class'=>'form-control', 'id'=>'price', 'placeholder'=>'Enter Sale Price']);}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="Name" class="col-sm-2 text-right col-form-label"></label>
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"> Submit </i></button>
                                </div>
                            </div>
                        

                        {!! Form::close() !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection