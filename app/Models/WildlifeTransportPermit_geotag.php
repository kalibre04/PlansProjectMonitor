<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WildlifeTransportPermit_geotag extends Model
{
    use HasFactory;
    protected $table ='wildlifetransportpermit_geotag';
    protected $guarded = [];

    public function WildlifeTransportPermit(){
    	return $this->belongsTo('App\Models\WildlifeTransportPermit', 'f_id');
    }
}
