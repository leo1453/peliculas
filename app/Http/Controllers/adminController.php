<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
use App\Models\Sala;
use App\Models\Pelicula;
use App\Models\Funcion;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\Boletos;


class adminController extends Controller
{
    public function dashboard(){
        $salas = Sala::all();
        return view('dashboard', compact('salas'));
    }

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
        $salas = Sala::with('sucursal')->get();
        $peliculas = Pelicula::with([ 'sala'])->get(); 
        return view('peliculas', compact('salas','peliculas'));
    }

    public function peliculasSave(Request $request) {
        $pelicula = $request->id ? Pelicula::find($request->id) : new Pelicula();

        $pelicula->nombre = $request->nombre;
        $pelicula->director = $request->director;
        $pelicula->duracion = $request->duracion;
        $pelicula->genero = $request->genero;
        $pelicula->sala_id = $request->sala_id;
        $pelicula->save();

        Mail::to('jonatanu24mtz@gmail.com')->send(new Boletos($pelicula));

        return redirect()->route('peliculas.index');
    }

    public function peliculasDelete($id) {
        $pelicula = Pelicula::find($id);
        $pelicula?->delete();
        return redirect()->back();
    }

    public function peliculasShow($id) {
        $pelicula = Pelicula::find($id);
        $salas = Sala::all();
        return view('peliculas-modifica', compact('salas','pelicula'));
    }

    //funciones
    // --- Funciones ---
    public function funcionesIndex() {
        $funciones = Funcion::with(['pelicula', 'sala'])->get();
        $peliculas = Pelicula::all();
        $salas = Sala::with('sucursal')->get();
        return view('funciones', compact('funciones', 'peliculas', 'salas'));
    }

    public function funcionesSave(Request $request) {
        $funcion = $request->id ? Funcion::find($request->id) : new Funcion();

        $funcion->fecha = $request->fecha;
        $funcion->pelicula_id = $request->pelicula_id;
        $funcion->sala_id = $request->sala_id;
        $funcion->tipo = $request->tipo;
        $funcion->costo = $request->costo;
        $funcion->save();

        return redirect()->route('funciones.index');
    }

    public function funcionesDelete($id) {
        $funcion = Funcion::find($id);
        $funcion?->delete();
        return redirect()->back();
    }

    public function funcionesShow($id) {
        $funcion = Funcion::find($id);
        $peliculas = Pelicula::all();
        $salas = Sala::all();
        return view('funciones-modifica', compact('funcion', 'peliculas', 'salas'));
    }

    public function generarReportePeliculasSalas(Request $request) {
        $dompdf = new Dompdf();
        $sala = Sala::find($request->sala_id);
        $funciones = Funcion::where('sala_id', $request->sala_id)->get();
        $peliculas = Pelicula::all();

        $html = view('reportesPeliculasSalas', compact('sala', 'funciones', 'peliculas'))->render();

        // Revisa que el HTML realmente tenga contenido antes de enviarlo a Dompdf
        if (empty(trim($html))) {
            return response('No se generó contenido para el PDF (revisa la vista o los datos).', 500);
        }

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('reporte_peliculas_salas.pdf');
    }

}
