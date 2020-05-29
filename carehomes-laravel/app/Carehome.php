<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carehome extends Model
{
    //
    protected $table = 'carehomes';

     public function location()
    {
        return $this->hasOne('App\Location');
    }

    public function group()
    {
        return $this->hasOne('App\Group');
    }

    public function type()
    {
        return $this->hasOne('App\Type');
    }

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    public function specialisms()
    {
        return $this->belongsToMany('App\Specialism');
    }
}



