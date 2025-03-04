<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($role) {
            if (!in_array($role->title, ['admin', 'staff', 'candidat'])) {
                throw new \Exception("Le rôle doit être 'admin', 'staff' ou 'candidat'.");
            }
        });
    }
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
