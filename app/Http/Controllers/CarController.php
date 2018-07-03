<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
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
        $cars = Car::paginate(10);
        return view('cars.index',compact('cars'));
//        DB::table('strokes')->truncate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->name);
        $this->validate($request,
            [
                'name'=>'required',
                'brand'=>'required',
                'class'=>'required',
            ],
            [
                'name.required'=>'汽车名称不能为空',
                'brand.required'=>'车牌号不能为空',
                'class.required'=>'分类不能为空',
            ]);
        Car::create(
            [
                'name'=>$request->name,
                'brand'=>$request->brand,
                'class'=>$request->class,
            ]
        );
//        session()->flash('success','添加成功');
//        return redirect()->route('cars.index');
        return response()->json(['code' => '1', 'msg' => '添加成功！']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $drivers = Driver::all();
        return view('cars.show',compact('car','drivers'));
    }

    public function save(Request $request,Car $car){
//        var_dump($car);die;
        $this->validate($request,
            [
                'departure'=>'required',
                'destination'=>'required',
            ],
            [
                'departure.required'=>'出发地不能为空',
                'destination.required'=>'目的地不能为空',
            ]);
        $time = time();
        DB::table('strokes')->insert(
            [
                'driver_name'=>$request->driver_name,
                'departure'=>$request->departure,
                'destination'=>$request->destination,
                'status'=>$request->status,
                'time'=>$time,
                'car_name'=>$car->name,
                'brand'=>$car->brand,
                'car_id'=>$car->id,
            ]
        );
        $car->update(
            [
                'status'=>1,
            ]
        );
        DB::table('drivers')
        ->where('name', $request->driver_name)
            ->update(['status' => 1]);
        return response()->json(['code' => '1', 'msg' => '已发车！']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('cars.edit',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
//        var_dump($request->name);die;
        $this->validate($request,
            [
                'name'=>'required',
                'brand'=>'required',
                'class'=>'required',
            ],
            [
                'name.required'=>'汽车名称不能为空',
                'brand.required'=>'车牌号不能为空',
                'class.required'=>'分类不能为空',
            ]);
        $car->update(
            [
                'name'=>$request->name,
                'brand'=>$request->brand,
                'class'=>$request->class,
            ]
        );
        return response()->json(['code' => '1', 'msg' => '修改成功！']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
    }
    public function end(Car $car){
//        var_dump($car->name,$car->brand);die;
        $time = time();
       $car_id =  DB::table('strokes')->where('car_id',"=",$car->id)->first();
        DB::table('strokes')
            ->where('id', $car_id->id)
            ->update(
                [
                'brand'=>$car->brand,
                'car_name'=>$car->name,
                'end_time'=>$time,
                'status'=>0,
                'car_id'=>null,
                    ]
            );
//        DB::table('strokes')->insert(
//            [
//                'brand'=>$car->brand,
//                'car_name'=>$car->name,
//                'time'=>$time,
//                'status'=>0,
//            ]
//        );
        $car->update(
            [
                'status'=>0,
            ]
        );
        DB::table('drivers')
            ->where('name', $car_id->driver_name)
            ->update(['status' => 0]);
        return response()->json(['code' => '1', 'msg' => '增加成功！']);
//        return json_encode(true,1);
    }
}
