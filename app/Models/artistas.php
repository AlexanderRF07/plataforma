<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artistas extends Model
{
  
 
  

    protected $table = 'artistas';

    protected $fillable = [
        'idevento',
        'nidentidad',
        'nombre',
        'email',
        'telefono',
        'foto',
        'descripcion',
        'fecharegistro',
        'estado',
    ];


    public function evento()
    {
        return $this->belongsTo(eventos::class, 'idevento');
    }
}

    