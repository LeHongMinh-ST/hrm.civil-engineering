<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @class Salary
 */
class Salary extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'worker_id',
        'datetime',
        'status',
        'paid',
        'total',
        'sub_total',
        'salary_advances',
        'coefficients_salary',
        'created_by',
        'updated_by',
        'salary_id',
    ];
}
