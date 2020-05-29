<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialism extends Model
{
    //
    protected $table = 'specialisms';

    public function carehomes()
    {
        return $this->belongsToMany('App\Carehome');
    }
}
