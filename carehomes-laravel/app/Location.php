<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
    	'name','local_authority'
    	];

    public function carehome()
    {
        return $this->hasMany('App\Carehome');
    }

    public function localAuthority()
    {
        return $this->belongsTo('App\LocalAuthority');
    }

}
