<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'user_id',
        'slug',
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

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
        // return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
        return $this->morphMany(Comment::class, 'commentable');
    }

     public function totalComments()
    {
        $comments = $this->comments()->withCount('replies')->get();

        $total = $comments->sum(function ($comment) {
            return 1 + $comment->replies_count;
        });

        return $total;
    }
}
