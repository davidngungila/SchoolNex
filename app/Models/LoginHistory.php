<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    protected $fillable = ['user_id', 'ip_address', 'user_agent', 'login_type', 'successful', 'failure_reason', 'login_at', 'logout_at'];

    protected $casts = [
        'successful' => 'boolean',
        'login_at' => 'datetime',
        'logout_at' => 'datetime',
    ];

    /**
     * Get the user that performed the login.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the session duration in minutes.
     */
    public function getSessionDurationAttribute(): ?int
    {
        if ($this->logout_at && $this->login_at) {
            return $this->logout_at->diffInMinutes($this->login_at);
        }
        return null;
    }
}
