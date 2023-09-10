<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'image',
        'thumbnail',
        'subtitle',
        'location',
        'propertystatus',
        'propertytype',
        'apartment_size',
        'bedroom',
        'completion_date',
        'status',
        'experience',
        'features',
        'brochure',
        'floor_plan',
    ];


    public function plocation()
    {
        return $this->hasOne(Location::class, 'id', 'location');
    }
    public function ptype()
    {
        return $this->hasOne(PropertyType::class, 'id', 'propertytype');
    }
    public function pstatus()
    {
        return $this->hasOne(PropertyStatus::class, 'id', 'propertystatus');
    }
}
