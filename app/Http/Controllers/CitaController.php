<?php

namespace App\Http\Controllers;

use App\Models\Cita_Model;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function save(Request $req)
    {
        if ($req->id == 0) {

            $cita = new Cita_Model();
        } else {

            $cita = Cita_Model::find($req->id);
        }
        $cita->id_enfermedad = $req->id_enfermedad;
        $cita->id_paciente = $req->id_paciente;
        $cita->id_medico = $req->id_medico;
        $cita->consultorio = $req->consultorio;
        $cita->fecha = $req->fecha;

        $cita->save();
        return "ok";
    }

    public function list()
    {
        $citas = Cita_Model::join('paciente', 'cita.id_paciente', '=', 'paciente.id')
            ->join('medico', 'cita.id_medico', '=', 'medico.id')
            ->join('enfermedad', 'cita.id_enfermedad', '=', 'enfermedad.id')
            ->select(
                'cita.*',
                'paciente.nombre as nombre_paciente',
                'paciente.nss as nss_paciente',
                'paciente.tipo_sangre as sangre_paciente',
                'paciente.alergias as alergias_paciente',
                'paciente.telefono as telefono_paciente',
                'paciente.domicilio as domicilio_paciente',
                'medico.nombre as nombre_medico',
                'enfermedad.nombre as nombre_enfermedad',

            )
            ->get();
        return $citas;
    }

    public function delete(Request $req)
    {
        $cita = Cita_Model::find($req->id);
        $cita->delete();
        return "ok";
    }
}
