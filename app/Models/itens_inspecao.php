<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itens_inspecao extends Model
{
    use HasFactory;

    protected $table = 'itens_inspecao';

    protected $fillable = [
        'inspecao',
        'tarefa',
        'peso',
        'valor',
        'foto',
        'status'
    ];

    public function toArray()
    {
        return [
            'id' => $this->id,
            'inspecao' => $this->inspecao,
            'tarefa' => $this->tarefa,
            'peso' => $this->peso,
            'valor' => $this->valor,
            'foto' => $this->foto,
            'status' => $this->status,
        ];
    }
}
