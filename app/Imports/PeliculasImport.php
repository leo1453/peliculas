<?php

namespace App\Imports;

use App\Models\pelicula;
use Maatwebsite\Excel\Concerns\ToModel;

class PeliculasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new pelicula([
            'nombre' => $row[0],
            'director' => $row[1],
            'genero' => $row[2],
            'duracion' => $row[3],
        ]);
    }

}
