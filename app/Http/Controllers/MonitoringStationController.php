<?php

namespace App\Http\Controllers;


use App\Models\Offices;
use App\Models\MonitoringStation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use Carbon\Carbon;


class MonitoringStationController extends Controller
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
        $monstation = MonitoringStation::all();
        $offices = Offices::all()->pluck('officename', 'id');

        return view('mes/monitoringstation.index', compact('monstation', 'offices'));
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
    public function store(Request $request)
    {
        /*$request->validate([
            'photo' => 'required|mimes:jpg,JPEG,jpeg,png|max:10000'
        ]);*/

        $monstation = new MonitoringStation;

        if($request->file()){
            $filename = time().'.'. $request->photo->getClientOriginalName();
            $filepath = $request->file('photo')->storeAs('monitoringstations', $filename, 'public');

            $monstation->location = $request->get('location');
            $monstation->personnelassigned = $request->get('personnelassigned');
            $monstation->office_id = $request->get('office_id');
            $monstation->filename = $filename;
            $monstation->file_path = $filepath;
            $monstation->encoded_by = $request->get('encoded_by');
            $monstation->save();

            return redirect()->back();
        } else{

            $monstation->location = $request->get('location');
            $monstation->personnelassigned = $request->get('personnelassigned');
            $monstation->office_id = $request->get('office_id');
            $monstation->encoded_by = $request->get('encoded_by');
            $monstation->save();

            return redirect()->back();

        }


        /*$request->image->store('monitoringstations', 'public');*/
        //MonitoringStation::create(Request::all());
        //return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $monstation = MonitoringStation::find($id);
        $monstations = MonitoringStation::find($id);
        // $request->validate([
        //     'photo' => 'required|mimes:jpg,JPEG,jpeg,png|max:2048'
        // ]);

        if($request->file()){

            $filename = $request->photo->getClientOriginalName();
            $filepath = $request->file('photo')->storeAs('monitoringstations', $filename, 'public');

            $monstation->location = $request->location;
            $monstation->personnelassigned = $request->personnelassigned;
            $monstation->office_id = $request->office_id;
            $monstation->filename = $filename;
            $monstation->file_path = '/' . $filepath;
            $monstation->encoded_by = $request->encoded_by;
            $monstation->save();

            return redirect()->back();
            
        }else{

            $monstation->location = $request->location;
            $monstation->personnelassigned = $request->personnelassigned;
            $monstation->office_id = $request->office_id;
            $monstation->filename = $monstations->filename;
            $monstation->file_path = $monstations->file_path;
            $monstation->encoded_by = $request->encoded_by;
            $monstation->save();

            return redirect()->back();

        }

        /*$monitoringstationss->update(Request::all());
        return redirect()->back();*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
