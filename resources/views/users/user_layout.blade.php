
@extends('layout.main')

@section('content')
   
     <!-- DataTales Example -->
     <div class="container-fluid">
        
        <div class="row clearfix page-header">
            <div class="col-md-4">
                <a href="{{route('users.index')}}" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Back </i></a>
            </div> 
            <div class="col-md-8 text-right">

                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newSale">
                    <i class="fa fa-plus"> New Sale </i>
                  </button>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPurchase">
                    <i class="fa fa-plus"> New Purchase </i>
                  </button>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newPayment">
                    <i class="fa fa-plus"> New Payment </i>
                  </button>
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#newReceipt">
                    <i class="fa fa-plus"> New Receipt </i>
                  </button>
            </div>     
        </div>

        <div class="row clearfix mt-5">
            <div class="col-md-2">
                <div class="nav flex-column nav-pills">
                    <a class="nav-link {{$tab_menu=="user_info"?"active":""}}" href="{{route('users.show', $user->id)}}">User Info</a>
                    <a class="nav-link {{$tab_menu=="sales"?"active":""}}" href="{{route('user.sales', $user->id)}}">sales</a>
                    <a class="nav-link {{$tab_menu=="purchases"?"active":""}}" href="{{route('user.purchases', $user->id)}}">Purchase</a>
                    <a class="nav-link {{$tab_menu=="payments"?"active":""}}" href="{{route('user.payments', $user->id)}}">Payments</a>
                    <a class="nav-link {{$tab_menu=="receipts"?"active":""}}" href="{{route('user.receipts', $user->id)}}">Receipts</a>
                </div>
            </div>
            <div class="col-md-10">
                @yield('user_content')
            </div>
        </div>
    </div>


    {{-- Modal for Add New Purchases --}}
    <div class="modal fade" id="newPurchase" tabindex="-1" role="dialog" aria-labelledby="newPurchaseModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open([ 'route' => ['user.payments.store', $user->id], 'method' => 'post' ]) !!}
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="newPurchaseModalLabel">New Purchase</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Date<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                              {{Form::date('date', Null, ['class'=>'form-control', 'id'=>'date', 'placeholder'=>'Enter Date', 'required']);}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-sm-2 col-form-label">Amount<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                            {{Form::text('amount', Null, ['class'=>'form-control', 'id'=>'amount', 'placeholder'=>'Enter Amount', 'required']);}}
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
    {{-- End of Modal for Add New Purchases --}}

    {{-- Modal for Add New Payment --}}
    <div class="modal fade" id="newPayment" tabindex="-1" role="dialog" aria-labelledby="newPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open([ 'route' => ['user.payments.store', $user->id], 'method' => 'post' ]) !!}
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="newPaymentModalLabel">New Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Date<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                              {{Form::date('date', Null, ['class'=>'form-control', 'id'=>'date', 'placeholder'=>'Enter Date', 'required']);}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-sm-2 col-form-label">Amount<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                            {{Form::text('amount', Null, ['class'=>'form-control', 'id'=>'amount', 'placeholder'=>'Enter Amount', 'required']);}}
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
    {{-- End of Modal for Add New Payment --}}


    {{-- Modal for Add New Receipt --}}

    <div class="modal fade" id="newReceipt" tabindex="-1" role="dialog" aria-labelledby="newReceiptModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open([ 'route' => ['user.receipts.store', $user->id], 'method' => 'post' ]) !!}
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="newReceiptModalLabel">New Receipt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Date<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                              {{Form::date('date', Null, ['class'=>'form-control', 'id'=>'date', 'placeholder'=>'Enter Date', 'required']);}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-sm-2 col-form-label">Amount<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                            {{Form::text('amount', Null, ['class'=>'form-control', 'id'=>'amount', 'placeholder'=>'Enter Amount', 'required']);}}
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
    {{-- End of Modal for Add New Receipt --}}

    {{-- Modal for Add New Invoice --}}

    <div class="modal fade" id="newInvoice" tabindex="-1" role="dialog" aria-labelledby="newInvoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open([ 'route' => ['user.receipts.store', $user->id], 'method' => 'post' ]) !!}
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="newInvoiceModalLabel">New Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Date<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                              {{Form::date('date', Null, ['class'=>'form-control', 'id'=>'date', 'placeholder'=>'Enter Date', 'required']);}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-sm-2 col-form-label">Amount<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                            {{Form::text('amount', Null, ['class'=>'form-control', 'id'=>'amount', 'placeholder'=>'Enter Amount', 'required']);}}
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
    {{-- End of Modal for Add New Invoice --}}

    {{-- Modal for Add New Sale --}}

    <div class="modal fade" id="newSale" tabindex="-1" role="dialog" aria-labelledby="newSaleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            {!! Form::open([ 'route' => ['user.sales.store', $user->id], 'method' => 'post' ]) !!}
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="newSaleModalLabel">New Sale Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">Date<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                              {{Form::date('date', Null, ['class'=>'form-control', 'id'=>'date', 'placeholder'=>'Enter Date', 'required']);}}
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
    {{-- End of Modal for Add New Sale --}}

@endsection
