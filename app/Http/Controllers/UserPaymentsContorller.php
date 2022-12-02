<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserPaymentsContorller extends Controller
{
    public function index($id){
        
        $tab_menu = 'payments';
        $user = UserModel::join('groups','users.group_id','=','groups.id')
                    ->where('users.id', $id)
                    ->select('users.id','users.name as user_name','groups.title','users.email','users.phone','users.address')
                    ->first();

        
        return view('users.payments.payments',compact('user','tab_menu'));
    }

/* Create a payment */
    public function store(PaymentRequest $request, $user_id){
        $formData = $request->all();
        $formData['user_id'] = $user_id;
        $formData['payment_id'] = Auth::id();

        if( Payment::create($formData) ){

            Session::flash('message' ,'Payment Added Successfully');
        }

        return redirect()->route('user.payments', ['id'=>$user_id]); 
    }

/* Delete a payment */
    public function destroy($user_id, $payment_id){

        if( Payment::destroy($payment_id) ){

            Session::flash('message' ,'Payment Deleted Successfully');
        }

        return redirect()->route('user.payments', ['id'=>$user_id]);

    }
}
