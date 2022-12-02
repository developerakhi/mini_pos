<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Models\Receipt;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserReceiptsController extends Controller
{
    public function index($id){
        
        $tab_menu = 'receipts';
        $user = UserModel::join('groups','users.group_id','=','groups.id')
                    // ->join('sale_invoices','sale_invoices.user_id','=','users.id')
                    ->where('users.id', $id)
                    ->select('users.id','users.name as user_name','groups.title','users.email','users.phone','users.address')
                    ->first();

        
        return view('users.receipts.receipts',compact('user','tab_menu'));
    }

    /* Create a Receipt */
    public function store(ReceiptRequest $request, $user_id){

        $formData = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();

        if( Receipt::create($formData) ){

            Session::flash('message' ,'Receipt Added Successfully');
        }

        return redirect()->route('user.receipts', ['id'=>$user_id]); 
    }

    /* Delete a Receipt */
    public function destroy($user_id, $receipt_id){

        if( Receipt::destroy($receipt_id) ){

            Session::flash('message' ,'Receipt Deleted Successfully');
        }

        return redirect()->route('user.receipts', ['id'=>$user_id]);

    }
}