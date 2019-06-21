<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Conge extends Model
{
    //
    protected $guarded = [];

    protected $dates = ['debut', 'fin'];

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * mutator settor setDebut
     *
     * @param string $debut
     */
    public function setDebut(string $debut)
    {
        die($debut);
        $this->attributes['debut'] = Carbon::parse($debut);
    }
    /**
     * mutator settor setFin
     *
     * @param string $fin
     */
    public function setFin(string $fin)
    {
        $this->attributes['fin'] = Carbon::parse($dd);
    }
}
