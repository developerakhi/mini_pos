
@extends('users.user_layout')
@section('user_content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Sales Invoice Details</h6>
        </div>
        <div class="card-body">
            <div class="row clearfix justify-content-md-center">
                <div class="col-md-6">
                    <div class="no_padding no_margin"><strong>Customer:</strong> {{$user->name}}</div>
                    <div class="no_padding no_margin"><strong>Email:</strong> {{$user->email}}</div>
                    <div class="no_padding no_margin"><strong>Phone:</strong> {{$user->phone}}</div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    {{-- <div class="no_padding no_margin"><strong>Date:</strong> {{$sales_items->date}}</div>
                    <div class="no_padding no_margin"><strong>Challen No:</strong> {{$sales_items->challan_no}}</div> --}}
                </div>
            </div>
            <div class="invoice_items">
                <table class="table table-borderless">
                    <thead>
                        <th>Sl No</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Action</th>
                    </thead>
                    <tbody>

                        @foreach ($invoices as $key=> $item )
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $item->product_title }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->total }}</td>
                                <td class="text-right">
                                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                                        
                                        @csrf
                                        @method('DELETE')
                                        <BUtton type="submit" onclick="return confirm('Are You Sure ?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Delete</i></BUtton>
                                    </form> 
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                    <tfoot>
                        <th></th>
                        <th><button class="btn btn-info btn-sm" data-toggle="modal" data-target="#newProduct">
                            <i class="fa fa-plus"> Add Product </i>
                        </button></th>
                        <th colspan="2" class="text-right">Total: </th>
                        <th>{{$invoices->sum('total')}}</th>
                        <th></th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

     {{-- Modal for Add New Product --}}

     <div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open([ 'route' => ['user.sales.store', $user->id], 'method' => 'post' ]) !!}
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="newProductModalLabel">New Sale Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="product" class="col-sm-2 col-form-label">Product<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                   {{Form::select('product_id', $product, NULL, ['class'=>'form-control', 'id'=>'product', 'placeholder'=>'Enter Product']);}}
                                </div>
                        </div>  
                        <div class="form-group row">
                            <label for="challan_no" class="col-sm-2 col-form-label">Challan Number</label>
                            <div class="col-sm-10">
                            {{Form::text('challan_no', Null, ['class'=>'form-control', 'id'=>'challan_no', 'placeholder'=>'Enter Challan Number']);}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="note" class="col-sm-2 col-form-label">Note</label>
                            <div class="col-sm-10">
                            {{Form::textarea('note', Null, ['class'=>'form-control', 'id'=>'note', 'rows'=>'3', 'placeholder'=>'Enter Note']);}}
                            </div>
                        </div>   

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        
      </div>
    {{-- End of Modal for Add New Product --}}
@endsection