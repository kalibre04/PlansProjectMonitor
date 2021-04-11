<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sapa_geotag extends Model
{
    use HasFactory;
    protected $table ='sapa_geotag';
    protected $guarded = [];

    public function sapa(){
    	return $this->belongsTo('App\Models\sapa', 'f_id');
    }

}
