<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareHome extends Model
{
    protected $fillable = [
    	'name','number_beds','location_id','type_id','notes'
    ];

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function location() 
    {
        return $this->belongsTo(Location::class);
    }

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function contact() 
    {
        return $this->hasMany(Contact::class);
    }        
}
