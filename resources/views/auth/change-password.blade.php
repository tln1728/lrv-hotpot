@extends('layout.index')

@section('title')
Watch your back
@endsection

@section('content')

<div class="grid place-items-center grid-cols-3">
    <form class="space-y-4" method="post" action="">
        @csrf
        
        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Change
        </button>
    </form>
</div>

@endsection