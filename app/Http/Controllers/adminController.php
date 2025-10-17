<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;

class adminController extends Controller
{
    public function index(){
        $sucursales = Sucursal::all();
        return view('sucursales',compact('sucursales'));
    }

    public function save(Request $request){
        $sucursal = new Sucursal();
        $sucursal->nombre = $request->nombre;
        $sucursal->telefono = $request->telefono;
        $sucursal->direccion = $request->direccion;
        $sucursal->director = $request->director;

        $sucursal->save();
        



        return redirect()->back();
    }

    public function delete($id){
        $sucursal = sucursal::find($id);
        $sucursal->delete();
        return redirect()->back();
    }

    public function show($id){
                $sucursal = sucursal::find($id);
        return view('sucursales-modifica',compact('sucursal'));
    }
    
}
