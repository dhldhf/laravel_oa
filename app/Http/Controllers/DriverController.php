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
        $drivers = Driver::paginate(3);
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
                'logo'=>'required|image',
                'phone'=>'required',
            ],
            [
                'name.required'=>'汽车名称不能为空',
                'logo.required'=>'头像不能为空',
                'logo.image'=>'图片格式不正确',
                'phone.required'=>'电话不能为空',
            ]);
        $fileName = $request->file('logo')->store('public/drivers');
        $file = url(Storage::url($fileName));
        Driver::create(
            [
                'name'=>$request->name,
                'logo'=>$file,
                'phone'=>$request->phone,
            ]
        );
        session()->flash('success','添加成功');
        return redirect()->route('drivers.index');
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
                'logo'=>'required|image',
                'phone'=>'required',
            ],
            [
                'name.required'=>'司机姓名不能为空',
                'logo.required'=>'司机头像不能为空',
                'logo.image'=>'图片格式不正确',
                'phone.required'=>'手机号不能为空',
            ]);
        $fileName = $request->file('logo')->store('public/drivers');
        $file = url(Storage::url($fileName));
        $driver->update(
            [
                'name'=>$request->name,
                'logo'=>$file,
                'phone'=>$request->phone,
            ]
        );
        session()->flash('success','修改成功');
        return redirect()->route('drivers.index');
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
