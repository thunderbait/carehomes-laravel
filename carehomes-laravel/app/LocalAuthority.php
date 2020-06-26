<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalAuthority extends Model
{
    public function location()
    {
        return $this->hasMany('App\Location');
    }
}
