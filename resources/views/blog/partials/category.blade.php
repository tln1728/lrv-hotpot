<x-collapse-item id="blog-category" title="Category" :expanded="$expanded">
    <!-- <p class="mb-2"></p> -->
    <div class="p-5 border border-gray-300">
        <a href="{{route('blog.index')}}">
            <button type="button" class="font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 {{request() -> is("blog") ? "text-white bg-blue-700 hover:bg-blue-800" : "border text-gray-800 bg-white hover:bg-gray-100"}}">
                All ({{$total_posts_count}})
            </button>
        </a>
        @foreach ($categories as $category)
        <a href="{{route('blog.posts.show',$category->slug)}}">
            <button type="button" class="font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 {{request() -> is("*$category->slug*") ? "text-white bg-blue-700 hover:bg-blue-800" : "border text-gray-800 bg-white hover:bg-gray-100"}}">
                {{"{$category -> name} ({$category -> posts_count})"}}
            </button>
        </a>
        @endforeach
    </div>
</x-collapse-item>