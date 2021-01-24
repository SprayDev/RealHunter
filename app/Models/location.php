<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;

//    public function licenses()
//    {
//        return $this->hasMany(licensies::class);
//    }

    public function licenses()
    {
        return $this->belongsToMany(licensies::class, 'license_location', 'location_id', 'license_id');
    }
}
