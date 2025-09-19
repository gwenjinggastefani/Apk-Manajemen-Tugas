<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'description', 'user_id', 'status'];

   
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function tasks() 
    {
        return $this->hasMany(Task::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function teamMembers()
    {
        return $this->hasManyThrough(User::class, Team::class, 'project_id', 'id', 'id', 'user_id');
    }
}