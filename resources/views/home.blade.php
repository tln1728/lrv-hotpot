@extends('layout.index')

@section('title')
Home
@endsection

@section('content')
<!-- Valid color for btn: blue, purple, green, cyan, teal, red, pink, lime -->

<div class="grid grid-cols-5 gap-4">
    <!-- multiple upload -->
    <x-btn-feature :need-login="true" route="products.index">Multiple Upload</x-btn-feature>

    <!-- switch language -->
    <x-btn-feature data-dropdown-toggle="language-dropdown-menu" color="red" type="button">
        {{__('public.switch_language')}}
        @include('layout.switch-language-dropdown')
    </x-btn-feature>
    
    <!-- Send email -->
    <x-btn-feature :need-login="true" route="mails" color="purple">Send mail</x-btn-feature>
    
    <!-- Forgot password -->
    <x-btn-feature route="password.request" color="pink">Forgot password</x-btn-feature>
    
    <!-- Forgot password -->
    <x-btn-feature :need-login="true" route="password.changeForm" color="green">Change password</x-btn-feature>
    
    <!-- Blog -->
    <x-btn-feature route="blog.index" color="teal">Blog</x-btn-feature>

</div>
@endsection