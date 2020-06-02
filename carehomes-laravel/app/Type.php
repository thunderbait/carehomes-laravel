<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = 'name';

    public function carehomes()
    {
        return $this->belongsToMany('App\Carehome');
    }

}
