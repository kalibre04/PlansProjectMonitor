<?php

namespace App\Http\Controllers;

use App\Models\LumberDonation;
use App\Models\Offices;
use App\Models\Apprehension;

use Request;
use DB;
use Validator;
use Carbon\Carbon;



class LumberDonationController extends Controller
{

	public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	
    	$lumberdonate = LumberDonation::orderby('created_at', 'DESC')->get();
    	$offices = Offices::all()->pluck('officename', 'id');
    	$apprehensionss = Apprehension::selectRaw('id, CONCAT(date_apprehended, " - ", location) as dateloc')->orderBy('dateloc', 'DESC')->pluck('dateloc', 'id');
    	//Apprehension::all()->pluck('date_apprehended', 'id', 'location');
    	return view('mes/lumberdonation.index', compact('lumberdonate', 'offices', 'apprehensionss'));
    }

    public function store(){

    	LumberDonation::create(Request::all());
    	return redirect()->back();
    }

    public function update($id){
    	$lumberdonated = LumberDonation::find($id);
    	$lumberdonated->update(Request::all());
    	return redirect()->back();
    }


}
