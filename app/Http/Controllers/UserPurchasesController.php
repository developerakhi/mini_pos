<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserPurchasesController extends Controller
{
    public function index($id){
        
        $tab_menu = 'purchases';
        $user = UserModel::join('groups','users.group_id','=','groups.id')
                    ->join('sale_invoices','sale_invoices.user_id','=','users.id')
                    ->where('users.id', $id)
                    ->select('users.id','users.name as user_name','groups.title','users.email','users.phone','users.address',  'sale_invoices.challan_no')
                    ->first();

        
        return view('users.purchases.purchases',compact('user','tab_menu'));
    }

}
