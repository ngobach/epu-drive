<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:true');
		$this->middleware('admin', ['only' => ['getActivation','postActivation']]);
	}


    function getEdit(Request $req,$id = false){
        if (!$id)
            return redirect()->action('UserController@getEdit', ['id'=>$req->user()->id]);
        if ($id != $req->user()->id && !$req->user()->admin)
            abort(403);
        $user = User::findOrFail($id);
		return view('auth.edit', ['user'=>$user]);
    }

    function postEdit(Request $req, $id){
    	$this->validate($req, [
    		'name' => 'required|min:6',
    		'password' => 'confirmed'
		]);

        if ($id != $req->user()->id && !$req->user()->admin)
            abort(403);

        $user = User::findOrFail($id);

		$user->name = $req->input('name');
		if (!empty($req->password))
			$user->password = bcrypt($req->password);
		$user->save();
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

    public function getDetail(Request $req, $id)
    {
        $user = User::findOrFail($id);
        return view('auth.detail', ['user'=>$user]);
    }
}