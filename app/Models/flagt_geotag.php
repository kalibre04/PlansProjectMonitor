<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flagt_geotag extends Model
{
	protected $table ='flagt_geotag';
    use HasFactory;

    public function fla(){
    	return $this->belongsTo('App\Models\flagt', 'f_id');
    }
    
}
