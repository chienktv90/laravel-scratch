<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
        
    //public $timestamps = false;
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
