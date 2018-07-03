<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => []
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::paginate(10);
        return view('drivers.index',compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required',
                'phone'=>'required',
            ],
            [
                'name.required'=>'汽车名称不能为空',
                'phone.required'=>'电话不能为空',
            ]);
        Driver::create(
            [
                'name'=>$request->name,
                'phone'=>$request->phone,
            ]
        );
            return response()->json(['code'=>'1','msg'=>'添加成功']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view('drivers.edit',compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $this->validate($request,
            [
                'name'=>'required',
                'phone'=>'required',
            ],
            [
                'name.required'=>'司机姓名不能为空',
                'phone.required'=>'手机号不能为空',
            ]);
        $driver->update(
            [
                'name'=>$request->name,
                'phone'=>$request->phone,
            ]
        );
        return response()->json(['code'=>'1','msg'=>'修改成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
    }
}
