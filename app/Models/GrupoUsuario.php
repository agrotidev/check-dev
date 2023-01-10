<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoUsuario extends Model
{
    use HasFactory;

    protected $table = 'grupo_usuarios';

    protected $fillable = [
        'grupo',
        'usuario',
    ];


}
