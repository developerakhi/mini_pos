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
                    <div class="col-md-6">
                        @if($mode == 'edit')
                            {!! Form::model($user, [ 'route' => ['users.update', $user->id], 'method' => 'put' ]) !!}
                        @else
                            {!! Form::open([ 'route' => 'users.store', 'method' => 'post' ]) !!}	
                        @endif
                       
                
                            <div class="form-group row">
                                <label for="Name" class="col-sm-2 col-form-label">User Group<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                   {{Form::select('group_id', $groups, NULL, ['class'=>'form-control', 'id'=>'group', 'placeholder'=>'Enter Group']);}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                  {{Form::text('name', Null, ['class'=>'form-control', 'id'=>'name', 'placeholder'=>'Enter Name']);}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-sm-2 col-form-label">Phone<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                  {{Form::text('phone', Null, ['class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Enter Phone']);}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                  {{Form::text('email', Null, ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'Enter Email']);}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                  {{Form::text('address', Null, ['class'=>'form-control', 'id'=>'address', 'placeholder'=>'Enter Address']);}}
                                </div>
                            </div>
   
                            <div class="mt-4 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection