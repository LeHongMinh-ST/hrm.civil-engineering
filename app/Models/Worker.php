<?php

namespace App\Models;

use App\Enums\Worker\WorkerStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @class Worker
 */
class Worker extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'dob',
        'address',
        'phone',
        'status',
        'citizen_identification',
        'coefficients_salary',
        'thumbnail',
        'citizen_identification_font_image',
        'citizen_identification_back_image',
        'created_by',
        'updated_by',
    ];

    public const ONLY_DATA = [
        'name',
        'dob',
        'address',
        'phone',
        'status',
        'citizen_identification',
        'coefficients_salary',
        'thumbnail',
        'citizen_identification_font_image',
        'citizen_identification_back_image',
    ];

    public function setCoefficientsSalaryAttribute($coefficientsSalary)
    {
        $this->attributes['coefficients_salary'] = (int) (str_ireplace(',', '', $coefficientsSalary));
    }

    /**
     * Get the status text element
     *
     * @return string
     */
    public function getStatusTextAttribute(): string
    {
        return match ($this->status) {
            WorkerStatus::InWorking => '<span class="badge bg-light border-start border-width-3 text-body rounded-start-0 border-success">' . WorkerStatus::getDescription($this->status) . '</span>',
            default => '<span class="badge bg-light border-start border-width-3 text-body rounded-start-0 border-warning">' . WorkerStatus::getDescription($this->status) . '</span>',
        };
    }
}
