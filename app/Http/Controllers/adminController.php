<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
use App\Models\Sala;
use App\Models\Pelicula;

class adminController extends Controller
{
    // --- Sucursales ---
    public function index() {
        $sucursales = Sucursal::all();
        return view('sucursales', compact('sucursales'));
    }

    public function save(Request $request) {
        $sucursal = $request->id ? Sucursal::find($request->id) : new Sucursal();

        $sucursal->nombre = $request->nombre;
        $sucursal->telefono = $request->telefono;
        $sucursal->direccion = $request->direccion;
        $sucursal->director = $request->director;
        $sucursal->save();

        return redirect()->route('sucursales.index');
    }

    public function delete($id) {
        $sucursal = Sucursal::find($id);
        $sucursal?->delete();
        return redirect()->back();
    }

    public function show($id) {
        $sucursal = Sucursal::find($id);
        return view('sucursales-modifica', compact('sucursal'));
    }


    // --- Salas ---
    public function salasIndex() {
        $salas = Sala::with('sucursal')->get();
        $sucursales = Sucursal::all();
        return view('salas', compact('salas', 'sucursales'));
    }

    public function salasSave(Request $request) {
        $sala = $request->id ? Sala::find($request->id) : new Sala();

        $sala->nombre = $request->nombre;
        $sala->capacidad = $request->capacidad;
        $sala->sucursal_id = $request->sucursal_id;
        $sala->save();

        return redirect()->route('salas.index');
    }

    public function salasDelete($id) {
        $sala = Sala::find($id);
        $sala?->delete();
        return redirect()->back();
    }

    public function salasShow($id) {
        $sala = Sala::find($id);
        $sucursales = Sucursal::all();
        return view('salas-modifica', compact('sala', 'sucursales'));
    }

    // --- Peliculas ---
    public function peliculasIndex() {
        $peliculas = Pelicula::all();
        return view('peliculas', compact('peliculas'));
    }

    public function peliculasSave(Request $request) {
        $pelicula = $request->id ? Pelicula::find($request->id) : new Pelicula();

        $pelicula->nombre = $request->nombre;
        $pelicula->director = $request->director;
        $pelicula->duracion = $request->duracion;
        $pelicula->genero = $request->genero;
        $pelicula->save();

        return redirect()->route('peliculas.index');
    }

    public function peliculasDelete($id) {
        $pelicula = Pelicula::find($id);
        $pelicula?->delete();
        return redirect()->back();
    }

    public function peliculasShow($id) {
        $pelicula = Pelicula::find($id);
        return view('peliculas-modifica', compact('pelicula'));
    }

}
