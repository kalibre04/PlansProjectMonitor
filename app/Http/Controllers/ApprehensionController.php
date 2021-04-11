<?php

namespace App\Http\Controllers;

use App\Models\Apprehension;
use App\Models\Offices;


use Request;
use DB;
use Validator;
use Carbon\Carbon;


class ApprehensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $apprehension = Apprehension::orderby('date_apprehended', 'DESC')->get();
        $offices = Offices::all()->pluck('officename', 'id');

        return view('mes/apprehension.index', compact('apprehension', 'offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Apprehension::create(Request::all());
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apprehension  $apprehension
     * @return \Illuminate\Http\Response
     */
    public function show(Apprehension $apprehension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apprehension  $apprehension
     * @return \Illuminate\Http\Response
     */
    public function edit(Apprehension $apprehension)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apprehension  $apprehension
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $apprehension = apprehension::find($id);
        $apprehension->update(Request::all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apprehension  $apprehension
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apprehension $apprehension)
    {
        //
    }
}
