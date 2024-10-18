<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderMessenger extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'order_messenger';
    protected $primaryKey = 'id_order_messenger';
    protected $fillable = [
        'id_users',
        'id_tbl_messenger',
        'status_order_messenger',
        'notes_messenger'
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];
}
