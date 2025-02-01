<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamInvitation extends Model
{
    protected $fillable = ['email', 'role', 'token', 'expires_at'];

    protected $casts = [
        'expires_at' => 'datetime'
    ];
    public function scopeValid($query)
    {
        return $query->where('expires_at', '>', now());
    }
}
