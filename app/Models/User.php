<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', 
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi ke Project (kalau admin)
    public function projects()
    {
        return $this->hasMany(Project::class, 'manager_id'); 
    }

    // Relasi ke Task (kalau user)
    public function tasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }
}
