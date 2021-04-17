<?php

namespace Wefly;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nom_prenom'
    ];
    protected $table='clients';
}
