<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
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
        $services = Service::paginate(3);
        return view('services.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
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
                'property'=>'required',
                'num'=>'required',
                'project'=>'required',
                'description'=>'required',
                'submission_time'=>'required',
                'progress'=>'required',
                'follow_up'=>'required',
        ],
            [
                'property.required'=>'楼盘不能为空',
                'num.required'=>'房号不能为空',
                'project.required'=>'维修项目不能为空',
                'description.required'=>'问题描述不能为空',
                'submission_time.required'=>'提交时间不能为空',
                'progress.required'=>'进展程度不能为空',
                'follow_up.required'=>'跟进人不能为空',
            ]
        );
        Service::create(
            [
            'property'=>$request->property,
            'num'=>$request->num,
            'project'=>$request->project,
            'description'=>$request->description,
            'submission_time'=>$request->submission_time,
            'progress'=>$request->progress,
            'follow_up'=>$request->follow_up,
        ]);
        session()->flash('success','添加成功');
        return redirect()->route('services.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request,
            [
                'property'=>'required',
                'num'=>'required',
                'project'=>'required',
                'description'=>'required',
                'submission_time'=>'required',
                'progress'=>'required',
                'follow_up'=>'required',
            ],
            [
                'property.required'=>'楼盘不能为空',
                'num.required'=>'房号不能为空',
                'project.required'=>'维修项目不能为空',
                'description.required'=>'问题描述不能为空',
                'submission_time.required'=>'提交时间不能为空',
                'progress.required'=>'进展程度不能为空',
                'follow_up.required'=>'跟进人不能为空',
            ]
        );
        $service->update(
            [
                'property'=>$request->property,
                'num'=>$request->num,
                'project'=>$request->project,
                'description'=>$request->description,
                'submission_time'=>$request->submission_time,
                'progress'=>$request->progress,
                'follow_up'=>$request->follow_up,
            ]);
        session()->flash('success','修改成功');
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
//        DB::table('services')->truncate();
        $service->delete();
    }
}
