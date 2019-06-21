<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    //
    protected $guarded = [];

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
