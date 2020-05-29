<?php

namespace App;
use App\Product;
use App\Optgroup;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'option';

    protected $fillable = ['name','optgroup_id'];
        
    //public $timestamps = false;
    
    // public function optgroups(){
    //     return $this->belongsTo('App\OptGroup');
    // }

    public function optgroups(){
        return $this->belongsTo(OptGroup::class, 'optgroup_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
