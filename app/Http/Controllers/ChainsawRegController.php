<?php

namespace App\Http\Controllers;


use App\Models\Offices;
use App\Models\ChainsawInventory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use Validator;
use Carbon\Carbon;


class ChainsawRegController extends Controller
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
        $chainregs = ChainsawInventory::all();
        
        return view('mes/chainsawregistration.index', compact('chainregs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chainregs = new ChainsawInventory;

        if($request->file()){
            $filename = time().'.'. $request->photo->getClientOriginalName();
            $filepath = $request->file('photo')->storeAs('chainsawinventory', $filename, 'public');

            $chainregs->name = $request->get('name');
            $chainregs->address = $request->get('address');
            $chainregs->dateacquired = $request->get('dateacquired');
            $chainregs->serialnum = $request->get('serialnum');
            $chainregs->dateregistered = $request->get('dateregistered');
            $chainregs->expirationdate = $request->get('expirationdate');
            $chainregs->dateacquired = $request->get('dateacquired');
            $chainregs->brand = $request->get('brand');
            $chainregs->model = $request->get('model');
            $chainregs->horsepower = $request->get('horsepower');
            $chainregs->color = $request->get('color');
            $chainregs->guidebarlength = $request->get('guidebarlength');
            $chainregs->or_num = $request->get('or_num');
            $chainregs->cr_num = $request->get('cr_num');
            $chainregs->purpose = $request->get('purpose');
            $chainregs->filename = $request->photo->getClientOriginalName();
            $chainregs->filepath = '/'.$filepath;
            $chainregs->encoded_by = $request->get('encoded_by');
            $chainregs->save();

            return redirect()->back();
        } else{

            $chainregs->name = $request->get('name');
            $chainregs->address = $request->get('address');
            $chainregs->dateacquired = $request->get('dateacquired');
            $chainregs->serialnum = $request->get('serialnum');
            $chainregs->dateregistered = $request->get('dateregistered');
            $chainregs->expirationdate = $request->get('expirationdate');
            $chainregs->dateacquired = $request->get('dateacquired');
            $chainregs->brand = $request->get('brand');
            $chainregs->model = $request->get('model');
            $chainregs->horsepower = $request->get('horsepower');
            $chainregs->color = $request->get('color');
            $chainregs->guidebarlength = $request->get('guidebarlength');
            $chainregs->or_num = $request->get('or_num');
            $chainregs->cr_num = $request->get('cr_num');
            $chainregs->purpose = $request->get('purpose');
            $chainregs->encoded_by = $request->get('encoded_by');
            $chainregs->save();

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
        $chainregs = ChainsawInventory::find($id);
        $chainregss = ChainsawInventory::find($id);

        if($request->file()){
            $filename = time().'.'. $request->photo->getClientOriginalName();
            $filepath = $request->file('photo')->storeAs('chainsawinventory', $filename, 'public');

            $oldfile = $chainregs->filename;
            Storage::delete('public/chainsawinventory/' . $oldfile);

            $chainregs->name = $request->get('name');
            $chainregs->address = $request->get('address');
            $chainregs->dateacquired = $request->get('dateacquired');
            $chainregs->serialnum = $request->get('serialnum');
            $chainregs->dateregistered = $request->get('dateregistered');
            $chainregs->expirationdate = $request->get('expirationdate');
            $chainregs->dateacquired = $request->get('dateacquired');
            $chainregs->brand = $request->get('brand');
            $chainregs->model = $request->get('model');
            $chainregs->horsepower = $request->get('horsepower');
            $chainregs->color = $request->get('color');
            $chainregs->guidebarlength = $request->get('guidebarlength');
            $chainregs->or_num = $request->get('or_num');
            $chainregs->cr_num = $request->get('cr_num');
            $chainregs->purpose = $request->get('purpose');
            $chainregs->filename = $request->photo->getClientOriginalName();
            $chainregs->filepath = '/'.$filepath;
            $chainregs->encoded_by = $request->get('encoded_by');
            $chainregs->save();

            return redirect()->back();
        } else{

            $chainregs->name = $request->get('name');
            $chainregs->address = $request->get('address');
            $chainregs->dateacquired = $request->get('dateacquired');
            $chainregs->serialnum = $request->get('serialnum');
            $chainregs->dateregistered = $request->get('dateregistered');
            $chainregs->expirationdate = $request->get('expirationdate');
            $chainregs->dateacquired = $request->get('dateacquired');
            $chainregs->brand = $request->get('brand');
            $chainregs->model = $request->get('model');
            $chainregs->horsepower = $request->get('horsepower');
            $chainregs->color = $request->get('color');
            $chainregs->guidebarlength = $request->get('guidebarlength');
            $chainregs->or_num = $request->get('or_num');
            $chainregs->cr_num = $request->get('cr_num');
            $chainregs->purpose = $request->get('purpose');
            $chainregs->filename = $chainregss->filename;
            $chainregs->filepath = $chainregss->filepath;
            $chainregs->encoded_by = $request->get('encoded_by');
            $chainregs->save();

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
