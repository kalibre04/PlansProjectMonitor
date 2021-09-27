<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\wildliferegistration;
use App\Models\wildliferegistration_geotag;
use App\Models\Offices;
use App\Models\status_tbl;
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
        $status = status_tbl::all()->pluck('status', 'status');
        return view('rps/wildliferegistration.index', compact('wildreg', 'offices','status'));
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
        

        
        $wildreg = wildliferegistration::find($id);
        $wildreg_1 = wildliferegistration::find($id);

        if($request->file()){

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

            $docs_filename = time().'.'. $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('WildReg', $docs_filename, 'public');

            $map_filename = time().'.'. $request->map_image->getClientOriginalName();
            $map_filepath = $request->file('map_image')->storeAs('WildRegMaps', $map_filename, 'public');

            $inspectionreport_filename = time().'.'. $request->inspection_image->getClientOriginalName();
            $inspectionreport_filepath = $request->file('inspection_image')->storeAs('WildRegInsReport', $map_filename, 'public');


            $olddocsfile = $wildreg->approveddocs_filename;
            Storage::delete('public/WildReg/' . $olddocsfile);

            $oldmapfile = $wildreg->map_filename;
            Storage::delete('public/WildRegMaps/' . $oldmapfile);

            $oldinsreportfile = $wildreg->inspectionreport_filename;
            Storage::delete('public/WildRegInsReport/' . $oldinsreportfile);



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
        } else{

            $validated = $request->validate([
                    
                    'applicant_name' => 'required',
                    'location' => 'required',
                    'status' => 'required',
                    'dateissued' => 'required',
                    
                    'regnumber' => 'required',
                    'species' => 'required'
        ]);


            $wildreg->applicant_name = $request->get('applicant_name');
            $wildreg->location = $request->get('location');
            $wildreg->status = $request->get('status');
            $wildreg->map_filename = $wildreg_1->map_filename;
            $wildreg->map_filepath = $wildreg_1->map_filepath;
            $wildreg->approveddocs_filename = $wildreg_1->docs_filename;
            $wildreg->approveddocs_filepath = $wildreg_1->docs_filepath;
            $wildreg->numberofwildlife = $request->get('numberofwildlife');
            $wildreg->species = $request->get('species');
            $wildreg->regnumber = $request->get('regnumber');
            $wildreg->inspectionreport_filename = $wildreg_1->inspectionreport_filename;
            $wildreg->inspectionreport_filepath = $wildreg_1->inspectionreport_filepath;
            $wildreg->dateissued = $request->get('dateissued');
            $wildreg->certification_fee = $request->get('certification_fee');
            $wildreg->office_id = $request->get('office_id');
            $wildreg->encoded_by = $request->get('encoded_by');
            $wildreg->save();

            return redirect()->back();


        }

    }

    public function upload_photo(Request $request)
    { 
            $validated = $request->validate([
                    'photos' => 'required'
            ]);
            
            /*$this->validate($request, [
                    'photos' => 'required',                
            ]);*/
            /*dd($request->photos);*/
            //$photos = $request->file('photos');
            //$fid = $request->get('rec_id');
            $total_files = count($request->file('photos'));
            foreach($request->file('photos') as $photo)
            {
                $name = time().'.'. $photo->getClientOriginalName();
                $file_path = $photo->storeAs($request->rec_id, $name, 'wildliferegistration_geotag');      
                $photoss = new wildliferegistration_geotag();
                $photoss->filename = $name;
                $photoss->filepath = 'wildliferegistration_geotag/'.$file_path;
                $photoss->f_id = $request->get('rec_id');
                
                $photoss->save();                
            }
            return back()->with('success', $total_files . " files has been uploaded to patent id no. " . $request->rec_id);
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
