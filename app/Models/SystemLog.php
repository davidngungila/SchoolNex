<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    protected $fillable = ['level', 'message', 'context', 'channel', 'user_id', 'ip_address', 'user_agent'];

    protected $casts = [
        'context' => 'json',
    ];

    /**
     * Get the user that triggered the log.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
