<?php

namespace Wefly;

use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    protected $fillable = [
        'aeroport_dep', 'aeroport_arr', 'date_dep','heure_dep','date_arr','heure_arr'
    ];
    protected $table='vols';
}
