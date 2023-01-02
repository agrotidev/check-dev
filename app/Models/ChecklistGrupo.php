<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChecklistGrupo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'checklist_grupos';

    protected $fillable = ['modulo', 'user', 'nome', 'descricao', 'ativo'];

    // public function checklists()
    // {
    //     return $this->hasMany(Checklist::class);
    // }

}
