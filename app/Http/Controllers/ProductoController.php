<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ProductoController extends Controller
{
    function index()
    {
        $sexos = getSexos();
        $estado_civil = getEstadoCivil();

        return view('admin.productos.index', compact('sexos', 'estado_civil'));
    }

    public function datatable()
    {
        $fichas = Producto::all();

        $json_response = [];

        foreach($fichas as $ficha) {
            $id = $ficha->id;

            $json_response[] = array(
                "id" => $id,
                "tipo" => $ficha->tipo,
                "codigo" => $ficha->codigo,
                "nombre" => $ficha->nombre,
                "descripcion" => $ficha->descripcion,
                "costo" => $ficha->costo,
                "venta" => $ficha->precio_venta,
                "cantidad" => $ficha->cantidad,
                "fecha_reg" => Date::parse($ficha->created_at)->format('d/m/Y'),
                "fecha_mod" => Date::parse($ficha->updated_at)->format('d/m/Y'),
                "acciones" => '

                    <a href="javascript:" title="Ver ficha del producto" class="mr-3">
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

        $verifica = Producto::where('codigo', $data['codigo'])->count();

        if ($verifica > 0) {
            return response()->json(['valid'=>'existe']);
        }else {
            $ficha = Producto::create($data);

            if ($ficha) {
                return response()->json(['valid'=>'Data is successfully added']);
            }
        }
    }




}
