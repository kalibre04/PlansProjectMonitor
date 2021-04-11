<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apprehension extends Model
{
    use HasFactory;
    protected $table = 'apprehension';
    protected $guarded = [];

    public function lumberdonation(){
    	return $this->hasOne('App\Models\LumberDonation', 'id', 'appre_id');
    }


}
