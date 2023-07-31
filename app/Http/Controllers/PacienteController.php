<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PacienteController extends Controller
{
    function index()
    {
        $sexos = getSexos();
        $estado_civil = getEstadoCivil();

        return view('admin.pacientes.index', compact('sexos', 'estado_civil'));
    }

    public function datatable()
    {
        $fichas = Paciente::where('activo', '1')->get();

        $json_response = [];

        foreach($fichas as $ficha) {
            $id = $ficha->id;

            /** Calculando la edad */
            $fecha_nac = Carbon::parse($ficha->fecha_nac);
            $edad = $fecha_nac->diffInYears(Carbon::now());

            $json_response[] = array(
                "id" => $id,
                "ape_paterno" => $ficha->ape_paterno,
                "ape_materno" => $ficha->ape_materno,
                "nombres" => $ficha->nombres,
                "dni" => $ficha->dni,
                "edad" => $edad,
                "usuario" => ($ficha->user_id) ? $ficha->usuarios->name : '',
                "fecha_reg" => Date::parse($ficha->created_at)->format('d/m/Y'),
                "fecha_mod" => Date::parse($ficha->updated_at)->format('d/m/Y'),
                "acciones" => '


                    <a href="'.route('pacientes.edit', $id).'" title="Ver ficha del paciente" class="mr-3">
                        <i class="fa fa-id-badge fa-lg"></i>
                    </a>

                '
            );
        }

        return response()->json([
            'data' =>  $json_response
        ]);

    }

    /** Guardando */
    public function store()
    {
        $data = request()->all();

        $verifica = Paciente::where('dni', $data['dni'])->count();

        if ($verifica > 0) {
            return response()->json(['valid'=>'existe']);
        }else {
            $ficha = Paciente::create($data);

            if ($ficha) {
                return response()->json(['valid'=>'Data is successfully added']);
            }
        }
    }


    public function edit($id)
    {
        $ficha = Paciente::find($id);
        $sexos = getSexos();
        $estado_civil = getEstadoCivil();

        return view('admin.pacientes.edit', compact('ficha', 'sexos', 'estado_civil'));

    }

    public function update()
    {
        $data = request()->all();

        $ficha = Paciente::find($data['paciente_id']);

        /*$ficha->nombre = $data['nombre'];
        $ficha->fecha_inicio = $data['fecha_inicio'];
        $ficha->premio = $data['premio'];
        $ficha->nro_equipos = $data['nro_equipos'];
        $ficha->precio = $data['precio'];
        $ficha->direccion = $data['direccion'];
        $ficha->lugar = $data['lugar'];
        $ficha->duracion = $data['duracion'];
        $ficha->descanso = $data['descanso'];
        $ficha->hora_inicio = $data['hora_inicio'];*/
        $ficha->update();

        if ($ficha) {
            return response()->json(['status'=>'updated']);
        }

    }

}
