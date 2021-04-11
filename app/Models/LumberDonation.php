<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lumberdonation extends Model
{
    use HasFactory;
    protected $table = 'lumberdonation';
    protected $guarded = [];

    public function apprehension(){
    	return $this->belongsTo('App\Models\Apprehenstion', 'id');
    }

}
