<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailOrderMessenger extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'detail_order_messenger';
    protected $primaryKey = 'id_detail_order_messenger';
    protected $fillable = [
        'id_order_messenger',
        'item_type',
        'order_pick_up_date',
        'order_pick_up_time',
        'note_sender',
        'order_arrive_date',
        'order_arrive_time',
        'client',
        'destination_address',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];
}
