<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Tinker\TinkerCaster;

class Checklist extends Model
{
    use HasFactory;

    protected $table = 'checklists';

    protected $fillable = [
        'setor',
        'tipo_tarefas',
        'user',  
        'nome',
        'descricao',
        'ativo'
    ];

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class, 'checklist', 'id');
    }

    public function totalPontos()
    {
        return $this->tarefas()->sum('valor');
    }

    // Tinker
    // $check->totalPorcentagem()
    public function totalPorcentagem()
    {
        return $this->tarefas()->count();
    }

    public function porcentagem()
    {
        return round(($this->totalPontos() / $this->totalPorcentagem()) * 100, 2);
    }

    public function conforme()
    {
        // return  $this->tarefas()
        //                 ->having('categoria_tarefa', '=', 1)
        //                 ->get();
    }
}
