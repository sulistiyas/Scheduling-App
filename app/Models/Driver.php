<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'tbl_driver';
    protected $primaryKey = 'id_tbl_driver';
    protected $fillable = [
        'id_driver',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];
}
