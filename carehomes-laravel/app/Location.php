<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable =[
    	'name','location_authority'
    ];

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function location() 
    {
        return $this->hasMany(CareHome::class);
    }
}
