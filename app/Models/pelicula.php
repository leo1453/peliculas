<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class pelicula extends Model
{
    use SoftDeletes;

     public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
}
