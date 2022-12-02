<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Cetagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Cetagory::all();


        return view('category.categories', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['headline'] = 'Add New Category';
        $this->data['mode'] = 'create';
        return view('category.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $formData = $request->all();

        if( Cetagory::create($formData) ){

            Session::flash('message' , $formData['title']  .  'Category Added Successfully');
        }

        return redirect()->to('categories'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['category'] = Cetagory::findOrFail($id);

        $this->data['mode'] = 'edit';

        $this->data['headline'] = 'Update Category';

        return view('category.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        

        $category = Cetagory::find($id);
        $category -> title = $request->get('title'); 
        
        if( $category->save() ){

            Session::flash('message', 'Category Updated Successfully');
        }

        return redirect()->to('categories');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( Cetagory::find($id)->delete() ){

            Session::flash('message', 'Category Deleted Successfully');
        }

        return redirect()->to('categories');
    }
}
