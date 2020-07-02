<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $fillable = ['name'];

    public function carehomes()
    {
        return $this->hasMany('App\Carehome');
    }

    public function numOfHomes()
    {
        return $this->carehomes()->count();
    }

    public function minNumOfHomes($minHomes)
    {
        if ($this->numOfHomes() >= $minHomes)
        {
            return $this;
        }
    }
}
