<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wildliferegistration extends Model
{
    use HasFactory;
    protected $table = 'wildliferegistration';
    protected $guarded = [];

    public function wildlifetransportpermit_geotag(){
    	return $this->hasMany('App\Models\wildliferegistration_geotag', 'id', 'f_id');
    }


}
