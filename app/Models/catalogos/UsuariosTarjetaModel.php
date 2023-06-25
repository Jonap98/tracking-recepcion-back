<?php

namespace App\Models\catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosTarjetaModel extends Model
{
    use HasFactory;
    protected $table = 'RECEPCION_usuarios_tarjeta';
    protected $fillable = [
        'numero_tarjeta',
        'nombre',
    ];
}
