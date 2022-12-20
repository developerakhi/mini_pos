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
                            <th>Items</th>
                            <th>Total</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            $grandTotal = 0;
                            $totalItem = 0; 
                        ?>
                        @foreach ($user->sales as $sale)
                            <tr>
                                <td>{{$sale->challan_no}}</td>
                                <td>{{$user->user_name}}</td>
                                <td>{{$sale->date}}</td>
                                <td>
                                    <?php
                                        $itemQty =  $sale->items()->sum('quantity');
                                        $totalItem += $itemQty;
                                        echo $itemQty; 
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $total =  $sale->items()->sum('total');
                                        $grandTotal += $total;
                                        echo $total; 
                                    ?>
                                </td>
                                {{-- <td>{{$grandTotal += $sale->items()->sum('quantity')}}</td> --}}
                                <td class="text-right">
                                    <form action="{{ route('user.sales.destroy', ['user_id' => $user->id, 'invoice_id'=>$sale->id]) }}" method="POST">
                                        <a href="{{ route('user.sales.invoice_details', ['user_id'=>$user->id, 'invoice_id'=>$sale->id]) }}" class="btn btn-primary btn-sm"> <i class="fa fa-eye"> Show </i> </a>
                                        @if ($itemQty == 0)
                                            @csrf
                                            @method('DELETE')
                                            <BUtton type="submit" onclick="return confirm('Are You Sure ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete</i></BUtton>
                                        @endif
                                    </form> 
                                </td>
                            </tr>
                        @endforeach    
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Challen No</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>{{$totalItem}}</th>
                            <th>{{$grandTotal}}</th>
                            <th class="text-right">Actions</th>
                        </tr>
                                
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

                
@endsection
