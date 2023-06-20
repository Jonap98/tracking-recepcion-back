<?php

namespace App\Http\Controllers\catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\catalogos\AreasModel;

class AreasController extends Controller
{
    public function index() {
        $areas = AreasModel::select(
            'id',
            'area',
        )
        ->get();

        return response([
            'areas' => $areas
        ]);
    }

    public function store(Request $request) {
        $area = AreasModel::create([
            'area' => $request->area,
        ]);

        return response([
            'msg' => '¡Area registrada exitosamente!',
            'data' => $area
        ]);
    }

    public function update(Request $request) {
        AreasModel::where(
            'id', $request->id
        )
        ->update([
            'area' => $request->area
        ]);

        return response([
            'msg' => '¡Area actualizada exitosamente!'
        ]);
    }
}
