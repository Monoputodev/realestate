<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'image',
        'thumbnail',
        'service',
        'location',
        'apartment_size',
        'bedroom',
        'completion_date',
        'status',
        'experience',
        'features',
        'brochure',
        'floor_plan',
    ];
}
