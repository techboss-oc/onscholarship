<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'country',
        'avatar',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function studentProfile(): HasOne
    {
        return $this->hasOne(StudentProfile::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function isProfileComplete(): bool
    {
        $profile = $this->studentProfile;
        if (!$profile) return false;

        // Required fields
        $required = ['first_name', 'last_name', 'gender', 'nationality', 'date_of_birth', 'passport_number', 'address'];
        foreach ($required as $field) {
            if (empty($profile->$field)) return false;
        }

        // Required documents
        $docTypes = $this->documents()->pluck('document_type')->toArray();
        $essential = ['Passport', 'Diploma', 'Transcript'];
        foreach ($essential as $type) {
            if (!in_array($type, $docTypes)) return false;
        }

        return true;
    }

    public function agentProfile(): HasOne
    {
        return $this->hasOne(AgentProfile::class);
    }

    public function agentStudents(): HasMany
    {
        return $this->hasMany(StudentProfile::class, 'agent_id');
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function agentApplications(): HasMany
    {
        return $this->hasMany(Application::class, 'agent_id');
    }

    public function managerProfile(): HasOne
    {
        return $this->hasOne(ManagerProfile::class);
    }

    public function agentManagers(): HasMany
    {
        return $this->hasMany(ManagerProfile::class, 'agent_id');
    }

    public function agencyUserProfile(): HasOne
    {
        return $this->hasOne(AgencyUserProfile::class);
    }

    public function agentAgencyUsers(): HasMany
    {
        return $this->hasMany(AgencyUserProfile::class, 'agent_id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    public function isAgent(): bool
    {
        return $this->role === 'agent';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
