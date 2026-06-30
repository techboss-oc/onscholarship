<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'university_id',
        'name',
        'slug',
        'degree_level',
        'field_of_study',
        'description',
        'duration_years',
        'tuition_fee_usd',
        'tuition_fee_cny',
        'language',
        'intake_months',
        'requirements',
        'career_prospects',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'tuition_fee_usd' => 'decimal:2',
        'tuition_fee_cny' => 'decimal:2',
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
