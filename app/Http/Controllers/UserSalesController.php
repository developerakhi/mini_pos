<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use App\Models\Product;
use App\Models\SaleInvoice;
use App\Models\SaleItems;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserSalesController extends Controller
{
    public function index($id){
        // return "Hello";
        $tab_menu = 'sales';
         $user = UserModel::join('groups','users.group_id','=','groups.id')
                    ->join('sale_invoices','sale_invoices.user_id','=','users.id')
                    ->where('users.id', $id)
                    ->select('users.id','users.name as user_name','groups.title','users.email','users.phone','users.address',  'sale_invoices.challan_no')
                    ->first();

        // $user = UserModel::join('groups','groups.id','=','users.group_id')->where('users.id',$id)->select('users.name','users.email','users.phone','users.address','groups.title as group_name')->first();
         return view('users.sales.sales',compact('user','tab_menu'));
    }

    public function createInvoice(InvoiceRequest $request, $user_id){

        $formData = $request->all();
        $formData['user_id'] = $user_id;
        $formData['admin_id'] = Auth::id();

        if( SaleInvoice::create($formData) ){

            Session::flash('message' ,'Sale Invoice Created Successfully');
        }

        return redirect()->route('user.sales', ['id'=>$user_id]); 
    }

    public function invoice($user_id, $invoice_id){
    //   return $user_id ;
        // $user = UserModel::findOrFail($user_id);
        $sales_items = $this->data['invoice'] = SaleInvoice::findOrFail($invoice_id);
        $product = $this->data['products'] = Product::arrayForSelect();
        $tab_menu = 'sales';
                    
        // return $invoice = SaleItems::join('sale_invoices','sale_items.sales_invoice_id','=','sale_invoices.id')->where('sale_invoices.user_id', $user_id)->get();

        $user = UserModel::findOrFail($user_id);
        
        
        $invoices = SaleInvoice::join('sale_items','sale_items.sales_invoice_id','=','sale_invoices.id')
                        ->join('products','products.id','=','sale_items.product_id')
                        ->where('sale_invoices.user_id', $user_id)
                        ->where('sale_invoices.id',$invoice_id)
                        ->select('sale_items.id','products.title as product_title','sale_items.price','sale_items.quantity','sale_items.total','sale_invoices.challan_no')
                        ->get();

        $sales_items = SaleItems::join('sale_invoices','sale_invoices.id','=','sale_items.sales_invoice_id')->where('sale_items.sales_invoice_id',$invoice_id)->select('sale_invoices.challan_no','sale_invoices.date')->first();

        // $product = Product::join('cetagories','cetagories.id','=','products.catagories_id')
        //                 ->where('products.id')
        //                 ->select('products.id','cetagories.title as cat_title','products.title as product_title','products.description','products.cost_price','products.price')
        //                 ->first();
                   
         return view('users.sales.invoice',compact('invoices', 'user','sales_items', 'product', 'tab_menu'));
        // return view('users.sales.invoice', $this->data);
    }

    
}
