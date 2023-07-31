<?php

namespace App\Http\Controllers;

use App\Models\Podologa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PodologaController extends Controller
{
    function index()
    {
        return view('admin.podologas.index');
    }

    public function datatable()
    {
        $fichas = Podologa::where('activo', '1')->get();

        $json_response = [];

        foreach($fichas as $ficha) {
            $id = $ficha->id;

            $json_response[] = array(
                "id" => $id,
                "tipo_contrato" => $ficha->tipo_contrato,
                "ape_paterno" => $ficha->ape_paterno,
                "ape_materno" => $ficha->ape_materno,
                "nombres" => $ficha->nombres,
                "dni" => $ficha->dni,
                "usuario" => ($ficha->user_id) ? $ficha->usuarios->name : '',
                "fecha_reg" => Date::parse($ficha->created_at)->format('d/m/Y'),
                "fecha_mod" => Date::parse($ficha->updated_at)->format('d/m/Y'),
                "acciones" => '
                    <a href="#" title="Editar podóloga" class="mr-3" onclick="editarPodologa('.$id.')">
                        <i class="fa fa-edit fa-lg"></i>
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

        $verifica = Podologa::where('dni', $data['dni'])->count();

        if ($verifica > 0) {
            return response()->json(['valid'=>'existe']);
        }else {
            $ficha = Podologa::create($data);

            if ($ficha) {
                return response()->json(['valid'=>'Data is successfully added']);
            }
        }
    }

}
