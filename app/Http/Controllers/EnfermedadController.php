<?php

namespace App\Http\Controllers;

use App\Models\Enfermedad_Model;
use Illuminate\Http\Request;

class EnfermedadController extends Controller
{
    public function save(Request $req)
    {
        if ($req->id == 0) {

            $enfermedad = new Enfermedad_Model();
        } else {

            $enfermedad = Enfermedad_Model::find($req->id);
        }
        $enfermedad->nombre = $req->nombre;
        $enfermedad->tipo = $req->tipo;
        $enfermedad->descripcion = $req->descripcion;
       
        $enfermedad->save();
        return "ok";
    }

    public function list(Request $req)
    {
        $enfermedad = Enfermedad_Model::all();
        return $enfermedad;
    }

    public function delete(Request $req)
    {
        $enfermedad = Enfermedad_Model::find($req->id);
        $enfermedad->delete();
        return "ok";
    }
}
