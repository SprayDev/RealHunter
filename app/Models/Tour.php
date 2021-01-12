<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $appends = ['PriceFull'];

    public function getPriceFullAttribute()
    {
        return number_format($this->cost/100, '0', '', ' ');
    }

    public function pictures()
    {
        return $this->hasMany(TourPictures::class);
    }

    public function location()
    {
        return $this->hasOne(location::class, 'id', 'location_id');
    }

    public function images()
    {
        $images = [];
        foreach ($this->pictures as $img)
        {
            $pic = picture::find($img->picture_id);
            $images[] = [
                'path' => $pic->image_path,
                'type' => $img->type
            ];
        }
        return $images;
    }

    public function facilities()
    {
        return $this->hasMany(facilities::class);
    }

    public function prices()
    {
        return $this->hasMany(prices::class);
    }
}
