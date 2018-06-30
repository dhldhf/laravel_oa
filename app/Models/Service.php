<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'property', 'num','description','project','submission_time', 'progress','follow_up','created_at','updated_at',
    ];
}
