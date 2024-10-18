<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Messenger extends Model
{
    // use HasFactory;
    use SoftDeletes;
    public $table = 'tbl_messenger';
    protected $primaryKey = 'id_tbl_messenger';
    protected $fillable = [
        'id_messenger',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];
}
