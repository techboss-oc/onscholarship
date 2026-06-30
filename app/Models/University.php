<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'city',
        'province',
        'country',
        'logo',
        'description',
        'website',
        'established_year',
        'type',
        'ranking',
        'facilities',
        'video_url',
        'is_featured',
        'accepts_scholarship',
        'language_of_instruction',
        'gallery',
        'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'accepts_scholarship' => 'boolean',
        'is_active' => 'boolean',
        'gallery' => 'array',
    ];

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    public function scholarships(): HasMany
    {
        return $this->hasMany(Scholarship::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
