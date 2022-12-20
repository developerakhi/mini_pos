<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReceiptRequest;
use App\Models\Receipt;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
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
    public function store(ReceiptRequest $request, $user_id, $invoice_id = null){

        $formData = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();
        // $sales_items = SaleItem::join('receipts','receipts.id','=','sale_items.sales_invoice_id')->where('sale_items.sales_invoice_id',$invoice_id)->select('sale_invoices.challan_no','sale_invoices.date','sale_invoices.amount')->first();

        // $receipts = Receipt::join('sale_items','sale_items.sales_invoice_id','=','receipts.id')
        //                 ->join('products','products.id','=','sale_items.product_id')
        //                 ->where('sale_invoices.user_id', $user_id)
        //                 ->where('sale_invoices.id',$invoice_id)
        //                 ->select('sale_items.id','products.title as product_title','sale_items.price','sale_items.quantity','sale_items.total','sale_invoices.challan_no')
        //                 ->get();

        if($invoice_id){

            $formData['sales_invoice_id'] = $invoice_id;
        }


        if( Receipt::create($formData) ){

            Session::flash('message' ,'Receipt Added Successfully');
        }

        if($invoice_id){
            return redirect("users/invoices/user_id/$user_id/invoice_id/$invoice_id/");
        } else {
            return redirect()->route('user.receipts', ['id'=>$user_id]);
        }

         
    }

    /* Delete a Receipt */
    public function destroy($user_id, $receipt_id){

        if( Receipt::destroy($receipt_id) ){

            Session::flash('message' ,'Receipt Deleted Successfully');
        }

        return redirect()->route('user.receipts', ['id'=>$user_id]);

    }
}