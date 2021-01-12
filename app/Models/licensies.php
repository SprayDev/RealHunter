<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class licensies extends Model
{
    use HasFactory;

    public function picture()
    {
        return $this->hasOne(picture::class, 'id', 'picture_id');
    }

    public function location()
    {
        return $this->hasOne(location::class, 'id', 'location_id');
    }

    public function seasons()
    {
        return $this->hasMany(HuntingSeasons::class, 'license_id', 'id');
    }

    public function getPriceFullAttribute()
    {
        return number_format($this->cost/100, '0', '', ' ');
    }
}
