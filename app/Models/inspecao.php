<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inspecao extends Model
{
    use HasFactory;

    protected $table = 'inspecoes';

    protected $fillable = [
        'usuario',
        'setor',
        'lider',
        'data_integracao',
        'data_inspecao',
        'status'
    ];

    public function toArray()
    {
        return [
            'id' => $this->id,
            'usuario' => $this->usuario,
            'setor' => $this->setor,
            'lider' => $this->lider,
            'data_integracao' => $this->data_integracao,
            'data_inspecao' => $this->data_inspecao,
            'status' => $this->status,
        ];
    }
}