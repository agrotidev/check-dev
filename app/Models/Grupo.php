<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'grupos';

    protected $fillable = ['modulo', 'usuario', 'nome', 'descricao', 'ativo'];


    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'grupo_usuarios', 'grupo', 'usuario')->distinct();
    }

    public function checklists()
    {
        return $this->belongsToMany(Checklist::class, 'grupo_checklists', 'grupo', 'checklist')->distinct();
    }


    // public function checklists()
    // {
    //     return $this->hasMany(Checklist::class);
    // }

}
