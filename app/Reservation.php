<?php

namespace Wefly;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'client_id', 'vol_id', 'numero','nom_prenom','date','heure'
    ];
    protected $table='reservations';
}
