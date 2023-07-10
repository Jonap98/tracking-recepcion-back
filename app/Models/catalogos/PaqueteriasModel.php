<?php

namespace App\Models\catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaqueteriasModel extends Model
{
    use HasFactory;
    protected $table = 'LOBBY_paqueterias';
    protected $fillable = [
        'paqueteria',
        'created_at',
        'updated_at'
    ];
}
