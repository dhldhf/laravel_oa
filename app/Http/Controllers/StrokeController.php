<?php

namespace App\Http\Controllers;

use App\Models\Stroke;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrokeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $strokes = Stroke::paginate(10);
        return view('strokes.index',compact('strokes'));
//                DB::table('strokes')->truncate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stroke  $stroke
     * @return \Illuminate\Http\Response
     */
    public function show(Stroke $stroke)
    {
//        return view('strokes.show',compact('stroke'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stroke  $stroke
     * @return \Illuminate\Http\Response
     */
    public function edit(Stroke $stroke)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stroke  $stroke
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stroke $stroke)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stroke  $stroke
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stroke $stroke)
    {
        //
    }
}
