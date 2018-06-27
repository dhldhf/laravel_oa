<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = [
        'name', 'gender','census','experience','position', 'date','medium','send_date','booking_date','note','eta','created_at','updated_at',
    ];
}
