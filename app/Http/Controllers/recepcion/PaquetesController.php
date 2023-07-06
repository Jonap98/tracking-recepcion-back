<?php

namespace App\Http\Controllers\recepcion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

use App\Mail\PaqueteRecibido;
use App\Models\recepcion\PaquetesModel;
use App\Models\catalogos\DestinatariosModel;

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
        ->orderBy('id', 'desc')
        ->get();

        return response([
            'paquetes' => $paquetes
        ]);
    }

    public function filters(Request $request) {
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
        );

        if( $request->status ) {
            $paquetes = $paquetes->where('status', $request->status);
        }

        $paquetes = $paquetes->orderBy('id', 'desc')->get();

        return response([
            'paquetes' => $paquetes
        ]);
    }

    public function store(Request $request) {
        $paquete = PaquetesModel::create([
            'numero_de_guia' => $request->numero_de_guia,
            'paqueteria' => $request->paqueteria,
            'quien_captura' => $request->quien_captura,
            'usuario' => $request->usuario,
            'correo' => $request->correo,
            'area' => $request->area,
            'extension' => $request->extension,
            'status' => 'RECIBIDO',
        ]);

        if( $paquete ) {
            $destinatarios = DestinatariosModel::select(
                'correo'
            )
            ->where('area', $request->area)
            ->get();

            $query = Mail::to($request->correo);

            $ccEmails = [];
            foreach ($destinatarios as $destinatario) {
                array_push($ccEmails, $destinatario->correo);
            }
            $query = $query->cc($ccEmails);

            $query = $query->send(new PaqueteRecibido());

            return response([
                'msg' => '¡Paquete ingresado exitosamente!',
                'data' => $paquete
            ]);
        }

        return response([
            'msg' => 'No se pudo registrar supaquete, revise nuevamente sus datos',
        ]);
    }

    public function updateFields(Request $request) {
        PaquetesModel::where(
            'id', $request->id
        )
        ->update([
            'numero_de_guia' => $request->numero_de_guia,
            'paqueteria' => $request->paqueteria,
            'quien_captura' => $request->quien_captura,
            'usuario' => $request->usuario,
            'correo' => $request->correo,
            'area' => $request->area,
            'extension' => $request->extension,
        ]);

        return response([
            'msg' => '¡Paquete actualizado exitosamente!'
        ]);
    }

    public function update(Request $request) {
        $actual = PaquetesModel::where(
            'id', $request->id
        )->first();

        PaquetesModel::where(
            'id', $request->id
        )
        ->update([
            'empleado_recibe' => $request->empleado,
            'fecha_entregado' => Carbon::now(),
            'status' => 'ENTREGADO'
        ]);

        return response([
            'msg' => '¡Paquete entregado exitosamente!',
            'data' => $actual
        ]);
    }
}
