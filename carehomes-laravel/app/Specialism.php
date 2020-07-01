<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialism extends Model
{
    protected $fillable = ['name'];

    public function carehomes()
    {
        return $this->belongsToMany('App\Carehome', 'carehome_specialisms', 'specialism_id',
            'carehome_id');
    }

}
