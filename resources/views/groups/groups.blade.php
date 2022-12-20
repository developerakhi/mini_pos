
@extends('layout.main')

@section('content')
   
    
    <!-- DataTales Example -->
    <div class="container-fluid">
        
        <div class="row clearfix page-header">
            <div class="col-md-6">
                <h2>User Groups</h2>
            </div>     
            <div class="col-md-6 text-right">
                 <a href="{{url('groups/create')}}" class="btn btn-info"><i class="fa fa-plus"> New Group </i></a>
             </div>     
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Group</h6>
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
                            @foreach ($groups as $group)
                                <tr>
                                    <td>{{$group->id}}</td>
                                    <td>{{$group->title}}</td>
                                    <td class="text-right">
                                        <form action="{{ url('groups/' . $group->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <BUtton type="submit" onclick="return confirm('Are You Sure ?')" class="btn btn-danger"><i class="fa fa-trash"> Delete</i></BUtton>
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
