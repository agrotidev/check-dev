<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTarefa extends Model
{
    use HasFactory;

    protected $table = 'tipo_tarefas';

    protected $fillable = [
        'descricao',
        'nome',
        'ativo'
    ];
}
