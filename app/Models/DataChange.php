<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataChange extends Model
{
    protected $fillable = ['user_id', 'table_name', 'record_id', 'action_type', 'old_values', 'new_values', 'changed_fields', 'ip_address', 'user_agent'];

    protected $casts = [
        'old_values' => 'json',
        'new_values' => 'json',
    ];

    /**
     * Get the user that performed the change.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the changed fields as array.
     */
    public function getChangedFieldsArrayAttribute(): array
    {
        return $this->changed_fields ? json_decode($this->changed_fields, true) : [];
    }
}
