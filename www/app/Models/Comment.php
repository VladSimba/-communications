<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'text',
        'post_id',
        'parent_id',
    ];

    public function user()
    {
       return $this->belongsTo(User::class, 'author_id');
    }

    public function post()
    {
       return $this->belongsTo(Post::class);
    }

    public function cmments()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
