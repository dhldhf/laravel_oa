<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    //登录页面
    public function create()
    {
        if (Auth::user()){
            return redirect()->route('interviews.index');
        }
        return view('sessions.create');
    }
    //登录验证
    public function store(Request $request)
    {
//        var_dump($request->name);die;
        $this->validate($request,
            [
                'name'=>'required',
                'password'=>'required',
                'captcha'=>'required|captcha',
            ],
            [
                'name.required'=>'用户名不能为空',
                'password.required'=>'密码不能为空',
                'captcha.required'=>'验证码不能为空',
                'captcha.captcha'=>'验证码格式不正确',
            ]);
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password],$request->has('rememberMe'))) {
            session()->flash('success','登录成功');
            return redirect()->intended('/');
        }else{
            session()->flash('danger','登录失败,用户名或密码错误');
            return redirect()->back();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect()->route('login');
    }
}
