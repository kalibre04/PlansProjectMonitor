<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wildliferegistration_geotag extends Model
{
    use HasFactory;
    protected $table ='wildliferegistration_geotag';
    protected $guarded = [];

    public function WildlifeTransportPermit(){
    	return $this->belongsTo('App\Models\wildliferegistration', 'f_id');
    }
}
