<?php

namespace App\Http\Controllers\catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\catalogos\DestinatariosModel;

class DestinatariosController extends Controller
{
    public function index() {
        $destinatarios = DestinatariosModel::select(
            'id',
            'nombre',
            'correo',
            'area',
        )
        ->get();

        return response([
            'destinatarios' => $destinatarios
        ]);
    }

    public function store(Request $request) {
        $destinatario = DestinatariosModel::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'area' => $request->area
        ]);

        return response([
            'msg' => '¡Destinatario registrado exitosamente!',
            'data' => $destinatario
        ]);
    }

    public function update(Request $request) {
        DestinatariosModel::where(
            'id', $request->id
        )
        ->update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'area' => $request->area,
        ]);

        return response([
            'msg' => '¡Destinatario actualizado exitosamente!'
        ]);
    }
}
