<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class licensies extends Model
{
    use HasFactory;

    protected $table = 'licenses';

    public function picture()
    {
        return $this->hasOne(picture::class, 'id', 'picture_id');
    }

    public function location()
    {
        return $this->belongsToMany(location::class, 'license_location',
            'license_id', 'location_id')
            ->withPivot(['season_start', 'season_end']);
    }

    public function location_date()
    {
        return $this->belongsToMany(location::class, 'license_location',
            'license_id', 'location_id')
            ->withPivot(['season_start', 'season_end']);
    }

    public function seasons()
    {
        return $this->hasMany(HuntingSeasons::class, 'license_id', 'id');
    }

    public function getPriceFullAttribute()
    {
        return number_format($this->cost/100, '0', '', ' ');
    }

    public function getPriceMaxFullAttribute()
    {
        return number_format($this->cost_max/100, '0', '', ' ');
    }
}
