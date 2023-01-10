<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistGroup extends Model
{
    use HasFactory;

    protected $table = 'checklist_group';

    protected $fillable = [
        'checklist_id',
        'group_id',
    ];
}
