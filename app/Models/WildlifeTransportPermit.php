<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WildlifeTransportPermit extends Model
{
    use HasFactory;
    protected $table = 'wildlifetransportpermit';
    protected $guarded = [];

    public function wildlifetransportpermit_geotag(){
    	return $this->hasMany('App\Models\WildlifeTransportPermit_geotag', 'id', 'f_id');
    }

}
