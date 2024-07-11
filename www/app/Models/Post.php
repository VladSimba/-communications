<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'author_id',
    ];

    public function author()
    {
       return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Comment::class, 'post_id', 'id', 'id', 'id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
