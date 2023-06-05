<?php

namespace App\Models\catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinatariosModel extends Model
{
    use HasFactory;
    protected $table = 'RECEPCION_destinatarios';
    protected $fillable = [
        'nombre',
        'correo',
        'area',
    ];
}
