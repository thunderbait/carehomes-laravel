<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
    	'name','role','email','phone','linkedin','care_home_id'
    ];

    /*
        Relationship: One to Many
        Return: Collection
    */
    public function carehome() 
    {
        return $this->belongsTo(CareHome::class);
    }        
}
