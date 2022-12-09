<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCategoria extends Model
{
    use HasFactory;

    protected $table = 'categoria_tarefas';

    protected $fillable = ['descricao', 'nome', 'ativo'];
}
