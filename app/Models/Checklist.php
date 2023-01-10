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
        'grupo_checklist',
        'modulo',
        'setor',
        'tipo_tarefas',
        'usuario',
        'nome',
        'descricao',
        'ativo'
    ];

    public function toArray()
    {
        return [
            'id' => $this->id,
            'modulo' => $this->modulo,
            'setor' => $this->setor,
            'tipo_tarefas' => $this->tipo_tarefas,
            'usuario' => $this->user,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'ativo' => $this->ativo,
        ];
    }

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

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_checklists', 'checklist', 'grupo');
    }


    // public function usuarios()
    // {
    //     return $this->belongsToMany(User::class, 'checklist_usuarios', 'checklist', 'usuario');
    // }

}
