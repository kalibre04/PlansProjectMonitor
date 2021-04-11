<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fla_geotag extends Model
{
    use HasFactory;
    protected $table ='fla_geotag';
    protected $guarded = [];

    public function fla(){
    	return $this->belongsTo('App\Models\fla', 'f_id');
    }


}
