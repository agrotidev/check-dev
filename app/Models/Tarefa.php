<?php

namespace App\Models;

use Database\Seeders\CategoriaTarefa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefas';

    protected $fillable = [
        'checklist',
        'categoria_tarefa',
        'nome',
        'descricao',
        'valor',
        'ativo'
    ];


    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }

    public function categoria_tarefa()
    {
        return $this->hasMany(CategoriaTarefa::class, 'categoria_tarefa', 'id');
    }
}
