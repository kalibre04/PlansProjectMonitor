<?php

namespace App\Http\Controllers;

use App\Models\Offices;
use App\Models\PatentProcessingIssuance;
use App\Models\Patent_Geotag;
use App\Models\status_tbl;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use Carbon\Carbon;

class PatentProcessingAndIssuanceController extends Controller
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
        $patentprocessingissuances = PatentProcessingIssuance::all();
        $offices = Offices::all()->pluck('officename', 'id');
        $status = status_tbl::all()->pluck('status', 'status');
        return view('rps/patentprocessingissuance.index', compact('patentprocessingissuances', 'offices', 'status'));
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
                    'application_image' => 'required',
                    'title_image' => 'required',
                    'name' => 'required',
                    'application_num' => 'required',
                    'area' => 'required', 
                    'location' => 'required',
                    'status' => 'required',
                    'dateapplied' => 'required',
                    'dateissued' => 'required',
                    'patentnum' => 'required'
        ]);
        
        $ppi = new PatentProcessingIssuance;

        if($request->file()){
            $application_filename = time().'.'. $request->application_image->getClientOriginalName();
            $application_filepath = $request->file('application_image')->storeAs('applicationForms', $application_filename, 'public');

            $title_filename = time().'.'. $request->title_image->getClientOriginalName();
            $title_filepath = $request->file('title_image')->storeAs('titles', $title_filename, 'public');


            $ppi->name = $request->get('name');
            $ppi->application_filename = $application_filename;
            $ppi->application_filepath = '/' .$application_filepath;
            $ppi->application_num = $request->get('application_num');
            $ppi->area = $request->get('area');
            $ppi->dateapplied = $request->get('dateapplied');
            $ppi->dateissued = $request->get('dateissued');
            $ppi->location = $request->get('location');
            $ppi->lotnsurveynum = $request->get('lotnsurveynum');
            $ppi->modeofdisposition = $request->get('modeofdisposition');
            $ppi->patentnum = $request->get('patentnum');
            $ppi->status = $request->get('status');
            $ppi->title_filename = $title_filename;
            $ppi->title_filepath = '/'.$title_filepath;
            $ppi->datesurveyapproved = $request->get('datesurveyapproved');
            $ppi->office_id = $request->get('office_id');
            $ppi->encoded_by = $request->get('encoded_by');
            $ppi->save();

            return redirect()->back();

        } else{

            $ppi->name = $request->get('name');
            $ppi->application_num = $request->get('application_num');
            $ppi->area = $request->get('area');
            $ppi->dateapplied = $request->get('dateapplied');
            $ppi->dateissued = $request->get('dateissued');
            $ppi->location = $request->get('location');
            $ppi->lotnsurveynum = $request->get('lotnsurveynum');
            $ppi->modeofdisposition = $request->get('modeofdisposition');
            $ppi->patentnum = $request->get('patentnum');
            $ppi->status = $request->get('status');
            $ppi->datesurveyapproved = $request->get('datesurveyapproved');
            $ppi->office_id = $request->get('office_id');
            $ppi->encoded_by = $request->get('encoded_by');
            $ppi->save();

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
         /*$request->validate([
                    'application_image' => 'required',
                    'title_image' => 'required'
        ]);*/

        $ppi = PatentProcessingIssuance::find($id);
        $ppi_1 = PatentProcessingIssuance::find($id);


        if($request->file()){
            $application_filename = $request->application_image->getClientOriginalName();
            $application_filepath = $request->file('application_image')->storeAs('applicationForms', $application_filename, 'public');

            $title_filename = $request->title_image->getClientOriginalName();
            $title_filepath = $request->file('title_image')->storeAs('titles', $title_filename, 'public');


            $ppi->name = $request->get('name');
            $ppi->application_filename = $application_filename;
            $ppi->application_filepath = '/' .$application_filepath;
            $ppi->application_num = $request->get('application_num');
            $ppi->area = $request->get('area');
            $ppi->dateapplied = $request->get('dateapplied');
            $ppi->dateissued = $request->get('dateissued');
            $ppi->location = $request->get('location');
            $ppi->lotnsurveynum = $request->get('lotnsurveynum');
            $ppi->modeofdisposition = $request->get('modeofdisposition');
            $ppi->patentnum = $request->get('patentnum');
            $ppi->status = $request->get('status');
            $ppi->title_filename = $title_filename;
            $ppi->title_filepath = '/'.$title_filepath;
            $ppi->datesurveyapproved = $request->get('datesurveyapproved');
            $ppi->office_id = $request->get('office_id');
            $ppi->encoded_by = $request->get('encoded_by');
            $ppi->save();
            
            return redirect()->back();

        } else{

            $ppi->name = $request->get('name');
            $ppi->application_filename = $ppi_1->application_filename;
            $ppi->application_filepath = $ppi_1->application_filepath;
            $ppi->application_num = $request->get('application_num');
            $ppi->area = $request->get('area');
            $ppi->dateapplied = $request->get('dateapplied');
            $ppi->dateissued = $request->get('dateissued');
            $ppi->location = $request->get('location');
            $ppi->lotnsurveynum = $request->get('lotnsurveynum');
            $ppi->modeofdisposition = $request->get('modeofdisposition');
            $ppi->patentnum = $request->get('patentnum');
            $ppi->status = $request->get('status');
            $ppi->title_filename = $ppi_1->title_filename;
            $ppi->title_filepath = $ppi_1->title_filepath;
            $ppi->datesurveyapproved = $request->get('datesurveyapproved');
            $ppi->office_id = $request->get('office_id');
            $ppi->encoded_by = $request->get('encoded_by');
            $ppi->save();

            return redirect()->back();

        }
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
        /*$request->validate([
                    'application_image' => 'required',
                    'title_image' => 'required'
        ]);*/

        $ppi = PatentProcessingIssuance::find($id);
        $ppi_1 = PatentProcessingIssuance::find($id);


        if($request->file()){
            $application_filename = time().'.'. $request->application_image->getClientOriginalName();
            $application_filepath = $request->file('application_image')->storeAs('applicationForms', $application_filename, 'public');

            $title_filename = time().'.'. $request->title_image->getClientOriginalName();
            $title_filepath = $request->file('title_image')->storeAs('titles', $title_filename, 'public');

            $oldappfile = $ppi->application_filename;
            Storage::delete('public/applicationForms/' . $oldappfile);

            $oldtitlefile = $ppi->title_filename;
            Storage::delete('public/titles/' . $oldtitlefile);      

            $ppi->name = $request->get('name');
            $ppi->application_filename = $application_filename;
            $ppi->application_filepath = '/' .$application_filepath;
            $ppi->application_num = $request->get('application_num');
            $ppi->area = $request->get('area');
            $ppi->dateapplied = $request->get('dateapplied');
            $ppi->dateissued = $request->get('dateissued');
            $ppi->location = $request->get('location');
            $ppi->lotnsurveynum = $request->get('lotnsurveynum');
            $ppi->modeofdisposition = $request->get('modeofdisposition');
            $ppi->patentnum = $request->get('patentnum');
            $ppi->status = $request->get('status');
            $ppi->title_filename = $title_filename;
            $ppi->title_filepath = '/'.$title_filepath;
            $ppi->datesurveyapproved = $request->get('datesurveyapproved');
            $ppi->office_id = $request->get('office_id');
            $ppi->encoded_by = $request->get('encoded_by');
            $ppi->save();

            return redirect()->back();

        } else{

            $ppi->name = $request->get('name');
            $ppi->application_filename = $ppi_1->application_filename;
            $ppi->application_filepath = $ppi_1->application_filepath;
            $ppi->application_num = $request->get('application_num');
            $ppi->area = $request->get('area');
            $ppi->dateapplied = $request->get('dateapplied');
            $ppi->dateissued = $request->get('dateissued');
            $ppi->location = $request->get('location');
            $ppi->lotnsurveynum = $request->get('lotnsurveynum');
            $ppi->modeofdisposition = $request->get('modeofdisposition');
            $ppi->patentnum = $request->get('patentnum');
            $ppi->status = $request->get('status');
            $ppi->title_filename = $ppi_1->title_filename;
            $ppi->title_filepath = $ppi_1->title_filepath;
            $ppi->datesurveyapproved = $request->get('datesurveyapproved');
            $ppi->office_id = $request->get('office_id');
            $ppi->encoded_by = $request->get('encoded_by');
            $ppi->save();

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
                $file_path = $photo->storeAs($request->rec_id, $name, 'patent_geotag');      
                $photoss = new Patent_Geotag();
                $photoss->filename = $name;
                $photoss->filepath = 'patent_geotag/'.$file_path;
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
