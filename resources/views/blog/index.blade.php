@extends('layout.index')

@section('title')
Blog
@endsection

@section('content')
<!-- Text Header
<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-12">
        <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
            Minimal Blog
        </a>
        <p class="text-lg text-gray-600">
            Lorem Ipsum Dolor Sit Amet
        </p>
    </div>
</header>

Topic Nav
<nav class="w-full py-4 border-t border-b bg-gray-100">
    <div class="block sm:hidden">
        <a href="#" class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center">
            Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
        </a>
    </div>
    <div class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
            <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Technology</a>
            <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Automotive</a>
            <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Finance</a>
            <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Politics</a>
            <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Culture</a>
            <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Sports</a>
        </div>
    </div>
</nav> -->

<div class="flex-nowrap flex py-6 gap-4">
    <!-- Posts Section -->
    <section class="flex flex-col gap-4 basis-8/12">

        <!-- head filter -->
        <div class="shoadow border flex gap-3 p-6">
            <button class="block text-blue-700 bg-white hover:bg-blue-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center border" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </button>

            <button class="block text-white bg-blue-700 hover:bg-blue-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center border" type="button">
                New
            </button>

            <button class="block text-blue-700 bg-white hover:bg-blue-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center border" type="button">
                Oldest
            </button>

            <button class="block text-blue-700 bg-white hover:bg-blue-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center border" type="button">
                Hot
            </button>
        </div>

        <!-- posts -->
        <div class="flex flex-wrap -mx-2">
            @foreach ($posts as $post)
            <div class="w-1/2 px-2 mb-4">
                <article class="flex flex-col h-full shadow-lg">
                    <!-- Article Image -->
                    <a href="{{route('blog.posts.show', $post -> slug)}}" class="hover:opacity-75">
                        <!-- <img class="max-h-48 object-cover max-w-full" width="100%" src="{{Storage::url($post -> thumbnail)}}"> -->
                        <img class="max-h-48 object-cover max-w-full" width="100%" src="{{$post -> thumbnail}}">
                    </a>
                    <div class="bg-white flex flex-col justify-start p-6">
                        <a href="{{route('blog.posts.show',$post -> category -> slug)}}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $post -> category -> name}}</a>
                        <a href="{{route('blog.posts.show', $post -> slug)}}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post -> title}}</a>
                        <p class="text-sm pb-3">
                            By <span class="font-semibold hover:text-gray-800">
                                {{$post->author->name}}
                            </span> - {{$post -> created_at -> diffForHumans()}}
                        </p>
                        <span class="pb-6">{{Str::words($post -> content,24,)}}</span>
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

        <!-- Pagination -->
        {{ $posts -> links() }}
    </section>

    <!-- Sidebar Section -->
     
    <x-collapse class="sm:basis-4/12 sm:block hidden" data-accordion="open" data-inactive-classes="text-dark" data-active-classes="bg-white border-b-0">
        @include('blog.partials.category',['expanded' => 'true'])

        <!-- <x-collapse-item id="test2" title="Category">
            <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                Get to know us
            </a>
        </x-collapse-item> -->

    <!-- <div class="w-full border bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">Header</p>
        <span>content</span>

        <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
            <i class="fab fa-instagram mr-2"></i> button
        </a>
    </div> -->
    </x-collapse>
</div>
@endsection