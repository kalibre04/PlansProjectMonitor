<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuttingpermit_geotag extends Model
{
    use HasFactory;
    protected $table ='cuttingpermit_geotag';

    public function cutting_permits(){
    	return $this->belongsTo('App\Models\cuttingpermit_geotag', 'f_id');
    }
}
