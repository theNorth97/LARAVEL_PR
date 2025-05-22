<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActiveRequest extends Model
{
    public function user()
    {
        return $this->belongsTo('User::class');
    }
    protected $fillable = [
        'user_id',
        'service_name',
        'phone',
        'description',
        'finished_at',
    ];
}
