<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'review_text',
        'rating'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
