<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptGroup extends Model
{
    protected $table = 'optgroups';
    protected $fillable = ['name'];
    
    /**
     * Todos that belong to this user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function option(){
        return $this->hasMany('App\Option','optgroup_id');
    }
}
