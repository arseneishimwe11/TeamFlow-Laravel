<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'description'];

    const ADMIN = 'admin';
    const MANAGER = 'manager';
    const USER = 'user';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
