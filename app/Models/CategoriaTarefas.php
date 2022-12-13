<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaTarefas extends Model
{
    use HasFactory;

    protected $table = 'categoria_tarefas';

    protected $fillable = ['nome', 'descricao', 'peso', 'ativo'];

}
