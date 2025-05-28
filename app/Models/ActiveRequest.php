<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ActiveRequest extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'service_name',
        'phone',
        'description',
        'status',
        'finished_at',
        'created_at'
    ];
}
