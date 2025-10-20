<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class sala extends Model
{
    use SoftDeletes;

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
}
