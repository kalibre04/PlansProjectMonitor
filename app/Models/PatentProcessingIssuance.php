<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatentProcessingIssuance extends Model
{
    use HasFactory;
    protected $table = 'patentprocessingissuance';
    protected $fillable = [
    ];


    public function patent_geotag(){
    	return $this->hasMany('App\Models\Patent_Geotag', 'id', 'f_id');
    }
    
    
    
}