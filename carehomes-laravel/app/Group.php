<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $table = 'groups';

    public function carehome()
    {
        return $this->belongsTo('App\Carehome');
    }
}
