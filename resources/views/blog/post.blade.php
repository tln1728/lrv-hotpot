@extends('layout.index')

@section('title')
{{$post -> title}}
@endsection

@section('content')

<div class="flex-nowrap flex py-6 gap-4">
    <!-- Post Section -->
    <section class="flex flex-col gap-4 sm:basis-8/12">

        <!-- Author Info -->
        <div class="w-full border flex flex-col text-center md:text-left md:flex-row bg-white p-6">
            <div class="w-full md:w-1/5 flex justify-center md:justify-start">
                <img src="https://picsum.photos/700/700" class="rounded-full shadow h-32 w-32">
            </div>
            <div class="flex-1 flex flex-col justify-center md:justify-start">
                <p class="font-semibold text-2xl">{{$post->author->name}}
                </p>
                <p class="pt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel neque non libero suscipit suscipit eu eu urna.</p>
                <div class="flex items-center justify-center md:justify-start text-2xl no-underline text-blue-800 pt-4">
                    <a class="" href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="pl-4" href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Article -->
        <article class="flex flex-col shadow">
            <!-- Article Image -->
            <img class="w-full h-96 object-cover" src="{{Storage::url($post -> thumbnail)}}">
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="{{route('blog.posts.show',$post -> category -> slug)}}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{$post -> category -> name}}</a>
                <p class="text-3xl font-bold pb-4">{{$post -> title}}</p>
                <p href="#" class="text-sm pb-8">
                    By <a href="#" class="font-semibold hover:text-gray-800">David Grzyb</a>, Published on April 25th, 2020
                </p>
                <h1 class="text-2xl font-bold pb-3">Introduction</h1>
                {!! nl2br(e($post -> content)) !!}
            </div>
        </article>

        <!-- Navigation -->
        <!-- <div class="w-full flex">
            <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center">
                    <i class="fas fa-arrow-left pr-1"></i>Previous
                </p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>
            <a href="#" class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                <p class="text-lg text-blue-800 font-bold flex items-center justify-end">
                    Next<i class="fas fa-arrow-right pl-1"></i>
                </p>
                <p class="pt-2">Lorem Ipsum Dolor Sit Amet Dolor Sit Amet</p>
            </a>
        </div> -->
    </section>

    <!-- Sidebar Section -->
    <x-collapse class="sm:basis-4/12 sm:block hidden" data-accordion="open" data-inactive-classes="text-dark" data-active-classes="bg-white border-b-0">
        @include('blog.partials.category', ['expanded' => 'false'])

        <x-collapse-item id="author-post" title="Cùng tác giả" expanded="true">
            <div class="p-5 flex flex-col gap-4 border border-gray-300">
                @foreach ($by_author_posts as $post)
                <div class="p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <div class="flex gap-2">
                        <img src="https://picsum.photos/700/700" alt="" class="w-2/6 rounded h-auto">
                        <div class="flex flex-col justify-center gap-3">
                            <a href="{{route('blog.posts.show',$post -> slug)}}">
                                <h5 class="text-lg font-bold tracking-tight text-gray-900">{{$post -> title}}</h5>
                            </a>
                            <div class="flex text-sm gap-3 text-sm">
                                <div class="flex items-center">
                                    <span>12</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                                    </svg>
                                </div>
                                <div class="flex items-center">
                                    <span>{{$post -> totalComments()}}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                    </svg>
                                </div>
                                <div class="flex items-center">
                                    <span>12</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <a href="" class="uppercase flex gap-1 text-blue-800 hover:text-black text-sm">
                                    Reading
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>
                                </a>
                                <span class="text-gray-500">6d ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </x-collapse-item>
    </x-collapse>
</div>

@guest
<span class="text-red-500">You need to login to post a comment</span>
@endguest

<!-- Comment Section -->
<details class="bg-gray-100 rounded mx-auto p-6">
    <summary class="text-2xl font-bold mb-4">Comments ({{$totalComments}})</summary>

    <!-- Submit comment form -->
    @auth
    <form action="{{route('blog.posts.comments.store', $post -> slug)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea name="content" placeholder="Write a comment..." class="w-full p-2 border rounded mb-2"></textarea>
        <div class="flex items-center justify-between">
            <!-- <input type="file" name="attachment" id="file-upload" class="hidden">
            <label for="file-upload" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 hover:text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                </svg>
            </label> -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Post Comment</button>
        </div>
    </form>
    @endauth

    <!-- Discussion -->
    <div id="comments-section">
        <div id="comments-container">
            @include('blog.partials.comments', ['comments' => $comments])
        </div>

        <div id="pagination-container">
            {{ $comments->links() }}
        </div>
    </div>
</details>

<div class="py-6">
    <!-- posts -->
    <p class="font-bold text-2xl pb-6">Related Posts</p>
    <div class="flex flex-wrap -mx-2">
        @foreach ($related_posts as $post)
        <div class="w-1/4 px-2 mb-4">
            <article class="flex flex-col h-full shadow-lg">
                <!-- Article Image -->
                <a href="{{route('blog.posts.show', $post -> slug)}}" class="hover:opacity-75">
                    <!-- <img class="max-h-48 object-cover max-w-full" width="100%" src="{{Storage::url($post -> thumbnail)}}"> -->
                    <img class="max-h-48 object-cover max-w-full" width="100%" src="{{$post -> thumbnail}}">
                </a>
                <div class="bg-white flex flex-col justify-start p-4 gap-2">
                    <a href="{{route('blog.posts.show', $post -> slug)}}" class="text-xl font-bold hover:text-gray-700">{{$post -> title}}</a>
                    <p class="text-sm">
                        By <span class="font-semibold hover:text-gray-800">
                            {{$post->author->name}}
                        </span> - {{$post -> created_at -> diffForHumans()}}
                    </p>
                    <span>{{Str::words($post -> content,24,)}}</span>
                    <a href="{{route('blog.posts.show', $post -> slug)}}" class="uppercase flex gap-1 text-blue-800 hover:text-black">Continue Reading
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </a>
                </div>
            </article>
        </div>
        @endforeach
    </div>
</div>

<script>
    function toggleReplyForm(commentId) {
        const form = document.getElementById(`replyForm${commentId}`);
        form.classList.toggle('hidden');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const commentsSection = document.getElementById('comments-section');
        const commentsContainer = document.getElementById('comments-container');
        const paginationContainer = document.getElementById('pagination-container');

        commentsSection.addEventListener('click', function(e) {
            const target = e.target.closest('a[href*="page="]');
            if (target) {
                e.preventDefault();
                const url = target.href;
                fetchComments(url);
            }
        });

        function fetchComments(url) {
            fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    commentsContainer.innerHTML = data.comments;
                    paginationContainer.innerHTML = data.pagination;
                    // Scroll to the top of the comments section
                    commentsSection.scrollIntoView({
                        behavior: 'smooth'
                    });
                })
                .catch(error => console.error('Error:', error));
        }
    });
</script>
@endsection