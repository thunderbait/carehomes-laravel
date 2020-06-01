<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //

     public function carehome()
    {
        return $this->belongsTo('Carehome::class');
    }

    protected $fillable = ['name','location_authority'];
}
