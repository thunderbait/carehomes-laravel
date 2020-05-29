<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    public function carehomes()
    {
        return $this->hasMany('App\Carehome');
    }
}
