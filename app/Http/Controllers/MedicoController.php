<?php

namespace App\Http\Controllers;

use App\Models\Medico_Model;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function save(Request $req)
    {
        if ($req->id == 0) {

            $paciente = new Medico_Model();
        } else {

            $paciente = Medico_Model::find($req->id);
        }
        $paciente->nombre = $req->nombre;
        $paciente->cedula = $req->cedula;
        $paciente->especialidad = $req->especialidad;
        $paciente->turno = $req->turno;
        $paciente->telefono = $req->telefono;
        $paciente->email = $req->email;
        $paciente->save();
        return "ok";
    }

    public function list(Request $req)
    {
        $medico = Medico_Model::all();
        return $medico;
    }

    public function delete(Request $req)
    {
        $medico = Medico_Model::find($req->id);
        $medico->delete();
        return "ok";
    }
}
