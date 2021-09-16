<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Models\cutting_permits;
use App\Models\cuttingpermit_geotag;
use App\Models\Offices;
use App\Models\permit_type;


class CuttingPermitController extends Controller
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
        $cutperm = cutting_permits::all();
        $offices = Offices::all()->pluck('officename', 'id');
        $permittype = permit_type::all()->pluck('permittype', 'id');
        $status = status_tbl::all()->pluck('status', 'id');

        return view('rps/cuttingpermit.index', compact('cutperm', 'offices', 'permittype', 'status'));
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
                    'area' => 'required', 
                    'location' => 'required',
                    'status' => 'required',
                    'date_award' => 'required',
                    'cutting_permitnum' => 'required'
        ]);
        
        $cutperm = new cutting_permits;

        if($request->file()){
            $docs_filename = time().'.'. $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('CuttingPermitDocs', $docs_filename, 'public');

            $map_filename = time().'.'. $request->map_image->getClientOriginalName();
            $map_filepath = $request->file('map_image')->storeAs('CuttingPermitMaps', $map_filename, 'public');


            $cutperm->applicant_name = $request->get('applicant_name');
            $cutperm->area = $request->get('area');
            $cutperm->location = $request->get('location');
            $cutperm->status = $request->get('status');
            $cutperm->permit_type = $request->get('permit_type');
            $cutperm->date_award = $request->get('date_award');
            $cutperm->map_filename = $map_filename;
            $cutperm->map_filepath = '/'.$map_filepath;
            $cutperm->approveddocs_filename = $docs_filename;
            $cutperm->approveddocs_filepath = '/' .$docs_filepath;
            $cutperm->volume = $request->get('volume');
            $cutperm->species = $request->get('species');         
            $cutperm->cutting_permitnum = $request->get('cutting_permitnum');
            $cutperm->date_approved = $request->get('date_approved');
            $cutperm->certification_fee = $request->get('certification_fee');
            $cutperm->office_id = $request->get('office_id');
            $cutperm->encoded_by = $request->get('encoded_by');
            $cutperm->save();

            return redirect()->back();

        } else{

            $cutperm->applicant_name = $request->get('applicant_name');
            $cutperm->area = $request->get('area');
            $cutperm->location = $request->get('location');
            $cutperm->status = $request->get('status');
            $cutperm->permit_type = $request->get('permit_type');
            $cutperm->date_award = $request->get('date_award');
            $cutperm->volume = $request->get('volume');
            $cutperm->species = $request->get('species');         
            $cutperm->cutting_permitnum = $request->get('cutting_permitnum');
            $cutperm->date_approved = $request->get('date_approved');
            $cutperm->certification_fee = $request->get('certification_fee');
            $cutperm->office_id = $request->get('office_id');
            $cutperm->encoded_by = $request->get('encoded_by');
            $cutperm->save();

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
        $cutperm = cutting_permits::find($id);
        $cutperm_1 = cutting_permits::find($id);

        $validated = $request->validate([
                    'applicant_name' => 'required',
                    'area' => 'required', 
                    'location' => 'required',
                    'status' => 'required',
                    'date_award' => 'required',
                    'cutting_permitnum' => 'required'
        ]);

        if($request->file()){
            $docs_filename = time().'.'. $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('CuttingPermitDocs', $docs_filename, 'public');

            $map_filename = time().'.'. $request->map_image->getClientOriginalName();
            $map_filepath = $request->file('map_image')->storeAs('CuttingPermitMaps', $map_filename, 'public');

            $olddocsfile = $cutperm->approveddocs_filename;
            Storage::delete('public/CuttingPermitDocs/' . $olddocsfile);

            $oldmapfile = $cutperm->map_filename;
            Storage::delete('public/CuttingPermitMaps/' . $oldmapfile);

            $cutperm->applicant_name = $request->get('applicant_name');
            $cutperm->area = $request->get('area');
            $cutperm->location = $request->get('location');
            $cutperm->status = $request->get('status');
            $cutperm->permit_type = $request->get('permit_type');
            $cutperm->date_award = $request->get('date_award');
            $cutperm->map_filename = $map_filename;
            $cutperm->map_filepath = '/'.$map_filepath;
            $cutperm->approveddocs_filename = $docs_filename;
            $cutperm->approveddocs_filepath = '/' .$docs_filepath;
            $cutperm->volume = $request->get('volume');
            $cutperm->species = $request->get('species');         
            $cutperm->cutting_permitnum = $request->get('cutting_permitnum');
            $cutperm->date_approved = $request->get('date_approved');
            $cutperm->certification_fee = $request->get('certification_fee');
            $cutperm->office_id = $request->get('office_id');
            $cutperm->encoded_by = $request->get('encoded_by');
            $cutperm->save();

            return redirect()->back();

        } else{

            $cutperm->applicant_name = $request->get('applicant_name');
            $cutperm->area = $request->get('area');
            $cutperm->location = $request->get('location');
            $cutperm->status = $request->get('status');
            $cutperm->permit_type = $request->get('permit_type');
            $cutperm->date_award = $request->get('date_award');

            $cutperm->map_filename = $cutperm_1->map_filename;
            $cutperm->map_filepath = $cutperm_1->map_filepath;
            $cutperm->approveddocs_filename = $cutperm_1->docs_filename;
            $cutperm->approveddocs_filepath = $cutperm_1->docs_filepath;

            $cutperm->volume = $request->get('volume');
            $cutperm->species = $request->get('species');         
            $cutperm->cutting_permitnum = $request->get('cutting_permitnum');
            $cutperm->date_approved = $request->get('date_approved');
            $cutperm->certification_fee = $request->get('certification_fee');
            $cutperm->office_id = $request->get('office_id');
            $cutperm->encoded_by = $request->get('encoded_by');
            $cutperm->save();

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
                $file_path = $photo->storeAs($request->rec_id, $name, 'cuttingpermit_geotag');      
                $photoss = new cuttingpermit_geotag();
                $photoss->filename = $name;
                $photoss->filepath = 'cuttingpermit_geotag/'.$file_path;
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
