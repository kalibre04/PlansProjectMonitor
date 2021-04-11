<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fla extends Model
{
    use HasFactory;
    protected $table ='fla';
    protected $guarded = [];

    public function fla_geotag(){
    	return $this->hasMany('App\Models\fla_geotag', 'id', 'f_id');
    }
}
