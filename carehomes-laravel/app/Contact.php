<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //

    public function carehome()
    {
        return $this->belongsTo('Carehome:class');
    }
}
