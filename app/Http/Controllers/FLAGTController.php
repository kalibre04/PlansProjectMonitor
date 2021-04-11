<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Models\flagt;
use App\Models\flagt_geotag;
use App\Models\Offices;

class FLAGTController extends Controller
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
        $flagt = flagt::all();
        $offices = Offices::all()->pluck('officename', 'id');

        return view('rps/flagt.index', compact('flagt', 'offices'));
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
                    'date_award' => 'required'
        ]);
        
        $flagt = new flagt;

        if($request->file()){
            $docs_filename = time().'.'. $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('flagtDocs', $docs_filename, 'public');

            $map_filename = time().'.'. $request->map_image->getClientOriginalName();
            $map_filepath = $request->file('map_image')->storeAs('flagtMaps', $map_filename, 'public');


            $flagt->applicant_name = $request->get('applicant_name');
            $flagt->area = $request->get('area');
            $flagt->location = $request->get('location');
            $flagt->status = $request->get('status');
            $flagt->date_award = $request->get('date_award');
            $flagt->map_filename = $map_filename;
            $flagt->map_filepath = '/'.$map_filepath;
            $flagt->approveddocs_filename = $docs_filename;
            $flagt->approveddocs_filepath = '/' .$docs_filepath;
            $flagt->rentalfee = $request->get('rentalfee');
            $flagt->term = $request->get('term');         
            $flagt->expirationdate = $request->get('expirationdate');
            $flagt->office_id = $request->get('office_id');
            $flagt->encoded_by = $request->get('encoded_by');
            $flagt->save();

            return redirect()->back();

        } else{

            $flagt->applicant_name = $request->get('applicant_name');
            $flagt->area = $request->get('area');
            $flagt->location = $request->get('location');
            $flagt->status = $request->get('status');
            $flagt->dateaward = $request->get('date_award');
            $flagt->rentalfee = $request->get('rentalfee');
            $flagt->term = $request->get('term');         
            $flagt->expirationdate = $request->get('expirationdate');
            $flagt->office_id = $request->get('office_id');
            $flagt->encoded_by = $request->get('encoded_by');
            $flagt->save();

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
        $flagt = flagt::find($id);
        $flagt_1 = flagt::find($id);

        if($request->file()){
            $docs_filename = $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('flagtDocs', $docs_filename, 'public');
            $map_filename = $request->map_image->getClientOriginalName();
            $map_filepath = $request->file('map_image')->storeAs('flagtMaps', $map_filename, 'public');

            $fla->applicant_name = $request->get('applicant_name');
            $fla->area = $request->get('area');
            $fla->location = $request->get('location');
            $fla->status = $request->get('status');
            $fla->date_award = $request->get('date_award');
            $fla->map_filename = $map_filename;
            $fla->map_filepath = '/'.$map_filepath;
            $fla->approvedfladocs_filename = $docs_filename;
            $fla->approvedfladocs_filepath = '/' .$docs_filepath;
            $fla->rentalfee = $request->get('rentalfee');
            $fla->term = $request->get('term');         
            $fla->expirationdate = $request->get('expirationdate');
            $fla->office_id = $request->get('office_id');
            $fla->encoded_by = $request->get('encoded_by');
            $fla->save();

            return redirect()->back();

        } else{

            $fla->applicant_name = $request->get('applicant_name');
            $fla->area = $request->get('area');
            $fla->location = $request->get('location');
            $fla->status = $request->get('status');
            $fla->date_award = $request->get('date_award');
            $fla->map_filename = $fla_1->map_filename;
            $fla->map_filepath = $fla_1->map_filepath;
            $fla->approvedfladocs_filename = $flagt_1->approveddocs_filename;
            $fla->approvedfladocs_filepath = $flagt_1->approveddocs_filepath;
            $fla->rentalfee = $request->get('rentalfee');
            $fla->term = $request->get('term');         
            $fla->expirationdate = $request->get('expirationdate');
            $fla->office_id = $request->get('office_id');
            $fla->encoded_by = $request->get('encoded_by');
            $fla->save();

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
                $file_path = $photo->storeAs($request->rec_id, $name, 'flagt_geotag');      
                $photoss = new flagt_geotag();
                $photoss->filename = $name;
                $photoss->filepath = 'flagt_geotag/'.$file_path;
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
