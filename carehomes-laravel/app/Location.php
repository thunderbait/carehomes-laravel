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
        return $this->belongsTo('Carehome::class');
    }

}
