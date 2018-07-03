<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;

class InterviewController extends Controller
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
        $interviews = Interview::paginate(3);
        return view('interviews.index',compact('interviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        var_dump($request->note);die;
        $this->validate($request,
            [
                'name'=>'required',
                'date'=>'required',
                'booking_date'=>'required',
                'send_date'=>'required',
                'medium'=>'required',
                'gender'=>'required',
                'eta'=>'required',
                'census'=>'required',
                'experience'=>'required',
                'position'=>'required',
            ],
            [
                'name.required'=>'姓名不能为空',
                'date.required'=>'日期不能为空',
                'gender.required'=>'性别必填',
                'medium.required'=>'中介不能为空',
                'send_date.required'=>'寄签日期不能为空',
                'booking_date.required'=>'订票日期不能为空',
                'eta.required'=>'预计到达时间不能为空',
                'census.required'=>'户籍不能为空',
                'experience.required'=>'经验不能为空',
                'position.required'=>'求职职位必填',
            ]);
//        var_dump($request->name);die;
        Interview::create(
            [
                'name'=>$request->name,
                'date'=>$request->date,
                'eta'=>$request->eta,
                'booking_date'=>$request->booking_date,
                'send_date'=>$request->send_date,
                'gender'=>$request->gender,
                'medium'=>$request->medium,
                'note'=>$request->note,
                'census'=>$request->census,
                'experience'=>$request->experience,
                'position'=>$request->position,
            ]
        );
        return response()->json(['code'=>'1','msg'=>'添加成功']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function show(Interview $interview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function edit(Interview $interview)
    {
        return view('interviews.edit',compact('interview'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interview $interview)
    {
        $this->validate($request,
            [
                'name'=>'required',
                'date'=>'required',
                'booking_date'=>'required',
                'send_date'=>'required',
                'medium'=>'required',
                'gender'=>'required',
                'eta'=>'required',
                'census'=>'required',
                'experience'=>'required',
                'position'=>'required',
            ],
            [
                'name.required'=>'姓名不能为空',
                'date.required'=>'日期不能为空',
                'gender.required'=>'性别必填',
                'medium.required'=>'中介不能为空',
                'send_date.required'=>'寄签日期不能为空',
                'booking_date.required'=>'订票日期不能为空',
                'eta.required'=>'预计到达时间不能为空',
                'census.required'=>'户籍不能为空',
                'experience.required'=>'经验不能为空',
                'position.required'=>'求职职位必填',
            ]);
//        var_dump($request->date);die;
        $interview->update(
            [
                'name'=>$request->name,
                'date'=>$request->date,
                'eta'=>$request->eta,
                'booking_date'=>$request->booking_date,
                'send_date'=>$request->send_date,
                'gender'=>$request->gender,
                'medium'=>$request->medium,
                'note'=>$request->note,
                'census'=>$request->census,
                'experience'=>$request->experience,
                'position'=>$request->position,
            ]
        );
        return response()->json(['code'=>'1','msg'=>'修改成功']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interview $interview)
    {
        $interview->delete();
    }
}
