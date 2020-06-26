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
        return $this->hasMany(Carehome::class);
    }

    public function localAuthority()
    {
        return $this->belongsTo(LocalAuthority::class);
    }

}
