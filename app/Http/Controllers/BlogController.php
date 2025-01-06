<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        return view('blog.index', [
            'posts' => Post::with(['authors:name','category']) -> latest('created_at') -> paginate(10), 
        ]);
    }
}
