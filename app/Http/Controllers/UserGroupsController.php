<?php
namespace Illuminate\Routing;
namespace App\Http\Controllers;
use App\Models\Group;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class UserGroupsController extends Controller
{
    public function index(){

        $this->data['groups'] = Group::all();

        return view('groups.groups', $this->data);
    }
    public function create(){

        return view('groups.create');
    }
    public function store(Request $request){

        $formData = $request->all();

        if( Group::create($formData) ){

            Session::flash('message', 'Group Create Successfully');
        }

        return redirect()->to('groups');  
}

    public function destroy($id){

        if(  Group::find($id)->delete() ){

            Session::flash('message', 'Group Deleted Successfully');
        }
        
        return redirect()->to('groups');
    }

}
