<?php

namespace App\Models\recepcion;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaquetesModel extends Model
{
    use HasFactory;
    protected $table = 'RECEPCION_paquetes';
    protected $fillable = [
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
    ];
}
