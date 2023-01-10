<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistGroup extends Model
{
    use HasFactory;

    protected $table = 'grupo_checklists';

    protected $fillable = [
        'checklist',
        'grupo',
    ];
}
