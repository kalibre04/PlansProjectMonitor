<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patent_geotag extends Model
{
    use HasFactory;
    protected $table = 'patent_geotag';
    protected $fillable = [
    		'filename', 'filepath', 'f_id'
    ];
 
    /*
    public function setFilenameAttribute($value){
    	$this->attributes['filename'] = json_encode($value);
    }

    public function setFilepathAttribute($value){
    	$this->attributes['filepath'] = json_encode($value);
    }
    public function setf_idAttribute($value){
    	$this->attributes['f_id'] = json_encode($value);
    }
    */



    public function PatentProcessingIssuance(){
    	return $this->belongsTo('App\Models\PatentProcessingIssuance', 'f_id');

    }
 	

    

}
