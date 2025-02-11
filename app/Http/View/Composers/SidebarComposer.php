<?php 

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Post;

class SidebarComposer
{
    public function compose(View $view)
    {
        $categories = Category::withCount('posts') -> get();
        $total_posts_count = Post::count();
        $view->with([
            'categories' => $categories,
            'total_posts_count' => $total_posts_count,
        ]);
    }
}