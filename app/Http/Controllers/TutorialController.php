<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.tutorial.index',[
            'title' => "Tutorial",
            'tutorials' => Tutorial::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutorial  $tutorial
     * @return \Illuminate\Http\Response
     */
    public function show(Tutorial $tutorial)
    {
        return view('frontend.tutorial.detail',[
            'title' => "Detail tutorial",
            'tutorial' => $tutorial
        ]);
    }
}
