@extends('layout.index')

@section('title')
Forgot what
@endsection

@section('content')

<div class="grid place-items-center grid-cols-3">
    <form class="space-y-4" method="post" action="{{route('password.update')}}">
        @csrf
        <input type="hidden" name="token" value="{{$token}}">

        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
            <input value="{{ $email ?? old('email')}}"
                type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@company.com" />
        </div>

        <div>
            <label for="password">New Password</label>
            <input type="password" name="password" autofocus
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" 
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>

        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Reset Password
        </button>
    </form>
</div>

@endsection