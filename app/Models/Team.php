<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    
    // Perbaikan: Tambahkan project_id yang hilang dalam fillable
    protected $fillable = ['manager_id', 'user_id', 'project_id'];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Perbaikan: Tambahkan relasi project yang hilang
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}