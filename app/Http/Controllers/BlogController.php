<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'posts' => Post::with(['author', 'category'])
                ->latest('created_at')
                ->paginate(8),
        ]);
    }

    public function showCategory(Category $category)
    {
        return view('blog.index', [
            'posts' => $category->posts()->with(['author', 'category'])->latest()->paginate(8),
        ]);
    }

    public function showPost(Post $post)
    {
        $totalComments = $post->totalComments();
        
        $comments = $post->comments()
            ->with(['replies.user','user'])
            ->latest('created_at')
            ->paginate(5);

        $related_posts = $post->category->posts()
            ->with(['category','author'])
            ->where('id', '!=', $post->id) 
            ->limit(4)
            ->get();

        $by_author_posts = $post->author->posts()
            ->where('id', '!=', $post->id) 
            ->take(3)
            ->get();
        
        $view = view('blog.post', [
            'post' => $post,
            'related_posts' => $related_posts,
            'by_author_posts' => $by_author_posts,
            'comments' => $comments,
            'totalComments' => $totalComments,
        ]);

        if (request()->ajax()) {
            return response()->json([
                'comments' => view('blog.partials.comments', compact('comments'))->render(),
                'pagination' => $comments->links()->toHtml(),
            ]);
        }

        return $view;
    }

    public function storeComment(Post $post, Request $request)
    {
        $data = $request->validate([
            'content' => 'required',
        ]);

        $data['user_id'] = $request->user()->id;

        $post->comments()->create($data);

        return back()->with('success', 'Comment added successfully!');
    }

    public function storeReply(Comment $comment, Request $request)
    {
        $data = $request->validate([
            'content' => 'required',
        ]);

        $data['user_id'] = $request->user()->id;
        $data['parent_id'] = $comment -> id;

        $comment->replies()->create($data);

        return back()->with('success', 'Comment added successfully!');
    }
}