<?php

namespace App\Models\catalogos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreasModel extends Model
{
    use HasFactory;
    protected $table = 'LOBBY_areas';
    protected $fillable = [
        'area',
    ];
}
