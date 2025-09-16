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

    // Perbaikan: Relasi ke Project (sesuai dengan migration menggunakan user_id)
    public function projects()
    {
        return $this->hasMany(Project::class, 'user_id');
    }

    // Perbaikan: Relasi ke Task (sesuai dengan migration menggunakan user_id)
    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id');
    }

    // Perbaikan: Tambahkan relasi untuk teams sebagai manager
    public function managedTeams()
    {
        return $this->hasMany(Team::class, 'manager_id');
    }

    // Perbaikan: Tambahkan relasi untuk teams sebagai user
    public function teamMemberships()
    {
        return $this->hasMany(Team::class, 'user_id');
    }

    // Perbaikan: Update helper methods sesuai dengan role yang ada
    public function isManager()
    {
        return $this->role === 'manager';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    
}