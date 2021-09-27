<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Models\sapa;
use App\Models\sapa_geotag;
use App\Models\Offices;
use App\Models\status_tbl;

class SAPAController extends Controller
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
        $sapa = sapa::all();
        $offices = Offices::all()->pluck('officename', 'id');
        $status = status_tbl::all()->pluck('status', 'status');

        return view('rps/sapa.index', compact('sapa', 'offices', 'status'));
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
        $sapaa = new sapa;

        if($request->file()){
            $docs_filename = time().'.'. $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('sapaDocs', $docs_filename, 'public');

            $map_filename = time().'.'. $request->map_image->getClientOriginalName();
            $map_filepath = $request->file('map_image')->storeAs('sapaMaps', $map_filename, 'public');

            $sapaa->applicant_name = $request->get('applicant_name');
            $sapaa->area = $request->get('area');
            $sapaa->location = $request->get('location');
            $sapaa->status = $request->get('status');
            $sapaa->date_award = $request->get('date_award');
            $sapaa->map_filename = $map_filename;
            $sapaa->map_filepath = '/'.$map_filepath;
            $sapaa->approveddocs_filename = $docs_filename;
            $sapaa->approveddocs_filepath = '/' .$docs_filepath;
            $sapaa->rentalfee = $request->get('rentalfee');
            $sapaa->term = $request->get('term');         
            $sapaa->expirydate = $request->get('expirydate');
            $sapaa->office_id = $request->get('office_id');
            $sapaa->encoded_by = $request->get('encoded_by');
            $sapaa->save();

            return redirect()->back();

        } else{

            $sapaa->applicant_name = $request->get('applicant_name');
            $sapaa->area = $request->get('area');
            $sapaa->location = $request->get('location');
            $sapaa->status = $request->get('status');
            $sapaa->dateaward = $request->get('date_award');
            $sapaa->rentalfee = $request->get('rentalfee');
            $sapaa->term = $request->get('term');         
            $sapaa->expirydate = $request->get('expirydate');
            $sapaa->office_id = $request->get('office_id');
            $sapaa->encoded_by = $request->get('encoded_by');
            $sapaa->save();

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
        $sapaa = sapa::find($id);
        $sapaa_1 = sapa::find($id);

        if($request->file()){
            $docs_filename = time().'.'. $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('sapaDocs', $docs_filename, 'public');
            $map_filename = time().'.'. $request->map_image->getClientOriginalName();
            $map_filepath = $request->file('map_image')->storeAs('sapaMaps', $map_filename, 'public');

            $olddocsfile = $sapaa->approveddocs_filename;
            Storage::delete('public/sapaDocs/' . $olddocsfile);

            $oldmapfile = $sapaa->map_filename;
            Storage::delete('public/sapaMaps/' . $oldmapfile);


            $sapaa->applicant_name = $request->get('applicant_name');
            $sapaa->area = $request->get('area');
            $sapaa->location = $request->get('location');
            $sapaa->status = $request->get('status');
            $sapaa->date_award = $request->get('date_award');
            $sapaa->map_filename = $map_filename;
            $sapaa->map_filepath = '/'.$map_filepath;
            $sapaa->approveddocs_filename = $docs_filename;
            $sapaa->approveddocs_filepath = '/' .$docs_filepath;
            $sapaa->rentalfee = $request->get('rentalfee');
            $sapaa->term = $request->get('term');         
            $sapaa->expirydate = $request->get('expirydate');
            $sapaa->office_id = $request->get('office_id');
            $sapaa->encoded_by = $request->get('encoded_by');
            $sapaa->save();

            return redirect()->back();

        } else{


            $sapaa->applicant_name = $request->get('applicant_name');
            $sapaa->area = $request->get('area');
            $sapaa->location = $request->get('location');
            $sapaa->status = $request->get('status');
            $sapaa->date_award = $request->get('date_award');
            $sapaa->map_filename = $sapaa_1->map_filename;
            $sapaa->map_filepath = $sapaa_1->map_filepath;
            $sapaa->approveddocs_filename = $sapaa_1->approveddocs_filename;
            $sapaa->approveddocs_filepath = $sapaa_1->approveddocs_filepath;
            $sapaa->rentalfee = $request->get('rentalfee');
            $sapaa->term = $request->get('term');         
            $sapaa->expirydate = $request->get('expirydate');
            $sapaa->office_id = $request->get('office_id');
            $sapaa->encoded_by = $request->get('encoded_by');
            $sapaa->save();

            return redirect()->back();

        }

    }
    public function upload_photo(Request $request)
    { 
            
            $request->validate([
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
                $file_path = $photo->storeAs($request->rec_id, $name, 'sapa_geotag');      
                $photoss = new sapa_geotag();
                $photoss->filename = $name;
                $photoss->filepath = 'sapa_geotag/'.$file_path;
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
