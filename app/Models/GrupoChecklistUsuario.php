<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoUsuarioChecklist extends Model
{
    use HasFactory;

    
    protected $table = 'grupo_checklist_usuarios';
    
    protected $fillable = ['grupo_checklist', 'user'];
    
}
