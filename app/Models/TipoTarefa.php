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

    public function toArray()
    {
        return [
        'id' => $this->id,
        'nome' => $this->nome,
        'descricao' => $this->cod_departamento,
        'ativo' => $this->ativo,
        ];
    }

    
}
