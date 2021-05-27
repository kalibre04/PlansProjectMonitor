<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Models\claimsandconflict;
use App\Models\Offices;

class ClaimsAndConflictController extends Controller
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
        $cnc = claimsandconflict::all();
        $offices = Offices::all()->pluck('officename', 'id');
        return view('rps/claimsandconflict.index', compact('cnc', 'offices'));
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
                    'parties' => 'required',
                    'status' => 'required',
                    'location' => 'required', 
                    'subject' => 'required',
                    'area' => 'required',
                    'lotsurveynum' => 'required',
                    'modedesposition' => 'required',
                    'personincharge' => 'required'
        ]);
        
        $cnc = new claimsandconflict;

        if($request->file()){
            $docs_filename = time().'.'. $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('ClaimsAndConflictDocs', $docs_filename, 'public');

            $cnc->parties = $request->get('parties');
            $cnc->status = $request->get('status');
            $cnc->location = $request->get('location');
            $cnc->subject = $request->get('subject');
            $cnc->area = $request->get('area');
            $cnc->lotsurveynum = $request->get('lotsurveynum');
            $cnc->cswreport_filename = $docs_filename;
            $cnc->cswreport_filepath = '/' .$docs_filepath;
            $cnc->modedesposition = $request->get('modedesposition');
            $cnc->personincharge = $request->get('personincharge');         
            $cnc->office_id = $request->get('office_id');
            $cnc->encoded_by = $request->get('encoded_by');
            $cnc->save();

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
        
        $cnc = claimsandconflict::find($id);
        $cnc_1 = claimsandconflict::find($id);

        if($request->file()){
            $validated = $request->validate([
                    'docs_image' => 'required',
                    'parties' => 'required',
                    'status' => 'required',
                    'location' => 'required', 
                    'subject' => 'required',
                    'area' => 'required',
                    'lotsurveynum' => 'required',
                    'modedesposition' => 'required',
                    'personincharge' => 'required'
            ]);

            $docs_filename = time().'.'. $request->docs_image->getClientOriginalName();
            $docs_filepath = $request->file('docs_image')->storeAs('ClaimsAndConflictDocs', $docs_filename, 'public');

            $olddocsfile = $cnc->cswreport_filename;
            Storage::delete('public/ClaimsAndConflictDocs/' . $olddocsfile);

            $cnc->parties = $request->get('parties');
            $cnc->status = $request->get('status');
            $cnc->location = $request->get('location');
            $cnc->subject = $request->get('subject');
            $cnc->area = $request->get('area');
            $cnc->lotsurveynum = $request->get('lotsurveynum');
            $cnc->cswreport_filename = $docs_filename;
            $cnc->cswreport_filepath = '/' .$docs_filepath;
            $cnc->modedesposition = $request->get('modedesposition');
            $cnc->personincharge = $request->get('personincharge');         
            $cnc->office_id = $request->get('office_id');
            $cnc->encoded_by = $request->get('encoded_by');
            $cnc->save();

            return redirect()->back();
        }else{
            $validated = $request->validate([
                    'parties' => 'required',
                    'status' => 'required',
                    'location' => 'required', 
                    'subject' => 'required',
                    'area' => 'required',
                    'lotsurveynum' => 'required',
                    'modedesposition' => 'required',
                    'personincharge' => 'required'
            ]);

            $cnc->parties = $request->get('parties');
            $cnc->status = $request->get('status');
            $cnc->location = $request->get('location');
            $cnc->subject = $request->get('subject');
            $cnc->area = $request->get('area');
            $cnc->lotsurveynum = $request->get('lotsurveynum');
            $cnc->cswreport_filename = $cnc_1->cswreport_filename;
            $cnc->cswreport_filepath = $cnc_1->cswreport_filepath;
            $cnc->modedesposition = $request->get('modedesposition');
            $cnc->personincharge = $request->get('personincharge');         
            $cnc->office_id = $request->get('office_id');
            $cnc->encoded_by = $request->get('encoded_by');
            $cnc->save();

            return redirect()->back();
        }
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
