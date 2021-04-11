<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cutting_permits extends Model
{
    use HasFactory;
    protected $table ='cutting_permits';

    public function cuttingpermit_geotag(){
    	return $this->hasMany('App\Models\cuttingpermit_geotag', 'id', 'f_id');
    }

}
