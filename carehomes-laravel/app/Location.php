<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $table = 'locations';

     public function carehome()
    {
        return $this->belongsTo('App\Carehome');
    }
}
