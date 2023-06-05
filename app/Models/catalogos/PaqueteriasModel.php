<?php

namespace App\Models\catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaqueteriasModel extends Model
{
    use HasFactory;
    protected $table = 'RECEPCION_paqueterias';
    protected $fillable = [
        'paqueteria',
    ];
}
