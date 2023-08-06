<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ConsultorioController extends Controller
{
    function index()
    {
        $locales = Local::all();

        return view('admin.consultorios.index', compact('locales'));
    }

    public function datatable()
    {
        $fichas = Consultorio::where('activo', '1')->get();

        $json_response = [];

        foreach($fichas as $ficha) {
            $id = $ficha->id;

            $json_response[] = array(
                "id" => $id,
                "local" => $ficha->local->nombre,
                "consultorio" => $ficha->nombre,
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

        $verifica = Consultorio::where('local', $data['local_id'])
                                ->where('nombre', $data['nombre'])
                                ->count();

        if ($verifica > 0) {
            return response()->json(['valid'=>'existe']);
        }else {
            $ficha = Consultorio::create($data);

            if ($ficha) {
                return response()->json(['valid'=>'Data is successfully added']);
            }
        }
    }

}
