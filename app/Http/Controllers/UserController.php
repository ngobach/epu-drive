<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:true');
		$this->middleware('admin', ['only' => ['getActivation','postActivation']]);
	}


    function getEdit(Request $req){
		return view('auth.my_profile');
    }
    function postEdit(Request $req){
    	$this->validate($req, [
    		'name' => 'required|min:6',
    		'password' => 'confirmed'
		]);

		$req->user()->name = $req->input('name');
		if (!empty($req->password))
			$req->user()->password = bcrypt($req->password);
		$req->user()->save();
    	return back()->with('status', 'Thông tin đã được cập nhật!');
    }

    function getActivation(Request $req) {
    	$users = \App\User::where('actived','0')->get();
    	return view('auth.activation',compact('users'));
    }


    function postActivation(Request $req) {
    	$this->validate($req,['id'=>'required']);
    	$user = \App\User::findOrFail($req->id);
    	if (!empty($req->activate)){
    		$user->actived = true;
    		$user->save();
    		return back()->with('status','Kích hoạt thành công');
    	} else if (!empty($req->delete)){
    		$user->delete();
    		return back()->with('status','Xóa thành công');
    	}
    }

}