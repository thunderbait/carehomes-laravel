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
    public function contacts() 
    {
        return $this->hasMany(Contact::class);
    }

/*
        Relationship: One to Many
        Return: Collection
    */
    public function types() 
    {
        return $this->hasMany(Type::class);
    }

/*
        Relationship: One to Many
        Return: Collection
    */
    public function specialisms() 
    {
        return $this->hasMany(Specialism::class);
    }


}
