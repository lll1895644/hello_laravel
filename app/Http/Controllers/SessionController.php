<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class SessionController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest',[
            'only'=>['create']
        ]);
    }


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
            if(Auth::user()->activated){
                session()->flash('success','欢迎回来！');
                return redirect()->intended(route('users.show',[Auth::user()]));
            }else{
                Auth::logout();
                session()->flash('warning','您的账号尚未激活，请前往邮箱激活！');
                return redirect('/');
            }
    		
    	}else{
    		session()->flash('danger','很抱歉，你的邮箱或者密码不正确！');
    		return redirect()->back();
    	} 
    	return;
    }

    public function destroy()
    {
    	Auth::logout();
    	session()->flash('success','退出成功');
    	return redirect('login');
    }
}
