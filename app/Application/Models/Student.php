<?php

namespace App\Models;

use App\Traits\HasBaseModel;
use App\Traits\HasPasswordEmails;
use Arr;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Silber\Bouncer\Database\HasRolesAndAbilities;

/**
 * @mixin IdeHelperStudent
 */
class Student extends Authenticatable
{
    use HasApiTokens;
    use HasBaseModel;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRolesAndAbilities;
    use SoftDeletes;
    use HasPasswordEmails;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'branch_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected ?array $monitoredMetricResults = null;

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function courseWorks(): HasMany
    {
        return $this->hasMany(CourseWork::class);
    }

    public function getMonitoredMetricResults(): array
    {
        if (is_null($this->monitoredMetricResult)) {
            try {
                $courseWorks = self::query()
                    ->where('id', $this->id)
                    ->with(['courseWorks' => fn($q) => $q->with('monitoredMetricResult')])
                    ->get()
                    ->pluck('courseWorks')
                    ->flatten()
                    ->filter()
                    ->map(function (CourseWork $courseWork) {
                        return $courseWork->only([
                            'cohesion_group_value',
                            'diversity_group_value',
                            'readability_group_value',
                            'font_group_value',
                            'plagiat_group_value'
                        ]);
                    })
                    ->toArray();

                $this->monitoredMetricResult = array_average_by_key($courseWorks);
            } catch (\Exception $e) {
                $this->monitoredMetricResult = [];
            }
        }

        return $this->monitoredMetricResult;
    }

    public function getPlagiatGroupValueAttribute(): ?float
    {
        return Arr::get($this->getMonitoredMetricResults() ?? [], 'plagiat_group_value');
    }

    public function getReadabilityGroupValueAttribute(): ?float
    {
        return Arr::get($this->getMonitoredMetricResults() ?? [], 'readability_group_value');
    }

    public function getDiversityGroupValueAttribute(): ?float
    {
        return Arr::get($this->getMonitoredMetricResults() ?? [], 'diversity_group_value');
    }

    public function getCohesionGroupValueAttribute(): ?float
    {
        return Arr::get($this->getMonitoredMetricResults() ?? [], 'cohesion_group_value');
    }

    public function getFontGroupValueAttribute(): ?float
    {
        return Arr::get($this->getMonitoredMetricResults() ?? [], 'font_group_value');
    }
}
