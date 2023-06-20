<?php

namespace App\Http\Controllers\catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\catalogos\PaqueteriasModel;

class PaqueteriasController extends Controller
{
    public function index() {
        $paqueterias = PaqueteriasModel::select(
            'id',
            'paqueteria',
        )
        ->get();

        return response([
            'paqueterias' => $paqueterias
        ]);
    }

    public function store(Request $request) {
        $paqueteria = PaqueteriasModel::create([
            'paqueteria' => $request->paqueteria,
        ]);

        return response([
            'msg' => '¡Paquetería registrada exitosamente!',
            'data' => $paqueteria
        ]);
    }

    public function update(Request $request) {
        PaqueteriasModel::where(
            'id', $request->id
        )
        ->update([
            'paqueteria' => $request->paqueteria
        ]);

        return response([
            'msg' => '¡Paquetería actualizada exitosamente!'
        ]);
    }
}
