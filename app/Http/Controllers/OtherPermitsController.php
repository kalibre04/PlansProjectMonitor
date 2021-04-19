<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offices;
use App\Models\otherpermits;
use App\Models\otherpermits_geotag;

use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use Carbon\Carbon;

class OtherPermitsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $otherperm = otherpermits::all();
        $offices = Offices::all()->pluck('officename', 'id');

        return view('rps/otherpermits.index', compact('otherperm', 'offices'));
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
                    'permitnum' => 'required',
                    'cuttingpermitnum' => 'required',
                    'certification_fee' => 'required',
                    'species' => 'required'
        ]);
        
        $otherperm = new otherpermits();
        if($request->file()){

            $docs_filename = time().'.'. $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('OtherPermits', $docs_filename, 'public');

            $map_filename = time().'.'. $request->map_image->getClientOriginalName();
            $map_filepath = $request->file('map_image')->storeAs('OtherPermitsMaps', $map_filename, 'public');

            $inspectionreport_filename = time().'.'. $request->inspection_image->getClientOriginalName();
            $inspectionreport_filepath = $request->file('inspection_image')->storeAs('OtherPermitsInsReport', $map_filename, 'public');


            $otherperm->applicant_name = $request->get('applicant_name');
            $otherperm->location = $request->get('location');
            $otherperm->status = $request->get('status');
            $otherperm->map_filename = $map_filename;
            $otherperm->map_filepath = '/'.$map_filepath;
            $otherperm->approveddocs_filename = $docs_filename;
            $otherperm->approveddocs_filepath = '/' .$docs_filepath;
            $otherperm->permitnum = $request->get('permitnum');
            $otherperm->species = $request->get('species');
            $otherperm->cuttingpermitnum = $request->get('cuttingpermitnum');
            $otherperm->insreport_filename = $inspectionreport_filename;
            $otherperm->insreport_filepath = '/' .$inspectionreport_filepath;
            $otherperm->date_issued = $request->get('dateissued');
            $otherperm->certification_fee = $request->get('certification_fee');
            $otherperm->office_id = $request->get('office_id');
            $otherperm->encoded_by = $request->get('encoded_by');
            $otherperm->save();

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
        $otherperm = otherpermits::find($id);
        $otherperm_1 = otherpermits::find($id);
        
        if($request->file()){

            $validated = $request->validate([
                    'docs_image' => 'required',
                    'map_image' => 'required',
                    'applicant_name' => 'required',
                    'location' => 'required',
                    'status' => 'required',
                    'dateissued' => 'required',
                    'inspection_image' => 'required',
                    'permitnum' => 'required',
                    'cuttingpermitnum' => 'required',
                    'species' => 'required',
                    'certification_fee' => 'required'
            ]);

            $docs_filename = time().'.'. $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('OtherPermits', $docs_filename, 'public');

            $map_filename = time().'.'. $request->map_image->getClientOriginalName();
            $map_filepath = $request->file('map_image')->storeAs('OtherPermitsMaps', $map_filename, 'public');

            $inspectionreport_filename = time().'.'. $request->inspection_image->getClientOriginalName();
            $inspectionreport_filepath = $request->file('inspection_image')->storeAs('OtherPermitsInsReport', $map_filename, 'public');


            $otherperm->applicant_name = $request->get('applicant_name');
            $otherperm->location = $request->get('location');
            $otherperm->status = $request->get('status');
            $otherperm->map_filename = $map_filename;
            $otherperm->map_filepath = '/'.$map_filepath;
            $otherperm->approveddocs_filename = $docs_filename;
            $otherperm->approveddocs_filepath = '/' .$docs_filepath;
            $otherperm->permitnum = $request->get('permitnum');
            $otherperm->species = $request->get('species');
            $otherperm->cuttingpermitnum = $request->get('cuttingpermitnum');
            $otherperm->insreport_filename = $inspectionreport_filename;
            $otherperm->insreport_filepath = '/' .$inspectionreport_filepath;
            $otherperm->date_issued = $request->get('dateissued');
            $otherperm->certification_fee = $request->get('certification_fee');
            $otherperm->office_id = $request->get('office_id');
            $otherperm->encoded_by = $request->get('encoded_by');
            $otherperm->save();

            return redirect()->back();
        
        }else{
            $validated = $request->validate([
                    'applicant_name' => 'required',
                    'location' => 'required',
                    'status' => 'required',
                    'dateissued' => 'required',
                    'permitnum' => 'required',
                    'cuttingpermitnum' => 'required',
                    'species' => 'required',
                    'certification_fee' => 'required'
            ]);

            $otherperm->applicant_name = $request->get('applicant_name');
            $otherperm->location = $request->get('location');
            $otherperm->status = $request->get('status');
            $otherperm->map_filename = $otherperm_1->map_filename;
            $otherperm->map_filepath = $otherperm_1->map_filepath;
            $otherperm->approveddocs_filename = $otherperm->docs_filename;
            $otherperm->approveddocs_filepath = $otherperm->docs_filepath;
            $otherperm->permitnum = $request->get('permitnum');
            $otherperm->species = $request->get('species');
            $otherperm->cuttingpermitnum = $request->get('cuttingpermitnum');
            $otherperm->insreport_filename = $otherperm->inspectionreport_filename;
            $otherperm->insreport_filepath = $otherperm->inspectionreport_filepath;
            $otherperm->date_issued = $request->get('dateissued');
            $otherperm->certification_fee = $request->get('certification_fee');
            $otherperm->office_id = $request->get('office_id');
            $otherperm->encoded_by = $request->get('encoded_by');
            $otherperm->save();
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
                $file_path = $photo->storeAs($request->rec_id, $name, 'otherpermits_geotag');      
                $photoss = new otherpermits_geotag();
                $photoss->filename = $name;
                $photoss->filepath = 'otherpermits_geotag/'.$file_path;
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
