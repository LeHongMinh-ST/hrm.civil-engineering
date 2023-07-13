<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @class Attendance
 */
class Attendance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'worker_id',
        'date',
        'status',
        'overtime',
        'status',
        'overtime',
        'overtime_coefficients_salary',
        'coefficients_salary',
        'created_by',
        'updated_by',
        'salary_id',
    ];
}
