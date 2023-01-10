<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistUsuario extends Model
{
    use HasFactory;


    protected $table = 'checklist_usuarios';

    protected $fillable = ['checklist', 'usuario', 'grupo'];

    public function checklists()
    {
        return $this->belongsToMany(Checklist::class);
    }

}
