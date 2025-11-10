<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // RELACIÓN CON PROYECTOS (ESTA ES LA QUE TE FALTABA)
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    // RELACIÓN CON TAREAS
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
