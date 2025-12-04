<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'title',
        'start_time',
        'end_time',
        'time_taken'
    ];
}
