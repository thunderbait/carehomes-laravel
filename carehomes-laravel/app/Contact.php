<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
    	'name','role','email','phone','linkedin','care_home_id'
    ];

    public function carehome()
    {
        return $this->belongsTo('Carehome:class');
    }

    
}
