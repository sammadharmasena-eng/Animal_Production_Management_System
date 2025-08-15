<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'animal_type',
        'breed',
        'meat_yield',
        'egg_production',
        'milk_production',
        'health_status',
        'photo_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}