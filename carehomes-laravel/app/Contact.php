<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $table = 'contacts';

    public function carehome()
    {
        return $this->belongsTo('App\Carehome');
    }
}
