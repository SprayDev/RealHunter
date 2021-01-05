<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class blog extends Model
{
    use HasFactory;

    protected $appends = ['short_title', 'short_content'];

    public function getShortTitleAttribute()
    {
        return Str::limit($this->title, 50);
    }

    public function getShortContentAttribute()
    {
        return Str::limit($this->content, 90);
    }
}
