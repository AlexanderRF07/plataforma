<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class eventos extends Model
{


    protected $table = 'eventos'; 

    protected $fillable = [
        'evento',
        'fechainicio',
        'fechafinal',
        'estado',
    ];

   
    public function artistas(): HasMany
    {
        return $this->hasMany(Artistas::class, 'idevento');
    }}
