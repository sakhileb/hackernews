<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'username',
        'item_type',
        'url',
        'time_stamp',
        'score',
        'is_top',
        'is_show',
        'is_ask',
        'is_job',
        'is_new'
    ];
}
