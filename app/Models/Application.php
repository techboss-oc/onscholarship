<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\StudentProfile;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'application_number',
        'user_id',
        'university_id',
        'program_id',
        'scholarship_id',
        'agent_id',
        'status',
        'cover_letter',
        'admin_notes',
        'remarks',
        'offer_letter',
        'rejection_reason',
        'submitted_at',
        'reviewed_at',
        'reviewed_by',
        'intake_year',
        'intake_semester',
        'application_fee_amount',
        'application_fee_currency',
        'application_fee_status',
        'application_fee_paid_at',
        'application_fee_reference',
        'application_fee_method',
        'application_fee_notes',
        'service_charge_amount',
        'service_charge_currency',
        'service_charge_status',
        'service_charge_paid_at',
        'service_charge_reference',
        'service_charge_method',
        'service_charge_notes',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'reviewed_at' => 'datetime',
        'application_fee_paid_at' => 'datetime',
        'application_fee_amount' => 'decimal:2',
        'service_charge_paid_at' => 'datetime',
        'service_charge_amount' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($application) {
            if (!$application->application_number) {
                // Generate a unique application number AP-YYYYMMDD-XXXX
                $application->application_number = 'AP-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(StudentProfile::class, 'user_id', 'user_id');
    }

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function scholarship(): BelongsTo
    {
        return $this->belongsTo(Scholarship::class);
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }

    public function statusHistory(): HasMany
    {
        return $this->hasMany(ApplicationStatusHistory::class);
    }

    public function getIsFeePaidAttribute(): bool
    {
        return in_array($this->application_fee_status, ['paid', 'waived'], true);
    }

    public function getIsServiceChargePaidAttribute(): bool
    {
        return in_array($this->service_charge_status, ['paid', 'waived'], true);
    }
}
