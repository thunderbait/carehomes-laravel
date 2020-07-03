<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Group extends Model
{
    use Sortable;

    public $sortable = ['name'];
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
