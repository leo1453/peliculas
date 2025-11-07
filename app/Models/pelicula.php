<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $table = 'peliculas';

    protected $fillable = [
        'nombre',
        'director',
        'genero',
        'duracion',
        'sala_id',
    ];

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'sala_id');
    }
}
