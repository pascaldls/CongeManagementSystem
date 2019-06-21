<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Employee extends Model
{
    //
    protected $guarded = [];

    public function Conges()
    {
        return $this->hasMany(Conge::class);
    }
}
