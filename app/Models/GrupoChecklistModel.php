<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoChecklistModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'grupo_checklists';

    protected $fillable = ['modulo', 'user', 'nome', 'descricao', 'ativo'];
}
