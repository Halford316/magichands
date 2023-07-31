<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\CitaHorario;
use App\Models\Consultorio;
use App\Models\Paciente;
use App\Models\Podologa;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class CitaController extends Controller
{
    function index()
    {
        $horarios = CitaHorario::all();
        $consultorios = Consultorio::where('activo', '1')->get();
        $podologas = Podologa::where('activo', '1')->get();

        return view('admin.citas.index', compact('horarios',
                                                'consultorios',
                                                'podologas'
                                        ));
    }

    public function datatable()
    {
        $fichas = Cita::all();

        $json_response = [];

        foreach($fichas as $ficha) {
            $id = $ficha->id;
            $status_class = getStatusClass();
            $muestra_status = '<span class="badge badge-'.$status_class[$ficha->cita_status].' w-100 p-2">'.strtoupper($ficha->cita_status).'</span>';

            $json_response[] = array(
                "id" => $id,
                "paciente" => $ficha->paciente->nombres.' '.$ficha->paciente->ape_paterno.' '.$ficha->paciente->ape_materno,
                "fecha" => Date::parse($ficha->fecha)->format('d/m/Y'),
                "hora" => $ficha->horario->hora,
                "podologo" => $ficha->podologa->nombres.' '.$ficha->podologa->ape_paterno.' '.$ficha->podologa->ape_materno,
                "consultorio" => $ficha->consultorio->nombre,
                "estado" => $muestra_status,
                "fecha_reg" => Date::parse($ficha->created_at)->format('d/m/Y'),
                "acciones" => '
                    <a href="javascript:" onclick="editarCita('.$id.')" title="Editar cita del paciente" class="mr-3">
                        <i class="fa fa-edit fa-lg"></i>
                    </a>

                '
            );
        }

        return response()->json([
            'data' =>  $json_response
        ]);

    }

    public function showPacientexDNI($dni)
    {
        $paciente = Paciente::where('dni', $dni)->get();

        if ($paciente) {
            return response()->json($paciente);
        }
    }

    /** Guardando */
    public function store()
    {
        $data = request()->all();

        $verifica = Cita::where('fecha', $data['fecha'])
                        ->where('hora_id', $data['hora_id'])
                        ->where('consultorio_id', $data['consultorio_id'])
                        ->where('podologa_id', $data['podologa_id'])
                        ->count();

        if ($verifica > 0) {
            return response()->json(['valid'=>'existe']);
        }else {
            $ficha = Cita::create($data);

            if ($ficha) {
                return response()->json(['valid'=>'stored']);
            }
        }
    }

    public function show(Cita $ficha)
    {
        $horarios = CitaHorario::all();
        $consultorios = Consultorio::all();
        $podologas = Podologa::all();

        if ($ficha) {
            return response()->json([
                'ficha' => $ficha->load('paciente'),
                'horarios' => $horarios,
                'consultorios' => $consultorios,
                'podologas' => $podologas,
            ]);
        }
    }


    /** Actualizando */
    public function update()
    {
        $data = request()->all();

        $ficha =  Cita::find($data['ec_ficha_id']);

        $ficha->fecha = $data['ec_fecha'];
        $ficha->hora_id = $data['ec_hora_id'];
        $ficha->consultorio_id = $data['ec_consultorio_id'];
        $ficha->podologa_id = $data['ec_podologa_id'];
        $ficha->tipo_servicio = $data['ec_tipo_servicio'];
        $ficha->motivo_consulta = $data['ec_motivo_consulta'];
        $ficha->tipo_cita = $data['ec_tipo_cita'];
        $ficha->cita_status = $data['ec_cita_status'];
        $ficha->save();

        if ($ficha) {
            return response()->json(['status'=>'updated-cita']);
        }

    }

    /** Calendario */
    function calendar()
    {
        $citas = Cita::all();

        $events = [];

        foreach ($citas as $cita) {
            $podologa = $cita->podologa->nombres.' '.$cita->podologa->ape_paterno;
            $events[] = [
                'title' => $cita->consultorio->nombre.' - '.$podologa,
                'start' => $cita->fecha,
                'end' => $cita->fecha,
            ];
        }
        //return view('admin.citas.calendario', compact($events));
        return view('admin.citas.calendario', ['events' => $events]);
    }
}
