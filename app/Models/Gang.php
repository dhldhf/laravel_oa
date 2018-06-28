<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gang extends Model
{
    protected $fillable = [
        'name', 'alias','phone','post','entry_time', 'visa_fees','customs_costs','agency_costs','other_fee','medium','num','created_at','updated_at',
    ];
}
