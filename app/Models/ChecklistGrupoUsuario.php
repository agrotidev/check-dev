<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistGrupoUsuario extends Model
{
    use HasFactory;

    
    protected $table = 'checklist_grupo_usuarios';
    
    protected $fillable = ['grupo_checklist', 'user'];

    public function checklists()
    {
        return $this->belongsToMany(Checklist::class);
    }
    
}
