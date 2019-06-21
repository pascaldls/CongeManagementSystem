<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $guarded = [];

    public function Conges()
    {
        return $this->hasMany(Conge::class);
    }
}
