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
            'created_at as fecha'
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
            'created_at as fecha',
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
        $all_recievers = false;

        // Si no se registra el correo y área, se envía a todos los destinatarios registrados
        // Si solo viene el correo, se le envía a él y a indirectos
        // Si solo viene el área, se le envía a los responsables del área e indirectos
        if( !$request->correo && !$request->area ) {
            $all_recievers = true;
        }

        $paquete = PaquetesModel::create([
            'numero_de_guia' => $request->numero_de_guia,
            'paqueteria' => $request->paqueteria,
            'quien_captura' => $request->quien_captura,
            'usuario' => $request->usuario,
            'correo' => $request->correo,
            'area' => $request->area,
            'extension' => $request->extension,
            'status' => 'RECIBIDO',
            'created_at' => Carbon::now()->subHours(1),
            'updated_at' => Carbon::now()->subHours(1),
        ]);

        $paquete = true;
        // El correo se envía únicamente cuando se crea un paquete exitosamente
        if( $paquete ) {

            // Lista de CC emails
            $ccEmails = [];

            $query;
            // Paquete normal, con todos los campos
            if( !$all_recievers ) {
                // Consulta destinatarios del área del usuario
                $destinatarios = DestinatariosModel::select(
                    'correo'
                )
                ->where('area', $request->area)
                ->get();

                // Consulta destinatarios de indirectos
                $destinatariosIndirectos = DestinatariosModel::select(
                    'correo'
                )
                ->where('area', 'Indirectos')
                ->get();

                // Agrega destinatario principal
                $query = Mail::to($request->correo);

                // Agrega destinatarios responsables del área

                // array_push($ccEmails, 'jona.pelo1998@gmail.com');
                // array_push($ccEmails, 'jona_jko@hotmail.com');
                foreach ($destinatarios as $destinatario) {
                    array_push($ccEmails, $destinatario->correo);
                }

                // Agrega destinatarios de indirectos
                foreach ($destinatariosIndirectos as $destinatarioIndirecto) {
                    array_push($ccEmails, $destinatarioIndirecto->correo);
                }

                $query = $query->cc($ccEmails);

            } else {
                // Consulta todos los destinatarios
                $destinatarios = DestinatariosModel::select(
                    'correo'
                )
                ->get();

                $query = Mail::to('');

                // Agrega todos los destinatarios
                // array_push($ccEmails, 'jona.pelo1998@gmail.com');
                // array_push($ccEmails, 'jona_jko@hotmail.com');
                foreach ($destinatarios as $destinatario) {
                    array_push($ccEmails, $destinatario->correo);
                }

                $query = $query->cc($ccEmails);
            }
            $query = $query->send(new PaqueteRecibido($all_recievers, $request->numero_de_guia ?? '', $request->usuario ?? ''));

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
            'updated_at' => Carbon::now()->subHours(1)
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
            'fecha_entregado' => Carbon::now()->subHours(1),
            'status' => 'ENTREGADO',
            'updated_at' => Carbon::now()->subHours(1),
        ]);

        return response([
            'msg' => '¡Paquete entregado exitosamente!',
            'data' => $actual
        ]);
    }
}
