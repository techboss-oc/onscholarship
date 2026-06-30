<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scholarship extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'university_id',
        'type',
        'description',
        'eligibility',
        'coverage',
        'amount_usd',
        'duration',
        'deadline',
        'intake_date',
        'available_slots',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'amount_usd' => 'decimal:2',
        'deadline' => 'date',
        'intake_date' => 'date',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
