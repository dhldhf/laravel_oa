<?php

namespace App\Http\Controllers;

use App\Models\Gang;
use Illuminate\Http\Request;

class GangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gangs = Gang::paginate(10);
        return view('gangs.index',compact('gangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        var_dump(234);die;
        return view('gangs.create');
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
                'alias'=>'required',
                'phone'=>'required',
                'post'=>'required',
                'entry_time'=>'required',
                'visa_fees'=>'required',
                'customs_costs'=>'required',
                'agency_costs'=>'required',
                'other_fee'=>'required',
                'medium'=>'required',
                'num'=>'required',
            ],
            [
                'name.required'=>'姓名不能为空',
                'alias.required'=>'别名不能为空',
                'phone.required'=>'电话必填',
                'post.required'=>'岗位不能为空',
                'entry_time.required'=>'入职日期不能为空',
                'visa_fees.required'=>'签证费用不能为空',
                'customs_costs.required'=>'保关费用不能为空',
                'agency_costs.required'=>'中介费用不能为空',
                'other_fee.required'=>'其他费用不能为空',
                'medium.required'=>'中介返佣情况不能为空',
                'num.required'=>'入住房号不能为空',
            ]);
//        var_dump($request->date);die;
        Gang::create(
            [
                'name'=>$request->name,
                'alias'=>$request->alias,
                'phone'=>$request->phone,
                'post'=>$request->post,
                'entry_time'=>$request->entry_time,
                'visa_fees'=>$request->visa_fees,
                'customs_costs'=>$request->customs_costs,
                'agency_costs'=>$request->agency_costs,
                'other_fee'=>$request->other_fee,
                'medium'=>$request->medium,
                'num'=>$request->num,
            ]
        );

        session()->flash('success','添加成功');
        return redirect()->route('gangs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gang  $gang
     * @return \Illuminate\Http\Response
     */
    public function show(Gang $gang)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gang  $gang
     * @return \Illuminate\Http\Response
     */
    public function edit(Gang $gang)
    {
//        var_dump(2345);die;
        return view('gangs.edit',compact('gang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gang  $gang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gang $gang)
    {
//        var_dump(2342);die;
        $this->validate($request,
            [
                'name'=>'required',
                'alias'=>'required',
                'phone'=>'required',
                'post'=>'required',
                'entry_time'=>'required',
                'visa_fees'=>'required',
                'customs_costs'=>'required',
                'agency_costs'=>'required',
                'other_fee'=>'required',
                'medium'=>'required',
                'num'=>'required',
            ],
            [
                'name.required'=>'姓名不能为空',
                'alias.required'=>'别名不能为空',
                'phone.required'=>'电话必填',
                'post.required'=>'岗位不能为空',
                'entry_time.required'=>'入职日期不能为空',
                'visa_fees.required'=>'签证费用不能为空',
                'customs_costs.required'=>'保关费用不能为空',
                'agency_costs.required'=>'中介费用不能为空',
                'other_fee.required'=>'其他费用不能为空',
                'medium.required'=>'中介返佣情况不能为空',
                'num.required'=>'入住房号不能为空',
            ]);
//        var_dump($request->date);die;
        $gang->update(
            [
                'name'=>$request->name,
                'alias'=>$request->alias,
                'phone'=>$request->phone,
                'post'=>$request->post,
                'entry_time'=>$request->entry_time,
                'visa_fees'=>$request->visa_fees,
                'customs_costs'=>$request->customs_costs,
                'agency_costs'=>$request->agency_costs,
                'other_fee'=>$request->other_fee,
                'medium'=>$request->medium,
                'num'=>$request->num,
            ]
        );

        session()->flash('success','修改成功');
        return redirect()->route('gangs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gang  $gang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gang $gang)
    {
        $gang->delete();
    }
}
