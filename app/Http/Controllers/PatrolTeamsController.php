<?php

namespace App\Http\Controllers;


use App\Models\Offices;
use App\Models\PatrolTeams;
use App\Models\LawinPatrollers;
use App\Models\PatrolAssignment;

use Request;

use DB;
use Validator;
use Carbon\Carbon;


class PatrolTeamsController extends Controller
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

        $patrollers = LawinPatrollers::all()->pluck('fullname', 'id');
        $patrolteams = Patrolteams::selectRaw('id, CONCAT(team_sector, " - ", quarter," Quarter", " - ", year) as teamsector')->orderBy('teamsector', 'DESC')->pluck('teamsector', 'id');

        $patrolssector = DB::table('lawin_patroller')
            ->join('patrolassignment', 'lawin_patroller.id', '=', 'patrolassignment.patroller_id')
            ->join('patrolteams', 'patrolassignment.patrolteam_id', '=', 'patrolteams.id')
            ->join('office', 'patrolteams.team_office', '=', 'office.id')
            ->select('lawin_patroller.fullname', 'patrolteams.team_sector', 'office.officename', 'patrolteams.quarter', 'patrolteams.year')->get();
            dd($patrolssector);
        return view('mes/lawin/patrolteams.index', compact('patrollers', 'patrolteams'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $patrolteams = PatrolTeams::orderby('team_sector', 'DESC')->get();
        $offices = Offices::all()->pluck('officename', 'id');

        return view('mes/lawin/patrolteams.create_team', compact('patrolteams', 'offices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        PatrolAssignment::create(Request::all());
        return redirect()->back();
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
