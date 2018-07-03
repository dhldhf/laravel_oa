<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = Room::paginate(10);
        return view('rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rooms.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        Room::create(
            [
                'property'=>$request->property,
                'num'=>$request->num,
                'attribution'=>$request->attribution,
                'accommodate'=>$request->accommodate,
                'rent'=>$request->rent,
                'hydropower'=>$request->hydropower,
                'internet'=>$request->internet,
            ]
        );
        return response()->json(['code' => '1', 'msg' => '增加成功！']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
        return view('rooms.edit',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
        $room->update(
            [
                'property'=>$request->property,
                'num'=>$request->num,
                'attribution'=>$request->attribution,
                'accommodate'=>$request->accommodate,
                'in'=>$request->in,
                'rent'=>$request->rent,
                'hydropower'=>$request->hydropower,
                'internet'=>$request->internet,
            ]
        );
        return response()->json(['code' => '1', 'msg' => '修改成功！']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
        $room->delete();
        return response()->json(['code' => '1', 'msg' => '删除成功！']);
    }
}
