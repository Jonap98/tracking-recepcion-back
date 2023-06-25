<?php

namespace App\Http\Controllers\catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\catalogos\UsuariosTarjetaModel;

class UsuariosTarjetaController extends Controller
{
    public function index() {
        $usuarios = UsuariosTarjetaModel::select(
            'numero_tarjeta',
            'nombre',
        )
        ->get();

        return response([
            'data' => $usuarios
        ]);
    }

    public function filters($tarjeta) {
        $usuario = UsuariosTarjetaModel::select(
            'id',
            'numero_tarjeta',
            'nombre',
        )
        ->where('numero_tarjeta', $tarjeta)
        ->first();

        return response([
            'data' => $usuario
        ]);
    }

    public function store(Request $request) {
        UsuariosTarjetaModel::create([
            'numero_tarjeta' => $request->numero_tarjeta,
            'nombre' => $request->nombre
        ]);

        return response([
            'msg' => '¡Usuario creado exitosamente!'
        ]);
    }
}
