<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'about',
        'gender_id',
        'user_id',
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function gender()
    {
       return $this->hasOne(Gender::class, 'id', 'gender_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageble');
    }
}
