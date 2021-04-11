<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sapa extends Model
{
    use HasFactory;
    protected $table ='sapa';
    protected $guarded = [];

    public function sapa_geotag(){
    	return $this->hasMany('App\Models\sapa_geotag', 'id', 'f_id');
    }

}