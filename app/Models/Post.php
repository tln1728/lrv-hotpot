<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'slug',
        'color',
        'content',
        'tags',
        'thumbnail',
        'published',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function authors()
    {
        return $this->belongsToMany(User::class)->withPivot('point')->withTimestamps();
    }

    public function comments() {
        return $this -> morphMany(Comment::class,'commentable');
    }
}
