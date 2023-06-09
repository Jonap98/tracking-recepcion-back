<?php

namespace App\Http\Controllers\recepcion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\recepcion\PaquetesModel;

class PaquetesController extends Controller
{
    public function index() {
        $paquetes = PaquetesModel::select(
            'id',
            'numero_de_guia',
            'paqueteria',
            'quien_captura',
            'usuario',
            'correo',
            'area',
            'extension',
            'empleado_recibe',
            'fecha_entregado',
            'status',
        )
        ->where('status', 'RECIBIDO')
        ->get();

        return response([
            'paquetes' => $paquetes
        ]);
    }

    public function store(Request $request) {
        PaquetesModel::create([
            'numero_de_guia' => $request->numero_de_guia,
            'paqueteria' => $request->paqueteria,
            'quien_captura' => $request->quien_captura, // Cambiar a auth
            'tipo' => $request->tipo,
            'usuario' => $request->usuario,
            'correo' => $request->correo,
            'area' => $request->area,
            'extension' => $request->extension,
            'status' => 'RECIBIDO',
        ]);

        return response([
            'msg' => '¡Paquete ingresado exitosamente!',
        ]);
    }

    public function update(Request $request) {
        PaquetesModel::where(
            'id', $request->id
        )
        ->update([
            'empleado_recibe' => $request->empleado,
            'fecha_entregado' => Carbon::now(),
            'status' => 'ENTREGADO'
        ]);

        return response([
            'msg' => '¡Paquete recibido exitosamente!',
        ]);
    }
}
