<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otherpermits_geotag extends Model
{
    use HasFactory;
    protected $table = 'otherpermits_geotag';
    protected $fillable = [
    	
    ];

    public function otherpermits(){
    	return $this->belongsTo('App\Models\otherpermits', 'f_id');

    }

}
