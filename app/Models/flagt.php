<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flagt extends Model
{
	protected $table ='flagt';
    use HasFactory;
    
    public function flagt_geotag(){
    	return $this->hasMany('App\Models\flagt_geotag', 'id', 'f_id');
    }

}
