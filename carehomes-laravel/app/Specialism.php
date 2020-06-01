<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialism extends Model
{
    //

    public function carehomes()
    {
        return $this->belongsToMany('Carehome::class');
    }
}
