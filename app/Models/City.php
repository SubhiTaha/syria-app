<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
        'tour_site_name',
        'cost',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

}
