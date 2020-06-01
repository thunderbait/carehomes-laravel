<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carehome extends Model
{
    protected $fillable = [
        'name','number_beds','location_id','group_id','type_id','notes'
    ];

     public function location()
    {
        return $this->hasOne('Location::class');
    }

    public function group()
    {
        return $this->belongsTo('Group::class');
    }

    public function types()
    {
        return $this->belongsToMany('Type::class');
    }

    public function contacts()
    {
        return $this->hasMany('Contact::class');
    }

    public function specialisms()
    {
        return $this->belongsToMany('Specialism::class');
    }

    
}



