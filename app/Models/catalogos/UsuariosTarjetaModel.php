<?php

namespace App\Models\catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosTarjetaModel extends Model
{
    use HasFactory;
    protected $table = 'LOBBY_badges';
    protected $fillable = [
        'numero_tarjeta',
        'nombre',
        'created_at',
        'updated_at'
    ];
}
