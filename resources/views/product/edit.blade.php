@extends('layout.index')

@section('title')
Multiple upload / select
@endsection

@section('content')
<a href="{{route('products.index')}}">    
    <button type="button" class="text-white bg-blue-600 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Back
    </button>
</a>

<form class="max-w-lg mx-auto" method="POST" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- default -->
    <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
        <input value="{{$product -> title}}" id="title" name="title" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
        @error('title')
        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-5">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
        <input value="{{$product -> price}}" id="price" name="price" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
        @error('price')
        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{$message}}</p>
        @enderror
    </div>

    <!-- upload file-->
    <div class="mb-5">
        <label for="cover" class="block mb-2 text-sm font-medium text-gray-900">Cover</label>
        <input id="cover" name="cover" type="file"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
        @error('cover')
        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{$message}}</p>
        @enderror
        <img class="mt-3" src="{{Storage::url($product -> cover)}}" alt="">
    </div>

    <!-- upload file-->
    <div class="mb-5">
        <label for="images" class="block mb-2 text-sm font-medium text-gray-900">Images</label>
        <input id="images" name="images[]" type="file" multiple
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
        @error('images')
        <p class="mt-2 text-sm text-red-600"><span class="font-medium">{{$message}}</p>
        @enderror
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Edit
    </button>

    <button type="reset" class="text-white bg-gray-400 hover:bg-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Reset
    </button>
</form>

<div class="flex mt-5">
    @foreach ($product -> images as $img)    
        <img class="h-64" src="{{Storage::url($img -> path)}}" alt="">
    @endforeach
</div>

@endsection