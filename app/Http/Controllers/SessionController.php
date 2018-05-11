<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class SessionController extends Controller
{
    public function create()
    {
    	return view('session.create');
    }

    public function store(Request $request)
    {
    	$credetail = $this->validate($request,[
    		'email'=>'required|email|max:255',
    		'password'=>'required'
    	]);
    	if(Auth::attempt($credetail,$request->has('remember'))){
    		session()->flash('success','欢迎回来！');
    		return redirect()->route('users.show',[Auth::user()]);
    	}else{
    		session()->flash('danger','很抱歉，你的邮箱或者密码不正确！');
    		return redirect()->back();
    	} 
    	return;
    }

    public funtion destroy()
    {
    	Auth::loginout();
    	session()->flash('success','退出成功');
    	return redirect('login');
    }
}
