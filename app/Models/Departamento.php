<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';

    protected $fillable = ['cod_departamento', 'nome', 'ativo'];

    public function setores() 
    {
        return $this->hasMany(Setor::class, 'departamento', 'cod_departamento');
    }
}
