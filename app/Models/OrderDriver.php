<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDriver extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'order_driver';
    protected $primaryKey = 'id_order_driver';
    protected $fillable = [
        'id_users',
        'id_driver',
        'status_order_driver',
        'notes_driver'
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];
}
