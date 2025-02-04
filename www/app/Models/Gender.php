<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function profile()
    {
       return $this->belongsTo(Profile::class, 'gender_id');
    }
}
