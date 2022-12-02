<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Cetagory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    Join Query with eloquent ORM
               $products = Product::join('cetagories','cetagories.id','=','products.catagories_id')
                        ->select('products.id','cetagories.title as cat_title','products.title as product_title','products.description','products.cost_price','products.price')
                        ->get();
                return view('products.products',compact('products'));

            //  $this->data['product'] = Product::all();
            //  return view('products.products', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = Cetagory::arrayForSelect();
        $this->data['mode'] = 'create';
        $this->data['headline'] = 'Add New Product';
        
        return view('products.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $formData = $request->all();

        if( Product::create($formData) ){

            Session::flash('message' , $formData['title']  .  ' Product Added Successfully');
        }

        return redirect()->to('products');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $product = Product::join('cetagories','cetagories.id','=','products.catagories_id')
                        ->where('products.id', $id)
                        ->select('products.id','cetagories.title as cat_title','products.title as product_title','products.description','products.cost_price','products.price')
                        ->first();
    
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['product'] = Product::findOrFail($id);
        $this->data['categories'] = Cetagory::arrayForSelect();
        $this->data['mode'] = 'edit';
        $this->data['headline'] = 'Update Product Information';

        return view('products.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $product = Product::find($id);
        $product -> catagories_id = $data['catagories_id'];
        $product -> title = $data['title'];
        $product -> description = $data['description'];
        $product -> cost_price = $data['cost_price'];
        $product -> price = $data['price'];
        
        if( $product->save() ){

            Session::flash('message', 'Product Updated Successfully');
        }

        return redirect()->to('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( Product::find($id)->delete() ){

            Session::flash('message', 'Product Deleted Successfully');
        }

        return redirect()->to('products');
    }
}
