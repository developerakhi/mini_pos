@extends('users.user_layout')
@section('user_content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <h6 class="m-0 font-weight-bold text-primary">Sales of <strong>{{$user->name}}</strong></h6> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
        
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Challen No</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Challen No</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th class="text-right">Actions</th>
                        </tr>
                                
                    </tfoot>
                    <tbody>
                        @foreach ($user->sales as $sale)
                            <tr>
                                <td>{{$sale->challan_no}}</td>
                                <td>{{$user->user_name}}</td>
                                <td>{{$sale->date}}</td>
                                <td>100</td>
                                <td class="text-right">
                                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                                        <a href="{{ route('user.sales.invoice_details', ['user_id'=>$user->id, 'invoice_id'=>$sale->id]) }}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"> Show </i> </a>
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

                
@endsection
