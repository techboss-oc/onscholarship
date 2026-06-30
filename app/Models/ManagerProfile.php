<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ManagerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'agent_id',
        'title',
        'first_name',
        'last_name',
        'mobile_phone',
        'gender',
        'country',
        'permissions_matrix',
    ];

    protected $casts = [
        'permissions_matrix' => 'array',
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user(): BelongsTo
    {
        return $table->belongsTo(User::class);
    }

    /**
     * Get the agent that owns this manager.
     */
    public function agent(): BelongsTo
    {
        return $table->belongsTo(User::class, 'agent_id');
    }
}
