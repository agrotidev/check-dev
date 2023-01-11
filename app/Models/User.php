<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'setor',
        'modulo',
        'ismanager',
        'islider',
        'code',
        'active',
        'name',
        'mobile',
        'email',
        'password',
        'password_mobile',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'email_verified_at',
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];





    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_usuarios', 'usuario', 'grupo')->distinct();
    }

    public function checklists($id)
    {
        $user = User::find($id);

        // return $user;
        // $checklists = collect([]);
        $grupos = $user->grupos()->get();
        $checklists = [];

        foreach ($grupos as $grupo) {
            
            $checklists_of_group = $grupo->checklists;
            array_push($checklists, $checklists_of_group);
            $checklists = array_unique($checklists);
        }
        return $checklists;

        // $user = User::with('grupos.checklists')->find($id);
        // $checklists = $user->grupos->flatMap(function($grupo){
        //     return $grupo->checklists;
        // });
    }


    // public function checklists()
    // {
    //     return $this->belongsToMany(Checklist::class, 'checklist_usuarios', 'user', 'checklist')
    //                 ->where('ativo', true)
    //                 ->distinct();
    // }


}
