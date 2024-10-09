<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'employee';
    protected $primaryKey = 'id_employee';
    protected $fillable = [
        'id_users',
        'user_phone',
        'user_job_status'
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];
}
