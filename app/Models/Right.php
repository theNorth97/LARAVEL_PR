<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_right');
    }
}
