<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wildliferegistration;
use App\Models\wildliferegistration_geotag;
use App\Models\Offices;

class WildlifeRegistrationController extends Controller
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
        $wildreg = wildliferegistration::all();
        $offices = Offices::all()->pluck('officename', 'id');
        return view('rps/wildliferegistration.index', compact('wildreg', 'offices'));
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
        $validated = $request->validate([
                    'docs_image' => 'required',
                    'map_image' => 'required',
                    'applicant_name' => 'required',
                    'location' => 'required',
                    'status' => 'required',
                    'dateissued' => 'required',
                    'inspection_image' => 'required',
                    'regnumber' => 'required',
                    'species' => 'required'
        ]);
        
        $wildreg = new wildliferegistration();

        if($request->file()){

            $docs_filename = time().'.'. $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('WildReg', $docs_filename, 'public');

            $map_filename = time().'.'. $request->map_image->getClientOriginalName();
            $map_filepath = $request->file('map_image')->storeAs('WildRegMaps', $map_filename, 'public');

            $inspectionreport_filename = time().'.'. $request->inspection_image->getClientOriginalName();
            $inspectionreport_filepath = $request->file('inspection_image')->storeAs('WildRegInsReport', $map_filename, 'public');


            $wildreg->applicant_name = $request->get('applicant_name');
            $wildreg->location = $request->get('location');
            $wildreg->status = $request->get('status');
            $wildreg->map_filename = $map_filename;
            $wildreg->map_filepath = '/'.$map_filepath;
            $wildreg->approveddocs_filename = $docs_filename;
            $wildreg->approveddocs_filepath = '/' .$docs_filepath;
            $wildreg->numberofwildlife = $request->get('numberofwildlife');
            $wildreg->species = $request->get('species');
            $wildreg->regnumber = $request->get('regnumber');
            $wildreg->inspectionreport_filename = $inspectionreport_filename;
            $wildreg->inspectionreport_filepath = '/' .$inspectionreport_filepath;
            $wildreg->dateissued = $request->get('dateissued');
            $wildreg->certification_fee = $request->get('certification_fee');
            $wildreg->office_id = $request->get('office_id');
            $wildreg->encoded_by = $request->get('encoded_by');
            $wildreg->save();

            return redirect()->back();
        }
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
        //
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
