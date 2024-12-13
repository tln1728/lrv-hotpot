@extends('layout.index')

@section('title')
Multiple upload / select
@endsection

<!-- error('title')
<p class="mt-2 text-sm text-red-600"><span class="font-medium">$message</p>
enderror -->

@section('content')
<a href="{{route('products.index')}}">
    <button type="button" class="text-white bg-blue-600 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Back
    </button>
</a>

<form class="max-w-lg mx-auto" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
    @csrf
    <!-- default -->
    <div class="mb-5">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
        <input value="{{old('title')}}" id="title" name="title" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
    </div>

    <div class="mb-5">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
        <input value="{{old('price')}}" id="price" name="price" type="text" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
    </div>

    <!-- upload file-->
    <div class="mb-5">
        <label for="cover" class="block mb-2 text-sm font-medium text-gray-900">Cover</label>
        <input id="cover" name="cover" type="file"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
    </div>

    <!-- upload file-->
    <div class="mb-5">
        <label for="images" class="block mb-2 text-sm font-medium text-gray-900">Images</label>
        <input id="images" name="images[]" type="file" multiple
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Add
    </button>

    <button type="reset" class="text-white bg-gray-400 hover:bg-gray-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Reset
    </button>
</form>

@endsection