<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class pelicula extends Model
{
    use SoftDeletes;

    public function salas()
    {
        return $this->belongsToMany(Sala::class, 'pelicula_sala', 'pelicula_id', 'sala_id');
    }
}
