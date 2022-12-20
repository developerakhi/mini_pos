<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Group;
use App\Models\UserModel;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $this->data['users'] = UserModel::all();
         return view('users.users', $this->data);
         
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['groups'] = Group::arrayForSelect();
        $this->data['mode'] = 'create';
        $this->data['headline'] = 'Add New User';
        
        return view('users.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $data = $request->all();

        if( UserModel::create($data) ){

            Session::flash('message', 'User Create Successfully');
        }

        return redirect()->to('users');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $tab_menu = 'user_info';
        $user = UserModel::join('groups','users.group_id','=','groups.id')
                        ->where('users.id', $id)
                        ->select('users.id','users.name as user_name','groups.title','users.email','users.phone','users.address')
                        ->first();
     
        return view('users.show',compact('user','tab_menu'));     
     }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['user'] = UserModel::findOrFail($id);
        $this->data['groups'] = Group::arrayForSelect();
        $this->data['mode'] = 'edit';
        $this->data['headline'] = 'Update Information';
        return view('users.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->all();

        $user = UserModel::find($id);
        $user -> group_id = $data['group_id'];
        $user -> name = $data['name'];
        $user -> phone = $data['phone'];
        $user -> email = $data['email'];
        $user -> address = $data['address'];
        
        if( $user->save() ){

            Session::flash('message', 'User Updated Successfully');
        }

        return redirect()->to('users');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( UserModel::find($id)->delete() ){

            Session::flash('message', 'User Deleted Successfully');
        }

        return redirect()->to('users');
    }
}
