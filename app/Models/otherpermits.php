<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otherpermits extends Model
{
    use HasFactory;
    protected $table = 'otherpermits';
    protected $fillable = [
    	
    ];
    public function otherpermits_geotag(){
    	return $this->hasMany('App\Models\otherpermits_geotag', 'id', 'f_id');
    }

}
