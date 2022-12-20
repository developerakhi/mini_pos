
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
     </div>
     @include('users.user_layout_content')
@endsection
