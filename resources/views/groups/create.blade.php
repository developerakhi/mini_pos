@extends('layout.main')

@section('content')
   
    <!-- DataTales Example -->
    <div class="container-fluid">
        <h2>Add New Group</h2>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create New Group</h6>
            </div>
            <div class="card-body">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <form action="{{url('groups')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="title">User Group Title</label>
                              <input type="text" class="form-control" id="title" name="title" placeholder="Group Title">
                              <small id="title" class="form-text text-muted">Title of users group.</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection