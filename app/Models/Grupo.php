<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'grupos';

    protected $fillable = ['modulo', 'user', 'nome', 'descricao', 'ativo'];


    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'user_group', 'group_id', 'user_id')->distinct();
    }

    public function checklists()
    {
        return $this->belongsToMany(Checklist::class, 'checklist_group', 'group_id', 'checklist_id')->distinct();
    }


    // public function checklists()
    // {
    //     return $this->hasMany(Checklist::class);
    // }

}
