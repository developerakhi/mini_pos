
@extends('layout.main')

@section('content')
   
     <!-- DataTales Example -->
     <div class="container-fluid">
        
        <div class="row clearfix page-header">
            <div class="col-md-6">
                <h2>User List</h2>
            </div>     
            <div class="col-md-6 text-right">
                 <a href="{{url('users/create')}}" class="btn btn-info"><i class="fa fa-plus"> New User </i></a>
             </div>     
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Group</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th class="text-right">Actions</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            
                                <tr>
                                    <th>ID</th>
                                    <th>Group</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                                      
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->group->title}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->address}}</td>
                                    <td class="text-right">
                                        
                                        <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                                            <a href="{{ route('users.show', ['user'=>$user->id]) }}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"> Show </i> </a>
                                            <a href="{{ route('users.edit', ['user'=>$user->id]) }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"> Edit </i> </a>
                                            
                                            @if ($user->sales()->count() == 0 
                                                && $user->purchases()->count() == 0
                                                && $user->receipts()->count() == 0
                                                && $user->payments()->count() == 0
                                            )
                                                
                                            
                                                @csrf
                                                @method('DELETE')
                                                <BUtton type="submit" onclick="return confirm('Are You Sure ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete</i></BUtton>
                                            @endif
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
