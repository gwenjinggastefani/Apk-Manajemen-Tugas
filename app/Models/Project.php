<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    // Perbaikan: Hapus status dari fillable karena tidak ada di migration baru
    protected $fillable = ['name', 'description', 'user_id', 'status'];

    // Relasi ke manager/user yang membuat project
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke manager (alias untuk user)
    public function manager()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke tasks
    public function tasks() 
    {
        return $this->hasMany(Task::class);
    }

    // Relasi ke teams
    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    // Helper method untuk mendapatkan semua user dalam project melalui teams
    public function teamMembers()
    {
        return $this->hasManyThrough(User::class, Team::class, 'project_id', 'id', 'id', 'user_id');
    }
}