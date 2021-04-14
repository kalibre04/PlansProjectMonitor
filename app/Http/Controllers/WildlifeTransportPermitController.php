<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WildlifeTransportPermit;
use App\Models\WildlifeTransportPermit_geotag;
use App\Models\Offices;

class WildlifeTransportPermitController extends Controller
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
        $wtp = WildlifeTransportPermit::all();
        $offices = Offices::all()->pluck('officename', 'id');
        return view('rps/wtp.index', compact('wtp', 'offices'));
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
                    'proofofacquisition' => 'required', 
                    'location' => 'required',
                    'status' => 'required',
                    'dateissued' => 'required',
                    'inspection_image' => 'required',
                    'permitnumber' => 'required',
                    'species' => 'required'
        ]);
        
        $wtp = new WildlifeTransportPermit();

        if($request->file()){

            $proofofacquisition_filename = time().'.'. $request->proofofacquisition->getClientOriginalName();
            $proofofacquisition_filepath = $request->file('proofofacquisition')->storeAs('WTPermitproofofacquisition', $proofofacquisition_filename, 'public');

            $docs_filename = time().'.'. $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('WTPermits', $docs_filename, 'public');

            $map_filename = time().'.'. $request->map_image->getClientOriginalName();
            $map_filepath = $request->file('map_image')->storeAs('WTPermitMaps', $map_filename, 'public');

            $inspectionreport_filename = time().'.'. $request->inspection_image->getClientOriginalName();
            $inspectionreport_filepath = $request->file('inspection_image')->storeAs('WTPermitInsReport', $map_filename, 'public');


            $wtp->applicant_name = $request->get('applicant_name');
            $wtp->proofacquisition_filename = $proofofacquisition_filename;
            $wtp->proofacquisition_filepath = '/' .$proofofacquisition_filepath;
            $wtp->location = $request->get('location');
            $wtp->destination = $request->get('destination');
            $wtp->status = $request->get('status');
            $wtp->map_filename = $map_filename;
            $wtp->map_filepath = '/'.$map_filepath;
            $wtp->approveddocs_filename = $docs_filename;
            $wtp->approveddocs_filepath = '/' .$docs_filepath;
            $wtp->numberofwildlife = $request->get('numberofwildlife');
            $wtp->species = $request->get('species');
            $wtp->inspectionreport_filename = $inspectionreport_filename;
            $wtp->inspectionreport_filepath = '/' .$inspectionreport_filepath;         
            $wtp->permitnumber = $request->get('permitnumber');
            $wtp->dateissued = $request->get('dateissued');
            $wtp->certification_fee = $request->get('certification_fee');
            $wtp->office_id = $request->get('office_id');
            $wtp->encoded_by = $request->get('encoded_by');
            $wtp->save();

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
                
        $wtp = WildlifeTransportPermit::find($id);
        $wtp_1 = WildlifeTransportPermit::find($id);

        if($request->file()){

            $validated = $request->validate([
                    'docs_image' => 'required',
                    'map_image' => 'required',
                    'applicant_name' => 'required',
                    'proofofacquisition' => 'required', 
                    'location' => 'required',
                    'status' => 'required',
                    'dateissued' => 'required',
                    'inspection_image' => 'required',
                    'permitnumber' => 'required',
                    'species' => 'required'
            ]);

            $proofofacquisition_filename = time().'.'. $request->proofofacquisition->getClientOriginalName();
            $proofofacquisition_filepath = $request->file('proofofacquisition')->storeAs('WTPermitproofofacquisition', $proofofacquisition_filename, 'public');

            $docs_filename = time().'.'. $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('WTPermits', $docs_filename, 'public');

            $map_filename = time().'.'. $request->map_image->getClientOriginalName();
            $map_filepath = $request->file('map_image')->storeAs('WTPermitMaps', $map_filename, 'public');

            $inspectionreport_filename = time().'.'. $request->inspection_image->getClientOriginalName();
            $inspectionreport_filepath = $request->file('inspection_image')->storeAs('WTPermitInsReport', $map_filename, 'public');


            $wtp->applicant_name = $request->get('applicant_name');
            $wtp->proofacquisition_filename = $proofofacquisition_filename;
            $wtp->proofacquisition_filepath = '/' .$proofofacquisition_filepath;
            $wtp->location = $request->get('location');
            $wtp->destination = $request->get('destination');
            $wtp->status = $request->get('status');
            $wtp->map_filename = $map_filename;
            $wtp->map_filepath = '/'.$map_filepath;
            $wtp->approveddocs_filename = $docs_filename;
            $wtp->approveddocs_filepath = '/' .$docs_filepath;
            $wtp->numberofwildlife = $request->get('numberofwildlife');
            $wtp->species = $request->get('species');
            $wtp->inspectionreport_filename = $inspectionreport_filename;
            $wtp->inspectionreport_filepath = '/' .$inspectionreport_filepath;         
            $wtp->permitnumber = $request->get('permitnumber');
            $wtp->dateissued = $request->get('dateissued');
            $wtp->certification_fee = $request->get('certification_fee');
            $wtp->office_id = $request->get('office_id');
            $wtp->encoded_by = $request->get('encoded_by');
            $wtp->save();

            return redirect()->back();

        } else{
            
            $validated = $request->validate([
                    'applicant_name' => 'required', 
                    'location' => 'required',
                    'status' => 'required',
                    'dateissued' => 'required',
                    
                    'permitnumber' => 'required',
                    'species' => 'required'
            ]);

            $wtp->applicant_name = $request->get('applicant_name');
            
            $wtp->proofacquisition_filename = $wtp_1->proofofacquisition_filename;
            $wtp->proofacquisition_filepath = $wtp_1->proofofacquisition_filepath;
            
            $wtp->location = $request->get('location');
            $wtp->destination = $request->get('destination');
            $wtp->status = $request->get('status');
            $wtp->map_filename = $wtp_1->map_filename;
            $wtp->map_filepath = $wtp_1->map_filepath;
            
            $wtp->approveddocs_filename = $wtp_1->docs_filename;
            $wtp->approveddocs_filepath = $wtp_1->docs_filepath;
            
            $wtp->numberofwildlife = $request->get('numberofwildlife');
            $wtp->species = $request->get('species');
            
            $wtp->inspectionreport_filename = $wtp_1->inspectionreport_filename;
            $wtp->inspectionreport_filepath = $wtp_1->inspectionreport_filepath;

            $wtp->permitnumber = $request->get('permitnumber');
            $wtp->dateissued = $request->get('dateissued');
            $wtp->certification_fee = $request->get('certification_fee');
            $wtp->office_id = $request->get('office_id');
            $wtp->encoded_by = $request->get('encoded_by');
            $wtp->save();            

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
                $file_path = $photo->storeAs($request->rec_id, $name, 'wildlifetransportpermit_geotag');      
                $photoss = new WildlifeTransportPermit_geotag();
                $photoss->filename = $name;
                $photoss->filepath = 'wildlifetransportpermit_geotag/'.$file_path;
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
