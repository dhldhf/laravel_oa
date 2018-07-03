<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['create','store']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->validate($request,
//            [
//                'name'=>'required',
//                'password'=>'required|min:3|confirmed',
//                'email'=>'required|email|unique:users',
//            ],
//            [
//                'name.required'=>'名称不能为空',
//                'password.required'=>'密码不能为空',
//                'password.min'=>'密码不能小于三位',
//                'password.confirmed'=>'两次输入的密码不一致',
//                'email.required'=>'邮箱不能为空',
//                'email.email'=>'邮箱格式不正确',
//                'email.unique'=>'邮箱已存在',
//            ]);
//        var_dump($request->status);die;/**/
        User::create(
            [
                'name'=>$request->name,
                'password'=>bcrypt($request->password),
                'email'=>$request->email,
                'status'=>$request->status,
            ]
        );
        return response()->json(['code' => '1', 'msg' => '增加成功！']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
//        $this->validate($request,
//            [
//                'name'=>'required',
//                'password'=>'required|min:3|confirmed',
//                'email'=> 'required|email',
//
//            ],
//            [
//                'name.required'=>'名称不能为空',
//                'password.required'=>'密码不能为空',
//                'password.min'=>'密码不能小于三位',
//                'password.confirmed'=>'两次输入的密码不一致',
//                'email.required'=>'邮箱不能为空',
//                'email.email'=>'邮箱格式不正确',
//            ]);
        $user->update(
            [
                'name'=>$request->name,
                'password'=>bcrypt($request->password),
                'email'=>$request->email,
                'status'=>$request->status,
            ]
        );
        return response()->json(['code' => '1', 'msg' => '修改成功！']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
