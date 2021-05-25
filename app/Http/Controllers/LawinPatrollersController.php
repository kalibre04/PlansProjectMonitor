<?php

namespace App\Http\Controllers;

use App\Models\Offices;
use App\Models\LawinPatrollers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use DB;
use Validator;
use Carbon\Carbon;



class LawinPatrollersController extends Controller
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
        $patrollers = LawinPatrollers::orderby('fullname', 'DESC')->get();
        $offices = Offices::all()->pluck('officename', 'id');

        return view('mes/lawin/patrollers.index', compact('patrollers', 'offices'));
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
                    'fullname' => 'required',
                    'position' => 'required',
                    'photo' => 'required'
        ]);

        $patroller = new LawinPatrollers;

        if($request->file()){
            $filename = time().'.'. $request->photo->getClientOriginalName();
            $filepath = $request->file('photo')->storeAs('LawinPatrollersPhoto', $filename, 'public');

            $patroller->fullname = $request->get('fullname');
            $patroller->position = $request->get('position');
            $patroller->office_id = $request->get('office_id');
            $patroller->filename = $filename;
            $patroller->filepath = $filepath;
            $patroller->encoded_by = $request->get('encoded_by');
            $patroller->save();

            return redirect()->back();

        } else{

            $patroller->fullname = $request->get('fullname');
            $patroller->position = $request->get('position');
            $patroller->office_id = $request->get('office_id');

            $patroller->encoded_by = $request->get('encoded_by');
            $patroller->save();
            
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
        $patroller = LawinPatrollers::find($id);
        $patroller1 = LawinPatrollers::find($id);

        if($request->file()){
            $filename = time().'.'. $request->photo->getClientOriginalName();
            $filepath = $request->file('photo')->storeAs('LawinPatrollersPhoto', $filename, 'public');

            $oldfile = $patroller1->filename;

            Storage::delete('public/LawinPatrollersPhoto/' . $oldfile);

            $patroller->fullname = $request->get('fullname');
            $patroller->position = $request->get('position');
            $patroller->office_id = $request->get('office_id');
            $patroller->filename = $filename;
            $patroller->filepath = $filepath;
            $patroller->encoded_by = $request->get('encoded_by');
            $patroller->save();
            
            return redirect()->back();

        } else{


            $patroller->fullname = $request->get('fullname');
            $patroller->position = $request->get('position');
            $patroller->office_id = $request->get('office_id');
            $patroller->filename = $patroller1->filename;
            $patroller->filepath = $patroller1->filepath;
            $patroller->encoded_by = $request->get('encoded_by');
            $patroller->save();

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
