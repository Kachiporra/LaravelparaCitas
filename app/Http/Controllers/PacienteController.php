<?php

namespace App\Http\Controllers;

use App\Models\Paciente_Model;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    //
    public function save(Request $req)
    {
        if ($req->id == 0) {

            $paciente = new Paciente_Model();
        } else {

            $paciente = Paciente_Model::find($req->id);
        }
        $paciente->nombre = $req->nombre;
        $paciente->nss = $req->nss;
        $paciente->tipo_sangre = $req->tipo_sangre;
        $paciente->alergias = $req->alergias;
        $paciente->telefono = $req->telefono;
        $paciente->domicilio = $req->domicilio;
        $paciente->save();
        return "ok";
    }

    public function list(Request $req)
    {
        $pacientes = Paciente_Model::all();
        return $pacientes;
    }

    public function delete(Request $req)
    {
        $paciente = Paciente_Model::find($req->id);
        $paciente->delete();
        return "ok";
    }
}
